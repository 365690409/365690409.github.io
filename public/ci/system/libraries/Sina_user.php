<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CI_Sina_user {
	var	$useragent		= "CodeIgniter";
	/**
	 * 微博用户数据列表
	 *
	 * @access	protected
	 * @param	string
	 * @return	string
	 */
	public function SinaUser_list(){
	   $this->load->database("wb");
	   $data="";
	   $query= "select * from met_sina_user";
	   $data[total_number]=mysql_num_rows(mysql_query($query));
	   $page=$_REQUEST[page];
	   $count=$_REQUEST['count']?$_REQUEST['count']:20;
       $page=$page?(($page-1)*$count):0;
	   $result = mysql_query($query." order by id desc limit $page,$count");
	   while($val= mysql_fetch_array($result)){
		$data['list'][]=$val;  
	   }
	  return $data;
	}

}
?>
