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
    $cate = $products->getItemByIdshop($_GET['id']);
    $Quantilyshopp = $cate[0]['Quantilyshop'];
    $Quantilyshopp+=1;
    $getItemById = $products->getItemById($_GET['id']);
    $total= $getItemById[0]['price']*$Quantilyshopp;
    $products->Update($getItemById[0]['name'],$getItemById[0]['manu_id'],$getItemById[0]['type_id'],$getItemById[0]['price'],$getItemById[0]['image'],$getItemById[0]['description'],$getItemById[0]['feature'],$getItemById[0]['Quantity'],$getItemById[0]['BestSellingProducts'],$getItemById[0]['PriceDiscount'],$getItemById[0]['ALL'],$Quantilyshopp,$total,$getItemById[0]['id']);
    header("location:cart.php");
}
if($vall==0){
    $id = $_GET['id'];
    header("location:addshop.php?id=$id");
}
?>