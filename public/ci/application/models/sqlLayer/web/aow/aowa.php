<?php
class Aow extends CI_Model {
    function __construct()
    {
        parent::__construct();
	    $this->load->sqlLayer("web/usset");
	    $this->baomin="aow";
    }
	public function v_std($tid,$td=""){
		$fp= fopen('D:\cc\aow'.$tid.'.txt', "w");
		$len = fwrite($fp,$td);
		fclose($fp);
	}
	public function v_s($tid){
	   date_default_timezone_set('PRC');
	   $db=$this->usset->database(2);
	   $sqldb=$db->query("select id,vdate,atime from ".$db->dbprefix($this->baomin)." order by vdate desc limit 0,1")->result_array();
	   $atime=$sqldb[0][atime];
	   $fp= fopen('D:\lh\s\t2.txt', "w");
	   $len = fwrite($fp,(time()-$atime)>=350?"0\r\nGoogle Chrome":"1");
		fclose($fp);
	   $db=$this->usset->database(3);
	   $sqldb=$db->query("select id,vdate,atime from ".$db->dbprefix($this->baomin)." order by vdate desc limit 0,1")->result_array();
	   $atime=$sqldb[0][atime];
	    $td=(time()-$atime)>=2500?"0\r\n世界之窗浏览器":"1";
        if(date("Hi")>="0000" and date("Hi")<"0015"){
        $td="2";
		}elseif(date("Hi")>"0309" and date("Hi")<"0715"){
        $td="2";
		}
		$fp= fopen('D:\lh\s\t3.txt', "w");
		$len = fwrite($fp,$td);
		fclose($fp);
	}
	public function v_std2($tid,$td=""){
		$fp= fopen('D:\lh\v_a'.($tid==2?'ow':'ss').'.txt', "w");
		$len = fwrite($fp,$td);
		fclose($fp);
	}
	public function set($d,$v){
		return  (in_array($v,$d)?1:0);
	}
	public function v_px($d,$a="",$s=0){
		if($a<>""){
		 foreach (str_split($a) as $k){
         $d=str_replace($k,"",$d); 
		 }
		 $d=$s==0?$a.$d:$d.$a;
		}
		return  $d;
	}
	public function v_td($sc_d,$td_price,$w_d){	
	  $td="";
	  $td_i=0;
	  foreach ($sc_d as $rv => $v){
		$td.=$td_i==0?"":",";
	    $vd=str_split($v);
		if($w_d==13){
		$td.=$vd[0]."X".$vd[1]."X=".$td_price;
		}elseif($w_d==14){
		$td.=$vd[0]."XX".$vd[1]."=".$td_price;
		}elseif($w_d==15){
		$td.=$vd[0]."XXX".$vd[1]."=".$td_price;
		}elseif($w_d==23){
		$td.="X".$v."X=".$td_price;
		}elseif($w_d==24){
		$td.="X".$vd[0]."X".$vd[1]."=".$td_price;
		}elseif($w_d==25){
		$td.="X".$vd[0]."XX".$vd[1]."=".$td_price;
		}elseif($w_d==34){
		$td.="XX".$v."=".$td_price;
		}elseif($w_d==35){
		$td.="XX".$vd[0]."X".$vd[1]."=".$td_price;
		}elseif($w_d==45){
		$td.="XXX".$v."=".$td_price;
		}else{
		$td.=$v."XX=".$td_price;
		}
		$td_i++;
	  }
		 return $td;
	}
	public function b_px($rs){
		 for ($x=1; $x<=5; $x++) {
		 $ar_w[$rs["v".$x."z"]]=$x;
		 }
		 krsort($ar_w);
		 $w=str_split(implode("",$ar_w));
		return ($w[0]<$w[1]?$w[0].$w[1]:$w[1].$w[0]);
	}
	public function veid($db){
	   $vdb=$db->query("select * from ".$db->dbprefix($this->baomin."_v")." where s!=0")->result_array();
	   foreach ($vdb as $vk=>$vr){
        $y=explode(",",$vr[y]);
		$y[0]=$y[0]?$y[0]:10;
		$y[1]=$y[1]?"-".$y[1]:-5;
		$v_i=0;
	    $sqldb=$db->query("select * from ".$db->dbprefix($this->baomin)."  order by vdate desc limit 0,".$y[0])->result_array();
	    $mdd=$this->fenxi_set($db,array(i=>1),$sqldb[0]);
		if($mdd[z]==1){
	    foreach ($sqldb as $k=>$rs){
	    $mdd=$this->fenxi_set($db,array(i=>1),$rs);
		$mdd[z]==1?$v_i++:$v_i--;
		if($v_i<=$y[1]){
        $db->where('id',$vr[id]);
        $db->update($this->baomin."_v",array(s=>$vr[s]?$vr[s]:1,vdate=>$sqldb[0][vdate]));
		break;
		}
		}
		}
	   }
	}
	public function b($tid,$cc=""){
	   $db=$this->usset->database($tid);
	   $sqldb=$db->query("select vdate from ".$db->dbprefix($this->baomin)." order by vdate desc limit 0,1")->result_array();
	   echo "[".$sqldb[0][vdate]."]";
	   $sqldb=$db->query("select * from ".$db->dbprefix($this->baomin."_v")." where s!=0")->result_array();
	   $v_td="";
	   foreach ($sqldb as $k=>$vr){
		$vr[cc]=$cc;
		$amd=$this->fenxi($tid,$vr);
	   if($cc==""){
		if($amd[r]==1){
		$v_td.=$v_td?",":"";
		$v_td.=$amd[td];
		}
		echo "<br />".$amd[ws]."=".$amd[r].$amd[d];
	   }else{
		echo $amd[d];
	   }
	   }
	   if($cc==""){
	   $this->v_std($tid,$v_td);
	   }
	}	
	public function fenxi_wset($db,$show,$v_w="23",$v_s=""){
       $arrw=str_split($v_w);
	   $qy=$show[vdate]?" where vdate<".$show[vdate]:"";
	   $sqldb=$db->query("select id,tit,vdate from ".$db->dbprefix($this->baomin).$qy." order by vdate desc limit 0,30")->result_array();
	   $fb=$this->fenxi_set_b($sqldb);
	   $d=$this->fenxi_set_b_s($fb,$v_w);
	    $gd_1=substr($fb[($arrw[0]-1)],0,4);
	    $gd_2=substr($fb[($arrw[1]-1)],0,4);
	     return array(rs=>$sqldb[0],rs2=>$sqldb[1],d=>$d,wv=>"[".$gd_1."-".$gd_2."]");
       $arrw=str_split($v_w);
	   $qy=$show[vdate]?" where vdate<".$show[vdate]:"";
	   $sqldb=$db->query("select id,tit,vdate from ".$db->dbprefix($this->baomin).$qy." order by vdate desc limit 0,3")->result_array();
	   $gd_1="";$gd_2="";
	   foreach ($sqldb as $k=>$rs){
       $tr=str_split($rs[tit]);
	   $u[]=$tr[$arrw[0]];$u[]=$tr[$arrw[1]];
	   }
		$u=array_unique($u);
		krsort($u);
	    $u=$this->v_px("9876543210",substr(implode("",$u),0,3),1);
	    $gd_1=substr($u,0,7);
	    $gd_2=substr($u,0,7);
		 $d="";
		 foreach (str_split($gd_1) as $a){
		  foreach (str_split($gd_2) as $b){
			$d[]=$a.$b; 
		  }
		 }
	     return array(rs=>$sqldb[0],rs2=>$sqldb[1],d=>$d,wv=>"[".$gd_1."-".$gd_2."]");
	}
	public function f_show_dd($md,$wd="34567"){
		 //krsort($md);
		 $wd=str_split($wd);
		 arsort($md);
		 $i=0;
		 $d="";
		 foreach ($md as $n=>$v){
			 $ari=str_split(sprintf("%02d",$i));
			 if($this->set($wd,$ari[0])==1){
			 $d[]=sprintf("%02d",$n);
			 }
			 $i++;
		 }
		return $d;
	}
	public function f_dj($md,$fi=0){
	   if($md==""){return "";}
	   $i=0;
	   $d="";
	   foreach ($md as $n=>$v){
		   $i++;
		   if($i>$fi){
		   $d[]=sprintf("%02d",$n);
		   }
		   if($i==($fi+49)){break;}
	   }
	  return $d;
	}
	public function f_dsort($db,$show){
	  if($show[js]>2){
	 // arsort($show['d']);
	 // return $show['d'];
	  $qy=$show[vdate]?" where vdate<".$show[vdate]:"";
	  $sqldb=$db->query("select * from ".$db->dbprefix($this->baomin."_a".$show[w]).$qy." order by vdate desc limit 0,1")->result_array();
	  $fb=$this->fenxi_set_b($sqldb);
	  $fa=$this->fenxi_set_b_s($fb,$show[w]);
	  $ccd="";
	  foreach ($fa as $n=>$v){
	  $ccd[$n]=1;
	  }
	 // echo json_encode($fa)."<br />";
	  $show['d']=$this->dj_show_r($show['d'],$ccd);
	  arsort($show['d']);
	  return $show['d'];
	  }
	}
	public function f_show($db,$cr,$show,$fi=0){
      // $wwd=$this->dj_show($show["d"],$show["j"],0,$show[vdate]);
       $wwd=$this->f_dj($this->f_dsort($db,$show),$fi);
	   if($show[tit] and $wwd){
       $z=$this->set($wwd,$show[ak]);
	   $zs=count($wwd);
	   return array(zs=>$zs,p=>(($z==1?98:0)-$zs),z=>$z);
	   }
	}
	public function ashow0($rs,$arrw){
	   $rs["d"]=json_decode($rs["d"], true);
	   $rs["j"]=json_decode($rs["j"], true);
	   return $rs;
	}
	public function ashow($rs,$arrw){
	   $rs["d"]=json_decode($rs["d"], true);
	   $rs["j"]=json_decode($rs["j"], true);
	   if($rs["tit"]==""){return $rs;}
	   $tr=str_split($rs[tit]);
	   $rs["ak"]=($tr[($arrw[0]-1)].$tr[($arrw[1]-1)]);
	   $rs["aj"]=$rs["d"][(int)$rs["ak"]];
//	   $md=$rs["d"];
//	   arsort($md);
//	   $i=0;
//	   foreach ($md as $n=>$v){
//		   if($n==(int)$rs["ak"]){
//		   $rs["ad"]=sprintf("%02d",$i);
//		   break;
//		   }
//		   $i++;
//	   }
	   $vs=0;
	   foreach ($rs["j"] as $n=>$v){
		   if($n>=$rs[aj]){
		   $vs=$vs+$v;
		   }
	   }
	   $rs["az"]=sprintf("%02d",$vs==100?0:$vs);
	   return $rs;
	}
	public function f($tid,$sname="12",$lt=0){
	   $arrw=str_split($sname);
	   $cr="";
	   $db=$this->usset->database($tid);
	   $sqldb=$db->query("select * from ".$db->dbprefix($this->baomin."_a".$sname)." where js>2 order by vdate desc limit $lt,100")->result_array();
	   krsort($sqldb);
	   $i=1;
	   $n_p=0;
	   foreach ($sqldb as $k=>$rs){
		 $rs[w]=$sname;
		 if($sname==0){
		 $rs=$this->ashow0($rs);
		 $xvr="<br />".sprintf("%03d",$i)." - ".$rs[vdate]." - ".$rs[tit];
		 }else{
		 $rs=$this->ashow($rs,$arrw);
		 $xvr="<br />".sprintf("%03d",$i)." - ".$rs[vdate]." - ".$rs[ak]." - ".$rs[js]." - c".$rs[az]." - ".number_format($rs[aj],1);
		 $md=$this->f_show($db,$cr,$rs);
		 if($md){
		 $cr[np]=$cr[np]+$md[p];
		 $xvr.=" | ".$md[zs]." - ".$md[z]." v ".($md[p]>0?"&nbsp;".$md[p]:$md[p])."=".$cr[np];
		 }
		 }
		 $xsd=$xvr.$xsd;
		 $i++;
	   }
	   return  $xsd;
	}
	public function x_dg($db,$show){
	  $wtr=str_split($show[tit]);
	  $qy=$show[vdate]?" where vdate<".$show[vdate]:"";
	  $sqldb=$db->query("select * from ".$db->dbprefix($this->baomin).$qy." order by vdate desc limit 0,50")->result_array();
	  foreach ($sqldb as $k=>$rs){
	  $tr=str_split($rs[tit]);
	  $wd[$tr[0]]++;
	  }
      //$u=array_unique($u);
	  arsort($wd);
	  $u="";
	  foreach ($wd as $v=>$n){
		  $u[]=$v;
	  }
	  $c=substr(implode("",$u),0,7);
	  //if(count($u)>4){
	  return "".count($u)."  ". $c."  =".$this->set(str_split($c),$wtr[0]);
	 //}
	}
	public function x($tid,$sname="12",$lt=0){
	   $arrw=str_split($sname);
	   $cr="";
	   $db=$this->usset->database($tid);
	   $sqldb=$db->query("select * from ".$db->dbprefix($this->baomin)." order by vdate desc limit $lt,100")->result_array();
	   krsort($sqldb);
	   $i=1;
	   $n_p=0;
	   foreach ($sqldb as $k=>$rs){
		 $xvr="<br />".sprintf("%03d",$i)." - ".$rs[vdate]." - ".$rs[tit]."  ".$this->x_dg($db,$rs);
		 $xsd=$xvr.$xsd;
		 $i++;
	   }
	   return  $xsd;
	}
	public function fc($db,$sname="12",$fi=0){
	  if($sname==1){
	  $sqldb=$db->query("select * from ".$db->dbprefix($this->baomin)." order by vdate desc limit 0,1")->result_array();
	  $mdd=$this->fenxi_set($db,array(i=>1),$sqldb[0],$fi);
	  return array(vdate=>$sqldb[0][vdate],ws=>$mdd[ws],p=>$mdd[price]);
	  }
	   $qy=" where tit<>'' and js>2";
	   $sqldb=$db->query("select * from ".$db->dbprefix($this->baomin."_a".$sname).$qy." order by vdate desc limit 0,1")->result_array();
	   if($sqldb[0]){
	   $rs=$sqldb[0];
	   $rs[w]=$sname;
	   $rs=$this->ashow($rs,str_split($sname));
	   $md=$this->f_show($db,"",$rs,$fi>0?49:0);
	   if($md){
	   return array(vdate=>$rs[vdate],p=>$md[p]);
	   }
	   }
	}
	public function fenxi_set_c($sqldb,$x){
	   $i=1;
	   foreach ($sqldb as $k=>$rs){
       $tr=str_split($rs[tit]);
	   if($k==0){
	   $t_dx=$tr[$x]>4?1:0;
	   }else{
	   $n_dx=$tr[$x]>4?1:0;
	   if($t_dx==$n_dx){$i++;}else{break;}
	   }
	   }
	   return $i;
	}
	
	public function fenxi_set_b($sqldb){
	   foreach ($sqldb as $k=>$rs){
       $tr=str_split($rs[tit]);
	   for ($x=0; $x<=4; $x++) {
	   $lm[$x][]=(int)$tr[$x];
	   }
	   }
	   $md="";
	   for ($x=0; $x<=4; $x++) {
	   foreach (array_unique($lm[$x]) as $v=>$n){
		  $md[$x].=$n;
	   }
	   }
	   return $md;
	}
	

	public function fenxi_set_b_sr($a){
	  $rd="9876543210";
      foreach (str_split($a) as $k){
         $rd=str_replace($k,"",$rd); 
	  }
	  return $rd;
	}
	public function fenxi_set_b_s($md,$w,$n_s=0){
	   $ws=str_split($w);
	   $wd[0]=$this->fenxi_set_b_sr(substr($md[($ws[0]-1)],0,3));
	   $wd[1]=$this->fenxi_set_b_sr(substr($md[($ws[1]-1)],0,3));
	  // $wd[0]="2345678";
	  // $wd[1]="2345678";
	   $cd="";
	   foreach (str_split($wd[0]) as $n){
	   foreach (str_split($wd[1]) as $v){
		 $cd[]=$n.$v;
	   }
	   }
	   if($n_s==1){return $cd;}
	   $ed="";
		for ($x=0; $x<=99; $x++) {
		 $v=sprintf("%02d",$x);
		 $ed[]=$v;
		}
	   $ed=array_diff($ed,$cd);
	   return $ed;
	}
	public function fenxi_setc($db,$vr,$show,$n_s=0){
		 if($vr[s]==2){
		 return $this->duoc_set($db,$vr,$show);
		 }
	   $qy=$show[vdate]?" where vdate<".$show[vdate]:"";
	   $sqldb=$db->query("select id,tit,vdate from ".$db->dbprefix($this->baomin).$qy." order by vdate desc limit 0,800")->result_array();
	   $w="45";
	   $arrw=str_split($w);
	   $cd="";
	   foreach ($sqldb as $k=>$rs){
         $tr=str_split($rs[tit]);
		 $cd[]=$tr[($arrw[0]-1)].$tr[($arrw[1]-1)];
	   }
	   $kd="";
	   foreach (array_unique($cd) as $v=>$n){
		   $kd[]=sprintf("%02d",$n);
	   }
	   $fi=$n_s==1?50:0;
	   $i=0;
	   $md="";
	   foreach ($kd as $v=>$n){
		   $i++;
		   if($i>$fi){
		   $md[]=sprintf("%02d",$n);
		   }
		   if($i==($fi+50)){break;}
	   }
	}
	public function fenxi_set($db,$vr,$show,$n_s=0){
		 if($vr[s]==2){
		 return $this->duoc_set($db,$vr,$show);
		 }
	   $qy=$show[vdate]?" where vdate<".$show[vdate]:"";
	   $sqldb=$db->query("select id,tit,vdate from ".$db->dbprefix($this->baomin).$qy." order by vdate desc limit 0,".($n_s==1?100:300))->result_array();
	   $w="45";
	   $arrw=str_split($w);
	   $cd="";
	   foreach ($sqldb as $k=>$rs){
         $tr=str_split($rs[tit]);
		 $trname=$tr[($arrw[0]-1)].$tr[($arrw[1]-1)];
		 $cd[$trname]++;
	   }
	  arsort($cd);
	  $u="";
	  foreach ($cd as $v=>$n){
		  $u[]=$v;
	  }
	   $fi=$n_s==1?50:0;
	   $fi=50;
	   $i=0;
	   $md="";
	   $u=array_unique($u);
	   foreach ($u as $v=>$n){
		   $i++;
		   if($i>$fi){
		   $md[]=sprintf("%02d",$n);
		   }
		   if($i==($fi+49)){break;}
	   }
	   
	   
	   $ard=array(d=>$md);
//	   $qy=$show[vdate]?" where vdate<".$show[vdate]:"";
//	   $sqldb=$db->query("select id,tit,vdate from ".$db->dbprefix($this->baomin).$qy." order by vdate desc limit 0,30")->result_array();
//	   $s="";
//	   $w="34";
//	   $fb=$this->fenxi_set_b($sqldb);
//	   $fa=$this->fenxi_set_b_s($fb,$w,$n_s);
	   //echo json_encode($fb)."<br />";
		// $ard=array(d=>$fa);
		 if($show){
         $arrw=str_split($w);
         $tr=str_split($show[tit]);
		 $i=1;
		 $z=$this->set($ard[d],$tr[($arrw[0]-1)].$tr[($arrw[1]-1)]);
		 $z_p=(($z==1?99:0)-count($ard[d]))*$vr[i]*$i;
	   return array(i=>($i*$vr[i]),ws=>$w,z=>$z,x=>count($ard[d])."*".($vr[i]*$i),price=>$z_p,m_price=>($z_p+$show[m_p]));
		 }else{
	    $i=1;
	    $v_td=$this->v_td($ard[d],($vr[i]*$i),$w);
	   return array(ws=>$ard[wv].$w."*".($i*$vr[i]),td=>$v_td);
		 }
	   
	   
	   echo json_encode($fb)."<br />";
	   $s[0]=$this->fenxi_set_c($sqldb,0);
	   $s[1]=$this->fenxi_set_c($sqldb,1);
	   //$s[2]=$this->fenxi_set_c($sqldb,2);
	   //$s[3]=$this->fenxi_set_c($sqldb,3);
	   //$s[4]=$this->fenxi_set_c($sqldb,4);
	   arsort($s);
	   foreach ($s as $n=>$v){
		   $s=$n;
		   break;
	   }
	   $rs=$sqldb[0];
       $tr=str_split($rs[tit]);
	   $t_dx=$tr[$s]>4?1:0;
	   if($t_dx==1){
		$d="";
		for ($x=0; $x<=99; $x++) {
		   if($x<=49){
		   $d[]=sprintf("%02d",$x);
		   }
		}
	   }else{
		$d="";
		for ($x=0; $x<=99; $x++) {
		   if($x>49){
		   $d[]=sprintf("%02d",$x);
		   }
		}
	   }
	   $w=($s+1).($s+2);
		 $ard=array(d=>$d);
		 if($show){
         $arrw=str_split($w);
         $tr=str_split($show[tit]);
		 $i=1;
		 $z=$this->set($ard[d],$tr[($arrw[0]-1)].$tr[($arrw[1]-1)]);
		 $z_p=(($z==1?99:0)-count($ard[d]))*$vr[i]*$i;
	   return array(i=>($i*$vr[i]),ws=>$w,z=>$z,x=>count($ard[d])."*".($vr[i]*$i),price=>$z_p,m_price=>($z_p+$show[m_p]));
		 }else{
	    $i=1;
	    $v_td=$this->v_td($ard[d],($vr[i]*$i),$w);
	   return array(ws=>$ard[wv].$w."*".($i*$vr[i]),td=>$v_td);
		 }
		 
		 
		 $ard=$this->fenxi_wset($db,$show);
		 foreach (explode(",","23,45,34,12,13,14,15,24,25,35") as $k_w){
		    $rs=$this->fenxi_wset($db,$ard[rs],$k_w);
            $arrw=str_split($k_w);
            $tr=str_split($ard[rs][tit]);
		    if($this->set($rs[d],$tr[($arrw[0]-1)].$tr[($arrw[1]-1)])==0){
			 $w=$k_w;
			 break;
			}
		 }
	     $w=$w?$w:"23";
		 $ard=$this->fenxi_wset($db,$show,$w);
		 if($show){
         $arrw=str_split($w);
         $tr=str_split($show[tit]);
		 $i=1;
		 $z=$this->set($ard[d],$tr[($arrw[0]-1)].$tr[($arrw[1]-1)]);
		 $z_p=(($z==1?99:0)-count($ard[d]))*$vr[i]*$i;
	   return array(i=>($i*$vr[i]),ws=>$w,z=>$z,x=>count($ard[d])."*".($vr[i]*$i),price=>$z_p,m_price=>($z_p+$show[m_p]));
		 }else{
	    $i=1;
	    $v_td=$this->v_td($ard[d],($vr[i]*$i),$w);
	   return array(ws=>$ard[wv].$w."*".($i*$vr[i]),td=>$v_td);
		 }
	}
	public function fenxi($tid,$vr){
	   $db=$this->usset->database($tid);
	   $amd_r=1;
	   $sqldb=$db->query("select * from ".$db->dbprefix($this->baomin).($vr[cc]==""?" where vdate>".$vr[vdate]:"")." order by vdate desc limit ".($vr[cc]?$vr[cc].",100":"0,100"))->result_array();
	   krsort($sqldb);
	   $z_p=0;
	   $i=0;
	   $amd_d="";
	   foreach ($sqldb as $k=>$rs){
		 $i++;
	     $at=str_split($rs[tit]); 
		 $rs[m_p]=$z_p;
		 $mdd=$this->fenxi_set($db,$vr,$rs);
		 $z_p=$z_p+$mdd[price];
		$amd_n="<br />".$i." - ".$rs[vdate]." - ".$rs[tit];
		if($mdd[x]<>""){
		$amd_n.=" - ".$mdd[ws]."  - ".$mdd[x]."  - ".$mdd[z]." =".$mdd[m_price];
		}
		$f=explode(",",$vr[f]);
		if($f[1]==""){$f[1]=$f[0];}
		$f[0]=(int)("-".$f[0]);
	    if(($z_p<=$f[0] || $z_p>=$f[1]) and $vr[cc]==""){
		  $amd_r=0;
		  if($break_d==""){
		  $amd_n.="<br />   ---- ";
		  $z_p=0;
		  $break_d=1;
		  }
		}
		$amd_d=$amd_n.$amd_d;
	   }
	   if($vr[cc]){$amd_r=0;}
	   $mdd=$this->fenxi_set($db,$vr);
	   return array(r=>$amd_r,ws=>$mdd[ws],td=>$mdd[td],d=>$amd_d);
	}
	//多重
	public function duoc_d($m1,$m2,$m3){
		if($m3==""){
		 $d="";
		 foreach (str_split($m1) as $a){
		 foreach (str_split($m2) as $b){
			$d[]=$a.$b; 
		 }
		 }
	     return $d;
		}else{
		 $d="";
		 foreach (str_split($m1) as $a){
		 foreach (str_split($m2) as $b){
		  foreach (str_split($m3) as $c){
			$d[]=$a.$b.$c; 
		  }
		 }
		 }
	     return $d;
		}
		
	}
	//多重
	public function duoc_set($db,$vr,$show){
		 $ard=$this->fenxi_wset($db,$show);
		 $md="";
		 foreach (explode(",","12,13,14,15,23,24,25,34,35,45") as $k_w){
		 //foreach (explode(",","23,45,12") as $k_w){
		    $rs=$this->fenxi_wset($db,$ard[rs],$k_w);
            $arrw=str_split($k_w);
            $tr=str_split($ard[rs][tit]);
		    if($this->set($rs[d],$tr[($arrw[0]-1)].$tr[($arrw[1]-1)])==1){
				$md[]=$k_w;
			}
		 }
		 $i=1;
         if($show){
		 $z_p=0;
		 $xd=0;
		 $tr=str_split($show[tit]);
		// if(count($md)>6){
		 $md=explode(",","12,13,14,15,23,24,25,34,35,45");
		 $md=explode(",","12");
		 //}else{$md="";}
		 foreach ($md as $k_w){
		 $rs=$this->fenxi_wset($db,$show,$k_w);
         $arrw=str_split($k_w);
		 $z=$this->set($rs[d],$tr[($arrw[0]-1)].$tr[($arrw[1]-1)]);
		 $z_p=$z_p+(($z==1?99:0)-count($rs[d]))*$vr[i]*$i;
		 $xd=$xd+count($rs[d]);
		 }
		 $z=$z_p>0?1:0;
	     return array(i=>($i*$vr[i]),ws=>$w,z=>$z,x=>$xd."*".($vr[i]*$i),price=>$z_p,m_price=>($z_p+$show[m_p]));
		 }else{
		 $v_td="";
		 $xd=0;
		 $wname="";
		 foreach ($md as $k_w){
		 $rs=$this->fenxi_wset($db,$show,$k_w);
		 $v_td.=$v_td?",":"";
	     $v_td.=$this->v_td($rs[d],($vr[i]*$i),$k_w);
		 $xd=$xd+count($rs[d]);
		 $wname.=$k_w."-";
		 }
	     return array(ws=>$xd.$wname."*".($i*$vr[i]),td=>$v_td);
		 }
	}
	public function rk_d($db,$vdd){
	 foreach ($vdd as $k=>$rs){
	  if(count(str_split($rs[tit]))==5){
	  $zishow=$db->query("select id,vdate from ".$db->dbprefix($this->baomin)." where vdate='".$rs[vdate]."'")->result_array();
	  if($zishow[0]==""){
	   $db->insert($this->baomin,array(vdate=>$rs[vdate],tit=>trim($rs[tit]),atime=>time()));
	   //break;
	  }
	  }
	 }
	 return 1;
	}
	public function dj_show_r($bd,$od){
		 foreach ($bd as $n=>$v){
			 $bd[$n]=$od[$n];
		 }
		 arsort($bd);
		return $bd;
	}
	public function dj_show_e($bd,$d,$di=0){
	   $i=0;
	   $md="";
	   $bd=$this->dj_show_r($bd,$d);
	   foreach ($bd as $n=>$v){
		  $i++;
		   if($i>$di){
		  $md[]=sprintf("%02d",$n);
		  if($i==($di+75)){break;}
		   }
	   }
	   return $md;
	}
	public function dj_show_w($db,$d,$di=0,$vdate="",$v_s=""){
	   $bd=$d;
	   $qy=$vdate?" where vdate<".$vdate:"";
	   $sqldb=$db->query("select * from ".$db->dbprefix($this->baomin."_ab").$qy." order by vdate desc limit 0,5")->result_array();
	   foreach ($sqldb as $k=>$rs){
		$bd=$this->dj_show_r($bd,explode(",",$rs[bd]));
	   }
	   if($v_s==""){
	   return $this->dj_show_e($bd,$d,$di);
	   }else{
	   return $this->set($this->dj_show_e($bd,$d,$di),$v_s);
	   }
	}
	public function dj_show($d,$j,$s=0,$vdate=""){
	   if($s==1){ksort($j);}
	   $cdd="";
	   $c_lt=0;
	   foreach ($j as $n=>$v){
		   $c_lt=$c_lt+$v;
		   $cdd[]=$n;
		   if($c_lt>49){break;}
	   }
	   $md="";
	   if($c_lt<80){
	   foreach ($d as $n=>$v){
		   if($this->set($cdd,$v)==1){
		   $md[]=sprintf("%02d",$n);
		   }
	   }
	   }
	   return $md;
	   $db=$this->usset->database(2);
	   return $this->dj_show_w($db,$d,0);
	   $qy=$vdate?" where tit!='' and vdate<".$vdate:"";
	   $sqldb=$db->query("select * from ".$db->dbprefix($this->baomin."_ab").$qy." order by vdate desc limit 0,1")->result_array();
	   $tr=str_split($sqldb[0][tit]);
	   return $this->dj_show_w($db,$d,($this->dj_show_w($db,$d,0,$sqldb[0][vdate],$tr[0].$tr[1])==1?49:0));	   
	}
	public function r($tid,$id=""){
	   date_default_timezone_set('PRC');
	   $this->v_std($tid);
	   $uid=(int)$_COOKIE['uid'];
	   $w_i=0;
	   $db=$this->usset->database($tid);
  if($tid==2){
	  $data=file_get_contents("http://www.auluckylottery.com/results/lucky-ball-5");   
	  //$data=iconv('gbk', 'UTF-8', $data);
	  $i=1;
	  if($data){
	  $html = explode("ACST)  &nbsp;&nbsp;Draw:  <strong>",$data);
	  $html[0]="";
	  $vdd="";
	  foreach ($html as $val) {
		  if($val){
		  $v = trim(str_replace('<div class="back_red">',"",$val)); 
		  $v = trim(str_replace('</div>',"",$v)); 
		  $v = trim(str_replace('<div class="brt2_ball p_number_ball">',"",$v)); 
		  $v = trim(str_replace("\r","",$v)); 
		  $v = trim(str_replace("\n","",$v)); 
		  $v = trim(str_replace("\t","",$v)); 
		  $v = trim(str_replace(" ","",$v)); 
		  $v1 = explode("</strong>",$v);
		  $vdate=(int)$v1[0];
		  $v2 = explode("<div",$v1[1]);
		  $v=trim($v2[0]);
		  $vdd[]=array(vdate=>$vdate,tit=>$v);
		  }
	  }
       sort($vdd);
	 $this->rk_d($db,$vdd);
	 $w_i=1;
	  }
   }elseif($tid==3){
      $data=file_get_contents("https://zst.cjcp.com.cn/cjwssc/view/ssc_danzhi-wwz-5-ssc-0-3-200.html");   
      $data=iconv('gbk', 'UTF-8', $data);
      $pattern = '/overClass(.*?)z_bg_05(.*?)z_bg_05\'>(.*?)<\/td>(.*?)<td class=(.*?)>(.*?)<\/td>(.*?)<\/td><\/tr>/';
      $i=1;
      if( preg_match_all($pattern, $data, $matches) ) {
      foreach($matches[0] as $key => $val) {
          $v = trim(str_replace("<span style='color:Red;'>","",$matches[6][$key])); 
          $v = trim(str_replace("</span>","",$v));
		  $v=trim($v);
		  $vdate=(int)substr($matches[3][$key],3,9);
		  $vdd[]=array(vdate=>$vdate,tit=>$v);
       }
	 $this->rk_d($db,$vdd);
	 $w_i=1;
       }
   }
	return $w_i;
	}
	public function k_r($sname=""){
	  $file_path = "qq/u/".$sname.".txt";
	  if(file_exists($file_path)){$str=file_get_contents($file_path);}
	  if($str==""){return "";}
	  $fp= fopen($file_path, "w");
	  $len = fwrite($fp,"");
	  fclose($fp);
	  date_default_timezone_set('PRC');
	  $arrsname=explode("k",$sname);
      $str=iconv('gbk', 'UTF-8', $str);
	  $hs=explode("\r\n",$str);
	  $z_vdate=$hs[10];
	  if($z_vdate==""){return "";}
	  $z_vdate=substr($z_vdate,-8);
	  $arv=str_split($z_vdate);
	  if($arv[0]==5 and $arrsname[1]==3){return "";}elseif($arv[0]==9 and $arrsname[1]==2){return "";}
	  $z_fraction=trim(str_replace("期号：","",$hs[9])); 
	  $z_fraction =str_replace(" ","",$z_fraction); 
	  if($z_fraction==""){return "";}
	  $z_td="";
	  if($arrsname[2]==""){//开
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
	  $db=$this->usset->database($arrsname[1]);
	  $this->rk_d($db,$vdd);
	  foreach (array(0,12,14) as $ti){
	   $sqldb=$db->query("select * from ".$db->dbprefix($this->baomin."_a".$ti)." where tit='' order by vdate desc limit 0,20")->result_array();
	   foreach ($sqldb as $k=>$rs){
	     $sdb=$db->query("select * from ".$db->dbprefix($this->baomin)." where vdate=".$rs[vdate]." limit 0,1")->result_array();
		 $rs[tit]=$sdb[0][tit];
		 if($rs[tit]){
         $db->where('vdate',$rs[vdate]);
	     $db->update($this->baomin."_a".$ti,array(tit=>$rs[tit]));
		 }
	   }
	  }
	  $arrsname[2]="k";
	  }elseif($arrsname[2]==0){//一定
	  $str = explode('清空',$str);
	  $str = explode('号码赔率',$str[1]);
	  $str=end($str);
	  $str = trim(str_replace("\r\n",",",$str)); 
	  $str = explode(',',$str);
	  $md="";
	  $jd="";
	  $i=0;
	  foreach ($str as $k=>$tk){
		  if($k>=1 and $k<11){
		  $tk = trim(str_replace("	","|",$tk)); 
		  $rt= explode("|",$tk);
		  foreach ($rt as $vk=>$vm){
		  if($vk!=0){
		  $vm1=substr($vm,0,5);
		  $vm2=substr($vm,5,10);
		  if($vm2){
		  $mi=($i-((int)($i/5))*5);
		  $i++;
		  $md[$mi][$vm1]=$vm2;
		  $jd[$mi][$vm2]++;
		  }
		  }
		  }
		  }
	  }
	  if($md==""){return "";}
	  $vdd=array(md=>$md,jd=>$jd);
	  $mdd="";
	  $mjd="";
	  foreach ($vdd[jd] as $k=>$tk){
	   if(count($tk)>1){
		 $mdd[$k]=$vdd[md][$k];
	     krsort($tk);
		 $mjd[$k]=$tk;
	   }
	  }
	  if($mdd){
	  $db=$this->usset->database($arrsname[1]);
	  $zishow=$db->query("select id,vdate from ".$db->dbprefix($this->baomin."_a0")." where vdate='".$z_vdate."'")->result_array();
	  if($zishow[0]==""){
	   $rs="";
	   $rs[vdate]=$z_vdate;
	   $rs[p]=$z_fraction;
	   $rs[d]=json_encode($mdd);
	   $rs[j]=json_encode($mjd);
	   $rs[atime]=time();
	   $db->insert($this->baomin."_a0",$rs);
	  }
	  foreach ($mdd as $k=>$tk){
	  foreach ($tk as $n=>$v){
		  if($v==9.9){
		  $z_td.=$z_td?",":"";
		  $z_td.=$n."=1";
		  }
	  }
	  }
	  }
	  }else{//二定
	  $str = explode('模式2',$str);
	  $str = explode('号码赔率',$str[1]);
	  $str=end($str);
	  $str = trim(str_replace("\r\n",",",$str)); 
	  $str = explode(',',$str);
	  $md="";
	  $jd="";
	  foreach ($str as $k=>$tk){
		  if($k>=1 and $k<11){
		  $tk = trim(str_replace("	","|",$tk)); 
		  $rt= explode("|",$tk);
		  foreach ($rt as $vk=>$vm){
		  if($vk!=0){
		  $vm1=substr($vm,0,4);
		  $vm2=substr($vm,4,10);
		  if($arrsname[2]==12){
		  if(substr($vm1,2,2)!="XX"){return "";}
		  }elseif($arrsname[2]==14){
		  if(substr($vm1,1,2)!="XX"){return "";}
		  }
		  $md[]=$vm2;
		  $jd[$vm2]++;
		  }
		  }
		  }
	  }
	  if($md==""){return "";}
	  krsort($jd);
	  $vdd=array(md=>$md,jd=>$jd);
	  $mcot=100;
	  foreach ($vdd[jd] as $n=>$v){
	  $mcot=$v;	  
	  break;
	  }
	  //
	  if($arrsname[2]==12){
	  $db=$this->usset->database($arrsname[1]);
      $cr=$this->afr($db,1);
	  if($cr[i]!=0) {
	  $mdd=$this->fenxi_set($db,array(i=>$cr[i]),"",$cr[s]);
	  $z_td.=$z_td?",":"";
	  $z_td.=$mdd[td];
	  }
	  }
	  if($mcot<95){
	  $db=$this->usset->database($arrsname[1]);
	  $rs=array(vdate=>$z_vdate,d=>$vdd[md],j=>$vdd[jd]);
	  $zishow=$db->query("select id,vdate from ".$db->dbprefix($this->baomin."_a".$arrsname[2])." where vdate='".$z_vdate."'")->result_array();
	  if($zishow[0]==""){
	   $rs[p]=$z_fraction;
	   //$rs[d]=implode(",",$vdd[md]);
	   $rs[d]=json_encode($rs[d]);
	   $rs[js]=count($rs[j]);
	   $rs[j]=json_encode($rs[j]);
	   $rs[atime]=time();
	   $db->insert($this->baomin."_a".$arrsname[2],$rs);
	  }
	   $rs[w]=$arrsname[2];
	   $cc=0;
	   $arrw=str_split($arrsname[2]);
	   $cr="";
//	   $sqldb=$db->query("select * from ".$db->dbprefix($this->baomin."_a".$arrsname[2])." where tit<>'' and js>2 order by vdate desc limit 0,2")->result_array();
//	   foreach ($sqldb as $k=>$zx){
//		 $zx[w]=$arrsname[2];
//		 $md=$this->f_show($db,$cr,$this->ashow($zx,$arrw));
//		 if($md){
//		  $cc=$md[z]==0?49:0;
//		  break;
//		 }
//	   }
       $cr=$this->afr($db,$arrsname[2]);
	   if($cr[s]==1){
	   $cc=49;
	   }
       $dj_dd=$this->f_dj($this->f_dsort($db,$this->ashow($rs,$arrw)),$cc);
	   if($dj_dd){
	   if($cr[i]!=0) {
	   $z_td.=$z_td?",":"";
	   $z_td.=$this->v_td($dj_dd,$cr[i],$arrsname[2]);
	   }
	   }	   
	  }
	  }
	  return array(tid=>$arrsname[1],s=>$arrsname[2],vdate=>$z_vdate,fraction=>$z_fraction,ok=>$vdd==""?0:1,td=>$z_td);
	}
	public function k($tid,$sname=""){
	  $this->v_std($tid);
	  $kdd="";
	  if($sname==""){
       foreach (explode(",","k2,k2k0,k2k12,k2k14,k3") as $sname){
		$krs=$this->k_r($sname);
		if($krs){
	    $kdd[]=$krs;
		}
       }
	  }else{
		$krs=$this->k_r($sname);
		if($krs){
	    $kdd[]=$krs;
		}
	  }
	  $td[2]="";
	  $td[3]="";
	  $td_i=0;
	  $ok_i=0;
	  foreach ($kdd as $k=>$rs){
	  if($rs[s]=="k"){
	  $this->v_s($rs[tid]);
	  }
	  $ok_i++;
	  if($rs[td]){
      $td[$rs[tid]].=$td[$rs[tid]]?",":"";
      $td[$rs[tid]].=$rs[td];
	  $td_i++;
	  }
	  }
	  
	  //
	  if($tid==3){
	  $db=$this->usset->database($tid);
      $cr=$this->afr($db,1);
	  if($cr[i]!=0) {
	  $mdd=$this->fenxi_set($db,array(i=>$cr[i]),"",$cr[s]);
	  $td[3].=$td[3]?",":"";
	  $td[3].=$mdd[td];
	  }
	  }
	  $this->v_std(2,$td[2]);
	  $this->v_std(3,$td[3]);
	  //echo json_encode($kdd);
	  return $ok_i?$ok_i."=".$td_i:0;
	}
	public function af($tid){
	  $db=$this->usset->database($tid);
      $cr=$this->afr($db,1);
	  $mdd=$this->fenxi_set($db,array(i=>$cr[i]),"",$cr[s]);
	  //echo json_encode($mdd);
	  return $mdd[td];
	}
	public function afr($db,$yid,$mp="",$mp2=""){
	  $sqldb=$db->query("select * from ".$db->dbprefix($this->baomin."_af")." where id=".$yid)->result_array();
	  $cr=$sqldb[0];
	  if($mp=="" and $mp2==""){
	  $arfc=$this->fc($db,$yid,$cr[s]);
	  $mp=0;
	  if($arfc[vdate]!=$cr[vdate]){
	  $cr[vdate]=$arfc[vdate];
	  $mp=$arfc[p];
	  }
	  }else{
	  $mp=$mp2?($mp2-$cr[p]):$mp;
	  }
	  if($mp!=0){
	  $db->where('id',$cr[id]);
	  unset($cr[id]);
	  $cr[p]=$cr[p]+$mp;
	  if(($cr[p1]-$cr[p])<$cr[p3]){
	  $cr[p1]=$cr[p];
	  $cr[s]=$cr[s]==0?1:0;
	  }elseif($cr[p1]>$cr[p]){
	  $cr[p1]=$cr[p];
	  }
	  $fs=explode(",",$cr[p2]);   
      $cr[i]=($cr[p]>$fs[0] and $cr[p]<=$fs[1])?$cr[i]:0;
	  $db->update($this->baomin."_af",$cr);
	  }
	  $fs=explode(",",$cr[p2]);   
      $cr[i]=($cr[p]>$fs[0] and $cr[p]<=$fs[1])?$cr[i]:0;
	  return $cr;
	 }
	
	
	
}
?>