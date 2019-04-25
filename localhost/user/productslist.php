<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
$resultProduct = mysqli_query($db,"SELECT * FROM products"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Table V05</title>
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
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>
<p><?php echo $_SESSION['CartError'];?></p>
<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100 ver1">
                <div class="table100-firstcol">
                    <table>
                        <thead>
                        <tr class="row100 head">
                            <th class="cell100 column1">Name</th>
                            <th class="cell100 column1">Article</th>
                            <th class="cell100 column1">Brend</th>
                            <th class="cell100 column1">Price</th>
                            <th class="cell100 column1">Photo</th>
                            <th class="cell100 column1">Cart</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while($row = mysqli_fetch_array($resultProduct)) : ?>
                            <tr class="row100 body">
                                <td class="cell100 column1"><?php echo $row['Name']?></td>
                                <th class="cell100 column1"><?php echo $row['Article']?></th>
                                <th class="cell100 column1"><?php echo $row['Brend']?></th>
                                <th class="cell100 column1"><?php echo $row['Price']?></th>
                                <th class="cell100 column1"><?php echo "<img src='../photos/product/{$row['Photo']}.jpg' heigth=200 width=150 alt=''/>" ?></th>
                                <form action="addcart.php" method="get">
                                <th class="cell100 column1">
                                    <a href="addcart.php?id=<?php echo $row['Id']?>"><input type="submit" value="In cart"></a>
                                </th>
                                </form>
                            </tr>
                        <?php endwhile;?>
                        </tbody>
                    </table>

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