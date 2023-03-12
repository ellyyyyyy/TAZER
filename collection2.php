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
</html>