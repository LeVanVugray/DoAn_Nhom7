<?php 
include 'config.php';
include 'models/db.php';
include 'models/Users.php';
$user = new User;
$name = $_POST['name'];
// $pass = password_hash($_POST['Password'], PASSWORD_DEFAULT);
$pass = $_POST['Password'];
$role = $_POST['Role'];
$all = $_POST['All'];
$user->addUser($name,$pass,$role,$all);
header('location: users.php');