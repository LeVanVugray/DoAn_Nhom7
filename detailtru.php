<?php
require "config.php";
require "model/db.php";
require "model/products.php";
require "model/manufactures.php";
require "model/protypes.php";

$protypes = new protypes;
$products = new products;
$manufactures = new manufacture;
$id = $_GET['id'];
$Quantilyshopp = $_GET['Quantily'];
if($Quantilyshopp>0){
    $Quantilyshopp-=1;
}
else{
    $Quantilyshopp=0;
}
$getItemById = $products->getItemById($id);
$total= $getItemById[0]['price']*$Quantilyshopp;
$products->Update($getItemById[0]['name'],$getItemById[0]['manu_id'],$getItemById[0]['type_id'],$getItemById[0]['price'],$getItemById[0]['image'],$getItemById[0]['description'],$getItemById[0]['feature'],$getItemById[0]['Quantity'],$getItemById[0]['BestSellingProducts'],$getItemById[0]['PriceDiscount'],$getItemById[0]['ALL'],$Quantilyshopp,$total,$getItemById[0]['id']);
?>
<?php

header("location:detailproduct.php?id=$id");

