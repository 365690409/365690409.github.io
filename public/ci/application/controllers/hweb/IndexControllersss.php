<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class IndexController extends CI_Controller {
    function __construct()
    {
        parent::__construct();
    }
	public function js($b)
	{
		ob_end_clean(); 
        ob_start();
		if($b=="common.js"){
		$vname=array("wx","web","po","pusiness","resources","ey");
		$u="./application/views/web/skin/js/";
		include ($u."index.php");
		}elseif($b=="common.css"){
		$u="./application/views/web/skin/css/";
		include ($u."index.php");
		}else{
		$u="./application/views/web/skin/js/";
		include ($u.$b);
		}
		$output=ob_get_contents();
        ob_end_clean();
		$output=str_replace("<script>","", $output);
		$output=str_replace("<style>","", $output);
		$output=str_replace("\r","", $output);
		$output=str_replace("\n","", $output);
		echo $output;
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
