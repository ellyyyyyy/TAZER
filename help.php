<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
	<title>Тейзер</title>
</head>
<body>
	<main>
		<?php
		include 'connect.php'
		?>
		<div class="wrapper">
		<nav>
					<ul class="nav">
						<li class="logo"><a href="index.php">TAZER</a></li>
						<li class="nav_item"><a href="">Главная</a></li>
						<li class="nav_item"><a href="products.php">Товары</a></li>
						<li class="nav_item"><a href="help.php">Поддержка</a></li>
						  <div id="menuToggle">
						    <input type="checkbox"/>
						    <span></span>
						    <span></span>
						    <span></span>
						    <ul id="menu">
						      <a href="#"><li>Корзина</li></a>
						      <a href="#"><li>Авторизация</li></a>
						      <a href="#"><li>Регистрация</li></a>
						      <div class="nav_wrapp">
						<li class="nav_item1"><a href="index.php">Главная</a></li>
						<li class="nav_item1"><a href="products.php">Товары</a></li>
						<li class="nav_item1"><a href="help.php">Поддержка</a></li>
							  </div>
						    </ul>
						  </div>
					</ul>
				</nav>
			</div>
	<div class="product2">
	    <div class="slide15 overlay">
	    <div class="wrapper_slide">
	      <a href="#" class="slider__caption ">ТЕХНИЧЕСКАЯ ПОДДЕРЖКА</a>
	 	</div>
	 	</div>
	</div>

	<div class="wrapper">
	<div class="product_info">
		<div class="help_text">
			<p>Техническая поддержка сайта консультирует только по вопросам настройки и подключения продукции Razer, и гарантийным вопросам.
По вопросам получения заказов следует обращаться к операторам отдела заказов.</p>
			<h3>График работы отдела технической поддержки:</h3>
            <ul>
                <li><p>Понедельник - пятница: с 9.30 до 18.00</p></li>
                <li><p>Суббота - воскресенье: выходной.</p></li>
            </ul>
            <h3>Контакты:</h3>
            <ul>
                <li><p>Москва: +7 495 109-87-65</p></li>
                <li><p>Регионы: 8-800-200-28-81 (бесплатный звонок по России)</p></li>
            </ul>
            <h3>Об отправке заказа Почтой</h3>
            <ul>
                <li><p>После получения от Вас заказа, оператор интернет-магазина свяжется с вами по телефону и email для согласования заказа, оплаты и доставки.</p></li>
                <li><p>Отправка заказа через EMS Почта России осуществляется только после оплаты вами заказа и получения нами платежа.</p></li>
                <li><p>Статусы заказов при оплате в субботу и воскресенье меняются в понедельник.</p></li>
                <li><p>После передачи заказа в EMS Почта России вам на email нашим оператором будет отправлен трек-номер отправления.</p></li>
            </ul>
            <h3>Гарантия</h3>
            <p>Настоящая гарантия не распространяется на расходные материалы и дополнительные устройства (ножки для мышей, амбушюры, провода), используемые совместно с изделием, а также на неисправности, возникшие в результате:</p>
            <ul>
                <li><p>Наличия механических повреждений;</p></li>
                <li><p>Несоблюдения правил использования и эксплуатации;</p></li>
                <li><p>Попадания внутрь изделия влаги, песка, насекомых;</p></li>
                <li><p>Самостоятельного ремонта;</p></li>
                <li><p>Использования некачественных элементов питания;</p></li>
                <li><p>Действия непреодолимой силы.</p></li>
            </ul>
		</div>
	</div>
	</div>
		<div class="wrapper">
			<div class="subscribe">
				<div class="wrapper_sub">
					<p class="sub_text">Подпишитесь</p>
					<p class="subsub_text">на расслылку<br>новостей!</p>
			    </div>
			    <form class="form_email" action="subscribe.php" method="post">
				  <input class="email" placeholder="Ваша почта" type="email" id="email" name="email"><br><br>
				  <input class="email_button" type="submit" value="">
				</form>
		    </div>
		</div>
	</main>

	<footer>
		<div class="wrapper">
			<div class="wrapper_footer">
				<div class="logo_footer">
					<a href="index.php" class="footer_h2">TAZER</a>
				</div>
				<div class="tazer">
					<p class="footer_p">Tazer</p>
					<ul class="spisok">
						<li><a class="spisok_item" href="index.php">Главная</a></li>
						<li><a class="spisok_item" href="products.php">Товары</a></li>
						<li><a class="spisok_item" href="help.php">Поддержка</a></li>
					</ul>
				</div>
				<div class="contacts">
					<p class="footer_p">Контакты</p>
					<ul class="spisok">
						<li><p class="spisok_item" >Телефон: +79430535245</p></li>
						<li><p class="spisok_item" >Почта: tazer@gmail.com</p></li>
						<li><p class="spisok_item" >Локация: Чистый пер., 17, Москва, 19614</p></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>



</body>
</html>