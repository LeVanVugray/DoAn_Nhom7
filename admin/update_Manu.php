<?php 
include 'config.php';
include 'models/db.php';
include 'models/manufacture.php';
$manu = new manufacture;
$id = $_POST['manu_id'];
$name = $_POST['name'];
$image = $_FILES["fileUpload"]["name"]? $_FILES["fileUpload"]["name"] : "";
if($manu->updateManuById($name, $image, $id)){
    $target_dir = "../AnhDoAn//";
    $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
    move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
}
header('location: categories.php');