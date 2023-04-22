<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/intro.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/products.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/other-main.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/account.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/admin.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/products-page.css?<?php echo time(); ?>">
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
				$total_price = 0;
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
					$total_price += str_replace(' ', '', $row['price']);
				?>	
					<form action='backend/deletecart.php?id=<?= $row['id'] ?>' method='post'>
						<div class="products_item" data-category="<?= $row['category'] ?>">
							<button class="btn btn-slide-left" type='submit' name='remove' id='remove'>
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16"><path d="M4.11 2.697L2.698 4.11 6.586 8l-3.89 3.89 1.415 1.413L8 9.414l3.89 3.89 1.413-1.415L9.414 8l3.89-3.89-1.415-1.413L8 6.586l-3.89-3.89z"></svg>							
							</button>
							<img class="products_img" src="img/<?= $row['id'] ?>.png" alt="1">
							<p class="products_name"><?= $row['name'] ?></p>
							<div class="products_wrapper">
								<p class="products_price"><?= $row['price'] ?> ₽</p>
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
				<div class="wrappercart">
					<form action="backend/reset.php" method="GET">
						<input class="buttoncart" type="submit" value="Очистить" name="reset" id="reset" />
					</form>
					<?php
						if ($status) {
					?>
					<form action="backend/addcarttobd.php" method="GET">
						<input class="buttoncart" type="submit" value="Заказать"/>
					</form>
					<?php
					}
					else {
					?>
					<p class='result'>Для заказа требуется авторизация</p>
					<?php
					}
					?>
					<?php
					echo "<p class='main_text'>Стоимость корзины<p class='result'>";
					echo $total_price;
					echo " рублей</p>";
					?>
				</div>
				<?php
					}
				?>  
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