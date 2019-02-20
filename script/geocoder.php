<?php 
		$adress	= $_GET['adress'];
		$url = 'https://geocode-maps.yandex.ru/1.x/?apikey=d40fb052-95ef-400a-b9ad-d8e14749a9be&geocode=';
		$gg=$url.$adress;

		$url = $gg; 
		$xml = simplexml_load_file($url); 
		$pos = $xml->GeoObjectCollection->featureMember->GeoObject->Point->pos;
		$mass = split(" ", $pos);
		$pos = $mass[1]." ".$mass[0];
		echo $pos;
 ?>