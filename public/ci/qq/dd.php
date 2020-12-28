<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>自定义定位点图标</title>
    <link rel="stylesheet" href="https://a.amap.com/jsapi_demos/static/demo-center/css/demo-center.css"/>
    <style type="text/css">
       html,body,#container{
           height:100%;
       }
    </style>
</head>
<body>
<div id="container"></div>
<script type="text/javascript"
            src="https://webapi.amap.com/maps?v=1.4.15&key=160cab8ad6c50752175d76e61ef92c50"></script>
<script type="text/javascript">
    //初始化地图对象，加载地图
    var map = new AMap.Map('container', {
		center: [110.300832,21.151215],
        resizeEnable: true
    });
    var options = {
        'showButton': true,//是否显示定位按钮
		'buttonPosition': 'LB',//定位按钮的位置
		/* LT LB RT RB */
		'buttonOffset': new AMap.Pixel(10, 20),//定位按钮距离对应角落的距离
		'showMarker': true,//是否显示定位点
		'markerOptions':{//自定义定位点样式，同Marker的Options
		  'offset': new AMap.Pixel(-18, -36),
		  'content':'<img src="https://a.amap.com/jsapi_demos/static/resource/img/user.png" style="width:36px;height:36px"/>'
		},
		'showCircle': true,//是否显示定位精度圈
		'circleOptions': {//定位精度圈的样式
			'strokeColor': '#0093FF',
			'noSelect': true,
			'strokeOpacity': 0.5,
			'strokeWeight': 1,
			'fillColor': '#02B0FF',
			'fillOpacity': 0.25
		}
    }
    AMap.plugin(["AMap.Geolocation"], function() {
        var geolocation = new AMap.Geolocation(options);
        map.addControl(geolocation);
        geolocation.getCurrentPosition()
    });
</script>
</body>
</html>