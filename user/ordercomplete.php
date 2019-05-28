<?php
session_start();
$db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
$user = $_SESSION['user']['Login'];
$id = $_SESSION['OrderId'][$user];
$count = $_SESSION['OrderCount'][$user];
$price = $_SESSION['OrderPrice'][$user];
$_SESSION['AdminOrderUser'][$user]=$user;
if(isset($id))
{
    foreach ($id as $item)
    {
        $resultOrder = mysqli_query($db,"SELECT * FROM products WHERE id = '$item'");
        while($row = mysqli_fetch_array($resultOrder))
        {
            #$count = $row['Count']-$_SESSION['OrderCount'][$user][$item];
            $_SESSION['AdminOrderId'][$user][$item] = $item;
            $_SESSION['AdminOrderCount'][$user][$item]['count'] = $_SESSION['OrderCount'][$user][$item];
            $_SESSION['AdminOrderPrice'][$user][$item]['price'] = $_SESSION['OrderPrice'][$user][$item];
        }
    }
}
unset($_SESSION['OrderId'][$user]);
unset($_SESSION['OrderCount'][$user]);
unset($_SESSION['OrderPrice'][$user]);
unset($_SESSION[$user]);
header("location: index.php")
?>
