<?php
// xu ly xoa manu 
include "config.php";
include "models/db.php";
include "models/manufacture.php";
$manufacture = new manufacture;
if (isset($_GET['id'])) {
    $id1 = $_GET['id'];
    $manufacture->DeleteManu($id1);
    header("location:categories.php");
} else{
}