<?php
session_start();
if($_SESSION['SuccessAdmin'] == "True" OR $_SESSION['user']['Usertype'] == 'Manager') {
    $db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
    if (isset($_POST['productName'])) {
        $productName = $_POST['productName'];
        $query = mysqli_query($db, "SELECT * FROM products WHERE name='$productName'");
        while ($row = mysqli_fetch_assoc($query)) {
            $photo = $row['Photo'];
            $aphoto = $row['ArticlePhoto'];
        }
        unlink("../../photos/product/{$photo}.jpg");
        unlink("../../photos/article/{$aphoto}.jpg");
        $query = mysqli_query($db, "DELETE From products WHERE name='$productName'");
        header('location: ../productslist.php');
    }
}
else
{
    header('location: loginadmin.php');
}
?>