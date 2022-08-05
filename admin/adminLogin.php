<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['admin_email']))
{
    header("location: admin-dashboard.php");
    exit;
}
require_once "../config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['admin_email'])) || empty(trim($_POST['admin_password'])))
    {
        $err = '<div style="color:red; margin-top:5px; font-weight:500;">Please enter username and password</div>';
    }
    else{
        $username = trim($_POST['admin_email']);
        $password = trim($_POST['admin_password']);
    }


if(empty($err))
{
    $sql = "SELECT admin_id, admin_email, admin_password FROM admin WHERE admin_email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["admin_email"] = $username;
                            $_SESSION["admin_id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: admin-dashboard.php");
                            
                        }
                    }

                }

    }
}    


}


?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <header>Admin Login</header>
    <form action="" method="post">
      <div class="field email">
        <div class="input-area">
        <input type="email" placeholder="Email" name="admin_email">
          <i class="icon fas fa-envelope"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        
      </div>
      <div class="field password">
        <div class="input-area">
        <input type="password" placeholder="Password" name="admin_password">
          <i class="icon fas fa-lock"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <?php  if(isset($err)) { echo $err;} ?>
      </div>
      <div class="pass-txt"><a href="#">Forgot password?</a></div>
      <input type="submit" value="Login">
    </form>
    <div class="sign-txt">Not yet member? <a href="register.php">Register Now</a></div>
  </div>
</body>
</html>