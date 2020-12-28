<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class IndexController extends CI_Controller {
    function __construct()
    {
        parent::__construct();
    }
	public function show()
	{
		$host=$_SERVER['HTTP_HOST'];
		$hosts=explode(".",$host);
		if($hosts[0]=="yuan"){
	    $this->load->sqlLayer("yuan/web");
		}else{
	    $this->load->sqlLayer("web/web");
		}
		$path_info = $_SERVER['REQUEST_URI']; 
		$path_info=parse_url($path_info);
		$path_info=$path_info['path'];
		$url=$path_info;
	    $url=str_replace("#p#ath#/","", "#p#ath#".$url);
	    $url=str_replace("#p#ath#","", $url);
		echo $this->web->show(2,$url,"http://".$host."/");
	}
	public function showaaaa()
	{
		$host=$_SERVER['HTTP_HOST'];
	    $this->load->sqlLayer("web/web");
		$webdb=$this->load->database("web",TRUE); 
		$row=$webdb->query("select uid from ".$webdb->dbprefix("site")." where host='".$host."'")->result();
		$tid=$row[0]->uid;
		if($tid){
		$path_info = $_SERVER['REQUEST_URI']; 
		$path_info=parse_url($path_info);
		$path_info=$path_info['path'];
		$url=$path_info;
	    $url=str_replace("#p#ath#/","", "#p#ath#".$url);
	    $url=str_replace("#p#ath#","", $url);
		echo $this->web->show($tid,$url,"http://".$host."/");
		}
	}
	public function ecrun($a,$b,$c,$d,$e,$f,$g)
	{
		$this->load->sqlLayer($b."/".$c);
		 echo $this->$c->$d($a,$e,$f,$g);
	}
	public function layoutcontroller($a,$b,$c,$d,$e,$f,$g)
	{
		$this->load->sqlLayer("layout/".$a);
		echo $this->$a->$b($c);
	}
}
