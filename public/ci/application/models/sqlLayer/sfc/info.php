<?php
class Info extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function show($mobile,$id){
	 $db=$this->usset->database(2);
	 $show=$db->query("select * from ".$db->dbprefix("info")." where id=".$id)->result_array();
	 $code=$show[0];
	 $code[l_type]="g_sinfo";
	 return json_encode($code);
	}
}
?>