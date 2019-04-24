<?php
session_start();
if($_SESSION['SuccessAdmin'] != "True")
{
    $_SESSION['AdminError'] = "<li>Неправильный пароль или логин</li>";
    header('location: loginadmin.php');
}
$db = mysqli_connect('localhost', 'root', '', 'users');
$resultUser = mysqli_query($db,"SELECT * FROM user");
$resultMeneg = mysqli_query($db,"SELECT * FROM managers");
    $name = "tregter";
    if ( !empty($name) ) {
        $query = "SELECT * FROM products WHERE name='$name'";
        $res = mysqli_query($db,$query);
        if ( mysqli_num_rows( $res ) == 1 ) {
            $image = mysqli_fetch_assoc($res);
            $_SESSION['productsPhoto']=$image;
        }
    }
$pname = $_SESSION['productsPhoto']['Photo'];
echo "<img src='../photos/product/{$pname}.jpg' heigth=500 width=500 alt=''/>"
?>

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

<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100 ver1">
                <div class="table100-firstcol">
                    <table>
                        <thead>
                        <tr class="row100 head">
                            <th class="cell100 column1">Login</th>
                            <th class="cell100 column1">User Type</th>
                            <th class="cell100 column1">Give Manager</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while($row = mysqli_fetch_array($resultUser)) : ?>
                            <form action="givemanage.php" method="post">
                                <tr class="row100 body">
                                    <td class="cell100 column1"> <input type="hidden" name="login" value="<?php echo $row['Login']?>"><?php echo $row['Login']?></td>
                                    <th class="cell100 column1"><?php echo $row['Usertype']?></th>
                                    <th class="cell100 column1">

                                        <input class="button" type="submit" value="Give">

                                    </th>
                                </tr>
                            </form>
                        <?php endwhile;?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="container-table200">
        <div class="wrap-table100">
            <div class="table100 ver1">
                <div class="table100-firstcol">
                    <table>
                        <thead>
                        <tr class="row100 head">
                            <th class="cell100 column1">Login</th>
                            <th class="cell100 column1">User Type</th>
                            <th class="cell100 column1">Deprive Manager</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while($row = mysqli_fetch_array($resultMeneg)) : ?>
                            <form action="deprivemanag.php" method="post">
                                <tr class="row100 body">
                                    <td class="cell100 column1"> <input type="hidden" name="login" value="<?php echo $row['Login']?>"><?php echo $row['Login']?></td>
                                    <th class="cell100 column1"><?php echo $row['Usertype']?></th>
                                    <th class="cell100 column1">

                                        <input class="button" type="submit" value="Give">

                                    </th>
                                </tr>
                            </form>
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