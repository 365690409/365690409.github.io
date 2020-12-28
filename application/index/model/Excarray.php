<?php

namespace app\index\model;
use think\ Controller;
/**
 * 共有模型
 */
class Excarray extends Controller{
      /**
     * 读取栏目数组
     * @param string $type   指定类型
     * @param string $status 指定状态
     * @return array
     */
    // public function executMenu($arr){
    //     static $data;
    //     if(! is_array($arr)){
    //         return $data;
    //     }
    //     foreach ($arr as $key => $val) {
    //         if(is_array($val)){
    //             $this->executMenu($val);
    //         }else{
    //             $data[]=$val;
    //         }
    //     }
    //     return $data;
    // }
    // public function executMenu($arr){
    //     foreach ($arr as $key=>$val) {
    //         foreach ($val as $l=>$r) {
    //             if(is_array($r)){
    //              $val[$l]=$this->executMenu($r);
    //             }
    //         }
    //         if(!empty($val['data'])){
    //         $val['group']=$arrayName = array('tag'=>'class="dropdown-menu" aria-labelledby="navbarDropdown','data' => $val['data'], );
    //         }
    //         $val['litag']='class="nav-item"';
    //         $val['tag']='class="nav-link" href="'.$val['url'].'"';
    //         $data[]=$val;
    //     }
    //     return $data;
    // }

}
