<?php
session_start();
$db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
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
    $login = $_POST['login'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    if($_POST['opt'] == 'On')
    {
        $opt = 1;
    }
    else{
        $opt = 0;
    }
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
            $query = "INSERT INTO user (login, phone, email, usertype, pass, opt, sell1, sell2, sell3, sell4, sell5, sell6, sell7) 
					  VALUES('$login', '$phone', '$email', '$type', '$pass', '$opt', '$sell', '$sell', '$sell', '$sell', '$sell', '$sell', '$sell')";
            mysqli_query($db, $query);
            $query = mysqli_query($db, "SELECT * FROM user WHERE login='$login'");
            $logged_in_user = mysqli_fetch_assoc($query);
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['regerror']=null;
            header("location: index.php");
        }
        else{
            $_SESSION['user'] = null;
            $_SESSION['regerror']=$error;
            header("location: index.php");
        }

}
?>

