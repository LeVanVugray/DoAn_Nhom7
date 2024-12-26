<?php
require "config.php";
require "models/db.php";
require "models/product.php";
$products = new Product;
$name = $_POST['name'];
$manu_id = $_POST['manu_id'];
$type_id = $_POST['type_id'];
$price = $_POST['price'];
$image = $_FILES['fileUpload']['name'];
$description = $_POST['description'];
$featured = $_POST['featured'];
$Quantity = $_POST['Quantity'];
$bestsellingProduct = $_POST['bestsellingProduct'];
$priceDiscocunt = $_POST['priceDiscocunt'];
$All = $_POST['All'];
if ($products->ADD($name, $manu_id, $type_id, $price, $image, $description, $featured, $Quantity, $bestsellingProduct, $priceDiscocunt, $All)) {
    // var_dump($_FILES);
    $target_dir = "../AnhDoAn/";
    $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
    move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    
}
header("location:items.php");
