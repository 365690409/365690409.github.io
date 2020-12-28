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
		if($tid==2){
		$db="";
		$db['hostname'] = 'localhost';
		$db['username'] = 'social_f';
		$db['password'] = 'seo0209';
		$db['database'] = 'social';
		$db['dbdriver'] = 'mysql';
		$db['dbprefix'] = 'mro2_';
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
	public function runemail($db,$uid,$pt,$label)
	{
	   $em=$db->query("select * from ".$db->dbprefix('email')." where label='".$label."'")->result_array();
	   $em=$em[0];
       $this->load->sqlLayer("set/semail");
	   if($em['isok']==1){
	   $usdb=$this->load->database("us",TRUE);
	   $us=$usdb->query("select email,username from ".$usdb->dbprefix('user')." where id=".$uid)->result_array();
	   $email=$us[0]['email'];
	   $username=$us[0]['username'];
       $this->semail->email($email,$em['title'],"prompt","html",array("content"=>$em['text'],"title"=>$pt['title'],"email"=>$email,"username"=>$username));
	   }
	   if($em['reply_isok']==1){
       $this->semail->email($em['reply_email'],"回复提示:".$em['title'],"prompt","html",array("content"=>$em['reply_text']));
	   }
	}
	public function upload_file($db,$num,$name){
	  $f="";  
	  $pathurl="./skin/u/";	
	  $pathurl.=$_COOKIE['uid']?$_COOKIE['uid'].'/':'0/';
	  if (!file_exists($pathurl)){mkdir($pathurl);}
	  $pathurl.=date("Ymd").'/';
	  if (!file_exists($pathurl)){mkdir($pathurl);}
	  $random=rand(10000, 99999);
	  $time=time();
	  $pathurl.=date("YmdHis"). '_' .$random.'/';
	  if (!file_exists($pathurl)){mkdir($pathurl);}
	  $config['upload_path'] = $pathurl;
	  $config['allowed_types'] = 'xls|docx|doc';
	  $config['max_size'] = '10000';
	  $this->load->library('upload', $config);
	  for($i=1;$i<=$num;$i++){
		if($_FILES[$name."_".$i]["name"]){
		$this->upload->do_upload($name."_".$i);
		$this->upload->file_name =iconv("gb2312","UTF-8", $this->upload->file_name);
		$db->insert("file",array("name"=>$this->upload->file_name,"url"=>$pathurl.$this->upload->file_name,"size"=>$this->upload->file_size,"random"=>$random,"createtime"=>$time));
		}
	  }
	  $id="";
	  foreach ($db->query("select id from ".$db->dbprefix("file")." where createtime=".$time." and random=".$random)->result_array() as $r){
	  $id.=$id?",".$r[id]:$r[id];
	  }
	  return $id;
	}
}
?>