<?php
class Mapsdw extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function mapssedw(){
	  $pt=$_POST;
		 $this->load->sqlLayer("set/mapsapi");
		 $show=$this->mapsapi->regeo($pt[m]);
		 if($show){
		  session_start();
		  preg_match("/[\w\-]+\.\w+$/",$_SERVER["SERVER_NAME"], $arr);
		  $lifeTime=(time()+3600*2);
		  setcookie("posoid",$show[location],$lifeTime,"/",$arr[0]); 
		  setcookie("posoname",$show[name],$lifeTime,"/",$arr[0]); 
		 if($_COOKIE['vid']){
		   $db=$this->usset->database(2);
		   $us=$db->query("select id from ".$db->dbprefix("user")." where logincode='".$_COOKIE['logincode']."' and id=".$_COOKIE['vid'])->result_array();
		   if($us[0]){
		   $db->where('id',$_COOKIE['vid']);
		   $db->update('user',array(oid=>$show[location],oname=>$show[name]));
		   }
		 }
         return json_encode(array(oid=>$show[location],oname=>$show[name]));
		 }
         return "";
	}
	public function mapsmr(){
	  $pt=$_POST;
	  $show="";
	  $show[oid]=$this->bd_decrypt($pt[longitude],$pt[latitude]);
	  $show[oname]=$pt[locationDescribe];
	  $ns=explode("在",$show[oname]);
	  if(count($ns)==2){
	  $show[oname]=$ns[1];
	  }
		  session_start();
		  preg_match("/[\w\-]+\.\w+$/",$_SERVER["SERVER_NAME"], $arr);
		  $lifeTime=(time()+3600*2);
		  setcookie("posoid",$show[location],$lifeTime,"/",$arr[0]); 
		  setcookie("posoname",$show[name],$lifeTime,"/",$arr[0]); 
		 if($_COOKIE['vid']){
		   $db=$this->usset->database(2);
		   $us=$db->query("select id from ".$db->dbprefix("user")." where logincode='".$_COOKIE['logincode']."' and id=".$_COOKIE['vid'])->result_array();
		   if($us[0]){
		   $db->where('id',$_COOKIE['vid']);
		   $db->update('user',array(oid=>$show[oid],oname=>$show[oname]));
		   }
		 }
      return json_encode($show);
	}
	
	public function bd_decrypt($bd_lon,$bd_lat){
    $x_pi = 3.14159265358979324 * 3000.0 / 180.0;
    $x = $bd_lon - 0.0065;
    $y = $bd_lat - 0.006;
    $z = sqrt($x * $x + $y * $y) - 0.00002 * sin($y * $x_pi);
    $theta = atan2($y, $x) - 0.000003 * cos($x * $x_pi);
    $data['gg_lon'] = $z * cos($theta);
    $data['gg_lat'] = $z * sin($theta);
    return  $data['gg_lon'].",". $data['gg_lat'];
    }
}
?>