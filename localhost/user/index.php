<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'users');
$resultProduct = mysqli_query($db,"SELECT * FROM products ORDER BY availability DESC , topsell DESC, topprice DESC,
count DESC");
$resultDownProduct = mysqli_query($db,"SELECT * FROM products WHERE count='0'");
$resultUpProduct = mysqli_query($db,"SELECT * FROM products WHERE count>'0'");
while($row = mysqli_fetch_array($resultDownProduct))
{
    $id = $row['Id'];
    $results = mysqli_query($db, "UPDATE products SET availability='0' WHERE id='$id'");
}
while($row = mysqli_fetch_array($resultUpProduct))
{
    $id = $row['Id'];
    $results = mysqli_query($db, "UPDATE products SET availability='1' WHERE id='$id'");
}
$user = $_SESSION['user']['Login'];
$cart = $_SESSION[$user];
$loadmore = 4;
if(isset($_POST['more']))
{
    $loadmore = intval($_POST['more']);
}
if(isset($_POST['less']))
{
    $loadmore = $_POST['less'];
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
  <div id="cart_box" class="anime main_flex__nowrap flex__jcontent_between flex__align-items_center">
    <div class="title_cart main_flex__nowrap flex__jcontent_between flex__align-items_center">
      <p>Згорнути</p>
      <svg version="1.1" id="next" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
        <g>
          <path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
      		c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
      		" />

      </svg>

    </div>
      <?php if(isset($cart)) : ?>
      <?php foreach ($cart as $item) : ?>
      <?php $resultCart = mysqli_query($db,"SELECT * FROM products WHERE id = '$item'"); ?>
      <?php while($row = mysqli_fetch_array($resultCart)) : ?>
          <a class="product box main_flex__nowrap flex__jcontent_center flex__align-items_center">
              <div class="front">
                  <div class="img_product">
                      <?php echo "<img src='../photos/product/{$row['Photo']}.jpg' heigth=180 width=140 alt='texas'/>" ?>
                  </div>
                  <h2><?php echo $row['Name']?></h2>
                  <p><?php
                      if(intval($row['Count'])>0)
                      {
                          echo "Є в наявності";
                      }
                      else
                      {
                          echo "Немає в наявності";
                      }
                      ?></p>
              </div>
              <div class="back">
                  <p class="price"><?php echo $row['Price']?></p>
                  <form action="deletecart.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $row['Id']?>"><button type="submit" class="btn btn-outline-success btn-lg">Видалити з корзини</button>
                  </form>

                  <form action="totalpricecart.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $row['Id']?>">
                      <input type="text" name="count" placeholder="Введіть кількість">
                      <button type="submit" class="btn btn-outline-success btn-lg">Підтвердити</button>
                  </form>
              </div>
          </a>
      <?php endwhile;?>
      <?php endforeach; ?>
      <?php endif; ?>
    <div class="content_cart"></div>
      <form action="ordercomplete.php" method="post">
          <button id="order" type="submit">Купити</button>
      </form>

  </div>

  <header class="dark">
      <div id="top">
          <div class="wrap main_flex__nowrap flex__align-items_center flex__jcontent_between">

              <div class="main_flex__nowrap flex__align-items_center">
                  <style>
                      .regButton {
                          background: #fff;
                          border: 1px solid #ccc;
                          border-radius: 3px;
                          padding: 6px 24px;
                          cursor: pointer;
                      }

                      .regButton:hover {
                          background: #ccc;
                      }

                      #window {
                          width: 350px;
                          height: 420px;
                          margin: 40px auto;
                          background: #fff;
                          border: 1px solid #fff;
                          border-radius: 15px;
                          z-index: 150;
                          display: none;
                          position: fixed;
                          left: 0;
                          right: 0;
                          top: 0;
                          bottom: 0;
                      }

                      .form {
                          width: 275px;
                          margin: -15px auto 20px auto;
                          text-align: center;
                      }

                      .input {
                          width: 260px;
                          padding: 5px;
                          margin-bottom: 10px;
                      }

                      .radio {
                          margin-bottom: 10px;
                      }

                      .close {
                          margin: 10px 0 0 320px;
                          cursor: pointer;
                          border: 1px solid #ccc;
                          padding: 2px;
                          background: #ccc;
                      }

                      .close:hover {
                          background: #fff;
                      }

                      #gray {
                          opacity: 0.8;
                          padding: 15px;
                          background-color: rgba(1, 1, 1, 0.75);
                          position: fixed;
                          left: 0;
                          right: 0;
                          top: 0;
                          bottom: 0;
                          display: none;
                          z-index: 100;
                          overflow: auto;
                      }


                  </style>


                  <body>
                  <center><button onclick="show('block')" class="regButton">Реєстрація</button>
                  </center>
                  <!-- Задний прозрачный фон -->
                  <div onclick="show('none')" id="gray"></div>
                  <div id="window">
                      <!-- Картинка крестика -->
                      <img class="close" src="i/close.png" alt="" onclick="show('none')">
                      <div class="form">
                          <h2>Реєстрація</h2>
                          <form action="register.php" method="post">
                              <p><?php echo $_SESSION['regerror']; ?></p>
                              <input type="text" placeholder="Логін" name="login" class="input" required>
                              <input type="email" placeholder="E-mail (необов'язково)" name="email" class="input">
                              <input type="password" placeholder="Пароль" name="password" class="input" required>
                              <input type="password" placeholder=" Підтвердіть пароль" name="cpassword" class="input" required>
                              <input type='tel' placeholder="Телефон" name="phone" class="input" required>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="defaultChecked2" unchecked>
                                  <label class="checkbox2 custom-control-label" for="defaultChecked2">Default checked</label>
                              </div>
                              <input type="submit" class="regButton" value="Реєстрація">
                          </form>
                      </div>
                  </div>
                  <script>
                      //Функция показа
                      function show(state) {
                          document.getElementById('window').style.display = state;
                          document.getElementById('gray').style.display = state;
                      }
                  </script>


                  <div id="location">
                      Мова: <a href="#"><img class="language" src="img/ukraine.png" alt="uk"></a>
                      <a href="#"><img class="language" src="img/russia.png" alt="ru"></a>
                  </div>

              </div>

              <div id="logo">
                  <a href="#"></a>
                  <img src="img/logo.png" alt="logo">
              </div>

              <div class="main_flex__nowrap flex__align-items_center">

                  <div id="cart" class="btn anime btn main_flex__nowrap flex__align-items_center flex__jcontent_between">
                      <img src="img/shopping-cart.png" alt="cart">
                      Корзина
                  </div>

              </div>

          </div>
      </div>

      <div id="menu">
          <div class="wrap main_flex__nowrap flex__jcontent_center flex__align-items_center">
              <nav id="main_nav">
                  <li><a href="#"></a></li>
                  <li><a href="#">Шкільне приладдя</a></li>
                  <li><a href="#">Офісне приладдя</a></li>
                  <li><a href="#">Дитячі товари</a></li>
                  <li><a href="#">Зошити та блокноти</a></li>
                  <li><a href="#">Книжки та розмальовки</a></li>
                  <li><a href="#">Декор</a></li>
                  <li><a href="#">Різне</a></li>
              </nav>
          </div>
      </div>
  </header>

  <main class="wrap main_flex__nowrap flex__jcontent_between flex__align-items_start">


      <div id="right_bar">

      <div class="list_product main_flex flex__jcontent_start flex__align-items_start">
        <?php $i=0;
        while($row = mysqli_fetch_array($resultProduct)) : ?>
        <?php if($i<$loadmore) : ?>
                <a class="product box main_flex__nowrap flex__jcontent_center flex__align-items_center">
                <div class="front">
            <?php
               if($row['TopPrice'] == '1')
              {
                 echo "<div class=\"tag box\">Top Price</div>";
          }
          if($row['TopSell'] == '1' AND $row['TopPrice'] != '1')
          {
          echo "<div class=\"tag box\">Top Sell</div>";
      }
      ?>

      <div class="img_product">
        <?php echo "<img src='../photos/product/{$row['Photo']}.jpg' heigth=180 width=140 alt='texas'/>" ?>
      </div>
      <h2><?php echo $row['Name']?></h2>
              <p><?php
                  if(intval($row['Count'])>0)
                  {
                      echo "Є в наявності";
                  }
                  else
                  {
                      echo "Немає в наявності";
                  }
                  ?></p>
    </div>
    <div class="back">
      <p class="price"><?php echo $row['Price']?></p>
      <form action="addcart.php" method="post">
          <input type="hidden" name="id" value="<?php echo $row['Id']?>"><button type="submit" class="btn btn-outline-success btn-lg">Додати до корзини</button>
      </form>
    </div>
    </a>
          <?php endif; $i++; ?>
    <?php endwhile;?>
    </div>
        <form action="index.php" method="post">
            <input type="hidden" name="more" value="<?php echo $loadmore+=4; ?>">
    <button id="load_more" type="submit">
      Більше
    </button>
        </form>

        <form action="index.php" method="post">
            <input type="hidden" name="less" value="4">
            <button id="load_more" type="submit">
                Менше
            </button>
        </form>
    </div>


  </main>
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