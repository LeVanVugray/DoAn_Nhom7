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
if (isset($_SESSION['emailtrung'])) {
    echo "<script>" . $_SESSION['emailtrung'] . "</script>";
    unset($_SESSION['emailtrung']); 
  }
?>
  <div class="wrapper">
    <form action="addRegister.php" method = "post">
      <h2>Login</h2>
        <div class="input-field">
        <input type="text" name ="user" class="form-control" placeholder = "Enter your Email" required 
            pattern="[a-zA-Z0-9]{5,}@[a-zA-Z]{5}\.[a-z]{3}">
      </div>
      <div class="input-field">
      <input type="password" name ="pass" required placeholder = "Enter your password"  pattern="\w{10,11}$">
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
        <p>Don't have an account? <a href="Loginin.php">Login</a></p>
      </div>
    </form>
  </div>
</body>
</html>