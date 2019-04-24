<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
if(isset($_GET['id']))
{
    $id = intval($_GET['id']);
    $_SESSION['idcart'][$id]=$id;
}
header("location: productslist.php")
?>