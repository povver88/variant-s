<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
if(isset($_POST['login']))
{
    $login = e($_POST['login']);
    if($_POST['access']=='Дозволити')
    {
        $query = mysqli_query($db,"UPDATE user SET opt='2' WHERE login='$login'");
    }
    if($_POST['access']=='Відхилити')
    {
        $query = mysqli_query($db,"UPDATE user SET opt='0' WHERE login='$login'");
    }
    header('location: optlist.php');
}
function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}
?>