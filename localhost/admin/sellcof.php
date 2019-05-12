<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
if (isset($_POST['login'])) {
    $login = e($_POST['login']);
    $sell = e($_POST['sell']);
    $query = "SELECT * From managers WHERE login='$login'";
    $results = mysqli_query($db, $query);
    $query = mysqli_query($db,"UPDATE user SET sell='$sell' WHERE login='$login'");
    header('location: selllist.php');
}

function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

?>