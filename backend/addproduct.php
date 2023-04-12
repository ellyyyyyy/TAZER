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
<form method="post" enctype="multipart/form-data">
  <label>Название товара:</label>
  <input type="text" name="name">

  <label>Цена:</label>
  <input type="text" name="price">

  <label>Категория:</label>
  <select name="category">
    <option value="mouse">Мышь</option>
    <option value="keyboard">Клавиатура</option>
    <option value="headphones">Наушники</option>
    <option value="mats">Коврик</option>
  </select>

  <label>Коллекция:</label>
  <select name="collection">
    <option value="">Нет</option>
    <option value="pink">Quartz Pink</option>
    <option value="white">Mercury White</option>
  </select>

  <label>Изображение:</label>
  <input type="file" name="image">

  <input type="submit" value="Добавить товар">
</form>