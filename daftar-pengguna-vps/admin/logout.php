<?php
//Logout
session_start();
unset($_SESSION['admin_username']);
session_destroy();
header("location:login_admin.php");
?>