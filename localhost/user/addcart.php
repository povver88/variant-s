<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
if(isset($_POST['id']))
{
    $id = intval($_POST['id']);
    $_SESSION['idcart'][$id]=$id;
}
header("location: index.php")
?>