<?php
session_start();
if($_SESSION['SuccessAdmin'] == "True" OR $_SESSION['user']['Usertype'] == 'Manager') {
    $db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        $sell1 = $_POST['sell1'];
        $sell2 = $_POST['sell2'];
        $sell3 = $_POST['sell3'];
        $sell4 = $_POST['sell4'];
        $sell5 = $_POST['sell5'];
        $sell6 = $_POST['sell6'];
        $sell7 = $_POST['sell7'];
        $query = mysqli_query($db, "UPDATE user SET sell1='$sell1', sell2='$sell2', sell3='$sell3', sell4='$sell4', 
sell5='$sell5', sell6='$sell6', sell7='$sell7' WHERE login='$login'");
        header('location: selllist.php');
    }
}
else
{
    header('location: loginadmin.php');
}
?>