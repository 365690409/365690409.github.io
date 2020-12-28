<?php
class Api extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function anpt(){
	  $pt=$_POST;
	  if($pt[oid]==""){return  array(0,$this->code("请选择出发位置"));exit;}
	  if($pt[did]==""){return  array(0,$this->code("请选择目地位置"));exit;}
	  if($pt[totime]==""){return  array(0,$this->code("请选择出发时间"));exit;}
	  if($pt[people]==""){return  array(0,$this->code("请选择出发人数"));exit;}
	  return array(1,$pt); 
	}
	public function anc($show,$s=0){
	  $htm='<div class="monbbox"><div class="monb"><div class="monb_mark monb_mark_o"></div>'.$show[oname].'</div><div class="monb_gl">1<div class="fjx"></div></div><div class="monb"><div class="monb_mark monb_mark_d"></div>'.$show[dname].'</div></div>';
	  
	  $htm.='<div class="mona">';
	  if($s==1){
	  $htm.='出发时间：<span>'.$this->listdate($show[totime]).'</span> <span>|</span> <span>可载 '.$show[people].'人</span>';
	  }elseif($s==2){
	  $htm.='<input type="hidden" name="mobile" value="'.$show[mobile].'" />';
	  $htm.='<input type="hidden" name="pid" value="'.$show[pid].'" />';
	  $htm.='出发时间：<span>'.$this->listdate($show[totime]).'</span> <span>|</span> <span>可拼 '.$show[people].'人</span>';
	  }else{
	  $htm.='<span>'.$this->listdate($show[totime]).'</span> <span>|</span> <span>乘坐 '.$show[people].'人</span>';
	  }
	  $htm.='</div>';
	  $htm.='<input type="hidden" name="did" value="'.$show[id].'" />';
	  $htm.='<input type="hidden" name="toid" value="'.$show[toid].'" />';
	  $htm.='<input type="hidden" name="totime" value="'.$show[totime].'" />';
	  $htm.='<input type="hidden" name="people" value="'.$show[people].'" />';
	  return $htm; 
	}
	public function ip(){
	  $url="https://restapi.amap.com/v3/ip";
	  $url.="?key=5be842bde83e9a917b367b6c605557a6";
	  $url.="&ip=112.96.240.43";
	  $url.="&output=JSON";
	  return file_get_contents($url); 
	}
	public function prompt($db,$mobile,$h=0){
      $query="select id from ".$db->dbprefix('passenger')." where mobile='".$mobile."' and sok=1 and totime<".time()." order by atime ";
      foreach ($db->query($query)->result_array() as $rs){
	  $db->insert("uspro",array(mobile=>$mobile,s=>0,cid=>$rs[id],adate=>date("Y-m-d H:i:s")));
	  $db->where('id',$rs[id]);
	  $db->update('passenger',array(sok=>3));
	  }
      $query="select id from ".$db->dbprefix('driver')." where mobile='".$mobile."' and sok=1 and totime<".time()." order by atime ";
      foreach ($db->query($query)->result_array() as $rs){
	  $db->insert("uspro",array(mobile=>$mobile,s=>1,cid=>$rs[id],h=>1,adate=>date("Y-m-d H:i:s")));
	  $db->where('id',$rs[id]);
	  $db->update('driver',array(sok=>3));
	  }
	  if($h==0){ return 0;}
	  if($db->query("select id from ".$db->dbprefix('uspro')." where  mobile='".$mobile."' and s=5001  and sok=1 and unix_timestamp(adate)>unix_timestamp('".date('Y-m-d H:i:s', strtotime("-30 minute"))."')")->num_rows()==0){
	  $us=$db->query("select price from ".$db->dbprefix('user')." where  mobile='".$mobile."'")->result_array();
	  $us_price=$us[0][price];
	  foreach ($db->query("select price from ".$db->dbprefix('order')." where  mobile='".$mobile."' and sok=1 and pay=0 and totime>".(time()+600))->result_array() as $rs){
	  $us_price=$us_price-$rs[price];
	  }
	  if($us_price<0){
	  $db->insert("uspro",array(mobile=>$mobile,s=>5001,h=>1,price=>$us_price,adate=>date("Y-m-d H:i:s")));
	  }
	  }
	}
	public function prorr($show){
	   if($show[s]==0){
	   return array(l_type=>'moprobox',t=>'行程超时已取消',n=>'请重新发布',d=>'',butname=>'我知道了');
	   }elseif($show[s]==1){
	   return array(l_type=>'moprobox',t=>'行程超时已取消',n=>'请重新发布',d=>'',butname=>'我知道了');
	   }elseif($show[s]==2001){
	   return array(l_type=>'moprobox',t=>'车主已接单',n=>'',d=>'',u=>'o_'.$show[cid],butname=>'查看，行程');
	   }elseif($show[s]==2002){
	   return array(l_type=>'moprobox',t=>'车主已接单',n=>'拼车成功',d=>'',u=>'o_'.$show[cid],butname=>'查看，行程');
	   }elseif($show[s]==3001){
	   return array(l_type=>'moprobox',t=>'司机已取消行程',n=>'请重新发布',d=>'',u=>'o_'.$show[cid],butname=>'查看，行程');
	   }elseif($show[s]==3002){
	   return array(l_type=>'moprobox',t=>'乘客已取消行程',n=>'请重新发布',d=>'',u=>'o_'.$show[cid],butname=>'查看，行程');
	   }elseif($show[s]==5001){
	   return array(l_type=>'moprobox',t=>'余额不足 额度：￥'.$show[price],n=>'请充值',d=>'',butname=>'我知道了');
	   }elseif($show[s]==1001){
	   return array(l_type=>'moprobox',t=>'乘客已确认行程',n=>'请尽快联系乘客',d=>'',u=>'o_'.$show[cid],butname=>'查看，行程');
	   }
	}
	public function pro($db,$mobile,$h=0){
	   $show=$db->query("select * from ".$db->dbprefix('uspro')." where  mobile='".$mobile."' and sok=0  and h=".$h." limit 0,1")->result_array();
	   $show=$show[0];
	   if($show){
	   $db->where('id',$show[id]);
	   $db->update('uspro',array(sok=>1));
	   return json_encode($this->prorr($show));
	   }else{
	   $this->prompt($db,$mobile,$h);
	   }
	}
	public function code($name){
	  $code="";
	  $code[l_type]="code";  
	  $code[l_name]=$name;
	  return json_encode($code);
	}
	
	public function codeok($code){
	  $code[l_type]="codeok";  
	  return json_encode($code);
	}
	public function logcode($name="请设置手机号"){
	  $code="";
	  $code[l_type]="logcode";  
	  $code[l_name]=$name;
	  return json_encode($code);
	}
	public function pricecode($us_price){
	  $code="";
	  $code[l_type]="code";  
	  $code[l_name]="您已经有行程要支付，请联系管理员";
	  return json_encode($code);
	}
	public function cwaitlist($d,$db,$query){
	  foreach ($db->query("select id,oname,dname,totime,status,c_status,sok from ".$db->dbprefix('order')." ".$query)->result_array() as $rs){
		$da="";
		$da[kkey]="o_".$rs[id];
		$da[o]=array(name=>$rs[oname]);
		$da[d]=array(name=>$rs[dname]);
		$da[todate]=$this->listdate($rs[totime]);
		$da[status_name]=$this->cwaitname($rs);
		$d[]=$da;
	  }
	  return $d;
	}
	public function cwaitname($r){
	  if($r[sok]==2){
	  return "您已取消";
	  }elseif($r[sok]==3){
	  return "司机已取消";
	  }elseif($r[sok]==0){
	  return "管理员已取消";
	  }elseif($r[sok]==1){
	  if($r[status]==0){
	    if($r[c_status]==0){
	     return "待确认同行..";
		}else{
	     return "待司机到达..";
		}
	  }elseif($r[status]==1){
	  return "司机到达起点";
	  }elseif($r[status]==2){
	  return "已确认上车";
	  }elseif($r[status]==3){
	  return "行程已完成";
	  }else{
	  return "行程待确认";
	  }
	  }
	  return "";
	}
	public function listdate($ltime,$e_s=0){
	  if($e_s==1){
	  $todate=str_replace(" ","",$ltime);
	  $todate=str_replace("分","",$todate);
	  $todate=str_replace("点",":",$todate);
	  $todate=str_replace("今天",date("Y-m-d")." ",$todate);
	  $todate=str_replace("明天",date("Y-m-d",strtotime("+1 day"))." ",$todate);
	  $todate=str_replace("后天",date("Y-m-d",strtotime("+2 day"))." ",$todate);
	  $todate=strtotime($todate);
	  }else{
	  $todate=date("m月d日 H:i",$ltime);
	  $todate=str_replace(date("m月d日"),"今天",$todate);
	  $todate=str_replace(date("m月d日",strtotime('+1 day')),"明天",$todate);
	  $todate=str_replace(date("m月d日",strtotime('+2 day')),"后天",$todate);
	  $todate=str_replace(date("m月d日",strtotime('-1 day')),"昨天",$todate);
	  }
	  return $todate;
	}
	public function poi($keywords="海洋大学"){
	  $keywords=str_replace(" ","",$keywords);
	  if($keywords==""){
	  $show[]=array(location=>'110.300832,21.151215',name=>'广东海洋大学主校区',adname=>'麻章区',address=>'海大路1号');  
	  $show[]=array(location=>'110.406337,21.248722',name=>'万达广场',adname=>'赤坎区',address=>'海滨大道128号');  
	  $show[]=array(location=>'110.406188,21.198655',name=>'城市广场(民享西四路)',adname=>'霞山区',address=>'人民大道南42号城市广场4楼');  
	  $show[]=array(location=>'110.402467,21.210272',name=>'鼎盛广场',adname=>'霞山区',address=>'人民大道南116号(原址系湛江啤酒厂)');  
	  $show[]=array(location=>'110.406188,21.198655',name=>'城市广场(民享西四路)',adname=>'霞山区',address=>'人民大道南42号城市广场4楼');  
	  $show[]=array(location=>'110.346828,21.268934',name=>'岭南师范学院',adname=>'赤坎区',address=>'寸金路29号');  
	  $show[]=array(location=>'110.415023,21.221602',name=>'广东海洋大学海滨校区',adname=>'霞山区',address=>'海滨大道中5号');  
	  return $show;
	  }
	  $db=$this->usset->database(2);
	  $sqldb=$db->query("select * from ".$db->dbprefix("poi")." where keywords='".$keywords."' order by id desc limit 0,1")->result_array();
	  $show="";
	  foreach ($sqldb as $k=>$rs){
		foreach (explode("|",$rs[content]) as $location){
		$rs3=$db->query("select location,name,adname,address from ".$db->dbprefix("pois")." where location='".$location."' limit 0,1")->result_array();
		if($rs3[0]){
		$show[]=$rs3[0];
		}
		}
	  }
	  if($show){return $show;}
	  $url="https://restapi.amap.com/v3/place/text";
	  $url.="?key=5be842bde83e9a917b367b6c605557a6";
	  $url.="&keywords=".$keywords;
	  $url.="&city=湛江市";
	  $url.="&offset=20";
	  $url.="&page=1";
	  $url.="&extensions=base";//base/all
	  $url.="&output=JSON";
	  $ada=file_get_contents($url);
	  $ada=json_decode($ada, true);
	  $zishow=$db->query("select id from ".$db->dbprefix("poi")." where keywords='".$keywords."'")->result_array();
	  if($zishow[0]==""){
	   $rs="";
	   $data[keywords]=$keywords;
	   $location="";
	   foreach ($ada[pois] as $k=>$rs){
		   $this->sc_pois($db,$rs);
		   $location[]=$rs[location];
	   }
	   $data[content]=implode("|",$location);
	   date_default_timezone_set('PRC');
	   $data[adate]=date("Y-m-d H:i:s");
	   if($data[content]){
	   $db->insert("poi",$data);
	   }
	  }
	  foreach ($ada[pois] as $k=>$rs){
		$show[]=array(location=>$rs[location],name=>$rs[name],adname=>$rs[adname],address=>$rs[address]);
	  }
	  return $show;
	}
	public function sc_pois($db,$show){
	  $zishow=$db->query("select id from ".$db->dbprefix("pois")." where location='".$show[location]."'")->result_array();
	  if($zishow[0]==""){
	   $data="";
	   $data[location]=$show[location];
	   $data[name]=trim($show[name]);
	   $data[adname]=trim($show[adname]);
	   $data[address]=trim($show[address]);
	   $data[adate]=date("Y-m-d H:i:s");
	   $db->insert("pois",$data);
	  }
	}
	/*订单-行程信息地址和价格*/
	public function order_cd($db,$show,$pis){
	  if($show[sok]==1){
	  $toids=explode("|",$show[toid]);
	  $d="";
	  $rs=$db->query("select name,adname,address from ".$db->dbprefix('pois')." where location='".$toids[0]."'")->result_array();
	  $rs=$rs[0];
	  $d[o]=array(name=>$show[oname],address=>$rs[adname]."-".$rs[address]);
	  $rs=$db->query("select name,adname,address from ".$db->dbprefix('pois')." where location='".$toids[1]."'")->result_array();
	  $rs=$rs[0];
	  $d[d]=array(name=>$show[dname],address=>$rs[adname]."-".$rs[address]);
	  if($pis==1){
	  $show[price]="";
	  $show[price_p]=number_format($show[price_p]+$show[thank],1);
	  }else{
	  if($rs[pok]==0){
	  $show[price]=number_format($show[price]+$show[thank],1);
	  $show[price_p]="";
	  }else{
	  $show[price]=number_format($show[price]+$show[thank],1);
	  $show[price_p]=number_format($show[price_p]+$show[thank],1);
	  }
	  }
	  $d[r]=array(price=>$show[price],price_p=>$show[price_p],thank=>$show[thank]);
	  return $d;
	  }else{
	  return array(o=>array(name=>$show[oname]),d=>array(name=>$show[dname]));
	  }
	}
	/*订单-时间-人位-愿拼车*/
	public function order_top($show){
	   $top="";
	   $top[todate]=$this->listdate($show[totime]);
	   $top[people]=$show[people];
	   $top[pok]=$show[pok];
	   if($show[message]){$top[message]=$show[message];}
	  return $top;
	}
	/*订单-地图背景*/
	public function order_mapsby($show){
	  $toids=explode("|",$show[toid]);
	  return "https://restapi.amap.com/v3/staticmap?zoom=10&paths=2,0x0C82F0,1,,:".$toids[0].";".$toids[1]."&markers=large,0x0C82F0,起:".$toids[0]."|mid,0x0FE139,终:".$toids[1]."&labels=".$show[oname].",2,0,16,0xFFFFFF,0x0C82F0:".$toids[0]."|".$show[dname].",2,0,16,0xFFFFFF,0x008000:".$toids[1]."&key=ee95e52bf08006f63fd29bcfbcf21df0";
	}
	/*订单-实价格调整*/
	public function order_netprice($db,$show){
	  $netqy=$db->query("select price,price_p,thank from ".$db->dbprefix('order')." where sok=1 and s_id=".$show[s_id]."");
	  $netqy_num=$netqy->num_rows();
	  foreach ($netqy->result_array() as $rs){
	  $netprice=$netqy_num==1?$rs[price]:$rs[price_p];
	  $netprice=number_format($netprice+$rs[thank],1);
	  $db->where('id',$rs[id]);
	  $db->update('order',array(netprice=>$netprice,utime=>time()));
	  }
	}
	/*订单-取消订单*/
	public function order_delno($db,$rs,$sok){
	  if($db->query("select id from ".$db->dbprefix('order')." where s_id=".$rs[s_id]." and sok=1 and pay=1")->num_rows()==0){
	  $db->where('id',$rs[id]);
	  $db->update('order',array(sok=>$sok,utime=>time()));
	  $db->query("update ".$db->dbprefix('stroke')." set people=people-".$rs['people']." where id=".$rs[s_id]);
	  if($db->query("select id from ".$db->dbprefix('order')." where s_id=".$rs[s_id]." and sok=1")->num_rows()==0){
	  $db->where('id',$rs[s_id]);
	  $db->update('stroke',array(sok=>2));
	  }
	  $this->order_netprice($db,$rs);
	  return 1;
	  }
	  return "行程已开始";
	}
	public function suser($db,$mobile,$top=""){
        $r=$db->query("select ".$top." from ".$db->dbprefix('user')." where mobile='".$mobile."'")->result_array();
        $r=$r[0];
		return $r;
	}
	public function route_r($db,$origin="110.300695,21.151325",$destination="110.406322,21.248733"){
	  $xid=$origin."|".$destination;
	  $sqldb=$db->query("select * from ".$db->dbprefix("route")." where xid='".$xid."' order by id desc limit 0,1")->result_array();
	  if($sqldb[0]){return $sqldb[0];}
	  date_default_timezone_set('PRC');
	  $url="https://restapi.amap.com/v3/direction/driving";
	  $url.="?key=5be842bde83e9a917b367b6c605557a6";
	  $url.="&origin=".$origin;
	  $url.="&destination=".$destination;
	  $url.="&extensions=base";//base/all
	  $url.="&output=JSON";
	  $ada=file_get_contents($url);
	  $ada=json_decode($ada, true);
	   $data="";
	   $data[xid]=$xid;
	   $data[origin]=$origin;
	   $data[destination]=$destination;
	   $data[distance]=$ada[route][paths][0][distance];
	   $data[duration]=$ada[route][paths][0][duration];
	   $data[tolls]=$ada[route][paths][0][tolls];
	  $zishow=$db->query("select id from ".$db->dbprefix("route")." where xid='".$xid."'")->result_array();
	  if($zishow[0]==""){
	   $data[adate]=date("Y-m-d H:i:s");
	   $db->insert("route",$data);
	  }
	  return $data;
	}
	public function route($origin="110.300695,21.151325",$destination="110.406322,21.248733"){
	  $db=$this->usset->database(2);
	  $data=$this->route_r($db,$origin,$destination);
	  $data[distance]=number_format($data[distance]*0.001,2);
	  $data[duration]=number_format($data[duration]/60,2);
	  $tjg=$data[distance];
	  $data[s_tolls]=number_format($tjg*1.4,2);
	  $data[c_tolls]=number_format($tjg*1.6,2);
	  $data[s_tolls_p]=number_format($tjg*0.8,2);
	  $data[c_tolls_p]=number_format($tjg*1,2);
	  return $data;	  
	}
	
	public function getdistance($t, $unit=2, $decimal=2){
	  $t=explode("|",$t);
	  $t_a=explode(",",$t[0]);
	  $t_b=explode(",",$t[1]);
	  $EARTH_RADIUS = 6370.996; // 地球半径系数
	  $PI = 3.1415926;
	  $radLat1 = $t_a[1] * $PI / 180.0;
	  $radLat2 = $t_b[1] * $PI / 180.0;
	  $radLng1 = $t_a[0] * $PI / 180.0;
	  $radLng2 = $t_b[0] * $PI /180.0;
	  $a = $radLat1 - $radLat2;
	  $b = $radLng1 - $radLng2;
	  $distance = 2 * asin(sqrt(pow(sin($a/2),2) + cos($radLat1) * cos($radLat2) * pow(sin($b/2),2)));
	  $distance = $distance * $EARTH_RADIUS * 1000;
	  if($unit==2){
		$distance = $distance / 1000;
	  }
	  return round($distance, $decimal);
	}
	public function myorder_info($rs){
	   if($rs[sok]==2){
		return array(t=>"乘客已取消");
	   }elseif($rs[sok]==3){
		return array(t=>"司机已取消");
	   }elseif($rs[sok]==0){
		return array(t=>"系统取消");
	   }elseif($rs[totime]<(time()-(60*60*24))){
	   return array(t=>"行程已结束");
	   }elseif($rs[sok]==1){
		  if($rs[status]==0){
			if($rs[c_status]==0){  
			return array(t=>"待乘客确认同行");  
			}else{  
			return array(t=>"司机待到达起点");  
			}
		  }elseif($rs[status]==1){
			return array(t=>"司机已到达起点");  
		  }elseif($rs[status]==2){
			return array(t=>"乘客已上车");  
		  }elseif($rs[status]==3){
			return array(t=>"行程已结束");  
		  }
	   }
	}
	public function myorder($db,$query){
	  $code="";
		foreach ($db->query("select * from ".$db->dbprefix("order").$query." order by atime desc  limit 0,20")->result_array() as $rs){
		$da="";	
		$da[id]=$rs[id];	
		   $top="";
		   $top[todate]=$this->api->listdate($rs[totime]);
		   $top[people]=$rs[people];
		   if($db->query("select id from ".$db->dbprefix('order')." where sok=1 and s_id=".$rs[s_id])->num_rows()>1){
		   $top[pis]=1;
		   }
		  if($rs[sok]==1){$top[pay]=$rs[pay];
			 if($top[pis]==1){
			$rs[price]="";
			$rs[price_p]=number_format($rs[price_p]+$rs[thank],1);
			 }else{
			$rs[price]=number_format($rs[price]+$rs[thank],1);
			$rs[price_p]="";
			 }
		  }else{
		    $rs[price]="";
			$rs[price_p]="";
		  }
		 $da[top]=$top;
		 $da[cd]=array(o=>array(name=>$rs[oname]),d=>array(name=>$rs[dname]),r=>array(price=>$rs[price],price_p=>$rs[price_p],thank=>$rs[thank]));
		   $scsok=$this->api->myorder_info($rs);
		   $da[txt]=$scsok[t];
		   $code[]=$da;
		}
	  return $code;
	}
}
?>