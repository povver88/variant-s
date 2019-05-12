<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
if (isset($_POST['login'])) {
    $login = e($_POST['login']);
    $mod = "Moderator";
    $query = "SELECT * From managers WHERE login='$login'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        $logged_in_user = mysqli_fetch_assoc($results);
        echo $logged_in_user[1];
        $_SESSION['user'] = $logged_in_user;
        $phone = $_SESSION['user']['Phone'];
        $email = $_SESSION['user']['Email'];
        $pass = $_SESSION['user']['Pass'];
        $login = $_SESSION['user']['Login'];
        $opt = $_SESSION['user']['Opt'];
        $sell = $_SESSION['user']['Sell'];
        $query = mysqli_query($db,"INSERT INTO user(login, phone, email, pass, opt, usertype, sell) VALUES ('$login', '$phone', '$email', '$pass', '$opt', 'User', '$sell')");
        $query = mysqli_query($db,"DELETE From managers WHERE login='$login'");
    }
    header('location: userslist.php');
}

function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

?>