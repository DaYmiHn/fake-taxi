var a,b;


      function func1(){
      		console.log ('dadadawd');
            a = document.getElementById("adress_a").value; 
      		b = document.getElementById("adress_b").value; 
            document.getElementById('YMapsID').style.display = "none";
            marshrut(a, b);

				} 


	function mapshow(){
        document.getElementById('YMapsID').style.display = "";
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
        document.getElementById('map').style.display = "";
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
        center: [59.940664, 30.316987],
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
   setTimeout(raschet, 3000, multiRoute.getRoutes().get(0).properties.get('distance').value, sred/2);
   
  });
    }

}

function raschet(distance,duration) {
    var price = 39 + ((distance/1000) * 12) + ((duration/60) * 3);
    var x=Math.round(price);
    // alert (x +" руб.");   
    yesOrNo(x);
    }


function yesOrNo(x){
// var Url = "script/poezdka.php?id=";
var result = confirm("Вы готовы заказть такси за "+x+" руб.?");
if (result ==true){
$.ajax({
    type: "GET",
    url: "script/create-poezdka.php",
    data: { price: x, t_a: a, t_b: b },
    success: function(data) {
    }
}); 
bibika();
}
else{
window.location.reload();
}
return false;
}


function hide_all(){
  var elems = document.getElementsByClassName('mapsulya');
  for (var i=0;i<elems.length;i+=1){
    elems[i].style.display = 'none';
  }
  
}


function bibika() {
    hide_all();
    document.getElementById('bibika').style.display = "";
    var map, car;
ymaps.ready(function () {
    "use strict";

    map = new ymaps.Map("bibika", {
        center: [59.940664, 30.316987],
        zoom: 10
    });

    $.getScript('script/car.js', function () {
        car = new Car({
            iconLayout: ymaps.templateLayoutFactory.createClass(
                '<div class="b-car b-car_blue b-car-direction-$[properties.direction]"></div>'
            )
        });

        // Прокладывание маршрута от станции метро "Смоленская"
        // до станции Третьяковская (маршрут должен проходить через метро "Кропоткинская").
        // Точки маршрута можно задавать 3 способами:  как строка, как объект или как массив геокоординат.
        ymaps.route([
            a,
            b // и до метро "Третьяковская"
        ], {
            // Опции маршрутизатора
            mapStateAutoApply: true // автоматически позиционировать карту
        }).then(function (route) {
            // Задание контента меток в начальной и конечной точках
            var points = route.getWayPoints();

            points.get(0).properties.set("iconContent", "А");
            points.get(1).properties.set("iconContent", "Б");

            // Добавление маршрута на карту
            map.geoObjects.add(route);
            // И "машинку" туда же
            map.geoObjects.add(car);

            // Отправляем машинку по полученному маршруту простым способом
            // car.moveTo(route.getPaths().get(0).getSegments());
            // или чуть усложненным: с указанием скорости,
            car.moveTo(route.getPaths().get(0).getSegments(), {
                speed: 10,
                directions: 8
            }, function (geoObject, coords, direction) { // тик движения
                // перемещаем машинку
                geoObject.geometry.setCoordinates(coords);
                // ставим машинке правильное направление - в данном случае меняем ей текст
                geoObject.properties.set('direction', direction.t);

            }, function (geoObject) { // приехали
                geoObject.properties.set('balloonContent', "Приехали!");
                geoObject.balloon.open();
            });

        }, function (error) {
            console.error("Возникла ошибка: " + error.message);
        });
    });
});
}