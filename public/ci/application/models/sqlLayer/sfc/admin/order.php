<?php
class Order extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function slist_array($db,$rs){
	   $da="";	
	   $da[id]=$rs[id];	
		 $top="";
		 $top[todate]=$this->api->listdate($rs[totime]);
		 $top[people]=$rs[people];
		 if($db->query("select id from ".$db->dbprefix('order')." where sok=1 and s_id=".$rs[s_id])->num_rows()>1){
		 $top[pis]=1;
		 }
		if($rs[sok]==1){$top[pay]=$rs[pay];
		   if($top[pis]==1){
		  $rs[price]="";
		  $rs[price_p]=number_format($rs[price_p]+$rs[thank],1);
		   }else{
		  $rs[price]=number_format($rs[price]+$rs[thank],1);
		  $rs[price_p]="";
		   }
		}else{
		  $rs[price]="";
		  $rs[price_p]="";
		}
	   $da[top]=$top;
	   $da[cd]=array(o=>array(name=>$rs[oname]),d=>array(name=>$rs[dname]),r=>array(price=>$rs[price],price_p=>$rs[price_p],thank=>$rs[thank]));
	   $scsok=$this->api->myorder_info($rs);
	   $da[txt]=$scsok[t];
	   if($rs[sok]==1 and $rs[pay]==0){
	   $da[txt].='<div class="pkrof pkrosl"  onClick="adfirm(this);" ks="order" kn="pay" kdd="'.$rs[pay].'" kid="'.$rs[id].'" style=" float:right; margin:0px;line-height:20px;height:20px;">未支付</div>';
	   }
	   $da[user]=$this->api->suser($db,$rs[mobile],"mobile,callname");
	   $da[s_user]=$this->api->suser($db,$rs[s_mobile],"mobile,callname");
      return $da;
	}
	public function slist($db,$pt){
	  $d="";
	  $d[ssurl]=$pt[ssurl];
	  $query="select * from ".$db->dbprefix('order')." where id!=0";
	  $query.=$pt['sskey']?" and (oname like '%".$pt['sskey']."%' or dname like '%".$pt['sskey']."%' or mobile like '%".$pt['sskey']."%' or s_mobile like '%".$pt['sskey']."%')":"";
	  $query.=$pt['pay']<>''?" and pay=".$pt['pay']:"";
	  $query.=$pt['sok']<>''?" and sok=".$pt['sok']:"";
	  $pt[query]=$query;
	  $pt[p_orderby]=$pt['p_orderby']?$pt['p_orderby']:"atime desc,id desc";
	  $d=$this->usset->qylist($db,$pt);
	  $d[ssurl]=$pt[ssurl];
	  $d[p_url]='ad_url(#);';
	  $clist=$d['clist'];
	  $d['clist']="";
	  foreach ($clist as $rs){
		 $d['clist'][]=$this->slist_array($db,$rs);
	  }
	  return $d;
	  
	}
	public function clist($db){
	  $code="";
	  $code[l_type]="ad_l";
	  $code[l_code]="order";
	  $code[l_sskey]=1;
	  $code[l_radio][]=array(c=>"a",s=>"pay",d=>array(array(0,'未支付'),array(2,'司机收款'),array(1,'系统支付')),v=>0);
	  $code[l_radio][]=array(c=>"a",s=>"sok",d=>array(array(1,'正常'),array(0,'系统取消'),array(2,'乘客取消'),array(3,'司机取消')),v=>1);
		foreach ($db->query("select * from ".$db->dbprefix('order')." where sok=1 and  pay=0 order by atime desc  limit 0,20")->result_array() as $rs){
		   $code['clist'][]=$this->slist_array($db,$rs);
		}
	  return json_encode($code);
	}
	public function pay($db,$pt){
	 $id=$pt[id];
	 if($db->query("select id from ".$db->dbprefix('order')." where sok=1 and pay=0 and id=".$id)->num_rows()==1){
	 $db->where('id',$id);
	 $db->update('order',array(pay=>1));
	 return json_encode(array(l_type=>"adcode",kname=>"支付成功",u=>'s_order'));
	 }
	}
}
?>