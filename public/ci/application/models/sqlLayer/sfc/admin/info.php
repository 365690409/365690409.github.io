<?php
class Info extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function slist($db,$pt){
	  $d="";
	  $d[ssurl]=$pt[ssurl];
	  $query="select * from ".$db->dbprefix('info')." where id!=0";
	  $query.=$pt['sok']<>""?" and sok=".$pt['sok']:"";
	  $d['total_number']=$db->query($query)->num_rows();
	  $query.=$pt['ecorder']?" order by ".$pt['ecorder']:" order by sort desc,id desc";
	  $page=$page?$page:1;
	  $count=$count?$count:20;
	  $page=$page?(($page-1)*$count):0;
	  $query.=" limit $page,$count";
	  $query=$db->query($query);
	  foreach ($query->result_array() as $rs){
		 $d['clist'][]=$rs;
	  }
	  return $d;
	}
	public function clist($db){
	  $code="";
	  $code[l_type]="ad_l";
	  $code[l_code]="info";
	  $code[l_radio][]=array(c=>"a",s=>"sok",d=>array(array(1,'开启'),array(0,'关闭')),v=>1);
	  $clist="";
	  foreach ($db->query("select * from ".$db->dbprefix('info')." order by sort desc,id desc")->result_array() as $rs){
		$clist[]=$rs;
	  }
	  $code[clist]=$clist;
	  return json_encode($code);
	}
	public function tt_ar(){
	 $ar="";
	 $ar[]=array("{kf_img}",'<img src="uploads/style/img/weixinimg.jpg" />');
	 $ar[]=array("\r\n",'<br />');
	 $ar[]=array("\n",'<br />');
	 return $ar;
	}
	public function tt_tea($d,$ar,$s=0){
	 $s_b=$s==1?0:1;
	 foreach($ar as $k){
	 $d=str_replace($k[$s],$k[$s_b],$d);
	 }
	 return $d;
	}
	public function show($db,$id){
	 $tt_ar=$this->tt_ar();
	 $show=$db->query("select * from ".$db->dbprefix("info")." where id=".$id)->result_array();
	 $show=$show[0];
	 $code="";
	 $code[id]=$show[id];
	 $inp="";
	 $inp[]=array(t=>"标题",n=>"title",v=>$show[title]);
	 $inp[]=array(t=>"排序",n=>"sort",v=>$show[sort]);
	 $inp[]=array(type=>"textarea",t=>"信息",n=>"keywords",v=>$this->tt_tea($show[keywords],$tt_ar,1));
	 $inp[]=array(type=>"textarea",t=>"内容",n=>"content",v=>$this->tt_tea($show[content],$tt_ar,1));
	 $code[inp]=$inp;
	 $code[l_type]="ad_e";
	 $code[l_code]="info";
	 $code[l_but]="确认修改";
	 return json_encode($code);
	}
	public function edit($db,$pt){
	 $tt_ar=$this->tt_ar();
	 $id=$pt[id];
	 $d="";
	 $d['title']=$pt['title'];
	 $d['sort']=$pt['sort'];
	 $d['keywords']=$this->tt_tea($pt['keywords'],$tt_ar);
	 $d['content']=$pt['content'];
	 $db->where('id',$id);
	 $db->update('info',$d);
	 return json_encode(array(l_type=>"adcode",kname=>"修改成功",u=>"s_info"));
	}
	public function sok($db,$pt){
	 $id=$pt[id];
	 $db->where('id',$id);
	 $db->update('info',array(sok=>($pt[kdd]==1?0:1)));
	 return json_encode(array(l_type=>"adcode",kname=>($pt[kdd]==1?"停止":"开启"),u=>'s_info'));
	}
}
?>