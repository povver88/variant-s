<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
if(isset($_POST['login']))
{
    $user = $_POST['login'];
    $products = $_SESSION['AdminOrderId'][$user];
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
    <script src="js/jquery-1.8.3.js"></script>
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/control.js"></script>
</head>

<body>
<header class="dark">
    <div id="top">
        <div class="wrap main_flex__nowrap flex__align-items_center flex__jcontent_between">

            <div class="main_flex__nowrap flex__align-items_center">

                <div id="location">
                    User: <?php echo $user; ?>
                </div>

            </div>

            <div id="logo">
                <a href="#"></a>
                <img src="img/logo.png" alt="logo">
            </div>

            <div class="main_flex__nowrap flex__align-items_center">

            </div>

        </div>
    </div>

    <div id="menu">
        <div class="wrap main_flex__nowrap flex__jcontent_center flex__align-items_center">
            <nav id="main_nav">
                <li><a href="#">PIZZA</a></li>
                <li><a href="#">POTABLE</a></li>
                <li><a href="#">DESSERT</a></li>
                <li><a href="#">PRESENTS</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#">CONTACT</a></li>
            </nav>
            <div id="search_panel">
                <input type="text" placeholder="Search">
            </div>
            <div id="search_button">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
          	s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
          	c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
          	s-17-7.626-17-17S14.61,6,23.984,6z" />
          </svg>
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
                        <p class="price"><?php echo $row['Price']?></p>
                        <p class="price"><?php echo $_SESSION['AdminOrderCount'][$user][$item]['count']?></p>
                    </div>
                </a>
            <?php endwhile;?>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <button id="load_more" type="button">
            Load More
        </button>
    </div>


</main>
<footer>
    <div class="wrap">

        <div>
            <nav id="footer_nav" class="main_flex__nowrap flex__jcontent_center flex__align-items_center">
                <li><a href="#">LEGAL INFO</a></li>
                <li><a href="#">TERMS</a></li>
                <li><a href="#">DATA PRIVACY</a></li>
                <li><a href="#">SIZING</a></li>
                <li><a href="#">SHIPPING</a></li>
                <li><a href="#">CONTACT</a></li>
            </nav>
        </div>
        <div id="newsletter" class="main_flex__nowrap flex__jcontent_center flex__align-items_center">
            <p>NEWSLETTER</p>
            <input type="text" placeholder="E-mail">
        </div>
        <div>
            <ul id="soc_list" class="main_flex__nowrap flex__jcontent_center flex__align-items_center">
                <li><a target="_blank" href="#"><svg viewBox="0 0 512 512">
                            <path d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z" /></svg></a></li>
                <li><a target="_blank" href="#"><svg viewBox="0 0 512 512">
                            <path d="M254.8 171.8c6.4 8.9 9.6 19.6 9.6 32 0 12.8-3.2 23.1-9.7 30.9 -3.6 4.4-9 8.4-16 12 10.7 3.9 18.8 10.1 24.2 18.5 5.5 8.4 8.2 18.7 8.2 30.7 0 12.4-3.1 23.6-9.3 33.5 -4 6.6-8.9 12.1-14.9 16.5 -6.7 5.1-14.6 8.6-23.7 10.5 -9.1 1.9-19 2.8-29.6 2.8H99.1V149.5h101.4C226.1 149.8 244.2 157.3 254.8 171.8zM140.9 185.9v46.3h51c9.1 0 16.5-1.7 22.2-5.2 5.7-3.5 8.5-9.6 8.5-18.4 0-9.8-3.8-16.2-11.3-19.4 -6.5-2.2-14.7-3.3-24.8-3.3H140.9zM140.9 266.9v55.9h50.9c9.1 0 16.2-1.2 21.2-3.7 9.2-4.6 13.8-13.3 13.8-26.2 0-10.9-4.5-18.4-13.4-22.5 -5-2.3-12-3.5-21-3.6H140.9L140.9 266.9zM396.4 207.3c10.8 4.8 19.8 12.5 26.8 23 6.4 9.2 10.5 19.9 12.4 32.1 1.1 7.1 1.5 17.4 1.3 30.8H323.9c0.6 15.6 6 26.5 16.2 32.7 6.2 3.9 13.6 5.8 22.4 5.8 9.2 0 16.8-2.4 22.5-7.1 3.2-2.6 5.9-6.1 8.4-10.7h41.4c-1.1 9.2-6.1 18.5-15 28 -13.9 15.1-33.4 22.6-58.4 22.6 -20.6 0-38.9-6.4-54.6-19.1 -15.8-12.7-23.7-33.4-23.7-62.1 0-26.9 7.1-47.5 21.4-61.8 14.2-14.3 32.7-21.5 55.5-21.5C373.4 200 385.6 202.4 396.4 207.3zM335.7 242.3c-5.7 5.9-9.3 13.9-10.8 24h69.9c-0.7-10.8-4.3-18.9-10.8-24.5 -6.5-5.6-14.5-8.4-24.1-8.4C349.5 233.4 341.4 236.4 335.7 242.3zM402.8 161.5h-91.2V182.7h91.2V161.5z" /></svg></a></li>
                <li><a target="_blank" href="#"><svg viewBox="0 0 512 512">
                            <path d="M179.7 237.6L179.7 284.2 256.7 284.2C253.6 304.2 233.4 342.9 179.7 342.9 133.4 342.9 95.6 304.4 95.6 257 95.6 209.6 133.4 171.1 179.7 171.1 206.1 171.1 223.7 182.4 233.8 192.1L270.6 156.6C247 134.4 216.4 121 179.7 121 104.7 121 44 181.8 44 257 44 332.2 104.7 393 179.7 393 258 393 310 337.8 310 260.1 310 251.2 309 244.4 307.9 237.6L179.7 237.6 179.7 237.6ZM468 236.7L429.3 236.7 429.3 198 390.7 198 390.7 236.7 352 236.7 352 275.3 390.7 275.3 390.7 314 429.3 314 429.3 275.3 468 275.3" /></svg></a></li>
            </ul>
        </div>

    </div>

</footer>

</body>

</html>