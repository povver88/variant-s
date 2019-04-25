<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
if(isset($_POST['id']))
{
    $id = intval($_POST['id']);
    $query = "SELECT * From products WHERE id='$id'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        $products = mysqli_fetch_assoc($results);
    }
    $count = intval($_POST['count']);
    $_SESSION['OrderId'][$id] = $id;
    $_SESSION['OrderCount'][$id] = $count;
    $_SESSION['TotalOrderPrice'][$id] = $count * $products['Price'];
}
header("location: index.php")
?>