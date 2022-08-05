<?php 
include('../admin/admin-partials/header.php');

require_once "../config.php";

if(isset($_REQUEST['update-btn'])){
    if(($_REQUEST['pizza_name'] == "") || ($_REQUEST['pizza_price'] == "") || ($_REQUEST['pizza_desc'] == "")) {
        $error_msg = '<small style="color:red;">Fill all the fields please !</small>';
    }
    else {
        $pizza_id = $_REQUEST['pizza_id'];
        $pizza_name = $_REQUEST['pizza_name'];
        $pizza_price = $_REQUEST['pizza_price'];
        $pizza_desc = $_REQUEST['pizza_desc'];
        $pizza_img = $_FILES['pizza_img']['name'];
        $pizza_final_img = '../images/pizza-img/'.$pizza_img;

        $sql = "UPDATE pizzas SET pizza_id = '$pizza_id', pizza_name = '$pizza_name', pizza_price = '$pizza_price', pizza_desc = '$pizza_desc', pizza_img = '$pizza_final_img' WHERE pizza_id = '$pizza_id'";
        if($conn->query($sql) == TRUE) {
            $error_msg = '<small style="color:green;">Updated Successfully  !</small>';
        }
        else {
            $error_msg = '<small style="color:red;">Unable to update pizza details !</small>';
        }

        
    }
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
            <div class="title">Update Pizza Details</div>
            <?php  if(isset($error_msg)) { echo $error_msg;} ?>
            <?php
                 if(isset($_REQUEST['edit'])) {
                    $sql = "SELECT * FROM pizzas WHERE pizza_id = {$_REQUEST['id']}";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                  }
            ?>
            
            <div class="content">
            <form action="#" method="post" enctype = "multipart/form-data">
                <div class="user-details">
                <div class="input-box">
                    <span class="details">Pizza ID</span>
                    <input type="text" placeholder="Enter Pizza ID"  name="pizza_id"    value="<?php if(isset ($row['pizza_id'])) {echo $row['pizza_id'];} ?>" readonly>
                </div>
                <div class="input-box">
                    <span class="details">Pizza Name</span>
                    <input type="text" placeholder="Enter Pizza Name"  name="pizza_name"    value="<?php if(isset ($row['pizza_name'])) {echo $row['pizza_name'];} ?>    ">
                </div>
                <div class="input-box">
                    <span class="details">Pizza Price</span>
                    <input type="text" placeholder="Enter Pizza Price" name="pizza_price"   value="<?php if(isset ($row['pizza_price'])) {echo $row['pizza_price'];} ?>">
                </div>
                <div class="input-box">
                    <span class="details">Pizza Description</span>
                    <textarea name="pizza_desc" placeholder="Pizza Description"   id="" cols="45" rows="10" ><?php if(isset($row['pizza_desc'])) {echo $row['pizza_desc'];} ?></textarea>
                </div>
                <div class="input-box pizza-file-input-box">
                    <span class="details">Pizza Image</span>
                    <img src="<?php if(isset($row['pizza_img'])) {echo $row['pizza_img'];} ?>" alt="Pizza Image" class="img_thumbnail" height="80px" width="80px">
                    <input type="file" placeholder="Enter your number" name="pizza_img"  >
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
