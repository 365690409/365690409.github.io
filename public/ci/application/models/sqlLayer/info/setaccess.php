<?php
class Set extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	//复制数据库
	public function dataname($uid,$tid){
	  $b=$uid<$tid?$uid."_".$tid:$tid."_".$uid;
	  $d="usinfo";
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
	  $dsn="DRIVER=Microsoft Access Driver (*.mdb);DBQ=".realpath("./uploads/sqlite/".$d."/".$b);
	  return odbc_connect($dsn,"","",SQL_CUR_USE_ODBC );	
	}
	//读取信息
	public function seinfo($uid,$tid,$top=50){
	  $db=$this->dataname($uid,$tid);
	  $d="";
	  $query=odbc_do($db,"select top ".$top." * from usinfo order by id desc");
      while(odbc_fetch_row($query)){
	    $rs="";
	    $rs[id]=odbc_result($query,'id');
	    $rs[uid]=odbc_result($query,'uid');
	    $rs[oid]=odbc_result($query,'oid');
	    $rs[txt]=odbc_result($query,'txt');
		$d[]=$rs;
	  }
	  odbc_close($db);
	  return $d;	
	}
	//连接数据库
	public function qu($db,$sql){
     //$sql="update us_usinfo set txt='测试测试测试测试' where id=28";
      //$sql="delete from  us_usinfo ";
       $re=odbc_do($db, $sql);if($re){return 1;}else{    return 0;}	
	   odbc_close($db);
	}
	//发送信息
	public function sendinfo($uid,$tid,$txt,$oid=0){
	  $db=$this->dataname($uid,$tid);
	  echo $this->qu($db,"insert into usinfo(uid,txt,atime)values(".$uid.",'".$txt."',".time().")");
	  return 0;
	}
}
?>