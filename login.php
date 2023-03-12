<?php
// Установка параметров подключения к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tazer";

// Подключение к базе данных
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверка соединения
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Обработка отправленной формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Проверка наличия пользователя в базе данных
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Проверка пароля
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // Авторизация прошла успешно
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            header("location: products.php");
        } else {
            // Пароль неверный
            echo "Неверный пароль.";
        }
    } else {
        // Пользователь не найден
        echo "Пользователь не найден.";
    }

    
    mysqli_close($conn);
}
?>