<?php
class Usprice extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function slist_teb($clist){
	  foreach ($clist as $rs){
	  if($rs[way]==1){
	  $d.='<div class="ecadlt">';
	  $d.='<div class="ecadlt_li"><div class="ecadlt_fr">ID：'.$rs[id].'</div>乘客支付</div>';
	  $d.='<div class="ecadlt_li2"><div class="ecadlt_fr">订单号：'.$rs[oid].'</div>价格：'.$rs[price].'</div>';
	  $d.='<div class="ecadlt_li2"><div class="ecadlt_fr">油费：'.$rs[sprice].'</div>服务费：'.$rs[aprice].'</div>';
	  $d.='<div class="ecadlt_li2"><div class="ecadlt_fr">乘客：'.$rs[cmobile].'</div>司机：'.$rs[smobile].'</div>';
	  $d.='<div class="ecadlt_li2"><div class="ecadlt_fr">'.$rs[price].'</div>'.date("m月d日 H:i",$rs[atime]).'</div>';
	  $d.='</div>';
	  }elseif($rs[way]==2){
	  $d.='<div class="ecadlt">';
	  $d.='<div class="ecadlt_li"><div class="ecadlt_fr">ID：'.$rs[id].'</div>,司机收款</div>';
	  $d.='<div class="ecadlt_li2"><div class="ecadlt_fr">订单号：'.$rs[oid].'</div>价格：'.$rs[price].'</div>';
	  $d.='<div class="ecadlt_li2"><div class="ecadlt_fr">油费：'.$rs[sprice].'</div>服务费：'.$rs[aprice].'</div>';
	  $d.='<div class="ecadlt_li2"><div class="ecadlt_fr">乘客：'.$rs[cmobile].'</div>司机：'.$rs[smobile].'</div>';
	  $d.='<div class="ecadlt_li2"><div class="ecadlt_fr">'.$rs[price].'</div>'.date("m月d日 H:i",$rs[atime]).'</div>';
	  $d.='</div>';
	  }elseif($rs[way]==3){
	  $d.='<div class="ecadlt">';
	  $d.='<div class="ecadlt_li"><div class="ecadlt_fr">'.$rs[cuid].'转'.$rs[suid].'</div>用户转账</div>';
	  $d.='<div class="ecadlt_li2"><div class="ecadlt_fr">'.$rs[price].'</div>'.date("m月d日 H:i",$rs[atime]).'</div>';
	  $d.='</div>';
	  }else{
	  $d.='<div class="ecadlt">';
	  $d.='<div class="ecadlt_li"><div class="ecadlt_fr">'.$rs[cuid].'</div>系统充值</div>';
	  $d.='<div class="ecadlt_li2"><div class="ecadlt_fr">'.$rs[price].'</div>'.date("m月d日 H:i",$rs[atime]).'</div>';
	  $d.='</div>';
	  }
	  $d.='<div class="clear3"></div>';
	  
	  }
	  $cd="";
	  return array(array(d=>$d));
	}
	public function slist($db,$pt){
	  $query="select * from ".$db->dbprefix('usprice')." where id!=0";
	  $query.=$pt['way']<>""?" way sok=".$pt['way']:"";
	  $pt[query]=$query;
	  $pt[p_orderby]=$pt['p_orderby']?$pt['p_orderby']:"id desc";
	  $d=$this->usset->qylist($db,$pt);
	  $d[ssurl]=$pt[ssurl];
	  $d[p_url]='ad_url(#);';
	  $clist=$d['clist'];
	  $d['clist']=$this->slist_teb($clist);
	  return $d;
	}
	public function clist($db,$page=1,$gt=""){
	  $gts=explode("%3E",$gt);
	  $pt="";
	  $pt[p_page]=$page?$page:1;
	  $pt[p_row]=20;
	  $code=$pt;
	  $code[l_type]="ad_l";
	  $code[l_code]="usprice";
	  $code[l_radio][]=array(c=>"a",s=>"way",d=>array(array(1,'乘客支付'),array(2,'司机收款')),v=>1);
	  $sqyd=$this->slist($db,$pt);
	  $code[clist]=$sqyd[clist];
	  $code[p_total]=$sqyd[p_total];
	  $code[p_url]='ad_url(#);';
	  $code[p_page]=$sqyd[p_page];
	  $code[p_row]=$sqyd[p_row];
	  return json_encode($code);
	}
}
?>