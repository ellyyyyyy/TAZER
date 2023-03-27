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
		include 'connect.php';
		error_reporting(E_ERROR | E_PARSE);
		session_start();
		$status = $_SESSION['login_status'];
		?>

		<div class="intro">
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
										<a href="logout.php"><li>Выйти</li></a>
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
				<div class="intro_title">
					<p class="intro_text main_text">TAZER</p>
					<p class="intro_subtext1 main_text">ДЛЯ ГЕЙМЕРОВ.</p>
					<p class="intro_subtext2 main_text">ОТ ГЕЙМЕРОВ.</p>
				</div>
			</div>
		</div>

	<div class="wrapper">
		<div class="products">
			<form class="filters" method="get">
				<label>
					<label class="radio">
					<p class="radio_text">Все</p>
					<input class="hidden" type="radio" name="category" value="" checked>
					<span class="label"></span>
					</label>
					<label class="radio">
					<p class="radio_text">Мыши</p>
					<input class="hidden" type="radio" name="category" value="mouse">
					<span class="label"></span>
					</label>
					<label class="radio">
					<p class="radio_text">Клавиатуры</p>
					<input class="hidden" type="radio" name="category" value="keyboard">
					<span class="label"></span>
					</label>
					<label class="radio">
					<p class="radio_text">Наушники</p>
					<input class="hidden" type="radio" name="category" value="headphones">
					<span class="label"></span>
					</label>
					<label class="radio">
					<p class="radio_text">Коврики</p>
					<input class="hidden" type="radio" name="category" value="mats">
					<span class="label"></span>
				</label>
				<button class="filter_button" type="submit">Применить фильтры</button>
			</form>
		</div>

		<div class="products_list">
		<?php
		$category = isset($_GET['category']) ? $_GET['category'] : '';
		if ($category) {
			$result = $conn -> query("select * from products where category='$category' limit 8 ");
		}
		else {
			$result = $conn -> query("select * from products limit 8");
		}
			if($result -> num_rows > 0) {
				while($row = $result -> fetch_assoc()) { ?>
				<form action='addcart.php?id=<?= $row['id'] ?>' method='post'>
				<div class="products_item" data-category="<?= $row['category'] ?>"> 
				<input type='submit' name='add' id='add' value='Add to Cart'>
				<img class="products_img" src="img/<?= $row['id'] ?>.png" alt="1">
				<p class="products_name"><?= $row['name'] ?></p>
				<div class="products_wrapper">
				<p class="products_price"><?= $row['price'] ?></p>
				</div>
				</div>
				</form>
				<?php
				}
			}
			?>
		</div>
		
		</div>

			<div class="wrapper_help">
				<div class="help">
					<p class="help_title">Нужна помощь?</p>
					<p class="help_subtitle">Вы сможете найти ответы на странице Поддержка</p>
					<button class="help_button"><a href="help.php" class="button_text">Узнать больше</a></button>
				</div>
			</div>

			<div class="collections">
				<h2 class="collections_text">НАШИ КОЛЛЕКЦИИ</h2>
				<img class="collections_zone" src="/img/collections.png">
				<div class="collections_wrapper">
					<div class="collection1"></div>
					<a href="collection1.php" class="collection1_text">Tazer Quartz Pink</a>
					<div class="collection2"></div>
					<a href="collection2.php" class="collection2_text">Tazer Mercury White</a>
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