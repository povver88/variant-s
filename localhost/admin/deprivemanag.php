<?php
session_start();
if($_SESSION['SuccessAdmin'] != "True")
{
    header('location: loginadmin.php');
}
$db = mysqli_connect('localhost', 'root', '', 'users');
if (isset($_POST['login'])) {
    $login = e($_POST['login']);
    $query = mysqli_query($db,"UPDATE user SET usertype='User' WHERE login='$login'");
    header('location: userslist.php');
}

function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

?>