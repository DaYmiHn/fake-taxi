


      function func1(){
      		console.log ('dadadawd');
            var a = document.getElementById("adress_a"); 
      		var b = document.getElementById("adress_b"); 
            document.getElementById('YMapsID').style.display = "none";
            marshrut(a.value,b.value);

				} 

var a,b;
	function mapshow(){
        ymaps.ready(init);
        function init() {
            var myPlacemark,
                myMap = new ymaps.Map('YMapsID', {
                    center: [59.939811, 30.317512],
                    zoom: 10,
                    controls: []
                }), mySearchControl = new ymaps.control.SearchControl({
                    options: {
                        noPlacemark: true
                    }
                });
                myMap.controls.add(mySearchControl);

            mySearchControl.events.add('resultselect', function (e) {
                var index = e.get('index');
                var coords = mySearchControl.getResult(index)._value.geometry.getCoordinates();
                setMarker(coords);
            });
           
            setMarker = function (coords){
                    myPlacemark = createPlacemark(coords);
                    myMap.geoObjects.add(myPlacemark);
                    myPlacemark.events.add('dragend', function () {
                        getAddress(myPlacemark.geometry.getCoordinates());
                    });
                getAddress(coords);
            }
            
            myMap.events.add('click', function (e) {
                var coords = e.get('coords');
                setMarker(coords);
            });

            function createPlacemark(coords) {
                return new ymaps.Placemark(coords, {
                    iconCaption: 'поиск...'
                }, {
                    preset: 'islands#violetDotIconWithCaption',
                    draggable: true
                });
            }
            var k = 1;
            function getAddress(coords) {
                myPlacemark.properties.set('iconCaption', 'поиск...');
                ymaps.geocode(coords).then(function (res) {
                    var firstGeoObject = res.geoObjects.get(0),
                            array = firstGeoObject.properties.get('description').split(', '),
                            country = array[0],
                        city = array[1];
                    myPlacemark.properties
                        .set({
                            iconCaption: firstGeoObject.properties.get('name'),
                            balloonContent: firstGeoObject.properties.get('text')
                        });
                    
                    switch(k) {
                      case 0:
                        alert("Ошибочка");
                        break;

                      case 1:  
                        a = firstGeoObject.properties.get('name');
                        $('#adress_a').val(firstGeoObject.properties.get('name'));
                        k++;
                        break;

                      case 2: 
                        b = firstGeoObject.properties.get('name');
                        $('#adress_b').val(firstGeoObject.properties.get('name'));
                        document.getElementById('YMapsID').style.display = "none";
                        marshrut(a,b)
                        break;

                      default:
                        alert("Ошибочка");
                        break;
                    }
                   
                });
            }
        }
    }



	function marshrut(adress_a, adress_b){
      ymaps.ready(init);  function init () {
    var multiRoute = new ymaps.multiRouter.MultiRoute({
        referencePoints: [adress_a,adress_b],
        params: {
            routingMode: 'avto'
        }
    }, {
        boundsAutoApply: false
    });

    var changeLayoutButton = new ymaps.control.Button({
        data: { content: "Изменить макет подписи для пеших сегментов"},
        options: { selectOnClick: true }
    });

    changeLayoutButton.events.add('select', function () {
        multiRoute.options.set(
            "routeWalkMarkerIconContentLayout",
            ymaps.templateLayoutFactory.createClass('{{ properties.duration.text }}')
        );
    });

    changeLayoutButton.events.add('deselect', function () {
        multiRoute.options.unset("routeWalkMarkerIconContentLayout");
    });

    var myMap = new ymaps.Map('map', {
        center: [60.086280, 29.958469],
        zoom: 12,
        controls: [changeLayoutButton]
    }, {
        buttonMaxWidth: 350
    });
    
    myMap.geoObjects.add(multiRoute);
    var geoBounds = new YMaps.GeoCollectionBounds(); 

    multiRoute.model.events.add("requestsuccess", function() {

   myMap.setBounds(multiRoute.getBounds(),true);
   // alert(multiRoute.getRoutes().get(0).properties.get("distance").value);
   var sred = multiRoute.getRoutes().get(0).properties.get("durationInTraffic").value + multiRoute.getRoutes().get(0).properties.get("duration").value
   // alert(sred/2);//среднее время в пути ((без пробок) + (с пробками))/2
   raschet(multiRoute.getRoutes().get(0).properties.get("distance").value,sred/2)
  });
    }

}

function raschet(distance,duration) {
    var price = 39 + ((distance/1000) * 12) + ((duration/60) * 3);
    var x=Math.round(price);
    alert (x +" руб.");   
    }