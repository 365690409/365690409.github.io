<?php
class Pupx extends CI_Model {
    function __construct()
    {
      parent::__construct();
    }
	public function pupxlist($d,$db,$id){
	  foreach($db->query("select id from ".$db->dbprefix("puus")." where sid=".$id." order by paixu asc")->result_array() as $zk=>$zrs){
	  $d[]=$zrs[id];
	  $d=$this->pupxlist($d,$db,$zrs[id]);
	  }
	 return $d;
	}
	public function pupx($db,$id){
	  $d="";
      $rs=$db->query("select id from ".$db->dbprefix("puus")." where id=".$id)->result_array();
	  $rs=$rs[0];
	  $d[]=$rs[id];
	  $d=$this->pupxlist($d,$db,$rs[id]);
	 return $d;
	}
}
?>