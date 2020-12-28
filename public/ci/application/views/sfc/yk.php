<script>
$yk={
  ibodybg:function (ykirs){
	  document.body.style.backgroundImage=ykirs?'url("'+ykirs+'&size='+$("body").width()+'*'+$("body").height()+'")':'';},
  isname:function (ykirsn,ykirs){return '<div'+(ykirs.u?' onClick="turl(\''+ykirs.u+'\');"':'')+'>'+ykirsn+'</div>'},
  iprice:function (ykirs){
	  if(ykirs.pis==1){
	  return '<div class="moprice">已拼成:<span>'+ykirs.price_p+'</span>元</div>';
	  }else{
	  return ykirs.price?'<div class="moprice"><span>'+ykirs.price+'</span>元'+(ykirs.price_p?'<p>拼成 '+ykirs.price_p+'元</p>':'')+'</div>':'';
	  }
	  },
  isrl:function (ykirs){return '<div class="motb10"><b>'+ykirs.todate+'</b> '+ykirs.people+'人'+(ykirs.txt?' '+ykirs.txt:'')+'</div>'},
  isit:function (ykirs){return '<div class="mona"><div class="mona_mark'+(ykirs.s?' mona_mark_'+ykirs.s:'')+'"></div>'+ykirs.name+(ykirs.k?'<span>'+getanalysis(website.oid,ykirs.k)+'km</span>':'')+(ykirs.address?'<p>'+ykirs.address+'</p>':'')+'</div>';},
  iusbx:function (ykirs){return '<div class="mousinfo"><div class="mousinfo_img avatar_'+ykirs.avatarid+'"></div>'+ykirs.callname+'</div>';},
  iinputa:function (ykirs){return '<div class="fbhq_sjbx poplogin_pass"><div class="fbhq_sjbx_tit">'+ykirs.t+'</div><input name="'+ykirs.n+'" type="text" value="'+ykirs.v+'" placeholder="请输入'+ykirs.t+'"></div>';},
  iibput:function (ykirs){
	  if(ykirs.type=="textarea"){
	  return '<textarea name="'+ykirs.n+'" placeholder="请输入'+ykirs.t+'">'+ykirs.v+'</textarea>';
	  }else{
	  return ykirs.n?'<input name="'+ykirs.n+'" type="text" value="'+ykirs.v+'" placeholder="请输入'+ykirs.t+'">':'<p>'+ykirs.v+'</p>';
	  }
	  },
  itbput:function (ykirs){
	  return '<tr><th width="20%"><span>'+ykirs.t+'</span</th><td>'+$yk.iibput(ykirs)+'</td></tr>';
	  },
  mousnav:function (moval){
 var mohtm='<div class="mousnav"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>';
  for(mom in moval.d){
  mohtm+='<td width="25%"><div class="mousnavinfo '+moval.d[mom].c+''+(moval.d[mom].u==moval.v?' mousnavck':(moval.d[mom].u?'" onclick="'+moval.d[mom].u+'':''))+'"><p><div class="mousnavinfo_img avatar_'+moval.d[mom].i+'"></div></p><p>'+moval.d[mom].n+'</p><div class="mousnavinfo_b"></div></div></td>';
 }
  mohtm+='</tr></table></div>';
  return mohtm;},
  hsit:function (ykhrs){
	  return $yk.isit(Object.assign({s:'o'},ykhrs.o))+$yk.isit(Object.assign({s:'d'},ykhrs.d));
  },
  htbputbox:function (ykhrs){
	  ykhrshtm='<div class="fmbox"><div class="fmint mofm10"><table width="100%" border="0" cellspacing="0" cellpadding="0">';
	  for(ykhrsm in ykhrs){
	  ykhrshtm+=$yk.itbput(ykhrs[ykhrsm]);
	  }
	  ykhrshtm+='</table></div></div>';
	  return ykhrshtm;},
  hmonbbox:function (ykhrs){return '<div class="monbbox"><div class="monb"><div class="monb_mark monb_mark_o"></div>'+ykhrs.o.name+'</div><div class="monb_gl"><div class="fjx">1</div></div><div class="monb"><div class="monb_mark monb_mark_d"></div>'+ykhrs.d.name+'</div></div>';},
  bnabox:function (ykbrs){
	  if(ykbrs==""){
	  ykbrs={o:{name:'定位名称',address:'地址'},d:{name:'定位名称',address:'地址'},price:50,price_p:40};
	  }
	  return '<div class="monabox"><div class="monabox_price">'+$yk.iprice(ykbrs)+'</div>'+$yk.hsit(ykbrs)+'</div>';
  },
  bstroke:function (ykbrs){
   var syethm='';
	syethm+=$ye.hfm($ye.kyerow({usdbox:ykbrs.usdbox}),"8 mobm");
	syethm+=$ye.hfm($ye.kyerow(ykbrs.top),"8");
	syethm+=$ye.hfm($ye.kyerow({cd:ykbrs.cd}),"8");
	syethm+='<div class="pkbut  pkbutsd" onclick="mostroke('+ykbrs.id+')">'+($("#wrapper_form input[name='pid']").val()?'再拼一单':'确定同行')+'</div>';
   return '<div class="ppfdbottom"><div class="mofm16">'+syethm+'</div></div>';
	  
  },
  obstroke:function (ykbrs){
   var syethm='';
	syethm+=$ye.hfm($ye.kyerow({usdbox:ykbrs.usdbox}),"8 mobm");
	syethm+=$ye.hfm($ye.kyerow(ykbrs.top),"8");
	syethm+=$ye.hfm($ye.kyerow({cd:ykbrs.cd}),"8");
	syethm+=ykbrs.id?'<div class="pkbut  pkbutsd" onclick="mostroke('+ykbrs.id+')">请他接我</div>':'<div class="pkbut">暂时只能查看</div>';
   return '<div class="ppfdbottom"><div class="mofm16">'+syethm+'</div></div>';
  },
  llist:function (yklrs){
	switch (yklrs.yk_s) {
	  case "myorder":
	   var syethm='';
	   syethm+=$ye.hfm($ye.kyerow(yklrs.top),"8 mobm");
	   syethm+=$ye.hfm($ye.kyerow({cd:yklrs.cd}),"8 mobm");
	   syethm+=$ye.hfm($ye.kyerow({txt:yklrs.txt}),8);
	   return '<div class="yebox tsfcursor"  kkey="o_'+yklrs.id+'">'+syethm+'</div><div class="clear10"></div>';
      break;
	  <?php /*系统-信息*/ ?>
	  case "myprompt":
	      return '<div class="fmbox"><div class="mofm10 mobm"><div class="myprompt" '+(yklrs.u?'onclick="turl(\''+yklrs.u+'\');"':'')+'><span>'+yklrs.adate+'</span><b>'+yklrs.t+'</b>'+(yklrs.n?'&nbsp;'+yklrs.n:'')+(yklrs.u?'&nbsp;可查看':'')+'</div></div></div><div class="clear10"></div>';
		  break;
	  <?php /*乘客-待处理订单*/ ?>
	  case "cwait":
	      return '<div class="fmwait tsfcursor" kkey="'+yklrs.kkey+'"><div class="fmwait_inor"><span class="awr"></span></div><div class="fmwait_top"><div class="fmwait_status brad">'+yklrs.status_name+'</div><div class="fmwait_date">'+yklrs.todate+'</div></div>'+$yk.hmonbbox(yklrs)+'</div><div class="clear10"></div>';
		  break;
	  <?php /*乘客-待处理订单*/ ?>
	  case "seinfo":
	      return '<div class="seinfo_'+yklrs.s+'">
   <div class="seinfo_img"><div class="avatars avatar_'+yklrs.user.avatarid+'"></div></div>
   <div class="seinfo_txt">'+yklrs.arr.d+(yklrs.sok==1?'':'<div class="seinfo_wtxt">未读</div>')+'</div>
  </div><div class="clear10"></div>';
		  break;
	  case "cstroke":<?php /*乘客-请他接我列表*/ ?>
	   var syethm='';
	   syethm+=$ye.hfm($ye.kyerow(yklrs.top),"8 mobm");
	   syethm+=$ye.hfm($ye.kyerow({cd:yklrs.cd}),"8 mobm");
	   syethm+=$ye.hfm($ye.kyerow({yelr:yklrs.yelr}),8);
	   return '<div class="yebox urlclick"  kkey="p" kid="'+yklrs.id+'">'+syethm+'</div><div class="clear10"></div>';
	  case "ctxorder":<?php /*乘客-订单内同行者*/ ?>
	   var syethm='';
	   syethm+=$ye.hfm($ye.kyerow(yklrs.top),"8 mobm");
	   syethm+=$ye.hfm($ye.kyerow({cd:yklrs.cd}),"8 mobm");
	   syethm+=$ye.hfm($ye.kyerow({yelr:yklrs.yelr}),8);
	   return '<div class="yebox">'+syethm+'</div><div class="clear10"></div>';
		  break;
	  case "spoi":<?php /*搜索坐标*/ ?>
           return '<li class="urlclick" kkey="spoi" name="'+yklrs.name+'" location="'+yklrs.location+'"><div class="lxbox_name">'+yklrs.name+' <div class="lxbox_name_km">'+getanalysis(website.oid,yklrs.location)+'km</div></div>'+(yklrs.address?'<div class="lxbox_add">'+yklrs.adname+yklrs.address+'</div>':'')+'</li>';
		  break;
	  default:
	    return ykownerllist(yklrs);
		 break;
	}	
  },
  sshow:function (yksrs,yksshow_s){
	yksshowhtm="";
	if(yksrs){
	for(m in yksrs){
	yksshowhtm+=$yk.llist(Object.assign({yk_s:yksshow_s},yksrs[m]));
	}
	}
	return yksshowhtm;
  },
  sinfo:function (yksrs,yksshow_s){
	 sinfohtm=$yk.sshow(yksrs,yksshow_s); 
	 return (sinfohtm?sinfohtm:'<div  class="monoddd">暂时无记录</div>'); 
  },
  sinfold:function (yksrs,yksshow_s){
	 sinfohtm=$yk.sshow(yksrs,yksshow_s); 
	 return (sinfohtm?sinfohtm:'<li class="monodata"><div class="monodata_img"></div><div class="monodata_name">暂无顺路订单，请下拉刷新</div></li>'); 
  },
  hwait:function (ykirs){
	 $yu.ppindex(ykirs?'<div class="clear10"></div><div class="fmbox mofm8"><div class="fmbox_tit">待处理订单</div>'+ykirs+'</div>':'');
  },
  hpopbylist:function (ykirs){
  $yu.ahide();
  $(".popby_list").show();
  $("#wrapper_form").html((ykirs.htm?ykirs.htm:'<input type="hidden" name="oid" value="'+ykirs.oid+'" />')+'<input type="hidden" name="ecorder" value="" />');
   $yh.sfpost("ld",$("#wrapper_form").serialize());
  $(".wrapper_h").height($("#wrapper_form").height());
  if(ykirs.name){
  $(".popby_list .ppfdtop_tit span").html(ykirs.name);
  }else{
  $(".popby_list .ppfdtop_tit span").html($yh.his_tey=="show"?'查询附近司机':'正在寻找附近乘客');
  }
  },
  hwrapper:function (ykirs){
	$("#wrapper ul").html(ykirs);
	if($("#wrapper ul").height()<($("body").height()-48)){
	$("#wrapper ul").height(($("body").height()-48));
	}
	$yu.urlclick();
	wbemodate=modate();
	wrapper.refresh();
  },
  confirm:function (ykhrs) {
	$yk.ppbm('<div class="ppfdbottom"><div class="mofm16">'+mosfc.moinfol(ykhrs.msg)+'</div><div class="mofm16"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="45%"><div class="sbut_fbhq_close pkroa">'+(ykhrs.cname?ykhrs.cname:'取消')+'</div></td><td width="10%"></td><td width="45%"><div class="sbut_fbhq_ok pkroa pkrosd">'+(ykhrs.dname?ykhrs.dname:'确定')+'</div></td></tr></table></div></div>');
	$(".ppfdbox .sbut_fbhq_close").click(function (){ykhrs.callbackfun(0,ykhrs.d);$(".ppfdbox").remove();});
	$(".ppfdbox .sbut_fbhq_ok").click(function (){ykhrs.callbackfun(1,ykhrs.d);$(".ppfdbox").remove();});
  },
  bconfirm:function (ykbrs) {
   $yk.confirm({msg:{t:ykbrs.msg[0],n:ykbrs.msg[1]},cname:ykbrs.n[0],dname:ykbrs.n[1],d:ykbrs.u,callbackfun:function(ykbrs_d,ykbrs_u){if(ykbrs_d==1){$yh.sfpost(ykbrs_u,{});}}});
  },
  adbconfirm:function (ykbrs) {
   $yk.confirm({msg:{t:ykbrs.msg[0],n:ykbrs.msg[1]},cname:ykbrs.n[0],dname:ykbrs.n[1],d:ykbrs.u,callbackfun:function(ykbrs_d,ykbrs_u){if(ykbrs_d==1){$yh.sfpost('etus',ykbrs_u);}}});
  },
  <?php /*底部框架*/ ?>
  ppbm:function (ykprs){
	$("body").append('<div class="ppfdbox"><div class="grayLayer" onClick="moppfdbox();"></div>'+ykprs+'</div>');
	$(".ppfdbox").hide().slideDown();	
  },
  <?php /*底部框架加选择*/ ?>
  ppbmset:function (ykpbrs){
	$yk.ppbm('<div class="ppfdbottom"><div class="mofm16">'+mosfc.moinfol({t:'<div class="moclose" onClick="moppfdbox();">X</div>'+ykpbrs.t,n:ykpbrs.n})+'<div class="motb20">'+ykpbrs.d+'</div><div class="pkbut pkbutsd" kdd="release_'+ykpbrs.c+'"onclick="pksbut(this);"">确定</div></div></div>');
  }
};
