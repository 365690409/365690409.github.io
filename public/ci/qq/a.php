<?php
header("content-type:text/html;charset=utf-8");
function ipjwd() {
$getIp=$_SERVER["REMOTE_ADDR"];
if ($getIp=='127.0.0.1') {
$getIp='58.30.228.35';
}
 
$content = file_get_contents("http://api.map.baidu.com/location/ip?ak=您的密钥");
$json = json_decode($content);
//return $json;
$data='';
$data['ip']=$getIp;
$data['log']=$json->{'content'}->{'point'}->{'x'};//按层级关系提取经度数据
$data['lat']=$json->{'content'}->{'point'}->{'y'};//按层级关系提取纬度数据
$data['address']=$json->{'content'}->{'address'};//按层级关系提取address数据
return $data;
}
var_dump(ipjwd());
?>