<script>
function modate() {
var today = new Date();
return "上次更新 "+(today.getMonth()+1)+"-"+today.getDate()+" "+today.getHours() + ":"+ today.getMinutes();
}
wbemodate=modate();
var refresher_ey=0;
var refresher = {
	rrn: function(moname,moi){
return '<div class="wrtop"><div class="wrtopl"><span class="'+(moi==2?'icono-sync spin':'arr arr_'+moi)+'"></span></div><div class="wrtoptxt"><div class="wrtopt">'+moname+'</div><div class="wrtopn">'+wbemodate+'</div></div></div>';},
	info: {
		"pullDownLable": "刷新完毕",
		"pullingDownLable": "释放立即刷新",
		"pullUpLable": "拉上正在加载...",
		"pullingUpLable": "释放立即加载",
		"loadingLable": "正在刷新..."
	},
	init: function(parameter) {
		var wrapper = document.getElementById(parameter.id);
		var div = document.createElement("div");
		div.className = "scroller";
		wrapper.appendChild(div);
		var scroller = wrapper.querySelector(".scroller");
		var list = wrapper.querySelector("#" + parameter.id + " ul");
		scroller.insertBefore(list, scroller.childNodes[0]);
		var pullDown = document.createElement("div");
		pullDown.className = "pullDown";
		var loader = document.createElement("div");
		loader.className = "loader";
		for (var i = 0; i < 4; i++) {
			var span = document.createElement("span");
			loader.appendChild(span);
		}
		pullDown.appendChild(loader);
		var pullDownLabel = document.createElement("div");
		pullDownLabel.className = "pullDownLabel";
		pullDown.appendChild(pullDownLabel);
		scroller.insertBefore(pullDown, scroller.childNodes[0]);
		var pullUp = document.createElement("div");
		pullUp.className = "pullUp";
		var loader = document.createElement("div");
		loader.className = "loader";
		for (var i = 0; i < 4; i++) {
			var span = document.createElement("span");
			loader.appendChild(span);
		}
		pullUp.appendChild(loader);
		var pullUpLabel = document.createElement("div");
		pullUpLabel.className = "pullUpLabel";
		<?php /* var content = document.createTextNode(refresher.info.pullUpLable);
		pullUpLabel.appendChild(content);*/ ?>
		pullUp.appendChild(pullUpLabel);
		scroller.appendChild(pullUp);
		var pullDownEl = wrapper.querySelector(".pullDown");
		var pullDownOffset = pullDownEl.offsetHeight;
		var pullUpEl = wrapper.querySelector(".pullUp");
		var pullUpOffset = pullUpEl.offsetHeight;
		this.scrollIt(parameter, pullDownEl, pullDownOffset, pullUpEl, pullUpOffset);
	},
	scrollIt: function(parameter, pullDownEl, pullDownOffset, pullUpEl, pullUpOffset) {
		eval(parameter.id + "= new iScroll(parameter.id, {useTransition: true,vScrollbar: false,topOffset: pullDownOffset,onRefresh: function () {refresher.onRelease(pullDownEl,pullUpEl);},onScrollMove: function () {refresher.onScrolling(this,pullDownEl,pullUpEl,pullUpOffset);},onScrollEnd: function () {refresher.onPulling(pullDownEl,parameter.pullDownAction,pullUpEl,parameter.pullUpAction);},})");
		pullDownEl.querySelector('.pullDownLabel').innerHTML =  refresher.rrn('拉下可以刷新',1);
		document.addEventListener('touchmove', function(e) {
			e.preventDefault();
		}, false);
	},
	onScrolling: function(e, pullDownEl, pullUpEl, pullUpOffset) {<?php /*开始*/ ?>
		if (e.y > -(pullUpOffset)) {
			pullDownEl.style.display = "block";
			pullDownEl.id = '';
			pullDownEl.querySelector('.pullDownLabel').innerHTML = refresher.info.pullDownLable+wbemodate;
			e.minScrollY = -pullUpOffset;
		}
		if (e.y > 0) {
			pullDownEl.classList.add("flip");
			if(refresher_ey>e.y){
			refresher_ey=e.y;
			pullDownEl.querySelector('.pullDownLabel').innerHTML = refresher.rrn('释放立即刷新',0);
			}else{
			refresher_ey=e.y;
			pullDownEl.querySelector('.pullDownLabel').innerHTML = refresher.rrn('拉下可以刷新',1);
			}
			e.minScrollY = 0;
		}
		if (e.scrollerH < e.wrapperH && e.y < (e.minScrollY - pullUpOffset) || e.scrollerH > e.wrapperH && e.y < (e.maxScrollY - pullUpOffset)) {
			pullUpEl.style.display = "block";
			pullUpEl.classList.add("flip");
			pullUpEl.querySelector('.pullUpLabel').innerHTML = refresher.info.pullingUpLable;
		}
		if (e.scrollerH < e.wrapperH && e.y > (e.minScrollY - pullUpOffset) && pullUpEl.id.match('flip') || e.scrollerH > e.wrapperH && e.y > (e.maxScrollY - pullUpOffset) && pullUpEl.id.match('flip')) {
			pullDownEl.classList.remove("flip");
			pullUpEl.querySelector('.pullUpLabel').innerHTML = refresher.info.pullUpLable;
		}
		
	},
	onRelease: function(pullDownEl, pullUpEl) {<?php /*结束*/ ?>
		if (pullDownEl.className.match('loading')) {
			pullDownEl.classList.toggle("loading");
			pullDownEl.querySelector('.pullDownLabel').innerHTML = refresher.rrn('刷新完毕',3);
			 <?php /*pullDownEl.querySelector('.loader').style.display = "none";*/ ?>
		}
		if (pullUpEl.className.match('loading')) {
			pullUpEl.classList.toggle("loading");
			pullUpEl.querySelector('.pullUpLabel').innerHTML = refresher.info.pullUpLable;
			pullUpEl.querySelector('.loader').style.display = "none";
			pullUpEl.style.display = "none";
		}
	},
	onPulling: function(pullDownEl, pullDownAction, pullUpEl, pullUpAction) {<?php /*刷新*/ ?>
		if (pullDownEl.className.match('flip') <?php /*&&!pullUpEl.className.match('loading')*/ ?> ) {
			pullDownEl.classList.add("loading");
			pullDownEl.classList.remove("flip");
			pullDownEl.querySelector('.pullDownLabel').innerHTML = refresher.rrn('正在刷新...',2);
			 <?php /*pullDownEl.querySelector('.loader').style.display = "block";*/ ?>
			pullDownEl.style.lineHeight = "20px";
			if (pullDownAction) pullDownAction();
		}
		if (pullUpEl.className.match('flip') <?php /*&&!pullDownEl.className.match('loading')*/ ?> ) {
			pullUpEl.classList.add("loading");
			pullUpEl.classList.remove("flip");
			pullUpEl.querySelector('.pullUpLabel').innerHTML = refresher.info.loadingLable;
			pullUpEl.querySelector('.loader').style.display = "block";
			pullUpEl.style.lineHeight = "20px";
			if (pullUpAction) pullUpAction();
		}
	}
};