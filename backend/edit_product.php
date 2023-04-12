<?php
// подключаемся к базе данных
$host = "localhost";
$dbname = "tazer";
$username = "root";
$password = "";
$conn = new mysqli($host, $username, $password, $dbname);

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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <input type="hidden" name="id" value="<?php echo $id;?>">
  <label for="name">Название товара:</label>
  <input type="text" id="name" name="name" value="<?php echo $name;?>"><br><br>
  <label for="price">Цена товара:</label>
  <input type="text" id="price" name="price" value="<?php echo $price;?>"><br><br>
  <label for="category">Категория товара:</label>
  <input type="text" id="category" name="category" value="<?php echo $category;?>"><br><br>
  <label for="collection">Коллекция товара:</label>
  <input type="text" id="collection" name="collection" value="<?php echo $collection;?>"><br><br>
  <input type="submit" value="Сохранить изменения">
</form>