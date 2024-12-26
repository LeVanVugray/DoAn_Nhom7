<?php 
include 'config.php';
include 'models/db.php';
include 'models/Users.php';
$user = new User;
$id = $_POST['User_Id'];
$name = $_POST['name'];
// $pass = password_hash($_POST['Password'], PASSWORD_DEFAULT);
$pass = $_POST['Password'];
$role = $_POST['Role'];
$all = $_POST['All'];
$user->updateUserById($name,$pass,$role,$all,$id);
header('location: users.php');