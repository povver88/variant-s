<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
$login = "";
$pass = "";
$error = "";
if(isset($_POST['login']))
{
    $login = e($_POST['login']);
    $pass = e($_POST['password']);
    if(empty($error)) {
        $query = "SELECT * From user WHERE login='$login' AND pass='$pass'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $logged_in_user = mysqli_fetch_assoc($results);
            echo $logged_in_user[1];
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['success'] = "You are now logged in";
            $_SESSION['lregerror']=null;
        } else
        {
            $_SESSION['lregerror']="<span class='losh'>Перевірте введені дані!</span>";
            $_SESSION['user']['Login']=null;
        }
    }
}
header("location: index.php");
function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}
?>