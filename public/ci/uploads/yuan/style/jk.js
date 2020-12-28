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
  itbshow:function (ykirs){
	  return ykirs.v?'<tr><th width="20%"><span>'+ykirs.t+'</span</th><td><div class="fmboxshow">'+ykirs.v+'</div></td></tr>':'';
	  },
  itbshowbox:function (ykhrs){
	  ykhrshtm='<div class="fmbox"><div class="fmint mofm10"><table width="100%" border="0" cellspacing="0" cellpadding="0">';
	  for(ykhrsm in ykhrs){
	  ykhrshtm+=$yk.itbshow(ykhrs[ykhrsm]);
	  }
	  ykhrshtm+='</table></div></div>';
	  return ykhrshtm;},
  ppbmset:function (ykpbrs){
	$yk.ppbm('<div class="ppfdbottom"><div class="mofm16">'+mosfc.moinfol({t:'<div class="moclose" onClick="moppfdbox();">X</div>'+ykpbrs.t,n:ykpbrs.n})+'<div class="motb20">'+ykpbrs.d+'</div><div class="pkbut pkbutsd" kdd="release_'+ykpbrs.c+'"onclick="pksbut(this);"">确定</div></div></div>');
  }
};