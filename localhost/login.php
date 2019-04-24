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
    if(empty($login))
    {
        $error .= "<li>Пользователя с таким именем не существует!</li>";
    }
    if(empty($pass))
    {
        $error .= "<li>Неверный пароль!</li>";
    }
    if(empty($error))
    {
        $query = "SELECT * From user WHERE login='$login' AND pass='$pass'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $logged_in_user = mysqli_fetch_assoc($results);
            echo $logged_in_user[1];
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['success']  = "You are now logged in";
        }
    }
    else {
        echo $error;
    }
}
function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

<form action="login.php" method="post">
    <label>Login</label>
    <input name="login" type="text" class="setlogin" placeholder="Please">
    <label>Password</label>
    <input name="password" type="text" class="setpass" placeholder="Please">
    <input name="log" type="submit" value="Log in">
</form>
</body>
</html>