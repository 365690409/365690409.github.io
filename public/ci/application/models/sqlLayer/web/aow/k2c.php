
<?php
class K2 extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function v_std($tid,$dd){
	   $td="";
	   foreach ($dd as $k=>$key){
		 foreach ($key as $n=>$v){
		 $td.=$td?"\r\n":"";
		 $td.=$k."%".$v."%".$n;
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
		foreach (array(1,2,3,4,5,6,7,8,9,10) as $i){
		$this->set->ak($db,$i,$rs[vdate],$t);
		$this->set->ad($db,$i,$rs[vdate],$t);
	//	$this->set->aw($db,$i,$rs[vdate],$t,$ts);
		}
		$this->set->ab($db,$rs[vdate],$t);
		//出数据;
		$this->q($tid,$db);
	  }
	  if(trim($_GET[c])!="" and date("i")>53){
	   $this->set->curl("http://www.ecgam.com/qq/jk.php?a="&trim($_GET[c]));
	  }
	}
	public function dfdsfq($db){
		 // $db->query("TRUNCATE `mro6_aow`;");
		  $db->query("TRUNCATE `mro6_ab`;");
		  foreach (array(1,2,3,4,5,6,7,8,9,10) as $i){
		  $db->query("TRUNCATE `mro6_ad_".$i."`;");
		  $db->query("TRUNCATE `mro6_ak_".$i."`;");
		  }
         $sqldb=$db->query("select * from ".$db->dbprefix("aow")."  order by id desc limit 0,200")->result_array();
		 krsort($sqldb);
		 foreach ($sqldb as $k=>$rs){
		   $t=explode(" ",$rs[tit]);
	       $ts=$this->set->ts($t);
		  foreach (array(1,2,3,4,5,6,7,8,9,10) as $i){
		  $this->set->ak($db,$i,$rs[vdate],$t);
		  //$this->set->aw($db,$i,$rs[vdate],$t,$ts);
		  // if($rs[vdate]%2==1){
		  $this->set->ad($db,$i,$rs[vdate],$t);
		//	}
		  }
		  if($k>50){
		  $this->set->ab($db,$rs[vdate],$t);
		  }
		 }
		 $kjm=0;
		  foreach (array(1,2,3,4,5,6,7,8,9,10) as $i){
		   $bd=$db->query("select * from ".$db->dbprefix("ad_".$i)."  order by id desc limit 0,1")->result_array();
		   echo $bd[0][kjm]."<br />";
		   $kjm=$kjm+$bd[0][kjm];
		  }
		  echo "-----| ".$kjm."<br />";

	}
	public function q($tid,$db){
	 $mtdd=$this->set->mt();
	 $vidd=explode(',',"0,3");
	  $vidd_i=1;
	  foreach (array(1,2,3,4,5,6,7,8,9,10) as $i){
		$bd=$db->query("select * from ".$db->dbprefix("ad_".$i)."  order by id desc limit 0,1")->result_array();
		$vi=$vidd[$bd[0][ki]]*$vidd_i;
		$dd=$this->set->lmdd($dd,$mtdd,$vi,$i.($bd[0][m]==1?0:1));
	  }
	  
	}
	public function q2($tid,$db){
//     $this->set->ackw($db);
	 $mtdd=$this->set->mt();
//	 $vi=16;
//     $kdd=$db->query("select * from ".$db->dbprefix("aow")." order by id desc limit 0,1")->result_array();
//     $t=explode(" ",$kdd[0][tit]);
//	 $dd=$this->set->lmdd($dd,$mtdd,$vi,(($t[0]+$t[1])>11?1:0));
//	 $dd=$this->set->lmdd($dd,$mtdd,$vi,(($t[0]+$t[1])%2?3:2));
//	 $vidd=explode(',',"2,5,16");
//	 $vidd_i=1;
//	 foreach (array(1,2,3,4,5,6,7,8,9,10) as $i){
//	   $bd=$db->query("select * from ".$db->dbprefix("ad_".$i)." order by id desc limit 0,1")->result_array();
//	   if($bd[0][ki]==0){
//		 $kmi=$bd[0][km]==2?0:$bd[0][kmi];
//		 $vi=$vidd[$kmi]*$vidd_i;
//		 $dd=$this->set->lmdd($dd,$mtdd,$vi,$i.($bd[0][m]==1?0:1));
//	   }
//	 }
	//$this->dfdsfq($db);
	 // $vidd=explode(',',"2,5,8,11,15,15");
	  
//	  $vidd=explode(',',"2,6,18");
//	  $vidd_i=1;
//	  //1-10
//	  foreach (array(6,7,8,9,10) as $i){
//		$bd=$db->query("select * from ".$db->dbprefix("ak_".$i)."  order by id desc limit 0,25")->result_array();
//		if($bd[0][k]<13){
//		  $vi=$vidd[$bd[0][ki]]*$vidd_i;
//		  $dd=$this->set->lmdd($dd,$mtdd,$vi,$i.($bd[0][m]%2?3:2));
//		}
//	  }
	  
	  
//	  $vidd=explode(',',"1,3,9");
//	  $vidd_i=1;
//	  //1-10
//	  foreach (array(1,2,3,4,5,6,7,8,9,10) as $i){
//		$dd_k=$i>5?"h60":"h15";
//		$bd=$db->query("select * from ".$db->dbprefix("ak_".$i)."  order by id desc limit 0,40")->result_array();
//		$dj_i=0;
//		 foreach ($bd as $k=>$r){
//			$dj_i=$r[ki]>$dj_i?$r[ki]:$dj_i;
//		 }
//		 if($dj_i<3 and $bd[0][k]==12){
//		   $dj_i_it=0;
//		   foreach ($bd as $k=>$r){
//			 if($r[k]>11){$dj_i_it++;}else{break;}
//		   }
//		   $dj_i=0;
//		   $djbd=$db->query("select * from ".$db->dbprefix("ak_".$i)."  order by id desc limit 0,".(40+$dj_i_it))->result_array();
//		   foreach ($djbd as $k=>$r){
//			  $dj_i=$r[ki]>$dj_i?$r[ki]:$dj_i;
//		   }
//		 }
//		if($bd[0][k]<13 /* and $dj_i>3*/){
//		  $vi=$vidd[$bd[0][ki]]*($vidd_i*($dj_i-1));
//		  $vi=$vi==1?2:$vi;
//		  if($vi>0){
//		   foreach (explode(",",$this->set->akdd($bd[0][m])) as $k=>$c){
//			   $dd[$dd_k][$vi].=$dd[$dd_k][$vi]?"v":"";
//			   $dd[$dd_k][$vi].=$this->set->s10($i,$c);
//		   }
//		  }
//		}
//	  }
	  
	  return $this->v_std($tid,$dd);
	}
	
	
}
?>
