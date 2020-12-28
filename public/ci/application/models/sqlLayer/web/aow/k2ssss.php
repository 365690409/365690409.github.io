
<?php
class K2 extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function v_std($tid,$jg){
	   $td="";
	   foreach ($jg as $k=>$key){
	   $td.=$td?"|ss%15000|":"";
	   $td.=$key."dj%100%745,659|qft%10%".$k."|aj%100%Enter|aj%100%Enter";
	   }
	   $this->set->v_std($tid,$td);
	   return $td;
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
	public function h_d($sqldb,$s,$xs,$jk=""){
	   $jd="";
	   $jd[]=$jk;
	   foreach ($sqldb as $k=>$rs){
		  $t=explode(',',$rs[$xs]);
		  $jd[]=$t[$s];
	   }
	   $vi=0;
	   foreach ($jd as $k=>$v){
			if($v==1) {
              $vi++;
			}else{
			break;
			}
	   }
	   return $vi;
	}
	public function szz($s=0,$k=2){
	   $zb="";
	   $zb[0]="382,455v595,455v808,455v1021,455v1234,455";
	   $zb[1]="382,482v595,482v808,482v1021,482v1234,482";
	   $zb[2]="382,510v595,510v808,510v1021,510v1234,510";
	   $zb[3]="382,536v595,536v808,536v1021,536v1234,536";
	   $zb[4]="382,563v595,563v808,563v1021,563v1234,563";
	   $zb[5]="382,589v595,589v808,589v1021,589v1234,589";
	   $zb[6]="382,616v595,616v808,616v1021,616v1234,616";
	   $zb[7]="382,644v595,644v808,644v1021,644v1234,644";
	   $zb[8]="382,672v595,672v808,672v1021,672v1234,672";
	   $zb[9]="382,698v595,698v808,698v1021,698v1234,698";
	   return "pind%".$zb[$s]."%".$k;
	}
	public function wz($p="lh",$s=0,$jk){
	 // $jk=$jk==1?0:1;
	   $zb="";
	   if($p=="lh"){
	   $zb[0]=array("379,484","379,457");
	   $zb[1]=array("591,484","591,457");
	   $zb[2]=array("808,484","808,457");
	   $zb[3]=array("1021,484","1021,457");
	   $zb[4]=array("1237,484","1237,457");
	   }elseif($p=="ds"){
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
	   return $zb[$s][$jk];
	}
	public function h($tid,$str=""){
	   $str = explode('期結果',$str);
	   $vdate =str_replace("?","",$str[0]);
	   $vdate =str_replace("第","",$vdate);
	   $tit =explode("│",$str[1]);
	   $tit =trim($tit[0]);
	   $this->zq_h($tid,$vdate,$tit);
	}
	public function zq_h($tid,$vdate,$tit){
		 $rs="";
		 $rs[vdate]=substr($vdate,-9);
		 $rs[tit]=$tit;
		 $t=explode(" ",$rs[tit]);
		 if($tid==6){
		  if(count(str_split($rs[vdate]))!=8){return "";}
		 }elseif($tid==7){
		  if(count(str_split($rs[vdate]))!=9){return "";}
		 }elseif($tid==8){
		  if(count(str_split($rs[vdate]))!=9){return "";}
		 }
		  if(count($t)==10){
		 $db=$this->set->database($tid); 
	     $sqldb=$db->query("select * from ".$db->dbprefix("aow")."  order by vdate desc limit 0,30")->result_array();
		 $ts="";
		 foreach (array(1,2,3,4,5,6,7,8,9,10) as $a){
		   foreach ($t as $k=>$i){
			   if($i==$a){$ts[]=($k+1);}
		   }
		 }
		 $v="";
		 $vt="";
		 $vd="";
		 foreach (array(0,1,2,3,4,5,6,7,8,9) as $i){
		 $vv=$ts[$i]>5?1:0;
		 $v[]=$vv;
		 $vt[]=$this->h_t($sqldb,$i,"sz",$vv);
		 $vd[]=$this->h_d($sqldb,$i,"sz",$vv);
		 }
		 $rs[st]=implode(",",$ts);
		 $rs[sz]=implode(",",$v);
		 $rs[szt]=implode(",",$vt);
		 $rs[szd]=implode(",",$vd);
		 $v="";
		 $vt="";
		 $vi=9;
		 foreach (array(0,1,2,3,4) as $i){
		 $vv=$t[$i]>$t[$vi]?1:0;
		 $v[]=$vv;
		 $vi--;
		 $vt[]=$this->h_t($sqldb,$i,"lh",$vv);
		 }
		 $rs[lh]=implode(",",$v);
		 $rs[lht]=implode(",",$vt);
		 $v="";
		 $vt="";
		 foreach (array(0,1,2,3,4,5,6,7,8,9) as $i){
		 $vv=$t[$i]>5?1:0;
		 $v[]=$vv;
		 $vt[]=$this->h_t($sqldb,$i,"dx",$vv);
		 }
		 $rs[dx]=implode(",",$v);
		 $rs[dxt]=implode(",",$vt);
		 $v="";
		 $vt="";
		 foreach (array(0,1,2,3,4,5,6,7,8,9) as $i){
		 $vv=$t[$i]%2?1:0;
		 $v[]=$vv;
		 $vt[]=$this->h_t($sqldb,$i,"ds",$vv);
		 }
		 $rs[ds]=implode(",",$v);
		 $rs[dst]=implode(",",$vt);
		 $rs[atime]=time();
		  $zishow=$db->query("select id,vdate from ".$db->dbprefix("aow")." where vdate='".$rs[vdate]."'")->result_array();
		  if($zishow[0]==""){
		   $db->insert("aow",$rs);
		   //break;
		   $this->set->v_stdr($tid,1);
	       $this->q($tid,$db);
		  }
		  }
	}
	public function c($sqldb,$s=0,$p="lh"){
	   $t=explode(',',$sqldb[0][$p]);
	   $tv=explode(',',$sqldb[0][$p."t"]);
	   $vi=$tv[$s];
		if($this->c_s($sqldb,$s,$p."t",4)>=28){   
	    $s_vi=explode(',',"5,5,5,5,5,5,5,5,5,5");
	    $vi=$s_vi[$vi]*2;
		}else{
		 $vi=0;
		}
	   if($vi>1){
	    return array($this->wz($p,$s,$t[$s]),$vi);
	   }
	   return "";
	}
	public function ssc($sqldb,$s=0,$p="lh"){
	   $t=explode(',',$sqldb[0][$p]);
	   $tv=explode(',',$sqldb[0][$p."d"]);
	   $vi=$tv[$s];
		if($this->c_s($sqldb,$s,$p."d",2)<=1){   
	    $s_vi=explode(',',"2,3,5,6");
		if(count(str_split($sqldb[0][vdate]))==9){
	    $vi=$s_vi[$vi]*1;
		}else{
	    $vi=$s_vi[$vi]*5;
		}
		}else{
		 $vi=0;
		}
	   if($vi>1){
		   echo ($s+1)."<br />";
	    return $this->szz($s,$vi);
	   }
	   return "";
	}
	public function c_s($sqldb,$s,$xs,$a){
	   $tr=0;
	   $ti=0;
	   foreach ($sqldb as $k=>$rs){
	     $tv=explode(',',$rs[$xs]);
		 if($tv[$s]>=$a){
		   $si=$k;
		   $ti++;
		 }
		//if($k<=10){if($tv[$s]<3){$tr++;}}
	   }
	  // if($tr>8){return 0;}
	   return $ti;
	}
	public function q($tid,$db){
	   $sqldb=$db->query("select * from ".$db->dbprefix("aow")."  order by vdate desc limit 0,10")->result_array();
	   $jg="";
	   foreach (array(0,1,2,3,4,5,6,7,8,9) as $i){
	   $c=$this->ssc($sqldb,$i,"sz");
	   if($c){$jg.=$jg?"|":"";$jg.=$c;}
	   }
	   echo $this->set->v_std($tid,$jg);
	   echo $jg;
	   echo "<br />";
//	   foreach (array(0,1,2,3,4,5,6,7,8,9) as $i){
//	   $c=$this->c($sqldb,$i,"sz");
//	   if($c[1]){$jg[$c[1]].="dj%500%".$c[0]."|";}
//	   }
	   
//	   foreach (array(0,1,2,3,4) as $i){
//	   $c=$this->c($sqldb,$i,"lh");
//	   if($c[1]){$jg[$c[1]].="dj%500%".$c[0]."|";}
//	   }
//	   foreach (array(0,1,2,3,4,5,6,7,8,9) as $i){
//	   $c=$this->c($sqldb,$i,"dx");
//	   if($c[1]){$jg[$c[1]].="dj%500%".$c[0]."|";}
//	   }
//	   foreach (array(0,1,2,3,4,5,6,7,8,9) as $i){
//	   $c=$this->c($sqldb,$i,"ds");
//	   if($c[1]){$jg[$c[1]].="dj%500%".$c[0]."|";}
//	   }
	 //  echo $this->v_std($tid,$jg);
	}
}
?>
