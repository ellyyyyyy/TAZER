<?php 
$host = "localhost";
$user = "root";
$passw = "";
$db_name = "tazer";

    $conn = new mysqli($host, $user, $passw, $db_name);
    session_start();
    if ($conn -> connect_error) {
        die("ОШИБКА ПОДКЛЮЧЕНИЯ: " . $conn -> connect_error);
    }
    if (isset($_POST['delete'])) {
        header("Location: admin.php");
    }
    if (isset($_POST['delete1'])) {
        header("Location: admin.php");
    }
    if (isset($_POST['remove'])) {
        $order_id = $_POST['order_id'];
        $delete_query = $conn -> query("DELETE FROM orders WHERE id=$order_id");
        header("Location: admin.php");
    }
    $result = $conn -> query("SELECT orders.id, orders.products_id, users.user_login FROM orders JOIN users ON orders.user_id = users.user_id");
?>
	<link rel="stylesheet" href="../css/reset.css">
	<link rel="stylesheet" href="../css/intro.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/products.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/other-main.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/products-page.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/account.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="../css/admin.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/back.css?<?php echo time(); ?>">
    <div class="wrapper">
    <a class="result1 order_block" style="grid-template-columns:1fr;text-decoration:none;" href="addproduct.php">Добавить продукт</a>
    <a class="result1 order_block" style="grid-template-columns:1fr;text-decoration:none;list-style-type:none;" href="logout.php"><li>Выйти</li></a>
    <div class="order_block" style="padding: 10px 10px;margin-top: 50px;"><label class='result'>Заказы</label></div>
<?php
    if($result -> num_rows > 0) {
        while($row = $result -> fetch_assoc()) {
            $array = mb_split(',', $row['products_id']);
?>

            <div class="order_block">
                <h2><?= $row['user_login'] ?>
                <form method="post">
                    <input type="hidden" name="order_id" value="<?= $row['id'] ?>">
                    <button class="btn1 btn-slide-left delete" type='delete_order' name='remove' id='remove'>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16"><path d="M4.11 2.697L2.698 4.11 6.586 8l-3.89 3.89 1.415 1.413L8 9.414l3.89 3.89 1.413-1.415L9.414 8l3.89-3.89-1.415-1.413L8 6.586l-3.89-3.89z"></svg>							
					</button>
                </form></h2>
                <?php foreach($array as $id) {
                    $product_query = $conn -> query("SELECT * FROM products WHERE id=$id");
                    $product = $product_query -> fetch_assoc();?>
                    <div class="products_item1" data-category="<?= $product['category'] ?>">
                        <p class="products_name"><?= $product['name'] ?></p>
                        <div class="products_wrapper">
                            <p class="products_price"><?= $product['price'] ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <?php
        }
    }
    ?>
    </div>
    <?php
?>
<div class="wrapper"><div class="order_block" style="padding: 10px 10px;margin-top: 50px;"><label class='result'>Товары</label></div></div>
<link rel="stylesheet" href="../css/back.css?<?php echo time(); ?>">
<?php
$db = new mysqli('localhost', 'root', '', 'tazer');
$result1 = $db->query("SELECT * FROM products");
$result2 = $db->query("SELECT * FROM mailing");
?>
<div class="admin_wrapper">
<?php

// Выводим список товаров и кнопки редактирования
while ($row = $result1->fetch_assoc()) {
    ?>
    <div class="admin_wrap">
    <div class="products_item1" data-category="<?= $row['category'] ?>">
        <p class="products_name"><?= $row['name'] ?></p>
        <div class="products_wrapper">
            <p class="products_price"><?= $row['price'] ?> ₽</p>
        </div>
    </div>
    <form class="buttons" method="post">
    <a class="btn1 btn-slide-left" href='edit_product.php?id=<?=$row['id']?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capslock-fill" viewBox="0 0 16 16"><path d="M7.27 1.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1H1.654C.78 9.5.326 8.455.924 7.816L7.27 1.047zM4.5 13.5a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1z"/></svg></a>
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <button class="btn1 btn-slide-left delete" type='submit' name='delete'>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16"><path d="M4.11 2.697L2.698 4.11 6.586 8l-3.89 3.89 1.415 1.413L8 9.414l3.89 3.89 1.413-1.415L9.414 8l3.89-3.89-1.415-1.413L8 6.586l-3.89-3.89z"></svg>							
        </button>
    </form>
    </div>

<?php

}
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $stmt = $db->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: admin.php");
    exit();
  }
?>
</div>
<div class="admin_wrapper">
<?php
while ($row = $result2->fetch_assoc()) {
    ?>
    <div class="admin_wrap">
    <div class="products_item1" data-category="<?= $row['category'] ?>">
        <p class="products_name"><?= $row['email'] ?></p>

    </div>
    <form class="buttons" method="post">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <button class="btn1 btn-slide-left delete" type='submit' name='delete1'>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16"><path d="M4.11 2.697L2.698 4.11 6.586 8l-3.89 3.89 1.415 1.413L8 9.414l3.89 3.89 1.413-1.415L9.414 8l3.89-3.89-1.415-1.413L8 6.586l-3.89-3.89z"></svg>							
        </button>
    </form>
    </div>
    <?php
        }
        if (isset($_POST['delete1'])) {
            $id = $_POST['id'];
            $stmt = $db->prepare("DELETE FROM mailing WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            header("Location: admin.php");
            exit();
          }
    ?>
    </div>
<ul class="circles">
                    <li></li><li></li><li></li>
                    <li></li><li></li><li></li>
                    <li></li><li></li><li></li>
                    <li></li><li></li><li></li>
   
            </ul>