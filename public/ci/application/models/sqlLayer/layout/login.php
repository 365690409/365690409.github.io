<?php
class Login extends CI_Model {
    function __construct()
    {
        parent::__construct();
	    $this->load->sqlLayer("layout/usset");
    }
	//退出会员
	public function logout(){
		session_start();
		preg_match("/[\w\-]+\.\w+$/",$_SERVER["SERVER_NAME"], $arr);
        setcookie("uid",'',1,"/",$arr[0]); 
        setcookie("sina_id",'',1,"/",$arr[0]); 
        setcookie("sina_token",'',1,"/",$arr[0]); 
        setcookie("t_openid",'',1,"/",$arr[0]); 
        setcookie("t_openkey",'',1,"/",$arr[0]); 
        setcookie("t_access_token",'',1,"/",$arr[0]); 
        setcookie("t_class",'',1,"/",$arr[0]); 
	    return 1;	
	}
	
	//保存会员账号
	public function cookie_uid($uid,$lifeTime=0){
		session_start();
		preg_match("/[\w\-]+\.\w+$/",$_SERVER["SERVER_NAME"], $arr);
		setcookie("uid",$uid,$lifeTime,"/",$arr[0]); 
	}
	//账号
	public function run_login($logn_username,$logn_pwd,$lifeday=168){
       $this->load->database("us");
	   $result=mysql_query("select id,uid,password,audit from us_user where username='$logn_username'");
	   $sum=mysql_num_rows($result);
	   if($sum==0){
		  return "该用户不存在！";
	   }else{
		while($val = mysql_fetch_array($result)){
		  if($val[password]!==md5($logn_pwd)){
			return "用户密码不对";
		  }elseif($val['audit']!=1){
			   return "该用户末激活！";
		  }else{
			  // 保存一天
			  if($lifeday>0){
			  $lifeTime = $lifeday * 3600; 
			  session_start();
			  $uid=$val['uid']?$val['uid']:$val['id'];
			  $this->cookie_uid($uid,(time() + $lifeTime));
			  }
			  mysql_query("update us_user SET login_time='".time()."',login_num=login_num+1,login_ip='".$_SERVER["REMOTE_ADDR"]."' where id={$val[id]}");
			  return 1;
		  }
		}
	   }
	}
	//会员
	public function login()
	{
		$pt=$_POST;
		if($_POST){
		  return $this->run_login(trim($pt['username']),trim($pt['password']));
		}
	}
	//注册会员账号
	public function registration(){
	  $daa=$_POST;
      $this->load->database("us");
	  if($daa['username'] and $daa['password'] and $daa['email']){
		if(mysql_num_rows(mysql_query("select id from ".$this->db->dbprefix('user')." where username='".$daa['username']."' or email='".$daa['email']."' "))==0){
		 $time=time();
		 $d="";
		 $d['username']=$daa['username'];
		 $d['password']=md5($daa['password']);
		 $d['email']=$daa['email'];
		 $d['audit']=1;
		 $d['login_ip']=$_SERVER["REMOTE_ADDR"];
		 $d['login_time']=$time;
		 $d['create_time']=$time;
		 $d['create_ip']=$_SERVER["REMOTE_ADDR"];
	     $email_code=md5(time().rand(100,999).$email);
		 $d['email_code']=$email_code;
         $this->load->sqlLayer("set/semail");
		 if($this->semail->email($daa['email'],"注册账号","reg","html",array("email_code"=>$daa['purl']."?code=".$email_code))==1){
		 $this->db->insert('user', $d); 
		 $this->run_login($daa['username'],$daa['password'],168);
		 return 1;
		 }else{
		 return "无效邮箱";
		 }
		}else{
		 return "用户名和邮箱已被占用！";
		}
	  }else{
       return 0;
	  }
	}
	//注册邮箱验证
	public function registration_email_validation(){
		$code=$_GET['code'];
		if($code){
	      $uid=(int)$_COOKIE['uid'];
		  if($uid){
			$db=$this->load->database("us",TRUE);
			if($db->query("select id from ".$db->dbprefix('user')." where id=".$uid." and email_code='".$code."'")->num_rows()){
			 $db->where('email_code',$code);
			 $db->update("user",array("email_code"=>"")); 
			 return 1;
			}else{
			 return array("errcode"=>8202,"name"=>"您已验证过");
			}
		  }
          return array("errcode"=>8201,"name"=>"你还没有");
		}
	}
	//从邮箱新发送
	public function registration_email_validation_again(){
	  $pt=$_POST;
	    $uid=(int)$_COOKIE['uid'];
		if($uid){
		  $db=$this->load->database("us",TRUE);
		  $us=$db->query("select email,email_code from ".$db->dbprefix('user')." where id=".$uid." and email_code<>''")->result_array();
		  $email_code=$us[0]['email_code'];
		  $email=$us[0]['email'];
		  $this->load->sqlLayer("set/semail");
		  $this->semail->email($email,"注册账号","reg","html",array("email_code"=>$pt['purl']."?code=".$email_code));
		  return 1;
		}
		return 0;
	}
	//从邮箱新发送
	public function registration_cancellation($code){
	    $uid=$_COOKIE['uid'];
		if($uid){
          $db=$this->load->database("us",TRUE);
		  if($db->query("select id from ".$db->dbprefix('user')." where email_code<>'' and id='".$uid."'")->num_rows()){
		   $db->delete("user", array('id'=>$uid)); 
		   $this->logout();
		   return 1;
		  }
		}
		return 0;
	}
	//注册会员基本信息
	public function registration_basic(){
	   $pt=$_POST;
	   if($pt){
		 $db=$this->load->database("us",TRUE);
		 $uid=$_COOKIE['uid'];
		 if($uid){
		 $d="";
		 //个人信息
		 $d['the_name']=$pt['the_name'];
		 $d['mobile_phone']=$pt['mobile_phone'];
		 $d['address']=$pt['address'];
		 //公司信息
		 $object['company_name']=$pt['company_name'];
		 if($db->query("select uid from ".$db->dbprefix('info')." where uid='".$uid."'")->num_rows()){
		 $db->where('uid',$uid);
		 $db->update('info',$d); 
		 }else{
		 $d['uid']=$uid;
		 $db->insert('info', $d); 
		 }
		 return $uid;
		 }
	   }
	}
	
	
	//找回密码
	public function retrieve_password(){
	  $email=$_POST['email'];
	  if($email){
		$db=$this->load->database("us",TRUE);  
		if($db->query("select id from ".$db->dbprefix('user')." where email='".$email."'")->num_rows()){
		$us=$db->query("select id from ".$db->dbprefix('user')." where email='".$email."'")->result_array();
		$uid=$us[0]['id'];
		$passcode=md5(time().rand(100,999).$email);
		$db->delete("passcode", array('uid'=>$uid)); 
		$db->insert('passcode',array("uid"=>$uid,"passcode"=>$passcode,"addtime"=>time())); 
		$this->load->sqlLayer("set/semail");
		$this->semail->email($email,"找回密码","retrievepassword","html",array("email_code"=>$_POST['purl'].$uid."/".$passcode));
		return $uid;
		}
	  }
	}
	//找回密码_重新设置密码
	public function retrieve_password_again(){
	  $pt=$_POST;
	  $uid=$pt['uid'];
	  if($uid and $pt['passcode'] and $pt['password'] and $pt['password']==$pt['password2']){
		$db=$this->load->database("us",TRUE);  
		if($db->query("select uid from ".$db->dbprefix('passcode')." where passcode='".$pt['passcode']."'")->num_rows()){
		  if($db->query("select id from ".$db->dbprefix('user')." where id='".$uid."'")->num_rows()){
		  // 保存一天
		  if($uid){
		  $db->where('id',$uid);
		  $db->update("user",array("password"=>md5($pt['password']))); 
		  $lifeTime =7 * 3600; 
		  $this->cookie_uid($uid,(time() + $lifeTime));
		  return $uid;
		  }
		  }
		}
	  }
	  return 0;
	}
}
