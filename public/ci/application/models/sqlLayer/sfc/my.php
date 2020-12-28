<?php
class My extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function quota($mobile,$tid){
	 $db=$this->usset->loginbase();
	 $show=$db->query("select callname,avatarid,price,cint from ".$db->dbprefix("user")." where mobile='".$mobile."'")->result_array();
	 $code=$show[0];
	 $code[mobile]=$mobile;
	 $code[mobilem]=substr($code[mobile],0,3)."****".substr($code[mobile],-4);
	 $code[orderrows]=$code[cint];
	 $quotalist=$db->query("select * from ".$db->dbprefix("usprice")." where smobile='".$mobile."' order by id desc")->result_array();
	 $code[quotalist]=$quotalist;
	 $code[l_type]="my_quota";
	 return json_encode($code);
	}
}
?>