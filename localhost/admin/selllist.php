<?php
session_start();
if($_SESSION['SuccessAdmin'] != "True")
{
    $_SESSION['AdminError'] = "<li>Неправильный пароль или логин</li>";
    header('location: loginadmin.php');
}
$db = mysqli_connect('localhost', 'root', '', 'users');
$resultOpt = mysqli_query($db,"SELECT * FROM user WHERE opt='2'");
?>