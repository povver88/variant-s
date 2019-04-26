<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
if(isset($_POST['id']))
{
    $user = $_SESSION['user']['Login'];
    $id = intval($_POST['id']);
    $_SESSION[$user][$id]=$id;
}
header("location: index.php")
?>