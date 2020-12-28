<script>
<?php
include ("yw.php");
include ("yk.php");
include ("yu.php");
include ("ye.php");
include ("yh.php");
include ("ya.php");
include ("show.php");
include ("from.php");
include ("math.php");
?>
function sfthm(sfmsg) {
  switch (sfmsg.l_type) {
  case "p_waitlist": <?php /*待处理订单列表*/ ?>
  $yk.hwait($yk.sshow(sfmsg.clist,'cwait'));
  break;
  case "p_moshow": <?php /*显示行程信息*/ ?>
  $yk.ppbm($yk.obstroke(sfmsg));
  break;
  case "g_seinfo": <?php /*乘客订单信息*/ ?>
  $yu.popbyshow(mosfc.ppfdtop({tit:sfmsg.name})+'<div class="seinfo"><div class="ppfdbm"><div class="fbbox"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td><input type="text" name="setxt" value="" /></td><td width="10"></td><td><div class="pkbut" onclick="seinfo(this);" cid="'+sfmsg.id+'" kdd="0">发送</div></td></tr></table></div></div><div class="seinfo_show_top"><div class="fmbox mofm8">该功能系统还在优化中..</div></div><input type="hidden" name="mrwebuul" value="in/seinfo/'+sfmsg.id+'" /><div class="seinfo_show seinfo_show_'+sfmsg.id+'">'+$yk.sshow(sfmsg.clist,'seinfo')+'</div></div>');
  $(".fbbox input[name='setxt']").click(function (){document.body.scrollTop =document.body.scrollHeight;setTimeout(function () {document.body.scrollTop =document.body.scrollHeight;},1000);}).on('input propertychange',function(){document.body.scrollTop =document.body.scrollHeight;
   if($(".fbbox input[name='setxt']").val()==""){
	 $(".fbbox .pkbut").removeClass('pkbutsd').attr('kdd',0);
   }else{
	 $(".fbbox .pkbut").addClass('pkbutsd').attr('kdd',1);
   }
  }); 
  setTimeout(function () {document.body.scrollTop =document.body.scrollHeight;},1000);
  $yh.mrrunmsg_seinfo_focus();
  break;
  case "show_passenger": <?php /*乘客订单信息*/ ?>
  $yu.popbyshow('<input type="hidden" name="mrwebuul" value="o/'+sfmsg.id+'" /><div class="ordershow_'+sfmsg.id+'">'+mosfc.showorder(sfmsg)+'</div>');
  $yk.ibodybg(sfmsg.by);
  break;
  case "g_ld": 
  $yk.hpopbylist(sfmsg); 
  break;
  case "g_ldlist": 
  $yk.hwrapper($yk.sinfold(sfmsg.slist,sfmsg.l_list));
  break;
  case "g_maps": <?php /*地图*/ ?>
  $yu.popbyshow(mosfc.ppfdtop({tit:"行程路线"})+'<iframe src="maps?key='+sfmsg.toid+'" width="100%" height="'+$("body").height()+'" style="border:0px; margin:0px; padding:0px;"></iframe>');
  break;
  case "g_setshow": <?php /*个人信息*/ ?>
  $yu.popbyshow(mosfc.myuser(sfmsg)+mosfc.indexnav('setus'));
  break;
  case "g_sinfo": <?php /*信息*/ ?>
  $yu.popbyshow(mosfc.sinfo(sfmsg)+mosfc.indexnav('setus'));
  break;
  case "g_yjlby": <?php /*订单记录*/ ?>
  $yu.popbyshow(mosfc.ppfdtop({tit:sfmsg.name})+'<div class="clear40"></div>'+$yk.sinfo(sfmsg.slist,'myorder')+mosfc.indexnav('yjlby'));
  break;
  case "g_prompt": <?php /*系统信息*/ ?>
  $yu.popbyshow(mosfc.ppfdtop({tit:sfmsg.name})+'<div class="clear40"></div>'+$yk.sinfo(sfmsg.clist,'myprompt')+mosfc.indexnav('prompt'));
  break;
  case "my_quota": <?php /*我的额度*/ ?>
	mohtm='';
	mohtm+='<div class="fmbox">';
	mohtm+='<div class="mofm10 mobm">';
	for(mom in sfmsg.quotalist){
	mohtm+='<div class="ecadlt"><div class="ecadlt_li"><div class="ecadlt_fr">1转2</div>用户转账</div><div class="ecadlt_li2"><div class="ecadlt_fr">200.00</div>12月09日 15:12</div></div>';
	}
	mohtm+='</div>';
	mohtm+='</div>';
  $yu.popbyshow(mosfc.ppfdtop({tit:'余额明细'})+'<div class="clear40"></div>'+mohtm);
  break;
  case "code_mobile": <?php /*登录注册提示*/ ?>
	if(sfmsg.kname){$yw.ppt_txt(sfmsg.kname);}
	if(sfmsg.s==1){
	  $yh.inowdl();
	}else if(sfmsg.s==2){
	 var mohtm=mosfc.moinfo({t:'输入验证码',n:'<input type="hidden" name="mobile" value="'+sfmsg.mobile+'" />'+sfmsg.st});
	  mohtm+='<div class="motb20">';
	  mohtm+='<div class="fbhq_sjbx_vcode"><div class="vcodebox"><input name="vcode" type="number" oninput="moyz(this);" onblur="moyz(this);" onchange="moyz(this);" onclick="this.value=\'\';" value="" kkey="login"><div class="vcodeboxp"><span></span><span></span><span></span><span></span></div></div>';
	  mohtm+='</div>';
	  $(".pplogin .pplogin_box").html(mohtm);
	  $(".pplogin input[name='vcode']").focus();
	}
  break;
  case "code": <?php /*提示*/ ?>
	$yw.ppt_txt(sfmsg.l_name);
  break;
  case "codeok": <?php /*成功提示*/ ?>
	if(sfmsg.kname){$yw.ppt_txt(sfmsg.kname);}
	if(sfmsg.orderid){$(".ppfdbox").remove();turl('o_'+sfmsg.orderid);}
	if(sfmsg.index==1){turl('index');}
	if(sfmsg.index==2){moindex();}
  break;
  case "edit_fbhq": <?php /*发布提示*/ ?>
	if(sfmsg.kname){$yw.ppt_txt(sfmsg.kname);}
	turl('c_'+sfmsg.id);
	$.post(website.json_url+'fbhqse/'+sfmsg.id);
  break;
  case "logcode": <?php /*登录提示*/ ?>
	 mosfc.popbylogin();
  break; 
  case "lochref": <?php /*登录提示*/ ?>
	 window.location.href='/';
  break; 
  default:
  sfthm_o(sfmsg);
  break; 
 }
}