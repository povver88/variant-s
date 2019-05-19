<?php
session_start();
if($_SESSION['SuccessAdmin'] != "True")
{
    header('location: loginadmin.php');
}
$db = mysqli_connect('localhost', 'root', '', 'users');
if (isset($_POST)) {
    $id = $_SESSION['editproduct']['Id'];
    $name = $_SESSION['editproduct']['Name'];
    $article = $_SESSION['editproduct']['Article'];
    $brend = $_SESSION['editproduct']['Brend'];
    $price = $_SESSION['editproduct']['Price'];
    $count = $_SESSION['editproduct']['Count'];
    $category = $_SESSION['editproduct']['Category'];
    $nameproduct=$_SESSION['editproduct']['Photo'];
    $namearticle=$_SESSION['editproduct']['ArticlePhoto'];
    $description = $_SESSION['editproduct']['Description'];
    $topprice = $_SESSION['editproduct']['TopPrice'];
    $topsell = $_SESSION['editproduct']['TopSell'];
    $availability = $_SESSION['editproduct']['Availability'];



    if(!empty($_FILES['photo']['name']))
    {
        unlink("../../photos/product/{$nameproduct}.jpg");
        $info = pathinfo($_FILES['photo']['name']);
        $ext = $info['extension']; // get the extension of the file
        $nameproduct = md5(microtime() . rand(0, 9999));
        $newname = "$nameproduct.jpg";
        $target = '../../photos/product/'.$newname;
        move_uploaded_file( $_FILES['photo']['tmp_name'], $target);
        smart_resize_image($target,null, 750, 750, false, 'file', true,false, 50);
    }

    if(!empty($_FILES['aphoto']['name']))
    {
        unlink("../../photos/article/{$namearticle}.jpg");
        $info = pathinfo($_FILES['aphoto']['name']);
        $ext = $info['extension']; // get the extension of the file
        $namearticle = md5(microtime() . rand(0, 9999));
        $newname = "$namearticle.jpg";
        $target = '../../photos/article/'.$newname;
        move_uploaded_file( $_FILES['aphoto']['tmp_name'], $target);
    }

    if(!empty($_POST['topsell']))
    {
        if($_POST['topsell']=='On')
        {
            $topsell = 1;
        }
    }
    else{
        $topsell = 0;
    }
    if(!empty($_POST['topprice']))
    {
        if($_POST['topprice']=='On')
        {
            $topprice = 1;
        }
    }
    else{
        $topprice = 0;
    }
    if(!empty($_POST['dropinv']))
    {
        $category = e($_POST['dropinv']);
    }
    if(!empty($_POST['name']))
    {
        $name = e($_POST['name']);
    }
    if(!empty($_POST['article']))
    {
        $article = e($_POST['article']);
    }
    if(!empty($_POST['brend']))
    {
        $brend = e($_POST['brend']);
    }
    if(!empty($_POST['price']))
    {
        $price = e($_POST['price']);
    }
    if(!empty($_POST['count']))
    {
        $count = e($_POST['count']);
    }

    $query = "UPDATE products SET availability='$availability', name='$name', article='$article', brend='$brend', price='$price', count='$count', category='$category', photo='$nameproduct', articlephoto='$namearticle', topprice='$topprice', topsell='$topsell', description='$description' WHERE id='$id'";
    $results = mysqli_query($db, $query);
    $_SESSION['editproduct']['Name'] = $name;
    $_SESSION['editproduct']['Article'] = $article;
    $_SESSION['editproduct']['Brend']=$brend;
    $_SESSION['editproduct']['Price'] = $price;
    $_SESSION['editproduct']['Count'] = $count;
    $_SESSION['editproduct']['Category'] = $category;
    $_SESSION['editproduct']['Photo'] = $nameproduct;
    $_SESSION['editproduct']['ArticlePhoto'] = $namearticle;
    $_SESSION['editproduct']['Description'] = $description;
    $_SESSION['editproduct']['TopPrice'] = $topprice;
    $_SESSION['editproduct']['TopSell'] = $topsell;
    $_SESSION['editproduct']['Availability'] = $availability;
    header('location: ../productslist.php');
}

function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

function smart_resize_image($file,
                            $string             = null,
                            $width              = 0,
                            $height             = 0,
                            $proportional       = false,
                            $output             = 'file',
                            $delete_original    = true,
                            $use_linux_commands = false,
                            $quality = 100
) {

    if ( $height <= 0 && $width <= 0 ) return false;
    if ( $file === null && $string === null ) return false;

    # Setting defaults and meta
    $info                         = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
    $image                        = '';
    $final_width                  = 0;
    $final_height                 = 0;
    list($width_old, $height_old) = $info;
    $cropHeight = $cropWidth = 0;

    # Calculating proportionality
    if ($proportional) {
        if      ($width  == 0)  $factor = $height/$height_old;
        elseif  ($height == 0)  $factor = $width/$width_old;
        else                    $factor = min( $width / $width_old, $height / $height_old );

        $final_width  = round( $width_old * $factor );
        $final_height = round( $height_old * $factor );
    }
    else {
        $final_width = ( $width <= 0 ) ? $width_old : $width;
        $final_height = ( $height <= 0 ) ? $height_old : $height;
        $widthX = $width_old / $width;
        $heightX = $height_old / $height;

        $x = min($widthX, $heightX);
        $cropWidth = ($width_old - $width * $x) / 2;
        $cropHeight = ($height_old - $height * $x) / 2;
    }

    # Loading image to memory according to type
    switch ( $info[2] ) {
        case IMAGETYPE_JPEG:  $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);  break;
        case IMAGETYPE_GIF:   $file !== null ? $image = imagecreatefromgif($file)  : $image = imagecreatefromstring($string);  break;
        case IMAGETYPE_PNG:   $file !== null ? $image = imagecreatefrompng($file)  : $image = imagecreatefromstring($string);  break;
        default: return false;
    }


    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
        $transparency = imagecolortransparent($image);
        $palletsize = imagecolorstotal($image);

        if ($transparency >= 0 && $transparency < $palletsize) {
            $transparent_color  = imagecolorsforindex($image, $transparency);
            $transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
            imagefill($image_resized, 0, 0, $transparency);
            imagecolortransparent($image_resized, $transparency);
        }
        elseif ($info[2] == IMAGETYPE_PNG) {
            imagealphablending($image_resized, false);
            $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
            imagefill($image_resized, 0, 0, $color);
            imagesavealpha($image_resized, true);
        }
    }
    imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);


    # Taking care of original, if needed
    if ( $delete_original ) {
        if ( $use_linux_commands ) exec('rm '.$file);
        else @unlink($file);
    }

    # Preparing a method of providing result
    switch ( strtolower($output) ) {
        case 'browser':
            $mime = image_type_to_mime_type($info[2]);
            header("Content-type: $mime");
            $output = NULL;
            break;
        case 'file':
            $output = $file;
            break;
        case 'return':
            return $image_resized;
            break;
        default:
            break;
    }

    # Writing image according to type to the output destination and image quality
    switch ( $info[2] ) {
        case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
        case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
        case IMAGETYPE_PNG:
            $quality = 9 - (int)((0.9*$quality)/10.0);
            imagepng($image_resized, $output, $quality);
            break;
        default: return false;
    }

    return true;
}

?>