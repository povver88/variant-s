<?php
session_start();
$db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
$resultProduct = mysqli_query($db,"SELECT * FROM products"); ?>
