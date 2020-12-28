<?php
class Fbp extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function slist($db,$pt){
	  $query="select * from ".$db->dbprefix('fbp')." where id!=0";
	  $query.=$pt['wee']<>""?" and wee=".$pt['wee']:"";
	  $pt[query]=$query;
	  $pt[p_orderby]=$pt['p_orderby']?$pt['p_orderby']:"id desc";
	  $d=$this->usset->qylist($db,$pt);
	  $d[ssurl]=$pt[ssurl];
	  $d[p_url]='ad_url(#);';
	  return $d;
	}
	public function clist($db,$page=1,$gt=""){
	  $gts=explode("%3E",$gt);
	  $pt="";
	  $pt[p_page]=$page?$page:1;
	  $pt[p_row]=20;
	  $code=$pt;
	  $code[l_type]="ad_l";
	  $code[l_code]="fbp";
	  $code[l_radio][]=array(c=>"a",s=>"wee",d=>array(array(0,'全局'),array(1,'1'),array(2,'2'),array(3,'3'),array(4,'4'),array(5,'5'),array(6,'6'),array(7,'7')));
	  $sqyd=$this->slist($db,$pt);
	  $code[clist]=$sqyd[clist];
	  $code[p_total]=$sqyd[p_total];
	  $code[p_url]='ad_url(#);';
	  $code[p_page]=$sqyd[p_page];
	  $code[p_row]=$sqyd[p_row];
	  return json_encode($code);
	}
	public function show($db,$id){
	 $show=$db->query("select * from ".$db->dbprefix("fbp")." where id=".$id)->result_array();
	 $show=$show[0];
	 $code="";
	 $code[id]=$show[id];
	 $inp="";
	 if($show[id]>1){
	 $inp[]=array(t=>"周",n=>"wee",v=>$show[wee]);
	 $inp[]=array(t=>"从",n=>"o",v=>$show[o]);
	 $inp[]=array(t=>"至",n=>"d",v=>$show[d]);
	 }
	 $inp[]=array(t=>"1人",n=>"fb_a",v=>$show[fb_a]);
	 $inp[]=array(t=>"2人",n=>"fb_b",v=>$show[fb_b]);
	 $inp[]=array(t=>"3人",n=>"fb_c",v=>$show[fb_c]);
	 $inp[]=array(t=>"4人",n=>"fb_d",v=>$show[fb_d]);
	 $inp[]=array(t=>"5人",n=>"fb_e",v=>$show[fb_e]);
	 $code[inp]=$inp;
	 $code[l_type]="ad_e";
	 $code[l_code]="fbp";
	 $code[l_but]="确认修改";
	 return json_encode($code);
	}
	public function edit($db,$pt){
	 $id=$pt[id];
	 $d="";
	 if($id>1){
	 $d['wee']=$pt['wee'];
	 $d['o']=$pt['o'];
	 $d['d']=$pt['d'];
	 }
	 $d['fb_a']=$pt['fb_a'];
	 $d['fb_b']=$pt['fb_b'];
	 $d['fb_c']=$pt['fb_c'];
	 $d['fb_d']=$pt['fb_d'];
	 $d['fb_e']=$pt['fb_e'];
	 $db->where('id',$id);
	 $db->update('fbp',$d);
	 return json_encode(array(l_type=>"adcode",kname=>"修改成功",u=>"s_fbp"));
	}
	public function sok($db,$pt){
	 $id=$pt[id];
	 $db->where('id',$id);
	 $db->update('fbp',array(sok=>($pt[kdd]==1?0:1)));
	 return json_encode(array(l_type=>"adcode",kname=>($pt[kdd]==1?"停止":"开启"),u=>'s_fbp'));
	}
}
?>