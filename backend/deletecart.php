<?php 
    session_start();
    $host = "tazer";
    $user = "root";
    $passw = "";
    $db_name = "tazer";

    $conn = new mysqli($host, $user, $passw, $db_name);

    if ($conn -> connect_error) {
        die("ОШИБКА ПОДКЛЮЧЕНИЯ: " . $conn -> connect_error);
    }
    
    $id = $_GET['id'];
    if(isset($_POST['remove'])) {
    session_start();
    for ($i=0; $i<count($_SESSION['shoppingcart']);$i++) {
        if ($_SESSION['shoppingcart'][$i]['id'] == $id) {
            unset($_SESSION['shoppingcart'][$i]);
        }
    }
    $message = "Вы удалили товар из корзины";
    header("Location: ../account.php?message=" . urlencode($message));
    }
?>
