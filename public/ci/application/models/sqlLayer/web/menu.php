<?php
class menu extends CI_Model {
    function __construct()
    {
        parent::__construct();
	    $this->load->sqlLayer("web/usset");
    }
	public function eclist($tid,$lang,$count,$page=1){
		$pt=$_POST;
	    $db=$this->usset->database($tid);
		$d="";
		$query="select id,name,no_order,foldername,filename,urlname,position,coms,type,lang  from ".$db->dbprefix('column')." where lang='$lang'";
		if($pt['type']!=""){
		$query.=" and type='".$pt['type']."'";
		}
		$query.=$pt['keyword']?" and ".$pt['keyword_type']." like '%".$pt['keyword']."%'":"";
		$d['name']=$pt['ecn'];
		$d['eck']=$pt['eck'];
		$d['total_number']=$db->query($query)->num_rows();
	    $query.=$pt['ecorder']?" order by ".$pt['ecorder']:" order by no_order,id desc";
		$page=$page?$page:1;
		$count=$count?$count:20;
		$page=$page?(($page-1)*$count):0;
	    $query.=" limit $page,$count";
		$query=$db->query($query);
		foreach ($query->result() as $r){
		   $r->num=$db->query("select id from ".$db->dbprefix('column')." where lang='".$r->lang."' and type=".$r->id)->num_rows();
		   $d['list'][]=$r;
		}
		return json_encode($d);
	}
	public function Blurname($tid,$lang,$prefix,$name=""){
		$pt=$_POST;
		$id=$pt['id'];
		if($id and $name and $pt['d']){
	    $db=$this->load->database("web",TRUE);
		$db->where('id',$id);
		$db->update('site_skin',array($name=>$pt['d'])); 
		return "{id:".$id.",d:'".$_POST['d']."'}";
		}else{
		return 0;
		}
	}
	public function edit($tid,$id=""){
	   $pt=$_POST;
	   $d="";
	   $d['name']=$pt['name'];
	   $d['no_order']=$pt['no_order'];
	   $d['seotitle']=$pt['seotitle'];
	   $d['keywords']=$pt['keywords'];
	   $d['description']=$pt['description'];
	   if($pt['type']=="show"){
	   $d['content']=$pt['content'];
	   }else{
	   $d['isshow']=(int)$pt['isshow'];
	   $d['imgurl']=$pt['imgurl'];
	   }
	   $db=$this->usset->database($tid);
	   if($id){
	   $db->where('id',$id);
	   $db->update('column',$d);
	   return 1002;
	   }else{
		 $d['lang']=$pt['lang'];
		 $d['foldername']=$pt['foldername'];
		 $d['type']=$pt['type'];
		 $d['urlname']=$pt['urlname'];
		 if($d['type']==0){
		 $d['filename']=$d['urlname'];
		 }else{
		 $r=$db->query("select filename,position from ".$db->dbprefix('column')." where lang='".$d['lang']."' and id='".$d['type']."'")->result_array();
		 $d['filename']=$r[0]['filename'];
		 $d['position']=$r[0]['position']?$r[0]['position'].",".$d['type']:$d['type'];
		 }
		 if($db->query("select id from ".$db->dbprefix('column')." where lang='".$d['lang']."' and type='0' and (filename='".$d['urlname']."' or urlname='".$d['urlname']."')")->num_rows()==0){
		 $db->insert("column",$d);
		 return 1001;
		 }
		 return 0;
	   }
	}
	public function del($tid,$id){
	    $db=$this->usset->database($tid);
		$db->delete("column",array('id'=>$id)); 
		return 1003;
	}
	public function run($tid,$lang,$s){
	   $pt=$_POST;
	   $ids=$pt['ids'];
	   if($s=="del"){
		 if($ids){
		   $db=$this->usset->database($tid);
		   $cids="";
		   foreach ($ids as $id){
			if(is_numeric($id)){
			  if($db->query("select id from ".$db->dbprefix('column')." where type=".$id)->num_rows()==0){
			   $db->delete("column",array('id'=>$id)); 
			   $cids[]=$id;
			  }
			}
		   }
	       return $cids?1003:0;
		 }
	   }elseif($s=="save"){
		 if($ids){
		   $db=$this->usset->database($tid);
		   $cids="";
		   foreach ($ids as $id){
			if(is_numeric($id)){
			 $d="";
			 $d['name']=$pt['name_'.$id];
			 $d['coms']=$pt['coms_'.$id];
			 $d['no_order']=$pt['no_order_'.$id];
			 $db->where('id',$id);
			 $db->update('column',$d);
			}
		   }
	       return 1001;
		 }
	   }
	   return 0;
	}
	public function columns($db,$id=""){
	  $d="";
	  if($id==0 and $_GET['k']==1){
	  $d[]=array("n"=>"网站首页","d"=>-1);
	  }
	  $query=$db->query("select id,name from ".$db->dbprefix('column')." where type=$id"." order by no_order,id desc");
	  foreach ($query->result() as $row){
		$v="";
		$v[n]=$row->name;
		$v[d]=$row->id;
		$s=$this->columns($db,$row->id);
		if($s){
		$v[s]=$s;
		}
		$d[]=$v;
	  }
	  return $d;
	}
	public function Loading($tid,$cid=""){
		$pt=$_POST;
	    $db=$this->usset->database($tid);
		$d=$this->columns($db,$cid);
	    return json_encode($d);
	}
	public function show($tid,$id=""){
	     $db=$this->usset->database($tid);
		 $row=$db->query("select * from ".$db->dbprefix("column")." where id=".$id)->result();
		 $row=$row[0];
		 $row->prefix=$prefix;  
		 $row->cids=str_replace('[',"",$row->position);
		 $row->cids=str_replace(']',"",$row->cids);
		 $row->cids=explode(",",$row->cids);  
		 return json_encode($row);
	}
}
?>