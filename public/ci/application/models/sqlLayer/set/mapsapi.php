<?php
class Mapsapi extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function regeo($keywords="110.300832,21.151215"){
	  $db=$this->usset->database(2);
	  $show=$db->query("select location,name,adname,address from ".$db->dbprefix("pois")." where location='".$keywords."' order by id desc limit 0,1")->result_array();
	  if($show[0]){return $show[0];}
	  $url="https://restapi.amap.com/v3/geocode/regeo";
	  $url.="?key=5be842bde83e9a917b367b6c605557a6";
	  $url.="&location=".$keywords;
	  $url.="&radius=1000";
	  $url.="&extensions=all";//base/all
	  $url.="&output=JSON";
	  $ada=file_get_contents($url);
	  if($ada==""){return "";}
	  $ada=json_decode($ada, true);
	  if($ada==""){return "";}
	  $show[location]=$keywords;
	  $show[adname]=$ada[regeocode][addressComponent][district];
	  $address=$ada[regeocode][formatted_address];
	  $address=str_replace($ada[regeocode][addressComponent][province],"", $address);
	  $address=str_replace($ada[regeocode][addressComponent][city],"", $address);
	  $address=str_replace($ada[regeocode][addressComponent][district],"", $address);
	  $address=str_replace($ada[regeocode][addressComponent][township],"", $address);
	  if($ada[regeocode][pois][0][name]){
		if($ada[regeocode][aois][0][name]){
		$show[name]=$ada[regeocode][aois][0][name];
		}else{
		$show[name]=$ada[regeocode][pois][0][name];
		}
	  $show[address]=$address;
	  }else{
	  $address=str_replace($ada[regeocode][roads][0][name],"", $address);
	  $show[name]=$address;
	  }
	  if($show[name]==""){return "";}
	  $this->sc_pois($db,$show);
	  return $show;
	}
	public function sc_pois($db,$show){
	  $zishow=$db->query("select id from ".$db->dbprefix("pois")." where location='".$show[location]."'")->result_array();
	  if($zishow[0]==""){
	   $data="";
	   $data[location]=$show[location];
	   $data[name]=trim($show[name]);
	   $data[adname]=trim($show[adname]);
	   $data[address]=trim($show[address]);
	   $data[adate]=date("Y-m-d H:i:s");
	   $db->insert("pois",$data);
	  }
	}
}
?>