<?php
session_start();
if($_SESSION['SuccessAdmin'] == "True" OR $_SESSION['user']['Usertype'] == 'Manager') {
    $db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
    if(isset($_POST))
    {
        mysqli_query($db, "DELETE FROM aboutus");
        $url = $_POST['url'];
        mysqli_query($db, "INSERT INTO aboutus url='$url'");
    }
}
else{
    header('location: loginadmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Про нас пишуть</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/createproduct.css">
    <!--===============================================================================================-->
</head>

<body>

<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100 ver1">
                <div class="table100-firstcol">
                    <div class="dropdown">
                        <form action="urlaboutus.php" method="post">
                            <p class="col">Посилання: <input class="col" type="text" name="url"></p>
                            <br><input class="submit btn btn-outline-dark" type="submit" value="Ok">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function() {
        var ps = new PerfectScrollbar(this);

        $(window).on('resize', function() {
            ps.update();
        })

        $(this).on('ps-x-reach-start', function() {
            $(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
        });

        $(this).on('ps-scroll-x', function() {
            $(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
        });

    });
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>

</html>
