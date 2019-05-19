<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');

$resultProduct = mysqli_query($db, "SELECT * FROM products ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC");
if (isset($_SESSION['sort'])) {
  $resultProduct = mysqli_query($db, $_SESSION['sort']);
}
$resultDownProduct = mysqli_query($db, "SELECT * FROM products WHERE count='0'");
$resultUpProduct = mysqli_query($db, "SELECT * FROM products WHERE count>'0'");
while ($row = mysqli_fetch_array($resultDownProduct)) {
  $id = $row['Id'];
  $results = mysqli_query($db, "UPDATE products SET availability='0' WHERE id='$id'");
}
while ($row = mysqli_fetch_array($resultUpProduct)) {
  $id = $row['Id'];
  $results = mysqli_query($db, "UPDATE products SET availability='1' WHERE id='$id'");
}
$user = $_SESSION['user']['Login'];
$cart = $_SESSION[$user];
$loadmore = 4;
if (isset($_POST['more'])) {
  $loadmore = intval($_POST['more']);
}
if (isset($_POST['less'])) {
  $loadmore = $_POST['less'];
}
if (isset($_GET['category'])) {
  if ($_GET['category'] == 'other') {
    $_SESSION['sort'] = "SELECT * FROM products WHERE category='Різне' ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC";
    $resultProduct = mysqli_query($db, "SELECT * FROM products WHERE category='Різне' ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC");
    $query = mysqli_query($db, "SELECT * FROM user WHERE login='$user'");
    while ($row = mysqli_fetch_array($query)) {
      $_SESSION['dcount'] = $row['Sell7'];
    }
  }
  if ($_GET['category'] == 'school') {
    $_SESSION['sort'] = "SELECT * FROM products WHERE category='Шкільне приладдя' ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC";
    $resultProduct = mysqli_query($db, "SELECT * FROM products WHERE category='Шкільне приладдя' ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC");
    $query = mysqli_query($db, "SELECT * FROM user WHERE login='$user'");
    while ($row = mysqli_fetch_array($query)) {
      $_SESSION['dcount'] = $row['Sell1'];
    }
  }
  if ($_GET['category'] == 'office') {
    $_SESSION['sort'] = "SELECT * FROM products WHERE category='Офісне приладдя' ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC";
    $resultProduct = mysqli_query($db, "SELECT * FROM products WHERE category='Офісне приладдя' ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC");
    $query = mysqli_query($db, "SELECT * FROM user WHERE login='$user'");
    while ($row = mysqli_fetch_array($query)) {
      $_SESSION['dcount'] = $row['Sell2'];
    }
  }
  if ($_GET['category'] == 'child') {
    $_SESSION['sort'] = "SELECT * FROM products WHERE category='Дитячі товари' ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC";
    $resultProduct = mysqli_query($db, "SELECT * FROM products WHERE category='Дитячі товари' ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC");
    $query = mysqli_query($db, "SELECT * FROM user WHERE login='$user'");
    while ($row = mysqli_fetch_array($query)) {
      $_SESSION['dcount'] = $row['Sell3'];
    }
  }
  if ($_GET['category'] == 'paper') {
    $_SESSION['sort'] = "SELECT * FROM products WHERE category='Зошити та блокноти' ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC";
    $resultProduct = mysqli_query($db, "SELECT * FROM products WHERE category='Зошити та блокноти' ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC");
    $query = mysqli_query($db, "SELECT * FROM user WHERE login='$user'");
    while ($row = mysqli_fetch_array($query)) {
      $_SESSION['dcount'] = $row['Sell4'];
    }
  }
  if ($_GET['category'] == 'book') {
    $_SESSION['sort'] = "SELECT * FROM products WHERE category='Книжки та розмальовки' ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC";
    $resultProduct = mysqli_query($db, "SELECT * FROM products WHERE category='Книжки та розмальовки' ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC");
    $query = mysqli_query($db, "SELECT * FROM user WHERE login='$user'");
    while ($row = mysqli_fetch_array($query)) {
      $_SESSION['dcount'] = $row['Sell5'];
    }
  }
  if ($_GET['category'] == 'decor') {
    $_SESSION['sort'] = "SELECT * FROM products WHERE category='Декор' ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC";
    $resultProduct = mysqli_query($db, "SELECT * FROM products WHERE category='Декор' ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC");
    $query = mysqli_query($db, "SELECT * FROM user WHERE login='$user'");
    while ($row = mysqli_fetch_array($query)) {
      $_SESSION['dcount'] = $row['Sell6'];
    }
  }
  if ($_GET['category'] == 'all') {
    $_SESSION['sort'] = "SELECT * FROM products ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC";
    $resultProduct = mysqli_query($db, "SELECT * FROM products ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC");
    $_SESSION['dcount'] = 0;
  }
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
  <link rel="stylesheet" href="css/details.css">
  <link rel="stylesheet" href="css/jquery-ui-1.9.2.custom.css">
  <link href="https://fonts.googleapis.com/css?family=PT+Serif&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

</head>

<body>
  <?php if (isset($user)) : ?>
    <div id="cart_box" class="anime main_flex__nowrap flex__jcontent_between flex__align-items_center">
      <div class="title_cart main_flex__nowrap flex__jcontent_between flex__align-items_center">
        <p>Згорнути</p>
        <svg version="1.1" id="next" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
          <g>
            <path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
      		                          c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
      		                          " />

        </svg>

      </div>
      <?php if (isset($cart)) : ?>
        <?php foreach ($cart as $item) : ?>
          <?php $resultCart = mysqli_query($db, "SELECT * FROM products WHERE id = '$item'"); ?>
          <?php while ($row = mysqli_fetch_array($resultCart)) : ?>
            <a class="product box main_flex__nowrap flex__jcontent_center flex__align-items_center">
              <div class="front">
                <div class="img_product">
                  <?php echo "<img src='../photos/product/{$row['Photo']}.jpg' heigth=180 width=140 alt='texas'/>" ?>
                </div>
                <h2><?php echo $row['Name'] ?></h2>
                <p><?php
                    if (intval($row['Count']) > 0) {
                      echo "Є в наявності";
                    } else {
                      echo "Немає в наявності";
                    }
                    ?></p>
              </div>
              <div class="back">
                <p class="price">Ціна: <?php echo $row['Price'] - ($row['Price'] / 100) * $_SESSION['dcount']; ?></p>
                <form action="deletecart.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['Id'] ?>"><button type="submit" class="btn btn-outline-success btn-lg">Видалити з корзини</button>
                </form>

                <form action="totalpricecart.php" method="post">
                  <input type="hidden" name="price" value="<?php echo $row['Price'] - ($row['Price'] / 100) * $_SESSION['dcount'] ?>">
                  <input type="hidden" name="id" value="<?php echo $row['Id'] ?>">
                  <input type="text" name="count" placeholder="Введіть кількість">
                  <button type="submit" class="btn btn-outline-success btn-lg">Підтвердити</button>
                </form>
              </div>
            </a>
          <?php endwhile; ?>
        <?php endforeach; ?>
      <?php endif; ?>
      <div class="content_cart"></div>
      <form action="ordercomplete.php" method="post">
        <button id="order" type="submit">Купити</button>
      </form>

    </div>
  <?php endif; ?>
  <header class="dark">
    <div id="top">
      <div class="wrap main_flex__nowrap flex__align-items_center flex__jcontent_between">

        <div class="main_flex__nowrap flex__align-items_center">

          <body>

            <a href="logout.php"><button class="regButton">Вийти</button>
            </a>



        </div>

        <div id="logo">
          <a href="#"></a>
          <img src="img/logo.png" alt="logo">
        </div>
        <div>
          <p><?php if (isset($user)) {
                echo $user;
              } ?></p>
        </div>
        <div class="main_flex__nowrap flex__align-items_center">
          <?php if (isset($user)) : ?>
            <div id="cart" class="btn anime btn main_flex__nowrap flex__align-items_center flex__jcontent_between">
              <img src="img/shopping-cart.png" alt="cart">
              Корзина
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div id="menu">
      <div class="wrap main_flex__nowrap flex__jcontent_center flex__align-items_center">
        <nav id="main_nav">
          <li><a href="index.php?category=all">Усе</a></li>
          <li><a href="index.php?category=school">Шкільне приладдя</a></li>
          <li><a href="index.php?category=office">Офісне приладдя</a></li>
          <li><a href="index.php?category=child">Дитячі товари</a></li>
          <li><a href="index.php?category=paper">Зошити та блокноти</a></li>
          <li><a href="index.php?category=book">Книжки та розмальовки</a></li>
          <li><a href="index.php?category=decor">Декор</a></li>
          <li><a href="index.php?category=other">Різне</a></li>
        </nav>
      </div>
    </div>
  </header>


  <div class="box1 row justify-content-center">
    <div class="col-4">
      <img src="img/smth.jpg" alt="wmth">
    </div>
    <div class="col-4">
      <p>інпути</p><br>
      <p>на це місце</p><br>
      <p>повставляй</p><br>
      <p>якшо шо шоб перенести строку юзай "< br >"в кінці рядка :3</p><br>
      <p>кнопку підтвердити спирь в бутстрапа</p><br>
      <p>удачі :3</p><br>
    </div>
  </div>


  <footer>
    <div class="wrap">

      <div>
        <nav id="footer_nav" class="main_flex__nowrap flex__jcontent_center flex__align-items_center">
          <li><a href="#">Про нас пишуть</a></li>
        </nav>
      </div>
    </div>

  </footer>

</body>
<script src="js/jquery-1.8.3.js"></script>
<script src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="js/control.js"></script>

</html>