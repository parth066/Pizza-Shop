<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form validation in HTML & CSS | CodingNepal</title>
  <link rel="stylesheet" href="./css/checkout_form.css">
</head>
<body>

<?php
require_once "./config.php";


if(isset($_REQUEST['order-btn'])){
    if(isset($_REQUEST['customer_name'])) {

        $food_name = $_REQUEST['food_name'];
        $food_price = $_REQUEST['food_price'];
        $customer_name = $_REQUEST['customer_name'];
        $customer_phone_no = $_REQUEST['customer_phone_no'];
        $customer_address = $_REQUEST['customer_address'];
        $status = "Ordered";
       

        $sql = "INSERT INTO orders(food_name,food_price, customer_name,customer_phone_no,customer_address,status) VALUES ('$food_name', '$food_price', '$customer_name','$customer_phone_no','$customer_address','$status')";
        if($conn->query($sql) == TRUE) {
            $error_msg = '<small style="color:green;">Pizza Ordered Successfully  !</small>';
            header("location: index.php");
        }
        else {
            $error_msg = '<small style="color:red;">Failed to order pizza !</small>';
        }
    }
    }
    else {
        $error_msg = '<small style="color:red;">Fill all the fields please !</small>';
    }

        














?>





<section class="home-section">
    
    <div class="home-content" id="homeContent">
        
        <div class="container">
            <div class="title">Checkout Form</div>
            <?php  if(isset($error_msg)) { echo $error_msg;} ?>
            <?php
                 if(isset($_REQUEST['order'])) {
                    $sql = "SELECT * FROM pizzas WHERE pizza_id = {$_REQUEST['id']}";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                  }
            ?>
            
            <div class="content">
            <form action="#" method="post">
                <div class="user-details">
                <div class="input-box">
                    <span class="details">Pizza Name</span>
                    <input type="text"  required value="<?php if(isset ($row['pizza_name'])) {echo $row['pizza_name'];} ?>" readonly >
                    <input type="hidden"  name="food_name"  required value="<?php if(isset ($row['pizza_name'])) {echo $row['pizza_name'];} ?>" >
                </div>
                <div class="input-box">
                    <span class="details">Pizza Price</span>
                    <input type="text"  required value="₹<?php if(isset ($row['pizza_price'])) {echo $row['pizza_price'];} ?>" readonly>
                    <input type="hidden" name="food_price"  required value="₹<?php if(isset ($row['pizza_price'])) {echo $row['pizza_price'];} ?>">
                </div>
                <div class="input-box">
                    <span class="details">Your Name</span>
                    <input name="customer_name" placeholder="Enter your name" required type="text" >
                </div>
                <div class="input-box">
                    <span class="details">Contact Number</span>
                    <input type="text" placeholder="Enter your Contact Number" name="customer_phone_no"  required >
                </div>
                <div class="input-box pizza-file-input-box">
                    <span class="details">Pizza Image</span>
                    <img src="<?php if(isset ($row['pizza_img'])) {echo str_replace('..','.', $row['pizza_img']);} ?>" alt="Pizza Image" width="120px" height="120px">
                </div>
                <div class="input-box">
                    <span class="details">Address</span>
                    <textarea  placeholder="Enter your Address" name="customer_address"  required id="" cols="45" rows="10"></textarea>
                </div>
                <div class="button">
                <input type="submit" value="Order Now" name="order-btn" id="order-btn">
                </div>
            </form>
            </div>
        </div>



  </section>

  </body>
</html>

