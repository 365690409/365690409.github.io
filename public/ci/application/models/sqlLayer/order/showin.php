<?php
class showin extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function order_show($db,$mobile,$id){
	  $show=$db->query("select * from ".$db->dbprefix("order")." where id=".$id." and mobile='".$mobile."'")->result_array();
	  return $show[0];
	}
	public function order_status($db,$mobile,$id){
	  $rs=$this->order_show($db,$mobile,$id);
	  if($rs[c_status]==0){
	  $k=1;
	  }elseif($rs[status]<=1){
	  $k=2;
	  }else{
	  $k=3;
	  }
	  if($rs==""){
		return array(kname=>"没有行程记录");  
	  }elseif($rs[sok]==2){
		return array(kname=>"您已取消");  
	  }elseif($rs[sok]==3){
		return array(kname=>"司机已取消");  
	  }elseif($rs[sok]==0){
		return array(kname=>"管理员已取消");  
	  }elseif($rs[sok]==1){
		 if($rs[totime]<(time()-(60*60*24))){
			return array(kname=>"行程已结束");   
		 }
		 if($rs[status]==3){
			return array(kname=>"行程已结束");   
		 }
		 if($k==1){
		   $db->where('id',$id);
		   $db->update('order',array("c_status"=>1,utime=>time()));
		   $db->insert("uspro",array(mobile=>$rs[s_mobile],s=>1001,cid=>$id,h=>1,adate=>date("Y-m-d H:i:s")));
		   return array(orderid=>$id);
		 }elseif($k==2){
		   if($rs[totime]>(time()+60*60)){ /*一个小时之前*/
		   return array(kname=>"离出发时间过早");
		   }
		   if($rs[status]==0 and $rs[totime]>(time()+60*5)){ 
		   return array(kname=>"司机还没确认到达起点");
		   }
		   if($rs[pay]==0){
			 $cus=$db->query("select id,price,sok from ".$db->dbprefix('user')." where  mobile='".$rs[mobile]."'")->result_array();
			 $cus=$cus[0];
			 if($cus[sok]!=1){return array(kname=>"您的账号已冻结，请联系客服");}
			 if($cus[price]<$rs[netprice]){return array(kname=>"余额不足，请向司机支付油费");}
			 $sus=$db->query("select id,fee,sok from ".$db->dbprefix("user")."  where mobile='".$rs[s_mobile]."'")->result_array();
			 $sus=$sus[0];
			 if($sus[sok]!=1){return array(kname=>"司机账号已冻结，请联系客服");}
			  /*确认支付*/
			 $db->query("update ".$db->dbprefix('order')." set pay=1 where id=".$rs[id]); 
			 $price=$rs[netprice];/*乘客支付费用*/
			 $aprice=number_format($price*$sus[fee],1);/*服务费用*/
			 $sprice=number_format($price-$aprice,1);/*司机费用*/
			 $db->query("update ".$db->dbprefix('user')." set price=price-".$price." where mobile='".$rs[mobile]."'");
			 $db->query("update ".$db->dbprefix('user')." set price=price+".$sprice." where mobile='".$rs[s_mobile]."'");
			 $db->query("update ".$db->dbprefix('site')." set price=price+".$aprice." where id=1");
			 $d="";
			 $d[oid]=$rs[id];
			 $d[cuid]=$cus[id];
			 $d[cmobile]=$rs[mobile];
			 $d[suid]=$sus[id];
			 $d[smobile]=$rs[s_mobile];
			 $d[price]=$price;
			 $d[sprice]=$sprice;
			 $d[aprice]=$aprice;
			 $d[way]=1;
			 $d[atime]=time();
			 $db->insert("usprice",$d);		 
		   }
		   $db->where('id',$id);
		   $db->update('order',array("status"=>$k,utime=>time()));
		   return array(orderid=>$id);
		 }elseif($k==3){
		   if($rs[pay]==0){
		   return array(kname=>"司机还没确认收款"); 
		   }
		   $db->where('id',$id);
		   $db->update('order',array("status"=>$k,utime=>time()));
		   if($db->query("select id from ".$db->dbprefix('order')." where sok=1 and (pay=0 or status!=3) and s_id=".$rs[s_id])->num_rows()==0){
		   $db->where('id',$rs[s_id]);
		   $db->update('stroke',array(sok=>1));
		   }
		   if($k==3){
		   return array(kname=>'行程已确认到达，感谢您使用同泰出行！',index=>1);
		   }else{
		   return array(orderid=>$id);
		   }
		 }
	  }
	}
	public function order_cancel($db,$mobile,$id){
	  $rs=$this->order_show($db,$mobile,$id);
	  if($rs==""){
		return array(kname=>"没有行程记录");  
	  }elseif($rs[sok]==2){
		return array(kname=>"您已取消");  
	  }elseif($rs[sok]==3){
		return array(kname=>"司机已取消");  
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
		 $delno=$this->api->order_delno($db,$rs,2);
		 if($delno==1){
		 $db->insert("uspro",array(mobile=>$rs[s_mobile],s=>3002,cid=>$id,h=>1,adate=>date("Y-m-d H:i:s")));
		 $this->usset->sendSms(array(pn=>$rs[s_mobile],tc=>3,code=>"乘客取消"));
		 return array(kname=>"取消成功",orderid=>$id);
		 }else{
	     return array(kname=>delno);   
		 }
	  }
	}
	public function order_info($rs){
	   if($rs[sok]==2){
		return array(t=>"您已取消");
	   }elseif($rs[sok]==3){
		return array(t=>"司机已取消");
	   }elseif($rs[sok]==0){
		return array(t=>"系统取消");
	   }elseif($rs[totime]<(time()-(60*60*24))){
	   return array(t=>"行程已结束");
	   }elseif($rs[sok]==1){
		  if($rs[status]==0){
			if($rs[c_status]==0){
			  return array(t=>"司机已接你，请尽快确认同行","若超出出发时间，系统默认同行");  
			}else{
			  return array(t=>"待司机到达起点");  
			}
		  }elseif($rs[status]==1){
			return array(t=>"司机已到达起点，请尽快联系司机","若已上车，请确认上车");  
		  }elseif($rs[status]==2){
			return array(t=>"您已确认上车，祝您旅程愉快！","若未支付车费，请向司机支付");  
		  }elseif($rs[status]==3){
			return array(t=>"行程已结束");  
		  }
	   }
	}
	public function order_but($rs,$db=""){
	   if($rs[sok]==1 and $rs[totime]>(time()-(60*60*24))){
		  if($rs[c_status]==0){
			return '<div class="pkbut pkbutsd" cid="'.$rs[id].'"  k="1" keyname="3001" onclick="morun(this);">请确认同行</div>'; 
		  }elseif($rs[status]<=1){
			return '<div class="pkbut pkbutsd" cid="'.$rs[id].'"  k="2"'.($rs[pay]==0?'price="'.$rs[netprice].'"':'').' keyname="3001" onclick="morun(this);">请确认上车'.($rs[pay]==0?'-并支付￥'.$rs[netprice].'':'').'</div>'; 
			return array(n=>"",id=>$rs[id],k=>2); 
		  }elseif($rs[status]==2){
			return '<div class="pkbut pkbutsd" cid="'.$rs[id].'"  k="3" keyname="3001" onclick="morun(this);">请确认到达目地</div>'; 
		  }
	   }
	   return "";
	}
	public function order_ad($rs){
     if($rs[sok]==1 and $rs[pay]==0 and $rs[status]<2 and $rs[totime]>(time()-(60*5))){/*and $rs[s_atime]>(time()-(60*20)) */ 
	   return '<div class="tit_r" cid="'.$rs[id].'" keyname="2001" onclick="morun(this);">取消订单</div>';
      }
	  return "";
	}
	public function order_usdbox($db,$rs){
	 $user=$this->api->suser($db,$rs[s_mobile],"id,callname,avatarid,mobile,numberplate,ownertxt,sint");
	 $user[d]=$user[callname].($user[sint]>1?" 接单 <span>".($user[sint]-1)."</span> 次":" 首次接单");
	 if($rs[sok]!=1 or $rs[status]==3 or $rs[totime]<(time()-(60*60*24))){
	 $user[numberplate]=substr($code[owner][user][callname],0,4)."***".substr($code[owner][user][callname],-2);
	 }
	 $usdbox=array(us=>array(avatarid=>$user[avatarid],callname=>$user[numberplate]."&nbsp;&nbsp;".$user[ownertxt],d=>$user[d]));
	 if($rs[sok]==1 and $rs[status]!=3 and $rs[totime]>(time()-(60*60*24))){
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
	  /*订单同行者*/
	  $da="";
	  $pis=0;
	  $plist="";
	  $da[id]=$show[id];
	  $da[usdbox]=$this->order_usdbox($db,$show);
	  $pus[$show[id]]=array(n=>$da[usdbox][us]['callname'],i=>$da[usdbox][us]['avatarid'],u=>"gurl('o_".$show[id]."');");
	  if($show[sok]==1){
	  foreach ($db->query("select * from ".$db->dbprefix('order')." where s_id=".$show[s_id]." and sok=1")->result_array() as $rs){
		if($show[id]!=$rs[id]){
		if($rs[sok]==1){$pis=1;}
		$tx="";
        $tx[yelr]=array(us=>$this->api->suser($db,$rs[mobile],"callname,avatarid"),r=>array(t=>'<div class="pkrof pkrono">同行乘客</div>'));
		$pus[$rs[id]]=array(n=>$tx[yelr][us]['callname'],i=>$tx[yelr][us]['avatarid'],u=>"gurl('o_".$rs[id]."');");
		$tx[top]=$this->api->order_top($rs);
		$tx[cd]=array(o=>array(name=>$rs[oname]),d=>array(name=>$rs[dname]));;
		$da[tx][]=$tx;  
		}
		$plist[]=$pus[$rs[id]];
	  }
	  }
	  /*订单信息*/
	  $da[top]=$this->api->order_top($show);
	  $da[cd]=$this->api->order_cd($db,$show,$pis);
	  $da[by]=$this->api->order_mapsby($show);
	  $da[plist]=$plist;
	  $da[info]=$this->order_info($show);
	  if($show[sok]==1){
	  if($show[pay]==0){
	  $da[info][n].=$da[info][n]?"-未支付，若支付，请司机确认":"未支付，若支付，请司机确认";
	  }elseif($show[pay]==2){
	  $da[info][n].=$da[info][n]?"-司机已确认收款":"司机已确认收款";
	  }elseif($show[pay]==1){
	  $da[info][n].=$da[info][n]?"-已支付":"已支付";
	  }
	  }
	  $da[but]=$this->order_but($show,$db);
	  $da[ad]=$this->order_ad($show);
	  return $da;
	}
}
?>