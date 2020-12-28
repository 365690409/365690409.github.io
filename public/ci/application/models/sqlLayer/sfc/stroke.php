<?php
class Stroke extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	/*拼单成功*/
	public function spellorder($db,$mobile,$sid,$id,$pshow){
	  $atime=time();
	  $show=$db->query("select id,pids,people,ntime,vtime,pok from ".$db->dbprefix('stroke')." where mobile='".$mobile."' and sok=0 and id=".$sid)->result_array();
	  $show=$show[0];
	  if($show==""){return array(kname=>"你的当前行程不存在",index=>1);}
	  if($show[pok]==0){return array(kname=>"您已接一张不能拼车单");}
      if($db->query("select id from ".$db->dbprefix('order')." where mobile='".$pshow[mobile]."' and sok=1 and s_id=".$sid)->num_rows()>0){
		 return array(kname=>"不能和同一个人拼车");
	  }
      if($db->query("select id from ".$db->dbprefix('order')." where sok=1 and s_id=".$sid)->num_rows()>1){
		 return array(kname=>"目前最多只能拼一张");
	  }
	  $time_a=($pshow[totime]-3800);
	  $time_b=($pshow[totime]+3800);
	  if(($show[ntime]>=$time_a and $show[ntime]>=$time_b) or ($show[vtime]>=$time_a and $show[vtime]>=$time_b)){return array(kname=>"已超出出发时间范围");}
	  if($show[people]<$pshow[people]){return array(kname=>"已超出可载人数");}
	  $d="";
	  $d[pids]=$show[pids].",".$id;
	  $ntime=$pshow[totime]<$show[ntime]?$pshow[totime]:$show[ntime];
	  $vtime=$pshow[totime]>$show[vtime]?$pshow[totime]:$show[vtime];
	  $d[ntime]=$ntime;
	  $d[vtime]=$vtime;
	  $d[people]=($show[people]-$pshow[people]);
	  $db->where('id',$sid);
	  $db->update('stroke',$d);
	  $d=$pshow;
	  $d[s_id]=$sid;
	  $d[netprice]=number_format($pshow[price_p]+$pshow[thank],1);
	  $d[s_mobile]=$mobile;
	  $d[s_atime]=$atime;
	  $d[sok]=1;
	  $db->insert("order",$d);
	  $or=$db->query("select id from ".$db->dbprefix("order")." where mobile='".$pshow[mobile]."' and s_id=".$show[id])->result_array();
	  $or=$or[0];
	  $db->insert("uspro",array(mobile=>$pshow[mobile],s=>2002,cid=>$or[id],adate=>date("Y-m-d H:i:s")));
	  $db->query("update ".$db->dbprefix('user')." set ctime=".$atime.",cint=cint+1 where mobile='".$pshow[mobile]."'");
	  $db->query("update ".$db->dbprefix('user')." set stime=".$atime.",sint=sint+1 where mobile='".$mobile."'");
	  $this->usset->sendSms(array(pn=>$pshow[mobile],tc=>2,code=>"司机接单"));
	  return array(kname=>"拼单成功",orderid=>$or[id]);
	}
	/*接单成功*/
	public function addorder($db,$mobile,$sid,$id,$pshow){
	  $atime=time();
	  $likecode=md5($atime.rand(100,999))."|".$id;
	  $show=$db->query("select id from ".$db->dbprefix('stroke')." where mobile='".$mobile."' and sok=0 and ((ntime>=".($pshow[totime]-1800)."  and ntime<".($pshow[totime]+1800).") or (vtime>=".($pshow[totime]-1800)."  and vtime<".($pshow[totime]+1800)."))")->result_array();
	  $show=$show[0];
	  if($show){return array(kname=>"你已有行程30分钟后才能接单");}
	  $d="";
	  $d[mobile]=$mobile;
	  $d[pids]=$id;
	  $d[pok]=$pshow[pok];
	  $d[people]=(4-$pshow[people]);
	  $d[ntime]=$pshow[totime];
	  $d[vtime]=$pshow[totime];
	  $d[atime]=$atime;
	  $d[likecode]=$likecode;
	  $db->insert("stroke",$d);
	  $rs=$db->query("select id from ".$db->dbprefix("stroke")." where mobile='".$mobile."' and likecode='".$likecode."' ")->result_array();
	  $rs=$rs[0];
	  $d=$pshow;
	  $d[s_id]=$rs[id];
	  $d[netprice]=number_format($pshow[price]+$pshow[thank],1);
	  $d[s_mobile]=$mobile;
	  $d[s_atime]=$atime;
	  $d[sok]=1;
	  $db->insert("order",$d);
	  if($sid>0){
	  $db->where('id',$sid);
	  $db->update('driver',array(sok=>0));
	  }
	  $or=$db->query("select id from ".$db->dbprefix("order")." where mobile='".$pshow[mobile]."' and s_id=".$rs[id])->result_array();
	  $or=$or[0];
	  $db->insert("uspro",array(mobile=>$pshow[mobile],s=>2001,cid=>$or[id],adate=>date("Y-m-d H:i:s")));
	  $db->query("update ".$db->dbprefix('user')." set ctime=".$atime.",cint=cint+1 where mobile='".$pshow[mobile]."'");
	  $db->query("update ".$db->dbprefix('user')." set stime=".$atime.",sint=sint+1 where mobile='".$mobile."'");
	  $this->usset->sendSms(array(pn=>$pshow[mobile],tc=>2,code=>"司机接单"));
	  return array(kname=>"出行成功",orderid=>$or[id]);
	}
	public function add_stroke($db,$mobile,$sid,$id,$s){
	  $qytop="mobile,toid,oname,dname,totime,people,price,price_p,km,distance,pok,message,thank,atime";
	  $pshow=$db->query("select ".$qytop." from ".$db->dbprefix('passenger')." where mobile!='".$mobile."' and sok=1 and id=".$id)->result_array();
	  $pshow=$pshow[0];
	  if($pshow==""){return array(kname=>"行程已取消或被其它司机抢走");}
	  if($pshow[people]>4){return array(kname=>"已超出可载人数");}
	  $db->where('id',$id);
	  $db->update('passenger',array(sok=>0));
	  if($s==1){
	  $eck=$this->spellorder($db,$mobile,$sid,$id,$pshow);
	  }else{
	  $eck=$this->addorder($db,$mobile,$sid,$id,$pshow);
	  }
	  if($eck[orderid]==""){
	  $db->where('id',$id);
	  $db->update('passenger',array(sok=>1));
	  }
	  return $eck;
	}
}
?>