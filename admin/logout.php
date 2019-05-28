<?php
session_start();
$db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
if($_SESSION['SuccessAdmin'] == 'True')
{
    $_SESSION['SuccessAdmin'] = "False";
}
else if($_SESSION['user']['Usertype'] == 'Manager')
{
    $_SESSION['user'] = null;
}
header("location: loginadmin.php");
?>

