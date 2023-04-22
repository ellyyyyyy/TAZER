<?
// Страница регистрации нового пользователя

// Соединямся с БД
$host = "localhost";
$user = "root";
$passw = "";
$db_name = "tazer";


$link=new mysqli($host, $user, $passw, $db_name);
if(isset($_POST['submit']))
{
    $err = [];

    // проверям логин

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "<h2 class='meow'>Логин должен быть не меньше 3-х символов и не больше 30</h2>";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "<h2 class='meow'>Пользователь с таким логином уже существует в базе данных</h2>";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {

        $login = $_POST['login'];

        // Убераем лишние пробелы и делаем двойное хеширование
        $password = md5(md5(trim($_POST['password'])));

        mysqli_query($link,"INSERT INTO users SET user_login='".$login."', user_password='".$password."'");
        header("Location: index.php"); exit();
    }
    else
    {
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}


?>


<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/intro.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/products.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/other-main.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/products-page.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/account.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="css/admin.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/back.css?<?php echo time(); ?>">
<div class="container">
    <div id="otkrutokno" class="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Регистрация</h3>
            <a href="index.php" title="Close" class="close">×</a>
          </div>
          <div class="modal-body">
          <form method="POST">
          <label> Логин </label> <input placeholder="Введите Вашу электронную почту" name="login" type="email" required><br>
          <label> Пароль </label> <input placeholder="Введите Ваш пароль" name="password" type="password" required><br>
            <input class="input" name="submit" type="submit" value="Регистрация">
            </form>
            <a class="main_text link" href="login.php">Уже есть аккаунт?</a>
          </div>
        </div>
      </div>
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
            <script src="js/message.js"></script>