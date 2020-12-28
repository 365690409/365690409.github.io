<?php
//声明命名控制
namespace app\yuan\controller;
//引入
use think\custom\Pinyin;
class Puus {
    protected $ar=array("一","二","三","四","五","六","七","八","九","十","十一","十二","十三","十四","十五","十六","十七","十八","十九","二十","廿一","廿二","廿三","廿四","廿五","廿六","廿七","廿八","廿九","三十","卅一","卅二","卅三","卅四","卅五","卅六","卅七","卅八","卅九");
   public function showinfo($rs){
	  $show=array();
	  $show['id']=$rs['id'];
	  $show['sid']=$rs['sid'];
	  $show['xing']=$rs['xing'];
	  $ziar=$this->ar;$ziar[1]="长";$ziar[2]="次";
	  $show['zipaixu']=$ziar[$rs['paixu']]."子";
	  $show['name']=$rs['name'];
	  $show['fname']=$rs['fname'];
	   $pinyin=new Pinyin();
	  $show['pinyin']=$pinyin->TransformWithTone($rs['name']);
	  $show['names']=$rs['names'];
	  $show['qizi']=$rs['qizi'];
	  $show['qidata']=$rs['qidata'];
	  $show['cunzhuan']=$rs['cunzhuan'];
	  $show['info']=$rs['info'];
	  $show['info2']=$rs['info2'];
	  $show['info3']=$rs['info3'];
	  $show['txt']=$rs['txt'];
	  $show['sids']=$rs['sids'];
	  $shiar=implode(",",$this->ar);
	  $shiar="太".str_replace(",","世,",$shiar)."世";
	  $shiar=str_replace("始世","始祖",$shiar);
	  $shiar=str_replace("太世","太始祖",$shiar);
	  $shiar=explode(",",$shiar);
	  $bgar=explode(",","E6FFE6,ECECFF,FFFFF4,FFECEC,EFF8F8,E6FFE6,ECECFF,FFFFF4,FFECEC,EFF8F8,E6FFE6,ECECFF,FFFFF4,FFECEC,EFF8F8,E6FFE6,ECECFF,FFFFF4,FFECEC,EFF8F8,E6FFE6,ECECFF,FFFFF4,FFECEC,EFF8F8");
	  $show['bg']=$bgar[(count(explode(",",$rs['sids']))-1)];
	  $show['shi']=$shiar[(count(explode(",",$rs['sids']))-1)];
	   $show['zinu']="";
	  if($rs['zids']){$show['zinu']=$this->ar[count(explode(",",$rs['zids']))]."子";}
	  $show['qicont']=$show['qidata']?$show['qidata']:($show['qizi']?"娶".$show['qizi']:"").($show['zinu']?"生".$show['zinu']:"");
	  return $show;
	}
	
	public function zishow($rs){
	  $show=$this->showinfo($rs);
	  $ziar=$this->ar;$ziar[1]="长";$ziar[2]="次";
	  $show['zipaixu']=$ziar[$rs['paixu']]."子";
	  return $show;
	}
	public function show($db,$id,$f=0,$rs=""){
	  if($rs==""){
      $rs=$db::table('pu_puus')->where('id','=',$id)->select();
	  $rs=$rs[0];
	  }
	  $show=$this->showinfo($rs);
	  if($f==0){
      $fs=$db::table('pu_puus')->where('id',$show['sid'])->select();
	  $fs=$fs[0];
	  $fdata=array();
	  $fdata['xing']=$fs['xing'];
	  $fdata['name']=$fs['name'];
	  $fdata['qizi']=$fs['qizi'];
	  $show['fdata']=$fdata;
	  }
	  if($rs['xf']){
		foreach($db::table('pu_puus')->where('sid in('.$rs['xf'].')')->select() as $fk=>$fs){
		$xfdata=array();
		$xfdata['id']=$fs['id'];
		$xfdata['xing']=$fs['xing'];
		$xfdata['name']=$fs['name'];
		$xfdata['qizi']=$fs['qizi'];
		$show['xfdata'][]=$xfdata;
		}
	  }
	  $show['zids']=$rs['zids'];
	  $show['xf']=$rs['xf'];
	  $show['xz']=$rs['xz'];
	    $zidata=array();
		//$db->query("select * from ".$db->dbprefix("puus")." where sid=".$rs[id]." order by paixu asc")->result_array()
		foreach($db::table('pu_puus')->where('sid',$rs['id'])->order('paixu','asc')->select() as $zk=>$zrs){
		$zidata[]=$this->zishow($zrs);
		}
	  if($rs['xz']){
		//$zrs=$db->query("select * from ".$db->dbprefix("puus")." where id=".$rs[xz]."")->result_array();
		$zrs=$db::table('pu_puus')->where('id',$rs['xz'])->select();
		$zrs=$this->zishow($zrs[0]);
		$zrs['zipaixu']="继子";
	    $show['xztit']=$zrs['name'];
		$zidata[]=$zrs;
	  }
	  $show['zidata']=$zidata;
	  return $show;
	}
    public function spudb($db,$id){
      // $sdb=$db->query("select * from ".$db->dbprefix("puus")." where id=".$id)->result_array();
       $sdb=$db::table('pu_puus')->where('id',$id)->select();
	   $sdb=$sdb[0];
	   $show=array();
	   $show['id']=$sdb['id'];
	   $show['sid']=$sdb['sid'];
	   $show['name']=$sdb['name'];
		//foreach($db->query("select * from ".$db->dbprefix("puus")." where sid=".$sdb[sid]."   order by paixu asc")->result_array() as $fk=>$rs){
		foreach($db::table('pu_puus')->where('sid',$sdb['sid'])->order('paixu','asc')->select() as $fk=>$rs){
		$show['sd'][]=$this->show($db,0,1,$rs);	
		}
       return $show;
	}
	public function showlist($db,$d,$sid=2){
	  $putu=array();
	  $pud['sid']=$d['id'];
	   for ($i=0; $i<=100; $i++) {
         $pud=$this->spudb($db,$pud['sid'],1);
		 $putu[]=$pud;
         if($pud['id']==$sid){$d['tname']=$pud['name'];$d['tid']=$pud['id'];break;}
       }
	  sort($putu);
	  if($d['zids'] or $d['xz']){
	  $pud=array();
		foreach($db::table('pu_puus')->where('sid',$d['id'])->order('paixu','asc')->select() as $fk=>$rs){
		$pud['sd'][]=$this->show($db,0,1,$rs);	
		}
		if($d['xz']){
		foreach($db::table('pu_puus')->where('id',$d['xz'])->order('paixu','asc')->select() as $fk=>$rs){
		$sd=$this->show($db,0,1,$rs);	
		$sd['zipaixu']="继子";	
		$pud['sd'][]=$sd;	
		}
		}
	  $putu[]=$pud;
	  }
	  $d['putu']=$putu;
	  return $d;
	}
	public function pupxlist($d,$db,$id){
	  foreach($db::table('pu_puus')->where('sid',$id)->order('paixu','asc')->select() as $zk=>$zrs){
	  $d[]=$zrs['id'];
	  $d=$this->pupxlist($d,$db,$zrs['id']);
	  }
	 return $d;
	}
	public function pupx($db,$id){
      $rs=$db::table('pu_puus')->where('id',$id)->select();
	  $rs=$rs[0];
	  $d[]=$rs['id'];
	  $d=$this->pupxlist($d,$db,$rs['id']);
	 return $d;
	}
	
	public function reptxt($v){
	  $v=str_replace("：",":", $v);
	  $v=str_replace("（","(", $v);
	  $v=str_replace("）",")", $v);
	  $v=str_replace("\r","", $v);
	  $v=str_replace("\n","", $v);
	  $v=str_replace("，",",", $v);
	  $v=str_replace(",",",\r\n", $v);
	  $v=str_replace("沙沟","沙溝(沟)", $v);
	  return $v;
	}
	public function edit($db,$pt){
	  if($pt['id']==""){return "系统有误";}
	  if($pt['name']==""){return "数据有误";}
	  $d="";
      $pudd=$db::table('pu_puus')->where('id',$pt['id'])->select();
	  $pudd=$pudd[0];
	 // $pt[name]=$this->zt->t2c($pt[name]);
//	  if($pudd[name]!=$pt[name]){
//	  $d[name]=$pt[name];
//	  $d[fname]=$this->zt->c2t($pt[name]);
//	  }
	 $gzjn_v=$pt['gzjn'].$pt['gzjn_m'].$pt['gzjn_d'].$pt['gzjn_s'];
     if($gzjn_v){
     $pt['info']=str_replace("年月时",$gzjn_v,$pt['info']);
     $pt['info2']=str_replace("年月时",$gzjn_v,$pt['info2']);
     $pt['txt']=str_replace("年月时",$gzjn_v,$pt['txt']);
	 }
	  if($pt[qizi]){$d[qizi]=$this->zt->t2c($pt[qizi]);$d[fqizi]=$this->zt->c2t($pt[qizi]);}
//	  if($pudd[cunzhuan]!=$pt[cunzhuan]){$d[cunzhuan]=$this->zt->t2c($pt[cunzhuan]);}
	  if($pudd[names]!=$pt[names]){$d[names]=$this->zt->t2c($pt[names]);}
	  if($pudd[qidata]!=$pt[qidata]){$d[qidata]=$pt[qidata];}
//	  if($pudd[xf]!=$pt[xf]){$d[xf]=$pt[xf];}
//	  if($pudd[xz]!=$pt[xz]){$d[xz]=$pt[xz];}
	  if($pudd[info]!=$pt[info]){$d[info]=$this->reptxt($pt[info]);}
	  if($pudd[info2]!=$pt[info2]){$d[info2]=$this->reptxt($pt[info2]);}
	  if($pudd[info3]!=$pt[info3]){$d[info3]=$pt[info3];}
	  if($pudd[txt]!=$pt[txt]){$d[txt]=$this->reptxt($pt[txt]);}
//	  if($pt[zids]){
//		if(implode("",$pt[zids])<>""){
//		foreach($pt[zids] as $zid=>$zve){
//		$db->query("update ".$db->dbprefix('puus')." set paixu=".$zve." where id=".$zid);
//		}
//		$zids="";
//		foreach($db->query("select * from ".$db->dbprefix("puus")." where sid=".$pt[id]." order by paixu asc")->result_array() as $zk=>$zrs){
//		$zids[]=$zrs[id];
//		}
//	    $d[zids]=implode(",",$zids);
//		}
//	  }
//	  if($pt[zname]){
//		$pt[zname]=str_replace("，",",", $pt[zname]);
//		$pt[zname]=str_replace("\r\n",",", $pt[zname]);
//		foreach (explode(",",$pt[zname]) as $zndd){ 
//		$zndd=explode(":",$zndd); 
//		  if($zndd[0]){
//		  $zname=$this->zt->t2c($zndd[0]);
//		   if($db->query("select * from ".$db->dbprefix('puus')." where sid=".$pt[id]." and  name='".$zname."'")->num_rows()==0){
//			$pxdd=$db->query("select * from ".$db->dbprefix("puus")." where sid=".$pt[id]." order by paixu desc limit 0,1")->result_array();
//			$paixu=$pxdd[0][paixu]>0?$pxdd[0][paixu]+1:1;
//			if($zndd[1]){$zqizi=$this->zt->t2c($zndd[1]);$zfqizi=$this->zt->c2t($zndd[1]);}else{$zqizi="";$zfqizi="";}
//			if($pt[cunzhuan]){$cunzhuan=$this->zt->t2c($pt[cunzhuan]);}else{$cunzhuan="";}
//			$db->insert("puus",array(sid=>$pt[id],xing=>"袁",paixu=>$paixu,name=>$zname,fname=>$this->zt->c2t($zname),qizi=>$zqizi,fqizi=>$zfqizi,cunzhuan=>$cunzhuan));		 
//		   }
//		  }
//		}
//		$zids="";
//		foreach($db->query("select * from ".$db->dbprefix("puus")." where sid=".$pt[id]." order by paixu asc")->result_array() as $zk=>$zrs){
//		$zids[]=$zrs[id];
//		}
//	    $d[zids]=implode(",",$zids);
//	  }
      $db->where('id',$pt[id]);
      $db->update('puus',$d);
	 // $tit="客路村总谱（现谱）";
      //if($db->query("select * from ".$db->dbprefix('puinfo')." where pid=".$pt[id]." and tit='".$tit."'")->num_rows()==0){
     // $db->insert("puinfo",array(pid=>$pt[id],tit=>$tit,imgs=>"uploads/yuan/style/img/xian/167.jpg"));	
     // }
	  return "保存成功";
    }
}
