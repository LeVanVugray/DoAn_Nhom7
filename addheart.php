<?php
require "config.php";
require "model/db.php";
require "model/products.php";
require "model/manufactures.php";
require "model/protypes.php";

$protypes = new protypes;
$products = new products;
$manufactures = new manufacture;

$getItemById = $products->getItemByIdheart($_GET['id']);
$id = $_GET['id'];
// var_dump($getItemById);
$products->ADDheart($getItemById[0]['name'],
$getItemById[0]['manu_id'],
$getItemById[0]['type_id'],
$getItemById[0]['price'],$getItemById[0]['image'],
$getItemById[0]['description'],
$getItemById[0]['feature'],
$getItemById[0]['Quantity'],
$getItemById[0]['BestSellingProducts'],
$getItemById[0]['PriceDiscount'],
$getItemById[0]['ALL'],
$getItemById[0]['Quantilyshop'],
$getItemById[0]['Total'],
1);
header("location:heart.php?id=$id");