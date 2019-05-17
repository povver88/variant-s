<?php
session_start();
if($_SESSION['SuccessAdmin'] != "True")
{
    header('location: loginadmin.php');
}
$db = mysqli_connect('localhost', 'root', '', 'users');
$resultOpt = mysqli_query($db,"SELECT * FROM user WHERE opt='2'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Знижки</title>
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
    <h2>Список Користувачів:</h2>
    <ul class="responsive-table">
        <li class="table-header">
            <div class="col col-1">Логін</div>
            <div class="col col-2">Шкільне приладдя</div>
            <div class="col col-3">Офісне приладдя</div>
            <div class="col col-4">Дитячі товари</div>
            <div class="col col-5">Зошити та блокноти</div>
            <div class="col col-6">Книжки та розмальвки</div>
            <div class="col col-7">Декор</div>
            <div class="col col-8">Різне</div>
            <div class="col col-9"></div>
                        <?php while($row = mysqli_fetch_array($resultOpt)) : ?>
        <li class="table-row">
            <form action="sellcof.php" method="post">
            <div class="col col-1"> <input type="hidden" name="login" value="<?php echo $row['Login']?>"><?php echo $row['Login']?></div>
            <div class="col col-2"><input type="text" name="sell1" placeholder="Відсоток" value="<?php echo $row['Sell1']?>"></div>
            <div class="col col-3"><input type="text" name="sell2" placeholder="Відсоток" value="<?php echo $row['Sell2']?>"></div>
            <div class="col col-4"><input type="text" name="sell3" placeholder="Відсоток" value="<?php echo $row['Sell3']?>"></div>
            <div class="col col-5"><input type="text" name="sell4" placeholder="Відсоток" value="<?php echo $row['Sell4']?>"></div>
            <div class="col col-6"><input type="text" name="sell5" placeholder="Відсоток" value="<?php echo $row['Sell5']?>"></div>
            <div class="col col-7"><input type="text" name="sell6" placeholder="Відсоток" value="<?php echo $row['Sell6']?>"></div>
            <div class="col col-8"><input type="text" name="sell7" placeholder="Відсоток" value="<?php echo $row['Sell7']?>"></div>
            <div class="col col-9"><input class="button" type="submit" value="Підтвердити"></div>
            </form>
        </li>
                        <?php endwhile;?>
        </li>
    </ul>
                </div>

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
