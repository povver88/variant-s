<?php
session_start();
$db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
if(isset($_POST['id']))
{
    $user = $_SESSION['user']['Login'];
    $id = intval($_POST['id']);
    $_SESSION[$user][$id]=null;
}
header("location: index.php")
?>