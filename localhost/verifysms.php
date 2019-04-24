<?php
session_start();
$login = $_SESSION['user']['Login'];
$usertype = $_SESSION['user']['Usertype'];
echo $login;
echo $usertype;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
<div>
    YOU LOH
</div>
</body>
