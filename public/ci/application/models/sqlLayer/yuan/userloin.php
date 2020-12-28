<?php
class Userloin extends CI_Model {
    function __construct()
    {
        parent::__construct();
	    date_default_timezone_set('PRC');
    }
	//退出会员
	public function logout(){
		session_start();
		preg_match("/[\w\-]+\.\w+$/",$_SERVER["SERVER_NAME"], $arr);
        setcookie("vid",'',1,"/",$arr[0]); 
	    return 1;	
	}
	//保存会员账号
	public function cookie_uid($uid,$logincode,$lifeday=2){
		$lifeTime=($lifeday*3600);
		$lifeTime=(time()+$lifeTime);
		session_start();
		preg_match("/[\w\-]+\.\w+$/",$_SERVER["SERVER_NAME"], $arr);
		setcookie("vid",$uid,$lifeTime,"/",$arr[0]); 
		setcookie("logincode",$logincode,$lifeTime,"/",$arr[0]); 
		setcookie("vid_".$uid,$logincode,$lifeTime,"/",$arr[0]); 
	}
	//登录账号
	public function run_login($db,$mobile,$code=""){
	  if(preg_match("/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$|17[0-9]{1}[0-9]{8}$/",$mobile)){
		$us=$db->query("select id,logincode from ".$db->dbprefix("user")." where mobile='".$mobile."'")->result_array();
		$us=$us[0];
		if($_COOKIE['vid_'.$us[id]]==$us[logincode] and $us[logincode]!=""){
		$logincode=$_COOKIE['vid_'.$us[id]];
		$this->cookie_uid($us[id],$logincode,180);
		  return array(s=>1);
		}
		if($code){
		$uvy=$db->query("select vcode from ".$db->dbprefix("usverify")." where mobile='".$mobile."' and atime>".(time()-60*60*24))->result_array();
		$uvy=$uvy[0];
		if($uvy[vcode]==$code){
		  if($db->query("select id from ".$db->dbprefix('user')." where mobile='".$mobile."'")->num_rows()==0){
		  $d="";
		  $d[mobile]=$mobile;
		  $d[callname]="尾号".substr($mobile,-4);
		  $d[avatarid]=rand(1,16);
		  $d[sok]=1;
		  $d[adate]=date("Y-m-d H:i:s");
		  $db->insert("user",$d);
		  }
		  $us=$db->query("select id,logincode from ".$db->dbprefix("user")." where mobile='".$mobile."'")->result_array();
		  $us=$us[0];
		  $logincode=md5($us[id].time().rand(100,999));
		  $this->cookie_uid($us[id],$logincode,180);
		  $db->where('id',$us[id]);
		  $db->update('user',array(logincode=>$logincode,ldate=>date("Y-m-d H:i:s")));
	      return array(s=>1);
		}else{
	      return array(kname=>"输入验证码不对");
		}	
		}else{
		$uvy=$db->query("select id,mobile,vcode from ".$db->dbprefix("usverify")." where mobile='".$mobile."' and atime>".(time()-60*60*24))->result_array();
		$uvy=$uvy[0];
		if($uvy){
		$telw=substr($mobile,0,3)."****".substr($mobile,-4);
	    return array(s=>2,kname=>"验证码24内有效，请查看手机信息",mobile=>$mobile,st=>"验证码已发送过：<span style='color:#0B82F1;'>".$telw."</span><br />验证码<span style='color:#0B82F1;font-size:16px;'>24</span>小时内有效，请查看手机信息最新的验证码");
		}else{
		$code=rand(1000,9999);
		$ss=$this->usset->sendSms(array(pn=>$mobile,tc=>1,code=>$code));
		if($ss->Message=="OK"){
		$db->insert("usverify",array(mobile=>$mobile,vcode=>$code,atime=>time()));
		$telw=substr($mobile,0,3)."****".substr($mobile,-4);
	    return array(s=>2,kname=>"新的验证码，请注意查收",mobile=>$mobile,st=>"验证码已发送：<span style='color:#0B82F1;'>".$telw."</span><br />验证码<span style='color:#0B82F1;font-size:16px;'>24</span>小时内有效，请查看手机信息最新的验证码");
		}else{
	    return array(kname=>"验证码发送失败");
		}
		}
		}
	  }else{
	    return array(kname=>"请输入正确手机号");
	  }
	}
	public function add_user($db,$pt=""){
	 $code= $this->run_login($db,$pt[mobile],$pt[vcode]);
	 $code[l_type]="g_setshow";
	 return json_encode($code);
	}
	
}
?>