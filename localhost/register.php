<?php
session_start();
$db = mysqli_connect('127.0.0.1', 'root', '', 'users');
$login = "";
$phone = "";
$email = "";
$pass = "";
$cpass = "";
$opt = FALSE;
$type = "";
$error = "";
if(isset($_POST['register']))
{
    register();
}
function register()
{
    global $login, $phone, $email, $pass, $cpass, $db, $error, $opt, $type;
    $login = e($_POST['login']);
    $phone = e($_POST['phone']);
    $email = e($_POST['email']);
    $pass = e($_POST['password']);
    $cpass = e($_POST['cpassword']);
    $opt = e($_POST['opt'])?1:0;
    $type = "User";
    if($_SESSION['success'] == "good")
    {
        if (empty($login)) {
            $error .= "<li>Вы не заполнели поле имя пользователя!</li>";
        }
        else if (empty($phone)) {
            $error .= "<li>Вы не заполнели поле телефон!</li>";
        }
        else if (empty($pass)) {
            $error .= "<li>Вы не заполнели поле пароль!</li>";
        }
        else if ($pass != $cpass) {
            $error .= "<li>Пароли не совпадают!</li>";
        }
        else
        {
            $query = "SELECT * From user WHERE email='$email'";
            $results = mysqli_query($db, $query);
            $query1 = "SELECT * From managers WHERE email='$email'";
            $results1 = mysqli_query($db, $query1);
            if (mysqli_num_rows($results) == 1 OR mysqli_num_rows($results1) == 1) {
                if($email != "")
                {
                    $error .= "<li>Пользователь с такой електронной почтой уже существует!</li>";
                }
            }
            $query = "SELECT * From user WHERE phone='$phone'";
            $results = mysqli_query($db, $query);
            $query1 = "SELECT * From managers WHERE phone='$phone'";
            $results1 = mysqli_query($db, $query1);
            if (mysqli_num_rows($results) == 1 OR mysqli_num_rows($results1) == 1) {
                if($phone != "")
                {
                    $error .= "<li>Пользователь с таким телефоном уже существует!</li>";
                }
            }
            $query = "SELECT * From user WHERE login='$login'";
            $results = mysqli_query($db, $query);
            $query1 = "SELECT * From managers WHERE login='$login'";
            $results1 = mysqli_query($db, $query1);
            if (mysqli_num_rows($results) == 1 OR mysqli_num_rows($results1) == 1) {
                if($login != "")
                {
                    $error .= "<li>Пользователь с таким именем уже существует!</li>";
                }
            }
        }
        if(empty($error))
        {
            $query = "INSERT INTO user (login, phone, email, pass, opt) 
					  VALUES('$login', '$phone', '$email', '$pass', '$opt')";
            mysqli_query($db, $query);

            $_SESSION['success']  = "You are now logged in";
        }
        else{
            echo $error;
        }
    }

}

function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}
function chek($db, $login, $phone, $email, $error){

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

<form action="register.php" method="post">
    <label>Login</label>
    <input name="login" type="text" class="setlogin" placeholder="Please">
    <label>Phone</label>
    <input name="phone" type="text" class="setphone" placeholder="Please">
    <label>Email</label>
    <input name="email" type="text" class="setemail" placeholder="Please">
    <label>Password</label>
    <input name="password" type="text" class="setpass" placeholder="Please">
    <label>Confirm Password</label>
    <input name="cpassword" type="text" class="confpass" placeholder="Please">
    <label>OPT</label>
    <input name="opt" type="checkbox">
    <input name="register" type="submit" value="Register"><?php $_SESSION['success'] = "good" ?>
</form>
</body>
</html>
