window.ysdt = {
    info: {
        destination: 'amap-destination',
        origin: 'amap-origin'
    },
    install() {
        this.loadJs('amap-demoutils', '//a.amap.com/jsapi_demos/static/demo-center/js/demoutils.js').then((e) => {
            this.loadJs('amap-demoutils2', '//webapi.amap.com/maps?v=1.4.6&key=160cab8ad6c50752175d76e61ef92c50&plugin=AMap.Driving,AMap.Geocoder,AMap.ToolBar').then((e) => {
                this.loadJs('amap-demoutils3', '//webapi.amap.com/ui/1.1/main.js?v=1.1.1').then((e) => {
                    window.map = new AMap.Map('container', {
                        zoom: 10,
                        center: [110.342359, 21.141181],
                        scrollWheel: false,
                        resizeEnable: true
                    });
                    this.newsearch();
                    this.PositionPicker();
                    // this.newdriving('110.302534,21.138619', '110.256329,21.370257');
                });
            });
        })
    },
    //路线规划
    newdriving(origin, destination) {
        origin = origin.split(",")
        destination = destination.split(",")
        var map = new AMap.Map('container', {
            zoom: 10,
            center: origin,
            scrollWheel: false,
            resizeEnable: true
        });
        new AMap.Driving({
            map: map,
            //panel: 'navResult'
        }).search(origin, destination, function(status, result) {
            console.log(result);
            //alert(result.info);
        });
    },
    //搜索出发
    originsearch() {
        AMap.plugin('AMap.PlaceSearch', function() {
            new AMap.PlaceSearch({ city: document.getElementById(window.ysdt.info.origin + '-city').value }).search(document.getElementById(window.ysdt.info.origin).value, function(status, result) {
                // 搜索成功时，result即是对应的匹配数据
                console.log(result);
                thtm = '';
                if (result.info === "OK") {
                    for (let x in result.poiList.pois) {
                        let val = result.poiList.pois[x];
                        console.log(val.location.toString());
                        thtm += `<div onclick="ysdt.setlocation('${window.ysdt.info.origin}','${val.location}')">
                                ${val.name}
                                ${val.address}
                                ${val.location}
                                </div>`;
                    }
                }
                document.getElementById(window.ysdt.info.origin + "-body").innerHTML = thtm
            })
        })
    },
    //搜索目地
    destinationsearch() {
        AMap.plugin('AMap.PlaceSearch', function() {
            new AMap.PlaceSearch({ city: document.getElementById(window.ysdt.info.destination + '-city').value }).search(document.getElementById(window.ysdt.info.destination).value, function(status, result) {
                // 搜索成功时，result即是对应的匹配数据
                console.log(result);
                thtm = '';
                if (result.info === "OK") {
                    for (let x in result.poiList.pois) {
                        let val = result.poiList.pois[x];
                        console.log(val.location.toString());
                        thtm += `<div onclick="ysdt.setlocation('${window.ysdt.info.destination}','${val.location}')">
                                ${val.name}
                                ${val.address}
                                ${val.location}
                                </div>`;
                    }
                }
                document.getElementById(window.ysdt.info.destination + "-body").innerHTML = thtm
            })
        })
    },
    //开始搜索
    newsearch() {
        this.originsearch();
        document.getElementById(this.info.origin).oninput = this.originsearch;
        this.destinationsearch();
        document.getElementById(this.info.destination).oninput = this.destinationsearch;
    },
    setlocation(setkey, location) {
        document.getElementById(setkey + '-location').value = location;
        if (document.getElementById(window.ysdt.info.origin + '-location').value && document.getElementById(window.ysdt.info.destination + '-location').value) {
            this.newdriving(document.getElementById(window.ysdt.info.origin + '-location').value, document.getElementById(window.ysdt.info.destination + '-location').value);
        }
        location = location.split(",")
        map.setZoomAndCenter(10, location);
    },
    PositionPicker() {
        AMapUI.loadUI(['misc/PositionPicker'], function(PositionPicker) {
            new PositionPicker({
                mode: 'dragMap',
                map: this.map,
                iconStyle: {
                    url: 'https://webapi.amap.com/ui/1.0/assets/position-picker2.png',
                    size: [48, 48],
                    ancher: [24, 40]
                }
            }).on('success', function(positionResult) {
                document.getElementById(window.ysdt.info.origin + '-location').value = positionResult.position.lng + ',' + positionResult.position.lat;
                console.log(positionResult);

            }).on('fail', function(positionResult) {
                console.log(positionResult);
            }).start();
            AMap.plugin('AMap.Geolocation', function() {
                var geolocation = new AMap.Geolocation({
                    enableHighAccuracy: true, //是否使用高精度定位，默认:true
                    timeout: 10000, //超过10秒后停止定位，默认：5s
                    buttonPosition: 'RB', //定位按钮的停靠位置
                    buttonOffset: new AMap.Pixel(10, 20), //定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
                    zoomToAccuracy: true, //定位成功后是否自动调整地图视野到定位点

                });
                map.addControl(geolocation);
                geolocation.getCurrentPosition(function(status, result) {
                    if (status == 'complete') {
                        onComplete(result)
                    } else {
                        onError(result)
                    }
                });
            });
            //解析定位结果
            function onComplete(data) {
                console.log('定位成功', data);
                console.log('定位结果：', data.position);
                console.log('定位类别：', data.location_type);
            }
            //解析定位错误信息
            function onError(data) {
                console.log('定位失败', data.message);
            }

        });
    },
    loadJs(name, src) {
        return new Promise(function(resolve, reject) {
            if (document.getElementById(name)) { // 只加载一次
                resolve('ok')
                return
            }
            let script = document.createElement("script");
            script.type = "text/javascript";
            script.async = true;
            script.src = src;
            script.id = name;
            script.onerror = reject;
            script.onload = function(su) {
                resolve('ok')
            };
            document.head.appendChild(script);
        });
    }
}

window.ysdt.install();

//window.ysdt.newsearch();
//window.ysdt.PositionPicker();