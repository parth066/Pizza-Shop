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
          $sql = "SELECT * FROM users";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
        ?>
        <table tyle="height: 47px;" width="471">
        <tbody>
            <tr>
              <td style="width: 166.4px;">User ID</td>
              <td style="width: 166.4px;">Customer Name</td>
            </tr>
            <tr>
            <?php  while($row = $result->fetch_assoc()) { 
              echo '<td style="width: 166.4px;">'.$row['id'].'</td>';
              echo '<td style="width: 166.4px;">'.$row['username'].'</td>';
            
              echo '</td>';
          echo  '</tr>';
          } ?>
        </tbody>
        </table>
        <?php } else {
            echo "No results";}

         ?>
          
      </div>
    </div>
        </div>
      </div>
    </div>
  </section>
<?php include('../admin/admin-partials/footer.php') ?>
