<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/*
 |--------------------------------------------------------------------------
 | 自定义常量
 |--------------------------------------------------------------------------
 */
$http_host=$_SERVER['HTTP_HOST'];
$hosts=explode(".",$http_host);
$i=count($hosts)-2;
$host=$hosts[$i];
define('LOCAL',''.$host.'.cn'); //本地
define('INTERNAL',''.$host.'.cn');  //内网
define('EXTERNAL',''.$host.'.com');  //外网

if(is_int(stripos($_SERVER['HTTP_HOST'],LOCAL))){
    define('WWW_URL','http://www.'.LOCAL);
    define('WEIXIN_URL','http://wx.'.LOCAL);
    define('MICRO_URL','http://micro.'.LOCAL);
    define('MALL_URL','http://mall.'.LOCAL);
    define('WEIBO_URL','http://weibo.'.LOCAL);
    define('STOCK_URL','http://stock.'.LOCAL);
    define('WEB_URL','http://web.'.LOCAL);
}else if(is_int(stripos($_SERVER['HTTP_HOST'],INTERNAL))) {
    define('WWW_URL','http://www.'.INTERNAL);
    define('WEIXIN_URL','http://wx.'.INTERNAL);
    define('MICRO_URL','http://micro.'.INTERNAL);
    define('MALL_URL','http://mall.'.INTERNAL);
    define('WEIBO_URL','http://weibo.'.INTERNAL);
    define('STOCK_URL','http://stock.'.INTERNAL);
    define('WEB_URL','http://web.'.INTERNAL);
}else if(is_int(stripos($_SERVER['HTTP_HOST'],EXTERNAL))) {
    define('WWW_URL','http://www.'.EXTERNAL);
    define('WEIXIN_URL','http://wx.'.EXTERNAL);
    define('MICRO_URL','http://micro.'.EXTERNAL);
    define('MALL_URL','http://mall.'.EXTERNAL);
    define('WEIBO_URL','http://weibo.'.EXTERNAL);
    define('STOCK_URL','http://stock.'.EXTERNAL);
    define('WEB_URL','http://web.'.EXTERNAL);
}
/* End of file constants.php */
/* Location: ./application/config/constants.php */