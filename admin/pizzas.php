<?php 
include('../admin/admin-partials/header.php'); 
require_once "../config.php";



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
      <div class="sales-boxes">
        <div class="recent-sales box">
        <?php
          $sql = "SELECT * FROM pizzas";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
        ?>
        <table tyle="height: 47px;" width="676">
        <tbody>
            <tr>
              <td style="width: 166.4px;">Pizza ID</td>
              <td style="width: 166.4px;">Pizza Name</td>
              <td style="width: 171.2px;">Price</td>
              <td style="width: 171.2px; text-align:center;">Action</td>
            </tr>
            <tr>
            <?php  while($row = $result->fetch_assoc()) { 
              echo '<td style="width: 166.4px;">'.$row['pizza_id'].'</td>';
              echo '<td style="width: 166.4px;">'.$row['pizza_name'].'</td>';
             echo  '<td style="width: 171.2px;">'.$row['pizza_price'].'</td>';
             echo '<td style="width: 171.2px;">';
              echo '<div id="actions">
                
              <form action="edit_course.php" method="post">
                    <input type="hidden" name="id" value='.$row['pizza_id'].'> 
                  <div  id="edit">
                  <button class="edit-btn" type="submit" name="edit">Edit</button>
                  </div>
              </form>
                  
                  <div  id="delete">
                  <form method="post">
                    <input type="hidden" name="id" value='.$row['pizza_id'].'> 
                    <button class="delete-btn" name="delete" type="submit">Delete</button>
                  </form>
                  </div>
                  
              </div>'; 
              echo '</td>';
          echo  '</tr>';
          } ?>
        </tbody>
        </table>
        <?php } else {
            echo "No results";}

            // Delete functionality of Delete button 

            if(isset($_REQUEST['delete'])) {
              $sql = "DELETE FROM pizzas WHERE pizza_id = {$_REQUEST['id']}";
              if($conn->query($sql) == TRUE ) {
                echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
              }
              else {
                echo "Unable to delete data ";
              }
            }




         ?>
          <div class="button add-pizzas">
            <a href="add-pizza.php">Add Pizzas</a>
          </div>
      </div>
    </div>
        </div>
      </div>
    </div>
  </section>
<?php include('../admin/admin-partials/footer.php') ?>
