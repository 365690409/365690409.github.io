<?php
class Site extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function clist($db,$id=1){
	 $show=$db->query("select * from ".$db->dbprefix("site")." where id=".$id)->result_array();
	 $show=$show[0];
	 $code="";
	 $code[id]=$show[id];
	 $inp="";
	 $inp[]=array(t=>"名称",n=>"settit",v=>$show[settit]);
	 $inp[]=array(t=>"bz",v=>$show[pcodds]);
	 $inp[]=array(t=>"额度",v=>$show[price]);
	 $code[inp]=$inp;
	 $code[l_type]="ad_e";
	 $code[l_code]="site";
	 $code[l_tit]="网站设置";
	 $code[l_but]="确认设置";
	 return json_encode($code);
	}
	public function edit($db,$pt){
	 $id=$pt[id];
	 $d="";
	 $d['settit']=$pt['settit'];
	 $db->where('id',$id);
	 $db->update('site',$d);
	 return json_encode(array(l_type=>"adcode",kname=>"设置成功"));
	}
}
?>