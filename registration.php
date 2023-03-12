<?php
// Подключение к базе данных MySQL
$conn = mysqli_connect("localhost", "root", "", "tazer");

// Проверка подключения к базе данных
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Обработка данных, полученных из формы регистрации
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Проверка, что пароль и его подтверждение совпадают
if ($password !== $confirm_password) {
    echo "Пароли не совпадают";
    exit();
}

// Хеширование пароля для безопасного хранения в базе данных
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Проверка, что пользователь с таким email еще не зарегистрирован
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count > 0) {
    echo "Пользователь с таким email уже зарегистрирован";
    exit();
}

// Добавление нового пользователя в базу данных
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

if (mysqli_query($conn, $sql)) {
    header('Location: index.php');

} else {
    echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
}

// Закрытие соединения с базой данных MySQL
mysqli_close($conn);
?>