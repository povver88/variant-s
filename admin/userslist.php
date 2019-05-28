<?php
session_start();
if($_SESSION['SuccessAdmin'] == "True") {
    $db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
    $resultUser = mysqli_query($db, "SELECT * FROM user WHERE usertype='User'");
    $resultMeneg = mysqli_query($db, "SELECT * FROM user WHERE usertype='Manager'");
}
else
{
    header('location: loginadmin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Список користувачів</title>
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
        <div class="col col-3"></div>
    </li>
    <?php while($row = mysqli_fetch_array($resultUser)) : ?>
    <form action="givemanage.php" method="post">
    <li class="table-row">
      <div class="col col-1"> <input type="hidden" name="login" value="<?php echo $row['Login']?>"><?php echo $row['Login']?> </div>
      <div class="col col-2"> <?php echo $row['Usertype']?> </div>
      <input class="btn btn-primary" type="submit" value="Менеджер">
      
    </li>
    </form>
    <?php endwhile;?>
  </ul>
</div>
<div class="container">
    <h2>Список Менеджерів:</h2>
    <ul class="responsive-table">
        <li class="table-header">
            <div class="col col-1">Логін</div>
            <div class="col col-2">Тип</div>
            <div class="col col-2"></div>
        </li>
        <?php while($row = mysqli_fetch_array($resultMeneg)) : ?>
            <form action="deprivemanag.php" method="post">
                <li class="table-row">
                    <div class="col col-1"> <input type="hidden" name="login" value="<?php echo $row['Login']?>"><?php echo $row['Login']?> </div>
                    <div class="col col-2"> <?php echo $row['Usertype']?> </div>
                    <input class="btn btn-primary" type="submit" value="Користувач">

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