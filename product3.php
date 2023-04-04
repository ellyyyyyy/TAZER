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
	    <div class="slide13 overlay">
	    <div class="wrapper_slide">
	      <a href="#" class="slider__caption ">Tazer Ornata V3 X</a>
	      <p class="slider__txt ">Сделайте первый шаг к производительности следующего уровня с Tazer Ornata V3 X — низкопрофильной эргономичной игровой клавиатурой, разработанной для того, чтобы поднять вашу работу и игру на новый уровень. Благодаря новому ультратонкому форм-фактору, более прочным колпачкам клави, эта клавиатура является идеальным представлением нашего несправедливого преимущества.</p>
	 	</div>
	 	</div>
	</div>

	<div class="wrapper">
	<div class="product_info">
		<div class="product_text">
			<h2>НИЗКОПРОФИЛЬНЫЕ КЛАВИШИ</h2>
			<p>Благодаря более тонким клавишным колпачкам и более коротким переключателям вы cможете наслаждаться естественным положением рук на низкопрофильной эргономичной игровой клавиатуре, которая позволяет работать и играть часами напролет без напряжения в суставах.</p>
			<h2>КОЛПАЧКИ КЛАВИШ С UV-ПОКРЫТИЕМ</h2>
			<p>Клавишные колпачки этой клавиатуры долговечнее обычных, UV-покрытие обеспечивает устойчивость надписей к истиранию и защищает клавиши от износа при частом использовании.</p>
		</div>
		<div class="product_buy">
			<div class="product_buy_text">
			<p>5 400 руб</p>
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
</html>