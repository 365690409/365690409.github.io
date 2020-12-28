<?php
class Ownerin extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function order_show($db,$mobile,$id){
	  $show=$db->query("select * from ".$db->dbprefix("order")." where id=".$id." and s_mobile='".$mobile."'")->result_array();
	  return $show[0];
	}
	public function order_status($db,$mobile,$id,$k){
	  $rs=$this->order_show($db,$mobile,$id);
	  if($rs==""){
		return array(kname=>"没有行程记录");  
	  }elseif($rs[sok]==2){
		return array(kname=>"乘客已取消");  
	  }elseif($rs[sok]==3){
		return array(kname=>"您已取消");  
	  }elseif($rs[sok]==0){
		return array(kname=>"管理员已取消");  
	  }elseif($rs[sok]==1){
		 if($rs[totime]<(time()-(60*60*24))){
			return array(kname=>"行程已结束");   
		 }
		 if($rs[status]==3){
			return array(kname=>"行程已结束");   
		 }elseif($rs[status]>1){
			return array(kname=>"行程已开始");   
		 }
		 if($rs[c_status]==0 and $rs[totime]>time()){
			return array(kname=>"乘客还没确认同行");   
		 }
		 if(($rs[totime]-time())>(60*60)){/*一个小时之前*/
			return array(kname=>"离出发时间过早");   
		 }
		 $db->where('id',$id);
		 $db->update('order',array("status"=>1,"s_status"=>1));
		 return array(orderid=>$id);
	  }
	}
	public function order_cancel($db,$mobile,$id,$k){
	  $rs=$this->order_show($db,$mobile,$id);
	  if($rs==""){
		return array(kname=>"没有行程记录");  
	  }elseif($rs[sok]==2){
		return array(kname=>"乘客已取消");  
	  }elseif($rs[sok]==3){
		return array(kname=>"您已取消");  
	  }elseif($rs[sok]==0){
		return array(kname=>"管理员已取消");  
	  }elseif($rs[sok]==1){
		 if($rs[totime]<(time()-(60*60*24))){
			return array(kname=>"行程已结束");   
		 }elseif($rs[totime]<(time()-(60*5))){
			return array(kname=>"行程已开始");   
		 }
		 if($rs[status]==3){
			return array(kname=>"行程已结束");   
		 }elseif($rs[status]==2){
			return array(kname=>"行程已开始");   
		 }elseif($rs[pay]!=0){
			return array(kname=>"行程已支付");   
		 }
		 $delno=$this->api->order_delno($db,$rs,3);
		 if($delno==1){
		 $db->where('mobile',$rs[mobile]);
		 $db->where('totime',$rs[totime]);
		 $db->update('passenger',array(sok=>1));
		 $db->insert("uspro",array(mobile=>$rs[mobile],s=>3001,cid=>$id,adate=>date("Y-m-d H:i:s")));
		 $this->usset->sendSms(array(pn=>$rs[mobile],tc=>4,code=>"司机取消"));
		 return array(kname=>"取消成功",orderid=>$id);
		 }else{
	     return array(kname=>$delno);   
		 }
	  }
	}
	public function order_pay($db,$mobile,$id,$k){
	  $rs=$this->order_show($db,$mobile,$id);
	  if($rs==""){
		return array(kname=>"没有行程记录");  
	  }elseif($rs[sok]==2){
		return array(kname=>"乘客已取消");  
	  }elseif($rs[sok]==3){
		return array(kname=>"您已取消");  
	  }elseif($rs[sok]==0){
		return array(kname=>"管理员已取消"); 
	  }elseif($rs[sok]==1){
		 if($rs[totime]<(time()-(60*60*24))){
			return array(kname=>"行程已结束");   
		 }
		 if($rs[pay]!=0){
			return array(kname=>"行程已支付");   
		 }
		$sus=$db->query("select id,fee,sok from ".$db->dbprefix("user")."  where mobile='".$rs[s_mobile]."'")->result_array();
		$sus=$sus[0];
		if($sus[sok]!=1){return array(kname=>"您的账号已冻结，请联系客服");}
		$db->query("update ".$db->dbprefix('order')." set pay=2 where s_mobile='".$rs[s_mobile]."' and sok=1 and id=".$id);
	    $price=$rs[netprice];/*乘客支付费用*/
	    $aprice=number_format($price*$sus[fee],1);/*服务费用*/
	    $sprice=number_format($price-$aprice,1);/*司机费用*/
		$db->query("update ".$db->dbprefix('user')." set price=price-".$aprice." where mobile='".$rs[s_mobile]."'");
		$db->query("update ".$db->dbprefix('site')." set price=price+".$aprice." where id=1");
		 $d="";
		 $d[oid]=$rs[id];
		 //$d[cuid]=$cus[id];
		 $d[cmobile]=$rs[mobile];
		 $d[suid]=$sus[id];
		 $d[smobile]=$rs[s_mobile];
		 $d[price]=$price;
		 $d[sprice]=$sprice;
		 $d[aprice]=$aprice;
		 $d[way]=2;
		 $d[atime]=time();
		 $db->insert("usprice",$d);		 
		return array(keyid=>1,kname=>"结算成功",orderid=>$id);
	  }
	}
	public function order_info($rs){
	   if($rs[sok]==2){
		return array(t=>"乘客已取消");
	   }elseif($rs[sok]==3){
		return array(t=>"您已取消");
	   }elseif($rs[sok]==0){
		return array(t=>"系统取消");
	   }elseif($rs[totime]<(time()-(60*60*24))){
	   return array(t=>"行程已结束");
	   }elseif($rs[sok]==1){
		  if($rs[status]==0){
			if($rs[totime]<time()){  
			return array(t=>"待确认到达乘客起点");  
			}
			if($rs[c_status]==0){  
			return array(t=>"待乘客确认同行");  
			}elseif($rs[c_status]==1){  
			return array(t=>"乘客已确认同行",n=>"待确认到达乘客起点");  
			}
		  }elseif($rs[status]==1){
			return array(t=>"请提醒乘客点击【<span>确认上车</span>】");  
		  }elseif($rs[status]==2){
			if($rs[totime]<(time()-(60*60*3))){  
			return array(t=>"若送达，请提醒乘客点击【<span>确认到达目地</span>】"); 
			}else{
			return array(t=>"乘客已上车，请小心驾驶"); 
			}
		  }elseif($rs[status]==3){
			return array(t=>"行程已结束");  
		  }
	   }
	}
	public function order_but($rs){
	   if($rs[sok]==1 and $rs[totime]>(time()-(60*60*24))){
		  if($rs[status]==0){
			return '<div class="pkbut pkbutsd" cid="'.$rs[id].'"  k="1" keyname="3002" onclick="morun(this);">确认到达乘客起点</div>'; 
		  }
	   }
	   return "";
	}
	public function order_ad($rs){
	   if($rs[sok]==1){
	   $ad=array("","","","");
       if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) { 
	   $ad[0]='<div onclick="jurl(\'maps_'.$rs[id].'\');" class="pkrod">行程</div';
       }else{
		$toids=explode("|",$rs[toid]); 
	   $ad[0]='<a href="amapuri://route/plan/?slon='.str_replace(",","&slat=",$toids[0]).'&sname='.$rs[oname].'&dlon='.str_replace(",","&dlat=",$toids[1]).'&dname='.$rs[dname].'"  class="pkrod">导航</a>'; 
	   //$ad[0]='<a href=" https://gaode.com/dir?from%5Bname%5D='.$rs[oname].'&from%5Blnglat%5D='.$toids[0].'&to%5Bname%5D='.$rs[dname].'&to%5Blnglat%5D='.$toids[1].'&policy=1&type=car" target="_top" class="pkrod">导航</a>'; 
	   }
       if($rs[pay]==0 and $rs[sok]==1 and $rs[totime]>(time()-(60*60*24))){
	   $ad[1]='<div class="pkrod" cid="'.$rs[id].'" keyname="3003" onclick="morun(this);">收款结算</div>';
       }
       if($rs[pay]==0 and $rs[status]<2 and $rs[totime]>(time()-(60*5))){/*and $rs[s_atime]>(time()-(60*20)) */ 
	   $ad[2]='<div class="pkrod" cid="'.$rs[id].'" keyname="2002" onclick="morun(this);">取消订单</div>';
       }
	   return $ad;
	   }
	}
	public function order_usdbox($db,$rs){
	 $user=$this->api->suser($db,$rs[mobile],"id,callname,avatarid,mobile,cint");
	 $user[d]=$user[cint]>1?"出行 <span>".($user[cint]-1)."</span>次":"首次出行";
	 $usdbox=array(us=>$user);
	 if($rs[sok]==1 and $rs[status]<3 and $rs[totime]>(time()-(60*60*24))){
	 $this->load->sqlLayer("info/set");
	 $dbnew=$this->set->datanamenew($_COOKIE['vid'],$user[id],$_COOKIE['vid']);
	 $newme=count($dbnew[d]);
	 $usdbox[r][telinfo]=array($user[mobile],$user[id],$newme);
	 }
	 return $usdbox;
	}
	/*订单*/
	public function order($db,$mobile,$id){
	  $show=$this->order_show($db,$mobile,$id);
	  if($db->query("select id from ".$db->dbprefix('uspro')." where sok=0 and  mobile='".$mobile."' and h=1 and cid=".$show[id])->num_rows()>0){
	  $db->where('h',1);
	  $db->where('mobile',$mobile);
	  $db->where('cid',$show[id]);
	  $db->update('uspro',array(sok=>1));
	  }
	  /*订单同行者*/
	  $da="";
	  $pis=0;
	  $plist="";
	  $da[id]=$show[id];
	  $da[usdbox]=$this->order_usdbox($db,$show);
	  $pus[$show[id]]=array(n=>$show[sok]==1?$da[usdbox][us]['callname']:"已取消",i=>$da[usdbox][us]['avatarid'],u=>"",c=>$show[sok]==1?'':'mousnavcl');
	  foreach ($db->query("select * from ".$db->dbprefix('order')." where s_id=".$show[s_id]."  order by sok")->result_array() as $rs){
		if($show[id]!=$rs[id]){
		if($rs[sok]==1 and $show[sok]==1){$pis=1;}
		$tx="";
		$tx[usdbox]=$this->order_usdbox($db,$rs);
		$pus[$rs[id]]=array(n=>$rs[sok]==1?$tx[usdbox][us]['callname']:"已取消",i=>$tx[usdbox][us]['avatarid'],u=>"gurl('o_".$rs[id]."');",c=>$rs[sok]==1?'':'mousnavcl');
		$tx[top]=$this->api->order_top($rs);
		$tx[cd]=$this->api->order_cd($db,$rs,$pis);
		$tx[info]=$this->order_info($rs);
		if($rs[pay]==2){
		$tx[info][n].=$tx[info][n]?"-您已确认收到车费":"您已确认收到车费";
		}elseif($rs[pay]==1){
		$tx[info][n].=$tx[info][n]?"-已支付":"已支付";
		}
		$tx[but]=$this->order_but($rs);
		$tx[ad]=$this->order_ad($rs);
		$da[tx][]=$tx;  
		}
		$plist[]=$pus[$rs[id]];
	  }
	  /*订单信息*/
	  $da[top]=$this->api->order_top($show);
	  $da[cd]=$this->api->order_cd($db,$show,$pis);
	  $da[by]=$this->api->order_mapsby($show);
	  $da[plist]=$plist;
	  $da[info]=$this->order_info($show);
	  if($show[sok]==1){
	  if($show[pay]==2){
	  $da[info][n].=$da[info][n]?"-您已确认收到车费":"您已确认收到车费";
	  }elseif($show[pay]==1){
	  $da[info][n].=$da[info][n]?"-已支付":"已支付";
	  }
	  }
	  $da[but]=$this->order_but($show);
	  $da[ad]=$this->order_ad($show);
	  if($pis==0 and $show[people]<4 and $show[pok]==1 and $show[status]<3 and $show[pay]==0 and $show[totime]>(time()-(60*60*1))){
	  $da[plist][]=array(n=>"可拼单",u=>"jurl('p_".$show[s_id]."');",i=>" icono-plusCircle");
	  }
	  return $da;
	}
}
?>