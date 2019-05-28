<?php
session_start();
$db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
$_SESSION['user']['Login'] = null;
header("location: index.php");
?>

