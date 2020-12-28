<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="/uploads/style/jquery_min.js"></script>
<script type="text/javascript" src="/uploads/style/jsbridge-mini.js"></script>
<title>浏览器定位</title>
</head>
<body>
<div id="cnt"></div>
<div id="result"></div>
<div id="view"></div>

</body>
</html>
<script type="text/javascript">
$("#cnt").hide();
var result = $("#result").text("定位中...");    
$('html,body').animate({scrollTop: $('#view').offset().top}, 1200);
//发起定位
jsBridge.bdloc.getCurrentPosition({
  //可选，设置返回经纬度坐标类型，默认 GCJ02
  //GCJ02: 国测局坐标
  //BD09LL: 百度经纬度坐标
  //BD09: 百度墨卡托坐标
  //WGS84: GPS地心坐标
  //海外地区定位统一返回 WGS84 地心坐标
  coorType: 'BD09ll',

  //可选, 连续定位, 当位置变化时会收到回调通知, 默认 false
  //调用 jsBridge.bdloc.stop() 停止观察
  watch: false
}, function(position) {
  result.JSONView(position);
  $("#result").text(result.lng); 
});
</script>
