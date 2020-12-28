<?php
class Web extends CI_Model {
    function __construct()
    {
        parent::__construct();
	    $this->load->sqlLayer("yuan/usset");
	    date_default_timezone_set('PRC');
    }
	public function info($tar){
	  $db=$this->usset->database("pu");
	  $this->load->sqlLayer("yuan/puus");
	  $this->load->sqlLayer("yuan/pupx");
	  $str=$this->index("list");
	  $d="";
	  foreach($this->pupx->pupx($db,2) as $id){
	   $d[]=$this->puus->show($db,$id);
	  }
	  $str=str_replace('pudata=""','pudata='.json_encode($d).';',$str);
	  return $str;
	}
	public function show($tid,$tsort="",$aa=""){
	 $tar=explode("/",$tsort);   
	 if($tar[0]=="info"){
	  $vid=$_COOKIE['vid'];
	  if($vid<1 or $vid>3 ){
	   return "";
	  }
	  return $this->$tar[0]($tar);
	 }elseif($tar[0]=="aa"){ 
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	   return '<!doctype html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"><title>粤西袁氏家族</title></head><body><img src="img" /></body></html>';
	 }elseif($tar[0]=="img"){ 
		$this->load->sqlLayer("yuan/img");
        $this->img->puimg($tar[1]); 
	   return "";
	 }elseif($tar[0]=="bf"){ 
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$this->load->sqlLayer("yuan/mysql");
		return $this->mysql->$tar[1]($tar[2]);
	 }elseif($tar[0]=="eidt"){ 
		$pt=$_POST;
		$db=$this->usset->database("pu");
		$this->load->sqlLayer("yuan/puus");
		return $this->puus->edit($db,$pt);
	 }elseif($tar[0]=="dl"){ 
	  $art=array("888888"=>1,"999999"=>2);
	  if($art[$tar[1]]>0){
		$this->load->sqlLayer("yuan/userloin");
		$this->userloin->cookie_uid($art[$tar[1]],"88",180);
		header("Location: /");
	    return "";
      }else{
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	    return "密码有误";
	  }
	 }
	  $vid=$_COOKIE['vid'];
	  if($vid<1 or $vid>3 ){
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';//print_r($pb);
	    return "不能访问，请联系管理者";
	  }
	  $db=$this->usset->database("pu");
	  $this->load->sqlLayer("yuan/puus");
	  $ud=explode(".",$tsort);
	  $ud=explode("_",$ud[0]);
	  $sid=$ud[1]?$ud[1]:2;
	  $id=$ud[0]?$ud[0]:28;
	  $pb=$this->puus->show($db,$id);
	  $pb=$this->puus->showlist($db,$pb,$sid);
	  $pb[eidtok]=$vid;
	  $pb[puinfo]=$db->query("select * from ".$db->dbprefix("puinfo")." where pid=".$pb[id]."")->result_array();
	  $pb[gzj]=$db->query("select * from ".$db->dbprefix("gzj")." where n>1776")->result_array();
	  
	  $this->load->sqlLayer("yuan/lunar");
	  for ($ymx=1912; $ymx<=date("Y"); $ymx++) {
      $ymar=$this->lunar->rzy($ymx,06,06);
	  if($ymar[9]==""){$ymar[0]="公元".$ymar[0];}
	  $pb[gzj][]=array(n=>$ymar[0],b=>$ymar[9],e=>$ymar[3]."年");
	  }
	  $pb[gzj_m]=explode(",","正月,二月,三月,四月,五月,六月,七月,八月,九月,十月,十一月,十二月");
	  $pb[gzj_d]=explode(",","初一,初二,初三,初四,初五,初六,初七,初八,初九,初十,十一,十二,十三,十四,十五,十六,十七,十八,十九,二十,廿一,廿二,廿三,廿四,廿五,廿六,廿七,廿八,廿九,三十,卅一");
	  $pb[gzj_s]=explode(",","子时,丑时,寅时,卯时,辰时,巳时,午时,未时,申时,酉时,戌时,亥时");
	  $str=$this->index("show");
	  $str=str_replace('pudata=""','pudata='.json_encode($pb).';',$str);
	  return $str;
	}
	public function obhtml($n){
	  ob_end_clean(); 
	  ob_start();
	  include  "./uploads/yuan/".$n.".html";
	  $output = str_replace(array('<!--<!--<!---->','<!--<!---->','<!---->','<!--fck-->','<!--fck','fck-->','',"\r",substr("",0,-1)),'',ob_get_contents());
	  $str=trim($output,"\n");
	  ob_end_clean();
	  $str=str_replace("style/","/uploads/yuan/style/",$str);
	  return $str;
	}
	public function index($name){
	  $str=$this->obhtml($name);
	  $site="";
	  if($name=="mapp"){
	  $str=str_replace('</head>','<script type="text/javascript" src="/uploads/style/jsbridge-mini.js"></script></head>',$str);
	  $site['browser']='mapp';
	  }else{
	  $site['browser']=strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false?'weixin':'';
	  }
	  $str=str_replace("mofoot();",'mofoot();$yh.site='.json_encode($site).';',$str);
	  return $str;
	}
}
?>