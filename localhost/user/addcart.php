<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
if(isset($_POST['id']))
{
    $user = $_SESSION['user']['Login'];
    $id = intval($_POST['id']);
    $price = floatval($_POST['price']);
    $_SESSION[$user][$id]=$id;
    $_SESSION['OrderPrice'][$user][$id] = $price;
}
header("location: index.php")
?>