<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
$id = $_SESSION['OrderId'];
$count = $_SESSION['OrderCount'];
foreach ($id as $item)
{
    $resultOrder = mysqli_query($db,"SELECT * FROM products WHERE id = '$item'");
    while($row = mysqli_fetch_array($resultOrder))
    {
        $count = $row['Count']-$_SESSION['OrderCount'][$item];
        mysqli_query($db,"UPDATE products SET count='$count' WHERE id = '$item'");
    }
}
header("location: index.php")
?>
