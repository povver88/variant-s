<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
$login = "";
$pass = "";
$errors = array();
if(isset($_POST['login']))
{
    login();

}
function login()
{
    global $db, $login, $pass, $errors;
    $login = e($_POST['login']);
    $pass = e($_POST['password']);
    if(empty($login))
    {
        array_push($errors, "Username is required");
    }
    if(empty($pass))
    {
        array_push($errors, "Password is required");
    }
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
            header('location: userslist.php');

        }else {
            $_SESSION['AdminError'] = "<li>Неправильный пароль или логин</li>";
            $_SESSION['SuccessAdmin'] = "False";
            header('location: loginadmin.php');
        }
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
<?php
session_start();
print_r($_SESSION['AdminError']);
?>
<form action="loginadmin.php" method="post">
    <label>Login</label>
    <input name="login" type="text" class="setlogin" placeholder="Please">
    <label>Password</label>
    <input name="password" type="text" class="setpass" placeholder="Please">
    <input name="log" type="submit" value="Log in">
</form>
</body>
</html>