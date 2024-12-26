<?php
require "config.php";
require "model/db.php";
require "model/products.php";
require "model/manufactures.php";
require "model/protypes.php";

$protypes = new protypes;
$products = new products;
$manufactures = new manufacture;
$cate = $products->getItemById($_GET['id']);
$products->ADD($cate[0]['name'], $cate[0]['manu_id'], $cate[0]['type_id'], $cate[0]['price'], $cate[0]['image'], $cate[0]['description'], $cate[0]['feature'], $cate[0]['Quantity'], $cate[0]['BestSellingProducts'], $cate[0]['PriceDiscount'], 1);
header("location:cart.php");