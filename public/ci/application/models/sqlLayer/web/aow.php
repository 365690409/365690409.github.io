<?php
class Aow extends CI_Model {
    function __construct()
    {
        parent::__construct();
	    $this->load->sqlLayer("web/aow/set");
	    $this->baomin="aow";
    }
	public function q($tid,$kna){
	   $db=$this->set->database($tid);
	   $this->load->sqlLayer("web/aow/".$kna);
	   return $this->$kna->q($tid,$db);
	}
	public function cx($tid,$kna){
	   $db=$this->set->database($tid);
	   $this->load->sqlLayer("web/aow/cx");
	   return $this->cx->cx($tid,$db);
	}
	public function s($tid,$kna){
		$this->set->v_std($tid);
		$this->load->sqlLayer("web/aow/".$kna);
		$this->$kna->zq_h($tid);
	}
}
?>