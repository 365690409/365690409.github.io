function mojzmaps_sedw(dw_oid){
  dw_position=dw_oid.split(",");;
}
function mojzmaps_dw(){
  mo_position=dw_position;
  mojzmaps();
}

function momaps_id(mo_id){
  mo_position=mo_id.split(",");
  mojzmaps();
}
function mojzmaps(){
  AMapUI.loadUI(['misc/PositionPicker'], function(PositionPicker) {
	var map = new AMap.Map('container', {
		zoom: 16,
		center: mo_position,
		scrollWheel: false
	})
	var positionPicker = new PositionPicker({
		mode: 'dragMap',
		map: map,
		iconStyle:{url:'/uploads/style/maps/mapsioc.png',size:[20,36],ancher:[10,29]}
	});
	map.add(new AMap.Marker({
		position: dw_position,
		content: '<span class="ppmaps_wz"><span class="ppmaps_wzs"></span></span>',
		offset: new AMap.Pixel(-3,-3)
	}));
	positionPicker.on('success', function(positionResult) {
	 mosuccess(positionResult);
	});
	positionPicker.on('fail', function(positionResult) {
		momaps_info('');
	});
	var onModeChange = function(e) {
		positionPicker.setMode(e.target.value)
	}
	positionPicker.start();
	map.panBy(0, 1);
  });
}
function momapsn(){
 window.parent.momapsn(document.getElementById('maps_lnglat').value,document.getElementById('maps_name').innerHTML);
}

function momaps_info(irs){
 if(irs){
  document.getElementById('ppmapscont').style.display = "block";
  document.getElementById('maps_lnglat').value = irs.oid;
  document.getElementById('maps_name').innerHTML = irs.name;
  document.getElementById('maps_address').innerHTML = irs.address;
 }else{
  document.getElementById('ppmapscont').style.display = "none";
  document.getElementById('maps_lnglat').value = '';
  document.getElementById('maps_name').innerHTML = '';
  document.getElementById('maps_address').innerHTML = '';
 }
}
function mosuccess(positionResult){
  if(positionResult.regeocode.pois[0].name){
	if(positionResult.regeocode.aois[0]){	
	maname = positionResult.regeocode.aois[0].name;
	}else{
	maname = positionResult.regeocode.pois[0].name;
	}
	maps_address=positionResult.address;
	if(positionResult.regeocode.addressComponent){
	maps_address=maps_address.replace(positionResult.regeocode.addressComponent.province,'');
	maps_address=maps_address.replace(positionResult.regeocode.addressComponent.city,'');
	}
  //alert(JSON.stringify(positionResult.regeocode.addressComponent, null, 4));
	if(maname=="广东海洋大学主校区"){
	maname=positionResult.regeocode.formattedAddress;
	maname=maname.replace(positionResult.regeocode.addressComponent.province,'');
	maname=maname.replace(positionResult.regeocode.addressComponent.city,'');
	maname=maname.replace(positionResult.regeocode.addressComponent.district,'');
	maname=maname.replace(positionResult.regeocode.addressComponent.township,'');
	maname=maname.replace(positionResult.regeocode.roads[0].name,'');
	maname=maname.replace(positionResult.regeocode.pois[0].name+"-",'');
	maname=maname.replace(positionResult.regeocode.pois[0].name,'');
	maname=maname.replace("广东海洋大学",'');
	maname=maname.replace("学生宿舍",'');
	maname=maname?"广东海洋大学-"+maname:positionResult.regeocode.pois[0].name;
	maps_address=maps_address.replace(positionResult.regeocode.addressComponent.district,'');
	maps_address=maps_address.replace(positionResult.regeocode.pois[0].name,'');
	}
	momaps_info({oid:positionResult.position,name:maname,address:maps_address});
  }else{
	momaps_info('');
  }
}
