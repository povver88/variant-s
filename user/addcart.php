<?php
session_start();
$db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
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