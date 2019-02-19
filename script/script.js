var map;
		ymaps.ready(function () {
			map = new ymaps.Map("map-canvas", {
				center: [56, 37],
				zoom: 8,
				type: "yandex#map"
			});
			
			var start_point = [56, 37];
			var end_point = [57, 39];
			ymaps.route([start_point, end_point], {
				mapStateAutoApply: true,
				avoidTrafficJams: false,
				multiRoute: false,
				routingMode: "auto",
				viaIndexes: []
			}).then(function (route) {
				var points = route.getWayPoints();  
				points.get(0).properties.set('balloonContent', '');
				points.get(1).properties.set('balloonContent', 'Дистанция: '+route.getHumanLength()+'<br>Продолжительность: '+route.getHumanTime());
				points.get(0).properties.set('iconContent', 'А');
				points.get(1).properties.set('iconContent', 'Б');
				map.geoObjects.add(route);
			}, function (error) {
				// Ошибка error.message
			});
		});