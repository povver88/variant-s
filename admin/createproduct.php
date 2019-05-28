<?php
session_start();
if($_SESSION['SuccessAdmin'] == "True" OR $_SESSION['user']['Usertype'] == 'Manager') {
}
else{
    header('location: loginadmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Створити продукт</title>
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
                            <form action="product.php" method="post" enctype="multipart/form-data">
                                <p class="col">Назва: <input class="col" type="text" name="name"></p>
                                <p class="col">Артикул: <input class="col" type="text" name="article"></p>
                                <p class="col">Бренд: <input class="col" type="text" name="brend"></p>
                                <p class="col">Ціна: <input class="col" type="text" name="price"></p>
                                <p class="col">Кількість: <input class="col" type="text" name="count"></p>
                                <p class="col">Фото: <input class="col" type="file" name="photo"></p>
                                <p class="col">Штрих-код: <input class="col" type="file" name="aphoto"></p>
                                <p class="col">Опис: <textarea class="col"class="descript" name="description"></textarea></p>
                                <button class="dropdownbut btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Категорії
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item"><input type="radio" name="dropinv" value="Шкільне приладдя">Шкільне приладдя</a>
                                    <a class="dropdown-item"><input type="radio" name="dropinv" value="Офісне приладдя">Офісне приладдя</a>
                                    <a class="dropdown-item"><input type="radio" name="dropinv" value="Дитячі товари">Дитячі товари</a>
                                    <a class="dropdown-item"><input type="radio" name="dropinv" value="Зошити та блокноти">Зошити та блокноти</a>
                                    <a class="dropdown-item"><input type="radio" name="dropinv" value="Книжки та розмальовки">Книжки та розмальовки</a>
                                    <a class="dropdown-item"><input type="radio" name="dropinv" value="Декор">Декор</a>
                                    <a class="dropdown-item"><input type="radio" name="dropinv" value="Різне">Різне</a>
                                </div>
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