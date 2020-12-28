<script>
function sfthm_o(sfmsg){
  switch (sfmsg.l_type) {
  case "o_waitlist": <?php /*待处理订单列表*/ ?>
   $yk.hwait($yk.sshow(sfmsg.clist,'cwait')+$yk.sshow(sfmsg.olist,'owait'));
  break;
  case "o_moshow": <?php /*显示行程信息*/ ?>
  $yk.ppbm($yk.bstroke(sfmsg));
  break;
  case "mostrokeshow": <?php /*显示订单*/ ?>
  $yu.popbyshow('<input type="hidden" name="mrwebuul" value="o/'+sfmsg.id+'" /><div class="ordershow_'+sfmsg.id+'">'+mosfc.o_showorder(sfmsg)+'</div>');
  $yk.ibodybg(sfmsg.by);
  break;
  }
}
function ykownerllist(yklrs){
  switch (yklrs.yk_s) {
   case "ostroke":<?php /*司机-确认同行列表*/ ?>
   var syethm='';
   syethm+=$ye.hfm($ye.kyerow(yklrs.top),"8 mobm");
   syethm+=$ye.hfm($ye.kyerow({cd:yklrs.cd}),"8 mobm");
   syethm+=$ye.hfm($ye.kyerow({yelr:yklrs.yelr}),8);
   return '<div class="yebox urlclick"  kkey="p" kid="'+yklrs.id+'">'+syethm+'</div><div class="clear10"></div>';
   break;
	  <?php /*司机-待处理接单*/ ?>
	  case "owait":
		var mohtm='<div class="fmwait"><div class="fmwait_cont">';
		 for(n in yklrs.plist){
		 val2=yklrs.plist[n];
		 mohtm+='<div class="fmwait_stroke tsfcursor'+(val2.sok==1?'':' del')+'"  kkey="'+val2.kkey+'">'+(val2.sok_name?'<div class="fmwait_stroke_del">'+val2.sok_name+'</div>':'')+'<div class="fmwait_stroke_img"><div class="avatars avatar_'+val2.user.avatarid+'"></div>乘'+(n*1+1)+'</div><div class="fmwait_stroke_txt"><div class="fmwait_stroke_txt_n">'+val2.todate+' - '+val2.people+'人</div>'+$yk.bnabox(val2)+' </div></div><div class="clear10"></div>';
		 }
		 mohtm+='</div></div><div class="clear10"></div>';
		  return mohtm;
		  break;
	  case "oorder":<?php /*司机-订单乘客*/ ?>
		return '<div class="fmbox"><div class="clear3"></div>'+mosfc.o_showorder_info(yklrs)+'</div><div class="clear10"></div>';
		  break;
	  default:
	    return "";
		 break;
  }
}
function mostroke(cid){
  $yh.sfpost("stroke_add/"+cid,$("#wrapper_form").serialize());
}
index_nearby_dd=[{nn:'全部乘客订单',nu:'nearbx_1',noid:'1',mn:'定位乘客订单',mu:'nearby',moid:''}
,{nn:'主校乘客订单',nu:'nearbx_2',noid:'110.296201,21.152526',mn:'寸金校乘客订单',mu:'nearbx_3',moid:'110.336503,21.286979'}
,{nn:'鼎盛乘客订单',nu:'nearbx_4',noid:'110.402467,21.210272',mn:'万达乘客订单',mu:'nearbx_5',moid:'110.406337,21.248722'}
,{nn:'兴华乘客订单',nu:'nearbx_6',noid:'110.374838,21.274864',mn:'师范乘客订单',mu:'nearbx_7',moid:'110.346828,21.268934'}];
index_nearby_htm='';
for(im in index_nearby_dd){
ival=index_nearby_dd[im];
index_nearby_htm+='<tr><td width="40%"><div class="motb10"><div class="pkroa '+ival.nu+'" onclick="turl(\''+ival.nu+'\')" oid="'+ival.noid+'">'+ival.nn+'</div></div></td><td width="20%">&nbsp;</td><td width="40%"><div class="motb10"><div class="pkroa '+ival.mu+'" onclick="turl(\''+ival.mu+'\')" oid="'+ival.moid+'">'+ival.mn+'</div></div></td></tr>';
}


$(".indexby_topnav").html('<div class="ywhtop">'+$yw.bnav({l:1,z:{g:'顺风车'}})+$yw.bnav({d:[{n:'乘客',c:'show'},{n:'车主',c:'owner'},{n:'管理',c:'admin'}]})+'</div><div style=" height:80px;"></div>');