<?php
class Mysql extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function bf(){
	  $db=$this->usset->database("pu");
	  mysql_query("set names 'utf8'");
	  $mysql= "set charset utf8;\r\n";
	  $q1=mysql_query("show tables");
	  while($t=mysql_fetch_array($q1)){
		$table=$t[0];
		$q2=mysql_query("show create table `$table`");
		$sql=mysql_fetch_array($q2);
		$mysql.=$sql['Create Table'].";\r\n";
		$q3=mysql_query("select * from `$table`");
		while($data=mysql_fetch_assoc($q3)){
		  $keys=array_keys($data);
		  $keys=array_map('addslashes',$keys);
		  $keys=join('`,`',$keys);
		  $keys="`".$keys."`";
		  $vals=array_values($data);
		  $vals=array_map('addslashes',$vals);
		  $vals=join("','",$vals);
		  $vals="'".$vals."'";
		  $mysql.="insert into `$table`($keys) values($vals);\r\n";
		}
	  }
	  $filename="./uploads/mysql/".$db->database.date('Ymjgi').".sql"; //存放路径，默认存放到项目最外层
	  $fp = fopen($filename,'w');
	  fputs($fp,$mysql);
	  fclose($fp);
	  echo "数据备份成功";	
	}
	public function hy($name){
	  $fname="./uploads/mysql/".$name.".sql";
	  if (file_exists($fname)) {
		$db=$this->usset->database("pu");
		$connect = mysql_connect($db->hostname,$db->username,$db->password);
		mysql_select_db($db->database);
		$result = mysql_query("show table status from ".$db->database,$connect);
		while($data=mysql_fetch_array($result)) {
			mysql_query("drop table $data[Name]");
		}	
		$this->restores("./uploads/mysql/".$name.".sql"); //执行MySQL恢复命令
	  }else{
	   return "MySQL备份文件不存在，请检查文件路径是否正确！";
	  }
	}
	
	public function restores($fname){
		$sql_value="";
		$cg=0;
		$sb=0;
		$sqls=file($fname);
		foreach($sqls as $sql)
		{
		$sql_value.=$sql;
		}
		$a=explode(";\r\n", $sql_value); //根据";\r\n"条件对数据库中分条执行
		$total=count($a)-1;
		mysql_query("set names 'utf8'");
		for ($i=0;$i<$total;$i++)
		{
		mysql_query("set names 'utf8'");
		//执行命令
		if(mysql_query($a[$i]))
		{
		 $cg+=1;
		}
		else
		{
		 $sb+=1;
		 $sb_command[$sb]=$a[$i];
		}
		}
		echo "操作完毕，共处理 $total 条命令，成功 $cg 条，失败 $sb 条";
		//显示错误信息
		if ($sb>0)
		{
		echo "<hr><br><br>失败命令如下：<br>";
		for ($ii=1;$ii<=$sb;$ii++)
		{
		 echo "<p><b>第 ".$ii." 条命令（内容如下）：</b><br>".$sb_command[$ii]."</p><br>";
		}
		}  //-----------------------------------------------------------
   }
 	
}
