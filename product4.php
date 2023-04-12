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
		<div class="modal1" id="message-modal">
			<div class="modal-content1">
				<p class="main_text" id="message-text"></p>
			</div>
		</div>
		<?php
		include 'backend/connect.php';
		error_reporting(E_ERROR | E_PARSE);
		session_start();
		$status = $_SESSION['login_status'];
		?>
		<div class="wrapper">
			<nav>
				<ul class="nav">
						<li class="logo"><a href="index.php">TAZER</a></li>
						<li class="nav_item main_text"><a href="">Главная</a></li>
						<li class="nav_item main_text"><a href="products.php">Товары</a></li>
						<li class="nav_item main_text"><a href="help.php">Поддержка</a></li>
						<div id="menuToggle">
							<input type="checkbox"/>
							<span></span>
							<span></span>
							<span></span>
							<ul id="menu">
								<a href="account.php"><li>Корзина</li></a>
								<?php
									if ($status) {
									?>
										<a href="backend/logout.php"><li>Выйти</li></a>
									<?php
									}
									else {
									?>
										<a href="login.php"><li>Авторизация</li></a>
										<a href="registration.php"><li>Регистрация</li></a>
									<?php
									}
								?>
								<div class="nav_wrapp">
									<li class="nav_item1 main_text"><a href="index.php">Главная</a></li>
									<li class="nav_item1 main_text"><a href="products.php">Товары</a></li>
									<li class="nav_item1 main_text"><a href="help.php">Поддержка</a></li>
								</div>
							</ul>
						</div>
					</ul>
				</nav>
		</div>

	<div class="product1">
	    <div class="slide14 overlay">
	    <div class="wrapper_slide">
	      <a href="#" class="slider__caption ">Tazer Strider Chroma</a>
	      <p class="slider__txt ">Представляем Tazer Strider Chroma — первый в мире гибридный коврик для мыши с несколькими зонами подсветки. Благодаря 19 настраиваемым зонам подсветки  вам доступен уровень индивидуальной настройки, которому нет равных. Кроме того, поверхность коврика, сочетающая лучшие качества различных покрытий, обеспечит совершенную точность управления.</p>
	 	</div>
	 	</div>
	</div>

	<div class="wrapper">
	<div class="product_info">
		<div class="product_text">
			<h2>ГИБРИДНЫЙ МЯГКИЙ/ЖЕСТКИЙ КОВРИК</h2>
			<p>Создан для оптимального баланса скорости и контроля — с легким скольжением для быстрых рывков и надежной тормозной силой для неизменной точности. Разработанный как единая поверхность, коврик обеспечивает большую долговечность, в отличие от ковриков с покрытием, которые со временем изнашиваются и работают хуже.</p>
			<h2>УВЕЛИЧЕННЫЙ РАЗМЕР</h2>
			<p>Большой размер коврика предоставляет достаточно места для клавиатуры и мыши и максимально подсвечивает ваше рабочее место с помощью RGB-подсветки.</p>
		</div>
		<div class="product_buy">
			<div class="product_buy_text">
			<p>5 999 руб</p>
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
<script src="js/message.js"></script>
</html>