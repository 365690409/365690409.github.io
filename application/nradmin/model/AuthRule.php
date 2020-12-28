<?php
namespace app\nradmin\model;
use think\Session;
class AuthRule extends Config
{
    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
	/*栏目数组*/
	public function getTreeMenu($pid=0){
		$data=$this->where('ismenu=1')->where('pid='.$pid)->select();
		foreach($data as &$cate){
		  $rs=$cate->toarray();
		  $cate=[
		     'name'=>$rs['title'],
		     'icon'=>str_replace('fa fa-','',$rs['icon']),
		  ];
		  #通过该分类的主键id查询该分类的子类
		  $rs_cate=$this->getTreeMenu($rs['id']);
		  if($rs_cate){
		  $cate['data']=$rs_cate;
		  }else{
		  $cate['url']=str_replace('/','_',$rs['name']); 
		  }
		}
		return $data;
	}
	#通过上级分类的主键id号查询子类
	public function getTree($db,$pid=0){
		$data=$db->where('ismenu=1')->where('pid='.$pid)->select();
		foreach($data as &$cate){
		  $cate=$cate->toarray();
		  #通过该分类的主键id查询该分类的子类
		  $cate['cates']=$this->getTree($db,$cate['id']);
		}
		return $data;
	}
}
