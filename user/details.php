<?php
session_start();
if($_SESSION['user']['Usertype'] == 'Manager')
{
    header("location: ../admin/admin.php");
}

$db = mysqli_connect('localhost', 'id9569514_zerocu', 'Qwerty1', 'id9569514_variants');
$query = mysqli_query($db, "SELECT * FROM aboutus");
$url = mysqli_fetch_assoc($query);
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $photo = null;
    $query = mysqli_query($db, "SELECT * FROM products WHERE id='$id'");
    while($row = mysqli_fetch_array($query))
    {
        $photo = $row['Photo'];
        $name = $row['Name'];
        $brend = $row['Brend'];
        $artic = $row['Article'];
        $price = $row['Price'];
        $category = $row['Category'];
        $description = $row['Description'];
        $availability = $row['Availability'];
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
    <header class="dark">
    <div id="top">
      <div class="wrap main_flex__nowrap flex__align-items_center flex__jcontent_between">

        <div class="main_flex__nowrap flex__align-items_center">

            <style>
                .nubex1 {
                    font-weight: bold;
                    font-size: 50px;
                }
                .nubex2 {
                    font-size: 40px;
                }
                .nubex3 {
                    font-size: 30px;
                }
                .nubex4 {
                    font-size: 23px;
                }
                .regButton {
                    text-decoration: none;
                    outline: none;
                    display: inline-block;
                    width: 140px;
                    height: 45px;
                    border-radius: 45px;
                    margin: 10px 20px;
                    margin-bottom:
                    font-family: 'Montserrat', sans-serif;
                    font-size: 11px;
                    text-transform: uppercase;
                    text-align: center;
                    letter-spacing: 3px;
                    font-weight: 600;
                    color: #524f4e;
                    background: white;
                    box-shadow: 0 8px 15px rgba(0, 0, 0, .1);
                    transition: .3s;
                }

                .regButton:hover {
                    background: #2EE59D;
                    box-shadow: 0 15px 20px rgba(46, 229, 157, .4);
                    color: white;
                    transform: translateY(-7px);
                }
            </style>
          <body>

            <a href="index.php"><button class="regButton">На головну</button></a>



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

        </div>
      </div>
    </div>

  </header>


  <div class="box1 row justify-content-center">
    <div class="col-4">
      <img src='../photos/product/<?php echo $photo ?>.jpg' width="500" height="500" alt="wmth">
    </div>
    <div class="col-4">
      <span class="nubex1"><?php echo $name; ?></span><br>
        <br>
        <br>
        <span class="nubex3">Артикул: <?php echo $artic; ?></span><br>
        <br>
        <br>
        <span class="nubex2">Виробник: <?php echo $brend; ?></span><br>
        <br>
        <br>
        <span class="nubex3">Ціна: <?php echo $price; ?></span><br>
        <br>
      <span class="nubex4"><?php if($availability == '1'){ echo "Є в наявності";}
          else {
              echo "Немає в наявності";
          }?></span><br>
        <br>
        <span class="nubex4">Категорія: <?php echo $category; ?></span><br>
        <br>
      <p><?php echo $description; ?></p><br>
    </div>
  </div>


  <footer>
    <div class="wrap">

      <div>
        <nav id="footer_nav" class="main_flex__nowrap flex__jcontent_center flex__align-items_center">
          <li><a href="<?php echo $url['url']; ?>">Про нас пишуть</a></li>
        </nav>
      </div>
    </div>

  </footer>

</body>
<script src="js/jquery-1.8.3.js"></script>
<script src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="js/control.js"></script>

</html>