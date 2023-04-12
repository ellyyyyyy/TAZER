<?php
if(isset($_GET['reset'])) {
    session_start();
    unset($_SESSION['shoppingcart']);
    session_destroy();
    $message = "Вы очистили корзину";
    header("Location: ../account.php?message=" . urlencode($message));
  }
  
  // Start the session for the rest of the page after destroying it.
  session_start();
  ?>