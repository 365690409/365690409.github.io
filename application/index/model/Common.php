<?php

namespace app\index\model;
use think\ Controller;
use think\Db;
use  think\Cache;
/**
 * 共有模型
 */
class Common extends Controller{
      /**
     * 缓存数据
     * 保护类型  二次处理
     * @param string $data   指定类型
     * @return array
     */
    protected function exccache($val){
        if(!cache($val['cache'][0])){
          $data=$this->getdata($val);
          if(isset($val['cache'][1])){
          Cache::set($val['cache'][0],$data,$val['cache'][1]);
          }else{
          Cache::set($val['cache'][0],$data);
          }
          return $data;
        }else{
          return  Cache::get($val['cache'][0]);
        }
    }
      /**
     * 查询条件
     * 保护类型  三次处理
     * @param string $query   指定类型
     * @param string $msg   变量
     * @return array
     */
    protected function excwhere($query,$msg){
        if(isset($msg)){  
            if(count($msg)==3){
            return  $query->where($msg[0],$msg[1],$msg[2]);
            }elseif(count($msg)==2){
            return  $query->where($msg[0],$msg[1]);
            }else{
            return  $query->where($msg[0]);
            }
        }else{
            return  $query->where($msg);
        }
        return $query;
    }     
     /**
     * 查询条件 - OR
     * 保护类型  三次处理
     * @param string $query   指定类型
     * @param string $msg   变量
     * @return array
     */
    protected function excwhereOr($query,$msg){
        if(is_array($msg)){  
            if(count($msg)==3){
            return  $query->whereOr($msg[0],$msg[1],$msg[2]);
            }elseif(count($msg)==2){
            return  $query->whereOr($msg[0],$msg[1]);
            }else{
            return  $query->whereOr($msg[0]);
            }
        }else{
            return  $query->whereOr($msg);
        }
        return $query;
    }
     /**
     * 排序 - order
     * 保护类型  三次处理
     * @param string $query   指定类型
     * @param string $msg   变量
     * @return array
     */
    protected function excorder($query,$msg){
        if(is_array($msg)){  
            if(count($msg)==3){
            return  $query->order($msg[0],$msg[1],$msg[2]);
            }elseif(count($msg)==2){
            return  $query->order($msg[0],$msg[1]);
            }else{
            return  $query->order($msg[0]);
            }
        }else{
            return  $query->order($msg);
        }
        return $query;
    }
     /**
     * excwherelist
     * 保护类型  二次处理
     * @param string $query   指定类型
     * @param string $val   变量
     * @return array
     */
    protected function excwherelist($query,$msg){
        if(is_array($msg)){
            foreach($msg as $key=>$rs){
               if(isset($rs['where'])){
                $query=$this->excwhere($query,$rs['where']);
               }elseif(isset($rs['whereOr'])){
                $query=$this->excwhereOr($query,$rs['where']);
               }elseif(isset($rs['order'])){
                $query=$this->excorder($query,$rs['order']);
               }
            } 
        }elseif(!empty($msg)){
           return $query->where($msg);
        }
        return $query;
    }

      /**
     * 读取数据
     * 保护类型  二次处理
     * @param string $data   指定类型
     * @return array
     */
    protected function getdata($val){
        if(!isset($val['db'])){
        $val['db']=new Db;
        }
        if(isset($val['name'])){
        $query=$val['db']::name($val['name']);
        }elseif(isset($val['table'])){
        $query=$val['db']::table($val['name']);
        }
        if(isset($val['field'])){
        $query=$query->field($val['field']);
        }
        //select 方法
        if(isset($val['select'])){ 
            $data=$this->excwherelist($query,$val['select'])->select();
            //array_column
            if(isset($val['arrcolumn'])){
            $data=array_column($data,$val['arrcolumn'][0],$val['arrcolumn'][1]);   
            }
        }elseif(isset($val['paginate'])){
            if(isset($val['request'])){
            $append = new Select;
            $request=$val['request']==''?'comon':$val['request'];
            $query=$append->$request($query);
            }
            $data=$this->excwherelist($query,$val['paginate'])->paginate(isset($val['pagecount'])?$val['pagecount']:10);
            //array_column
            if(isset($val['arrcolumn'])){
            $data=array_column($data,$val['arrcolumn'][0],$val['arrcolumn'][1]);   
            }
        //find 方法
        }elseif(isset($val['find'])){
            $data=$this->excwherelist($query,$val['find'])->find();
         /**
         * 读取子类数据
         * @param  $childernget   指定类型
         * @return  $parenall true   分级 追加 parenall
         * @return  $parenlist true   列表 追加 parenlist
         * @return 追加 pids
         */
        }elseif(isset($val['childernget'])){
           $data=$this->excwherelist($query,$val['childernget'])->select();
            foreach($data as &$cate){
                $rs=$cate;
                // $cate=[
                //    'name'=>$rs['name'],
                //    'url'=>'/'.$rs['type'].'/'.$rs['nickname'],
                // ];
                $groupval=$val;
                $groupval['childernget']=[
                   ['where'=>[$val['classid'], $rs['id']]]
                ];
                #通过该分类的主键id查询该分类的子类
                $rs_cate=$this->getall($groupval);
                if($rs_cate){
                $cate['data']=$rs_cate;
                }
            }
         /**
         * 读取父类数据
         * @param  $parenget   指定类型
         * @return  $parenall true   分级 追加 parenall
         * @return  $parenlist true   列表 追加 parenlist
         * @return 追加 pids
         */
        }elseif(isset($val['parenget'])){
              $data=$this->excwherelist($query,$val['parenget'])->find();
              if($data['pid']>0){
                $groupval=$val;
                unset($groupval['parenlist']);
                unset($groupval['classid']);
                $groupval['parenget']=[
                    ['where'=>['id', $data[$val['classid']]]]
                ];
                #通过该ID父类数据
                $groupall=$this->getall($groupval); 
                if(isset($groupall['groupids'])){
                $data['pids']=$groupall['pids'].",".$data['id'];
                }else{
                $data['pids']=$groupall['id'].",".$data['id'];
                }
                if(isset($val['parenall'])){
                $data['parenall']=$groupall;
                }
             }
             if(isset($val['parenlist'])){
                $groupval=$val;
                unset($groupval['parenlist']);
                unset($groupval['classid']);
                unset($groupval['parenget']);
                $pids=isset($data['pids'])?$data['pids']:$data['id'];
                $groupval['select']='id in('.$pids.')';
                $data['parenlist']=$this->getall($groupval); 
             }
        }
        //json_encode
        if(isset($val['json'])){
        $data=json_encode($data);   
        }
        if(isset($val['excarray'])){
        $append = new Excarray;
        $excarray=$val['excarray']==''?'comon':$val['excarray'];
        $query=$append->$excarray($data);
        }
        return $data;
    }
      /**
     * 读取数据
     * @param string $data   指定类型
     * @return array
     */
    public  function getall($val){
        //excviews
        if(isset($val['excviews'])){
        $val['db']::name($val['name'])->where('id',$val['excviews'][0])->setInc($val['excviews'][1]);  
        }
        if(isset($val['cache'])){
        return $this->exccache($val);
        }else{
        return $this->getdata($val);
        }
    }
      /**
     * 读取插件数据
     * 保护类型  二次处理
     * @param $data  指定类型
     * @return array 数据库内容
     */
    protected function excplug($data=""){
        //$data=json_decode($data,TRUE);
        if(is_array($val=json_decode($data,TRUE))){
          return $this->getall($val);
        }else{
          return $data; 
        }
    }
      /**
     * 读取插件数据
     * @param $use  指定引入名
     */
    public function cmsplugin($use=""){
        $data=[
          'name'=>'cmsplugin',
          'select'=>[
            ['where'=>['use',$use]],
            ['where'=>['switch',0]],   
          ],
        ];
        foreach ($this->getall($data) as $key => $val) { 
            $data=$this->excplug($val['condition']);
            if($data){
            $this->assign('layout_'.$val['keyname'].'list',$data);
            if($val['template']){
            $this->assign('layout_'.$val['keyname'],$this->view->fetch($val['template']));
            }
            }
        }
    }
      /**
     * 读取数据
     * @param $class  type——nickname
     * @return array 指定类数据
     */
    public function listshow($class){
        $arrclass=explode("_",$class);
        $find_where=array();
        $find_where[]=['where'=>['type',$arrclass[0]]];
        if(isset($arrclass[1]) and $arrclass[1]!="all"){
        $find_where[]=['where'=>['nickname',$arrclass[1]]];
        }
        $selfclass =$this->getall(['name'=>'category','field'=>'id,pid,type,name,nickname','classid'=>'pid','parenlist'=>true,'parenget'=>$find_where]); 
        $this->assign('selfclass',$selfclass);
        return $selfclass;
    }
      /**
     * 展示页面
     * @param $db数据 $class分类 $id页面ID  $thisclass大父类数据 $selfclass指定类数据
     * @return array
     */
    public function show($db,$class,$id,$thisclass,$selfclass){
        $this->assign('selfclass',$selfclass);
        /*基本配置*/
        $show =$this->getall(['db'=>$db,'cache'=>['cacheshow_'.$class."_".$id,200],'name'=>$thisclass['type'],'excviews'=>[$id,'views'],'find'=>[['where'=>['id','=',$id]],]]); 
        $this->assign('show',$show);
        $this->assign('url',"../");
    }
      /**
     * 列表页面
     * @param $db数据 $class分类 $thisclass大父类数据 $selfclass指定类数据
     */
    public function list($db,$class,$thisclass,$selfclass){
        $this->assign('selfclass',$selfclass);
        /*基本配置*/
        $cachekey='cachelist_'.$thisclass['id'].'_'.$selfclass['id'].'_'.$this->request->get('page');
        $data=[
          'db'=>$db,
          //'cache'=>[$cachekey,200],
          'name'=>$thisclass['type'],
          'request'=>'getname',
          'pagecount'=>3,
          'paginate'=>[
            ['where'=>['category_id','=',$selfclass['id']]],
            ['where'=>['status','=','normal']],
          ],
        ];
        if($selfclass['id']==$thisclass['id']){
        unset($data['paginate'][0]);
        }
        $list =$this->getall($data); 
        $this->assign('list', $list);
        $this->assign('page', $this->pagehtml($list->render()));
        $this->assign('url',"/".$class."/");
    }   
    public function pagehtml($msg){
        $msg=str_replace('<li class="','<li class="page-item ',$msg);
        $msg=str_replace('<li>','<li class="page-item">',$msg);
        $msg=str_replace('<a href','<a class="page-link" href',$msg);
        $msg=str_replace('<span>','<span class="page-link">',$msg);

        $msg=str_replace('&laquo;','上一页',$msg);
        $msg=str_replace('&raquo;','下一页',$msg);
        return '<nav aria-label="Page navigation example">'. $msg.'</nav>';
    }
}
