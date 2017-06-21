<?php
session_start();

session_destroy();

echo "<script>window.open('login.php?logged_in','_self')</script>";


?>