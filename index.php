
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Примеры. Использование маршрутизатора.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style/style.css">
    <script src="https://api-maps.yandex.ru/1.1/index.xml" type="text/javascript"></script>
    <script type="text/javascript">
        // Создание обработчика для события window.onLoad
        YMaps.jQuery(function () {
            // Создание экземпляра карты и его привязка к созданному контейнеру
            var map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]);

            // Установка для карты ее центра и масштаба
            map.setCenter(new YMaps.GeoPoint(30.262793,60.019263), 14);

            // Установка элементов управления
            map.enableScrollZoom();

            // Добавление офиса на карту
            var myOffice = new YMaps.Placemark(new YMaps.GeoPoint(30.228914,60.023590 ), 14);
            myOffice.setIconContent("Осейкин");
            map.addOverlay(myOffice);

            // Менеджер маршрутов
            var rManager = new RouterManager(map, myOffice.getGeoPoint());

            // При каждом клике на карте пытаемся проложить маршрут
            YMaps.Events.observe(map, map.Events.Click, function (map, mEvent) {
                rManager.drawTo(mEvent.getGeoPoint());
            });
        });

        // Менеджер маршрутов
        function RouterManager (map, start) {
            // Рисование маршрута
            this.drawTo = function (finish) {
                // Создание маршрута
                var router = new YMaps.Router([finish, start]);

                // Установка слушателей для роутера
                YMaps.Events.observe(router, router.Events.Success, this._success, this);
                YMaps.Events.observe(router, [router.Events.RouteError, router.Events.Fault], this._fault, this);
            }

            // Успешное заверешение рисования маршрута
            this._success = function (router) {
                // Маршрут
                var polyline = new YMaps.Polyline(router.getRoute(0).getPoints());

                // Добавляем маршрут на карту
                map.addOverlay(polyline);

                // Запускаем машинку по карте
                // После завершения движения удаляем маршрут с карты
                new Car(router, map).start(function () {
                    // Удаляем ломанную с карты
                    map.removeOverlay(polyline);
                });
            }

            // Маршрут проложить не удалось
            this._fault = function () {
                alert('Не удалось проложить маршрут');
            }
        }

        // Машинка
        function Car (router, map) {
            var _this = this,
                points = router.getRoute(0).getPoints(),
                indexTo = 1,
                callback;

            // При перемещении карты или смены масштаба поправляем позицию машинки
            YMaps.Events.observe(map, map.Events.BoundsChange, function () {
                this.car.stop();
                this.position();
            }, this);
            
            // Запуск машинки по маршруту
            this.start = function (func) {
                this.create(points[0]);
                this.move();
                callback = func;
            }

            // Смена позиции
            this.position = function () {
                if (!indexTo) {
                    indexTo--;
                }

                // Возвращаем машинку в предыдущую позицию
                var toPx = map.converter.coordinatesToLocalPixels(points[indexTo]);
                this.car.css({
                    left: toPx.x,
                    top: toPx.y
                });
                this.move();
            }

            // Передвинуть машинку до следующей точки
            this.move = function () {
                // Определение точки, в которую необходимо передвинуть машинку
                var toPx = map.converter.coordinatesToLocalPixels(points[indexTo]);

                // Время за которое нужно проехать
                var time = points[indexTo - 1].distance(points[indexTo])
                if (time < 1) {
                    time = 10;
                }

                // Перемещение машинки
                this.car.animate({
                    left: toPx.x,
                    top: toPx.y
                }, {
                    duration: time, 
                    complete: function () {
                        _this.tick();
                    },
                    queue: 0
                });
            }

            // Действие для машинки
            this.tick = function () {
                // Если не доехали до конца маршрута
                if (indexTo < points.length - 1) {
                    this.move(); // Едем дальше
                    indexTo++;
                } else {
                    this.remove();
                }
            }

            // Создание машинки
            // startPoint - начало маршрута
            this.create = function (startPoint) {
                var fromPx = map.converter.coordinatesToLocalPixels(startPoint);

                // Создание машинки и добавление ее на карту
                this.car = YMaps.jQuery("<img class=\"car\"/ >")
                .css({
                    left: fromPx.x,
                    top: fromPx.y
                })
                .appendTo(map.getContainer());
            }

            // Удаление машинки
            this.remove = function () {
                this.car.remove();
                
                // Вызов callback-функции, переданной в метод start()
                callback.call();
            }
        }
    </script>
    <style>
        .car {
            position: absolute;
            z-index: 7000;
            
            width: 30px;
            height: 16px;
            margin-top: -5px;
            margin-left:-5px;
            background-image: url(src/123123123.png);
            background-size: cover;
        }
    </style>
</head>

<body>
    <div id="YMapsID"></div>
</body>

</html>