<?php
namespace app\index\model;
use think\ Controller;
/**
* 搜索管理
* @param string $query   指定类型
* @param string $val   变量
* @return array
*/
class Select extends Controller{

    public function comon($query){
        if($this->request->isGet()){
        $query=$query->where('name','like','%'.$this->request->get('keywords').'%');
        }
        return $query;
    }
    public function getname($query){
        if($this->request->isGet()){
        $query=$query->where('name','like','%'.$this->request->get('keywords').'%');
        }
        return $query;
    }

}
