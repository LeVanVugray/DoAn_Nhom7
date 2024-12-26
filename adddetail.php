<?php
require "config.php";
require "model/db.php";
require "model/products.php";
require "model/manufactures.php";
require "model/protypes.php";

$protypes = new protypes;
$products = new products;
$manufactures = new manufacture;
$shopAll = $products->getItemAllshop();
$vall = 0;

foreach($shopAll as $value){
    if($value['id']==$_GET['id']){
        $vall =1;
    }
}
if($vall==1){
    $getItemById = $products->getItemById($_GET['id']);
    $products->Updatedetail($getItemById[0]['name'],$getItemById[0]['manu_id'],$getItemById[0]['type_id'],$getItemById[0]['price'],$getItemById[0]['image'],$getItemById[0]['description'],$getItemById[0]['feature'],$getItemById[0]['Quantity'],$getItemById[0]['BestSellingProducts'],$getItemById[0]['PriceDiscount'],$getItemById[0]['ALL'],1,$getItemById[0]['Total'],$getItemById[0]['id']);
    header("location:cart.php");
}
if($vall==0){
$cate = $products->getItemById($_GET['id']);
$products->ADDdetail($cate[0]['name'], $cate[0]['manu_id'], $cate[0]['type_id'], $cate[0]['price'], $cate[0]['image'], $cate[0]['description'], $cate[0]['feature'], $cate[0]['Quantity'], $cate[0]['BestSellingProducts'], $cate[0]['PriceDiscount'], 1,$_GET['Quantilyshop'],$_GET['Total']);
$getItemById = $products->getItemById($_GET['id']);
$products->Updatedetail($getItemById[0]['name'],$getItemById[0]['manu_id'],$getItemById[0]['type_id'],$getItemById[0]['price'],$getItemById[0]['image'],$getItemById[0]['description'],$getItemById[0]['feature'],$getItemById[0]['Quantity'],$getItemById[0]['BestSellingProducts'],$getItemById[0]['PriceDiscount'],$getItemById[0]['ALL'],1,$getItemById[0]['Total'],$getItemById[0]['id']);
header("location:cart.php");
}