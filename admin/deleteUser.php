<?php
// xu ly xoa manu 
include "config.php";
include "models/db.php";
include 'models/Users.php';
$user = new User;
if (isset($_GET['id'])) {
    $id1 = $_GET['id'];
    $user->DeleteUser($id1);
    header("location:users.php");
} else{
}