<?php
if(isset($_GET['reset'])) {
    session_start();
    unset($_SESSION['shoppingcart']);
    session_destroy();
    header("Location: ../account.php");
  }
  
  // Start the session for the rest of the page after destroying it.
  session_start();
  ?>