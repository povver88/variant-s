<?php
session_start();
if($_SESSION['SuccessAdmin'] != "True")
{
    $_SESSION['AdminError'] = "<li>Неправильный пароль или логин</li>";
    header('location: loginadmin.php');
}
$db = mysqli_connect('localhost', 'root', '', 'users');
$resultProduct = mysqli_query($db,"SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Продукти</title>
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
            <div class="col col-1">Назва</div>
            <div class="col col-2">Артикул</div>
            <div class="col col-3">Виробник</div>
            <div class="col col-4">Ціна</div>
            <div class="col col-5">Фото</div>
            <div class="col col-6"></div>
            <div class="col col-7"></div>
        </li>
        <?php while($row = mysqli_fetch_array($resultProduct)) : ?>
                <li class="table-row">
                    <div class="col col-1"> <?php echo $row['Name']?> </div>
                    <div class="col col-2"> <?php echo $row['Article']?> </div>
                    <div class="col col-3"> <?php echo $row['Brend']?> </div>
                    <div class="col col-4"> <?php echo $row['Price']?> </div>
                    <div class="col col-5"> <?php echo "<img src='../photos/product/{$row['Photo']}.jpg' heigth=200 width=150 alt=''/>" ?> </div>
                    <div class="col col-6"> <a href="producteditform.php?name=<?php echo $row['Name'] ?>"><input type="button" value="Edit"></a></div>
                    <div class="col col-7"><form action="productCRUD/productdelete.php" method="post">
                        <input type="hidden" name="productName" value="<?php echo $row['Name']?>">
                        <input type="submit" value="Delete">
                        </form></div>
                </li>

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