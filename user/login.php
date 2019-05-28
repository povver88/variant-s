<?php
session_start();
$db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
$login = "";
$pass = "";
$error = "";
if(isset($_POST['login']))
{
    $login = $_POST['login'];
    $pass = $_POST['password'];
    if(empty($error)) {
        $query = "SELECT * From user WHERE login='$login' AND pass='$pass'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $logged_in_user = mysqli_fetch_assoc($results);
            echo $logged_in_user[1];
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['lregerror']=null;
        } else
        {
            $_SESSION['lregerror']="<span class='losh'>Перевірте введені дані!</span>";
            $_SESSION['user']=null;
        }
    }
}
if($_SESSION['user']['Usertype'] == 'User')
{
    header("location: index.php");
}
if($_SESSION['user']['Usertype'] == 'Manager'){
    header("location: ../admin/admin.php");
}
?>