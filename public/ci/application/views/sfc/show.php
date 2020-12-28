<script>
var mosfc={
	moinfo:function (moval){return '<div class="moinfo"><div class="moinfo_tit">'+moval.t+'</div>'+(moval.n?'<div class="moinfo_txt">'+moval.n+'</div>':'')+'</div>';},
	moinfol:function (moval){return '<div class="moinfol"><div class="moinfol_tit">'+moval.t+'</div>'+(moval.n?'<div class="moinfol_txt">'+moval.n+'</div>':'')+'</div>';},
	release_edit:function (moval){return '<input type="hidden" name="oid" value="'+moval.oid+'"><input type="hidden" name="oname" value="'+moval.oname+'"><input type="hidden" name="did" value="'+moval.did+'"><input type="hidden" name="dname" value="'+moval.dname+'"><input type="hidden" name="totime" value="'+moval.totime+'"><input type="hidden" name="people" value="'+moval.people+'"><div class="fmbox"><div class="mofm10"><div class="fmbox_inp mobm"> <div class="mond"><div class="mond_mark mond_mark_o"></div><div class="release_oid mond_tit" kdd="'+moval.oid+'" kname="release_oid"  keyname="coordinate" onClick="moselect(this);">'+moval.oname+'</div></div></div><div class="fmbox_inp mobm"> <div class="mond"><div class="mond_mark mond_mark_d"></div><div class="release_did mond_tit" kdd="'+moval.did+'" kname="release_did" keyname="coordinate" onClick="moselect(this);">'+moval.dname+'</div></div></div><div class="fmbox_inp"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="60%"> <div class="mond"><div class="mond_date"></div><div class="release_date mond_tit">'+(moval.totime?moval.totime:'<span>出行时间</span>')+'</div></div></td><td width="40%"> <div class="mond"><div class="mond_people"></div><div class="release_people mond_tit" keyname="people" onClick="moselect(this);">'+(moval.people?moval.people+'人':'<span>出行人数</span>')+'</div></div></td></tr></table></div></div></div>';},
	ppfdtop:function (moval){return '<div class="ppfdtop"><div class="ppfdtop_tit">'+moval.tit+'<div class="tit_close" onclick="moindex()"><span class="awrn"></span></div></div></div>';},
	poprelease:function (){
		mohtm='<input type="hidden" name="pok" value="1"><input type="hidden" name="thank" value=""><input type="hidden" name="message" value=""><div class="ppfdbottom"><div class="mofm16"><div class="pkbut">发布并搜索</div></div></div><div class="clear40"></div>'+mosfc.release_edit({oname:$(".index_oid").html(),oid:$(".index_oid").attr("kdd"),dname:'',did:'',totime:'',people:'4'});
		if($yh.his_tey=="show"){
		mohtm='<input type="hidden" name="pok" value="1"><input type="hidden" name="thank" value=""><input type="hidden" name="message" value=""><div class="ppfdbottom"><div class="mofm16"><div class="moinfo_price"><div class="moinfo_price_t">独享<span>计算中..</span>元</div><div class="moinfo_price_n">拼成优惠价<span>计算中..</span>元</div><div class="motb16"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="50%"><div keyname="message" onClick="moselect(this);" class="release_message">添加留言</div></td><td width="50%"><div class="release_thank" keyname="thank" onClick="moselect(this);" class="release_message">添加感谢费</div></td></tr></table></div></div><div class="pkbut">预约顺风车</div></div></div><div class="clear40"></div>'+mosfc.release_edit({oname:$(".index_oid").html(),oid:$(".index_oid").attr("kdd"),dname:'',did:'',totime:'',people:''});
		}
	  $yu.popbyshow(mosfc.ppfdtop({tit:'发布行程'})+'<form class="ck_release" method="post">'+mohtm+'</form>');
var mobileSelect1 = new MobileSelect({
    trigger: '.release_date',
    title: 1,
	wheels:modata(),
    transitionEnd:function(indexArr, data){
        console.log(data);
    },
    callback:function(indexArr, data){
	   $(".ck_release input[name='totime']").val($(".release_date").html());
	   $yu.moformrun();
        console.log(data);
    }
});	
   $yu.moformrun();
	},
	selectcoordinate:function (moval){
      $(".popby_index").hide();
      $(".popby_show").hide();
	  mohtm='';
	  mohtm+=website.browser=="weixin"?'<div class="clear0 phpweixitop"></div><div class="ppfdtop"><div class="clear0 phpweixitop"></div>':'<div class="ppfdtop">';
	  mohtm+='<div class="ppfdtop_coordinate"><div class="ppfdtop_coordinate_t">  <div class="fbhq_spoi">  <div class="fbhq_spoi_tit">湛江市</div>  <input class="fbhq_spoi_inp" name="fbhq_spoi_inp" type="text" value="" placeholder="您要去哪儿" '+(website.browser=="weixin"?'onclick="phpweixitop();" ':'')+'/>  </div>  <div class="ppfdtop_coordinate_r" kkey="spoi" onclick="fbck(this);">取消</div> </div></div></div>';
	  $("body").append('<div class="popby_coordinate" kid="'+moval.kid+'">'+mohtm+'<div class="fbhq_spoi_cont_w"><div style="height:52px; line-height:0px;"></div><div class="fbhq_spoi_cont"></div></div></div>');
	 <?php /*if(moval.name){$(".fbhq_spoi_cont").html('<ul>'+$yk.sshow([moval],'spoi')+'</ul>');$yu.urlclick();}*/ ?>
	  if(moval.kid=="index_oid"){
	   $(".fbhq_spoi_cont_w").hide();
	   momapsn_add(moval.location);
	  $(".fbhq_spoi_inp").click(function (){$(".fbhq_spoi_cont_w").show();$(".ppmaps_iframe").hide();$(".fbhq_spoi_inp").unbind("click");$yu.mosspis();}).attr('placeholder',"从那儿出发");
	  }
	  $yu.mosspis_i=0;
	  $('.fbhq_spoi_inp').on('input propertychange',function(){$yu.mosspis();}); 	
	  if(moval.kid!="index_oid"){
		  $yu.mosspis();
		 $('.fbhq_spoi_inp').focus().val(moval.name);
		 if(website.browser=="weixin"){phpweixitop();}
	  }
		},
	popbylogin:function (){
	 var mohtm='<div class="pplogin"><div class="pplogin_box">'+mosfc.moinfo({t:'欢迎使用同泰出行',n:'欢迎使用同泰出行，目前只是体验版有很多地方做的不够请体谅'});
	  mohtm+='<div class="motb20"><div class="fbhq_sjbx poplogin_tel"><div class="fbhq_sjbx_tit">+86</div><input name="mobile" type="tel" value="" placeholder="请输入正确手机号" /></div></div>';
	  mohtm+='<div class="pkbut pkbutsd urlclick" kkey="login">一键登录</div>';
	  mohtm+='</div></div>';
	  $("body").append(mohtm);
      $(".pplogin input[name='mobile']").focus().val(website.mobile>0?website.mobile:''); 
	  $yu.urlclick();
	},
	pkradio:function (moval){
		movhtml='<input type="hidden" name="'+moval.s+'" value="'+moval.v+'"/><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>';
		for(mom in moval.d){
		movhtml+=mom==0?'':'<td width="3%"></td>';
		movhtml+='<td><div class="moradio_'+moval.s+' pkro'+moval.c+' '+(moval.v==moval.d[mom][0]?'pkrosd':'')+'" kdd="'+moval.d[mom][0]+'" ktype="'+moval.s+'" onclick="pkradio(this);">'+moval.d[mom][1]+'</div></td>';
		}
		movhtml+='</tr></table>';
		return movhtml;},
	pkradioc:function (moval){
		movhtml='<input type="hidden" name="'+moval.s+'" value="'+moval.v+'"/>';
		for(mom in moval.d){
		movhtml+='<span class="moradio_'+moval.s+' pkro'+moval.c+' '+(moval.v==moval.d[mom][0]?'pkrosd':'')+'" kdd="'+moval.d[mom][0]+'" ktype="'+moval.s+'" onclick="pkradio(this);">'+moval.d[mom][1]+'</span>';
		}
		return movhtml;},
	showorder:function (moval){
		var mohtm='';
		mohtm+=mosfc.ppfdtop({tit:'行程信息'+moval.ad});
		mohtm+='<div class="ppfdbottom"><div class="clear10"></div>';
		mohtm+=mosfc.moinfo(moval.info);
	    mohtm+=$ye.hfm($ye.kyerow({usdbox:moval.usdbox}),"8 mobm");
		mohtm+=$ye.hfm($ye.kyerow(moval.top)+$ye.kyerow({cd:moval.cd}),"8");
		mohtm+=moval.but?'<div class="mofm8">'+moval.but+'</div>':'';
		mohtm+='<div class="clear10"></div>';
		mohtm+='</div><div class="clear40"></div>';
		mohtm+=$yk.sshow(moval.tx,'ctxorder');
		return mohtm;},
	myuser:function (moval){
		mohtm='';
		mohtm+=mosfc.ppfdtop({tit:'个人信息<div class="tit_r" onclick="logout();">退出</div>'});
		mohtm+='<div class="clear40"></div><div class="fmbox"><div class="myuserbox"><div class="myuserbox_img avatar avatar_'+moval.avatarid+'"></div><div class="myuserbox_inor"><span class="awr"></span></div><div class="myuserbox_txt"><div class="myuserbox_txt_t">'+moval.callname+'</div><div class="myuserbox_txt_s">'+moval.mobilem+'</div></div></div></div><div class="clear10"></div><div class="fmhuibox"><div class="mofm8"><div class="fmlr"><div class="fmlr_r stpe" style="border-left:solid 1px #CCC;"><span>'+moval.orderrows+'</span><p>出行数</p></div><div class="stpe"  onclick="turl(\'my_quota\');"><span>'+moval.price+'</span><p>我的余额</p></div></div></div></div>';
		for(mom in moval.infolist){
		mohtm+='<div class="clear10"></div><div class="fmbox mofm8"'+(moval.infolist[mom].content?' onClick="jurl(\'info_'+moval.infolist[mom].id+'\');"':'')+'>'+moval.infolist[mom].keywords+'</div>';
		}
		return mohtm;
	},
	sinfo:function (moval){return mosfc.ppfdtop({tit:moval.title})+'<div class="clear40"></div><div class="fmbox mofm8">'+moval.content+'</div>';},
	o_showorder_info:function (oval){
		 var ohtm='';
		 ohtm+=mosfc.moinfo(oval.info);
	     ohtm+=$ye.hfm($ye.kyerow({usdbox:oval.usdbox}),"8 mobm");
         ohtm+=$ye.hfm($ye.kyerow(oval.top)+$ye.kyerow({cd:oval.cd}),"8");
		 if(oval.ad){
		 ohtm+='<div class="mofm8"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="23%">'+oval.ad[0]+'</td><td width="3%"></td><td width="23%">'+oval.ad[1]+'</td><td width="3%"></td><td width="23%">'+oval.ad[2]+'</td><td width="3%"></td>  <td width="22%">'+oval.ad[3]+'</td></tr></table></div>';
		 ohtm+=oval.but?'<div class="mofm8">'+oval.but+'</div>':'';
		 ohtm+='<div class="clear10"></div>';	 
		 }
		return ohtm;
	},
	o_showorder:function (moval){
		var mohtm=moval.tx?'<div class="fmbox"><div class="clear3"></div>':'<div class="ppfdbottom"><div class="clear10"></div>';
		mohtm+=mosfc.o_showorder_info(moval);
		mohtm+='</div><div class="clear10"></div>';
		mohtm+=$yk.sshow(moval.tx,'oorder');
	   return mosfc.ppfdtop({tit:$yk.mousnav({v:'',d:moval.plist})})+'<div class="clear40"></div><div class="clear30"></div>'+mohtm;
	  },
	indexnav:function (moval){
   var mohtm='<div class="clear50"></div><div class="ppfdbm"><div class="popby_nav"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>';
    mohtm+='<td><div class="bynav'+(moval=='index'?' bynavck':'" onClick="turl(\'index\');')+'"><div><i class="icono-flag"></i></div><div>出行</div></div></td>';
    mohtm+='<td><div class="bynav'+(moval=='yjlby'?' bynavck':'" onClick="turl(\'yjlby\');')+'"><div><i class="icono-document"></i></div><div>订单</div></div></td>';
    mohtm+='<td><div class="bynav'+(moval=='prompt'?' bynavck':'" onClick="turl(\'prompt\');')+'"><div><i class="icono-commentEmpty"></i></div><div>信息</div></div></td>';
    mohtm+='<td><div class="bynav'+(moval=='setus'?' bynavck':'" onClick="turl(\'setus\');')+'"><div><i class="icono-user"></i></div><div>我的</div></div></td>';
    mohtm+='</tr></table></div></div>';
	return	 mohtm;
	  },
	index:function (){
     moval='<div class="fmbox"><div class="mofm10"><div class="fmbox_txt mobm"><div class="monc"><div class="monc_mark monc_mark_o"></div><div class="index_oid monc_tit" kname="index_oid"  keyname="coordinate" onClick="moselect(this);"></div></div></div><div class="fmbox_txt"><div class="monc"><div class="monc_mark monc_mark_d"></div><div class="monc_mark monc_mark_s"></div><div class="monc_txt" onClick="turl(\'fb\');">您要去哪儿</div></div></div></div></div>';
   $(".popby_index").html('<div class="indexby_topnav"></div>'+moval+'<div class="index_waitorder"></div><div class="index_nearby"></div>'+mosfc.indexnav('index'));
   	 momaps_add();
	}
};
