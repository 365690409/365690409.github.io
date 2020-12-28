<?php
//声明命名控制
namespace app\ nradmin\ controller;
//引入
use think\ Controller;
/**
 * 后台控制器基类
 */
class Backend extends Controller {
  public function _initialize(){
	  $auth=new \app\nradmin\model\Auth;
	  if(!$auth->isLogin()){
		$this->adminarray="";  
	  }else{
		$this->adminarray=$auth->isLogin();  
	  }
  }
}