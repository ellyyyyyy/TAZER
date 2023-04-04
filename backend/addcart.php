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
    $name = $_GET['name'];
    $price = $_GET['price'];
    $category = $_GET['category'];
    // Check if the add to cart button was clicked or someone just wants to load this page. This POST method `add` is from the id of the add to cart button on the detail page.
    if(isset($_POST['add'])) {
    // Check if there is a session for the cart set already, if not then set one.
    if(!isset($_SESSION['shoppingcart'])) {
        $_SESSION['shoppingcart'] = [];
    }

    $item = [
        "id"       => $id,
        "name"     => $name,
        "price"    => $price,
        "category" => $category
    ];

    // Now add new item to the cart
    array_push($_SESSION['shoppingcart'], $item);

    // Once added let's take the user to the cart page
    header("Location: ../index.php");
    }
?>
