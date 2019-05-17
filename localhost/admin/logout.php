<?php
session_start();
$db = mysqli_connect('127.0.0.1', 'root', '', 'users');
$_SESSION['SuccessAdmin'] = "False";
header("location: loginadmin.php");
?>

