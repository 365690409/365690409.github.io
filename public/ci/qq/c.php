<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>加载定位组件中..</title>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
</head>
<body>
<iframe style="display:none;" width="100%" height="30%" frameborder=0 scrolling="no" src="https://apis.map.qq.com/tools/geolocation?key=YFUBZ-Y7MWW-GPJRN-RL7XB-ZE7O2-7UFWT&referer=myapp&effect=zoom"></iframe>
<script type="text/JavaScript">
  window.addEventListener("message", function(event) {
  var loc = event.data;console.log("location", loc);
	if(loc  && loc.module == "geolocation") {
	  <?php 
	  if($_GET[aa]==1){
	  echo 'window.parent.aaa(loc.lng,loc.lat,loc.addr);';
	  }else{
	  echo 'document.body.innerHTML =JSON.stringify(loc, null, 4);';
	  }
	  ?>
	}
  }, false);
</script>
</body>
</html>
