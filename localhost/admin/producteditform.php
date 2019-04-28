<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
if(isset($_GET['name']))
{
    $name = e($_GET['name']);
    $query = "SELECT * From products WHERE name='$name'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        $found_products = mysqli_fetch_assoc($results);
        $_SESSION['editproduct'] = $found_products;
    };
}

function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Table V05</title>
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
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<body>

<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100 ver1">
                <div class="table100-firstcol">
                    <div class="dropdown">
                        <form action="productCRUD/productedit.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php $_SESSION['editproduct']['Id'] ?>">
                            <p>Name: <input type="text" name="name" value="<?php $_SESSION['editproduct']['Name'] ?>"></p>
                            <p>Article: <input type="text" name="article" value="<?php $_SESSION['editproduct']['Article'] ?>"></p>
                            <p>Brend: <input type="text" name="brend" value="<?php $_SESSION['editproduct']['Brend'] ?>"></p>
                            <p>Price: <input type="text" name="price" value="<?php $_SESSION['editproduct']['Price'] ?>"></p>
                            <p>Count: <input type="text" name="count" value="<?php $_SESSION['editproduct']['Count'] ?>"></p>
                            <p>Photo: <input type="file" name="photo"></p>
                            <p>Article Photo: <input type="file" name="aphoto"></p>
                            <p>Description: <textarea name="description"><?php $_SESSION['editproduct']['Description'] ?></textarea></p>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown button
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" ><input type="radio" name="dropinv" value="Шкільне приладдя">Шкільне приладдя</a>
                                <a class="dropdown-item" ><input type="radio" name="dropinv" value="Офісне приладдя">Офісне приладдя</a>
                                <a class="dropdown-item" ><input type="radio" name="dropinv" value="Дитячі товари">Дитячі товари</a>
                                <a class="dropdown-item" ><input type="radio" name="dropinv" value="Зошити та блокноти">Зошити та блокноти</a>
                                <a class="dropdown-item" ><input type="radio" name="dropinv" value="Книжки та розмальовки">Книжки та розмальовки</a>
                                <a class="dropdown-item" ><input type="radio" name="dropinv" value="Декор">Декор</a>
                                <a class="dropdown-item" ><input type="radio" name="dropinv" value="Різне">Різне</a>
                            </div>
                            <p><input type="checkbox" name="topprice">Top Price</p>
                            <p><input type="checkbox" name="topsell">Top Sell</p>
                            <input type="submit" value="Ok">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
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