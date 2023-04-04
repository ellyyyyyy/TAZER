<?php

session_start();
session_unset();
session_destroy();
setcookie("id", "", time() - 3600*24*30*12, "/");
setcookie("hash", "", time() - 3600*24*30*12, "/",null,null,true); // httponly !!!


header("location: ../index.php");
?>