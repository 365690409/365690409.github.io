<?php
class Usset extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function click($tid){
		return 1;
	}
	public function database($tid){
		if($tid!=1){
		return $this->create($tid);
		}
		$db="";
		$db['hostname'] = 'localhost';
		$db['username'] = 'social_f';
		$db['password'] = 'seo0209';
		$db['database'] = 'social';
		$db['dbdriver'] = 'mysql';
		$db['dbprefix'] = 'mro_';
		$db['pconnect'] = TRUE;
		$db['db_debug'] = TRUE;
		$db['cache_on'] = FALSE;
		$db['cachedir'] = '';
		$db['char_set'] = 'utf8';
		$db['dbcollat'] = 'utf8_general_ci';
		$db['swap_pre'] = '';
		$db['autoinit'] = TRUE;
		$db['stricton'] = FALSE;
		return $this->load->database($db,TRUE);
	}
	public function wxdatabase($tid){
		$db="";
		if($tid==7){
		$db['hostname'] = 'localhost';
		$db['username'] = 'lhbattery_f';
		$db['password'] = 'seo123';
		$db['database'] = 'lhbattery';
		$db['dbdriver'] = 'mysql';
		$db['dbprefix'] = 'mro'.$tid.'_';
		}else{
		$db['hostname'] = 'localhost';
		$db['username'] = 'social_f';
		$db['password'] = 'seo0209';
		$db['database'] = 'social';
		$db['dbdriver'] = 'mysql';
		$db['dbprefix'] = 'mro'.$tid.'_';
		}
		$db['pconnect'] = TRUE;
		$db['db_debug'] = TRUE;
		$db['cache_on'] = FALSE;
		$db['cachedir'] = '';
		$db['char_set'] = 'utf8';
		$db['dbcollat'] = 'utf8_general_ci';
		$db['swap_pre'] = '';
		$db['autoinit'] = TRUE;
		$db['stricton'] = FALSE;
		return $this->load->database($db,TRUE);
	}
	public function create($tid)
	{
		
	  $db=$this->database(1);
	  $mysql="";
	  foreach(array("column","skin","banner","feedback","message","news","product","img") as $name){
		$sql=$db->query("show create table `".$db->dbprefix($name)."`")->result(); 
		$sql=get_object_vars($sql[0]);
		$mysql[]=str_replace("CREATE TABLE `mro_","CREATE TABLE `mro".$tid."_",$sql['Create Table']);
	  }
	  $this->wxdatabase($tid);
	  foreach($mysql as $sql){
		  $result = mysql_query($sql);
		  //if(!$result){mysql_error();}
	  }
	  return $this->wxdatabase($tid);
   }	
}
?>