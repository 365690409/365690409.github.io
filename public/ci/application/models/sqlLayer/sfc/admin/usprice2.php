<?php
class Usprice2 extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	public function slist_teb($clist){
	  $d='<table width="'.(strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false?'600':'100%').'" border="0" cellspacing="0" cellpadding="0" class="ssformcont">';
	  $d.='<tr><th>ID</th><th>订单ID</th><th>乘客</th><th>司机</th><th>价格</th><th>油费</th><th>服务费</th><th>类型</th><th>时间</th></tr>';
	  foreach ($clist as $rs){
	  $d.='<tr>';
	  $d.='<td>'.$rs[id].'</td><td>'.$rs[oid].'</td><td>'.$rs[cuid].':'.$rs[cmobile].'</td><td>'.$rs[suid].':'.$rs[cmobile].'</td><td>'.$rs[price].'</td><td>'.$rs[sprice].'</td><td>'.$rs[aprice].'</td><td>'.$rs[way].'</td><td>'.date("m月d日 H:i",$rs[atime]).'</td>';
	  $d.='</tr>';
	  }
	  $d.='</table>';
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