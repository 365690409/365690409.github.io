<?php
class Admin extends CI_Model {
    function __construct()
    {
        parent::__construct();
	    $this->load->sqlLayer("sfc/usset");
	    $this->load->sqlLayer("sfc/api");
	    date_default_timezone_set('PRC');
    }
	public function index($mobile){
	 $n="user";
	 $db=$this->usset->adminbase();
	 $this->load->sqlLayer("sfc/admin/".$n);
	 return $this->$n->clist($db);
	 
	}
	public function slist($mobile){
	 $pt=$_POST;
	 $db=$this->usset->adminbase();
	 $this->load->sqlLayer("sfc/admin/".$pt[ssurl]);
	 $code=$this->$pt[ssurl]->slist($db,$pt);
	 $code[sskey]=$pt[sskey];
	 $code[l_type]="ad_slist";
	 return json_encode($code);
	}
	public function u($mobile,$n,$page="",$gt=""){
	 $db=$this->usset->adminbase();
	 $this->load->sqlLayer("sfc/uset");
	 return $this->$n->index($db,$page,$gt);
	}
	public function s($mobile,$n,$page="",$gt=""){
	 $db=$this->usset->adminbase();
	 $this->load->sqlLayer("sfc/admin/".$n);
	 return $this->$n->clist($db,$page,$gt);
	}
	public function e($mobile,$n,$id){
	 $db=$this->usset->adminbase();
	 $this->load->sqlLayer("sfc/admin/".$n);
	 return $this->$n->show($db,$id);
	}
	public function p($mobile,$n,$id){
	 $db=$this->usset->adminbase();
	 $this->load->sqlLayer("sfc/admin/".$n);
	 return $this->$n->pshow($db,$id);
	 $db=$this->usset->adminbase();
	 $show=$db->query("select * from ".$db->dbprefix("user")." where id=".$id)->result_array();
	 $code=$show[0];
	 $code[l_type]="ad_recharge";
	 return json_encode($code);
	}
	public function etus($mobile){
	 $db=$this->usset->adminbase();
	 $pt=$_POST;
	 if($pt['yk_code']=="eit_p"){
       $this->load->sqlLayer("sfc/admin/".$pt['yk_s']);
       return $this->$pt['yk_s']->pedit($db,$pt);
	 }elseif($pt['yk_code']=="eit_r"){
       $this->load->sqlLayer("sfc/admin/".$pt['yk_s']);
       return $this->$pt['yk_s']->$pt['yk_n']($db,$pt);
	 }else{
       $this->load->sqlLayer("sfc/admin/".$pt['yk_s']);
       return $this->$pt['yk_s']->edit($db,$pt);
	 }
	}
}
?>