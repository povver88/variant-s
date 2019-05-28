<?php
session_start();
if($_SESSION['SuccessAdmin'] == "True" OR $_SESSION['user']['Usertype'] == 'Manager') {
    $db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        if ($_POST['access'] == 'Дозволити') {
            $query = mysqli_query($db, "UPDATE user SET opt='2' WHERE login='$login'");
        }
        if ($_POST['access'] == 'Відхилити') {
            $query = mysqli_query($db, "UPDATE user SET opt='0' WHERE login='$login'");
        }
        header('location: optlist.php');
    }
}
else
{
    header('location: loginadmin.php');
}
?>