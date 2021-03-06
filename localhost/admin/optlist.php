<?php
session_start();
if($_SESSION['SuccessAdmin'] != "True")
{
    header('location: loginadmin.php');
}
$db = mysqli_connect('localhost', 'root', '', 'users');
$resultUser = mysqli_query($db,"SELECT * FROM user WHERE opt='1' ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Список оптовиків</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
    <link rel="stylesheet" type="text/css" href="css/userslist.css">
    <!--===============================================================================================-->
</head>
<body>
<div class="container">
    <h2>Список користувачів:</h2>
    <ul class="responsive-table">
        <li class="table-header">
            <div class="col col-1">Логін</div>
            <div class="col col-2">Тип</div>
            <div class="col col-5"></div>
        </li>
        <?php while($row = mysqli_fetch_array($resultUser)) : ?>
            <form action="giveopt.php" method="post">
                <li class="table-row">
                    <div class="col col-1"> <input type="hidden" name="login" value="<?php echo $row['Login']?>"><?php echo $row['Login']?> </div>
                    <div class="col col-2"> <?php echo $row['Opt']?> </div>
                    <input class="btn btn-primary" name="access" type="submit" value="Дозволити">
                        <input class="btn btn-primary" name="access" type="submit" value="Відхилити">
                </li>
            </form>

        <?php endwhile;?>
    </ul>
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
    $('.js-pscroll').each(function(){
        var ps = new PerfectScrollbar(this);

        $(window).on('resize', function(){
            ps.update();
        })

        $(this).on('ps-x-reach-start', function(){
            $(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
        });

        $(this).on('ps-scroll-x', function(){
            $(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
        });

    });




</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>