<?php
session_start();
$db = mysqli_connect('127.0.0.1', 'root', '', 'users');
$login = "";
$phone = "";
$email = "";
$pass = "";
$cpass = "";
$opt = FALSE;
$type = "";
$error = "";
if(isset($_POST))
{
    $login = e($_POST['login']);
    $phone = e($_POST['phone']);
    $email = e($_POST['email']);
    $pass = e($_POST['password']);
    $cpass = e($_POST['cpassword']);
    $opt = e($_POST['opt'])?1:0;
    $type = "User";
    $sell = 0.0;
        if ($pass != $cpass) {
            $error .= "<li>Паролі не співпадають!</li>";
        }
        else
        {
            $query = "SELECT * From user WHERE email='$email'";
            $results = mysqli_query($db, $query);
            $query1 = "SELECT * From managers WHERE email='$email'";
            $results1 = mysqli_query($db, $query1);
            if (mysqli_num_rows($results) == 1 OR mysqli_num_rows($results1) == 1) {
                if($email != "")
                {
                    $error .= "<li>Цей E-mail зайнятий!</li>";
                }
            }
            $query = "SELECT * From user WHERE phone='$phone'";
            $results = mysqli_query($db, $query);
            $query1 = "SELECT * From managers WHERE phone='$phone'";
            $results1 = mysqli_query($db, $query1);
            if (mysqli_num_rows($results) == 1 OR mysqli_num_rows($results1) == 1) {
                if($phone != "")
                {
                    $error .= "<li>Цей телефон зайнятий!</li>";
                }
            }
            $query = "SELECT * From user WHERE login='$login'";
            $results = mysqli_query($db, $query);
            $query1 = "SELECT * From managers WHERE login='$login'";
            $results1 = mysqli_query($db, $query1);
            if (mysqli_num_rows($results) == 1 OR mysqli_num_rows($results1) == 1) {
                if($login != "")
                {
                    $error .= "<li>Цей логін зайнятий!</li>";
                }
            }
        }
        if(empty($error))
        {
            $query = "INSERT INTO user (login, phone, email, pass, opt, sell) 
					  VALUES('$login', '$phone', '$email', '$pass', '$opt', '$sell')";
            mysqli_query($db, $query);
            $_SESSION['regerror']='';
            header("location: index.php");
        }
        else{
            $_SESSION['regerror']=$error;
            header("location: index.php");
        }

}
function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}
?>

