<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
$user = $_SESSION['user']['Login'];
$id = $_SESSION['OrderId'][$user];
$count = $_SESSION['OrderCount'][$user];
$_SESSION['AdminOrderUser'][$user]=$user;
foreach ($id as $item)
{
    $resultOrder = mysqli_query($db,"SELECT * FROM products WHERE id = '$item'");
    while($row = mysqli_fetch_array($resultOrder))
    {
        #$count = $row['Count']-$_SESSION['OrderCount'][$user][$item];
        $_SESSION['AdminOrderId'][$user][$item] = $item;
        $_SESSION['AdminOrderCount'][$user][$item]['count'] = $_SESSION['OrderCount'][$user][$item];
    }
}
header("location: index.php")
?>
