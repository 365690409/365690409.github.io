<?php
//声明命名控制
namespace app\yuan\controller;
//引入
use think\Controller;
use think\View;
use think\Db;
use think\Request;
class Index extends Controller{
    public function index($mid="28_2"){
      $view= new View();
      $str=$view->fetch();
      $db=new Db;
	  $ud=explode("_",$mid);
	  $sid=$ud[1]?$ud[1]:2;
	  $id=$ud[0]?$ud[0]:28;
      $puus=new Puus;
      $pb=$puus->show($db,$id);
      $pb=$puus->showlist($db,$pb,$sid);
      $pb['eidtok']=1;
      $pb['puinfo']=DB::table('pu_puinfo')->select();
      $pb['gzj']=DB::table('pu_gzj')->where('n','>','1776')->select();
	  $lunar=new \think\custom\Lunar;
	  for ($ymx=1912; $ymx<=date("Y"); $ymx++) {
      $ymar=$lunar->rzy($ymx,06,06);
	  if($ymar[9]==""){$ymar[0]="公元".$ymar[0];}
	  $pb['gzj'][]=array('n'=>$ymar[0],'b'=>$ymar[9],'e'=>$ymar[3]."年");
	  }
	  $pb['gzj_m']=explode(",","正月,二月,三月,四月,五月,六月,七月,八月,九月,十月,十一月,十二月");
      $pb['gzj_d']=explode(",","初一,初二,初三,初四,初五,初六,初七,初八,初九,初十,十一,十二,十三,十四,十五,十六,十七,十八,十九,二十,廿一,廿二,廿三,廿四,廿五,廿六,廿七,廿八,廿九,三十,卅一");
      $pb['gzj_s']=explode(",","子时,丑时,寅时,卯时,辰时,巳时,午时,未时,申时,酉时,戌时,亥时");		
      $str=str_replace('pudata=""','pudata='.json_encode($pb).';',$str);
      return $str;
    }
	public function img(){
	    $img=new Img;
        $img->puimg(28); 
	}
	public function info(){
	  $db=new Db;
	  $puus=new Puus;
	  $view= new View();
      $str=$view->fetch();
	  foreach($puus->pupx($db,2) as $id){
	   $d[]=$puus->show($db,$id);
	  }
	  $str=str_replace('pudata=""','pudata='.json_encode($d).';',$str);
	  return $str;
	}	
	public function eidt(Request $request){
	    $db=new Db;
		$id=$request->instance()->param('id');
		$data['name']=$request->instance()->param('name');
        if($id==""){return "系统有误";}
	    if($data['name']==""){return "数据有误";}
		$data['names']=$request->instance()->param('names');
		$gzjn_v=$request->instance()->post('gzjn').$request->instance()->post('gzjn_m').$request->instance()->post('gzjn_d').$request->instance()->post('gzjn_s');
         if($gzjn_v){
         $data['info']=str_replace("年月时",$gzjn_v,$request->instance()->post('info'));
         $data['info2']=str_replace("年月时",$gzjn_v,$request->instance()->post('info2'));
         $data['txt']=str_replace("年月时",$gzjn_v,$request->instance()->post('txt'));
         }
		Db::table('pu_puus')->where('id', $id)->update($data);
        return "保存成功";
	}
	
	//空操作
	public function _empty($name){
		$this->redirect('index\index');
	}
}
