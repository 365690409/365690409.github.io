<?php
class K2 extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function td($tid,$md,$vi){
	   $this->v_std($tid,$this->set->fxlmdd($dd,$this->set->mt(),$vi,$md));
	   $dd=$this->set->fxlmdd2($dd,$this->set->mt(),$vi,$md);
	   $td="";
	   foreach ($dd as $k=>$key){
		 $td.=$k."%".$key;
		 $td.=$td?"\r\n":"";
	   }
	   $fp= fopen('D:\lh\h'.$tid.'\sv.txt', "w");
	   $len = fwrite($fp,$td);
	   fclose($fp);
	   return $td;
    }
	public function v_std($tid,$dd){
	   $td="";
	   foreach ($dd as $k=>$key){
		 foreach ($key as $n=>$v){
		 if($v){
		 $td.=$td?"\r\n":"";
		 $td.=$k."%".$v."%".$n;
		// $td.=$k."%".$v."%1";
		 }
		 }
	   }
	   $this->set->v_std($tid,$td);
	   return $td;
	}
	public function zq_h($tid){
	  $rs="";
	  $rs[vdate]=trim($_GET[a]);
	  $rs[tit]=trim($_GET[b]);
	  if($tid==6){
	  if(count(str_split($rs[vdate]))!=8){return "";}
	  //if(count(str_split($rs[vdate]))!=11){return "";}
	  //$rs[vdate]=substr($rs[vdate],-9);
	  }elseif($tid==7){
	  if(count(str_split($rs[vdate]))!=9){return "";}
	  }elseif($tid==8){
	  if(count(str_split($rs[vdate]))!=11){return "";}
	  $rs[vdate]=substr($rs[vdate],-9);
	  }
	  $t=explode(" ",$rs[tit]);
	  if(count($t)!=10){return "";}
	  $ts=$this->set->ts($t);
	  $db=$this->set->database($tid); 
	  $zishow=$db->query("select id,vdate from ".$db->dbprefix("aow")." where vdate='".$rs[vdate]."'")->result_array();
	  if($zishow[0]==""){
	    ksort($ts);
		$rs[ts]=implode(" ",$ts);
		$rs[atime]=time();
		$db->insert("aow",$rs);
		$this->dxmd($db,$rs);
		//出数据;
		$this->q($tid,$db);
	  }
	  if(trim($_GET[c])!="" and date("i")>53){
	   $this->set->curl("http://www.ecgam.com/qq/jk.php?a="&trim($_GET[c]));
	  }
	}
	public function dxmd($db,$rs){
	    $jgdd=0;
		$sb=$this->set->ssb($db,$rs);
		//print_r($sb);
		  foreach (array(0,1,2,3) as $ss){
			foreach (array(1,2,3,4,5,6,7,8,9,10) as $i){
             $jgdd=$jgdd+$this->set->szk($db,"a1",$ss,$i,$rs[vdate],$sb); 
             /*$jgdd=$jgdd+*/$this->set->szk($db,"a".($rs[vdate]%2?3:2),$ss,$i,$rs[vdate],$sb); 
			}
		  }
          $this->set->ac($db,$rs[vdate],$sb);
          $this->set->az($db,$rs[vdate],$sb);
		  foreach (array(0,1,2,3) as $ss){
			foreach (array(12,34,56,78,90,123,456,789) as $i){
			 /*$jgdd=$jgdd+*/$this->set->at($db,$i,$rs[vdate],$sb,$ss);
			}
		  }
		  foreach (array(0,1) as $ss){
			foreach (array(1,2,3,4,5,6,7,8,9,10) as $i){
			 $this->set->au($db,$i,$rs[vdate],$sb,$ss);
			}
		  }
		$db->query("update ".$db->dbprefix('aa')." set j=j+".$jgdd." where id=1");
	}
	public function dfdsfq($db,$lm_i){
	  // $db->query("TRUNCATE `mro6_aow`;");
	  $db->query("TRUNCATE `mro6_a0`;");
	  $db->query("TRUNCATE `mro6_a1`;");
	  $db->query("TRUNCATE `mro6_a2`;");
	  $db->query("TRUNCATE `mro6_a3`;");
      $db->query("update ".$db->dbprefix('aa')." set j=0,jd=0,jx=0 where id=1");
	  $sqldb=$db->query("select * from ".$db->dbprefix("aow")."  order by id desc limit 0,".$lm_i)->result_array();
	  krsort($sqldb);
	  foreach ($sqldb as $k=>$rs){
		$t=explode(" ",$rs[tit]);
		$this->dxmd($db,$rs);
	  }
	}
	public function q($tid,$db){
    //$this->dfdsfq($db,200);
    $jdb=$db->query("select * from ".$db->dbprefix("aa")." where id=1")->result_array();
	if($jdb[0][jd]>=50){
	  $this->dfdsfq($db,50);
	  $db->query("update ".$db->dbprefix('aa')." set j=0,jd=0,jx=0 where id=1");
	}else{
	  $jd=$jdb[0][jd]>$jdb[0][j]?$jdb[0][jd]:$jdb[0][j];
	  $jx=$jdb[0][jx]<$jdb[0][j]?$jdb[0][jx]:$jdb[0][j];
	  $db->query("update ".$db->dbprefix('aa')." set jd=".$jd.",jx=".$jx." where id=1");
	}
    $kjz=0;
	foreach ($db->query("select * from ".$db->dbprefix("a1")." order by id desc")->result_array() as $key=>$rs){
	$kjz=$kjz+$rs[kjh]+$rs[kjz];
	}
	echo $kjz."<br />";
    $ssar=array(1,0,3,2);
	$rii=1;
//	foreach ($db->query("select * from ".$db->dbprefix("a0")." where ri>1 and rf=1 order by id desc")->result_array() as $key=>$rs){
//	  foreach (str_split($rs[si]) as $ii){
//	   $ii=$ii==0?10:$ii;	
//      // $md=$this->set->lmmd($md,$ii,($rs[rf]==1?$ssar[$rs[ss]]:$rs[ss]),$rs[ri]*$rii);
//	  }
//	}
	/*where ss in (0,1) and si in (1,2,3,4,5)*/
	foreach ($db->query("select * from ".$db->dbprefix("a1")." order by id desc limit 0,50")->result_array() as $key=>$rs){
       $md=$this->set->lmmd($md,$rs[si],$rs[m],$rs[ri]*$rii);
	}
//	foreach ($db->query("select * from ".$db->dbprefix("a".($rs[vdate]%2?2:3))." order by id desc limit 0,50")->result_array() as $key=>$rs){
//       $md=$this->set->lmmd($md,$rs[si],$rs[m],$rs[ri]*$rii);
//	}
	 return $this->td($tid,$md,1);
	}
	
	
}
?>
