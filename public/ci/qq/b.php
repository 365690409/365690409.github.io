<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="/uploads/style/style.css" type="text/css" rel="stylesheet" />
<link href="/uploads/style/ye.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/uploads/style/jquery_min.js"></script>
<title>海大出行选定位</title>
<style>
html, body { position:relative;
	height: 100%;
	margin: 0;
	width: 100%;
	padding: 0;
	overflow: hidden;
	font-size: 13px;
}
</style>
</head>

<body>
<iframe src="c.php?aa=1" id="myFrame" style=" display:none;width:100%; height:50px;"></iframe>
<div class="ppmaps">
<div class="ppmapscont yebox"> <div class="mofm10"><input type="hidden" id='maps_lnglat' name="" value="" /><div id='maps_name'></div><div id='maps_address'></div></div>
</div>
</div>

<div id="container" style="height: 100%;width: 100%;" tabindex="0"></div>
<script type="text/javascript" src='//webapi.amap.com/maps?v=1.4.15&key=160cab8ad6c50752175d76e61ef92c50&plugin=AMap.ToolBar'></script> 
<!-- UI组件库 1.0 --> 
<script src="//webapi.amap.com/ui/1.0/main.js?v=1.0.11"></script> 
<script type="text/javascript">
function aaa(olng,olat,oname) {
    AMapUI.loadUI(['misc/PositionPicker'], function(PositionPicker) {
        var map = new AMap.Map('container', {
            zoom: 16,
			center: [olng,olat],
            scrollWheel: false
        })
        var positionPicker = new PositionPicker({
            mode: 'dragMap',
            map: map
        });
        positionPicker.on('success', function(positionResult) {
            document.getElementById('maps_lnglat').value = positionResult.position;
			if(positionResult.regeocode.pois[0].name){
            document.getElementById('maps_name').innerHTML = positionResult.regeocode.pois[0].name;
			}else{
            document.getElementById('maps_name').innerHTML = ' ';
			}
			maps_address=positionResult.address.replace('广东省湛江','..');
            document.getElementById('maps_address').innerHTML = maps_address;
	  <?php 
	  if($_GET[aa]==1){
	  echo '
	  window.parent.momaps(positionResult.position,positionResult.regeocode.pois[0].name);
	  ';
	  }
	  ?>
			
			
        });
        positionPicker.on('fail', function(positionResult) {
            document.getElementById('maps_lnglat').value = ' ';
            document.getElementById('maps_name').innerHTML = ' ';
            document.getElementById('maps_address').innerHTML = ' ';
        });
        var onModeChange = function(e) {
            positionPicker.setMode(e.target.value)
        }
        positionPicker.start();
        map.panBy(0, 1);
    });
// $(".index_oid").html(oname);
// $(".index_oid").attr('kdd',olng+','+olat);
};
	
</script>
</body>
</html>