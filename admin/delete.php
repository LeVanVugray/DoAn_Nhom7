<?php
// xu ly xoa item 
include "config.php";
include "models/db.php";
include "models/product.php";
include "models/manufacture.php";
$Product = new Product;
$manufacture = new manufacture;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $Product->delete($id);
    header("location:items.php");
} elseif (isset($_GET['manu_name'])) {
    $manu_name = $_GET['manu_name'];
}
