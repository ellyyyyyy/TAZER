<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Подключаемся к базе данных
  $db = new mysqli('localhost', 'root', '', 'tazer');

  // Получаем значение поля email из формы
  $email = $db->real_escape_string($_POST['email']);

  // Добавляем значение email в базу данных
  $query = "INSERT INTO mailing (email) VALUES ('$email')";
  $result = $db->query($query);
  $message = "Вы подписались на рассылку!";
  header("Location: ../index.php?message=" . urlencode($message));

  // Закрываем соединение с базой данных
  $db->close();
}
?>