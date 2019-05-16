<?php
session_start();
$db = mysqli_connect('127.0.0.1', 'root', '', 'users');
$_SESSION['user']['Login'] = null;
header("location: index.php");
?>

