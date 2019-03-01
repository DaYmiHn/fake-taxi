<?php 
	include("script/link_bd.php");
	$sql = "SELECT * FROM  `poezdki` order by `id` desc limit 3";
	$result = $connection->query($sql);
	$row=$result->fetch();
	echo '	<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
					<h1>Ваши последние 3 поездки</h1>
			<div class="panel panel-default"  onClick="marshrut_gelya('."'".'map1'."'".','."'".''.$row ["t_a"].''."'".','."'".''.$row ["t_b"].''."'".');">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
							'.$row ['datatime'].' Откуда: '.$row ['t_a'].' Куда: '.$row ['t_b'].' Цена: '.$row ['price'].' руб. Статус: '.$row ['status'].'
						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
					<div class="panel-body"> <!-- map -->
						<div style="width: 718px;height:300px;position: relative;">
							<div id="map1" class="mapsulya"></div>
							
						</div>
						<br/>
					</div>
				</div>
			</div>';
			$row=$result->fetch();
	echo '	<div class="panel panel-default"  onClick="marshrut_gelya('."'".'map2'."'".','."'".''.$row ["t_a"].''."'".','."'".''.$row ["t_b"].''."'".');">
				<div class="panel-heading" role="tab" id="headingTwo">
					<h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							'.$row ['datatime'].' Откуда: '.$row ['t_a'].' Куда: '.$row ['t_b'].' Цена: '.$row ['price'].' руб. Статус: '.$row ['status'].'
						</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
					<div class="panel-body"> <!-- map -->
						<div style="width: 718px;height:300px;position: relative;">
							<div id="map2" class="mapsulya"></div>
						</div>
							<br />
					</div>
				</div>
			</div>';
			$row=$result->fetch();
	echo '	<div class="panel panel-default" onClick="marshrut_gelya('."'".'map3'."'".','."'".''.$row ["t_a"].''."'".','."'".''.$row ["t_b"].''."'".');">
				<div class="panel-heading" role="tab" id="headingThree">
					<h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							'.$row ['datatime'].' Откуда: '.$row ['t_a'].' Куда: '.$row ['t_b'].' Цена: '.$row ['price'].' руб. Статус: '.$row ['status'].'
						</a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
					<div class="panel-body"> <!-- map -->
						<div style="width: 718px;height:300px;position: relative;">
							<div id="map3" class="mapsulya"></div>
						</div>
							<br />
					</div>
				</div>
			</div></div>';
 ?>