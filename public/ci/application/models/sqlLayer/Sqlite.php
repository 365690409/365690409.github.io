<?php
class Sqlite extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	//复制数据库
	public function dataname($d,$b=""){
	  if($b){
		$b=$b.".db";
		if (is_readable("./uploads/sqlite/".$d."/".$b) == false) { 
		  if(copy("./uploads/sqlite/".$d.".db","./uploads/sqlite/".$d."/".$b)){
		  return $this->database($d,$b);
		  }else{
           return 0;
		  }
		}else{
		  return $this->database($d,$b);
		}
	  }else{
       return 0;
	  }
	}
	//连接数据库
	public function database($d,$b=""){
		$db="";
		$db['hostname'] = "";
		$db['username'] = "";
		$db['password'] = "";
		$db['database'] = realpath("./uploads/sqlite/".$d."/".$b);
		$db['dbdriver'] = "sqlite";
		$db['dbprefix'] = "wb_";
		$db['pconnect'] = TRUE;
		$db['db_debug'] = TRUE;
		$db['cache_on'] = FALSE;
		$db['cachedir'] = "";
		$db['char_set'] = "utf8";
		$db['dbcollat'] = "utf8_general_ci";
		return $this->load->database($db,TRUE);
	}
}
?>