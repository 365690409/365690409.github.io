<?php
class User extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    //用户资料
	public function lists($tid,$count,$page=1){
		$pt=$_POST;
	    $db=$this->load->database("us",TRUE);
		$d="";
		$query="select * from ".$db->dbprefix('user')." where( web_uid=".$tid." or id=".$tid.")";
		$query.=trim($pt['username'])?" and username like '%".trim($pt['username'])."%'":"";
		$query.=trim($pt['web_type'])?" and web_type='".trim($pt['web_type'])."'":"";
		$key=trim($pt['key']);
		if(is_numeric($key)){
		$query.=" and id=".(int)$key;
		}elseif($key){
		$query.=" and (username like '%".$key."%' or email like '%".$key."%')";
		}
		$d['name']=$pt['ecn'];
		$d['eck']=$pt['eck'];
		$d['jid']=$pt['jid'];
		$d['total_number']=$db->query($query)->num_rows();
		$query.=$pt['ecorder']?" order by ".$pt['ecorder']:" order by id desc";
		$page=$page?$page:1;
		$count=$count?$count:20;
		$page=$page?(($page-1)*$count):0;
	    $query.=" limit $page,$count";
		foreach ($db->query($query)->result_array() as $r){
			$r['login_date']=date("Y-m-d H:i:s",$r['login_time']);
			$r['create_date']=date("Y-m-d H:i:s",$r['create_time']);
		    $d['list'][]=$r;
		}
		return json_encode($d);
	}
    //用户资料
	public function infoshow($tid){
	  $db=$this->load->database("us",TRUE);
	  $query =$db->select('the_name,gender,email,qq,address,mobile_phone')->where('uid', $_COOKIE['uid'])->get('info');
	  $row=$query->result();
	  $show=$row[0]?$row[0]:array();
	  return json_encode($show);
	}
    //修改用户资料
	public function infoedit($tid){
	   $uid=$_COOKIE['uid'];
	   $pt=$_POST;
	   $d="";
	   $d['mobile_phone']=trim($pt['mobile_phone']);
	   $db=$this->load->database("us",TRUE);
	   $db->where('id',$uid);
	   $db->update('user',$d);
	   $d['the_name']=trim($pt['the_name']);
	   $d['gender']=trim($pt['gender']);
	   $d['qq']=trim($pt['qq']);
	   $d['address']=trim($pt['address']);
	   if($uid){
          if($db->query("select uid from ".$db->dbprefix('info')." where uid=".$uid."")->num_rows()){
	       $db->where('uid',$uid);
	       $db->update('info',$d);
		   }else{
		   $d['uid']=(int)$uid;
		   $db->insert('info',$d);
		   }
	      return 1002;
	   }
	}
	public function edit($tid,$id=""){
	   $pt=$_POST;
	   $d="";
	   $d['username']=trim($pt['username']);
	   $d['email']=trim($pt['email']);
	   $d['mobile_phone']=trim($pt['mobile_phone']);
	   $d['web_type']=(int)$pt['web_type'];
	   $d['uid']=(int)$pt['uid'];
	   $db=$this->load->database("us",TRUE);
	   if($id){
	   $db->where('id',$id);
	   $db->update('user',$d);
	   return 1002;
	   }
	}
	public function del($tid,$id=""){
	   $db=$this->load->database("us",TRUE);
	   $db->delete("user",array('id'=>$id)); 
	   return 1003;
	}
	public function show($tid,$id=""){
	   $pt=$_POST;
	   $db=$this->load->database("us",TRUE);
	   $row=$db->query("select ".($pt['t']?$pt['t']:"*")." from ".$db->dbprefix("user")." where id=".$id)->result();
	   $row=$row[0];  
	   return json_encode($row);
	}
}
?>