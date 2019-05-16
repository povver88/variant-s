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
$error = null;
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
    $_SESSION['out']=$cpass;
        if ($pass != $cpass) {
            $error .= "<span class='losh'>Паролі не співпадають!</span>";
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
                    $error .= "<span class='losh'>Цей E-mail зайнятий!</span>";
                }
            }
            $query = "SELECT * From user WHERE phone='$phone'";
            $results = mysqli_query($db, $query);
            $query1 = "SELECT * From managers WHERE phone='$phone'";
            $results1 = mysqli_query($db, $query1);
            if (mysqli_num_rows($results) == 1 OR mysqli_num_rows($results1) == 1) {
                if($phone != "")
                {
                    $error .= "<span class='losh'>Цей телефон зайнятий!</span>";
                }
            }
            $query = "SELECT * From user WHERE login='$login'";
            $results = mysqli_query($db, $query);
            $query1 = "SELECT * From managers WHERE login='$login'";
            $results1 = mysqli_query($db, $query1);
            if (mysqli_num_rows($results) == 1 OR mysqli_num_rows($results1) == 1) {
                if($login != "")
                {
                    $error .= "<span class='losh'>Цей логін зайнятий!</span>";
                }
            }
        }
        if($error == null)
        {
            $_SESSION['user']['Login'] = $login;
            $query = "INSERT INTO user (login, phone, email, pass, opt, sell1, sell2, sell3, sell4, sell5, sell6, sell7) 
					  VALUES('$login', '$phone', '$email', '$pass', '$opt', '$sell', '$sell', '$sell', '$sell', '$sell', '$sell', '$sell')";
            mysqli_query($db, $query);
            $_SESSION['regerror']=null;
            header("location: index.php");
        }
        else{
            $_SESSION['user']['Login'] = null;
            $_SESSION['regerror']=$error;
            header("location: index.php");
        }

}
function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}
?>

