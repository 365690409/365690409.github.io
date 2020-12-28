<?php

namespace app\index\controller;
use app\common\controller\Frontend;
use  think\Db;
use  think\Cache;
class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function _initialize()
    {
        parent::_initialize();
        /*共用  基本配置*/
        $this->common=model('Common');
        /*网站导航数组*/
        $data=[
          'name'=>'category',
          'field'=>'id,pid,type,name,nickname',
          'classid'=>'pid',
          'childernget'=>[
            ['where'=>['find_in_set("index",flag)']],
            ['where'=>['status','=','normal']],
          ],
        ];
        $navbarlist =$this->common->getall($data); 
        $this->assign('navbarlist', $navbarlist);
        $this->common->cmsplugin('common');
    }

    public function index(){
       return $this->view->fetch();
    }

    public function route($class="",$id='') {
        $db=new Db;
        if(!empty($class)){
            $selfclass=$this->common->listshow($class);
            $thisclass = $selfclass['parenlist'][0];
            $this->assign('thisclass',$thisclass);
            /*左边菜单数组*/
            $data=[
              'db'=>$db,
              'cache'=>['cachemenulist_'.$thisclass['type'],200],
              'name'=>'category',
              'field'=>'name,nickname,id',
              'select'=>[
                ['where'=>['pid','=',$thisclass['id']]],
                ['where'=>['status','=','normal']],
              ],
            ];
            $menulist =$this->common->getall($data); 
            $this->assign('menutitle',$thisclass['name']);
            $this->assign('menulist', $menulist);
            /*当前位置*/
            $this->assign('breadcrumbtitle','当前位置：');
            $this->assign('breadcrumball',$selfclass['parenlist']);
            /*展示页面*/
            if(!empty($id)){
               $this->common->show($db,$class,$id,$thisclass,$selfclass,$class);
               return $this->view->fetch('route/show');   
            }
           $this->common->list($db,$class,$thisclass,$selfclass,$class);
           return $this->view->fetch('route/list');   
        }
        /*默认首页*/
        return $this->view->fetch('/route/index');
    }
    public function jstemp() {
        $data=[
          'db'=>new Db,
          'cache'=>['jstemp'],
          'name'=>'temp',
          'field'=>'keywords,description',
          'select'=>[
            ['where'=>['status','=','normal']],
            ['where'=>['switch=0']],
          ],
          'arrcolumn'=>['description','keywords'],
          'json'=>true,
        ];
        return '$nr.temp='.$this->common->getall($data).";";
    }

}
