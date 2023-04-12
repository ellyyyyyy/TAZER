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

			<div class="slider">
  <input type="radio" name="slider" title="slide1" checked="checked" class="slider__nav"/>
  <input type="radio" name="slider" title="slide2" class="slider__nav"/>
  <input type="radio" name="slider" title="slide3" class="slider__nav"/>
  <input type="radio" name="slider" title="slide4" class="slider__nav"/>
  <div class="slider__inner">
    <div class="slider__contents slide1 overlay">
      <a href="product1.php" class="slider__caption">Tazer DeathStalker V2</a>
      <p class="slider__txt">Сократите конкуренцию с Tazer DeathStalker V2 — ультратонкой оптической клавиатурой, оптимизированной для обеспечения высочайшей производительности и долговечности. Благодаря совершенно новым низкопрофильным переключателям для сверхбыстрых игр в прочном ультратонком корпусе для длительного эргономичного использования.</p>
    </div>
    <div class="slider__contents slide2 overlay">
      <a href="product2.php" class="slider__caption">Tazer BlackShark V2</a>
      <p class="slider__txt">Если киберспорт для вас все, тогда выложитесь на полную с Tazer BlackShark V2. С этой киберспортивной гарнитурой, представляющей собой тройную угрозу за счет восхитительного звучания, превосходной чистоты микрофона и звукоизоляции высокого качества, настало ваше время стать про-игроком.</p>
    </div>
    <div class="slider__contents slide3 overlay">
      <a href="product3.php" class="slider__caption">Tazer Ornata V3 X</a>
      <p class="slider__txt">Сделайте первый шаг к производительности следующего уровня с Tazer Ornata V3 X — низкопрофильной эргономичной игровой клавиатурой, разработанной для того, чтобы поднять вашу работу и игру на новый уровень. Благодаря новому ультратонкому форм-фактору, более прочным колпачкам клави, эта клавиатура является идеальным представлением нашего несправедливого преимущества.</p>
    </div>
    <div class="slider__contents slide4 overlay">
      <a href="product4.php" class="slider__caption">Tazer Strider Chroma</a>
      <p class="slider__txt">Представляем Tazer Strider Chroma — первый в мире гибридный коврик для мыши с несколькими зонами подсветки. Благодаря 19 настраиваемым зонам подсветки  вам доступен уровень индивидуальной настройки, которому нет равных. Кроме того, поверхность коврика, сочетающая лучшие качества различных покрытий, обеспечит совершенную точность управления.</p>
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
					$result = $conn -> query("select * from products where category='$category'");
				}
				else {
				 $result = $conn -> query("select * from products");
				}
                    if($result -> num_rows > 0) {
                        while($row = $result -> fetch_assoc()) { ?>
					<form action='backend/addcart.php?id=<?= $row['id'] ?>' method='post'>
						<div class="products_item" data-category="<?= $row['category'] ?>"> 
							<button class="btn btn-slide-left" type='submit' name='add' id='add'>
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16"><path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/></svg>
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
                    ?>

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