<?php
require "config.php";
require "model/db.php";
require "model/users.php";
$users = new Users;
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['user']) ? trim($_POST['user']) : null;
    $password = isset($_POST['pass']) ? trim($_POST['pass']) : null;
    function isEmailDuplicate($email, $password) {
        $users = new Users;
        $usersall = $users->getAllItems();
        foreach($usersall as $value){
            if (trim($value['Username'])===$email) {
                return true;
            }
        }
        return false;
    }
    if (isEmailDuplicate($email, $password)) {
        $_SESSION['emailtrung'] = "alert('This email exists!');";
        header("Location:Register.php");
    } else {
        $_SESSION['dangkythanhcong'] = "alert('Register successful!');";
        $users->ADD($email,$password);
        header("Location:Loginin.php");
    }
}

