
<?php
class K3 extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function sj(){
	  $dd=array(0,1,2,3);
	  foreach (array(1,0,3,2,5,4,1,0,3,2) as $k=>$a){
		foreach (array(1,2,3,4,5) as $b){
			if($k>4){
			$dd[($k+1).$b]=($b+5).$a;
			}else{
			$dd[($k+1).$b]=$b.$a;
			}
		}
	  }
	  return $dd;
	}
	public function zq_h($tid){
	    $a=explode(",",trim($_GET[a]));
		if($a[1]==""){return "";}
		$db=$this->set->database($tid); 
		$zishow=$db->query("select id from ".$db->dbprefix("ac")." where v=".$a[0])->result_array();
		if($zishow[0]==""){
			$dd=$this->sj();
			$km="";
			foreach ($a as $k=>$v){
			  if($k!=0){
			    $km[]=$dd[$v];
			  }
			}
			$km=implode(",",$km);
			$db->insert("ac",array(v=>($a[0]+1),km=>$km));
		}
	}
}
?>
