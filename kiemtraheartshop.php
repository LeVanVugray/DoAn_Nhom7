<!-- kiemtra -->
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
echo $vall;
if($vall==1){
    echo "dung";
    $getItemById = $products->getItemByIdheartshop($_GET['id']);
    $Quantilyshopp = $getItemById[0]['Quantilyshop'];
    // $Quantilyshopp+=1;
    // $total= $getItemById[0]['price']*$Quantilyshopp;
    // var_dump($getItemById);
    $products->Updateheart($getItemById[0]['name'],
    $getItemById[0]['manu_id'],$getItemById[0]['type_id'],
    $getItemById[0]['price'],$getItemById[0]['image'],
    $getItemById[0]['description'],$getItemById[0]['feature'],
    $getItemById[0]['Quantity'],$getItemById[0]['BestSellingProducts'],
    $getItemById[0]['PriceDiscount'],1,
    $getItemById[0]['Quantilyshop'],
    $getItemById[0]['Total'],0,$getItemById[0]['id']);
    header("location:cart.php");
}
if($vall==0){
    // $id = $_GET['id'];
    // header("location:addheart.php?id=$id");
    $products = new products;
    $getItemById1 = $products->getItemByIdheart($_GET['id']);
    $id = $_GET['id'];
    // var_dump($getItemById);
    $products->ADDheart($getItemById1[0]['name'],
    $getItemById1[0]['manu_id'],
    $getItemById1[0]['type_id'],
    $getItemById1[0]['price'],$getItemById1[0]['image'],
    $getItemById1[0]['description'],
    $getItemById1[0]['feature'],
    $getItemById1[0]['Quantity'],
    $getItemById1[0]['BestSellingProducts'],
    $getItemById1[0]['PriceDiscount'],
    1,
    $getItemById1[0]['Quantilyshop'],
    $getItemById1[0]['Total'],
    0);
    $products->Delete($id);
    header("location:cart.php");
}
?>