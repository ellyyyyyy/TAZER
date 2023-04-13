<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/intro.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/products.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/other-main.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/products-page.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/account.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/admin.css?<?php echo time(); ?>">
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
			<div class="slide11 overlay">
				<div class="wrapper_slide">
				<a href="#" class="slider__caption ">Tazer DeathStalker V2</a>
				<p class="slider__txt ">Сократите конкуренцию с Tazer DeathStalker V2 — ультратонкой оптической клавиатурой, оптимизированной для обеспечения высочайшей производительности и долговечности. Благодаря совершенно новым низкопрофильным переключателям для сверхбыстрых игр в прочном ультратонком корпусе для длительного эргономичного использования.</p>
				</div>
			</div>
		</div>

		<div class="wrapper">
			<div class="product_info">
				<div class="product_text">
					<h2>НИЗКОПРОФИЛЬНЫЕ ОПТИЧЕСКИЕ ПЕРЕКЛЮЧАТЕЛИ</h2>
					<p>Вооружившись таким же молниеносным откликом, который является отличительной чертой всех наших оптических клавиатур, выполняйте более быстрые нажатия клавиш с помощью совершенно новых переключателей, которые обладают более низким расстаянием срабатывания для уменьшения хода клавиш, а срок службы клавиш составляет 70 миллионов нажатий для долговременной работы.</p>
					<h2>СВЕРХТОНКИЙ КОРПУС С ПРОЧНОЙ АЛЮМИНИЕВОЙ ВЕРХНЕЙ ПЛАСТИНОЙ</h2>
					<p>Тонкий профиль клавиатуры обеспечивает нейтральное положение руки в течение долгих часов использования с небольшим напряжением, а верхняя пластина из алюминиевого сплава 5052 обеспечивает большую долговечность с удовлетворительным весом.</p>
				</div>
				<div class="product_buy">
					<div class="product_buy_text">
						<p>15 499 руб</p>
						<p>В наличии</p>
					</div>
					<form action='backend/addcart.php?id=55' method='post'>
						<input type="hidden" name="name" value="Tazer Deathstalker V2">
						<input type="hidden" name="price" value="15499">
						<input type="hidden" name="category" value="keyboard">
						<button class="product_button" name='add' id='add' type="submit">В корзину</button>
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
				<form class="form_email" action="backend/subscribe.php" method="post">
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