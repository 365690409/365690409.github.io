<?php
class QuerySql extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	//取出列表数据
	public function query_list($nb,$f){
	   $nb->start_cache();
	   $data="";
	   $select=$f['select']?$f['select']:"*";
	   $query= "select $select from ".$nb->dbprefix($f['prefix'])." ".$f['query'];
	   $data[total_number]=$nb->query($query)->num_rows();
	   if($data[total_number]==0){
		$data['list']="";  
	    $nb->close();
	    return $data;
	   }else{
	   $query.=$f['order'];
	   $page=$f['page']?$f['page']:$_GET['page'];
	   $count=$f['count']?$f['count']:$_GET['count'];
	   $page=$page?$page:1;
	   $count=$count?$count:20;
       $page=$page?(($page-1)*$count):0;
	   $query.=" limit $page,$count";
	   $query=$nb->query($query);
	   $nb->stop_cache();
	   $select=$f['select2']?$f['select2']:$select;
	   if($select=="*"){
		 foreach ($query->result() as $row){
		  $data['list'][]=$val;  
		 }
	   }else{
	     $ts=explode(",",$select);
		 foreach ($query->result() as $row){
		   $val="";
		   foreach($ts as $t){
			 if($row->$t==""){
			 $val->$t="";
			 }else{
			 $val->$t=$row->$t;
			 }
		   }
		   $val->create_date=date("Y-m-d H:i",$row->create_time);
		   if($row->updatetime){
		   $val->updatedate=date("Y-m-d H:i",$row->updatetime);
		   }
		   if($row->addtime){
		   $val->adddate=date("Y-m-d H:i",$row->addtime);
		   }
		$data['list'][]=$val;  
		 }
	   }
	  $nb->close();
	  return $data;
	  }
	}
}
?>