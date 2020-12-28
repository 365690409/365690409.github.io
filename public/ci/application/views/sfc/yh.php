<script>
$yh={
  his_i:0,
  his_cs:0,
  spost_i:0,
  spost_i:0,
  momapsnss_i:0,
  his_tey:"",
  his_csgg:function () {
	$yh.his_cs++;
	if($yh.his_cs>3){
	  if($(".ywpptb").css('display')=="block"){
	   if($yh.site.browser=="weixin"){
		  WeixinJSBridge.call('closeWindow');
	   }else if($yh.site.browser=="mapp"){
		 jsBridge.exit();
	   }else{
	      window.open("about:blank","_self").close();
	   }
	  }else{
       $yw.pptb_txt("再按一次退出应用程序");
	  }
	}
  },
  rurl:function () {
	$yh.his_i=1;
	if($yh.his_cu==""){
	$yh.his_cuin="";
	$yh.his_csgg();
	$yh.qurl();
	}else if($yh.his_cu==$yh.his_cuin){
	$yh.his_cs=0;
	$yh.his_cu="";
	$yh.his_cuin="";
	$yh.qurl();
	}else{
	$yh.his_cs=0;
	$yh.qurl();
	}
  },
  jurl:function (ikey) {
	$yh.his_i=1;
	$yh.his_cs=0;
	raurl=$yh.his_cu;
	raurl+=raurl?"-":"";
	raurl+=ikey;
	$yh.his_cu=raurl;
	$yh.furl(raurl,ikey);
  },
  turl:function (ikey) {
    ikeyee=ikey.split("-");
    if(ikeyee[1]){
	 $yh.jurl(ikeyee[1]);
	}else{
	ikey=ikey=="index"?"":ikey;
	$yh.his_i=1;
	$yh.his_cs=0;
	$yh.furl(ikey,ikey);
	}
  },
  gurl:function (ikey) {
	$yh.sfposturl(ikey); 
  },
  surl:function () {
	$yh.his_cs=0;
    $yh.his_cu=$yh.iurl();
    <?php /*$yh.his_cuin=$yh.his_cu;*/ ?>
	$yh.his_cuin="";
	scurl=$yh.iurl().split("-");
	saurl="";
	tturl="";
	for(m in scurl){
	saurl+=saurl?"-":"";
	saurl+=scurl[m];
	tturl=scurl[m];
	}
	$yh.rfurl(saurl,tturl);
	$(document).ready(function(e) {
	$(window).on('popstate', function () {
	  if($yh.his_i==0){
	   $yh.rurl();
	  }
	});
	});
  },
  uurl:function (kkeys) {
	$yh.his_i=1;
	$yh.his_cs=0;
	$yu.yuloadby('获取数据');
	$yh.his_tey=kkeys;
	window.location.href="#"+($yh.his_tey=="show"?"":$yh.his_tey)+"/";
	$.post("./web.html",{},function(webdata_sfmsg){
	  $('.moprompt').remove();
	  if(webdata_sfmsg){
	  website =eval("("+webdata_sfmsg+")");
	  $yh.mr();
	  website=$yh.inddwdta(website);
	  $yh.sfpost("index",{});
	  }
	});
  },
  furl:function (taurl,tturl) {
	if($yh.iurl()!=taurl || $yh.iurls()!=$yh.his_tey) {
    window.location.href="#"+($yh.his_tey=="show"?"":$yh.his_tey)+"/"+taurl;
	}
	$yh.rfurl(taurl,tturl);
  },
  rfurl:function (taurl,tturl) {
	$yh.his_cu=taurl;
	$(".moprobox").remove();
	if($yh.his_cs<3){
	if(taurl){
	$yh.sfposturl(tturl);
	}else{
	$yh.sfposturl("index");
	}
	}
	$yh.his_i=0;
  },
  qurl:function () {
	curl=$yh.his_cu.split("-");
	if(curl.length>=2){
	rwurl=curl[(curl.length-1)];
	}else{
	rwurl="";
	}
	raurl="";
	for(m in curl){
	if(m!=(curl.length-1)){
	<?php /* if(rwurl!=curl[m]){ */ ?>
	raurl+=raurl?"-":"";
	raurl+=curl[m];
	tturl=curl[m];
	<?php /* } */ ?>
	}
	}
	$yh.furl(raurl,tturl);
  },
  iurl:function () {
    anurl=window.location.href;
    anurl=anurl.split("#"+($yh.his_tey=="show"?"":$yh.his_tey)+"/");
    anurl=anurl[1]?anurl[1]:"";
	return anurl;
  },
  iurls:function () {
    anurl=window.location.href;
    anurl=anurl.split("#");
	if(anurl[1]){
    anurl=anurl[1].split("/");
    anurl=anurl[0]?anurl[0]:"";
	return anurl;
    }else{
	return "";
	}
  },
  sfposturl:function (yuirs) {
	switch (yuirs) {
	  case "fb":
		   mosfc.poprelease();
		  break;
	  case "nearby":
		  $yh.sfthm({l_type:"g_ld",name:$yh.his_tey=="show"?'查询附近车主':'正在寻找附近乘客',oid:website.oid});
		  break;
	  case "nearbx_1":
		  $yh.sfthm({l_type:"g_ld",name:'正在寻找'+$(".nearbx_1").html(),oid:$(".nearbx_1").attr("oid")});
		  break;
	  case "nearbx_2":
		  $yh.sfthm({l_type:"g_ld",name:'正在寻找'+$(".nearbx_2").html(),oid:$(".nearbx_2").attr("oid")});
		  break;
	  case "nearbx_3":
		  $yh.sfthm({l_type:"g_ld",name:'正在寻找'+$(".nearbx_3").html(),oid:$(".nearbx_3").attr("oid")});
		  break;
	  case "nearbx_4":
		  $yh.sfthm({l_type:"g_ld",name:'正在寻找'+$(".nearbx_4").html(),oid:$(".nearbx_4").attr("oid")});
		  break;
	  case "nearbx_5":
		  $yh.sfthm({l_type:"g_ld",name:'正在寻找'+$(".nearbx_5").html(),oid:$(".nearbx_5").attr("oid")});
		  break;
	  case "nearbx_6":
		  $yh.sfthm({l_type:"g_ld",name:'正在寻找'+$(".nearbx_6").html(),oid:$(".nearbx_6").attr("oid")});
		  break;
	  case "nearbx_7":
		  $yh.sfthm({l_type:"g_ld",name:'正在寻找'+$(".nearbx_7").html(),oid:$(".nearbx_7").attr("oid")});
		  break;
	  default:
	      $yh.sfpost(yuirs.replace(/_/g,"/"),{});
		  break;
	}	
  },
  sfthm:function (sfmsg){
	  sfthm(sfmsg);
  },
  sfpostno:function (sfurl,sfdata){
	if($yh.spost_i==0){
	 $yh.spost_i=1;
	 $.post(website.json_url+sfurl,sfdata,function(sfmsg){
	  if(sfmsg){$yh.spost_i=0;$yh.sfthm(eval("("+sfmsg+")"));}
	 });
   }
  },
  sfpost:function (sfurl,sfdata){
	if($yh.spost_i==0){
	 $yh.spost_i=1;
	 $yu.yuload();
	 $.post(website.json_url+sfurl,sfdata,function(sfmsg){
	  if(sfmsg){$('.moprompt').animate({"opacity":"0"},500).remove();$yh.spost_i=0;$yh.sfthm(eval("("+sfmsg+")"));}else{$('.moprompt').remove();}
	 });
   }
  },
  inddwdta:function (website) {
	if($yh.iurls()=="owner" && website.owner==1){website.tsort=1;$yh.his_tey=$yh.iurls();website.json_url='./ecrun/'+website.mobile+'/web/'+$yh.his_tey+'/';}else{website.tsort=0;$yh.his_tey="show";website.json_url='./ecrun/'+website.mobile+'/web/passenger/';}
	if(website.owner==1){
	if($(".indexby_topnav").html()==""){$(".indexby_topnav").html(website.htm);}
	if($yh.his_tey=="owner"){
	$(".ywnav_c_owner").addClass("sd").unbind();
	$(".ywnav_c_show").removeClass("sd").click(function (){$yh.uurl('show');});
	$(".ywnav_c_admin").removeClass("sd").click(function (){$yh.uurl('admin');});
	}else{
	$(".ywnav_c_show").addClass("sd").unbind();
	$(".ywnav_c_owner").removeClass("sd").click(function (){$yh.uurl('owner');});
	$(".ywnav_c_admin").removeClass("sd").click(function (){$yh.uurl('admin');});
	}
	}else{$(".indexby_topnav").html('');}
	if($yh.his_tey=="show"){
	$(".index_nearby").html('<div class="clear10"></div><div class="fmbox mofm8"><div class="fmbox_tit">附近车主</div><div class="mofm16"><div class="pkroa" onclick="turl(\'nearby\')">全部目的地</div></div></div>');
	}else{
	$(".index_nearby").html('<div class="clear10"></div><div class="fmbox mofm8"><div class="fmbox_tit">附近乘客</div><div class="mofm16">	  <table width="100%" border="0" cellspacing="0" cellpadding="0">'+index_nearby_htm+'</table></div></div>');
	}
	$(".index_oid").html(website.oname);
	$(".index_oid").attr('kdd',website.oid);
	return website;
  },
  inowdd:function () {
  $.post("./web.html",{h:1},function(webdata_sfmsg){
	$('.moprompt').remove();
	if(webdata_sfmsg){
    website =eval("("+webdata_sfmsg+")");
    mosfc.index();
	website=$yh.inddwdta(website);
	$yh.surl();
	if(website.mobile>1){
	$yh.mr();
	}
	}
  });
  },
  inowdl:function () {
  $yu.yuloadby('登录成功');
  $yh.his_cs=0;
  $(".pplogin").remove();	
   $.ajax({url:"./web.html",type:'post',async:true,data:{h:1},dataType: 'json',success:function(webdata_sfmsg){
	$('.moprompt').remove();
	mosfc.index();website=$yh.inddwdta(webdata_sfmsg);if($yh.iurl()!="fb"){$yh.surl();}if(website.mobile>1){$yh.mr();}
	$('.moprompt').animate({"opacity":"0"},500).remove();$yh.spost_i=0;
   },error: function (err){$('.moprompt').remove();$yw.ppt_txt("系统运行超时");}});
  },
  mrrun_i:0,
  mrrun_f:0,
  mrpro:function (mrmsg) {
  switch (mrmsg.l_type) {
    case "moprobox":
	if(mrmsg.u){
	  $("body").append('<div class="moprobox moprobox-show"><div class="grayLayer"></div><div class="moprompt_pro"><div class="moprompt_pro_cont"><div class="probox_closebox"><div class="probox_close">X</div></div><div class="probox">'+mosfc.moinfo(mrmsg)+'<div class="mofm10">'+(mrmsg.d?mrmsg.d:'<div class="mrproimg"></div>')+'</div><div class="mofm8"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="45%"><div class="pkbut pkbutno probox_close">取消</div></td><td width="10%"></td><td width="45%"><div class="pkbut pkbutsd proboxcursor">'+mrmsg.butname+'</div></td></tr></table></div></div></div></div></div><script type="text/javascript">$(".proboxcursor").click(function (){'+(mrmsg.u?'turl("'+mrmsg.u+'");':'')+'$(".moprobox").remove();});</script>');
	  $(".moprobox .grayLayer").click(function (){$(".moprobox").remove();});
	  $(".moprobox .probox_close").click(function (){$(".moprobox").remove();});
	}else{
	  $yw.ppt_tstxt({t:mrmsg.t+(mrmsg.n?','+mrmsg.n:''),u:mrmsg.u,call:function(ywmsg){if(ywmsg.ok==1){if(ywmsg.u){$yw.ywpost(ywmsg);}}}});
	}
	  if(mrmsg.t){$yw.voiceText(mrmsg.t+mrmsg.n);}
	  if($yh.site.browser=="mapp"){jsBridge.vibrate();}
    break; 
    case "g_seinfo":
		$(".seinfo_show_"+mrmsg.id).html($yk.sshow(mrmsg.clist,'seinfo'));
		$yh.mrrunmsg_seinfo_focus();
    break; 
    case "show_passenger": <?php /*乘客订单信息*/ ?>
    $(".ordershow_"+mrmsg.id).html(mosfc.showorder(mrmsg));
    break; 
	case "mostrokeshow": <?php /*显示订单*/ ?>
    $(".ordershow_"+mrmsg.id).html(mosfc.o_showorder(mrmsg));
	break;
	default:
	$yh.sfthm(mrmsg);
    break; 
   }
  },
  mrrunmsg_seinfo_cun:"",
  mrrunmsg_seinfo_focus:function () {$(".fbbox input[name='setxt']").focus();document.body.scrollTop =document.body.scrollHeight;},
  mrrun:function () {
	  if($yh.mrrun_i==0){
	   $yh.mrrun_i=1;
	  if($(".ywppt").html()){
		setTimeout(function () {$yh.mrrun_i=0;$yh.mrrun();},2000);
	  }else if($(".popby_show input[name='mrwebuul']").val()){
	  $.post(website.json_url+$(".popby_show input[name='mrwebuul']").val(),{},function(mrrunmsg_seinfo){
		setTimeout(function () {$yh.mrrun_i=0;$yh.mrrun();},1000);
		if(mrrunmsg_seinfo!=$yh.mrrunmsg_seinfo_cun){
		$yh.mrpro(eval("("+mrrunmsg_seinfo+")"));
		$yh.mrrunmsg_seinfo_cun=mrrunmsg_seinfo;
		}
	  });
	  }else{
	  $.post(website.json_url+"monitor/",{dkey:$(".indexby_owner_switch").attr("dkey")==1?1:0},function(mrrunmsg){
		setTimeout(function () {$yh.mrrun_i=0;$yh.mrrun();},2000);
		if(mrrunmsg){$yh.mrpro(eval("("+mrrunmsg+")"));}
	  });
	  }
	  }
  },
  mr:function () {
	 if($yh.mrrun_f==0){
	  $yh.mrrun_f=1; 
	  $yh.mrrun();
	 }
  },
  hpageurl:function (yhiname,yhiurl,yhipage) {
	 yhiurl=yhiurl.replace(/#/g,yhipage);
	 return '<a href="javascript:void(0);" onclick="'+yhiurl+'">'+yhiname+'</a>';
  },
  hpage:function (yhiurl,lastpage,spage,page_show) {
	  lastpage=Math.floor((lastpage-1)/page_show)+1;
	  if(lastpage>1){
	  var  phtm="";
	  if(spage<=1){
	  phtm+="<span>首页</span>";
	  phtm+="<span>上一页</span>";
	  }else{
	  phtm+=$yh.hpageurl("首页",yhiurl,1);
	  phtm+=$yh.hpageurl("上一页",yhiurl,(spage-1));
	  }
	  range=2;
	  spage=spage*1;
	  p_si=spage+range;
	  p_ci=spage-range;
	  p_ci=p_ci<1?1:p_ci;
	  p_si=p_si>=lastpage?lastpage:p_si;
	  s_ci=p_si-p_ci;
	  if(s_ci<(range*2)){
		if(p_ci<range){
		p_si=p_si+((range*2)-s_ci);
		}else{
		p_ci=p_ci-((range*2)-s_ci);
		}
	  }
	  p_si=p_si>=lastpage?lastpage:p_si;
	  if(spage>(range+1)){
	  phtm+="<span>...</span>";
	  }
	  p_ci=p_ci<1?1:p_ci;
	  for(var i=p_ci;i<=p_si;i++){
		 if(i==spage){
	   phtm+='<span class="pok">'+i+'</span>';
		 }else{
	  phtm+=$yh.hpageurl(i,yhiurl,i);
		 }
	  }
	  if(lastpage>(range+spage)){
	  phtm+="<span>...</span>";
	  }
	  if(spage>=lastpage){
	  phtm+="<span>下一页</span>";
	  }else{
	  phtm+=$yh.hpageurl("下一页",yhiurl,(spage*1+1));
	  }
	  if(spage>=lastpage){
	  phtm+="<span>尾页</span>";
	  }else{
	  phtm+=$yh.hpageurl("尾页",yhiurl,lastpage);
	  }
	   return '<div class="list_page">'+phtm+'</div>';
	  }else{
	   return "";
	  }
	  
  }
};
function turl(kkeys){
 $yh.turl(kkeys);
}
function jurl(kkeys){
 $yh.jurl(kkeys);
}
function gurl(kkeys){
 $yh.gurl(kkeys);
}
function fbck(cthis){
 $yu.urlclickk($(cthis));
}
function logout(){
   $yh.sfpost("logout",{});
}
function mofoot(){
  yhahtm='';
  yhahtm+='<div class="popby_list" style="display:none;">';
  yhahtm+='<div class="ppfdtop">';
  yhahtm+='<div class="ppfdtop_tit"><span></span><div class="tit_close" onClick="moindex()"><div class="awrn"></div></div></div>';
  yhahtm+='<div class="molr10"><form id="wrapper_form" method="post"></form></div>';
  yhahtm+='</div>';
  yhahtm+='<div class="wrapper_h"></div>';
  yhahtm+=' <div id="wrapper"><ul></ul></div>';
  yhahtm+='</div>';
  $("body").append(yhahtm);
  $yh.inowdd();
  refresher.init({
  id:"wrapper",
  pullDownAction:function () {$yh.sfpostno("ld",$("#wrapper_form").serialize());},                                                            
  pullUpAction:function () {setTimeout(function () {wrapper.refresh();},1000);},                                                            
  });	
}
function moindex(){
  $yh.his_cs=0;
  $yh.rurl();
}
website="";
