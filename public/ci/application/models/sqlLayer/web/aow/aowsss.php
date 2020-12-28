<?php
class Aow extends CI_Model {
    function __construct()
    {
        parent::__construct();
	    $this->load->sqlLayer("web/aow/set");
	    $this->baomin="aow";
    }
	public function n($tid,$sname=""){
	  $this->nr($tid,$sname);
	  echo '<script type="text/javascript">window.opener = null;window.open("", "_self");window.close();</script>';
	}
	public function nr($tid,$sname=""){
	  $arrsname=explode(".",$sname);
	  $arrsname=explode("k",$arrsname[0]);
	  $tid=$arrsname[1];
	  $this->set->v_stdr($tid);
	  $this->set->v_std($tid);
	  $file_path = "qq/u/".$sname;
	  if(file_exists($file_path)){$str=file_get_contents($file_path);}
	  if($str==""){return "";}
	  $fp= fopen($file_path, "w");
	  $len = fwrite($fp,"");
	  fclose($fp);
	  date_default_timezone_set('PRC');
      $str=iconv('gbk', 'UTF-8', $str);
	  $kna="k".$arrsname[2];
	  $this->load->sqlLayer("web/aow/".$kna);
	  return  $this->$kna->h($arrsname[1],$str).'<script type="text/javascript">window.opener = null;window.open("", "_self");window.close();</script>';
	}
	public function h($tid){
	   foreach (explode(",","k2k0,k6k2,k7k2,k8k2") as $sname){
		$krs=$this->n($tid,$sname);
	   }
	   return $krs;
	}
	public function q($tid,$kna){
	   $db=$this->set->database($tid);
	   $this->load->sqlLayer("web/aow/".$kna);
	   return $this->$kna->q($tid,$db);
	}
	public function s($tid){
		$this->load->sqlLayer("web/aow/k2");
		$this->k2->zq_h($tid,$_GET[a],$_GET[b]);
	}
	public function k0($tid){
		$this->load->sqlLayer("web/aow/k0");
		$this->k0->zq_h($tid);
	    $fp= fopen('D:\lh\s.txt', "w");
		$len = fwrite($fp,date("Y-m-d H:i:s")."\r\n".$_GET[a]);
		fclose($fp);
	}
}
?>