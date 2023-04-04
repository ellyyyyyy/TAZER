<?php 
    $host = "tazer";
    $user = "root";
    $passw = "";
    $db_name = "tazer";

    $conn = new mysqli($host, $user, $passw, $db_name);

    if ($conn -> connect_error) {
        die("ОШИБКА ПОДКЛЮЧЕНИЯ: " . $conn -> connect_error);
    }
?>
