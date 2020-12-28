<?php
class Set extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function database($tid){
		$db="";
		$db['hostname'] = 'localhost';
		$db['username'] = 'social_f';
		$db['password'] = 'seo0209';
		$db['database'] = 'social';
		$db['dbdriver'] = 'mysql';
		$db['dbprefix'] = 'mro'.$tid.'_';
		$db['pconnect'] = TRUE;
		$db['db_debug'] = TRUE;
		$db['cache_on'] = FALSE;
		$db['cachedir'] = '';
		$db['char_set'] = 'utf8';
		$db['dbcollat'] = 'utf8_general_ci';
		$db['swap_pre'] = '';
		$db['autoinit'] = TRUE;
		$db['stricton'] = FALSE;
		return $this->load->database($db,TRUE);
	}
	public function ts($t){
		$ts="";
		foreach ($t as $k=>$a){
		 $ts[$a]=($k+1);
		}
	    return $ts;
    }
	public function tss($t){
		$ts="";
		foreach ($t as $k=>$a){
		 $ts[]=$a;
		}
	    return $ts;
    }
	public function ssb($db,$rs){
		$t=explode(" ",$rs[tit]);
        $vdate=$rs[vdate];
		$btsb=$this->btsb($db,$vdate,$t);
		if($btsb){
		$sb="";
		$sb[0]=$this->tsb($t);
		$sb[1]=$this->btsb($db,$vdate,$t);
		return $sb;
		}
		return "";
	}
	public function tsb($t){
		$sb="";
	    $sb_0="";
	    $sb_1="";
	    $sb_3="";
	    foreach (array(1,2,3,4,5,6,7,8,9,10) as $i){
		  $sb_0[$i]=$t[($i-1)]>5?1:0;
		  $sb_1[$i]=$t[($i-1)]%2==1?3:2;
		  $sb_3[$i]=$t[($i-1)];
		}
		$sb[0]=$sb_0;
		$sb[1]=$sb_1;
		$sb[3]=$sb_3;
	    return $sb;
    }
	public function btsb($db,$vdate,$t){
		 $tdb=$db->query("select * from ".$db->dbprefix("aow")." where vdate<".$vdate." order by id desc limit 0,1")->result_array();
		if($tdb[0][tit]){
		$bt=explode(" ",$tdb[0][tit]);
		$bts=$this->ts($bt);
		$sb="";
	    $sb_0="";
	    $sb_1="";
	    $sb_3="";
	    foreach ($bts as $n=>$v){
		  $sb_0[$n]=$t[($v-1)]>5?1:0;
		  $sb_1[$n]=$t[($v-1)]%2==1?3:2;
		  $sb_3[$n]=$t[($v-1)];
		}
		$sb[0]=$sb_0;
		$sb[1]=$sb_1;
		$sb[3]=$sb_3;
	    return $sb;
		}
	    return "";
    }
	//$dg=ceil(str_replace("-","",$kjh)/(0.985*2));
	public function szk($db,$dbname,$ss,$si,$v,$sb){
	  $z=($sb[0][($ss>1?1:0)][$si]==$ss?1:0);
	  $bd=$db->query("select * from ".$db->dbprefix($dbname)." where ss=".$ss." and  si=".$si." order by id desc limit 0,1")->result_array();
	  $db->query("delete from ".$db->dbprefix($dbname)." where ss=".$ss." and  si=".$si.";");
	  $sdb=$bd[0];
	  $zd=$sdb[zd]==""?"":$sdb[zd];
	  $zi=(int)$sdb[zi];
	  $di=(int)$sdb[di];
	  $dk=(int)$sdb[dk];
	  $dg=(int)$sdb[dg];
      $kj=0;
	  if($sdb[di]>0){
	  $kj=$kj+($sb[0][($ss>1?1:0)][$si]==$sdb[m]?$sdb[di]*0.985:(($sdb[di]*0.006)-$sdb[di])); 
	  if($kj>0){$dk=0;}else{$dk++;}
	  }
	  $kjh=($kj+$sdb[kjh]);
	 // $zi=array_sum(str_split($zd));
	 if($z==$sdb[z]){
	  $zi++;
	 }else{
	  $zi=0;
	 }
	 if($dk==0){
      $zd=trim(substr($sdb[dk].$sdb[zd],0,9));
	 }
	  if($kjh>=0){
      $dg=2;  
	  }elseif($kjh<=(0-$dg*4)){
      $dg=$dg*2;  
	  }
	  if($z==1){
      $di=$dg;
	  }else{
	  $di=0;
	  }
	 // $di=$di>16?16:$di;
	  $riar=$this->riar(8);
	  $ri=$riar[$di];
	  $rf=(int)$sdb[rf];
	  $m=(int)$sdb[m];
	  $m=$ss;
//	  if($sdb[m]==""){$m=$ss;$rf=0;}
//	  $ri=$ri>1?$ri:0;
     // if($di==4){$ssar=array(1,0,3,2);$m=$ssar[$ss];}else{$m=$ss;}
	  if($di>32){
	  $ri=$di/32;
	  }else{
	  $ri=0;
	  }
	  $rj=0;
	  if($sdb[ri]>0){
		$rj=$rj+($sb[0][($ss>1?1:0)][$si]==$sdb[m]?$sdb[ri]*0.985:(($sdb[ri]*0.006)-$sdb[ri])); 
		if($rj>0){$rf=0;}else{$rf--;}
		if($rf==-2){
		  $ssar=array(1,0,3,2);
		  $m=$ssar[$sdb[m]];  
		  $rf=0;  
		}
	  }
	  $ri=$ri>16?0:$ri;
	  $kjz=trim($sdb[kjz]);
	  if($kjh>=0){$kjz=($kjh+$sdb[kjz]);$kjh=0;}
	  $db->insert($dbname,array(m=>$m,ss=>$ss,si=>$si,v=>$v,z=>$z,zd=>$zd,zi=>$zi,di=>$di,dk=>$dk,dg=>$dg,kj=>$kj,kjh=>$kjh,kjz=>$kjz,ri=>$ri,rf=>$rf,rj=>($rj+$sdb[rj])));
	  return $rj;
	}
	public function riar($rii){
	  $rdd="";
	  $rii=32;
	  $rdd[($rii*2)]=2;
	  $rdd[($rii*4)]=4;
	  $rdd[($rii*8)]=8;
	  $rdd[($rii*16)]=16;
	  $rdd[($rii*32)]=32;
	  $rdd[($rii*64)]=42;
	  return $rdd;
	}
	public function curl($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);// 为 1 时-启用-会将头文件的信息作为数据流输出
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//https 不验证信息
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//https 不验证信息
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$data = curl_exec($ch);    //执行curl会话
		curl_close($ch);           //关闭curl会话
		return $data;
	}
	public function fxlmdd2($dd,$mtdd,$vi_i,$md){
    // $dd=$this->set->lmdd($dd,$mtdd,$rs[di]*$vi_i,$rs[si].$ss);  
    // print_r($md);
	  foreach ($md as $k=>$kd){
		 foreach ($kd as $si=>$hd){
			if($k==0){
			  $vi=$hd[0]-$hd[1];
			   if($vi>0){
				$ss=0; 
			   }elseif($vi<0){
				$vi=str_replace("-","",$vi);
				$ss=1;  
			   }
			}elseif($k==1){
			  $vi=$hd[2]-$hd[3];
			   if($vi>0){
				$ss=2; 
			   }elseif($vi<0){
				$vi=str_replace("-","",$vi);
				$ss=3;  
			   }
			}elseif($k==2){
			  $vi=$hd[4]-$hd[5];
			   if($vi>0){
				$ss=4; 
			   }elseif($vi<0){
				$vi=str_replace("-","",$vi);
				$ss=5;  
			   }
			}
			// echo $si.".".$ss."=".$vi."<br />";
			 $vi=$vi*$vi_i;
			 $key=$si.$ss;
			 if($vi>1){
			  $dd["lm"].=$dd["lm"]?"v":"";
			  $dd["lm"].=$mtdd[$key].",".$vi;
			 }
		 }
	  }
	  return $dd;
	}
	
	public function lmdd($dd,$mtdd,$vi,$key){
		if($vi>1){
		$dd["lm"][$vi].=$dd["lm"][$vi]?"v":"";
		$dd["lm"][$vi].=$mtdd[$key];
		}
		return $dd;
	}
	public function lmmd($md,$si,$ss,$vi){
		if($vi>1){
		$sa=$ss>1?1:0;
		if($md[$sa][$si][$ss]){
		$vi=$vi+$md[$sa][$si][$ss];
		}
		$md[$sa][$si][$ss]=$vi;
		}
		return $md;
	}
	public function fxlmdd($dd,$mtdd,$vi_i,$md){
    // $dd=$this->set->lmdd($dd,$mtdd,$rs[di]*$vi_i,$rs[si].$ss);  
    // print_r($md);
	  foreach ($md as $k=>$kd){
		 foreach ($kd as $si=>$hd){
			if($k==0){
			  $vi=$hd[0]-$hd[1];
			   if($vi>0){
				$ss=0; 
			   }elseif($vi<0){
				$vi=str_replace("-","",$vi);
				$ss=1;  
			   }
			}elseif($k==1){
			  $vi=$hd[2]-$hd[3];
			   if($vi>0){
				$ss=2; 
			   }elseif($vi<0){
				$vi=str_replace("-","",$vi);
				$ss=3;  
			   }
			}elseif($k==2){
			  $vi=$hd[4]-$hd[5];
			   if($vi>0){
				$ss=4; 
			   }elseif($vi<0){
				$vi=str_replace("-","",$vi);
				$ss=5;  
			   }
			}
			// echo $si.".".$ss."=".$vi."<br />";
			 $dd=$this->lmdd($dd,$mtdd,$vi*$vi_i,$si.$ss);  
		 }
	  }
	  return $dd;
	}
	
	public function mt($key=""){
	  $dd="";
	  $dd[0]="692,287";
	  $dd[1]="426,287";
	  $dd[2]="1223,287";
	  $dd[3]="957,287";
	  foreach (array(1,0,3,2,5,4,1,0,3,2) as $k=>$a){
        $y=$k<=5?(341+27*$k):(341+27*$k+28);
		foreach (array(365,576,789,1002,1216) as $b=>$x){
			$dd[($b+($k>5?6:1)).$a]=$x.",".$y;
		}
	  }
	  return $key?$dd[$key]:$dd;
	}
	
	public function v_stdr($tid,$td=""){
	    $fp= fopen('D:\lh\h'.$tid.'\t.txt', "w");
		$len = fwrite($fp,$td);
		fclose($fp);
	}
	public function v_std($tid,$td=""){
		if($tid==2){
		$fp= fopen('D:\lh\a\aow'.$tid.'.txt', "w");
		}else{
	    $fp= fopen('D:\lh\h'.$tid.'\v.txt', "w");
	    $fp= fopen('D:\lh\h'.$tid.'\sv.txt', "w");
		}
		$len = fwrite($fp,$td);
		fclose($fp);
	}
	public function v_td($sc_d,$td_price,$w_ds){	
	  $td="";
	  $td_i=0;
	  $w_vdd=$w_ds[1]==4?array(0,1,2,3,4):array(0,1,2,3);
	  foreach ($sc_d as $rv => $v){
		$td.=$td_i==0?"":",";
	    $vd=str_split($v);
		foreach ($w_vdd as $ik => $iv){
		  if($w_ds[0]==$iv){$td.=$vd[0];}elseif($w_ds[1]==$iv){$td.=$vd[1];}else{$td.="X";}
		}
		$td.="=".$td_price;
		$td_i++;
	  }
		 return $td;
	}
	public function set($d,$v){
		return  (in_array($v,$d)?1:0);
	}
	
	public function s10($s=0,$k=1){
	   $zb=array("382","595","808","1021","1234","382","595","808","1021","1234");
	   return $zb[($s-1)].",".(($s>5?401:455)+($k-1)*27);
	}
	//as
	public function aas($db,$i,$vdate,$t,$ss){
	  $dx=$t[($i-1)]>5?1:0;
	  $ds=$t[($i-1)]%2==1?3:2;
	  $bd=$db->query("select * from ".$db->dbprefix("ss")." where si=".$i." order by id desc limit 0,1")->result_array();
	  $sdb=$bd[0];
      $dxd=trim(substr($dx.$bd[0][dxd],0,10));
	  $dx_i=(int)$sdb[dx_i];
	  $dx_a=(int)$sdb[dx_a];
	  $dx_b=(int)$sdb[dx_b];
	  $dx_c=(int)$sdb[dx_c];
	  $dx_d=(int)$sdb[dx_d];
	  if($dx!=$sdb[dx]){$dx_i++;}else{$dx_i=0;}
	  if($dx==0){$dx_a++;}else{$dx_a=0;}
	  if($dx==1){$dx_b++;}else{$dx_b=0;}
	  if($dx_a==4 and substr($dx_c,0,1)!=2){$dx_c=2000;$dx_d=0;}elseif($dx_b==4 and substr($dx_c,0,1)!=3){$dx_c=3000;$dx_d=0;}else{$dx_c++;}
	  if($dx_a==4){$dx_d++;}elseif($dx_b==4){$dx_d++;}
	  
	  
//	  if($dx_d>0){
//	  $m=substr($dx_c,0,1)>2?1:0;
//	  }else{
//	  $m=substr($dx_c,0,1)>2?0:1;
//	  }
      $dxdar=str_split($dxd);
      $dxdar=array_sum($dxdar);
	  $m=$dxdar>5?1:0;
	  
	  $m_a=(int)$sdb[m_a];
	  $m_b=(int)$sdb[m_b];
	  $kj=0;
	  if($sdb[mi]>0){
	  $kj=$kj+($sdb[m]==$dx?$sdb[mi]*0.985:(($sdb[mi]*0.006)-$sdb[mi])); 
	  if($sdb[m]==$dx){
	  $m_a++;
	  }else{
	  $m_b++;
	  }
	  if($m_a==$m_b){$m_a=0;$m_b=0;}
	  }
	  if($dx_c>1000){
	  if($sdb[kjh]>=0){
      $mi=2;
	  $sdb[kjh]=0;
	  }else{
	  $mi=(int)(str_replace("-","",$sdb[kjh]))+2; 
	  }
	  }else{
      $mi=0;
	  }
      $db->insert("ss",array(si=>$i,v=>$vdate,dx=>$dx,dxd=>$dxd,dx_i=>$dx_i,dx_a=>$dx_a,dx_b=>$dx_b,dx_c=>$dx_c,dx_d=>$dx_d,m=>$m,m_a=>$m_a,m_b=>$m_b,mi=>$mi,kj=>$kj,kjh=>($sdb[kjh]+$kj),si=>$i));
	}
	public function adx($t,$i,$ss){
	  if($ss==0 or $ss==1){
	  return ($t[($i-1)]>5?1:0);
	  }elseif($ss==3 or $ss==2){
	  return ($t[($i-1)]%2==1?3:2);
	  }elseif($ss==4 or $ss==5){
	  return ($t[($i-1)]-$t[(10-$i)])>0?5:4;
	  }
	  return 6;
	}
	public function at_szk($db,$dbname,$ss,$si,$v,$sb){
	  $z=0;
	  foreach (str_split($si) as $ii){
	  $ii=$ii==0?10:$ii;	  
	  $z=$z+($sb[0][($ss>1?1:0)][$ii]==$ss?1:0);
	  }
	  $bd=$db->query("select * from ".$db->dbprefix($dbname)." where ss=".$ss." and  si=".$si." order by id desc limit 0,1")->result_array();
	  $db->query("delete from ".$db->dbprefix($dbname)." where ss=".$ss." and  si=".$si.";");
	  $sdb=$bd[0];
      $zd=trim(substr($z.$sdb[zd],0,2));
	  $zi=$z==1?0:$sdb[zi]+1;
	  $di=(int)$sdb[di];
	  $dk=(int)$sdb[dk];
	  $dg=(int)$sdb[dg];
      $kj=0;
	  if($sdb[di]>0){
		foreach (str_split($si) as $ii){
		$ii=$ii==0?10:$ii;	  
	    $kj=$kj+($sb[0][($ss>1?1:0)][$ii]==$ss?$sdb[di]*0.985:(($sdb[di]*0.006)-$sdb[di])); 
		}
	    if($kj>0){$dk++;}else{$dk--;}
	  }
	  $kjh=($kj+$sdb[kjh]);
	  if($kjh>=0){
      $dg=2;  
	  }elseif($kjh<=(0-$dg*10)){
	  $dk=0;
      $dg=$dg*2;  
	  }
	  if($z<2){
	    $di=$dg;
	  }else{ 
	    $di=$dg;
	  }
     // $di=$di>8?8:$di;
	  $rj=0;
	  $sdb[rj]=$sdb[rj]?$sdb[rj]:0;
	  $ri=$di/8;
	  $rf=0;
	  if($di==4 or $di==8){$ri=2;$rf=1;}
	  $ri=$ri>1?$ri:0;
	  if($sdb[ri]>0){
		foreach (str_split($si) as $ii){
		$ii=$ii==0?10:$ii;	  
		if($sdb[rf]==1){
	    $rj=$rj+($sb[0][($ss>1?1:0)][$ii]!=$ss?$sdb[ri]*0.985:(($sdb[ri]*0.006)-$sdb[ri])); 
		}else{
	    $rj=$rj+($sb[0][($ss>1?1:0)][$ii]==$ss?$sdb[ri]*0.985:(($sdb[ri]*0.006)-$sdb[ri])); 
		}
		}
	  }
	  $ri=$ri>8?0:$ri;
	  $kjz=trim($sdb[kjz]);
	  if($kjh>=0){$kjz=($kjh+$sdb[kjz]);$kjh=0;}
	  $db->insert($dbname,array(ss=>$ss,si=>$si,v=>$v,z=>$z,zd=>$zd,zi=>$zi,di=>$di,dk=>$dk,dg=>$dg,kj=>$kj,kjh=>$kjh,kjz=>$kjz,ri=>$ri,rj=>($sdb[rj]+$rj),rf=>$rf));
	  return $rj;
	}
	//at
	public function at($db,$i,$vdate,$sb,$ss){
      return $this->at_szk($db,"a0",$ss,$i,$vdate,$sb); 
	}
	//af
	public function au($db,$i,$vdate,$sb,$ss){
	  $dbname="au";
	  $m=$sb[0][$ss][$i];
	  $bd=$db->query("select * from ".$db->dbprefix($dbname)." where ss=".$ss." and  si=".$i." order by id desc limit 0,1")->result_array();
	  $sdb=$bd[0];
	  $db->query("delete from ".$db->dbprefix($dbname)." where ss=".$ss." and  si=".$i.";");
	  $mi=(int)$sdb[mi];
	  $ki=(int)$sdb[ki];
	  $ci=(int)$sdb[ci];
	  if($ss==1){
	  $f=$m==3?2:3;
	  }else{
	  $f=$m==1?0:1;
	  }
	  $f=$m;
      $md=trim(substr(($m==$sdb[m]?1:0).$bd[0][md],0,9));
      $kjz=trim($sdb[kjz]);
	  $kj=0;
	  if($sdb[mi]>0 and $sdb[f]<>''){
	  $kj=$kj+($m==$sdb[f]?$sdb[mi]*0.985:(($sdb[mi]*0.006)-$sdb[mi])); 
	  }
	  if($kj<0){$ki--;}elseif($kj>0){$ki++;}
	  $ci=($m!=$sdb[m]?$ci+1:0);
	  $kjh=($kj+$sdb[kjh]);
	  $mi=0;
	  if($md=="101010101"){
      $ki=3;  
	  $mi=2;
	  }
	  if($ki>0){
	  $mi=2;
	  }elseif($ki<0){
	  $ki=0;
	  $mi=0;
	  }
	  if($kjh>=0){
      $kjz=($kjh+$sdb[kjz]);
	  $ki=0;
	  $kjh=0;
	 // $mi=0;
	  }
	  if($mi>120){
      $mi=0;
      $kjh=($kjh+$sdb[kjz]);
	  $kjh=0;
	  }
	  $db->insert($dbname,array(si=>$i,ss=>$ss,v=>$vdate,m=>$m,md=>$md,f=>$f,mi=>$mi,ki=>$ki,ci=>$ci,kj=>$kj,kjh=>$kjh,kjz=>$kjz));
	  return 0;
	}
	//ab
	public function ac($db,$vdate,$sb){
	  $dbname="ac";
	  $bd=$db->query("select * from ".$db->dbprefix($dbname)." order by id desc limit 0,1")->result_array();
	  $sdb=$bd[0];
	  $ms=(int)$sdb[ms];
	  $dx=$sdb[dx]==""?"0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0":$sdb[dx];
	  $dxm=implode(",",$sb[0][0]).",".implode(",",$sb[0][1]);
	  $sdxm=explode(",",$sdb[dxm]);
	  $ardx="";
	  $m=0;
	  $mi=0;
	  $svs=0;
	  $md="";
	  foreach (explode(",",$dx) as $k=>$v){
		if($k<10){
		$vs=($sb[0][0][($k+1)]==$sdxm[$k]?($v+1):0);
		if($vs>$svs){$m=($k+1).$sdxm[$k];$md=$k;$svs=$vs;}
		}else{
		$vs=($sb[0][1][($k-9)]==$sdxm[$k]?($v+1):0);
		if($vs>$svs){$m=($k-9).$sdxm[$k];$md=$k;$svs=$vs;}
		}
		if($vs>0){$mi++;}
		$ardx[]=$vs;
	  }
	  $ms=($m==$sdb[m]?0:$ms+1);
	  $dx=implode(",",$ardx);
	  $kj=0;
	  $arvi=array(0,3,9);
	  $vi=$arvi[$sdb[ms]];
	  if($vi>0){
	  $kj=$kj+($m==$sdb[m]?$vi*0.985:(($vi*0.006)-$vi)); 
	  }
	  $kjh=($kj+$sdb[kjh]);
	  $kjz=$sdb[kjz];
	  if($kjh>=0){
      $kjz=($kjh+$sdb[kjz]);
	  $kjh=0;  
	  }
	  $db->insert($dbname,array(v=>$vdate,m=>$m,ms=>$ms,mi=>$mi,md=>$md,dx=>$dx,dxm=>$dxm,kj=>$kj,kjh=>$kjh,kjz=>$kjz));
	  return 0;
	}
	//ab
	public function ab($db,$vdate,$t){
		 $m=0;
		 $m=$t[0]>5?$m+1:$m;
		 $m=$t[1]>5?$m+1:$m;
		 $m=$t[2]>5?$m+1:$m;
		 $bd=$db->query("select * from ".$db->dbprefix("ab")." order by id desc limit 0,1")->result_array();
		 $vi=1;
		 $kj=0;
		 if($bd[0][k]==1){
		 $mk=$bd[0][m]>1?0:1;
		 $kj=($t[0]>5?1:0)==$mk?($kj+$vi*0.985):($kj-$vi+($vi*0.006)); 
		 $kj=($t[1]>5?1:0)==$mk?($kj+$vi*0.985):($kj-$vi+($vi*0.006)); 
		 $kj=($t[2]>5?1:0)==$mk?($kj+$vi*0.985):($kj-$vi+($vi*0.006)); 
		 }
		 $kv=$m==$bd[0][m]?$bd[0][k]+1:0;
		 $ki=0;
		 $db->insert("ab",array(v=>$vdate,m=>$m,k=>$kv,ki=>$ki,kj=>$kj,kjm=>($kj+$bd[0][kjm]),km=>$m1." ".$m2." ".$m3));
	}
	//ab
	public function mdsfz($mds){
	  $mds_ar="";
	  foreach (str_split($mds) as $mds_i){
		 $mds_ar[$mds_i]++;  
	  }
	  if($mds_i>1){
	  $mk=$mds_ar[2]>$mds_ar[3]?2:3;
	  }else{
	  $mk=$mds_ar[0]>$mds_ar[1]?0:1;
	  }
      return $mk;
	}
	//ab
	public function az($db,$vdate,$sb){
	  $dbname="az";
	  $bd=$db->query("select * from ".$db->dbprefix($dbname)." order by id desc limit 0,2")->result_array();
	  $sdb=$bd[0];
	  $z=(int)$sdb[z];
	  $mk=(int)$sdb[mk];
	  $md=$sb[0][0][1].$sb[0][0][2].$sb[0][0][3];
      $mds=trim(substr($md.$bd[0][mds],0,9));
	  //$mk=$this->mdsfz($mds);
	  $kj=0;
	  $vi=2;
	  foreach (str_split($md) as $md_i){
		$kj=$kj+($md_i==$sdb[mk]?$vi*0.985:(($vi*0.006)-$vi)); 
	  }
	  if($md=="111"){
      $mk=0;  
	  }elseif($md=="000"){
      $mk=1;  
	  }
	  
	  $kjh=($kj+$sdb[kjh]);
	  $kjz=trim($sdb[kjz]);
	  if($kjh>=0){
	  $kjz=$kjh+$sdb[kjz];
	  $kjh=0;
	  }
	  $db->insert($dbname,array(ss=>1,v=>$vdate,z=>$z,md=>$md,mds=>$mds,mk=>$mk,kj=>$kj,kjh=>$kjh,kjz=>$kjz));
	  return 0;
	}
	
}
?>