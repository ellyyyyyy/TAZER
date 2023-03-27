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
		$connection = mysqli_connect($host, $user, $passw, $db_name);
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
								<a href="#"><li>Корзина</li></a>
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
							<div class="products_item" data-category="<?= $row['category'] ?>"> 
							<img class="products_img" src="img/<?= $row['id'] ?>.png" alt="1">
							<p class="products_name"><?= $row['name'] ?></p>
							<div class="products_wrapper">
							<p class="products_price"><?= $row['price'] ?></p>
							</div>
							</div>
							<?php
						}
						}
					} else {
						print("<h2>You don't have any items in your shopping cart.</h2>");
					}
				?>  
				
					<form action="reset.php" method="GET">
					<label for="reset">Reset cart: </label>
					<input type="submit" value="RESET" name="reset" id="reset" />
					</form>
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