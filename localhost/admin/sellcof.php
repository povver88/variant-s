<?php
session_start();
if($_SESSION['SuccessAdmin'] != "True")
{
    header('location: loginadmin.php');
}
$db = mysqli_connect('localhost', 'root', '', 'users');
if (isset($_POST['login'])) {
    $login = e($_POST['login']);
    $sell1 = e($_POST['sell1']);
    $sell2 = e($_POST['sell2']);
    $sell3 = e($_POST['sell3']);
    $sell4 = e($_POST['sell4']);
    $sell5 = e($_POST['sell5']);
    $sell6 = e($_POST['sell6']);
    $sell7 = e($_POST['sell7']);
    $query = mysqli_query($db,"UPDATE user SET sell1='$sell1', sell2='$sell2', sell3='$sell3', sell4='$sell4', 
sell5='$sell5', sell6='$sell6', sell7='$sell7' WHERE login='$login'");
    header('location: selllist.php');
}

function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

?>