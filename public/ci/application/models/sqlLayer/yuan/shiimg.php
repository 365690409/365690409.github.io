<?php
class Shiimg extends CI_Model {
    function __construct()
    {
    }
	public function str_split_unicode($str, $l = 0) {
		if ($l > 0) {
			$ret = array();
			$len = mb_strlen($str, "UTF-8");
			for ($i = 0; $i < $len; $i += $l) {
				$ret[] = mb_substr($str, $i, $l, "UTF-8");
			}
			return $ret;
		}
		return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
	}
	public function str_imgtxt($str, $l = 0) {
	  $sar =$this->str_split_unicode($str);
	  $s=implode("|",$sar);
	  foreach($sar as $v){
		if($v=="("){ 
	     $a=$v;
	     $b=$v;
		}elseif($v==")"){
	     $a.="|".$v;
	     $b.=$v;
		 $s=str_replace($a,$b,$s);
		}else{
	     $a.="|".$v;
	     $b.=$v;
		}
	  }
      return explode("|",$s);
	}
	
	public function img_dz($img,$fa,$fb,$font,$black,$str,$wx,$wy=0) {
	  $sar =$this->str_imgtxt($str);
	  $x=$wx;
	  $y=$wy;
	  $i=0;
	  $f_x=$fa*1.5;
	  $f_y=$fa*1.5;
	  foreach($sar as $k=>$v){
		if($v=="/"){
		  $i=8;
		}else{
		  if($i==8){
		  $x=$x+$f_x;
		  $y=$wy;
		  $i=0;
		  }
		  $y=$y+$f_y;
		  if(strlen($v)>6){
		  imagefttext($img,($fa/2.8),$fb,($x-10),$y, $black,"./uploads/yuan/style/img/gb2312.ttf",$v);
		  }else{
		  imagefttext($img,$fa,$fb,$x,$y, $black,"./uploads/yuan/style/img/gb2312.ttf",$v);
		  }
		  $i++;
		}
	  }
	  $d[wx]=$x+$f_x;
	  return $d;
	}
	function puimg($id=28){
	  $id=$id?$id:38;
	  $db=$this->usset->database("pu");
	  $this->load->sqlLayer("yuan/puus");
	  $sid=2;
	  $pb=$this->puus->show($db,$id);
	  $pb=$this->puus->showlist($db,$pb,$sid);
	  $img = imagecreatetruecolor(1190,320);    //创建真彩图像资源
	  $color = imagecolorAllocate($img,200,200,200);   //分配一个灰色
	  imagefill($img,0,0,$color);                 // 从左上角开始填充灰色
	  $font ="";//字体
	  $black = imagecolorallocate($img, 0, 0, 0);//字体颜色 RGB
	  if($pb[sid]==1){
	  $imgar=$this->img_dz($img,24,0,$font,$black,"乃".$pb[fdata][name],0,20);
	  }else{
	  $imgar=$this->img_dz($img,24,0,$font,$black,"乃".$pb[fdata][name].'公'.$pb[zipaixu],0,20);
	  }
	  $imgar=$this->img_dz($img,32,0,$font,$black,$pb[name].'派下',$imgar[wx],20);
	  $ar="太,始,二,三,四,五,六,七,八,九,十,十一,十二,十三,十四,十五,十六,十七,十八,十九,二十,廿一,廿二,廿三,廿四,廿五,廿六,廿七,廿八,廿九,三十,卅一,卅二,卅三,卅四,卅五,卅六,卅七,卅八,卅九";
	  $ar=str_replace(",","世,",$ar)."世";
	  $ar=str_replace("始世","始祖",$ar);
	  $ar=str_replace("太世","太始祖",$ar);
	  $ar=explode(",",$ar);
	  $imgar=$this->img_dz($img,28,0,$font,$black,'即为'.$ar[(count($pb[putu])-2)],$imgar[wx],50);
	  $vdd=$pb[qidata]?$pb[qidata]:($pb[qizi]?"娶".$pb[qizi]:"").($pb[zinu]?"生".$pb[zinu]:"");
	  if($pb[zidata]){
		$vdd.=$vdd?"/":"";
		foreach($pb[zidata] as $zk=>$zrs){
		$vdd.=$zrs[zipaixu].$zrs[name];
		}
		$vdd.=$vdd?"/ /":"";
	  }
	  $vdd.=str_replace(",\r\n","/",str_replace("沙溝(沟)","沙沟",$pb[info3]."/ /"));
	  $pb[info]=$pb[info]?$pb[name]."/".$pb[info]:"";
	  $vdd.=str_replace(",\r\n","/",str_replace("沙溝(沟)","沙沟",$pb[info]."/ /"));
	  $vdd.=str_replace(",\r\n","/",str_replace("沙溝(沟)","沙沟",$pb[info2]));
	  $this->img_dz($img,24,0,$font,$black,$vdd,$imgar[wx]+20,0);
	  header('Content-Type:image/jpg');
	  imagejpeg($img);
	  imagedestroy($img);
   }
	function imageAddText($path, $content, $x = 'auto', $y = 'auto', $fontSize = 38, $font = './uploads/yuan/style/img/t.ttf'){
	  $bigImgPath = $path;
	  //$img = imagecreatefromstring(file_get_contents($bigImgPath));
	  $img = imagecreatetruecolor(1190,260);    //创建真彩图像资源
	  $color = imagecolorAllocate($img,200,200,200);   //分配一个灰色
	  imagefill($img,0,0,$color);                 // 从左上角开始填充灰色
	  $font = './uploads/yuan/style/img/t.ttf';//字体
	  $black = imagecolorallocate($img, 0, 0, 0);//字体颜色 RGB
	  $this->img_dz($img,24,0,$font,$black,'乃秀义公次子');
	  $this->img_dz($img,32,0,$font,$black,'起政祖派下',44,20);
	  $this->img_dz($img,32,0,$font,$black,'即为六世',92,60);
	  $this->img_dz($img,24,0,$font,$black,'娶蔡氏生六子长子景鸾次子景后三子景兰四子景福五子景礼六子景寿/ /起政公:/生于乾隆丁酉年（1777年）六月二十一日辰时/享阳六十九年/卒道光乙巳年（1845年）正月二十日/葬在土地公后坐艮向坤/ /蔡氏：/生辰失记/卒正月二十五忌辰/沙沟园坐北向南',160,0);
	  list($bgWidth, $bgHight, $bgType) = getimagesize($bigImgPath);
	  switch ($bgType) {
	  case 1: //gif
		  header('Content-Type:image/gif');
		  imagegif($img);
		  break;
	  case 2: //jpg
		  header('Content-Type:image/jpg');
		  imagejpeg($img);
		  break;
	  case 3: //jpg
		  header('Content-Type:image/png');
		  imagepng($img);
		  break;
	  default:
		  break;
	  }
	  imagedestroy($img);
   }

}
?>