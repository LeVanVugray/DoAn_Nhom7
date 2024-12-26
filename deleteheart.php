<?php
require "config.php";
require "model/db.php";
require "model/products.php";
require "model/manufactures.php";
require "model/protypes.php";

$protypes = new protypes;
$products = new products;
$manufactures = new manufacture;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $products->Delete($id);
    header("location:heart.php");
}