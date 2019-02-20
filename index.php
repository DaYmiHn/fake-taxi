
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Примеры. Использование маршрутизатора.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style/style.css">
    <script src="https://api-maps.yandex.ru/1.1/index.xml" type="text/javascript">
    </script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>

<body>
    <div class="conteiner">

        <div class="input">
            <label for="">Введите ваш адрес:</label>
            <input type="text" class="textbox" id="adress">
            <label for="">Куда вам нужно доехать:</label>
            <input type="text" class="textbox">
            <a href="#" class="button9" onClick="func1()">Заказать такси</a>
        </div>
          <div id="YMapsID"></div>
    </div>
     
   
   
     <script src="script/script.js"></script>
</body>

</html>