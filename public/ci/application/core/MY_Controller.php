<?php


class AdminBase extends CI_Controller
{
    public $adminid;
    
    public function __construct()
    {
        parent::__construct();           
        $this->CheckLogined();       
    }
    
    //检查是否已登陆
    private function CheckLogined()
    {
        $this->adminid = $this->Session->GetSession('adminid');
        //$this->Session->DestroySession();
        if(!$this->adminid)
        {
            redirect('/LoginController','refresh');
        }
    }

}
 

class MemberCenterBase extends CI_Controller
{
    //用户信息
    var $memberInfo;
    //首页状态（用于判断是否第一次使用第三方登录）
    var $indexView;
    public $argv_data;  //地址栏接收的参数
    
    public function __construct()
    {
        parent::__construct();
        $this->AutoLogin();           
        $this->CheckLogined();       
        $this->memberInfo = $this->getMemberInfo();
        $this->load->logicLayer('Login/Login');
        $isThirdParty = $this->Login->isThirdPartyPassport($this->Session->GetSession('uid'));
        if(!empty($isThirdParty) && $isThirdParty['is_update'] == 0){
            $this->indexView = 'PassportController';
            echo $this->jumpUrl('show','请补充资料后再进行操作','myAccount',0);
        }else{
            //设置默认首页
            $getIndex = $this->input->get('index');
            if($getIndex != ''){
                $leftNav = array(
                    'myAccount' => 'MyAccountController',
                    'cdkey' => 'McCDKeyController',
                    'game' => 'GameController',
                    'updateInfo' => 'UpdateInfoController',
                    'bind' => 'BindController',
                    'updateAvatar' => 'UpdateAvatarController',
                    'updatePassword' => 'UpdatePasswordController',
                    'payRecord' => 'PayRecordController'
                );
                $this->indexView = $leftNav[$getIndex];
            }else{
                $this->indexView = 'MyAccountController';
            }
        }
    }
    
    //检查是否已登陆
    private function CheckLogined()
    {
        $this->load->logicLayer('Login/Login');
        $this->load->logicLayer('Member/UcenterMember');
        $uid = $this->Login->isLogin();
        if($uid == ''){
            echo '<script type="text/javascript">parent.location.href="'.WWW_URL.'/MemberCenterController/login";</script>';
            exit;
        }
        $isMemberadd = $this->UcenterMember->getUcenterMemberByUid($uid);
        if(!isset($isMemberadd['adduid'])){
            echo $this->UcenterMember->insertMemberadd($uid);
        }
    }
    
    /**
     *  自动登陆（有用户名密码参数情况下）
     *  @author thinker
     */
    private function AutoLogin()
    { 
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];        
        $this->load->helper('common');      
        $this->argv_data = json_decode(decrypt("bazhuayu",$_SERVER['QUERY_STRING']));
                  
        if(isset($this->argv_data->account))
        {
            $this->load->logicLayer('Member/UcenterMember');
            $memberInfo = $this->UcenterMember->getUcenterMemberByUname($this->argv_data->account);
               
            if(!isset($_COOKIE['uid']) || (isset($_COOKIE['uid']) && $_COOKIE['uid']!=$memberInfo['uid']))
            {
                $this->load->library('SnsNetwork');          
                $login_data = array(
                    'username' => $this->argv_data->account,
                    'password' => $this->argv_data->password
                );
        
                $resultJson = $this->snsnetwork->makeRequest(UC_API.'/LoginController/Login',$login_data,'');
                $uclogin_info = json_decode($resultJson['msg']);    
                
                if($uclogin_info->ret!="-2"){
                    setcookie('uid',$uclogin_info->user_info->uc_id,time()+60*60*24*30,'/',config_item('cookie_domain'));            
                    redirect($url);
                }
            }
        }       
    }
    
    /**
     *  获取用户信息
     *  @return array
     *  @author xiejohnny
     *
     */
    private function getMemberInfo()
    {
        if($this->Session->GetSession('uid') != ''){
            $uid = $this->Session->GetSession('uid');
            $this->load->logicLayer('Member/UcenterMember');
            $memberInfo = $this->UcenterMember->getUcenterMemberByUid($uid);
        }
        return $memberInfo;
    }
    
    /**
     *  重新定义模板页面
     *  @param  string  $view  模板名
     *  @return string
     *  @author xiejohnny
     *
     */
    public function getView($view='')
    {
        $link = 'memberCenter/';
        if($this->indexView == 'PassportController'){
            $link .= 'passport';
        }else{
            $link .= $view;
        }
        return $link;
    }
    
    /**
     *  会员中心iframe JS刷新
     *  @param  string  $event   show或hide
     *  @param  string  $text    提示信息
     *  @param  string  $tabName 栏目名称
     *  @author xiejohnny
     *
     */
    public function jumpUrl($event='show',$text='',$tabName='',$autoReload=1)
    {
        $js = '<script type="text/javascript" charset="utf-8">parent.mcTipsEvent("'.$event.'","'.$text.'","'.$tabName.'","'.$autoReload.'");</script>';
        return $js;
    }

}

/**
 *  webbuddy基类
 *  @author xiejohnny
 */
class WebbuddyBase extends CI_Controller
{
    //ucenter用户信息
    var $memberInfo;
    //buddy用户信息
    var $buddyMemberInfo;
    
    public function __construct()
    {
        parent::__construct();
        $this->memberInfo = $this->getMemberInfo();
        $this->buddyMemberInfo = $this->getBuddyMemberInfo();
        if(empty($this->memberInfo)){
            //echo '<script type="text/javascript">location.href="'.WEBBUDDY_URL.'";</script>';
            //exit;
        }
    }
    
    /**
     *  获取用户信息
     *  @return array
     *  @author xiejohnny
     */
    private function getMemberInfo()
    {
        $memberInfo = array();
        if($this->Session->GetSession('uid') != ''){
            $uid = $this->Session->GetSession('uid');
            $this->load->logicLayer('Member/UcenterMember');
            $memberInfo = $this->UcenterMember->getUcenterMemberByUid($uid);
        }
        return $memberInfo;
    }
    
    /**
     *  获取八迪用户信息
     *  @return array
     *  @author xiejohnny
     */
    private function getBuddyMemberInfo()
    {
        $uid = $this->Session->GetSession('uid');
        if($uid == 0) return array();
        $this->load->library('SnsNetwork');
        $resultJson = $this->snsnetwork->makeRequest(UC_API.'/buddy/MemberController/getMemberById',array('uid'=>$uid),'');
        $result = $this->json->decode($resultJson['msg'],1);
        return $result;
    }
    
    /**
     *  获取首页url
     *  @return string
     *  @author xiejohnny
     */
    public function getBackIndexUrl()
    {
        if(isset($_COOKIE['index_type']) && $_COOKIE['index_type']=='client'){
            $url = WEBBUDDY_URL.'/IndexController/clientIndexFrame';
        }else{
            $url = WEBBUDDY_URL.'/IndexController/indexFrame';
        }
        return $url;
    }
    
    /**
     *  设置头缓存信息
     *  @author xiejohnny
     */
    public function setHeaderCache()
    {
        $h = date('H',time());
        //两小时
        if($h%2 == 0){
            $lastH = $h;
        }else{
            $lastH = $h - ($h%2);
        }
        $lastTime = mktime($lastH,0,0,date('m',time()),date('d',time()),date('Y',time()));
        $interval = 7200;
        header("Last-Modified:" .gmdate('r',$lastTime));
        header("Expires:".gmdate("r",($lastTime + $interval)));
        header("Cache-Control:max-age=$interval");
        header("Pragma:public");
    }
}