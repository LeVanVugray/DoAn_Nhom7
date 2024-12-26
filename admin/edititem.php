<?php
// xu ly xoa item 

include "config.php";
include "models/db.php";
include "models/product.php";
include "models/manufacture.php";
var_dump($_FILES);

$products = new Product;
$manufacture = new manufacture;
$name = $_POST['name'];
$manu_id = $_POST['manu_id'];
$type_id = $_POST['type_id'];
$price = $_POST['price'];
$image = isset($_FILES['fileUpload']['name'])?$_FILES['fileUpload']['name']:"";
$description = $_POST['description'];
$featured = $_POST['featured'];
$Quantity = $_POST['Quantity'];
$bestsellingProduct = $_POST['bestsellingProduct'];
$priceDiscocunt = $_POST['priceDiscocunt'];
$All = $_POST['All'];
$id = $_POST['id'];
$products->Update($name, $manu_id, $type_id, $price, $image, $description, $featured, $Quantity, $bestsellingProduct, $priceDiscocunt, $All,$id);
// var_dump($name);
if(isset($_FILES['fileUpload'])){
    $target_dir = "../AnhDoAn/";
    $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
    move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
}
header("location:items.php");
    
