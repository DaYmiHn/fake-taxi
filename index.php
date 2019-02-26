<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

	<meta charset="utf-8" />

	<title>Заголовок</title>
	<meta content="" name="description" />

	<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link rel="stylesheet" href="script/libs/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="style/css/bootstrap_skin.css">
	<link rel="stylesheet" href="script/libs/animate/animate.css" />

	<link rel="stylesheet" href="style/css/main.css" />
	<!--<link rel="stylesheet" href="style/css/skins/red.css" id="template_settings" />-->
	<link rel="stylesheet" href="style/css/media.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style/style.css">
    <script src="https://api-maps.yandex.ru/1.1/index.xml" type="text/javascript">
    </script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=d40fb052-95ef-400a-b9ad-d8e14749a9be"></script>

</head>

<body onload="mapshow()">

<header >
		<img src="img/taxi_logos_PNG17.png" alt="" class="logotype">
	<div class="ahead">
		<img class="round akk" src="img/7WFPqGDz-0s.jpg" alt="" >
		<p class="nameakk">nameeeeeee</p>
		<img class="ballsimg" src="img/star3.png" alt="" >
		<p class="ballsakk">4.3</p>		
	</div>
</header>	
<main>
<ul class="nav nav-tabs">
	<li class="active"><a href="#order" data-toggle="tab">Заказать</a></li>
	<li><a href="#trips" data-toggle="tab">Поездки</a></li>
	<li><a href="#payment" data-toggle="tab">Оплата</a></li>
	<li><a href="#help" data-toggle="tab">Помощь</a></li>
	<li><a href="#setting" data-toggle="tab">Настройки</a></li>
</ul>


<div id="myTabContent" class="tab-content">


	<div class="tab-pane fade active in" id="order">
		<div class="input">
            <label for="">Введите ваш адрес:</label>
            <input type="text" class="textbox" id="adress_a">
            <label for="">Куда вам нужно доехать:</label>
            <input type="text" class="textbox" id="adress_b">
            <a href="#" class="button9" onClick="func1()">Заказать такси</a>
        </div>
          <div id="YMapsID"></div>
          <div id="map"></div>
	</div>
	




	<div class="tab-pane fade" id="trips">
		<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
					<h1>Ваши поездки</h1>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
							21.02.2019 20:43 Audi A6 x666ty 1549 руб. 
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
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
					<h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							21.02.2019 20:43 Audi A6 x666ty 1549 руб.
						</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
					<div class="panel-body"> <!-- map -->
						<div style="overflow:hidden;width: 718px;position: relative;">
							<iframe width="718" height="269" src="https://maps.google.com/maps?width=718&amp;height=269&amp;hl=en&amp;q=Moscow%2C%20Russia+(%D0%9D%D0%B0%D0%B7%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
							</iframe>
							<div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;">
								<small style="line-height: 1.8;font-size: 2px;background: #fff;">Powered by 
									<a href="https://embedgooglemaps.com/en/">
									embedgooglemaps EN
									</a> & 
									<a href="https://iamsterdamcard.it">
									iamsterdam card.it
									</a>
								</small>
							</div>
							<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
						</div>
							<br />
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
					<h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							21.02.2019 20:43 Audi A6 x666ty 1549 руб.
						</a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
					<div class="panel-body"> <!-- map -->
						<div style="overflow:hidden;width: 718px;position: relative;">
							<iframe width="718" height="269" src="https://maps.google.com/maps?width=718&amp;height=269&amp;hl=en&amp;q=Moscow%2C%20Russia+(%D0%9D%D0%B0%D0%B7%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
							</iframe>
							<div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;">
								<small style="line-height: 1.8;font-size: 2px;background: #fff;">
									Powered by 
									<a href="https://embedgooglemaps.com/en/">embedgooglemaps EN</a> & 
									<a href="https://iamsterdamcard.it">iamsterdam card.it</a>
								</small>
							</div>
							<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
						</div>
							<br />
					</div>
				</div>
			</div>
		</div>	
	</div>
	

	<div class="tab-pane fade" id="payment">
		<h1>Способы оплаты</h1>
		<div class="addnewcarts js-button-campaign">
			
	<div class="js-button-campaign">
		<a class="newcarts" href="#"><img src="img/plus.png" alt=""> Привязать карту</a>
	</div>

					<div class="overlay js-overlay-campaign">
						<div class="popup js-popup-campaign">
							<form class="form-for-add-carts">
								<legend>Новая карта</legend>
									<input type="text" class="cartcontrol bldc" id="inputNamberCart" placeholder="Владелец"> <br>
									<input type="text" class="cartcontrol nc" id="inputNamberCart" placeholder="Номер карты">
									<input type="text" class="cartcontrol cvv" id="inputCvv" placeholder="CVV"> <br>

									<select class="cartcontrol cvv" id="select">
										<option>01</option>
										<option>02</option>
										<option>03</option>
										<option>04</option>
										<option>06</option>
										<option>07</option>
										<option>08</option>
										<option>09</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
									</select>	
										/
									<select class="cartcontrol cvv" id="select">
										<option>19</option>
										<option>20</option>
										<option>21</option>
										<option>22</option>
										<option>23</option>
										<option>24</option>
										<option>25</option>
									</select><br>									
									<button type="submit" class="btn btn-primary">Привязать карту</button>
								</form>	
							<div class="close-popup js-close-campaign"></div>
						</div>
					</div>		

			<div class="form-group">
				<label class="control-label" for="inputLarge">Промокод</label>
				<input placeholder="Ваш промокод"class="form-control input-lg" type="text" id="inputLarge">
				<a href="#" class="btn btn-primary btn-lg promocode">Активировать</a>
			</div>

		</div>
	</div>


	<div class="tab-pane fade" id="help">
		<p>DTrust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
	</div>


	<div class="tab-pane fade" id="setting">
		<p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
	</div>
</div>
</main>
	
	<div class="hidden"></div>

	<!--[if lt IE 9]>
	<script src="script/libs/html5shiv/es5-shim.min.js"></script>
	<script src="script/libs/html5shiv/html5shiv.min.js"></script>
	<script src="script/libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="script/libs/respond/respond.min.js"></script>
	<![endif]-->

	<script src="script/libs/jquery/jquery-1.11.2.min.js"></script>
	<script src="script/libs/modernizr/modernizr.js"></script>
	<script src="script/libs/bootstrap/js/bootstrap.min.js"></script>
	<script src="script/libs/waypoints/waypoints.min.js"></script>
	<script src="script/libs/plugins-scroll/plugins-scroll.js"></script>
	<script src="script/libs/animate/animate-style/.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/main.js"></script>
	
	<script src="js/common.js"></script>
<script src="script/script.js"></script>
	<!--<script src="js/skins.js"></script>-->
	
</body>
</html>