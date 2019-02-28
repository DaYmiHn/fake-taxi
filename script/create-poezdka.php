<?php 
	include("link_bd.php");
	$timezone = date_default_timezone_get();
	$sql = "INSERT INTO `poezdki` (`id`, `price`, `t_a`, `t_b`, `datatime`,`status`) 
			VALUES (NULL,
			 '".$_GET['price']."',
			 '".$_GET['t_a']."',
			 '".$_GET['t_b']."',
			 '".date( "y.m.d H:i:s" )."',
			 'created')";
	$result = $connection->query($sql);
 ?>