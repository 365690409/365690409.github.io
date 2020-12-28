<?php
class User extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function slist($db,$pt){
	  $d="";
	  $d[ssurl]=$pt[ssurl];
	  $query="select * from ".$db->dbprefix('user')." where id>1";
	  $query.=$pt['sskey']?" and (mobile like '%".$pt['sskey']."%' or callname like '%".$pt['sskey']."%' or numberplate like '%".$pt['sskey']."%')":"";
	  $query.=$pt['owner']<>''?" and owner=".$pt['owner']:"";
	  $query.=$pt['sok']<>''?" and sok=".$pt['sok']:"";
	  $pt[query]=$query;
	  $pt[p_orderby]=$pt['p_orderby']?$pt['p_orderby']:"adate desc,id desc";
	  $d=$this->usset->qylist($db,$pt);
	  $d[ssurl]=$pt[ssurl];
	  $d[p_url]='ad_url(#);';
	  return $d;
	}
	public function clist($db){
	  $code="";
	  $code[l_type]="ad_l";
	  $code[l_code]="user";
	  $code[l_sskey]=1;
	  $code[l_htm]='';
	  $code[l_radio][]=array(c=>"a",s=>"owner",d=>array(array(0,'乘客'),array(1,'司机')));
	  $code[l_radio][]=array(c=>"a",s=>"sok",d=>array(array(0,'停止'),array(1,'开启')),v=>1);
	  $db=$this->usset->database(2);
	  $clist="";
	  foreach ($db->query("select * from ".$db->dbprefix('user')." where sok=1 order by price,adate desc")->result_array() as $rs){
		$clist[]=$rs;
	  }
	  $code[clist]=$clist;
	  return json_encode($code);
	}
	public function show($db,$id){
	 $show=$db->query("select * from ".$db->dbprefix("user")." where id=".$id)->result_array();
	 $show=$show[0];
	 $code="";
	 $code[id]=$show[id];
	 $inp="";
	 $inp[]=array(t=>"名称",n=>"callname",v=>$show[callname]);
	 $inp[]=array(t=>"邮箱",n=>"email",v=>$show[email]);
	 $inp[]=array(t=>"状态",v=>$show[sok]);
	 $code[inp]=$inp;
	 $inpb="";
	 $inpb[]=array(t=>"司机状态",n=>"owner",v=>$show[owner]);
	 $inpb[]=array(t=>"服务率",n=>"fee",v=>$show[fee]=="0.00"?0:$show[fee]);
	 $inpb[]=array(t=>"车牌号",n=>"numberplate",v=>$show[numberplate]);
	 $inpb[]=array(t=>"车款",n=>"ownertxt",v=>$show[ownertxt]);
	 $code[inpb]=$inpb;
	 $code[l_type]="ad_e";
	 $code[l_code]="user";
	 $code[l_but]="确认修改";
	 return json_encode($code);
	}
	public function pshow($db,$id){
	 $show=$db->query("select * from ".$db->dbprefix("user")." where id=".$id)->result_array();
	 $show=$show[0];
	 $code="";
	 $code[id]=$show[id];
	 $inp="";
	 $inp[]=array(t=>"名称",v=>$show[callname]);
	 $inp[]=array(t=>"额度",v=>$show[price]);
	 $inp[]=array(t=>"充值",n=>"recharge",v=>"");
	 $code[inp]=$inp;
	 $code[l_type]="ad_p";
	 $code[l_code]="user";
	 $code[l_but]="确认充值";
	 return json_encode($code);
	}
	public function edit($db,$pt){
	 $id=$pt[id];
	 $d="";
	 $d['callname']=$pt['callname'];
	 $d['email']=$pt['email'];
	 $d['fee']=$pt['fee'];
	 $d['owner']=$pt['owner'];
	 $d['numberplate']=$pt['numberplate'];
	 $d['ownertxt']=$pt['ownertxt'];
	 $db->where('id',$id);
	 $db->update('user',$d);
	 return json_encode(array(l_type=>"adcode",kname=>"修改成功",u=>'index'));
	}
	public function owner($db,$pt){
	 $id=$pt[id];
	 $db->where('id',$id);
	 $db->update('user',array(owner=>($pt[kdd]==1?0:1)));
	 return json_encode(array(l_type=>"adcode",kname=>($pt[kdd]==1?"停止":"开启"),u=>'index'));
	}
	public function sok($db,$pt){
	 $id=$pt[id];
	 $db->where('id',$id);
	 $db->update('user',array(sok=>($pt[kdd]==1?0:1)));
	 return json_encode(array(l_type=>"adcode",kname=>($pt[kdd]==1?"停止":"开启"),u=>'index'));
	}
	public function pedit($db,$pt){
	  $id=$pt[id];
	  $price=$pt[recharge];
	  if($price==""){return $this->api->code("请输入充值");}
	  if($id==1){
	  $db->query("update ".$db->dbprefix('user')." set price=price+".$price." where id=".$id);
	   $d="";
	   $d[cuid]=1;
	   $d[price]=$price;
	   $d[way]=0;
	   $d[atime]=time();
	   $db->insert("usprice",$d);		 
	  }else{
	  $db->query("update ".$db->dbprefix('user')." set price=price-".$price." where id=1");
	  $db->query("update ".$db->dbprefix('user')." set price=price+".$price." where id=".$id);
	   $d="";
	   $d[cuid]=1;
	   $d[suid]=$id;
	   $d[price]=$price;
	   $d[way]=3;
	   $d[atime]=time();
	   $db->insert("usprice",$d);		 
	  }
	  return json_encode(array(l_type=>"adcode",kname=>"充值成功",probox=>1,u=>'index'));
	}
}
?>