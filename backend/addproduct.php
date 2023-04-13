<?php
// Подключаемся к базе данных
$db = new mysqli('localhost', 'root', '', 'tazer');

// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Получаем данные из формы
  $name = $_POST['name'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $collection = $_POST['collection'];

  // Добавляем товар в базу данных
  $result = $db->query("INSERT INTO products (name, price, category, collection) VALUES ('$name', '$price', '$category', '$collection')");
  if ($result) {
    // Получаем ID созданного товара
    $product_id = $db->insert_id;

    // Сохраняем изображение на диск
    $image_name = $product_id . '.png'; // Присваиваем имя изображению
    $target_dir = '../img/'; // Директория для сохранения изображения
    $target_file = $target_dir . $image_name;
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    // Обновляем запись в базе данных с именем изображения
    $result = $db->query("UPDATE products SET image='$image_name' WHERE id='$product_id'");

    // Перенаправляем пользователя на страницу со списком товаров
    header('Location: admin.php');
    exit;
  }
}
?>

<!-- HTML-форма для добавления товара -->
<link rel="stylesheet" href="../css/reset.css">
	<link rel="stylesheet" href="../css/intro.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/products.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/other-main.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/products-page.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/account.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/admin.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/back.css?<?php echo time(); ?>">
<div class="wrapper">
<form  class="addform" method="post" enctype="multipart/form-data">
<div class="addform_main">
  
  <label class='result'>Название товара</label>
  <input class="addform_input" type="text" name="name">

  <label class='result'>Цена</label>
  <input class="addform_input" type="text" name="price">
  <label class='result'>Категория</label>
  <select class="addform_input" name="category">
    <option value="mouse">Мышь</option>
    <option value="keyboard">Клавиатура</option>
    <option value="headphones">Наушники</option>
    <option value="mats">Коврик</option>
  </select>

  <label class='result'>Коллекция</label>
  <select class="addform_input" name="collection">
    <option value="">Нет</option>
    <option value="pink">Quartz Pink</option>
    <option value="white">Mercury White</option>
  </select>
  <input class="addform_input" type="submit" value="Добавить товар">
  <a class="addform_back" href="admin.php">Вернуться</a>
</div>
<div class="addform_input_img">
  <label for="images" class="drop-container">
    <span class="drop-title main_text">Перетащите сюда фото PNG</span>
    <span class="drop-title main_text">или</span>
    <input class="main_text" name="image" type="file" id="images" accept="image/*" required>
  </label>
  <script>
    var dropContainer = document.querySelector('.drop-container');
    dropContainer.addEventListener('dragover', function(e) {
      e.preventDefault();
      dropContainer.classList.add('dragover');
    });
    dropContainer.addEventListener('dragleave', function(e) {
      e.preventDefault();
      dropContainer.classList.remove('dragover');
    });
    dropContainer.addEventListener('drop', function(e) {
      e.preventDefault();
      dropContainer.classList.remove('dragover');
      var file = e.dataTransfer.files[0];
      document.querySelector('#images').files = e.dataTransfer.files;
    });
  </script>
</div>

</form>
<ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
</div>

