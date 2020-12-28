
<?php
class Cx extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function cx($tid,$db){
		$cc="";
		 $bd=$db->query("select * from ".$db->dbprefix("ak_2")."  order by id desc limit 0,100")->result_array();
		 foreach ($bd as $k=>$r){
          $cc[$r[m]]++;
		  if(count($cc)==10){break;}
		 }
		 $ee="";
		 foreach ($cc as $k=>$v){
		    $ee[]=array($k,$v);
		 }
		 krsort($ee);
         $bb=array_unique($cc);
		 sort($bb);
		 $cc_i=0;
		 foreach ($ee as $k=>$v){
		    if($v[1]==$bb[0]){if($cc_i==3){break;}else{unset($ee[$k]);$cc_i++;}}
		 }
		 foreach ($ee as $k=>$v){
		    if($v[1]==$bb[1]){if($cc_i==3){break;}else{unset($ee[$k]);$cc_i++;}}
		 }
		 foreach ($ee as $k=>$v){
		    if($v[1]==$bb[2]){if($cc_i==3){break;}else{unset($ee[$k]);$cc_i++;}}
		 }
		 $dd="";
		 foreach ($ee as $k=>$v){
			 $dd[]=$v[0];
		 }
		 echo  implode(",",$dd);
		print_r($dd);
	   echo "";
	   foreach (array(1,2,3,4,5,6,7,8,9,10) as $i){
		 $dd="";
         $bd=$db->query("select * from ".$db->dbprefix("ak_".$i)."  order by id desc limit 0,25")->result_array();
		 $dj_i=0;
		 foreach ($bd as $k=>$r){
			$dj_i=$r[ki]>$dj_i?$r[ki]:$dj_i;
		 }
		 foreach ($bd as $k=>$r){
		 $dd.=" - ".$r[k];
		 if($k>10){break;}
		 }
         echo sprintf("%02d",$i)."-".$dj_i.":".$dd. "<br />";
	   }
         $bd=$db->query("select * from ".$db->dbprefix("ak_1")."  order by id desc limit 0,20")->result_array();
		 foreach ($bd as $k=>$r){
         echo  "<br />".substr($r[v],-2);
		 }
	}
}
?>
