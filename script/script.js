

        // Создание обработчика для события window.onLoad
        YMaps.jQuery(function () {
            // Создание экземпляра карты и его привязка к созданному контейнеру
            var map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]);

            // Установка для карты ее центра и масштаба
            map.setCenter(new YMaps.GeoPoint(30.262793,60.019263), 14);

            // Установка элементов управления
            map.enableScrollZoom();

          
        });

       


      function func1(){
      		console.log ('dadadawd');
      		var adress = document.getElementById("adress"); 

      				$.ajax({ 
						type: "GET", 
						url: "script/geocoder.php", 
						data: { adress: adress.value}, 
						success: function(data) { 	
						console.log(data);
						} 
					}); 
				} 
	function mapshow(){
        	YMaps.jQuery(function () {
            var map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]);
            map.setCenter(new YMaps.GeoPoint(30.317512, 59.939811), 10);
            map.enableScrollZoom();

          
        });
	}

		function point1(){
        	YMaps.jQuery(function () {
            var map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]);
            map.setCenter(new YMaps.GeoPoint(30.317512, 59.939811), 10);
            map.enableScrollZoom();

          
        });
	}



	function marshrut(){
      ymaps.ready(init);  function init () {
    var multiRoute = new ymaps.multiRouter.MultiRoute({
        referencePoints: [
            "Сестрорецк, ул. Володарского, 7/9",
              "СПБ, ул. Репищева 21",

        ],
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
}
    }


