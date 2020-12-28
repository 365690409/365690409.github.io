<?php
class K0 extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function rk_d($db,$vdd){
	 $i=0;
	 foreach ($vdd as $k=>$rs){
	  if(count(str_split($rs[tit]))==5){
	  $zishow=$db->query("select id,vdate from ".$db->dbprefix("aow")." where vdate='".$rs[vdate]."'")->result_array();
	  if($zishow[0]==""){
	   $db->insert("aow",array(vdate=>$rs[vdate],tit=>trim($rs[tit]),atime=>time()));
	   $i++;
	  }
	  }
	 }
	 return $i;
	}
	public function zq_h($tid){
	  $this->set->v_std($tid);
	  $str=explode("n",$_GET[a]);
	  $vdd="";
	  foreach ($str as $k=>$tk){
		  $rt= explode("v",$tk);
		  if(count(str_split($rt[0]))==8){  
		  $vdd[]=array(vdate=>$rt[0],tit=>trim($rt[1]));
		  }
	  }
	  if($vdd==""){return "";}
      $db=$this->set->database($tid); 
	  if($this->rk_d($db,$vdd)>0){
	  $td=$this->q($tid,$db);
	  if($td){
	   //$this->set->v_std($tid,$td);
	  }
	  }
	}
	public function q_s($db,$w_ds,$vdate=""){
	   $qy=$vdate?" where vdate<".$vdate:"";
	   $sqldb=$db->query("select * from ".$db->dbprefix("aow").$qy."  order by vdate desc limit 0,50")->result_array();
	   foreach ($sqldb as $k=>$rs){
		 $t=str_split($rs[tit]);
		 $v1[]=$t[$w_ds[0]];
		 $v2[]=$t[$w_ds[1]];
		 //$vg[]=substr($t[$w_ds[0]]+$t[$w_ds[1]],-1);
	   }
	   $v1=array_unique($v1);
	   $v2=array_unique($v2);
	  // $vg=array_unique($vg);
	   $v1=substr(implode("",$v1),0,7);
	   $v2=substr(implode("",$v2),0,7);
	   $d="";
	   foreach (str_split($v1) as $a){
		foreach (str_split($v2) as $b){
		  $d[]=$a.$b;
		}
	   }
	   return $d;
	}
	public function qxjg($db,$rs){
      $z=$rs[z];
	  $dbname="a0";
	  $bd=$db->query("select * from ".$db->dbprefix($dbname)."  where v<".$rs[vdate]." order by v desc limit 0,1")->result_array();
	  $sdb=$bd[0];
      $zd=trim(substr($z.$sdb[zd],0,20));
	  $zi=$z==1?0:$sdb[zi]+1;
	  $zk=0;
	  if(count(str_split($zd))==20){
	  foreach (str_split($zd) as $zk_i){
		if($zk_i==1){$zk++;}
	  }
	  }
	  $di=(int)$sdb[di];
	  $dk=(int)$sdb[dk];
	  $dg=(int)$sdb[dg];
      $kj=0;
	  if($sdb[di]>0){
	  $kj=$kj+($z==1?$sdb[di]:(0-$sdb[di])); 
	  if($kj>0){$dk++;}else{$dk--;}
	  }
	  $kjh=($kj+$sdb[kjh]);
	  if($dk==4){
	    $di=0;
	  }elseif($dk==-4){
	    $di=0;
	  }
	  if($kjh<=-10){
		$dg++;
		$kjz=($kjh+$sdb[kjz]);
		$kjh=0; 
	  }elseif(
	     $sdb[kjz]>=10){$dg=0;$sdb[kjzz]=($sdb[kjz]+$sdb[kjzz]);$sdb[kjz]=0;
	  }
	  
	  if($zi<=2){
		  $di=($dg+1);
	  }else{
		  $di=0;
	  }
	  
	  
//	  if($zd=="1000"){
//		if($kjh<=-4){
//		$dg=ceil(str_replace("-","",$kjh)/2);
//	    $di=$dg;
//		}else{
//	    $di=1;
//		}
//	  }
      $di=$di>2?2:$di;
	  $kjz=trim($sdb[kjz]);
	  $kjzz=trim($sdb[kjzz]);
	  if($kjh>=0){$kjz=($kjh+$sdb[kjz]);$kjh=0;}
	  $db->insert($dbname,array(v=>$rs[vdate],t=>trim($rs[tit]),z=>$z,zd=>$zd,zi=>$zi,zk=>$zk,di=>$di,dk=>$dk,dg=>$dg,kj=>$kj,kjh=>$kjh,kjz=>$kjz,kjzz=>$kjzz));	
	}
	public function q($tid,$db){
	 // $db->query("TRUNCATE `".$db->dbprefix("a0")."`;");
	   $w_ds=str_split(34);
	   $w_ds[0]--;
	   $w_ds[1]--;
	   $sqldb=$db->query("select * from ".$db->dbprefix("aow")." where z=2")->result_array();
	   foreach ($sqldb as $k=>$rs){
		   $t=str_split($rs[tit]);
		   $zd=$this->set->set($this->q_s($db,$w_ds,$rs[vdate]),$t[$w_ds[0]].$t[$w_ds[1]]);
	       $db->query("update ".$db->dbprefix('aow')." set z=".$zd." where vdate=".$rs[vdate]);
	   }
	   
	   $sqldb=$db->query("select * from ".$db->dbprefix("aow")."  order by vdate desc limit 0,50")->result_array();
	   krsort($sqldb);
	   foreach ($sqldb as $k=>$rs){
		  $zishow=$db->query("select id from ".$db->dbprefix("a0")." where v='".$rs[vdate]."'")->result_array();
		  if($zishow[0]==""){
		   $this->qxjg($db,$rs);
		  }
	   }
	   
	   $vvi=1;
	   for ($ki=0; $ki<=25; $ki++) {
	   $zvi=0;
	   $sqldb=$db->query("select * from ".$db->dbprefix("aow")."  order by vdate desc limit ".$ki.",20")->result_array();
	   foreach ($sqldb as $k=>$rs){
		   if($rs[z]==0){
		   $zvi++;
		   }
		   if($k==0){echo $zvi."-";}
	   }
	   echo $zvi;
	   echo "<br />";
	   }
	   $bd=$db->query("select * from ".$db->dbprefix("a0")."   order by v desc limit 0,1")->result_array();
	   $sdb=$bd[0];
	   if($sdb[di]>0){
	   $d=$this->q_s($db,$w_ds);
	   return $this->set->v_td($d,$sdb[di],$w_ds);
	   }else{
	   return "";
	   }
	}
}
?>
