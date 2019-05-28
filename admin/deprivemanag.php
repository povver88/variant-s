<?php
session_start();
if($_SESSION['SuccessAdmin'] == "True" OR $_SESSION['user']['Usertype'] == 'Manager') {
    $db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        $query = mysqli_query($db, "UPDATE user SET usertype='User' WHERE login='$login'");
        header('location: userslist.php');
    }
}
else{
    header('location: loginadmin.php');
}
?>