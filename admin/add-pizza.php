<?php 
include('../admin/admin-partials/header.php');

require_once "../config.php";

if(isset($_REQUEST['add-btn'])){
    if(isset($_FILES['pizza_img'])) {
        
        $pizza_name = $_REQUEST['pizza_name'];
        $pizza_price = $_REQUEST['pizza_price'];
        $pizza_desc = $_REQUEST['pizza_desc'];
        $pizza_img = $_FILES['pizza_img']['name'];
        $pizza_img_temp = $_FILES['pizza_img']['tmp_name'];
        $pizza_img_folder = '../images/pizza-img/'.$pizza_img;
        move_uploaded_file($pizza_img_temp, $pizza_img_folder);

        $sql = "INSERT INTO pizzas(pizza_name,pizza_price, pizza_desc,pizza_img) VALUES ('$pizza_name', '$pizza_price', '$pizza_desc','$pizza_img_folder')";

        if($conn->query($sql) == TRUE) {
            $error_msg = '<small style="color:green;">Pizza Added Successfully</small>';
        } 
        else {
            $error_msg = '<small style="color:green;">Unable to add Pizzas !</small>';
        }
    
    }
    
    else {
        $error_msg = '<small style="color:red;">Fill all the fields please !</small>';
    
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
            <div class="title">Add Pizza</div>
            <?php  if(isset($error_msg)) { echo $error_msg;} ?>
            
            <div class="content">
            <form action="#" method="post" enctype = "multipart/form-data">
                <div class="user-details">
                <div class="input-box">
                    <span class="details">Pizza Name</span>
                    <input type="text" placeholder="Enter Pizza Name"  name="pizza_name"  required >
                </div>
                <div class="input-box">
                    <span class="details">Pizza Price</span>
                    <input type="text" placeholder="Enter Pizza Price" name="pizza_price"  required >
                </div>
                <div class="input-box">
                    <span class="details">Pizza Description</span>
                    <textarea name="pizza_desc"   required id="" cols="45" rows="10"></textarea>
                </div>
                <div class="input-box pizza-file-input-box">
                    <span class="details">Pizza Image</span>
                    <input type="file" placeholder="Enter your number" name="pizza_img" >
                </div>
                </div>
                <div class="button">
                <input type="submit" value="Add" name="add-btn" id="add-btn">
                </div>
            </form>
            </div>
        </div>



  </section>
<?php include('../admin/admin-partials/footer.php') ?>
