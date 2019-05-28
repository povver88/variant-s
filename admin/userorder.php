<?php
session_start();
if($_SESSION['SuccessAdmin'] == "True" OR $_SESSION['user']['Usertype'] == 'Manager') {
    $db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
    if (isset($_POST['login'])) {
        $user = $_POST['login'];
        $phone = null;
        $email = null;
        $query = mysqli_query($db, "SELECT * FROM user WHERE login='$user'");
        while ($row = mysqli_fetch_array($query)) {
            $phone = $row['Phone'];
            if (isset($row['Email'])) {
                $email = $row['Email'];
            }
        }
        $products = $_SESSION['AdminOrderId'][$user];
    }
}
else
{
    header('location: loginadmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/jquery-ui-1.9.2.custom.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

</head>
<body>
<header class="dark">
    <div id="top">
        <div class="wrap main_flex__nowrap flex__align-items_center flex__jcontent_between">

            <div class="main_flex__nowrap flex__align-items_center">

                <div class="main_flex__nowrap flex__align-items_center">
                    Користувач: <?php echo $user; ?>
                </div>

            </div>

            <div id="logo">
                <a href="#"></a>
                <img src="img/logo.png" alt="logo">
            </div>

            <div class="main_flex__nowrap flex__align-items_center">
                Телефон: <?php echo $phone; ?></br>
                E-mail: <?php echo $email; ?>
            </div>

        </div>
    </div>
</header>

<main class="wrap main_flex__nowrap flex__jcontent_between flex__align-items_start">


    <div id="right_bar">

        <div class="list_product main_flex flex__jcontent_start flex__align-items_start">
            <?php if(isset($products)) : ?>
            <?php foreach($products as $item) : ?>
            <?php $resultProduct = mysqli_query($db,"SELECT * FROM products WHERE id = '$item'"); ?>
            <?php while($row = mysqli_fetch_array($resultProduct)) : ?>
                <a class="product box main_flex__nowrap flex__jcontent_center flex__align-items_center">
                    <div class="front">

                        <div class="img_product">
                            <?php echo "<img src='../photos/product/{$row['Photo']}.jpg' heigth=180 width=140 alt='texas'/>" ?>
                        </div>
                        <h2><?php echo $row['Name']?></h2>
                        <p><?php echo $row['Brend']?></p>
                    </div>
                    <div class="back">
                        <p class="price">Кількість: <?php echo $_SESSION['AdminOrderCount'][$user][$item]['count'];?></p>
                        <center><p class="price">На складі: <?php echo $row['Count'];?></p></center>
                        <center><p class="price">Ціна: <?php echo $_SESSION['AdminOrderPrice'][$user][$item]['price'];?></p></center>
                        <center><p class="price">Ціна разом: <?php echo $_SESSION['AdminOrderPrice'][$user][$item]['price']
                                    *$_SESSION['AdminOrderCount'][$user][$item]['count'];?></p></center>
                        <form action="delorder.php" method="post">
                            <input type="hidden" name="name" value="<?php echo $user;?>">
                            <input type="hidden" name="ima" value="<?php echo $row['Name'];?>">
                            <input type="hidden" name="product" value="<?php echo $item;?>">
                            <input type="submit" class="btn" value="Відправлено">
                        </form>
                    </div>
                </a>
            <?php endwhile;?>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</main>
</body>

</html>