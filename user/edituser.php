<?php
session_start();
$db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
if(isset($_POST)) {
    $user = $_SESSION['user']['Login'];
    $login = $user;
    $oldlogin = $user;
    $email = $_SESSION['user']['Email'];
    $phone = $_SESSION['user']['Phone'];
    $opt = $_SESSION['user']['Opt'];
    $pass = $_SESSION['user']['Pass'];

    if ($_POST['login'] != '') {
        $login = $_POST['login'];
    }
    if ($_POST['email'] != '') {
        $email = $_POST['email'];
    }
    if ($_POST['phone'] != '') {
        $phone = $_POST['phone'];
    }
    if ($_POST['pass'] != '') {
        $pass = $_POST['pass'];
    }

    if ($_POST['opt'] == 'On') {
        if (($opt == 0) OR ($opt == 1)) {
            $opt = 1;
        }
    } else {
        $opt = 0;
    }
    $query = mysqli_query($db, "UPDATE user SET login='$login', email='$email', phone='$phone', pass='$pass', opt='$opt' WHERE login='$oldlogin'");
    $_SESSION['user']['Login'] = $login;
    $_SESSION['user']['Email'] = $email;
    $_SESSION['user']['Phone'] = $phone;
    $_SESSION['user']['Opt'] = $opt;
    $_SESSION['user']['Pass'] = $pass;
}
header("location: index.php")
?>
