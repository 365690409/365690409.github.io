<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$route['default_controller'] = "welcome";
//$route['404_override'] = '';

$http_host = 'http://'.$_SERVER['HTTP_HOST'];

if($http_host==ADMIN_URL){ //后台管理链接重写
    $route = RewriteUrl('manage',0); 
}else if($http_host==WEIBO_URL){ //微博系统链接重写
    $route = RewriteUrl('weibo',3); 
}else if($http_host==YQJK_URL){ //舆情监控系统管理重写
    $route = RewriteUrl('yqjk',3); 
}else if($http_host==WEIXIN_URL){ //舆情监控系统管理重写
    $route = RewriteUrl('weixin',4); 
}else if($http_host==MICRO_URL){ //舆情监控系统管理重写
    $route = RewriteUrl('micro',4); 
}else if($http_host==WEB_URL){ //舆情监控系统管理重写
    $route = RewUrl('web',4); 
}else if($http_host==MALL_URL){ //Ebay价格系统
    $route = RewriteUrl('mall',4); 
}else if($http_host==STOCK_URL){ //股票分析系统
    $route = RewriteUrl('stock',4); 

}else{
    $route = RewriteUrl('hweb',2); 
	$route['default_controller']="web/IndexController/show";
}
/**
 * 重写链接
 * @author thinker
 */
function RewUrl($module,$is_exclude)
{   
    $route = '';
    $path_info = $_SERVER['REQUEST_URI']; 
	$path_info=parse_url($path_info);
	$path_info=$path_info['path'];
	define('PATH_URL',$path_info);
	$path_info=str_replace("/#p#ath#","", $path_info."#p#ath#");
	$path_info=str_replace("#p#ath#","", $path_info);
    $path_info_ex = explode("/",$path_info);
    if($path_info=='' || $path_info=='/'){
        $route['default_controller'] = $module."/IndexController";
    }else{
		 if($is_exclude==4){
			if($path_info_ex[1]=="login"){
			}else{
            $path_info=str_replace("##".$module."/","", "##".$module.$path_info);
            $route[$path_info] = $module."/IndexController/".$path_info;
			}
        }
    }
    return $route;
}
/**
 * 重写链接
 * @author thinker
 */
function RewriteUrl($module,$is_exclude)
{   
    $route = '';
    $path_info = $_SERVER['REQUEST_URI']; 
	$path_info=parse_url($path_info);
	$path_info=$path_info['path'];
	define('PATH_URL',$path_info);
	$path_info=str_replace("/#p#ath#","", $path_info."#p#ath#");
	$path_info=str_replace("#p#ath#","", $path_info);
    $path_info_ex = explode("/",$path_info);
    if($path_info=='' || $path_info=='/'){
        $route['default_controller'] = $module."/IndexController";
    }else{
		if($path_info_ex[1]=="css" or $path_info_ex[1]=="js"){
		$path_info=str_replace($module."/","", $module.$path_info);
		define('PATH_INFO',$path_info);  //外网
		$route[$path_info] ="skin/IndexController/".$path_info;
		return $route;
		}
        if($is_exclude==0){
            $route[$path_info] = $module."/".$path_info;
        }else if($is_exclude==1){
			if($path_info_ex[1]=="login" and $path_info_ex[2]!=""){
            }elseif(in_array($path_info_ex[1],LoadCommonController($module))){  //排除公用控制器路径
            $path_info=str_replace($module."/","", $module.$path_info);
            $route[$path_info] = $module."/".$path_info;
			}else{
			$path_infok=$module.$path_info;
            $path_info=str_replace($module."/","", $path_infok);
            $route[$path_info] = $path_infok;
			}
        }else if($is_exclude==2){
			if($path_info_ex[1]=="login" and $path_info_ex[2]!=""){
			}elseif($path_info_ex[1]=="QiyeController"){
            $path_info=str_replace($module."/","", $module.$path_info);
            $route[$path_info] = $module."/".$path_info;
			}elseif($path_info_ex[1]=="ecrun" or $path_info_ex[1]=="layoutcontroller"){
            $path_info=str_replace($module."/","", $module.$path_info);
            $route[$path_info] = $module."/IndexController/".$path_info;
			}else{
            $path_info=str_replace($module."/","", $module.$path_info);
            $route[$path_info] = $module."/IndexController/show/".$path_info;
			}
        }else if($is_exclude==3){
			if($path_info_ex[1]=="login" and $path_info_ex[2]!=""){
            }elseif(filetype($_SERVER['DOCUMENT_ROOT'].'/application/controllers/inc/'.$path_info_ex[1].'.php')=='file'){  //排除公用控制器路径
			$module="inc";
            $path_info=str_replace($module."/","", $module.$path_info);
            $route[$path_info] = $module."/".$path_info;
			}else{
            $path_infok=$module.$path_info;
            $path_info=str_replace($module."/","", $path_infok);
            $route[$path_info] = $path_infok;
			}
        }else if($is_exclude==4){
			if($path_info_ex[1]=="login"){
			}elseif($path_info_ex[1]=="wx"){
            $path_info=str_replace($module."/","", $module.$path_info);
        	$route[$path_info]="weibo/IndexController/".$path_info;
			}elseif($path_info_ex[1]=="RenController" or $path_info_ex[1]=="WeixinController"){
            $path_info=str_replace($module."/","", $module.$path_info);
            $route[$path_info] = $module."/".$path_info;
			}else{
            $path_info=str_replace("##".$module."/","", "##".$module.$path_info);
            $route[$path_info] = $module."/IndexController/".$path_info;
			}
        }
    }
    return $route;
}

/**
 * 读取公用控制器文件名
 * @author thinker
 */
function LoadCommonController($dir="")
{    
    $dir=$dir?$dir."/":"";
    $dir = $_SERVER['DOCUMENT_ROOT'].'/application/controllers/'.$dir;
    if (is_dir($dir)) 
    {
        if ($dh = opendir($dir))
        {
           while (($file = readdir($dh)) !== false )
           {         
              if(filetype($dir.$file)=='file') $deny_file_arr[] = str_replace('.php','',$file);
           }
           closedir($dh);
        }
    }
    return $deny_file_arr;
}


/* End of file routes.php */
/* Location: ./application/config/routes.php */