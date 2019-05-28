<?php
session_start();
$db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
$login = "";
$pass = "";
$errors = array();
if(isset($_POST['login']))
{
    $login = $_POST['login'];
    $pass = $_POST['password'];
    if(count($errors)==0)
    {
        $query = "SELECT * From admin WHERE login='$login' AND password='$pass'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $logged_in_user = mysqli_fetch_assoc($results);
            echo $logged_in_user[1];
            $_SESSION['admin'] = $logged_in_user;
            $_SESSION['SuccessAdmin']  = "True";
            $_SESSION['AdminError'] = "";
            header('location: admin.php');

        }else {
            $_SESSION['AdminError'] = null;
            $_SESSION['SuccessAdmin'] = "False";
            header('location: loginadmin.php');
        }
    }
}
?>
<!DOCTYPE html>
<html>
<link rel='stylesheet' href='css/loginadmin.css' />
<head>
    <title>Login Page</title>
</head>
<body>
<form id="slick-login" action="loginadmin.php" method="post">
    <label for="username">Login</label>
    <input name="login" type="text" class="setlogin" placeholder="Login">
    <label for="password">Password</label>
    <input name="password" type="password" class="setpass" placeholder="Password">
    <input name="log" type="submit" value="Log in">
</form>
</body>
</html>