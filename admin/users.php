<?php session_start(); ?>

<?php

if($_SESSION['active'] != 1){
    
    session_destroy();
    header("Location: index.php?login_error");
    die();
    
    
}

?>

<?php include "includes/db.php"; ?>



<?php

//FOR DELETING A USER
//*****************************************************************************
//*****************************************************************************
include "includes/delete_user.php";

//FOR ADDING A USER
//******************************************************************************
//******************************************************************************
include "includes/add_user.php";

//FOR UPDATING USER INFO
//******************************************************************************
//******************************************************************************
include "includes/update_user_info.php";

//$active_user_username = $_SESSION['active_user_username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Evolution</title>
    
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!--STYLESHEETS-->
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/admin.css">
    
    <!--FAVICON-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon"/>
    
    <!--Jquery Link-->
    <script src="js/jquery.js"></script>

    <style>
        #dimensions{
            position: fixed;
            background: rgba(0,0,0,.7);
            color: #fff;
            z-index: 999;
        }
    </style>
    
    <script>
    
    $(document).ready(function(){
        var menu_link = document.getElementsByClassName("menu_link");
        menu_link[1].classList.add("active");
        
    });
        
    </script>
    
</head>
<body>
   
   <!--FOR GETTING WINDOW DIMENSIONS START
=================================================-->
    <!--<div id="dimensions">
       <p id="width">Width: </p>
       <p id="height">Height: </p>
    </div>-->
    
   <!--FOR GETTING WINDOW DIMENSIONS END
=================================================-->

   <!--NAVIGATION
=================================================-->
   
   <?php include "includes/navigation.php"; ?>

   
   <div id="content" class="container-fluid">
       <div class="row">
           <div class="col-md-12">
               <div class="logo">
                   <img src="images/MEDIUM_JPEG72.jpg" alt="">
               </div>
               
<!--TABLE FOR SHOWING USERS AND FORM FOR DELETING USERS
================================================================-->
               
       <?php if($_SESSION['active_user_role'] > 1) : ?>               
               <section>
                <h1>Users</h1>
                <hr>
                
                

                <form action="includes/delete_user.php" method="post">
                   <div class="table-wrapper">
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            
                            $query = "SELECT * FROM users ORDER BY id DESC";
                            $result = mysqli_query($connection, $query);
                            
                            ?>
                            
                            <?php while($row = mysqli_fetch_assoc($result)) : ?>
                            
                            <tr>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php
                                    if($row['role'] == 1){
                                        
                                        echo "Editor"; 
                                        
                                    }elseif($row['role'] == 2){
                                        
                                        echo "Admin";
                                        
                                    }elseif($row['role'] == 3){
                                        
                                        echo "Superuser";
                                        
                                    }
                                    
                                    
                                    
                                    ?></td>
                                <td><input type="checkbox" name="users_to_delete[]" value="<?php echo $row['id']; ?>"></td>
                            </tr>
                            
                            <?php endwhile; ?>
                            
                            
                            
                        </tbody>
                    </table>
                    </div>
                    <div class="form-group">
                       <input name="delete_users_submit" type="submit" class="btn" value="Delete Selected">
                   </div>
                    
                   </form>
               </section>
               
<!--FORM FOR ADDING A NEW USER
================================================================================-->
               <section>
                   <form action="includes/add_user.php" method="post">
                       <h1 id="add-user-header">Add User</h1>
                       
                       <?php if(isset($_GET['all-fields-required'])) : ?>
                       
                       <span class="error">All Fields Required</span>
                       
                       <?php endif; ?>
                       
                       <?php if(isset($_GET['username-exists'])) : ?>
                       
                       <span class="error">Username Exists</span>
                       
                       <?php endif; ?>
                       
                       <hr>
                       
                       <div class="form-group">
                           <label for="title">Username</label>
                           <input 
                           <?php if(isset($_GET['username'])){
                                
                            ?>
                            value="<?php echo $_GET['username']; ?>"
                            <?php                
    
                            } ?>
                            name="username" type="text" class="form-control">                             
                       </div>
                       
                       <div class="form-group">
                           <label for="title">Name</label>
                           <input
                           
                            <?php if(isset($_GET['username-exists'])) : ?>
                            
                            value="<?php echo $_GET['name'];  ?>"
                            
                            <?php endif; ?>
                            
                              name="name" type="text" class="form-control">                             
                       </div>
                       
                       <div class="form-group">
                           <label for="title">Password</label>
                           <input name="password" type="password" class="form-control">                             
                       </div>
                       
                       <!--<div class="form-group">
                           <div id="password_show_button" class="btn btn-danger">Show Password</div>
                           
                           <span id="password_characters"></span>
                           
                       </div>-->
                       
                       <div class="form-group">
                           <label for="title">Email</label>
                           <input
                           
                            <?php if(isset($_GET['username-exists'])) : ?>
                            
                            value="<?php echo $_GET['email']; ?>"
                            
                            <?php endif; ?>
                             
                               name="email" type="email" class="form-control">
                       </div>
                       
                       <div class="form-group">
                           <label for="title">Role</label>
                           <br>
                           <input checked type="radio" name="role" value="1">Editor                        
                           <input type="radio" name="role" value="2">Admin                        
                           <!--<input type="radio" name="role" value="3">Super User   -->                   
                       </div>
                       
                       <div class="form-group">
                           <input name="add_user_submit" type="submit" class="btn" value="Add User">
                       </div>
                       
                   </form>
               </section>
<?php endif; ?>
<!--FORM FOR UPDATING USER INFO
============================================================================-->
              
               <?php
               
               $active_user_name = $_SESSION['active_user_username'];
               
               $update_form_query = "SELECT * FROM users WHERE username = '{$active_user_name}'";
               $result = mysqli_query($connection, $update_form_query);
               $row = mysqli_fetch_assoc($result);
               
               ?>
                 
               <section id="update-user-info">
                   <form action="includes/update_user_info.php" method="post">
                       <h1><?php echo $row['name']; ?></h1>
                       <hr>
                       
                       <input type="hidden" name="active_user_username" value="<?php echo $_SESSION['active_user_username']; ?>">
                       
                       <div class="form-group">
                           <label for="title">Name</label>
                           <input name="name" value="<?php echo $row['name']; ?>" type="text" class="form-control">                             
                       </div>
                       
                       <div class="form-group">
                           <label for="title">Password</label>
                           <input id="password" name="password" value="<?php echo  $row['password']; ?>" type="password" class="form-control">     
                                                 
                       </div>
                       
                       <!--<div class="form-group">
                           <div id="show_password_button" class="btn">Show Password</div>
                       </div>-->
                       
                       
                       <div class="form-group">
                           <label for="title">Email</label>
                           <input name="email" value="<?php echo  $row['email']; ?>" type="email" class="form-control">                   
                       </div>
                       
                       <div class="form-group">
                           <input name="update_user_info_submit" type="submit" class="btn" value="Update">
                       </div>
                       
                   </form>
               </section>
               
           </div>
       </div>
   </div>
   
   
   
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <script>
    //for getting dimensions***********************************************
    function getDimensions(){
        var width = document.getElementById("width");
        var height = document.getElementById("height");
        var w = window.innerWidth;
        var h = window.innerHeight;

        width.innerHTML = "Width: " + w + "px";
        height.innerHTML = "Height: " + h + "px";
    };
    //end of getting dimensions********************************************

    var hamburger = document.getElementById("hamburger");
    var hamburger_io = 0;
    var menu = document.getElementById("menu");
        
    hamburger.onclick = function(){
      
        if(hamburger_io == 0){
            $("#menu").slideDown();
            hamburger_io = 1;
        }else{
            $("#menu").slideUp();
            hamburger_io = 0;
        }
        
    };
        
    //SHOW PASSWORD*******************************************************
    var password_show_button = document.getElementById("password_show_button");
        
    
    function menu_restore(){
      
        if(window.innerWidth >= 706){
            menu.style.display = "block";
            hamburger_io = 0;
        }else{
            menu.style.display = "none";
            hamburger_io = 0;
        }
        
    }; 
        
        
    </script>
    
</body>
</html>