<script>
$yu={
  ahide:function () {
	   $yk.ibodybg('');
	   $(".ppfdbox").remove();
	   $(".popby_coordinate").remove();
	   $(".ppmaps_iframe").hide();
	   $(".mobileSelect").remove();
	   $(".pplogin").remove();
	   $(".popby_list").hide();
	   $(".popby_show").html('');
	   $(".popby_show").hide();
	   $(".popby_index").hide();
  },
  popbyshow:function (yuirs){
	 $yu.ahide();
	 $(".popby_show").animate({"opacity":"100"},500).show();
	 $(".popby_show").html('<div class="mofm10">'+yuirs+'</div>');
	 $yu.tsfcursor();
  },
  ppshow:function (yuirst,yuirs){
	 $yu.popbyshow(mosfc.ppfdtop({tit:yuirst?yuirst:'&nbsp;'})+'<div class="clear40"></div>'+yuirs);
  },
  ppindex:function (yuirs){
	 $(".index_waitorder").html(yuirs);$yu.ahide();$yu.tsfcursor();
	 $(".popby_index").animate({"opacity":"100"},500).show();
  },
  tsfcursor:function () {
   $(".tsfcursor").click(function (){if($(this).attr('kkey')){jurl($(this).attr('kkey'));}}); 
  },
  urlclickk:function (yuithis) {
	switch (yuithis.attr('kkey')) {
	  case "login":
		 if(!(/^1[3456789]\d{9}$/.test(yuithis.parents(".pplogin").find("input[name='mobile']").val()))){ 
			$yw.ppt_txt("请输入正确手机号");
		 return false;
		 }	
		 $yh.sfpost("s_user/",{mobile:yuithis.parents(".pplogin").find("input[name='mobile']").val(),vcode:yuithis.parents(".pplogin").find("input[name='vcode']").val()});
		break;
	  case "p":
		$yh.sfpost("s_show/"+yuithis.attr('kid'),{});
		break;
	  case "spoi":
	   if(yuithis.attr("location")){
	   $("."+yuithis.parents(".popby_coordinate").attr("kid")).html(yuithis.attr("name")).attr("kdd",yuithis.attr("location"));
		 if(yuithis.parents(".popby_coordinate").attr("kid")=='release_oid'){
		 $(".ck_release input[name='oid']").val(yuithis.attr("location"));
		 $(".ck_release input[name='oname']").val(yuithis.attr("name"));
		 $yu.moformrun();
		  website.oid=yuithis.attr("location");
		  website.oname=yuithis.attr("name");
		 $(".index_oid").html(yuithis.attr("name")).attr("kdd",yuithis.attr("location"));
		  $.post(website.json_url+'s_user_e',{oid:yuithis.attr("location"),oname:yuithis.attr("name")});
		 }else if(yuithis.parents(".popby_coordinate").attr("kid")=='release_did'){
		 $(".ck_release input[name='did']").val(yuithis.attr("location"));
		 $(".ck_release input[name='dname']").val(yuithis.attr("name"));
		 $yu.moformrun();
		 }else if(yuithis.parents(".popby_coordinate").attr("kid")=='index_oid'){
		  website.oid=yuithis.attr("location");
		  website.oname=yuithis.attr("name");
		  $.post(website.json_url+'s_user_e',{oid:yuithis.attr("location"),oname:yuithis.attr("name")});
		 }
	   }else{
		 if($(".ck_release input[name='dname']").val()==""){
		 $(".mobileSelect").remove();
		 $(".popby_show").html('');
		 $(".popby_index").show();
		 }
	   }
	   $(".popby_coordinate").remove();
	   if($(".popby_show").html()){
		 $(".popby_index").hide();
		 $(".popby_show").show();
	   }else{
        moindex();
	   }
		break;
	  default:
		break;
	}	
  },
  urlclick:function () {
   $(".urlclick").click(function (){if($(this).attr('kkey')){$yu.urlclickk($(this));}}); 
  },
  yuload:function () {
	$("body").append('<div class="moprompt" style="z-index:887;"><div class="moprompt_cont"><div class="mtyuload"><div class="mtyuloadlr"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div></div></div></div>');
  },
  yuloadby:function (moecval) {
	$("body").append('<div class="moprompt" style="z-index:887;"><div class="moprompt_cont"><div class="mtyuload mtyuloadby"><div class="mtyuloadlr"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div><div class="mtyuload_txt">'+moecval+'</div></div></div></div>');
  },
  popcont:function (moecval) {
	$("body").append('<div class="moprobox moprobox-show"><div class="grayLayer moprobox_ree"></div><div class="moprompt_pro"><div class="moprompt_pro_cont"><div class="probox_closebox"><div class="probox_close moprobox_ree">X</div></div><div class="probox">'+moecval.d+'</div></div></div></div>');
	$(".moprobox .moprobox_ree").click(function (){$(".moprobox").remove();});
  },
  moselect:function (yuirs) {
	switch (yuirs.attr('keyname')) {
	  case "people":
	      if($yh.his_tey=="show"){
	      $yk.ppbmset({c:'people',t:'请选择出行人数',n:'若有婴儿同行，需计入乘车人数',d:mosfc.pkradio({c:'b',s:'people',d:[[1,'<span>1</span>人'],[2,'<span>2</span>人'],[3,'<span>3</span>人'],[4,'<span>4</span>人']],v:$(".ck_release input[name='people']").val()?$(".ck_release input[name='people']").val():1})+'</div>'+mosfc.moinfol({t:'是否愿意拼座',n:'不同的乘车方式车费不一样哦'})+'<div class="motb20">'+mosfc.pkradio({c:'c',s:'pok',d:[[1,'<div class="pkroc_tit">愿拼座</div>拼座成功可享折扣优惠'],[0,'<div class="pkroc_tit">独享</div>不与平台其他乘客同行']],v:$(".ck_release input[name='pok']").val()})});
		  }else{
	      $yk.ppbmset({c:'speople',t:'请选择可载人数',n:'',d:mosfc.pkradio({c:'b',s:'people',d:[[1,'<span>1</span>人'],[2,'<span>2</span>人'],[3,'<span>3</span>人'],[4,'<span>4</span>人']],v:$(".ck_release input[name='people']").val()?$(".ck_release input[name='people']").val():1})});
		  }
		  break;
	  case "coordinate":
         mosfc.selectcoordinate({kid:yuirs.attr('kname'),location:yuirs.attr('kdd'),name:yuirs.html()});
		  break;
	  case "message":
	      $yk.ppbmset({c:'message',t:'给车主留言',n:'特殊情况若未提前告知，车主可以谢绝同行',d:mosfc.pkradioc({c:'e',s:'message',d:[[1,$ye.ayemed[1]],[2,$ye.ayemed[2]],[3,$ye.ayemed[3]],[4,$ye.ayemed[4]]],v:$(".ck_release input[name='message']").val()})});
		  break;
	  case "thank":
	      $yk.ppbmset({c:'thank',t:'添加感谢费',n:'感谢费全部归属车主，添加后车主热门单积极',d:mosfc.pkradio({c:'b',s:'thank',d:[[3,'<span>3</span>元'],[5,'<span>5</span>元'],[10,'<span>10</span>元'],[20,'<span>20</span>元']],v:$(".ck_release input[name='thank']").val()})});
		  break;
	  case "1001":
         $yk.bconfirm({msg:['确定取消订单吗','再等等会有司机接你的'],n:["再想想","确定取消订单"],u:"s_owncancel/"+yuirs.attr('cid')});
		  break;
	  case "1002":
         $yk.bconfirm({msg:['确定取消订单吗','再等等可能会有乘客同行的'],n:["再想想","确定取消订单"],u:"s_owncancel/"+yuirs.attr('cid')});
		  break;
	  case "2001":
         $yk.bconfirm({msg:['请确定您真的要取消，再点击[将取消行程]','系统检测您是取消，一天最多能取消2次'],n:["再想想","确定取消订单"],u:"s_owncancel_info/"+yuirs.attr('cid')});
		  break;
	  case "2002":
         $yk.bconfirm({msg:['请确定您真的要取消，再点击[将取消行程]','系统检测您是取消，一天最多能取消2次'],n:["再想想","确定取消订单"],u:"s_owncancel_info/"+yuirs.attr('cid')});
		  break;
	  case "3001":
	    if(yuirs.attr('price')){
		$("body").append('<div class="moprobox moprobox-show"><div class="grayLayer moprobox_ree"></div><div class="moprompt_pro" style="left:20%;width:60%;background:none;"><div class="probox_closebox"><div class="probox_close moprobox_ree">X</div></div><div class="moprobox_pr"><div class="moprobox_prtit">支付<span>￥'+yuirs.attr('price')+'</span>元</div><div class="moprobox_primg">&nbsp;</div></div></div></div>');
		$(".moprobox .moprobox_ree").click(function (){$(".moprobox").remove();});
		}
        $yk.bconfirm({msg:[yuirs.html(),'欢迎使用同泰出行，目前只是体验版有很多地方做的不够请体谅'],n:["再想想","确定执行"],u:"s_strokestatus/"+yuirs.attr('cid')});
		  break;
	  case "3002":
        $yk.bconfirm({msg:['请'+yuirs.html(),'欢迎使用同泰出行，目前只是体验版有很多地方做的不够请体谅'],n:["再想想","确定到达起点"],u:"s_strokestatus/"+yuirs.attr('cid')});
		  break;
	  case "3003":
        $yk.bconfirm({msg:['乘客是否线下向您支付行程费用，请点击','确定之后将会从你余额支付费用给乘客'],n:["还没收取","已收到费用"],u:"s_orderpay/"+yuirs.attr('cid')});
		  break;
	  default:
		  break;
	}	
  },
  mosspis:function () {
	$yu.mosspis_i++;
	$(".fbhq_spoi_cont").html('<div class="yumoval_i'+$yu.mosspis_i+'"></div>');
   $.post(website.json_url+"spoi/",{name:$('.fbhq_spoi_inp').val()},function(tdata){if(tdata){$(".yumoval_i"+$yu.mosspis_i).html('<ul>'+$yk.sshow(eval("("+tdata+")"),'spoi')+'</ul>');$yu.urlclick();}});
  },
  moformrun:function () {
    $(".ck_release .pkbut").removeClass('pkbutsd').unbind("click");
	if($(".ck_release input[name='did']").val()==""){
	  $yu.moselect($(".release_did"));
	}else if($(".ck_release input[name='totime']").val()==""){
	 $(".mobileSelect_time").parents(".mobileSelect").addClass("mobileSelect-show");
	}else if($(".ck_release input[name='people']").val()==""){
	  $yu.moselect($(".release_people"));
	}else{
	  $(".ck_release .pkbut").addClass('pkbutsd').click(function (){$yh.sfpost("fbhq",$(this).parents("form").serialize());});
	  if($yh.his_tey=="show"){
	    $(".ck_release .ppfdbottom .moinfo_price_t span").html('计算中..');
	    $(".ck_release .ppfdbottom .moinfo_price_n span").html('计算中..');
	  $.post(website.json_url+'fbhq_p',$(".ck_release").serialize(),function(sfmsg_p){
	    if(sfmsg_p){
		sfmsg_p =eval("("+sfmsg_p+")");
	    $(".ck_release .ppfdbottom .moinfo_price_t span").html(sfmsg_p.price);
	    $(".ck_release .ppfdbottom .moinfo_price_n span").html(sfmsg_p.price_p);
		}
	  });
	  }
	}
  }
};

