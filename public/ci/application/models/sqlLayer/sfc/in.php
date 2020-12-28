<?php
class In extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function seinfo($mobile,$tid){
	  $pt=$_POST;
	  $code="";
	  $db=$this->usset->loginbase();
	  $us=$this->api->suser($db,$mobile,"id,callname,avatarid");
      $tus=$db->query("select id,callname,avatarid from ".$db->dbprefix('user')." where id=".$tid)->result_array();
	  $tus=$tus[0];
	  $code[name]=$tus[callname];
	  $code[id]=$tid;
	  $code[l_type]="g_seinfo";
	  $this->load->sqlLayer("info/set");
	  foreach ($this->set->seinfo($us[id],$tid) as $k=>$rs){
		$rs[user]=$rs[uid]==$us[id]?$us:$tus;
	    $clist[]=$rs;
	  }
	  foreach ($this->set->seinfonew($us[id],$tid) as $k=>$rs){
		$rs[user]=$rs[uid]==$us[id]?$us:$tus;
	    $clist[]=$rs;
	  }
	  $code[clist]=$clist;
	  return json_encode($code);
	}
	public function se($mobile,$tid){
	  $pt=$_POST;
	  if($pt[d]==""){return $this->api->code("请输入内容");}
	  $db=$this->usset->loginbase();
	  $us=$this->api->suser($db,$mobile,"id");
	  $this->load->sqlLayer("info/set");
	  $this->set->sendinfo($us[id],$tid,array(s=>0,d=>$pt[d]),1);
	  return $this->seinfo($mobile,$tid);
	}
}
?>