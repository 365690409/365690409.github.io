<?php
class Uset extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function anpt(){
	  $pt=$_POST;
	  if($pt[oid]==""){return  array(0,$this->code("请选择出发位置"));exit;}
	  if($pt[did]==""){return  array(0,$this->code("请选择目地位置"));exit;}
	  if($pt[totime]==""){return  array(0,$this->code("请选择出发时间"));exit;}
	  if($pt[people]==""){return  array(0,$this->code("请选择出发人数"));exit;}
	  return array(1,$pt); 
	}
}
?>