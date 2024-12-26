<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Glassmorphism Login Form | CodingNepal</title>
  <link rel="stylesheet" href="stylelogin.css">
  
</head>
<body>
<?php
session_start();
if (isset($_SESSION['doipassthanhcong'])) {
    echo "<script>" . $_SESSION['doipassthanhcong'] . "</script>";
    unset($_SESSION['doipassthanhcong']); 
}
if (isset($_SESSION['khongcotenemail'])) {
  echo "<script>" . $_SESSION['khongcotenemail'] . "</script>";
  unset($_SESSION['khongcotenemail']); 
}
if (isset($_SESSION['dangkythanhcong'])) {
    echo "<script>" . $_SESSION['dangkythanhcong'] . "</script>";
    unset($_SESSION['dangkythanhcong']); 
  }

?>
  <div class="wrapper">
    <form action="admin/index.php" method="post">
      <h2>Login</h2>
        <div class="input-field">
          <input type="text" name = "user" class="form-control" placeholder = "Enter your Email" required 
            pattern="[a-zA-Z0-9]{5,}@[a-zA-Z]{5}\.[a-z]{3}">
        
      </div>
      <div class="input-field">
        <input type="password" name ="password" required placeholder = "Enter your password"  pattern="\w{10,11}$">
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="forgotpassword.php">Forgot password?</a>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="Register.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>