<?
// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

// Соединямся с БД
$host = "tazer";
$user = "root";
$passw = "";
$db_name = "tazer";


$link=new mysqli($host, $user, $passw, $db_name);

if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['user_password'] === md5(md5($_POST['password'])))
    {
        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));

        // Записываем в БД новый хеш авторизации
        mysqli_query($link, "UPDATE users SET user_hash='".$hash."' WHERE user_id='".$data['user_id']."'");

        // Ставим куки
        setcookie("id", $data['user_id'], time()+60*60*24*30, "/");
        setcookie("hash", $hash, time()+60*60*24*30, "/", null, null, true); // httponly !!!
        session_start();
        $_SESSION['login_status'] = true;

        
        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: check.php"); exit();
    }
    else
    {
        print "<h2 class='meow'>Вы ввели неправильный логин/пароль</h2>";
    }
}
?>

<link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
<link rel="stylesheet" href="css/back.css?<?php echo time(); ?>">
<div class="container">
    <div id="otkrutokno2" class="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Авторизация</h3>
            <a href="index.php" title="Close" class="close">×</a>
          </div>
          <div class="modal-body">
          <form method="POST">
          <label> Логин </label><input placeholder="Введите Ваш логин" name="login" type="text" required><br>
          <label> Пароль </label> <input placeholder="Введите Ваш пароль" name="password" type="password" required><br>
            <input class="input" name="submit" type="submit" value="Войти">
        </form>
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
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>