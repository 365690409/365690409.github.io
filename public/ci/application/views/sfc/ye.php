<script>
$ye={
  clear:function (ayemsg) {return '<div class="clear'+ayemsg+'"></div>';},
  hfm:function (hyemsg,hyemsgv) {return '<div class="mofm'+hyemsgv+'">'+hyemsg+'</div>';},
  hlr:function (hyemsg,hyemsgv) {return '<div class="molr'+hyemsgv+'">'+hyemsg+'</div>';},
  ayedate:function (ayemsg) {return '<span class="yeadate">'+ayemsg+'</span>';},
  ayepeople:function (ayemsg) {return '<span class="yeapeople"><span>'+ayemsg+'</span>人</span>';},
  ayekpeople:function (ayemsg) {return '<span class="yeapeople">可载<span>'+ayemsg+'</span>人</span>';},
  ayepok:function (ayemsg) {return ayemsg==1?'<span class="yeapok">愿拼车</span>':'<span class="yeapno">独享</span>';},
  ayemed:['','有大件行李','有宠物，我会照看好','有孕妇/老人，请多关照','帮他人下单，有问题随时联系'],
  ayeme:function (ayemsg) {return '<span class="yeame">'+$ye.ayemed[ayemsg]+'</span>';},
  ayepay:function (ayemsg) {return ayemsg==0?'<span class="yeapayno">未支付</span>':'<span class="yeapay">已支付</span>';},
  ayepis:function (ayemsg) {return '<span class="yeapis">拼车</span>';},
  ayesld:function (ayemsg) {return '<span class="yeasld"><span>'+ayemsg+'%</span>顺路度</span>';},
  ayekm:function (ayemsg) {return '<span class="km">'+getanalysis(website.oid,ayemsg)+'km</span>';},
  ayeus:function (ayemsg) {return '<span class="yeaus"><div class="yeausimg avatar_'+ayemsg.avatarid+'"></div>'+ayemsg.callname+'</span>';},
  ayetxt:function (ayemsg) {return '<span class="yeatxt">'+ayemsg+'</span>';},
  ayetelinfo:function (ayemsg) {
	var ayethm=''; 
	ayethm+='<div class="yeat">';
	ayethm+=ayemsg[0]?'<a href="tel:'+ayemsg[0]+'" class="motel"></a>':'';
	ayethm+=ayemsg[1]?'<span class="mogl"></span><span class="momessage" onclick="jurl(\'in_seinfo_'+ayemsg[1]+'\');">'+(ayemsg[2]>0?'<span></span>':'')+'</span>':'';
	ayethm+='</div>';
	return ayethm;},
  <?php /*初步组合*/ ?>
  byecadd:function (byemsg,byemsgv) {return '<div class="yecadd"><div class="yemark yemark'+byemsgv+'"></div>'+byemsg.name+(byemsg.oid?$ye.ayekm(byemsg.oid):'')+(byemsg.address?'<p>'+byemsg.address+'</p>':'')+'</div>';},
  byecdr:function (byemsg){
  var byethm='';
  if(byemsg.price){
  if(byemsg.price_p){
  byethm+='<div class="yeajg"><span>'+byemsg.price+'</span>元</div>';
  byethm+='<div class="yeajgp">拼成<span>'+byemsg.price_p+'</span>元</div>';
  }else{
  byethm+='<div class="yeajg">￥<span>'+byemsg.price+'</span>元</div>';
  }
  }else{
  byethm+=byemsg.price_p?'<div class="yeajg">已拼<span>'+byemsg.price_p+'</span>元</div>':'';
  }
  byethm+=byemsg.thank>0?'<div class="yeathank">含感谢费<span>'+byemsg.thank+'</span>元</div>':'';
  byethm+=byemsg.non?'<div class="yeanon">'+byemsg.non+'</div>':'';
  byethm+=byemsg.t?'<div class="yeat">'+byemsg.t+'</div>':'';
  byethm+=byemsg.mobile?'<div class="yeat"><a href="tel:'+byemsg.mobile+'" class="motel"></a></div>':'';
  byethm+=byemsg.telinfo?$ye.ayetelinfo(byemsg.telinfo):'';
  byethm+=byemsg.sld?$ye.ayesld(byemsg.sld):'';
  return byethm;
  },
  byeusbox:function (byemsg) {
  var byethm='<div class="mousbox">';
  byethm+='<div class="mousbox_img avatars avatar_'+byemsg.avatarid+'"></div>';
  byethm+='<div class="mousbox_txt"><div class="mousbox_txt_t">'+byemsg.callname+'</div><div class="mousbox_txt_s">'+byemsg.d+'</div></div>';
  byethm+='</div>';
  return  byethm;
  },
  <?php /*继续组合*/ ?>
  cyeusdbox:function (cyemsg){
  var cyethm='';
  cyethm+=$ye.byeusbox(cyemsg.us);
  cyethm+=cyemsg.r?'<div class="yelr_r">'+$ye.byecdr(cyemsg.r)+'</div>':'';
  return cyethm;
  },
  cyelr:function (cyemsg){
  var cyethm='';
  cyethm+=cyemsg.r?'<div class="yelr_r">'+$ye.byecdr(cyemsg.r)+'</div>':'';
  cyethm+=$ye.ayeus(cyemsg.us);
  return '<div class="yelr motb3">'+cyethm+'</div>';
  },
  cyecd:function (cyemsg){
  var cyethm='';
  cyethm+=cyemsg.r?'<div class="yerow_r">'+$ye.byecdr(cyemsg.r)+'</div>':'';
  cyethm+='<div class="motb3">'+$ye.byecadd(cyemsg.o,'o')+'</div>';
  cyethm+='<div class="motb3">'+$ye.byecadd(cyemsg.d,'d')+'</div>';
  return cyethm;
  },
  <?php /*再继续组合*/ ?>
  kyerow:function (kyemsg) {
   <?php /*{todate:'11月01日 15:5',people:1,message:2,sld:'80',cd:{o:{name:"广东海洋大学"},d:{name:"万达广场",oid:'110.300832,21.151215',address:'海滨路'},r:{price:39.9,price_p:31.8,sld:90}}}*/ ?>
   var kyethm='';
   ki=0;
   for(km in kyemsg){
	   kyethm+=ki==0?'':'<span class="yeapan"><span></span></span>';
	switch (km) {
	  case "todate":
        kyethm+=$ye.ayedate(kyemsg[km]);
		break;
	  case "people":
        kyethm+=$ye.ayepeople(kyemsg[km]);
		break;
	  case "kpeople":
        kyethm+=$ye.ayekpeople(kyemsg[km]);
		break;
	  case "message":
        kyethm+=$ye.ayeme(kyemsg[km]);
		break;
	  case "sld":
        kyethm+=$ye.ayesld(kyemsg[km]);
		break;
	  case "rjg":
        kyethm+=$ye.byerjg(kyemsg[km]);
		break;
	  case "cd":
        kyethm+=$ye.cyecd(kyemsg[km]);
		break;
	  case "yelr":
        kyethm+=$ye.cyelr(kyemsg[km]);
		break;
	  case "usdbox":
        kyethm+=$ye.cyeusdbox(kyemsg[km]);
		break;
	  case "pok":
        kyethm+=$ye.ayepok(kyemsg[km]);
		break;
	  case "pay":
        kyethm+=$ye.ayepay(kyemsg[km]);
		break;
	  case "pis":
        kyethm+=$ye.ayepis(kyemsg[km]);
		break;
	  case "txt":
        kyethm+=$ye.ayetxt(kyemsg[km]);
		break;
	}
	   ki++;
   }
   return '<div class="yerow">'+kyethm+'</div>';
  },
  <?php /*展示组合*/ ?>
  syerow:function (syemsg) {
   var syethm='';
	syethm+=$ye.hfm($ye.kyerow({usdbox:{us:{callname:"袁司机",avatarid:1},r:{mobile:13560515715}}}),"8 mobm");
	syethm+=$ye.hfm($ye.kyerow({todate:'11月01日 15:5',people:1,pok:0,message:2}),"8 mobm");
	syethm+=$ye.hfm($ye.kyerow({cd:{o:{name:"广东海洋大学"},d:{name:"万达广场",oid:'110.300832,21.151215'},r:{price:39.9,price_p:31.8,thank:10}}}),"8 mobm");
	syethm+='<div class="pkbut  pkbutsd" onclick="mostroke(7)">确定同行</div>';
	syethm+=$ye.clear(50);
   return '<div class="ppfdbottom"><div class="mofm16">'+syethm+'</div></div>';
  }
};
