<?php
class Email extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    //采集内容
	public function email($smtpemailto,$mailsubject,$mailcontent,$oid){
      require_once ('email/class.phpmailer.php');
	  $mail = new PHPMailer();
	  
	  $mail->IsSMTP();					// 启用SMTP
	  $mail->Host = "smtp.exmail.qq.com";			//SMTP服务器
	  $mail->SMTPAuth = true;					//开启SMTP认证
	  $mail->Username = "online@ecgam.com";			// SMTP用户名
	  $mail->Password = "6z96HHFtFgE9qDnA";				// SMTP密码
	  
	  $mail->From = "online@ecgam.com";			//发件人地址
	  $mail->FromName = "同泰出行";				//发件人
	  $mail->AddAddress($smtpemailto);	//添加收件人
	  $mail->AddReplyTo("online@ecgam.com", "同泰出行");	//回复地址
	  $mail->WordWrap = 50;					//设置每行字符长度
	  /** 附件设置
	  $mail->AddAttachment("/var/tmp/file.tar.gz");		// 添加附件
	  $mail->AddAttachment("/tmp/image.jpg", "new.jpg");	// 添加附件,并指定名称
	  */
	  $mail->IsHTML(true);					// 是否HTML格式邮件
	  if($mailcontent=="order"){
	  $mailbody='<h1>有新乘客下单，请进入系统接单吧</h1><p>您好!欢迎使用同泰出行，目前只是体验版有很多地方做的不够请体谅!</p>';
	  }elseif($mailcontent=="orderno"){
	  $mailbody='<h1>有乘客已取消订单，请查看</h1><p>您好!欢迎使用同泰出行，目前只是体验版有很多地方做的不够请体谅!</p>';
	  }
	  $mailbody=str_replace("{hosturl}",WWW_URL, $mailbody);
	  $mail->Subject = $mailsubject;			//邮件主题
	  $mail->Body    = $mailbody;		//邮件内容
	 // $mail->AltBody = "This is the body in plain text for non-HTML mail clients";	//邮件正文不支持HTML的备用显示
	  
	  if(!$mail->Send())
	  {
		  return $mail->ErrorInfo;
	  }
	   return 1;
	}	
}
?>