<?php
class Curl extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    //采集内容
	public function curl2($url){
	  $headerArray = array(
	  'Accept:application/json, text/javascript, */*',
	  'Content-Type:application/x-www-form-urlencoded',
	  'Referer:https://mp.weixin.qq.com/'
	  );
	  $ch = curl_init();
	  curl_setopt($ch,CURLOPT_URL,$url);
	  // 对认证证书来源的检查，0表示阻止对证书的合法性的检查。
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	  // 从证书中检查SSL加密算法是否存在
	  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//关闭直接输出
	  curl_setopt($ch,CURLOPT_POST,1);//使用post提交数据
	  curl_setopt($ch,CURLOPT_POSTFIELDS,$post);//设置 post提交的数据
	  curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.69 Safari/537.36');//设置用户代理
	  curl_setopt($ch,CURLOPT_HTTPHEADER,$headerArray);//设置头信息
	  curl_setopt($ch,CURLOPT_COOKIEJAR,$cookie_file);//设置cookie的保存目录，这里很重要，你懂的（cookie你都不存，你以为你是麻花腾啊！）
	  $content = curl_exec($ch);//这里会返回token，需要处理一下。
	  curl_close($ch);		
	  return $content; //输出请求结果
	}	
    //采集内容
	public function curl($purl=array()){
	  $ch = curl_init();
	  if($_SERVER['HTTP_HOST']=="weixin.70jf.com"){
	  curl_setopt($ch, CURLOPT_URL,$purl['url']); //请求url地址
	  }else{
	  $purl['url']=str_replace("http://","",$purl['url']);
	  curl_setopt($ch, CURLOPT_URL, "http://weixin.70jf.com/Weixincurl/".$purl['url']); //请求url地址
	  }
	  curl_setopt($ch, CURLOPT_HEADER, FALSE); //是否返回响应头信息
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //是否将结果返回
	  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); //是否重定向
	  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:9.0.1) Gecko/20100101 Firefox/9.0.1'); //
	  if($purl['metword']){
	  $postfields = '';
	  foreach ($purl['metword'] as $key => $value){
		  $postfields .= urlencode($key) . '=' . urlencode($value) . '&';  
	  }
	  curl_setopt($ch, CURLOPT_POST, true); //
	  curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields); //
	  }
	  if($purl['body']){
	  curl_setopt($ch, CURLOPT_POST, true); //
	  if($_SERVER['HTTP_HOST']=="weixin.70jf.com"){
	  curl_setopt($ch, CURLOPT_POSTFIELDS, $purl['body']); //
	  }else{
	  curl_setopt($ch, CURLOPT_POSTFIELDS, "body=".$purl['body']); //
	  }
	  }
	  $content=curl_exec($ch); //执行
	  curl_close($ch); //关闭连接
	  return json_decode($content, true); //输出请求结果
	}	
	//微信下载
	public function downloadWeixinFile($url)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, 0);    
		curl_setopt($ch, CURLOPT_NOBODY, 0);    //只取body头
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$package = curl_exec($ch);
		$httpinfo = curl_getinfo($ch);
		curl_close($ch);
		$imageAll = array_merge(array('header' => $httpinfo), array('body' => $package)); 
		return $imageAll;
	}
	//微信下载保存
	public function saveWeixinFile($filename, $filecontent)
	{
		$local_file = fopen($filename, 'w');
		if (false !== $local_file){
			if (false !== fwrite($local_file, $filecontent)) {
				fclose($local_file);
			}
		}
	}

}
?>