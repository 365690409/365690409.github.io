<?php
class K2 extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function v_std($tid,$td=""){
	    $fp= fopen('D:\lh\h'.$tid.'\v.txt', "w");
		$len = fwrite($fp,$td);
		fclose($fp);
	}
	public function v_stdr($tid,$td=""){
	    $fp= fopen('D:\lh\h'.$tid.'\t.txt', "w");
		$len = fwrite($fp,$td);
		fclose($fp);
	}
	public function h_t($sqldb,$s,$xs,$jk=""){
	   $jd="";
	   $jd[]=$jk;
	   foreach ($sqldb as $k=>$rs){
		  $t=explode(',',$rs[$xs]);
		  $jd[]=$t[$s];
	   }
	   $vi=0;
	   foreach ($jd as $k=>$v){
		 if($k==0){
		    $jk=$v;
		 }else{
			if($jd[$k-1]!=$v) {
              $vi++;
			}else{
			break;
			}
		 }
	   }
	   return $vi;
	}
	public function h($tid,$str=""){
	   $this->v_stdr($tid);
	   $this->v_std($tid);
	   $str = explode('期結果',$str);
	   $vdate =str_replace("?","",$str[0]);
	   $vdate =str_replace("第","",$vdate);
	   $tit =explode("│",$str[1]);
	   $tit =trim($tit[0]);
		 $rs="";
		 $rs[vdate]=substr($vdate,-9);
		 $rs[tit]=$tit;
		 $t=explode(" ",$rs[tit]);
		 if($tid==6){
		  if(count(str_split($rs[vdate]))!=8){return "";}
		 }elseif($tid==7){
		  if(count(str_split($rs[vdate]))!=9){return "";}
		 }
		  if(count($t)==10){
		 $db=$this->set->database($tid); 
	     $sqldb=$db->query("select * from ".$db->dbprefix("aow")."  order by vdate desc limit 0,30")->result_array();
		 $v="";
		 $vt="";
		 foreach (array(0,1,2,3,4,5,6,7,8,9) as $i){
		 $v[]=$t[$i]>5?1:0;
		 $vt[]=$this->h_t($sqldb,$i,"dx",$t[$i]>5?1:0);
		 }
		 $rs[dx]=implode(",",$v);
		 $rs[dxt]=implode(",",$vt);
		 $v="";
		 $vt="";
		 foreach (array(0,1,2,3,4,5,6,7,8,9) as $i){
		 $v[]=$t[$i]%2?1:0;
		 $vt[]=$this->h_t($sqldb,$i,"ds",$t[$i]>5?1:0);
		 }
		 $rs[ds]=implode(",",$v);
		 $rs[dst]=implode(",",$vt);
		 $rs[atime]=time();
		  $zishow=$db->query("select id,vdate from ".$db->dbprefix("aow")." where vdate='".$rs[vdate]."'")->result_array();
		  if($zishow[0]==""){
		   $db->insert("aow",$rs);
		   //break;
		   $this->v_stdr($tid,1);
		   $td="";
		   $td.=$this->c($db);
	       $td =str_replace("dj%10000","dj%500",$td);
		   foreach (array(1,2,3,4,5,6,7,8,9) as $i){
		   $td.=$td?"\r\n":"";
		   $td.=$this->c($db,$i);
		   }
		   foreach (array(1,2,3,4,5,6,7,8,9) as $i){
		   $td.=$td?"\r\n":"";
		   $td.=$this->c($db,$i,2,1);
		   }
	       $this->v_std($tid,$td);
		  }
		  }
	}
	public function c($db,$s=0,$l=2,$p=0){
	   $sqldb=$db->query("select * from ".$db->dbprefix("aow")."  order by vdate desc limit 0,300")->result_array();
	   $jd="";
	   foreach ($sqldb as $k=>$rs){
		  $t=explode(' ',$rs[tit]);
		  if($s==10){
		  $w=($t[0]+$t[1])>11?1:0;
		  }else{
		   if($p==1){
		  $w=$t[$s]%2?1:0;
		   }else{
		  $w=$t[$s]>5?1:0;
		   }
		  }
	      echo $w;
		  $jd[]= $w;
	   }
	   echo "<br />";
	   $r=$this->c_r($jd,$l);
	   $vi=$r[vi];
	   $zb="";

	   if($p==1){
	   $zb[0]=array("379,429","379,402");
	   $zb[1]=array("591,429","591,402");
	   $zb[2]=array("808,429","808,402");
	   $zb[3]=array("1021,429","1021,402");
	   $zb[4]=array("1237,429","1237,402");
	   $zb[5]=array("379,620","379,592");
	   $zb[6]=array("591,620","591,592");
	   $zb[7]=array("808,620","808,592");
	   $zb[8]=array("1021,620","1021,592");
	   $zb[9]=array("1237,620","1237,592");
	   $zb[10]=array("700,295","436,294");
	   }else{
	   $zb[0]=array("379,374","379,350");
	   $zb[1]=array("591,374","591,350");
	   $zb[2]=array("808,374","808,350");
	   $zb[3]=array("1021,374","1021,350");
	   $zb[4]=array("1237,374","1237,350");
	   $zb[5]=array("379,565","379,539");
	   $zb[6]=array("591,565","591,539");
	   $zb[7]=array("808,565","808,539");
	   $zb[8]=array("1021,565","1021,539");
	   $zb[9]=array("1237,565","1237,539");
	   $zb[10]=array("700,295","436,294");
	   }
	   if($s==10){
	   $s_vi=explode(',',"2,6,14");
	   $vi=$s_vi[$vi]*2;
	   }elseif($s==0){
	   $s_vi=explode(',',"10,13,27,40,60");
	   $vi=$s_vi[$vi]*2;
	   }else{
	   $s_vi=explode(',',"0,0,0,0,0,0,2,6,14");
	   $vi=$s_vi[$vi]*10;
	   }
	   if($vi>1){
	   return "dj%10000%".$zb[$s][$r[jk]]."|dj%100%745,659|qft%10%".$vi."|aj%100%Enter|aj%100%Enter";
	   }
	   return "";
	}
	public function c_r($jd,$l=2){
	   $vi=0;
	   if($l==2){
	   foreach ($jd as $k=>$v){
		 if($k==0){
		    $jk=$v;
		 }else{
			if($jd[$k-1]!=$v) {
              $vi++;
			}else{
			break;
			}
		 }
	   }
	   }else{
	   $jk=$l;
	   foreach ($jd as $k=>$v){
		  if($v!=$jk) {
			$vi++;
		  }else{
		  break;
		  }
	   }
	   }
	   $r="";
	   $r[jk]=$jk;
	   $r[vi]=$vi;
	   return $r;
	}
	public function q($db){
	  $sqldb=$db->query("select * from ".$db->dbprefix("aow")."  order by vdate desc limit 0,1")->result_array();
	   $t=explode(',',$sqldb[0][dx]);
	   $tv=explode(',',$sqldb[0][dxt]);
		echo $t[0]."=".$tv[0];
		echo "<br />";
		$td="";
	   foreach (array(1,2,3,4,5,6,7,8,9) as $i){
	   $td.=$td?"\r\n":"";
	   $td.=$this->c($db,$i);
	   }
	   foreach (array(1,2,3,4,5,6,7,8,9) as $i){
	   $td.=$td?"\r\n":"";
	   $td.=$this->c($db,$i,2,1);
	   }
	   echo $td;
	}
}
?>
