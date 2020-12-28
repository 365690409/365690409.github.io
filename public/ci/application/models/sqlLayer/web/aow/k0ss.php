<?php
class K0 extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function rk_d($db,$vdd){
	 foreach ($vdd as $k=>$rs){
	  if(count(str_split($rs[tit]))==5){
	  $zishow=$db->query("select id,vdate from ".$db->dbprefix("aow")." where vdate='".$rs[vdate]."'")->result_array();
	  if($zishow[0]==""){
	   $db->insert("aow",array(vdate=>$rs[vdate],tit=>trim($rs[tit]),atime=>time()));
	   //break;
	  }
	  }
	 }
	 return 1;
	}
	public function zq_h($tid){
	  $str=explode("n",$_GET[a]);
	  $vdd="";
	  foreach ($str as $k=>$tk){
		  $rt= explode("v",$tk);
		  if(count(str_split($rt[0]))==8){  
		  $vdd[]=array(vdate=>$rt[0],tit=>trim($rt[1]));
		  }
	  }
	  if($vdd==""){return "";}
      krsort($vdd);
      $db=$this->set->database($tid); 
	  $this->rk_d($db,$vdd);
	  $this->set->v_stdr($tid,1);
	  $td=$this->q($tid,$db);
	  if($td){
	  $this->set->v_std($tid,$td);
	  }
	  return array(tid=>$tid,vdate=>$z_vdate,fraction=>$z_fraction,ok=>$vdd==""?0:1);
	}
	public function h($tid,$str=""){
	  $hs=explode("\r\n",$str);
	  $z_vdate=$hs[10];
	  if($z_vdate==""){return "";}
	  $z_vdate=substr($z_vdate,-8);
	  $arv=str_split($z_vdate);
	  if($arv[0]==5 and $tid==3){return "";}elseif($arv[0]==9 and $tid==2){return "";}
	  $z_fraction=trim(str_replace("期号：","",$hs[9])); 
	  $z_fraction =str_replace(" ","",$z_fraction); 
	  if($z_fraction==""){return "";}
	  $z_td="";
	  $str = explode('--',$str);
	  $str = trim(str_replace("	","|",$str[1])); 
	  $str = trim(str_replace("\r\n2020",",2020",$str)); 
	  $str = trim(str_replace("\r\n","",$str)); 
	  $str = explode(',',$str);
	  $vdd="";
	  foreach ($str as $k=>$tk){
		  $rt= explode("|",$tk);
		  $vdate=$rt[1];
		  $vdate=substr($vdate,-8);
		  $tit=$rt[2];
		  if($k==0){
		  }else{
		  $arv=str_split($vdate);
		  if(count($arv)==8){  
		  $vdd[]=array(vdate=>$vdate,tit=>trim($tit));
		  }
		  }
	  }
	  if($vdd==""){return "";}
      krsort($vdd);
      $db=$this->set->database($tid); 
	  $this->rk_d($db,$vdd);
	  $this->set->v_stdr($tid,1);
	  $td=$this->q($db);
	  if($td){
	  $this->set->v_std($tid,$td);
	  }
	  return array(tid=>$tid,vdate=>$z_vdate,fraction=>$z_fraction,ok=>$vdd==""?0:1);
	}
	public function q_s($db,$w_ds,$vdate=""){
	   $qy=$vdate?" where vdate<".$vdate:"";
	   $sqldb=$db->query("select * from ".$db->dbprefix("aow").$qy."  order by vdate desc limit 0,50")->result_array();
	   foreach ($sqldb as $k=>$rs){
		 $t=str_split($rs[tit]);
		 $v1[]=$t[$w_ds[0]];
		 $v2[]=$t[$w_ds[1]];
		 $vg[]=substr($t[$w_ds[0]]+$t[$w_ds[1]],-1);
	   }
	   $v1=array_unique($v1);
	   $v2=array_unique($v2);
	   $vg=array_unique($vg);
	   $v1=substr(implode("",$v1),0,4).substr(implode("",$v1),-4);
	   $v2=substr(implode("",$v2),0,4).substr(implode("",$v2),-4);
	   $v1=str_split($v1);
	   $v2=str_split($v2);
	   $d="";
	   foreach (str_split("51237890") as $a){
		foreach (str_split("5123789") as $b){
		  //if($this->set->set(str_split(substr(implode("",$vg),0,8)),substr($a+$b,-1))==1){
		  $d[]=$a.$b;
		  //}
		}
	   }
	   $ed="";
		for ($x=0; $x<=99; $x++) {
		 $v=sprintf("%02d",$x);
		 $ed[]=$v;
		}
	   $ed=array_diff($ed,$d);
	   return $ed;
	}
	public function q($tid,$db){
	   $w_ds=str_split(12);
	   $w_ds[0]--;
	   $w_ds[1]--;
	   $vvi=1;
	   $zvi=0;
	   $sqldb=$db->query("select * from ".$db->dbprefix("aow")."  order by vdate desc limit 0,200")->result_array();
	   foreach ($sqldb as $k=>$rs){
		   $t=str_split($rs[tit]);
		   $zd=$this->set->set($this->q_s($db,$w_ds,$rs[vdate]),$t[$w_ds[0]].$t[$w_ds[1]]);
		   if($zd==1){
		   $zvi++;
		   }
	   }
	   echo $zvi;
	   echo "<br />";
	   $d=$this->q_s($db,$w_ds);
	   echo count($d);
	   $aaa=$this->set->v_td($d,1,$w_ds);
//	   $w_ds=str_split(34);
//	   $d=$this->q_s($db,$w_ds);
//	   $aaa.=",";
//	   $aaa.=$this->set->v_td($d,$vvi,$w_ds);
//	   $d="";
//	   foreach (str_split("0123456789") as $a){
//		foreach (str_split("0123456789") as $b){
//		  if(($a+$b)<11){
//		  $d[]=$a.$b;
//		  }
//		}
//	   }
//	   echo "<br />";
//       echo count($d);
//	   echo "<br />";
	   return $aaa;
	}
}
?>
