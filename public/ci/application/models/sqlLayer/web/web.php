<?php
class Web extends CI_Model {
    function __construct()
    {
        parent::__construct();
	    $this->load->sqlLayer("sfc/usset");
	    date_default_timezone_set('PRC');
    }
	public function userinfo(){
	  $vid=$_COOKIE['vid'];
	  if($vid){
	  $db=$this->usset->database(2);
	  $r=$db->query("select mobile,oid,oname,owner,logincode from ".$db->dbprefix("user")." where id=".$vid)->result_array();
	  $website=$r[0];
	  if($_COOKIE['logincode']==$website[logincode]){
	  $this->load->sqlLayer("sfc/userloin");
	  $this->userloin->cookie_uid($vid,$website[logincode],180);
	  }else{
	  $website="";
	  }
	  }
	  if($website==""){
	  $website="";
	  $website[mobile]=0;
	  }
	  
	  $website[oid]=$website[oid]?$website[oid]:$_COOKIE['posoid'];
	  $website[oname]=$website[oname]?$website[oname]:$_COOKIE['posoname'];
	  $website[oid]=$website[oid]?$website[oid]:"110.300832,21.151215";
	  $website[oname]=$website[oname]?$website[oname]:"广东海洋大学主校区";
	  return $website;
	}
	public function mojs($n){
		ob_end_clean(); 
        ob_start();
		include ($n);
		$output=ob_get_contents();
        ob_end_clean();
		$output=str_replace("<script>","", $output);
		$output=str_replace("<style>","", $output);
		$output=str_replace("\r","", $output);
		$output=str_replace("\n","", $output);
		$output=str_replace("  "," ", $output);
		return $output;
	}
	public function mojs_s($n){
		$mojs=$this->mojs("./application/views/".$n."/".$n.".php"); 
		$fp= fopen("./uploads/style/".$n.".js", "w");
		$len = fwrite($fp,$mojs);
		fclose($fp);
	}
	public function mocss($n){
		ob_end_clean(); 
        ob_start();
		include ("./application/views/sfc/".$n.".php");
		$output=ob_get_contents();
        ob_end_clean();
		$output=str_replace("<style>","", $output);
		return $output;
	}
	public function show($tid,$tsort="",$aa=""){
	   if($tsort=="admin.html"){
	   return $this->admin($tid,$tsort);
	   }elseif($tsort=="smaps"){
	   $str=$this->obhtml("maps_ok");
	   if($_GET[m]){
	   $str=str_replace("110.300832,21.151215",$_GET[m],$str);
	   }
	   return $str;
	   }elseif($tsort=="dw"){
        header("Location: https://apis.map.qq.com/tools/geolocation?key=YFUBZ-Y7MWW-GPJRN-RL7XB-ZE7O2-7UFWT&referer=myapp");  
		return "";
	   }elseif($tsort=="d"){
	   if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {header('Location: /');}else{header('Location: https://www.w3school.com.cn/tiy/v.asp?code=%3Cw3scrw3ipttag%3Enavigator.geolocation.getCurrentPosition%28function+%28p%29+%7Bwindow.location.hrefw3equalsign%22http%3A%2F%2Fwww.ecgam.com%2Fsmapsdw%3Fkw3equalsign1%26mw3equalsign%22w3plussignp.coords.longitude+w3plussign+%22%2C%22+w3plussign+p.coords.latitude%3B%7D%29%3C%2Fw3scrw3ipttag%3E');}
        return "";
	   }elseif($tsort=="mapssedw"){
       $this->load->sqlLayer("set/mapsdw");
       return $this->mapsdw->mapssedw();
	   }elseif($tsort=="mapsmr"){
       $this->load->sqlLayer("set/mapsdw");
       return $this->mapsdw->mapsmr();
	   }elseif($tsort=="dow"){
	   return $this->obshow("html/index");
	   }elseif($tsort=="dowapk"){/*下载*/
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')||strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')){
		 $str=$this->obshow("html/apkno");
		 $str=str_replace("苹果","", $str);
		 return $str;
		}else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android')){
	      header("Location: /uploads/apk/hdcx-Android-v115.apk");  
		}else{
		 $str=$this->obshow("html/apkno");
		 $str=str_replace("苹果","电脑", $str);
		 return $str;
		}	   
	   return "";
	   }
       if($this->insin()==0){return $this->obshow("html/index");}
	   if($tsort==""){
	   return $this->index("show");
	   }elseif($tsort=="mapp"){
	   return $this->index($tsort);
	   }elseif($tsort=="maps"){
	   return $this->maps($tid,$tsort);
	   }elseif($tsort=="web.html"){
	   $website=$this->userinfo();
	   if($website[owner]==1){
	   if($_POST[h]==1){
	   $website[htm]='<script type="text/javascript">'.$this->mojs("o.php").'</script>';
	   }
	   }
	   if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) { 
	   $website[browser]="weixin";
	   }else{
	   $website[browser]=0;
	   }
	   return json_encode($website);
	   }elseif($tsort=="common.js"){
		   if($_SERVER['SERVER_NAME']=='www.chamsea.cn'){
			$d=$this->mojs("./application/views/sfc/h.php"); 
			$fp= fopen("D:\a\a.txt", "w");
			$len = fwrite($fp,$d);
			fclose($fp);
	        //$this->mojs_s("c");/*生成*/
		    return $d;
		   }else{
			ob_end_clean(); 
			ob_start();
			include  "./uploads/style/com.js";
			$output = str_replace(array('<!--<!--<!---->','<!--<!---->','<!---->','<!--fck-->','<!--fck','fck-->','',"\r",substr("",0,-1)),'',ob_get_contents());
			$str=trim($output,"\n");
			ob_end_clean();
	        $str=str_replace("sojson","ecgam",$str);
			return $str;
		   }
	   }elseif($tsort=="style.css"){
		   echo $this->mocss("css");
	   }else{
	    header("Location: /");
	   }
	}
	public function obhtml($n){
	  ob_end_clean(); 
	  ob_start();
	  include  "./uploads/".$n.".html";
	  $output = str_replace(array('<!--<!--<!---->','<!--<!---->','<!---->','<!--fck-->','<!--fck','fck-->','',"\r",substr("",0,-1)),'',ob_get_contents());
	  $str=trim($output,"\n");
	  ob_end_clean();
	  $str=str_replace("style/","/uploads/style/",$str);
	  return $str;
	}
	public function obshow($n){
	  ob_end_clean(); 
	  ob_start();
	  include  "./uploads/".$n.".html";
	  $output = str_replace(array('<!--<!--<!---->','<!--<!---->','<!---->','<!--fck-->','<!--fck','fck-->','',"\r",substr("",0,-1)),'',ob_get_contents());
	  $str=trim($output,"\n");
	  ob_end_clean();
	  return $str;
	}
	public function admin($tid,$tsort=""){
	  $us=$this->userinfo();
	  if($us[mobile]=="13560515715"){$tsort=1;}else{header("Location: /");}
	  $str=$this->obhtml("admin");
	  if($_SERVER['SERVER_NAME']=='www.chamsea.cn'){
	   $this->mojs_s("admin");/*生成*/
	  $str=str_replace("/uploads/style/com.js","common.js",$str);
	  }
	  $us[key]="admin";
	  $us[json_url]="/ecrun/".$us[mobile]."/web/admin/";
	  if($name=="mapp"){
	  $str=str_replace('</head>','<script type="text/javascript" src="/uploads/style/jsbridge-mini.js"></script></head>',$str);
	  $site['browser']='mapp';
	  }else{
	  $site['browser']=strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false?'weixin':'';
	  }
	  $str=str_replace("{website}",'<script type="text/javascript">var website='.json_encode($us).';ad_index();$yh.site='.json_encode($site).';</script>',$str);
	  return $str;
	}
	public function index($name){
	  $str=$this->obhtml("show");
	  if($_SERVER['SERVER_NAME']=='www.chamsea.cn'){
	  $str=str_replace("/uploads/style/com.js","common.js",$str);
	  }
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
	public function maps($tid){
	  $output=$this->obhtml("maps");
	  $key="[".str_replace('|','],[',$_GET[key])."]";
	  if($key){
	  $output = str_replace('{keypath}','var path =['.$key.'];',$output);
	  }else{
	  $output = str_replace('{keypath}','var path =[[110.300695,21.151325],[110.406322,21.248733],[110.381573,21.25529]];',$output);
	  }
	  return $output;
	}
	
	public function insin(){
		if($this->agent()==1){
			if($_SERVER['SERVER_NAME']=='www.chamsea.cn'){return 1;}
			return $this->is_mobile();
		}else{
	        return 0;
		}
	}
	public function agent(){
	  if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 8.0")){
	  return 0;
	  }elseif(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 7.0")){
	  return 0;
	  }elseif(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 6.0")){
	  return 0;
	  }elseif(strpos($_SERVER["HTTP_USER_AGENT"],"Firefox/3")){
	  return 1;
	  }elseif(strpos($_SERVER["HTTP_USER_AGENT"],"Firefox/2")){
	  return 1;
	  }elseif(strpos($_SERVER["HTTP_USER_AGENT"],"Chrome")){
	  return 1;
	  }elseif(strpos($_SERVER["HTTP_USER_AGENT"],"Safari")){
	  return 1;
	  }elseif(strpos($_SERVER["HTTP_USER_AGENT"],"Opera")){
	  return 1;
	  }else{
	  return 1;
	  }
	}
	public function is_mobile(){
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        $is_pc = (strpos($agent, 'windows nt')) ? true : false;
        $is_mac = (strpos($agent, 'mac os')) ? true : false;
        $is_iphone = (strpos($agent, 'iphone')) ? true : false;
        $is_android = (strpos($agent, 'android')) ? true : false;
        $is_ipad = (strpos($agent, 'ipad')) ? true : false;
        if($is_iphone){
              return  1;
        }
        if($is_android){
              return  1;
        }
        if($is_ipad){
              return  1;
        }
        if($is_pc){
              return  0;
        } 
        if($is_mac){
              return  0;
        }
}	
}
?>