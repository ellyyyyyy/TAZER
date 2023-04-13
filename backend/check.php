<?
// Скрипт проверки

// Соединямся с БД
$host = "tazer";
$user = "root";
$passw = "";
$db_name = "tazer";


$link=new mysqli($host, $user, $passw, $db_name);
if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{
    $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);

    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id']))
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true); // httponly !!!
        print "<h2 class='meow'>Хм, что-то не получилос</h2>";
    }
    else
    {
        $message = "Вы успешно авторизовались";
        header("Location: ../index.php?message=" . urlencode($message));
    }
}
else
{
    print "<h2 class='meow'>Включите куки</h2>";
}
?>
	<link rel="stylesheet" href="../css/reset.css">
	<link rel="stylesheet" href="../css/intro.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/products.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/other-main.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/products-page.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/account.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/admin.css?<?php echo time(); ?>">
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