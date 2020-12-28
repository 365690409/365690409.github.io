<?php
class Owner extends CI_Model {
    function __construct()
    {
        parent::__construct();
	    $this->load->sqlLayer("sfc/usset");
	    $this->load->sqlLayer("sfc/api");
	    date_default_timezone_set('PRC');
    }
	public function in($mobile,$n,$id){
	 $this->load->sqlLayer("sfc/in");
	 return $this->in->$n($mobile,$id);
	}
	public function my($mobile,$n,$id){
	 $this->load->sqlLayer("sfc/my");
	 return $this->my->$n($mobile,$id);
	}
	public function info($mobile,$id=1){
	 $this->load->sqlLayer("sfc/info");
	 return $this->info->show($mobile,$id);
	}
	public function spoi($mobile){
	   return json_encode($this->api->poi($_POST[name]));
	}
	public function index($mobile){
	  $db=$this->usset->database(2);
	  $code="";
	  $query="select id,oname,dname,totime from ".$db->dbprefix('driver')." where mobile='".$mobile."' and sok=1 and totime>".time();
	  $query.=" order by atime desc";
	  $query.=" limit 0,20";
	  $query=$db->query($query);
	  foreach ($query->result_array() as $rs){
		  $da="";
		  $da[kkey]="c_".$rs[id];
		  $da[o]=array(name=>$rs[oname]);
		  $da[d]=array(name=>$rs[dname]);
		  $da[todate]=$this->api->listdate($rs[totime]);
		  $da[status_name]="正在寻找乘客";
		  $code['clist'][]=$da;
	  }
	  $query="select id,mobile,pok,sok from ".$db->dbprefix('stroke')." where  mobile='".$mobile."' and sok=0 and vtime>=".(time()-3600*24)." order by atime desc";
	  $dd="";
	  foreach ($db->query($query)->result_array() as $show){
		$plist="";
		$qytop="id,mobile,toid,oname,dname,totime,people,pok,message,thank,price,price_p,sok,c_status,status,s_atime";
		foreach ($db->query("select ".$qytop." from ".$db->dbprefix('order')." where  s_mobile='".$mobile."' and s_id=".$show[id])->result_array() as $rs){
		$da="";
		$da[kkey]="o_".$rs[id];
		$da[sok]=$rs[sok];
		$da[sok_name]=$rs[sok]==1?'':'已取消';
		$da[todate]=$this->api->listdate($rs[totime]);
		$da[people]=$rs[people];
		$da[o]=array(name=>$rs[oname]);
		$da[d]=array(name=>$rs[dname]);
		$da[user]=$this->api->suser($db,$rs[mobile],"callname,avatarid");
		$plist[plist][]=$da;
		}
	  $code[olist][]=$plist;
	  }
	  $code[l_type]="o_waitlist";
	  return json_encode($code);
	}
	
	public function monitor($mobile){
	  $db=$this->usset->database(2);
	  if($_POST[dkey]==1){
	   $db->where('mobile',$mobile);
	   $db->update('userowner',array(utime=>time()));
	  }
	  return $this->api->pro($db,$mobile,1);
	}
	
	public function prompt($mobile){
	  $pt=$_POST;
	  $code="";
	  $db=$this->usset->loginbase();
	  $code[name]="系统信息";
	  $code[l_type]="g_prompt";
	  foreach ($db->query("select * from ".$db->dbprefix("uspro")." where mobile='".$mobile."' and h=1 order by adate desc  limit 0,20")->result_array() as $rs){
		$da="";
		$val=$this->api->prorr($rs);
		$da[t]=$val[t];
		$da[n]=$val[n];
		$da[adate]=$this->api->listdate(strtotime($rs[adate]));
		$da[u]=$val[u];
	    $clist[]=$da;
	  }
	  $code[clist]=$clist;
	  return json_encode($code);
	}
	public function fbhq($mobile){
	  if($mobile<1){return $this->api->logcode();}
	  $pt=$this->api->anpt();
	  if($pt[0]==1){$pt=$pt[1];}else{return $pt[1];}
	  $db=$this->usset->ownerbase();
	  $d="";
	  $d[mobile]=$mobile;
	  $d[toid]=$pt[oid]."|".$pt[did];
	  $d[oname]=$pt[oname];
	  $d[dname]=$pt[dname];
	  $d[totime]=$this->api->listdate($pt[totime],1);
	  if($db->query("select id from ".$db->dbprefix("driver")." where  mobile='".$mobile."' and sok=1  and (totime>=".($d[totime]-1800)." and totime<=".($d[totime]+1800).") and totime>".time())->num_rows()>0){
		return $this->api->code("与已存在行程出发时间间隔不得低于30分钟");
	  }
	  $d[people]=$pt[people];
	  $d[status]=1;
	  $d[sok]=1;
	  $d[atime]=time();
	  $db->insert("driver",$d);
	  $r=$db->query("select id from ".$db->dbprefix("driver")." where  mobile='".$mobile."'  order by atime desc limit 0,1")->result();
	  return json_encode(array(l_type=>"edit_fbhq",id=>$r[0]->id));
	}
	public function s_owncancel($mobile,$id){
	  if($id==""){return $this->api->code("系统出错");}
	  $db=$this->usset->ownerbase();
	  $db->where('id',$id);
	  $db->where('sok',1);
	  $db->where('mobile',$mobile);
	  $db->update('driver',array(sok=>2));
	  return $this->api->codeok(array(kname=>"取消成功",index=>1));
	}

	public function s_orderpay($mobile,$id){
	  if($id==""){return $this->api->code("系统出错");}
	  $db=$this->usset->ownerbase();
	  $this->load->sqlLayer("order/ownerin");
	  return $this->api->codeok( $code=$this->ownerin->order_pay($db,$mobile,$id));
	}
	public function s_owncancel_info($mobile,$id){
	  if($id==""){return $this->api->code("系统出错");}
	  $db=$this->usset->ownerbase();
	  $this->load->sqlLayer("order/ownerin");
	  return $this->api->codeok( $code=$this->ownerin->order_cancel($db,$mobile,$id));
	}
	
	public function s_strokestatus($mobile,$id){
	  if($id==""){return $this->api->code("系统出错");}
	  $db=$this->usset->ownerbase();
	  $this->load->sqlLayer("order/ownerin");
	  return $this->api->codeok( $code=$this->ownerin->order_status($db,$mobile,$id));
	}
	public function info_passenger($db,$show){
	  $info="";
	  $info[id]=$show[id];
	  $tos=explode("|",$show[toid]);
	  $show[price]=number_format($show[price]+$show[thank],1);
	  if($show[pok]==1){
	  $show[price_p]=number_format($show[price_p]+$show[thank],1);
      }else{
	  $show[price_p]="";
	  }
	  /*头*/
	   $top="";
	   $top[todate]=$this->api->listdate($show[totime]);
	   $top[people]=$show[people];
	   $top[pok]=$show[pok];
	   if($show[message]){$top[message]=$show[message];}
	  $info[top]=$top;
	  $info[cd]=array(o=>array(name=>$show[oname],oid=>$tos[0]),d=>array(name=>$show[dname],oid=>$tos[1])
	  ,r=>array(price=>$show[price],price_p=>$show[price_p],thank=>$show[thank]));
	  $user=$this->api->suser($db,$show[mobile],"callname,avatarid");
	  $info[yelr]=array(us=>$user,r=>array(t=>'<div class="pkrof">确认同行</div>'));
	  return  $info;
	}
	public function s_range($db,$e_id,$e_i=0,$e_d=5,$query){
		$d="";
		$query=$db->query("select id,mobile,toid,oname,dname,people,totime,price,price_p,thank,pok,message from ".$db->dbprefix("passenger")." where sok=1 and totime>".time().$query);
		if($e_i==2){
		$e_tos=explode("|",$e_id);
		foreach ($query->result_array() as $r){
		  $tos=explode("|",$r[toid]);
		   if($this->api->getdistance($e_tos[0]."|".$tos[0])<$e_d && $this->api->getdistance($e_tos[1]."|".$tos[1])<$e_d){
		   $d[]=$this->info_passenger($db,$r);
		  }
		}
		}else{
		foreach ($query->result_array() as $r){
		  $tos=explode("|",$r[toid]);
		   if($this->api->getdistance($e_id."|".$tos[$e_i])<$e_d){
		   $d[]=$this->info_passenger($db,$r);
		  }
		}
		}
		return $d;
	}
	public function s_rangenew($db,$query){
		$d="";
		$query=$db->query("select id,mobile,toid,oname,dname,people,totime,price,price_p,thank,pok,message from ".$db->dbprefix("passenger")." where sok=1 and totime>".time().$query);
		foreach ($query->result_array() as $r){
		   $d[]=$this->info_passenger($db,$r);
		}
		return $d;
	}
	public function maps($mobile,$id){
	  $code="";
	  $code[l_type]="g_maps";
	  $db=$this->usset->loginbase();
	  $show=$db->query("select toid,s_id from ".$db->dbprefix('order')." where  id=".$id)->result_array();
      $show=$show[0];
	  $code[toid]=$show[toid];
	  $show=$db->query("select toid from ".$db->dbprefix('order')." where sok=1 and id!=".$id." and  s_id=".$show[s_id])->result_array();
      if($show[0][toid]){$code[toid].="|".$show[0][toid];}
	  return json_encode($code);
	}
	public function o($mobile,$id){
	  $db=$this->usset->ownerbase();
	  $this->load->sqlLayer("order/ownerin");
	  $code=$this->ownerin->order($db,$mobile,$id);
	  if($code[id]==""){return $this->api->codeok(array(kname=>"行程可能已删除",index=>2));}
	  $code[l_type]="mostrokeshow";
	  return json_encode($code);
	}
	public function c($mobile,$id){
	  $code="";
	  $db=$this->usset->ownerbase();
	  $query_top="id,oname,dname,totime,status,toid,people,totime";
	  $show=$db->query("select ".$query_top." from ".$db->dbprefix('driver')." where mobile='".$mobile."' and id=".$id)->result_array();
      $show=$show[0];
	  $code[name]='正在寻找乘客';
	  $code[id]=$show[id];
	  $code[l_type]="g_ld";
	  $code[htm]=$this->api->anc($show,1);
      $code[name]=$code[name].'<div class="tit_r"  cid="'.$show[id].'" keyname="1002" onclick="morun(this);">取消订单</div>';
	  return json_encode($code);
	}
	public function p($mobile,$id){
	  $code="";
	  $db=$this->usset->ownerbase();
	  $show=$db->query("select people from ".$db->dbprefix('stroke')." where mobile='".$mobile."' and id=".$id)->result_array();
      $show=$show[0];
	  $rs=$db->query("select * from ".$db->dbprefix('order')." where s_mobile='".$mobile."' and s_id=".$id)->result_array();
      $rs=$rs[0];
	  if($rs[totime]<(time()-(60*60*24))){
	  return $this->api->codeok(array(kname=>"行程已结束",index=>2));
	  }elseif($rs[pay]!=0 or $rs[status]!=3 and $rs[totime]<(time()-(60*60*1))){
	  return $this->api->codeok(array(kname=>"行程已开始",index=>2));
	  }elseif($rs[people]==4 or $rs[pok]==0){
	  return $this->api->codeok(array(kname=>"不能拼单",index=>2));
	  }
	  $code[name]='正在寻找合适拼单';
	  $code[l_type]="g_ld";
	  $rs[pid]=$id;
	  $rs[people]=$show[people];
	  $code[htm]=$this->api->anc($rs,2);
	  return json_encode($code);
	}
	public function ld($mobile){
	  $pt=$_POST;
	  $db=$this->usset->ownerbase();
	  $code[l_type]="g_ldlist";
	  $code[l_list]="ostroke";
	  if($pt[toid]){
	  $moquery='';
	  $moquery.=$pt[mobile]?" and  pok=1 and  mobile!='".$pt[mobile]."'":"";
	  $moquery.=$pt[totime]?" and (totime>=".($pt[totime]-3600*3)." and totime<=".($pt[totime]+3600*3).")":"";
	  $moquery.=$pt[people]?" and  people<=".$pt[people]:"";
	  $moquery.=' order by totime asc,people desc';
	  $code[slist]=$this->s_range($db,$pt[toid],2,3," and mobile!='".$mobile."'".$moquery);
	  }else{
	  $moquery=' order by totime asc,people desc';
	  if($pt[oid]==1){
	  $code[slist]=$this->s_rangenew($db," and mobile!='".$mobile."'".$moquery);
	  }else{
	  $code[slist]=$this->s_range($db,$pt[oid],0,5," and mobile!='".$mobile."'".$moquery);
	  }
	  }
	  return json_encode($code);
	}
	public function yjlby($mobile){
	  $pt=$_POST;
	  $code="";
	  $db=$this->usset->loginbase();
	  $code[name]="接单记录";
	  $code[l_type]="g_yjlby";
	  $code[slist]=$this->api->myorder($db," where s_mobile='".$mobile."'");
	  return json_encode($code);
	}
	public function s_show($mobile,$id){
     $pt=$_POST;
     $db=$this->usset->ownerbase();
     $show=$db->query("select * from ".$db->dbprefix("passenger")." where mobile!='".$mobile."' and  id=".$id)->result_array();
     $show=$show[0];
	 $code="";
	 $code[l_type]="o_moshow";
	 $code[id]=$show[id];
	 $tos=explode("|",$show[toid]);
	 $show[price]=number_format($show[price]+$show[thank],1);
	 if($show[pok]==1){
	 $show[price_p]=number_format($show[price_p]+$show[thank],1);
     }else{
	 $show[price_p]="";
	 }
	   $top="";
	   $top[todate]=$this->api->listdate($show[totime]);
	   $top[people]=$show[people];
	   $top[pok]=$show[pok];
	   if($show[message]){$top[message]=$show[message];}
	 $code[top]=$top;
	 $tos=explode("|",$show[toid]);
	 $code[cd]=array(o=>array(name=>$show[oname],oid=>$tos[0]),d=>array(name=>$show[dname],oid=>$tos[1])
	,r=>array(price=>$show[price],price_p=>$show[price_p],thank=>$show[thank]));
	 $user=$this->api->suser($db,$show[mobile],"callname,avatarid,cint");
	 $user[d]=$user[cint]>0?"出行 <span>".$user[cint]."</span> 次":"首次出行";
	 $code[usdbox]=array(us=>$user);
	 return json_encode($code);
	}
	public function setus($mobile){
	 $db=$this->usset->ownerbase();
	 $show=$db->query("select callname,avatarid,price,sint from ".$db->dbprefix("user")." where mobile='".$mobile."'")->result_array();
	 $code=$show[0];
	 $code[mobile]=$mobile;
	 $code[mobilem]=substr($code[mobile],0,3)."****".substr($code[mobile],-4);
	 $code[orderrows]=$code[sint];
	 $infolist=$db->query("select id,title,keywords,content from ".$db->dbprefix("info")." where sok=1 and sid=1  order by sort desc,id desc")->result_array();
	 $code[infolist]=$infolist;
	 $code[l_type]="g_setshow";
	 return json_encode($code);
	}
	public function s_user($mobile){
	  $pt=$_POST;
	  $db=$this->usset->database(2);
	  $this->load->sqlLayer("sfc/userloin");
	  $code= $this->userloin->run_login($db,$pt[mobile],$pt[vcode]);
	  $code[l_type]="code_mobile";
	  return json_encode($code);
	}
	public function s_user_e($mobile){
	   $pt=$_POST;
	   $db=$this->usset->ownerbase();
	   if($_COOKIE['vid']){
	   $db->where('id',$_COOKIE['vid']);
	   $db->update('user',array(oid=>$pt[oid],oname=>$pt[oname]));
	   }
	}
	public function s_user_owner($mobile){
	   $pt=$_POST;
	   $db=$this->usset->ownerbase();
	   $db->where('mobile',$mobile);
	   $db->update('userowner',array(did=>$pt[did],dname=>$pt[dname]));
	}
	public function stroke_add($mobile,$id){
      if(preg_match("/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$|17[0-9]{1}[0-9]{8}$/",$mobile)){
	  $db=$this->usset->ownerbase();
      if($db->query("select id from ".$db->dbprefix('order')." where s_mobile='".$mobile."' and sok=3 and s_atime>".strtotime(date("Y-m-d"))."  and s_atime<".strtotime(date("Y-m-d 23:59:59")))->num_rows()>2){
		  return $this->api->code("今天您取消行程次数过多，明天才能正常接单了");
	  }
	  $us=$db->query("select price,sok from ".$db->dbprefix('user')." where  mobile='".$mobile."'")->result_array();
	  if($us[0][sok]!=1){return $this->api->code("您的手机号已冻结，请联系客服");}
	  $us_price=$us[0][price];
	  if($us_price<0){return $this->api->pricecode($us_price);}
	  $this->load->sqlLayer("sfc/stroke");
	  $pt=$_POST;
	  if($pt[pid]){
	  return $this->api->codeok($this->stroke->add_stroke($db,$mobile,$pt[pid],$id,1));
	  }else{
	  $pt[did]=$pt[did]?$pt[did]:0;
	  return $this->api->codeok($this->stroke->add_stroke($db,$mobile,$pt[did],$id,0));
	  }
      }
	}
	public function logout($mobile){
	   $this->load->sqlLayer("sfc/userloin");
       $this->userloin->logout();
	   return json_encode(array(l_type=>"lochref"));
	}
}
?>