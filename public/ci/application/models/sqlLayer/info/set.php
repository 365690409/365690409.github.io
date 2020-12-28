<?php
class Set extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	//复制数据库
	public function dataname($uid,$tid){
	  $b=$uid<$tid?$uid."_".$tid:$tid."_".$uid;
	  $u="./uploads/sqlite/usinfo/".$b.".txt";
	  if(file_exists($u)){$d=file_get_contents($u);}
	  return array(u=>$u,d=>json_decode($d, true));
	}
	//复制数据库
	public function datanamenew($uid,$tid,$sid){
	  $b=$uid<$tid?$uid."_".$tid:$tid."_".$uid;
	  $u="./uploads/sqlite/usinfo/";
	  mkdir($u.$sid."/");
	  $u.=$sid."/".$b."_".$sid.".txt";
	  if(file_exists($u)){$d=file_get_contents($u);}
	  return array(u=>$u,d=>json_decode($d, true));
	}
	//读取信息
	public function seinfonew($uid,$tid,$top=50){
	  $dbnew=$this->datanamenew($uid,$tid,$tid);
	  $d=array();
	  foreach ($dbnew[d] as $k=>$r) {
		$rs="";
		if($uid==$r[0]){
		$rs[s]=1;
		}else{
		$rs[s]=0;
		}
		$rs[uid]=$r[0];
		$rs[oid]=$r[1];
		$rs[adate]=$r[2];
		$rs[sok]=$r[3];
		$rs[rdate]=$r[4];
		$rs[arr]=$r[5];
		$d[]=$rs;
	  }
	  return $d;	
	}
	//读取信息
	public function seinfo($uid,$tid,$top=50){
	  $db=$this->dataname($uid,$tid);
	  $dbnew=$this->datanamenew($uid,$tid,$uid);
	  if($dbnew[d]){
	  $fp= fopen($dbnew[u], "w");
	  $len = fwrite($fp,"");
	  fclose($fp);
	  }
	  $d=$db[d];
	  foreach ($dbnew[d] as $k=>$r) {
		  if($uid!=$r[0] and $r[3]==0){
		  $r[3]=1;
		  $r[4]=date("Y-m-d H:i:s");
		  }
		  $d[]=$r;
	  }
	  if($d){
	  $fp= fopen($db[u], "w");
	  $d=json_encode($d);
	  $len = fwrite($fp,$d);
	  fclose($fp);
	  }
	  $d=array();
	  foreach ($db[d] as $k=>$r) {
		$rs="";
		if($uid==$r[0]){
		$rs[s]=1;
		}else{
		$rs[s]=0;
		}
		$rs[uid]=$r[0];
		$rs[oid]=$r[1];
		$rs[adate]=$r[2];
		$rs[sok]=$r[3];
		$rs[rdate]=$r[4];
		$rs[arr]=$r[5];
		$d[]=$rs;
	  }
	  return $d;	
	}
	//发送信息
	public function sendinfo($uid,$tid,$txt,$oid=0){
	  if($txt){
	  $db=$this->datanamenew($uid,$tid,$tid);
	  $fp= fopen($db[u], "w");
	  $d=$db[d];
	  $d[]=array($uid,$oid,date("Y-m-d H:i:s"),0,0,$txt);
	  $d=json_encode($d);
	  $len = fwrite($fp,$d);
	  fclose($fp);
	  return 1;
	  }else{
	  return 0;
	  }
	}
}
?>