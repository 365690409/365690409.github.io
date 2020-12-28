<script>
$yw={
  ywree:function (ywad){
	$(ywad).animate({"opacity":"0"},500,function(){$(this).remove();});
  },
  outree:function (ywad){
	$(ywad).animate({"display":"block"},2000,function(){$(this).animate({"opacity":"0"},500,function(){$(this).remove();});});
  },
  ywfdl:function (){
   ywihtm='<div class="ywfdl">';
   ywihtm+='<div class="ywfdllayer" onClick="ywfdlsh();"></div>';
   ywihtm+='<div class="ywfdl_lr"><div class="ywfdl_lrc"><div class="ywlbox"><div>';
   ywihtm+='<div class="ywpg20"><div class="ywlbox_uesr"><span class="ywicowq ywico_user"></span>会员中心</div></div>';
   ywihtm+='<div class="ywlbox_nav"><ul>';
   ywihtm+='<li onClick="turl(\'yjlby\');"><div class="ywlicobox"><span class="ywlico"></span>订单</div></li>';
   ywihtm+='<li onClick="$yw.ppt_txt(\'暂无信息\');"><div class="ywlicobox"><span class="ywlico ywlico_2"></span>安全</div></li>';
   ywihtm+='<li onClick="turl(\'setus\');"><div class="ywlicobox"><span class="ywlico ywlico_3"></span>钱包</div></li>';
   ywihtm+='<li onClick="$yw.ppt_txt(\'暂无信息\');"><div class="ywlicobox"><span class="ywlico ywlico_4"></span>客服</div></li>';
   ywihtm+='<li onClick="ywshow();"><div class="ywlicobox"><span class="ywlico ywlico_5"></span>设置</div></li>';
   ywihtm+='</ul></div>';
   ywihtm+=' </div></div></div></div>';
   ywihtm+='</div>';
   ywihtm+='<script type="text/javascript">$yw.ywfdltouchend();</script>';
   return ywihtm;
  },
  ywfdltouchend:function (){
	$('.ywfdl').on('touchend',function(e){if($('.ywfdl').scrollLeft()<($('.ywfdl .ywlbox').width()/2)){$('.ywfdl').animate({scrollLeft:0},200);}else{$('.ywfdl').animate({scrollLeft:$('.ywfdl .ywlbox').width()},200,function(){$('.ywfdl').hide();});}});  
  },
  ywfdb:function (){
   ywihtm='<div class="ywfdb" onMouseOut="$yw.ywfdbtouchend()">';
   ywihtm+='<div class="ywfdblayer" onClick="ywfdbsh();"></div>';
   ywihtm+='<div style="height:'+$("body").height()+'px;"></div>';
   ywihtm+='<div class="ywfdbbox"><div class="ywclose" onClick="ywfdbsh();"></div>';
   ywihtm+='<div class="mofm10">';
   ywihtm+=mosfc.moinfol({t:'添加感谢费',n:'感谢费全部归属车主，添加后车主热门单积极'});
   ywihtm+='<div class="clear20"></div>';
   ywihtm+='<div class="ywbutbox"><span class="ywbut ywbut_no">取消</span><span class="ywbut ywbut_ok">确认</span></div>';
   ywihtm+='</div>';
   ywihtm+='</div>';
   ywihtm+='</div>';
   ywihtm+='<script type="text/javascript">$yw.ywfdbtouchend();</script>';
   return ywihtm;
  },
  ywfdbtouchend:function (){
   $('.ywfdb').on('touchend',function(e){
   if($('.ywfdb').scrollTop()>($(".ywfdb .ywfdbbox").height()/2)){
	$('.ywfdb').animate({scrollTop:$(".ywfdb .ywfdbbox").height()},120);
   }else{
    $(".ywfdb").animate({scrollTop:0},120,function(){$(".ywfdb").hide();});
   }
   });
  },
  anavz:function (ywars){
   ywihtm='';
   if(ywars.c){  
   ywihtm+='<div class="ywnav_c">';
   for(ywarsm in ywars.c){
   ywihtm+='<span>'+ywars.c[ywarsm].n+'</span>';
   }
   ywihtm+='</div>';
   }else if(ywars.g){  
   ywihtm+='<div class="ywnav_g"><div>'+ywars.g+'</div></div>'; 
   }
   return ywihtm;
  },
  anavlr:function (ywars){
   if(ywars==1){
   return '<span class="ywicowq ywico_user" onClick="ywfdlsh();"></span>'+$yw.ywfdl();
   }else if(ywars==2){
   return '<div class="ywtico_t" onClick="ywfdbsh();"><span class="ywicoinfo"></span></div>'+$yw.ywfdb();
   }else if(ywars==3){
   return '<div class="ywtico_r"><span class="ywicous"></span></div>';
   }else if(ywars==4){
   return'<div class="ywtico_a" onClick="ywnslow(this);"><span></span><span></span><span></span></div>';
   }else if(ywars==5){
   return '<div class="momatch"><div class="momatch_n">持续匹配中</div><div class="moloader"><span></span><span></span><span></span></div></div>';
   }else{
   return ywars;
   }
  },
  anava:function (ywirs){
   ywihtm=''; 
   ywihtm+='<div class="ywlayer"  onClick="ywnhide(this);"></div>';
   ywihtm+='<div class="ywnav_p" style="top:30px;">';
   ywihtm+='<div class="ywnav_p_a">';
   ywihtm+='<ul>';
   for(ywirsm in ywirs){
   ywihtm+='<li><div class="ywsda"><span class="ywsdaico"></span>'+ywirs[ywirsm].n+'</div></li>';
   }
   ywihtm+='</ul>';
   ywihtm+='</div>';
   ywihtm+='</div>';
   return ywihtm;
  },
  anavb:function (ywirs){
   ywihtm=''; 
   ywihtm+='<div class="ywlayer"  onClick="ywnhide(this);"></div>';
   ywihtm+='<div class="ywnav_p" style="top:30px;">';
   ywihtm+='<div class="ywnav_p_b">';
   ywihtm+='<ul>';
   for(ywirsm in ywirs){
   ywihtm+='<li><div class="ywsdb"><span class="ywsdbico">10</span>'+ywirs[ywirsm].n+'</div></li>';
   }
   ywihtm+='</ul>';
   ywihtm+='</div>';
   ywihtm+='</div>';
   return ywihtm;
  },
  anavd:function (ywirs){
   ywihtm=''; 
   ywihtm+='<div class="ywnav_c">';
   for(ywirsm in ywirs){
   ywihtm+='<span class="ywnav_c_'+ywirs[ywirsm].c+'"'+(ywirs[ywirsm].u?' onClick="turl(\''+ywirs[ywirsm].u+'\');"':'')+'>'+ywirs[ywirsm].n+'</span>';
   }
   ywihtm+='</div>';
   return ywihtm;
  },
  anavc:function (ywirs){
   ywihtm=''; 
   ywihtm+='<div class="ywnav_c">';
   for(ywirsm in ywirs){
   ywihtm+='<span class="ywnav_u_'+ywirs[ywirsm].u+'" onClick="turl(\''+ywirs[ywirsm].u+'\');">'+ywirs[ywirsm].n+'</span>';
   }
   ywihtm+='</div>';
   ywihtm+='<div class="ywlayer"  onClick="ywnhide(this);"></div>';
   ywihtm+='<div class="ywnav_p">';
   ywihtm+='<div class="ywnav_p_t"><div class="ywpr" onClick="ywnhide(this);"><div class="ywclose"></div></div>全部服务</div>';
   ywihtm+='<div class="ywnav_p_c">';
   ywihtm+='<ul>';
   for(ywirsm in ywirs){
   ywihtm+='<li onClick="ywss(this);" kid="'+ywirsm+'" ku="'+ywirs[ywirsm].u+'"><div class="ywimgcbox"><div class="ywimgc"></div><div class="ywimgct">'+ywirs[ywirsm].n+'</div></div></li>';
   }
   ywihtm+='</ul>';
   ywihtm+='</div>';
   ywihtm+='</div>';
   return ywihtm;
  },
  bnav:function (ywbrs){
   ywbhtm='<div class="clear10"></div>';
   ywbhtm+='<div class="ywnav">';
   ywbhtm+=ywbrs.l?'<div class="ywpl">'+$yw.anavlr(ywbrs.l)+'</div>':'';
   ywbhtm+=ywbrs.r?'<div class="ywpr">'+$yw.anavlr(ywbrs.r)+'</div>':'';
   ywbhtm+=ywbrs.z?$yw.anavz(ywbrs.z):'';
   ywbhtm+=ywbrs.a?$yw.anava(ywbrs.a):'';
   ywbhtm+=ywbrs.b?$yw.anavb(ywbrs.b):'';
   ywbhtm+=ywbrs.c?$yw.anavc(ywbrs.c):'';
   ywbhtm+=ywbrs.d?$yw.anavd(ywbrs.d):'';
   ywbhtm+='</div>';
   return ywbhtm;
  },
  ppt_txt_i:1,
  ppt_txt:function (ywad){<?php /*居中弹出信息*/ ?>
    $yw.ppt_txt_i++;
	$("body").append('<div class="ywppt ywppt_tit_'+$yw.ppt_txt_i+'"><span class="ywppt_txt">'+ywad+'</span></div>');
	$yw.outree(".ywppt_tit_"+$yw.ppt_txt_i);
  },
  pptb_txt:function (ywad){<?php /*底部弹出信息*/ ?>
    $yw.ppt_txt_i++;
	$("body").append('<div class="ywppt ywpptb ywppt_tit_'+$yw.ppt_txt_i+'"><span class="ywppt_txt">'+ywad+'</span></div>');
	$yw.outree(".ywppt_tit_"+$yw.ppt_txt_i);
  },
  ppt_tscall:function (ywars){<?php /*居中提示信息*/ ?>
   $(".ywppt").remove();
   ywbhtm='<div class="ywppt"><div class="ywpptlayer" onClick="ywppthide();"></div><div class="ywppt_ts">';
   ywbhtm+='<div class="ywppt_ts_t">'+ywars.t+'</div>';
   ywbhtm+='<div class="ywbutbox"><span class="ywbut ywbut_no">取消</span><span class="ywbut ywbut_ok">确认</span></div>';
   ywbhtm+='</div></div>';
   $("body").append(ywbhtm);
   $(".ywppt .ywbut_no").click(function (){$(".ywppt").animate({"opacity":"0"},500,function(){$(".ywppt").remove();});});
   $(".ywppt .ywbut_ok").click(function (){ywars.call({ok:1,u:ywars.u,d:ywars.d?ywars.d:''});$(".ywppt").remove();});
  },
  ppt_ts:function (ywars){<?php /*居中提示信息*/ ?>
   $yw.ppt_tscall({t:'订单结束已超过6小时 如有需要请联系客服',u:'s/order',call:function(ywmsg){if(ywmsg.ok==1){$yw.ywpost(ywmsg);}}});
  },
  ppt_tstxt:function (ywars){<?php /*居中提示信息*/ ?>
   $(".ywppt").remove();
   ywbhtm='<div class="ywppt"><div class="ywpptlayer" onClick="ywppthide();"></div><div class="ywppt_ts">';
   ywbhtm+='<div class="ywppt_ts_t">'+ywars.t+'</div>';
   ywbhtm+='<div class="ywbutbox"><span class="ywbut ywbut_d">确认</span></div>';
   ywbhtm+='</div></div>';
   $("body").append(ywbhtm);
   $(".ywppt .ywbut_d").click(function (){ywars.call({ok:1,u:ywars.u,d:ywars.d?ywars.d:''});$(".ywppt").remove();});
  },
  ywppt_cd_jb:function (ywars){<?php /*居中提示信息*/ ?>
   $(".ywppt").remove();
   ywbhtm='<div class="ywppt ywpptd"><div class="ywpptlayer" onClick="ywppthide();"></div><div class="ywppt_cd">';
   ywbhtm+='<div class="ywli"><ul>';
   for(ywarsm in ywars.d){
   ywbhtm+='<li '+(ywars.d[ywarsm].u?' onClick="$yw.ywppt_cdu(\''+ywars.d[ywarsm].u+'\')"':'')+(ywars.d[ywarsm].a?' onClick="$yw.aurl(\''+ywars.d[ywarsm].a+'\')"':'')+'>'+ywars.d[ywarsm].n+'</li>';
   }
   ywbhtm+='</ul><ul>';
   ywbhtm+='<li onClick="ywppthide();">取消</li>';
   ywbhtm+='</ul></div>';
   ywbhtm+='</div></div>';
   $("body").append(ywbhtm);
  },
  ywppt_cdu:function (ywars){<?php /*居中提示信息*/ ?>
    $(".ywppt").animate({"opacity":"0"},500,function(){$(".ywppt").remove();});
    $yw.ywpost({u:ywars});
  },
  ywppt_cd:function (ywars){<?php /*居中提示信息*/ ?>
   $yw.ywppt_cd_jb({d:[{n:'高德地图',a:'https://www.yimenapp.net/doc/demo.cshtml'},{n:'百度地图',u:'s/usprice'},{n:'腾讯地图',u:'s/usprice2'}]});
  },
  aurl:function (ywars){<?php /*居中提示信息*/ ?>
    location.href = ywars;
  },
  ywpost:function (ywars){<?php /*居中提示信息*/ ?>
   $yh.sfpost(ywars.u,ywars.d);
  },
  voiceText:function (ywad){<?php /*文字转语音http://tts.baidu.com/text2audio?lan=zh&ie=UTF-8&spd=6&text=  http://ai.baidu.com/aidemo?type=tns&spd=5&pit=8&vol=15&per=5&dt=1&tex=*/ ?>
     var audiourl='http://ai.baidu.com/aidemo?type=tns&spd=5&pit=8&vol=15&per=5&dt=1&tex='+encodeURI(ywad);
     var audio = new Audio(audiourl);
     audio.src=audiourl;
     audio.play();
  },
  ywshow:function (ywbrs){
   ywbhtm='';
   ywbhtm+='<div class="ywshow">';
   ywbhtm+='<div class="ywshowtop"><div class="ywnav" >';
   ywbhtm+='<div class="ywpl"><div class="ywreturn" onClick="ywreturn(this);"><span class="ywtoico"></span></div></div>';
   ywbhtm+='<div class="ywnav_tit">'+ywbrs.t+'</div>';
   ywbhtm+='</div></div>';
   ywbhtm+='<div class="ywshowcon">';
   ywbhtm+='<div class="ywli">';
   ywbhtm+='<ul>';
   if($yh.site.browser=="mapp"){
   ywbhtm+='<li onclick="jsBridge.appSettings();"><div class="ywpr"><div class="ywlirun"><span class="ywtoico"></span></div></div>版本信息</li>';
   ywbhtm+='<li><div class="ywpr"><div class="ywlirun">'+jsBridge.appVersion+'<span class="ywtoico"></span></div></div>版本更新</li>';
   }else if($yh.site.browser=="weixin"){
   ywbhtm+='<li><div class="ywpr"><div class="ywlirun">微信版本<span class="ywtoico"></span></div></div>版本更新</li>';
   }else{
   ywbhtm+='<li><div class="ywpr"><div class="ywlirun">手机网页<span class="ywtoico"></span></div></div>版本更新</li>';
   }
   ywbhtm+='<li><div class="ywpr"><div class="ywlirun"><span class="ywtoico"></span></div></div>关于同泰</li>';
   ywbhtm+='</ul>';
   ywbhtm+='<ul>';
   ywbhtm+='<li onclick="logout();"><div class="ywlogout">退出</div></li>';
   ywbhtm+='</ul>';
   ywbhtm+='</div>';
   ywbhtm+='</div>';
   ywbhtm+='</div>';
   $(".ywfd").hide();
   $("body").append(ywbhtm);
  }
};


function ywshow(){
	$yw.ywshow({t:'设置'});
}
function ywreturn(cthis){
	 $(cthis).parents(".ywshow").hide();
}
function ywnhide(cthis){
  $(cthis).parents(".ywnav").find(".ywlayer").hide();
  $(cthis).parents(".ywnav").find(".ywnav_p").slideToggle("hide");
}
function ywnslow(cthis){
  $(cthis).parents(".ywnav").find(".ywlayer").show();
  $(cthis).parents(".ywnav").find(".ywnav_p").slideToggle("slow");
}
function ywss(cthis){
   $(cthis).parents(".ywnav").find(".ywnav_c").scrollLeft(($(cthis).parents(".ywnav").find(".ywnav_c").scrollLeft()+$(".ywnav_u_"+$(cthis).attr("ku")).offset().left-($("body").width()/2-$(".ywnav_u_"+$(cthis).attr("ku")).width())));
  ywnhide(cthis);
  turl($(cthis).attr("ku"));
}
function ywfdlsh(){
  if($(".ywfdl").is(':hidden')){
  $(".ywfdl").show().scrollLeft($(".ywfdl .ywlbox").width()).animate({scrollLeft:0},380);
  }else{
  $(".ywfdl").animate({scrollLeft:$(".ywfdl .ywlbox").width()},380,function(){$(".ywfdl").hide();});
  }
}
function ywfdbsh(){
  if($(".ywfdb").is(':hidden')){
  $(".ywfdb").show().scrollTop(0).animate({scrollTop:$(".ywfdb .ywfdbbox").height()},280);
  }else{
  $(".ywfdb").animate({scrollTop:0},280,function(){$(".ywfdb").hide();});
  }
}
function ywppthide(){
  $yw.ywree('.ywppt');
}
