<?php
    
    $active_user_username = $_SESSION['active_user_username'];

    $update_form_query = "SELECT * FROM users WHERE username = '$active_user_username'";
    $result = mysqli_query($connection, $update_form_query);
    $row = mysqli_fetch_assoc($result);


?>
    

  <div id="nav" class="container-fluid">
     
         <div class="user">
             Hello, <?php echo $row['name']; ?>
         </div>
      
          <div id="hamburger">
              <div class="hamburger-bar"></div>
              <div class="hamburger-bar"></div>
              <div class="hamburger-bar"></div>
          </div>
      
       <ul id="menu">
           <li class="menu_link"><a href="pages.php">Pages</a></li>
           <li class="menu_link"><a href="users.php">Users</a></li>
           <!--<li><a href="#">Profile</a></li>-->
           <li class="menu_link"><a href="index.php">Sign Out</a></li>
       </ul>
   </div>