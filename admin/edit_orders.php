<?php 
include('../admin/admin-partials/header.php');

require_once "../config.php";

if(isset($_REQUEST['update-btn'])){
   
        $order_id = $_REQUEST['order_id'];
        $food_name = $_REQUEST['food_name'];
        $food_price = $_REQUEST['food_price'];
        $customer_address = $_REQUEST['customer_address'];
        $status = $_REQUEST['status'];

        $sql = "UPDATE orders SET  food_name = '$food_name', food_price = '$food_price', customer_address = '$customer_address', status = '$status' WHERE order_id = '$order_id'";
        if($conn->query($sql) == TRUE) {
            $error_msg = '<small style="color:green;">Updated Successfully  !</small>';
        }
        else {
            $error_msg = '<small style="color:red;">Unable to update pizza details !</small>';
        }

}    
    else {
        $error_msg = '<small style="color:red;">Fill all the fields please !</small>';
    }



?>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Prem Shahi</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content" id="homeContent">
        
        <div class="container">
            <div class="title">Update Order Details</div>
            <?php  if(isset($error_msg)) { echo $error_msg;} ?>
            <?php
                 if(isset($_REQUEST['edit'])) {
                    $sql = "SELECT * FROM orders WHERE order_id = {$_REQUEST['id']}";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                  }
            ?>
            
            <div class="content">
            <form action="#" method="post" enctype = "multipart/form-data">
                <div class="user-details">
                <div class="input-box">
                    <span class="details">Order ID</span>
                    <input type="text" placeholder="Enter Pizza ID"  name="order_id"    value="<?php if(isset ($row['order_id'])) {echo $row['order_id'];} ?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Pizza Name</span>
                    <input type="text" placeholder="Enter Pizza Name"  name="food_name"    value="<?php if(isset ($row['food_name'])) {echo $row['food_name'];} ?>">
                </div>
                <div class="input-box">
                    <span class="details">Pizza Price</span>
                    <input type="text" placeholder="Enter Pizza Price" name="food_price"   value="<?php if(isset ($row['food_price'])) {echo $row['food_price'];} ?>">
                </div>
                <div class="input-box">
                    <span class="details">Customer Name</span>
                    <input type="text" placeholder="Enter Pizza Price" name="customer_name"   value="<?php if(isset ($row['customer_name'])) {echo $row['customer_name'];} ?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Customer Address</span>
                    <textarea name="customer_address" placeholder="Pizza Description"   id="" cols="45" rows="10" ><?php if(isset($row['customer_address'])) {echo $row['customer_address'];} ?></textarea>
                </div>
                <div class="input-box">
                <span class="details">Status</span>
                    <select name="status" id="status">
                        <option  value="Ordered">Ordered</option>
                        <option    value="On delivery">On delivery</option>
                        <option  value="Delivered">Delivered</option>
                        <option  value="Cancelled">Cancelled</option>
                    </select>
                </div>
                </div>
                <div class="button">
                <input type="submit" value="Update" name="update-btn" id="update-btn">
                </div>
            </form>
            </div>
        </div>



  </section>
<?php include('../admin/admin-partials/footer.php') ?>
