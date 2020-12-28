<html>
<body>
<iframe style="display:none;" width="100%" height="30%" frameborder=0 scrolling="no" src="https://apis.map.qq.com/tools/geolocation?key=YFUBZ-Y7MWW-GPJRN-RL7XB-ZE7O2-7UFWT&referer=myapp&effect=zoom"></iframe>
<script type="text/JavaScript">
  window.addEventListener("message", function(event) {
  var loc = event.data;console.log("location", loc);
	if(loc  && loc.module == "geolocation") {
      window.location.href="/smapsdw?m="+loc.lng+","+loc.lat;
	}
  }, false);
</script>
</body>
</html>
