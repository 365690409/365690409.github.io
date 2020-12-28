<script>
<?php /* 百度坐标转高德（传入经度、纬度）
function bd_decrypt(bd_lng,bd_lat) {
    var X_PI = Math.PI * 3000.0 / 180.0;
    var x = bd_lng - 0.0065;
    var y = bd_lat - 0.006;
    var z = Math.sqrt(x * x + y * y) - 0.00002 * Math.sin(y * X_PI);
    var theta = Math.atan2(y, x) - 0.000003 * Math.cos(x * X_PI);
    var gg_lng = z * Math.cos(theta);
    var gg_lat = z * Math.sin(theta);
    var array=new Array();
    array.push(gg_lng);
    array.push(gg_lat);
    return array;
}
*/?>
function mpass_appadd(){
	if($yh.site.browser=="mapp"){
		momaps_add();
	}else{
	$("body").append('<div class="maps_iframe"><iframe style="display:none;" width="100%" height="30%" frameborder=0 scrolling="no" src="https://apis.map.qq.com/tools/geolocation?key=YFUBZ-Y7MWW-GPJRN-RL7XB-ZE7O2-7UFWT&referer=myapp&effect=zoom"></iframe></div>');
	window.addEventListener("message", function(event) {var loc = event.data;console.log("location", loc);if(loc  && loc.module == "geolocation") {if(loc.city=="湛江市"){
   $.post("./mapssedw",{m:loc.lng+","+loc.lat},function(maos_dd){
	if(maos_dd){maos_dd=eval("("+maos_dd+")");
	 if($yh.momapsnss_i==2){
	 document.getElementById("ppmaps_iframe").contentWindow.mojzmaps_sedw(maos_dd.oid);
	 }
	}
   });
	}
	}}, false);
  
  }
}
function momaps(oid,oname){
  $(".maps_iframe").remove();
  if(oname){
   $(".index_oid").html(oname).attr('kdd',oid);
   website.oid=oid;
   website.oname=oname;
  }
}
function momaps_add(){
	if($yh.site.browser=="mapp"){
	jsBridge.ready(function () {
	jsBridge.bdloc.getCurrentPosition({
	  coorType: 'BD09ll',
	  watch: false
	}, function(position) {
	   $.post("./mapsmr",position,function(maos_dd){
			if(maos_dd){maos_dd=eval("("+maos_dd+")");
			 if($yh.momapsnss_i==2){
			 document.getElementById("ppmaps_iframe").contentWindow.mojzmaps_sedw(maos_dd.oid);
			 }else if($yh.momapsnss_i==0){
			   $(".index_oid").html(maos_dd.oname).attr('kdd',maos_dd.oid);
			   website.oid=maos_dd.oid;
			   website.oname=maos_dd.oname;
			 }
			}
	   });
	  result.JSONView(position);
	});
	});
	}else{
	$("body").append('<div class="maps_iframe"><iframe style="display:none;" width="100%" height="30%" frameborder=0 scrolling="no" src="https://apis.map.qq.com/tools/geolocation?key=YFUBZ-Y7MWW-GPJRN-RL7XB-ZE7O2-7UFWT&referer=myapp&effect=zoom"></iframe></div>');
	window.addEventListener("message", function(event) {var loc = event.data;console.log("location", loc);if(loc  && loc.module == "geolocation") {if(loc.city=="湛江市"){
   $.post("./mapssedw",{m:loc.lng+","+loc.lat},function(maos_dd){
		if(maos_dd){maos_dd=eval("("+maos_dd+")");
		   $(".index_oid").html(maos_dd.oname).attr('kdd',maos_dd.oid);
		   website.oid=maos_dd.oid;
		   website.oname=maos_dd.oname;
		   document.getElementById("ppmaps_iframe").contentWindow.mojzmaps_sedw(maos_dd.oid);
		}
   });
	}
	}}, false);
	}
}

function momapsn_add(mo_location){
  if($yh.momapsnss_i==0){
   $("body").append('<iframe src="/smaps?m='+mo_location+'" id="ppmaps_iframe" class="ppmaps_iframe" style="padding:0; margin:0; border:0;width:100%; height:100%;"></iframe>');
   $yh.momapsnss_i=1;
  }else{
   $(".ppmaps_iframe").show();
   if($yh.momapsnss_i==2){
    mpass_appadd();   
   document.getElementById("ppmaps_iframe").contentWindow.momaps_id(mo_location);
   }
  }
}
function momapsn(oid,oname){
  $(".ppmaps_iframe").hide();
  $(".popby_coordinate").remove();
  if(oname){
   $(".index_oid").html(oname).attr('kdd',oid);
   website.oid=oid;
   website.oname=oname;
   moindex();
   $.post(website.json_url+'s_user_e',{oid:oid,oname:oname});
  }
}

function phpweixitop(){
   $(".phpweixitop").height(40);
   setTimeout(function () {$(".phpweixitop").height(0);},4000);
}
function moppfdbox() {
   $(".ppfdbox").remove();
}
function moselect(cthis) {
  $yu.moselect($(cthis));
}

function seinfo(cthis){
  if( $(cthis).removeClass('pkbutsd').attr('kdd')==1){
  $(cthis).removeClass('pkbutsd').attr('kdd',0);
  se_setxt=$(cthis).parents(".fbbox").find("input[name='setxt']").val();
  $(cthis).parents(".fbbox").find("input[name='setxt']").val("").focus();
  $yu.yuload();
  $.post(website.json_url+"in/se/"+$(cthis).attr('cid'),{d:se_setxt},function(semsg_seinfo){
	$('.moprompt').remove();
	semsg=eval("("+semsg_seinfo+")");
	$(".seinfo_show_"+semsg.id).html($yk.sshow(semsg.clist,'seinfo'));
	$yh.mrrunmsg_seinfo_cun=semsg_seinfo;
	document.body.scrollTop =document.body.scrollHeight;
  });
  }else{
  $yw.ppt_txt("请输入内容");
  $(cthis).parents(".fbbox").find("input[name='setxt']").val("").focus();
  }
}

function moyz(cthis){
	if(cthis.value.length==4){
	$(".pplogin").focus();
	$yu.urlclickk($(cthis));
	}else{
	cthis.value=cthis.value.length>4?cthis.value.substr(0,4):cthis.value;
	}
}
function morun(cthis){
	$yu.moselect($(cthis));	
}
function pkradio(cthis){
  if($(cthis).attr('ktype')=="people" || $(cthis).attr('ktype')=="pok"){
  $(cthis).parents(".ppfdbottom").find("input[name='"+$(cthis).attr('ktype')+"']").val($(cthis).attr('kdd'));
  $(cthis).parents(".ppfdbottom").find(".moradio_"+$(cthis).attr('ktype')).removeClass("pkrosd");
  $(cthis).addClass('pkrosd');
  }else{
  if($(cthis).parents(".ppfdbottom").find("input[name='"+$(cthis).attr('ktype')+"']").val()==$(cthis).attr('kdd')){
  $(cthis).parents(".ppfdbottom").find("input[name='"+$(cthis).attr('ktype')+"']").val('');
  $(cthis).parents(".ppfdbottom").find(".moradio_"+$(cthis).attr('ktype')).removeClass("pkrosd");
  }else{
  $(cthis).parents(".ppfdbottom").find("input[name='"+$(cthis).attr('ktype')+"']").val($(cthis).attr('kdd'));
  $(cthis).parents(".ppfdbottom").find(".moradio_"+$(cthis).attr('ktype')).removeClass("pkrosd");
  $(cthis).addClass('pkrosd');
  }
  }
}
function pksbut(cthis){
  switch ($(cthis).attr('kdd')) {
	case "release_speople":
	   $(".ck_release .release_people").html($(cthis).parents(".ppfdbottom").find("input[name='people']").val()+'人');
	   $(".ck_release input[name='people']").val($(cthis).parents(".ppfdbottom").find("input[name='people']").val());
	   moppfdbox();
	   $yu.moformrun();
		break;
	case "release_people":
	   $(".ck_release .release_people").html($(cthis).parents(".ppfdbottom").find("input[name='people']").val()+'人 '+($(cthis).parents(".ppfdbottom").find("input[name='pok']").val()==1?'愿拼座':'独享'));
	   $(".ck_release input[name='people']").val($(cthis).parents(".ppfdbottom").find("input[name='people']").val());
	   $(".ck_release input[name='pok']").val($(cthis).parents(".ppfdbottom").find("input[name='pok']").val());
	   moppfdbox();
	   $yu.moformrun();
		break;
	case "release_thank":
	   $(".ck_release .release_thank").html($(cthis).parents(".ppfdbottom").find("input[name='thank']").val()?$(cthis).parents(".ppfdbottom").find("input[name='thank']").val()+'元':'添加感谢费');
	   $(".ck_release input[name='thank']").val($(cthis).parents(".ppfdbottom").find("input[name='thank']").val());
	   moppfdbox();
	   $yu.moformrun();
		break;
	case "release_message":
	   $(".ck_release .release_message").html($(cthis).parents(".ppfdbottom").find("input[name='message']").val()?'已留言':'添加留言');
	   $(".ck_release input[name='message']").val($(cthis).parents(".ppfdbottom").find("input[name='message']").val());
	   moppfdbox();
		break;
	default:
		break;
  }	
}


<?php 
/*
function pkradio2(cthis){
  $.each($(cthis).parents(".ppfdbottom").find('input'),function(i,j){ 
  alert($(j).val());
  });
}

function mswitch(cthis){
  if($(cthis).attr("dkey")==1){
   $(cthis).children(".mswitchbox").removeClass("off");
   $(cthis).attr("dkey",0)
  }else{
   $(cthis).children(".mswitchbox").addClass("off");
   $(cthis).attr("dkey",1)
  }
}
*/
?>