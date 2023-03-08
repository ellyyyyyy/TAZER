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
	<div class="intro">
		<div class="wrapper">
				<nav>
					<ul class="nav">
						<li class="logo"><a href="">TAZER</a></li>
						<li class="nav_item"><a href="">Главная</a></li>
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
						      <div class="nav_wrapp">
						<li class="nav_item1"><a href="">Главная</a></li>
						<li class="nav_item1"><a href="products.php">Товары</a></li>
						<li class="nav_item1"><a href="">Поддержка</a></li>
							  </div>
						    </ul>
						  </div>
					</ul>
				</nav>
				<div class="intro_title">
					<p class="intro_text">TAZER</p>
					<p class="intro_subtext1">ДЛЯ ГЕЙМЕРОВ.</p>
					<p class="intro_subtext2">ОТ ГЕЙМЕРОВ.</p>
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

		<div class="wrapper">
			<div class="help">
				<p class="help_title">Нужна помощь?</p>
				<p class="help_subtitle">Вы сможете найти ответы на странице Поддержка</p>
				<button class="help_button"><a href="" class="button_text">Узнать больше</a></button>
			</div>
		</div>

		<div class="collections">
			<h2 class="collections_text">НАШИ КОЛЛЕКЦИИ</h2>
			<img class="collections_zone" src="/img/collections.png">
			<div class="collections_wrapper">
				<div class="collection1"></div>
				<a href="#" class="collection1_text">Tazer Quartz Pink</a>
				<div class="collection2"></div>
				<a href="#" class="collection2_text">Tazer Mercury White</a>
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