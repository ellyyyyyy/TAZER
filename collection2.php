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
	    		<div class="slide17 overlay">
	    			<div class="wrapper_slide">
	      			<a href="#" class="slider__caption ">СОСТОЯНИЕ СВЕЖЕСТИ</a>
	      			<p class="slider__txt ">Пусть ваши игры говорят сами за себя, как и ваш стиль. Чистая, свежая, современная — это новая расширенная коллекция игровых устройств и аксессуаров Tazer Mercury White.</p>
	 				</div>
	 			</div>
			</div>

			<div class="wrapper">
				<div class="products">
					<form class="filters" method="get">
						<label>
						<label class="radio">
							<p class="radio_text ">Все</p>
							<input class="hidden" type="radio" name="category" value="" checked>
							<span class="label white"></span>
						</label>
						<label class="radio">
							<p class="radio_text">Мыши</p>
							<input class="hidden" type="radio" name="category" value="mouse">
							<span class="label white"></span>
						</label>
						<label class="radio">
							<p class="radio_text">Клавиатуры</p>
							<input class="hidden" type="radio" name="category" value="keyboard">
							<span class="label white"></span>
						</label>
						<label class="radio">
							<p class="radio_text">Наушники</p>
							<input class="hidden" type="radio" name="category" value="headphones">
							<span class="label white"></span>
						</label>
							<label class="radio">
							<p class="radio_text">Коврики</p>
							<input class="hidden" type="radio" name="category" value="mats">
							<span class="label white"></span>
						</label>
					<button class="filter_button white" type="submit">Применить фильтры</button>
					</form>
				</div>

				<div class="products_list">
				<?php
				$category = isset($_GET['category']) ? $_GET['category'] : '';
				if ($category) {
					$result = $conn -> query("select * from products where category='$category' and collection='white'");
				}
				else {
				 $result = $conn -> query("select * from products where collection='white'");
				}
                    if($result -> num_rows > 0) {
                        while($row = $result -> fetch_assoc()) { ?>
                        <div class="products_item" data-category="<?= $row['category'] ?>"> 
                        <a href="#" class="cart"><img src="svg/cart.svg" alt=""></a>
                    	<img class="products_img" src="img/<?= $row['id'] ?>.png" alt="1">
                    	<p class="products_name"><?= $row['name'] ?></p>
                    	<div class="products_wrapper">
						<p class="products_price"><?= $row['price'] ?></p>
						</div>
						</div>
				<?php
                        }
                    }
                ?>
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