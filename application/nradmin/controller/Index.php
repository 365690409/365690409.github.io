<?php
//声明命名控制
namespace app\nradmin\ controller;
//引入
use think\ Controller;
use think\ Session;
use app\nradmin\controller\Backend;
/**
 * 后台首页
 * @internal
 */
class Index extends Backend {
  public function _initialize()    {
      parent::_initialize();
      //移除HTML标签
      $this->request->filter('trim,strip_tags,htmlspecialchars');
  }

  /*展示首页*/
  public function index() {
  
     return View('index');
  } 
  
  /*展示首页*/
  public function adminhome() {
    $auth=new \app\nradmin\model\Auth;
    if(!$auth->isLogin()){
    return ['type'=>'err','data'=>5003]; 
    }
    $db=model("auth_rule");
    $data=[
      'username'=>'admin',
      'post_url'=>'set/',
      'rule_menu'=>$db->getTreeMenu(0),
    ];
    return ['type'=>'adminhome','data'=>$data]; 
  } 

  /*javascript nr脚本*/
  public function nr() {
     $view=$this->fetch('index/nr/bootstrap');
     $view.=$this->fetch('index/nr/from');
     $view.=$this->fetch('index/nr/admin');
     $view=str_replace("<script>","",$view);
     return  $view;
  }  
  
  /*后台管理*/
  public function set($class="",$type='list',$id='') {
    $type=$type?$type:'list';
    $auth=new \app\nradmin\model\Auth;
     /*退出登录*/
    if($type=="logout"){
      $auth->logout();
      return ['type'=>'err','data'=>5002]; 
    }
    /*是否登录*/
    if(!$auth->isLogin()){
      return ['type'=>'err','data'=>5003]; 
    }
    /*管理数据*/
    if($type=="list"){  /*列表管理*/
      $setmodel=model($class."Set");
      return ['type'=>'list','data'=>$setmodel->nrlike()];  
    }elseif($type=="listdata"){ /*编辑管理*/  
      $modeldd=model($class);
      $setmodel=model($class."Set");
      return ['type'=>'listdata','data'=>$setmodel->nrselect($class)];  
    }elseif($type=="update"){ /*编辑管理*/
      $setmodel=model($class."Set");
      $err=$setmodel->update($class,$id);
      if($err){
        $data=2001;
      }else{
        $data=4001;
      }
      return ['type'=>'err','data'=>$data]; 
    }elseif($type=="edit"){ /*编辑管理*/
      $modeldd=model($class);
      $setmodel=model($class."Set");
      if($id>0){
      $show = $modeldd::get($id);
      $data=$setmodel->nreidt($show->toarray());	 
      }else{
      $data=$setmodel->nreidt();  
      }
      return ['type'=>'edit','data'=>$data]; 
    }elseif($type=="delete"){ /*编辑管理*/
      $modeldd=model($class);
      if($id){
        $err=$modeldd::destroy($id);
        if($err){
          $data=2001;
        }else{
          $data=4001;
        }
      }else{
        $data=4001;
      }
      return ['type'=>'err','data'=>$data]; 
    }elseif($type=="dels"){ /*编辑管理*/
      if (!empty(input('post.btSelect/a'))) {
        $modeldd=model($class);
        $btSelect=input('post.btSelect/a');
        $btSelect = implode(",",$btSelect);
        $err=$modeldd::destroy($btSelect);
        if($err){
          $data=2001;
        }else{
          $data=4001;
        }
       $data=2001;
      }else{
        $data=4001;
      }
      return ['type'=>'err','data'=>json_encode($data)]; 
    }
    return "";
  }
  /**
   * 管理登录
   */
  public function login() {
    $err=$this->login_prot();
    return ['type'=>'err','data'=>$err];   
  }
  /**
   * 管理登录
   */
  public function login_prot()
  {
	  if ($this->request->isPost()) {
        $captcha=$this->request->post('captcha');
        $username=$this->request->post('uesrname');
        $password=$this->request->post('password');
    		if(!captcha_check($captcha)){
          return 4011;//"验证码不对";
    		}
        $auth=new \app\nradmin\model\Auth;
        // 查询数据集
        $admin=model('Admin');
        //动态查询
        $admin = $admin::getByUsername($username);
        if($admin){
         if($admin->password==md5(md5($password) . $admin->salt)){
            $err=$auth->login($username, $password);
             return 5001;//登录成功
         }else{
             return 4013;//"密码不对";
         }
        }else{
          return 4012;//"用户名不对";
        }
      }
  }
  /*空白图片*/
  public function imgkong($n="50*50") {
    $imgchuli = new\ think\ custom\ Imgchuli;
    $ns=array();
    $ns=explode("*",$n);
    $w=ceil($ns[0]);
    $w=$ns[ 0 ] ? ceil($ns[0]):50;
    $h=!empty($ns[1])?ceil($ns[1]):$w;
    $imgchuli->kong($w,$h);
  }
  /*空操作*/
  public function _empty( $name ) {
    $this->redirect( 'index\index' );
  }
}