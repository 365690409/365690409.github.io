<script>
<?php
//include ("ya.php");
?>
mosfc.index=function (){
 $(".popby_index").html('<div class="ywhtop"></div><div style=" height:80px;"></div><div class="mofm10"><div class="index_waitorder"></div></div>');
};
function turl(kkeys){
  $yh.turl(kkeys);
  ad_dh();
}
function ad_dh(){
  $(".ywnav .sd").removeClass("sd");
  kkeys=$yh.iurl();
  kkeys=kkeys.split("-");
  kkeys=kkeys[0]?kkeys[0]:"index";
  $(".ywnav_u_"+kkeys).addClass("sd");
}
function ad_index(){
  mosfc.index();
  $yh.surl();
  $(".ywhtop").html($yw.bnav({l:1,r:2,z:{g:'后台管理'}})+$yw.bnav({r:4,c:[{n:'用户列表',u:'index'},{n:'行程列表',u:'s_order'},{n:'设置',u:'s_site_1'},{n:'价格控制',u:'s_fbp'},{n:'信息列表',u:'s_info'},{n:'账单流水',u:'s_usprice'},{n:'账单数据表',u:'s_usprice2'}]}));
  ad_dh();
}
function adbut(cthis){
  $yh.sfpost("etus",$(cthis).parents("form").serialize());
}
function adfirm(cthis){
   $yw.ppt_tscall({t:'<div style="width:250px; text-align:center;">请选择是否确认</div>',u:'etus',d:{yk_code:'eit_r',yk_s:$(cthis).attr("ks"),yk_n:$(cthis).attr("kn"),kdd:$(cthis).attr("kdd"),id:$(cthis).attr("kid")},call:function(ywmsg){if(ywmsg.ok==1){$yw.ywpost(ywmsg);}}});
}
$yk.llist=function (yklrs){
  switch (yklrs.yk_s) {
	  case "aduser":
	    yklrs_htm='<div class="fmbox"><div class="mofm10 mobm">';
	    yklrs_htm+=' <div class="myuserbox"><div class="myuserbox_img avatar avatar_'+yklrs.avatarid+'"></div>';
		if(yklrs.numberplate){
	    yklrs_htm+='<div class="myuserbox_ne"><div class="pkrog'+(yklrs.owner==1?' pkrosl':' pkrono')+'" onClick="adfirm(this);" ks="user" kn="owner" kdd="'+yklrs.owner+'" kid="'+yklrs.id+'">'+yklrs.numberplate+'</div></div>';
		}
	    yklrs_htm+='<div class="myuserbox_ad">';
	    yklrs_htm+='<div class="pkrog'+(yklrs.sok==1?' pkrosl':' pkrono')+'"  onClick="adfirm(this);" ks="user" kn="sok" kdd="'+yklrs.sok+'" kid="'+yklrs.id+'">开启</div>';
	    yklrs_htm+='<div class="clear6"></div>';
	    yklrs_htm+='<div class="pkrog" onClick="turl(\'e_user_'+yklrs.id+'\');">修改</div>';
		
	    yklrs_htm+='</div>';
	    yklrs_htm+='<div class="myuserbox_txt">';
	    yklrs_htm+='<div class="myuserbox_txt_t">'+yklrs.callname+' ￥'+yklrs.price+' <span onClick="gurl(\'p_user_'+yklrs.id+'\');">充值</span></div>';
	    yklrs_htm+='<div class="myuserbox_txt_s">'+yklrs.mobile+' 出行'+yklrs.cint+'次</div>';
	    yklrs_htm+='</div></div>';
	    yklrs_htm+='</div></div><div class="clear10"></div>';
		return yklrs_htm;
       break;
	  case "adfbp":
	    yklrs_htm='<div class="fmbox"><div class="mofm10 mobm">';
	    yklrs_htm+='<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td>';
		if(yklrs.id==1){
	    yklrs_htm+='<div class="monc"><div class="monc_mark monc_mark_o"></div><div class="monc_tit">全局</div></div>';
		}else{
	    yklrs_htm+='<div class="monc"><div class="monc_mark monc_mark_o"></div><div class="monc_tit">周'+yklrs.wee+' 从'+yklrs.o+'至'+yklrs.d+' </div></div>';
		}
	    yklrs_htm+='<div class="monc"><div class="monc_mark monc_mark_d"></div><div class="monc_tit"> '+yklrs.fb_a+'&nbsp;/'+yklrs.fb_b+'&nbsp;/'+yklrs.fb_c+'&nbsp;/'+yklrs.fb_d+'&nbsp;/'+yklrs.fb_e+'</div></div>';
		
	    yklrs_htm+='</td><td width="50"><div class="pkrog'+(yklrs.sok==1?' pkrosl':' pkrono')+'"  onClick="adfirm(this);" ks="fbp" kn="sok" kdd="'+yklrs.sok+'" kid="'+yklrs.id+'">开启</div></td><td width="8"></td><td width="50"><div class="pkrog" onClick="jurl(\'e_fbp_'+yklrs.id+'\');">修改</div></td></tr></table>';
	    yklrs_htm+='</div></div><div class="clear10"></div>';
		return yklrs_htm;
       break;
	  case "adinfo":
	    yklrs_htm='<div class="fmbox"><div class="mofm10 mobm">';
	    yklrs_htm+='<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td>';
	    yklrs_htm+='<div class="monc"><div class="monc_mark monc_mark_o"></div><div class="monc_tit">'+yklrs.title+'</div></div>';
	    yklrs_htm+='</td><td width="50"><div class="pkrog'+(yklrs.sok==1?' pkrosl':' pkrono')+'"  onClick="adfirm(this);" ks="info" kn="sok" kdd="'+yklrs.sok+'" kid="'+yklrs.id+'">开启</div></td><td width="8"></td><td width="50"><div class="pkrog" onClick="jurl(\'e_info_'+yklrs.id+'\');">修改</div></td></tr></table>';
	    yklrs_htm+='</div></div><div class="clear10"></div>';
		return yklrs_htm;
       break;
	  case "adusprice":
		return '<div class="fmbox"><div class="mofm10 mobm"><div class="adr"><div class="adrbox ectab">'+yklrs.d+'</div></div></div></div>';
       break;
	  case "adorder":
	   var syethm='';
	   syethm+=$ye.hfm($ye.kyerow(yklrs.top),"8 mobm");
	   syethm+=$ye.hfm($ye.kyerow({cd:yklrs.cd}),"8 mobm");
	   syethm+='<div class="mofm8"><div style="float:right;">'+yklrs.user.callname+'<a href="tel:'+yklrs.user.mobile+'">'+yklrs.user.mobile+'</a>(乘客)</div>'+yklrs.s_user.callname+'<a href="tel:'+yklrs.s_user.mobile+'">'+yklrs.s_user.mobile+'</a>(司机)</div>';
	   syethm+=$ye.hfm($ye.kyerow({txt:yklrs.txt}),8);
	   return '<div class="yebox">'+syethm+'</div><div class="clear10"></div>';
       break;
  }
};
function ad_url(ad_p_page){
	$(".ssform input[name='p_page']").val(ad_p_page);
	ad_clistform();
}
function ad_clistform(){
	yumoval_i++;
	$(".fbhq_spoi_cont").html('<div class="yumoval_i'+yumoval_i+'"></div>');
   $.post(website.json_url+"slist/",$(".ssform").serialize(),function(tdata){
	 if(tdata){$yh.sfthm(eval("("+tdata+")"));}
	});
}
function sfthm_o(sfmsg){
  switch (sfmsg.l_type) {
	case "ad_l": 
	ahtml='<form class="ssform" method="post">';
	ahtml+='<input type="hidden" name="ssurl" value="'+sfmsg.l_code+'" />';
	ahtml+='<input type="hidden" name="p_page" value="'+(sfmsg.p_page?sfmsg.p_page:1)+'" />';
	ahtml+='<input type="hidden" name="p_row" value="'+(sfmsg.p_row?sfmsg.p_row:20)+'" />';
	ahtml+='<div class="ssformin fmbox">';
	ahtml+=sfmsg.l_sskey?'<div class="mofm8"><input class="sskey" type="text" name="sskey" value="'+(sfmsg.sskey?sfmsg.sskey:'')+'" placeholder="请输入关键词" /></div>':'';
	ahtml+=sfmsg.l_htm?'<div class="mofm8">'+sfmsg.l_htm+'</div>':'';
	if(sfmsg.l_radio){
	for(rm in sfmsg.l_radio){
	ahtml+='<div class="mofm8">'+$ya.pkradio(sfmsg.l_radio[rm])+'</div>';
	}
	}
	ahtml+='</div><div class="clear10"></div>';
	ahtml+='<div class="ssformcont">'+$yk.sshow(sfmsg.clist,'ad'+sfmsg.l_code)+(sfmsg.p_total?$yh.hpage(sfmsg.p_url,sfmsg.p_total,sfmsg.p_page,sfmsg.p_row):'')+'</div>';
	ahtml+='</form>';
	$yu.ppindex(ahtml);
	yumoval_i=0;
	$('.sskey').on('input propertychange',function(){
	ad_clistform();	
	}); 	  
    break;
  case "ad_slist":
   $(".ssformcont").html($yk.sshow(sfmsg.clist,'ad'+sfmsg.ssurl)+$yh.hpage(sfmsg.p_url,sfmsg.p_total,sfmsg.p_page,sfmsg.p_row));
   break;
  case "ad_e": 
    thtm='<form method="post" οnsubmit="return false;"><input type="hidden" name="id" value="'+sfmsg.id+'">';
    thtm+='<input type="hidden" name="yk_s" value="'+sfmsg.l_code+'">';
    thtm+=$yk.htbputbox(sfmsg.inp);
    thtm+=sfmsg.inpb?'<div class="clear10"></div>'+$yk.htbputbox(sfmsg.inpb):'';
    thtm+='<div class="clear50"></div><div class="clear50"></div><div class="ppfdbottom"><div class="mofm16"><div class="pkbut pkbutsd" onClick="adbut(this);">'+sfmsg.l_but+'</div></div></div>';
    thtm+='</form>';
	$yu.ppshow(sfmsg.l_tit,thtm);
   break;
  case "ad_p": 
    thtm='<form id="fromuser" method="post"><div class="mofm16"><input type="hidden" name="id" value="'+sfmsg.id+'">';
    thtm+='<input type="hidden" name="yk_code" value="eit_p">';
    thtm+='<input type="hidden" name="yk_s" value="'+sfmsg.l_code+'">';
    thtm+=$yk.htbputbox(sfmsg.inp);
    thtm+=sfmsg.inpb?'<div class="clear10"></div>'+$yk.htbputbox(sfmsg.inpb):'';
    thtm+='</div><div class="mofm16"><div class="pkbut pkbutsd" onClick="adbut(this);">'+sfmsg.l_but+'</div></div>';
    thtm+='</form>';
   $yu.popcont({d:thtm});
   break;
  case "adcode": 
      if(sfmsg.kname){$yw.ppt_txt(sfmsg.kname);}
      if(sfmsg.probox==1){$(".moprobox").remove();}
      if(sfmsg.index==1){turl('userlist');}
      if(sfmsg.u){turl(sfmsg.u);}
   break;
  }
};
