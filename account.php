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
		$connection = mysqli_connect($host, $user, $passw, $db_name);
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
							<a href="#"><li>Корзина</li></a>
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
		

        <div class="wrapper_cart">
			<div class="products_list3">
            <?php
			if(isset($_SESSION['shoppingcart']) && count($_SESSION['shoppingcart'])) {
				$list = $_SESSION['shoppingcart'];
				foreach($list as $item) {
				$id = $item['id'];

				$query  = "SELECT * FROM products WHERE id='$id'";
				$result = mysqli_query($connection, $query);

				if(mysqli_num_rows($result) == 1) {
					$row = mysqli_fetch_array($result);
					$id = $_GET['id'];
					$name = $_GET['name'];
					$price = $_GET['price'];
					$category = $_GET['category'];
			
				?>	
					<form action='deletecart.php?id=<?= $row['id'] ?>' method='post'>
					<div class="products_item" data-category="<?= $row['category'] ?>">
					<button class="btn btn-slide-left" type='submit' name='remove' id='remove'>
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16"><path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/></svg>
					</button>
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
					} else {
						print("<h2 class='collections_text'>Пока тут пусто.</h2>");
						
					}
				?>  
				<?php
						if(mysqli_num_rows($result) == 1) {
						?>
						
					</div>
					<form action="reset.php" method="GET">
					<input class="product_button" type="submit" value="Очистить" name="reset" id="reset" />
					</form>
					<?php
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