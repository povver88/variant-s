<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
if (isset($_POST['productName'])) {
    $productName = e($_POST['productName']);
    $query = mysqli_query($db,"DELETE From products WHERE name='$productName'");
    $photo = $_SESSION['editproduct']['Photo'];
    $aphoto = $_SESSION['editproduct']['ArticlePhoto'];
    unlink("../../photos/product/{$photo}.jpg");
    unlink("../../photos/article/{$aphoto}.jpg");
    header('location: productslist.php');
}

function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

?>