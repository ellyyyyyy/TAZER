<?php 
    $host = "tazer";
    $user = "root";
    $passw = "";
    $db_name = "tazer";

    $conn = new mysqli($host, $user, $passw, $db_name);
    session_start();

    if ($conn -> connect_error) {
        die("ОШИБКА ПОДКЛЮЧЕНИЯ: " . $conn -> connect_error);
    }
    $id = "";

    
    foreach($_SESSION['shoppingcart'] as $product) {
        $id .= $product["id"] . ",";
    }
    $id = mb_substr($id, 0, strlen($id)-1);
    $user = $_COOKIE['id'];
    $query = "insert into orders (products_id, user_id) values ('$id', '$user')";
    $conn -> query($query);
    $message = "Вы успешно совершили заказ";
    header("Location: ../index.php?message=" . urlencode($message));
?>
