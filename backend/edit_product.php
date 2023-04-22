<?php
// подключаемся к базе данных
$host = "localhost";
$user = "root";
$passw = "";
$db_name = "tazer";
$conn = new mysqli($host, $username, $passw, $db_name);

// проверяем соединение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// обработчик отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // получаем значения из формы
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $collection = $_POST["collection"];
  
    // проверяем, что цена является числом
    if (!is_numeric($price)) {
      echo "Ошибка: цена должна быть числом!";
    } else {
      // удаляем пробелы из значения цены
      $price = str_replace(' ', '', $price);
  
      // обновляем данные товара в базе данных
      $sql = "UPDATE products SET name='$name', price='$price', category='$category', collection='$collection' WHERE id=$id";
      if ($conn->query($sql) === TRUE) {
        header("location: admin.php");
      } else {
        echo "Ошибка при изменении данных товара: " . $conn->error;
      }
    }
  }

// получаем данные текущего товара из базы данных
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $sql = "SELECT * FROM products WHERE id=$id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $price = $row["price"];
    $category = $row["category"];
    $collection = $row["collection"];
  } else {
    echo "Объект не найден!";
  }
}

// закрываем соединение с базой данных
$conn->close();
?>

<!-- форма редактирования товара -->
<link rel="stylesheet" href="../css/reset.css">
	<link rel="stylesheet" href="../css/intro.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/products.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/other-main.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/products-page.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/account.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/admin.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/back.css?<?php echo time(); ?>">
<div class="wrapper">
<div class="addform_main">
<form class="addform" style="flex-direction: column;align-items: center;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <input class="addform_input" type="hidden" name="id" value="<?php echo $id;?>">
  <label class='result' for="name">Название товара</label>
  <input class="addform_input" type="text" id="name" name="name" value="<?php echo $name;?>"><br><br>
  <label class='result' for="price">Цена товара</label>
  <input class="addform_input" type="text" id="price" name="price" value="<?php echo $price;?>"><br><br>
  <label class='result' for="category">Категория товара</label>
  <input class="addform_input" type="text" id="category" name="category" value="<?php echo $category;?>"><br><br>
  <label class='result' for="collection">Коллекция товара</label>
  <select class="addform_input" name="collection">
    <option value="">Нет</option>
    <option value="pink" <?php if ($collection == 'pink') echo 'selected'; ?>>Quartz Pink</option>
    <option value="white" <?php if ($collection == 'white') echo 'selected'; ?>>Mercury White</option>
  </select>
  <input class="addform_input" type="submit" value="Сохранить изменения">
  <a class="addform_back" href="admin.php">Отменить</a>
</form>
</div>
</div>
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
