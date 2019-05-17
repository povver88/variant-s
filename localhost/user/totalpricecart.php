<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
if(isset($_POST['id']))
{
    $user = $_SESSION['user']['Login'];
    $id = intval($_POST['id']);
    $price = intval($_POST['price']);
    $query = "SELECT * From products WHERE id='$id'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        $products = mysqli_fetch_assoc($results);
    }
    $count = intval($_POST['count']);
    $_SESSION['OrderId'][$user][$id] = $id;
    $_SESSION['OrderCount'][$user][$id] = $count;


}
header("location: index.php")
?>