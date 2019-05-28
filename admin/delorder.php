<?php
session_start();
if($_SESSION['SuccessAdmin'] == "True" OR $_SESSION['user']['Usertype'] == 'Manager')
{
    $db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
    if(isset($_POST['product']))
    {
        $name = $_POST['ima'];
        $product = $_POST['product'];
        $user = $_POST['name'];
        $count = $_SESSION['AdminOrderCount'][$user][$product]['count'];
        $query = mysqli_query($db, "SELECT * FROM products WHERE name='$name'");
        $check = true;
        while ($row = mysqli_fetch_array($query))
        {
            if($row['Count'] < $count)
            {
                $check = false;
            }
        }
        if($check)
        {
            $query = mysqli_query($db, "UPDATE products SET count=count-'$count' WHERE name='$name'");
            unset($_SESSION['AdminOrderId'][$user][$product]);
            unset($_SESSION['AdminOrderCount'][$user][$product]);
            if(empty($_SESSION['AdminOrderId'][$user]))
            {
                unset($_SESSION['AdminOrderCount'][$user]);
                unset($_SESSION['AdminOrderId'][$user]);
                unset($_SESSION['AdminOrderUser'][$user]);
            }
        }
    }
    header("location: orderslist.php");
}
else{

    header('location: loginadmin.php');
}
?>