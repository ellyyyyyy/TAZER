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
						<li class="nav_item"><a href="index.php">Главная</a></li>
						<li class="nav_item"><a href="products.php">Товары</a></li>
						<li class="nav_item"><a href="">Поддержка</a></li>
						  <div id="menuToggle">
						    <input type="checkbox" />
						    <span></span>
						    <span></span>
						    <span></span>
						    <ul id="menu">
						      <a href="#"><li>Корзина</li></a>
						      <a href="#"><li>Авторизация</li></a>
						      <a href="#"><li>Регистрация</li></a>
						    </ul>
						  </div>
					</ul>
			</div>
	<div class="product1">
	    <div class="slide12 overlay">
	    <div class="wrapper_slide">
	      <a href="#" class="slider__caption ">Tazer BlackShark V2</a>
	      <p class="slider__txt ">Если киберспорт для вас все, тогда выложитесь на полную с Tazer BlackShark V2. С этой киберспортивной гарнитурой, представляющей собой тройную угрозу за счет восхитительного звучания, превосходной чистоты микрофона и звукоизоляции высокого качества, настало ваше время стать про-игроком.</p>
	 	</div>
	 	</div>
	</div>

	<div class="wrapper">
	<div class="product_info">
		<div class="product_text">
			<h2>50ММ ДИНАМИКИ ИЗ ТИТАНА</h2>
			<p>С возможностью индивидуальной передачи высоких, средних и низких частот, наш новый запатентованный дизайн динамиков работает как 3 в 1 - выдавая яркое звучание с богатыми высокими частотами и мощными басами. Tazer BlackShark V2 также оснащены диафрагмой, покрытой титаном, которая добавляет чистоты звучания вокала, благодаря чему, команды ваших союзников всегда будут слышны четко и ясно.</p>
			<h2>ПРОДВИНУТОЕ ПАССИВНОЕ ПОДАВЛЕНИЕ ШУМОВ</h2>
			<p>От шумной толпы до шума вашей установки, отключите сторонние звуки и наслаждайтесь непрерывной сосредоточенностью с помощью специальных закрытых наушников, которые полностью закрывают ваши уши, и благодаря мягким амбушюрам, образующим идеальное уплотнение для большей звукоизоляции.</p>
		</div>
		<div class="product_buy">
			<div class="product_buy_text">
			<p>7 499 руб</p>
			<p>В наличии</p>
			</div>
			<form class="buy" action="">
				<button class="product_button" type="submit">В корзину</button>
			</form>
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
						<li><a class="spisok_item" href="">Главная</a></li>
						<li><a class="spisok_item" href="">Товары</a></li>
						<li><a class="spisok_item" href="">О нас</a></li>
						<li><a class="spisok_item" href="">Поддержка</a></li>
					</ul>
				</div>
				<div class="contacts">
					<p class="footer_p">Контакты</p>
					<ul class="spisok">
						<li><p class="spisok_item" href="">Телефон: +79430535245</p></li>
						<li><p class="spisok_item" href="">Почта: tazer@gmail.com</p></li>
						<li><p class="spisok_item" href="">Локация: Чистый пер., 17, Москва, 19614</p></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>



</body>
</html>