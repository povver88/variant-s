<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
if (isset($_POST['productName'])) {
    $productName = e($_POST['productName']);
    $query = mysqli_query($db,"SELECT * FROM products WHERE name='$productName'");
    while ($row = mysqli_fetch_assoc($query)) {
        $photo = $row['Photo'];
        $aphoto = $row['ArticlePhoto'];
    }
    unlink("../../photos/product/{$photo}.jpg");
    unlink("../../photos/article/{$aphoto}.jpg");
    $query = mysqli_query($db,"DELETE From products WHERE name='$productName'");
    header('location: ../productslist.php');
}

function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

?>