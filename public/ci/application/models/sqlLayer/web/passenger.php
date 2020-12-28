<?php
class Passenger extends CI_Model {
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
	public function clist($db,$mobile){
		$query_top="id,oname,dname,totime,sok";
		$query="select ".$query_top." from ".$db->dbprefix('passenger')." where mobile='".$mobile."' and sok=1 and totime>".time()." order by atime desc";
		$query=$db->query($query);
		foreach ($query->result_array() as $rs){
		  $da="";
		  $da[kkey]="c_".$rs[id];
		  $da[o]=array(name=>$rs[oname]);
		  $da[d]=array(name=>$rs[dname]);
		  $da[todate]=$this->api->listdate($rs[totime]);
		  $da[status_name]="正在寻找车主";
		  $d[]=$da;
		}
		$d=$this->api->cwaitlist($d,$db,"where mobile='".$mobile."' and sok=1 and ((pay!=0 and totime>".(time()-3600*2).") or pay=0) order by atime desc");
		if($d){return $d;}
		$d=$this->api->cwaitlist($d,$db,"where mobile='".$mobile."' and sok!=1 and totime>".(time()-3600)."  order by atime desc");
		return $d;
	}
	public function index($mobile){
	  $db=$this->usset->database(2);
	  $code="";
	  $code[l_type]="p_waitlist";
	  $code[clist]=$this->clist($db,$mobile);
	  return json_encode($code);
	}
	
	public function monitor($mobile){
	  $db=$this->usset->database(2);
	  return $this->api->pro($db,$mobile,0);
	}
	
	public function prompt($mobile){
	  $pt=$_POST;
	  $code="";
	  $db=$this->usset->loginbase();
	  $code[name]="系统信息";
	  $code[l_type]="g_prompt";
	  foreach ($db->query("select * from ".$db->dbprefix("uspro")." where mobile='".$mobile."' and h=0 order by adate desc  limit 0,20")->result_array() as $rs){
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
	public function info_driver($db,$show){
	  $info="";
	  $info[id]=$show[id];
	  $tos=explode("|",$show[toid]);
	  $show[price]=number_format($show[price]+$show[thank],1);
	  if($show[pok]==1){
	  $show[price_p]=number_format($show[price_p]+$show[thank],1);
	  }
	  /*头*/
	   $top="";
	   $top[todate]=$this->api->listdate($show[totime]);
	   $top[kpeople]=$show[people];
	   if($show[message]){$top[message]=$show[message];}
	  $info[top]=$top;
	  $info[cd]=array(o=>array(name=>$show[oname],oid=>$tos[0]),d=>array(name=>$show[dname],oid=>$tos[1])
	  ,r=>array(sld=>92));
	  $user=$this->api->suser($db,$show[mobile],"callname,avatarid");
	  $info[yelr]=array(us=>$user,r=>array(t=>'<div class="pkrof">请他接我</div>'));
	  return  $info;
	}
	public function s_range($db,$e_id,$e_i=0,$e_d=5,$query){
		$d="";
		$query=$db->query("select id,mobile,toid,oname,dname,people,totime from ".$db->dbprefix("driver")." where sok=1 and totime>".time().$query);
		if($e_i==2){
		$e_tos=explode("|",$e_id);
		foreach ($query->result_array() as $r){
		  $tos=explode("|",$r[toid]);
		   if($this->api->getdistance($e_tos[0]."|".$tos[0])<$e_d && $this->api->getdistance($e_tos[1]."|".$tos[1])<$e_d){
		   $d[]=$this->info_driver($db,$r);
		  }
		}
		}else{
		foreach ($query->result_array() as $r){
		  $tos=explode("|",$r[toid]);
		   if($this->api->getdistance($e_id."|".$tos[$e_i])<$e_d){
		   $d[]=$this->info_driver($db,$r);
		  }
		}
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
	  $db=$this->usset->loginbase();
	  $this->load->sqlLayer("order/showin");
	  $code=$this->showin->order($db,$mobile,$id);
	  if($code[id]==""){return $this->api->codeok(array(kname=>"行程可能已删除",index=>2));}
	  $code[l_type]="show_passenger";
	  return json_encode($code);
	}
	public function c($mobile,$id){
	  $db=$this->usset->loginbase();
	  $show=$db->query("select * from ".$db->dbprefix('passenger')." where mobile='".$mobile."' and id=".$id)->result_array();
      $show=$show[0];
	  if($show[sok]==0){
	  $rs=$db->query("select id from ".$db->dbprefix('order')." where mobile='".$mobile."' and atime=".$show[atime]." order by s_atime desc")->result_array();
	  $id=$rs[0][id];
	  return $this->api->codeok(array(kname=>"行程已被司机接走",orderid=>$id));
	  }
	  $code="";
	  $code[name]="查询顺路车主";
	  $tos=explode("|",$show[toid]);
	  $code[oid]=$tos[0];
	  $code[did]=$tos[1];
	  $code[oname]=$show[oname];
	  $code[dname]=$show[dname];
	  $code[people]=$show[people];
	  $code[todate]=$this->api->listdate($show[totime]);
	  $code[l_type]="g_ld";
	  $code[htm]=$this->api->anc($show);
      $code[name]=$code[name].'<div class="tit_r"  cid="'.$show[id].'" keyname="1001" onclick="morun(this);">取消订单</div>';
	  return json_encode($code);
	}
	public function ld($mobile){
	  $pt=$_POST;
	  $code="";
	  $db=$this->usset->loginbase();
	  $code[l_type]="g_ldlist";
	  $code[l_list]="cstroke";
	  if($pt[toid]){
	  $moquery='';
	  $moquery.=$pt[totime]?" and (totime>=".($pt[totime]-3600*3)." and totime<=".($pt[totime]+3600*3).")":"";
	  $moquery.=$pt[people]?" and  people>=".$pt[people]:"";
	  $moquery.=' order by totime asc,people desc';
	  $code[slist]=$this->s_range($db,$pt[toid],2,3," and mobile!='".$mobile."'".$moquery);
	  }else{
	  $moquery=' order by totime asc,people desc';
	  $code[slist]=$this->s_range($db,$pt[oid],0,5," and mobile!='".$mobile."'");
	  }
	  return json_encode($code);
	}
	public function yjlby($mobile){
	  $pt=$_POST;
	  $code="";
	  $db=$this->usset->loginbase();
	  $code[name]="乘车记录";
	  $code[l_type]="g_yjlby";
	  $code[slist]=$this->api->myorder($db," where mobile='".$mobile."'");
	  return json_encode($code);
	}
	public function price($e_price,$pt){
      $db=$this->usset->database(2);
      $rp=$db->query("select * from ".$db->dbprefix("fbp")." where sok=1 and wee=".date("w",$this->api->listdate($pt[totime],1))." and o<".date("Hi",$this->api->listdate($pt[totime],1))." and d>".date("Hi",$this->api->listdate($pt[totime],1)))->result_array();
      $rp=$rp[0];
	  if($rp==""){
      $rp=$db->query("select * from ".$db->dbprefix("fbp")." where id=1")->result_array();
      $rp=$rp[0];
	  }
	  if($pt[people]==1){
	  $v_price=number_format($e_price*$rp[fb_a],1);
	  }elseif($pt[people]==2){
	  $v_price=number_format($e_price*$rp[fb_b],1);
	  }elseif($pt[people]==3){
	  $v_price=number_format($e_price*$rp[fb_c],1);
	  }elseif($pt[people]==4){
	  $v_price=number_format($e_price*$rp[fb_d],1);
	  }else{
	  $v_price=number_format($e_price*$rp[fb_e],1);
	  }
	  return $v_price;	  
	}
	public function fbhq_p($mobile){
	  $pt=$_POST;
	  $pt[thank]=str_replace("感谢费","",$pt[thank]);
	  $pt[thank]=str_replace("元","",$pt[thank]);
	  $pt[thank]=(int)$pt[thank];
	  $rs= $this->api->route($pt[oid],$pt[did]);
	  $code[price]=$this->price($rs[distance],$pt);
	  $code[price_p]=number_format($code[price]*0.8,1);
	  $code[price]=number_format($code[price]+$pt[thank],1);
	  $code[price_p]=number_format($code[price_p]+$pt[thank],1);
	  return json_encode($code);
	}
	public function fbhq($mobile){
	  if($mobile<1){return $this->api->logcode();}
	  $pt=$this->api->anpt();
	  if($pt[0]==1){$pt=$pt[1];}else{return $pt[1];}
	  $db=$this->usset->loginbase();
      if($db->query("select id from ".$db->dbprefix('order')." where mobile='".$mobile."' and sok=2 and s_atime>".strtotime(date("Y-m-d"))."  and s_atime<".strtotime(date("Y-m-d 23:59:59")))->num_rows()>2){
		  return $this->api->code("今天您取消行程次数过多，今天发布不了行程了");
	  }
	  $us=$db->query("select price,sok from ".$db->dbprefix('user')." where  mobile='".$mobile."'")->result_array();
	  if($us[0][sok]!=1){return $this->api->code("您的手机号已冻结，请联系客服");}
	  $us_price=$us[0][price];
	  $ord=$db->query("select price from ".$db->dbprefix('order')." where  mobile='".$mobile."' and sok=1 and pay=0")->result_array();
	  $us_price=$us_price-$ord[0][price];
	  $ord=$db->query("select price from ".$db->dbprefix('passenger')." where  mobile='".$mobile."' and sok=1 and totime>".time())->result_array();
	  $us_price=$us_price-$ord[0][price];
	  if($us_price<0){return $this->api->pricecode($us_price);}
	  $d="";
	  $d[mobile]=$mobile;
	  $d[toid]=$pt[oid]."|".$pt[did];
	  $d[oname]=$pt[oname];
	  $d[dname]=$pt[dname];
	  $d[totime]=$this->api->listdate($pt[totime],1);
	  if($db->query("select id from ".$db->dbprefix("passenger")." where  mobile='".$mobile."' and sok=1  and (totime>=".($d[totime]-1800)." and totime<=".($d[totime]+1800).") and totime>".time())->num_rows()>0){
		return $this->api->code("与已存在行程出发时间间隔不得低于30分钟");
	  }
	  $d[people]=$pt[people];
	  $d[pok]=(int)$pt[pok];
	  $rs= $this->api->route($pt[oid],$pt[did]);
	  $d[price]=$this->price($rs[distance],$pt);
	  $d[price_p]=number_format($d[price]*0.8,1);
	  if($d[price]<5){return $this->api->code("行程太近了");} 
	  $d[distance]=$rs[distance];
	  $d[km]=$pt[km];
	  $d[thank]=$pt[thank];
	  $d[message]=$pt[message];
	  $d[sok]=1;
	  $d[atime]=time();
	  $db->insert("passenger",$d);
	  $r=$db->query("select id from ".$db->dbprefix("passenger")." where  mobile='".$mobile."'  order by atime desc limit 0,1")->result();
	  return json_encode(array(l_type=>"edit_fbhq",id=>$r[0]->id));
	}
	public function fbhqse($mobile,$id){
      $this->load->sqlLayer("set/email");
	  $db=$this->usset->loginbase();
	  foreach ($db->query("select email from ".$db->dbprefix('user')." where email<>'' and owner=1 order by udate desc limit 0,20")->result_array() as $rs){
		$this->email->email($rs[email],"有新乘客下单","order",$id);
	  }
	}
	public function s_owncancel($mobile,$id){
	  if($id==""){return $this->api->code("系统出错");}
	  $db=$this->usset->loginbase();
	  $show=$db->query("select id from ".$db->dbprefix("passenger")." where mobile='".$mobile."' and sok=1 and id=".$id)->result_array();
	  $show=$show[0];
	  if($show){
	  $db->where('id',$id);
	  $db->where('sok',1);
	  $db->where('mobile',$mobile);
	  $db->update('passenger',array(sok=>2));
	  return $this->api->codeok(array(kname=>"取消成功",index=>1));
	  }
	  return $this->api->codeok(array(kname=>"您的行程已被司机接了",orderid=>$id));
	}
	public function s_owncancel_info($mobile,$id){
	  if($id==""){return $this->api->code("系统出错");}
      $db=$this->usset->loginbase();
	  $this->load->sqlLayer("order/showin");
	  return $this->api->codeok( $code=$this->showin->order_cancel($db,$mobile,$id));
	}
	public function s_strokestatus($mobile,$id){
	  if($id==""){return $this->api->code("系统出错");}
      $db=$this->usset->loginbase();
	  $this->load->sqlLayer("order/showin");
	  return $this->api->codeok( $code=$this->showin->order_status($db,$mobile,$id));
	}
	
	public function s_show($mobile,$id){
	 if($id==""){return $this->api->code("已删除");}
     $pt=$_POST;
     $db=$this->usset->loginbase();
     $show=$db->query("select * from ".$db->dbprefix("driver")." where id=".$id)->result_array();
     $show=$show[0];
	  $code="";
	  $code[l_type]="p_moshow";
	  //$code[id]=$show[id];
	  $tos=explode("|",$show[toid]);
	  /*头*/
	  $top="";
	  $top[todate]=$this->api->listdate($show[totime]);
	  $top[kpeople]=$show[people];
	  if($show[message]){$top[message]=$show[message];}
	  $info[top]=$top;
	  $code[cd]=array(o=>array(name=>$show[oname],oid=>$tos[0]),d=>array(name=>$show[dname],oid=>$tos[1])
	  ,r=>array(sld=>92));
	  $user=$this->api->suser($db,$show[mobile],"callname,avatarid,sint");
	  $user[d]="接单 <span>".$user[sint]."</span> 次";
	  $code[usdbox]=array(us=>$user);
	 return json_encode($code);
	}
	public function setus($mobile){
	 $db=$this->usset->loginbase();
	 $show=$db->query("select callname,avatarid,price,cint from ".$db->dbprefix("user")." where mobile='".$mobile."'")->result_array();
	 $code=$show[0];
	 $code[mobile]=$mobile;
	 $code[mobilem]=substr($code[mobile],0,3)."****".substr($code[mobile],-4);
	 $code[orderrows]=$code[cint];
	 $infolist=$db->query("select id,title,keywords,content from ".$db->dbprefix("info")." where sok=1 and sid=1  order by sort desc,id desc")->result_array();
	 $code[infolist]=$infolist;
	 $code[l_type]="g_setshow";
	 return json_encode($code);
	}
	public function s_user($mobile){
	  $pt=$_POST;
	  $db=$this->usset->database(2);
	  $this->load->sqlLayer("sfc/userloin");
	  $code=$this->userloin->run_login($db,$pt[mobile],$pt[vcode]);
	  $code[l_type]="code_mobile";
	  return json_encode($code);
	}
	public function s_user_e($mobile){
	   $pt=$_POST;
		session_start();
		preg_match("/[\w\-]+\.\w+$/",$_SERVER["SERVER_NAME"], $arr);
		$lifeTime=(time()+3600*2);
		setcookie("posoid",$pt[oid],$lifeTime,"/",$arr[0]); 
		setcookie("posoname",$pt[oname],$lifeTime,"/",$arr[0]); 
	   $db=$this->usset->loginbase();
	   if($_COOKIE['vid']){
	   $db->where('id',$_COOKIE['vid']);
	   $db->update('user',array(oid=>$pt[oid],oname=>$pt[oname]));
	   }
	}
	public function logout($mobile){
	   $this->load->sqlLayer("sfc/userloin");
       $this->userloin->logout();
	   return json_encode(array(l_type=>"lochref"));
	}
}
?>