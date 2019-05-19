<?php
session_start();
if($_SESSION['SuccessAdmin'] != "True")
{
    header('location: loginadmin.php');
}
$db = mysqli_connect('localhost', 'root', '', 'users');
$users = $_SESSION['AdminOrderUser'];
if(isset($users))
{
    foreach ($users as $item)
    {
        $query = mysqli_query($db,"SELECT * FROM user WHERE login='$item'");
        if(mysqli_num_rows($query) == 0)
        {
            unset($users[$item]);
        }
    }
}

$resultProduct = mysqli_query($db,"SELECT * FROM products"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Покупці</title>
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
    <h2>Список Продуктів:</h2>
    <ul class="responsive-table">
        <li class="table-header">
            <div class="col col-1">Логін</div>
            <div class="col col-2">Більше</div>
        </li>
            <?php if(isset($users)) : ?>
                        <?php foreach ($users as $item) : ?>
                    <li class="table-row">
                        <div class="col col-1"> <?php echo $item?> </div>
                        <div class="col col-2"><form action="userorder.php" method="post">
                                    <input type="hidden" name="login" value="<?php echo $item?>"><input type="submit" value="Більше">
                            </form></div>
                    </li>

                        <?php endforeach;?>
                        <?php endif; ?>
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