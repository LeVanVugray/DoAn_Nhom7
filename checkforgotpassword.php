<?php
require "config.php";
require "model/db.php";
require "model/products.php";
require "model/manufactures.php";
require "model/protypes.php";
require "model/users.php";

$protypes = new protypes;
$products = new products;
$manufactures = new manufacture;
$users = new Users;
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['user']) ? trim($_POST['user']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;
    $forgotpassword = isset($_POST['forgotpassword']) ? trim($_POST['forgotpassword']) : null;
    if($password==$forgotpassword){
        $usersall = $users->getAllItems();
        foreach($usersall as $value){
            if($value['Username']==$email){
                $ten = "update password thanh cong".$value['User_Id'];
                $updatepass = $users->Updatepassword($forgotpassword,$value['User_Id']);
                $_SESSION['doipassthanhcong'] = "alert('Password change successful!');";
                header("Location:Loginin.php");
            }
            if($value['Username']!=$email){
                $_SESSION['khongcotenemail'] = "alert('No Email Name!');";
                header("Location:Loginin.php");
            }
        }
    }
    if($password!=$forgotpassword){
        $_SESSION['passwordkotrung'] = "alert('Incorrect password!');";
        header("Location:forgotpassword.php");
    }
}