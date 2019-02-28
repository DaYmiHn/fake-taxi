<?php 
	include("script/link_bd.php");
	$sql = "SELECT * FROM  `poezdki`";
	$result = $connection->query($sql);
	while ($row=$result->fetch()) {
	$id[$i]=	$row ['id'];
	$price[$i]=	$row ['price'];
	$t_a[$i]=	$row ['t_a'];
	$t_b[$i]=	$row ['t_b'];
	$status[$i]= $row ['status'];
	// echo 
	// "<tr>
	// <td>".$id[$i]."</td>
 // 	<td>",$price[$i],"</td>
	// <td>",$t_a[$i],"</td>
	// <td>",$t_b[$i],"</td>
	// </tr>";
	echo '	<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
							Откуда: '.$t_a[$i].', Куда: '.$t_b[$i].', Цена: '.$price[$i].','.$status[$i].'
						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
					<div class="panel-body"> <!-- map -->
						<div style="overflow:hidden;width: 718px;position: relative;">
							<iframe width="718" height="269" src="https://maps.google.com/maps?width=718&amp;height=269&amp;hl=en&amp;q=Moscow%2C%20Russia+(%D0%9D%D0%B0%D0%B7%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
							</iframe>
							<div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;">
								<small style="line-height: 1.8;font-size: 2px;background: #fff;">
									Powered by 
									<a href="https://embedgooglemaps.com/en/">
									embedgooglemaps EN
									</a> & 
									<a href="https://iamsterdamcard.it">iamsterdam card.it</a>
								</small>
							</div>
							<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
						</div>
						<br/>
					</div>
				</div>';
	}

 ?>