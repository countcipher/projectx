<?php session_start(); ?>


<?php include "includes/db.php"; ?>

<?php

if(isset($_POST['sign_in_submit'])){
    
    $sign_in_username = mysqli_real_escape_string($connection, $_POST['sign_in_username']);
    $sign_in_password = mysqli_real_escape_string($connection, $_POST['sign_in_password']);
    
    
    if($sign_in_username == "" || empty($sign_in_username) || $sign_in_password == "" || empty($sign_in_password)){
        
        session_destroy();
        header("Location: index.php?login_error");
        die();
        
    }
    
    $sign_in_credentials_query = "SELECT * FROM users WHERE username = BINARY '$sign_in_username'";
    $result = mysqli_query($connection, $sign_in_credentials_query);
    $row = mysqli_fetch_assoc($result);
    
    if(empty($row['username'])){
        
        session_destroy();
        header("Location: index.php?username_not_found");
        die();
        
    }
    
    if($sign_in_password != $row['password']){
        
        session_destroy();
        header("Location: index.php?password_incorrect&username=".$sign_in_username);
        die();
        
    }
    
    $_SESSION['active_user_username'] = $sign_in_username;
    $_SESSION['active_user_password'] = $sign_in_password;
    $_SESSION['active_user_name'] = $row['name'];
    $_SESSION['active_user_email'] = $row['email'];
    $_SESSION['active_user_role'] = $row['role'];
    $_SESSION['active'] = 1;
    

    
    
}//END OF isset($_POST['sign_in_submit'])

if($_SESSION['active'] != 1){

    session_destroy();
    header("Location: index.php");
    die();

}

include "includes/functions.php";

//END OF EVOLUTION CORE CODE
//===========================================================>

//ALL SUBMIT-BUTTON FUNCTIONS
//===========================================================>
include "includes/submit_button_functions.php";

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
        menu_link[0].classList.add("active");
        
    });
        
    </script>
    
    <script src="ckeditor/ckeditor.js"></script>
    
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
               
<!--HERO SECTION
=================================================-->               
               <section id="hero_section">
                   <div>
                     
                      <h1 id="hero_section_toggler" class="section_toggler">Hero Section</h1>
                      <hr>
                      <div id="hero_toggle_div" class="toggle_div">
                           <form action="" method="post" enctype="multipart/form-data">

                             <div class="form-group">
                                 <label for="color">Color</label>
                                 <input name="color" type="color" value="<?php get_UI_value('color'); ?>">
                             </div>

                              <div class="form-group">
                                  <label for="company_name">Company Name</label>
                                  <input type="text" name="company_name" class="form-control" value="<?php get_UI_value('company_name'); ?>">
                              </div>

                               <div class="form-group">
                                   <label for="title">Hero Heading</label>


                                   <textarea name="hero_section_text" id="" cols="30" rows="10"><?php get_UI_value('hero_section'); ?></textarea>

                                    <script>

                                        CKEDITOR.replace('hero_section_text');

                                    </script>

                               </div>


                               <div class="form-group">
                                   <label for="title">Hero Subheading</label>


                                   <textarea name="hero_section_subheading" id="" cols="30" rows="10"><?php get_UI_value('hero_subheading'); ?></textarea>

                                    <script>

                                        CKEDITOR.replace('hero_section_subheading');

                                    </script>

                               </div>

                               <!--<div class="form-group">
                                   <label for="title">Hero Button Text</label>
                                   <input value="<?php echo get_UI_value('hero_button'); ?>" name="hero_button_text" type="text" class="form-control">                             
                               </div>-->

                               <div class="form-group">
                                   <label for="hero_background_image">Background Image</label>
                                   <?php get_background_image_path('hero_section'); ?>
                                   <input name="hero_background_image" type="file">                             
                               </div> 


                              <div class="form-group">
                                   <input name="hero_update" type="submit" class="btn" value="Update">                            
                               </div>

                           </form>
                       </div>
                   </div>
               </section>
               
<!--ABOUT SECTION
=======================================================-->

            <section id="about_section">
                <div>
                      <h1 id="about_section_toggler" class="section_toggler">About Section</h1>
                      <hr>
                      <div id="about_toggle_div" class="toggle_div">
                           <form action="" method="post" enctype="multipart/form-data">
                               <div class="form-group">
                                   <label for="about_heading_text">About Section Heading</label>


                                   <textarea name="about_heading_text" id="" cols="30" rows="10"><?php get_UI_value('about_heading'); ?></textarea>

                                    <script>

                                        CKEDITOR.replace('about_heading_text');

                                    </script>

                               </div>

                               <div class="form-group">
                                   <label for="about_text">About Section Text</label>


                                   <textarea name="about_text" id="" cols="30" rows="10"><?php get_UI_value('about_text'); ?></textarea>

                                    <script>

                                        CKEDITOR.replace('about_text');

                                    </script>

                               </div>

                               <div class="form-group">
                                   <input name="about_update" type="submit" class="btn" value="Update">                            
                               </div>

                            </form>
                        
                        <hr>
                           <div class="table-div">
                               <table class="table table-responsive table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>Featured Image</th>
                                          <th>Heading</th>
                                          <th>Text</th>
                                          <th>Delete</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $result = select_all_table_content('about_post_types'); ?>

                                      <?php while($row = mysqli_fetch_assoc($result)) : ?>

                                        <tr>
                                            <td><img src="../<?php echo $row['featured_image']; ?>" alt=""></td>
                                            <td><?php echo $row['heading']; ?></td>
                                            <td><?php echo $row['text']; ?></td>
                                            <td><a href="delete_post_type.php?id=<?php echo $row['id']; ?>&table=about_post_types&section=about_section"><button class="btn">Delete</button></a></td>
                                        </tr>

                                      <?php endwhile; ?>                              
                                  </tbody>
                              </table>
                          </div>
                          
                          <form action="" method="post" enctype="multipart/form-data">
                          
                              <div class="form-group">
                                   <label for="about_post_type_featured_image">Featured Image</label>
                                   <input name="about_post_type_featured_image" type="file">                             
                               </div>
                          
                              <div class="form-group">
                                   <label for="about_post_type_heading">Heading</label>
                                   <input name="about_post_type_heading" type="text" class="form-control">                             
                               </div>

                               
                               <div class="form-group">
                               <label for="about_post_type_text">About Section Post Text</label>
                               
                               
                               <textarea name="about_post_type_text" id="" cols="30" rows="10"></textarea>
                               
                                <script>

                                    CKEDITOR.replace('about_post_type_text');

                                </script>
                                                            
                           </div>

                              <div class="form-group">
                                   <input name="about_post_type_update" type="submit" class="btn" value="Add Post Type">                            
                              </div>
                           
                        </form>  
                    </div>
                    
                   </div>
            </section>
            
<!--TEAM SECTION
=======================================================-->               
               <section id="team_section">
                   <div>
                      <h1 id="team_section_toggler" class="section_toggler">Team Section</h1>
                      <hr>
                      <div id="team_toggle_div" class="toggle_div">
                          <form action="" method="post">
                              <div class="form-group">
                                  <label for="team_section_header">Team Section Header</label>
                                  <input type="text" name="team_section_header" class="form-control" value="<?php get_UI_value('team_section_header'); ?>">
                              </div>

                               <div class="form-group">
                                   <label for="title">Hero Heading</label>


                                   <textarea name="team_section_description" id="" cols="30" rows="10"><?php get_UI_value('team_section_description'); ?></textarea>

                                    <script>

                                        CKEDITOR.replace('team_section_description');

                                    </script>

                               </div>

                               <div class="form-group">
                                       <input name="team_section_update" type="submit" class="btn" value="Update">                            
                                  </div>

                          </form>

                          <hr>
                            
                          <div class="table-div">
                              <table id="team_members_table" class="table table-responsive table-bordered table-striped">
                                      <thead>
                                          <tr>
                                              <th>Team Member Photo</th>
                                              <th>Name</th>
                                              <th>Title</th>
                                              <th>Delete</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php $result = select_all_table_content('team_post_types'); ?>

                                          <?php while($row = mysqli_fetch_assoc($result)) : ?>

                                            <tr>
                                                <td><img src="../<?php echo $row['photo']; ?>" alt=""></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><a href="delete_post_type.php?id=<?php echo $row['id']; ?>&table=team_post_types&section=team_section"><button class="btn">Delete</button></a></td>
                                            </tr>

                                          <?php endwhile; ?>                              
                                      </tbody>
                                  </table>
                          </div>
                           <form action="" method="post" enctype="multipart/form-data">

                              <div class="form-group">
                                   <label for="team_member_photo">Team Member Photo</label>
                                   <input name="team_member_photo" type="file">                             
                               </div>

                               <div class="form-group">
                                   <label for="team_member_name">Name</label>
                                   <input type="text" name="team_member_name" class="form-control">                             
                               </div>

                               <div class="form-group">
                                   <label for="team_member_title">Title</label>
                                   <input name="team_member_title" type="text" class="form-control">                             
                               </div>


                              <div class="form-group">
                                   <input type="submit" class="btn" value="Add Team Member" name="add_team_member">   
                               </div>

                           </form>
                       </div>
                   </div>
               </section>
               
<!--PORTFOLIO SECTION
=======================================================-->               
               <section id="portfolio_section">
                   <div>
                      <h1 id="portfolio_section_toggler" class="section_toggler">Portfolio Section</h1>
                      <hr>
                      <div id="portfolio_toggle_div" class="toggle_div">
                         <div class="table-div">
                          <table class="table table-responsive table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>Featured Image</th>
                                          <th>Header</th>
                                          <th>Text</th>
                                          <th>Delete</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $result = select_all_table_content('portfolio_post_type'); ?>

                                      <?php while($row = mysqli_fetch_assoc($result)) : ?>

                                        <tr>
                                            <td><img src="../<?php echo $row['featured_image']; ?>" alt=""></td>
                                            <td><?php echo $row['header']; ?></td>
                                            <td><?php echo $row['text']; ?></td>
                                            <td><a href="delete_post_type.php?id=<?php echo $row['id']; ?>&table=portfolio_post_type&section=ortfolio_section"><button class="btn">Delete</button></a></td>
                                        </tr>

                                      <?php endwhile; ?>                              
                                  </tbody>
                              </table>
                          </div>
                           <form action="" method="post" enctype="multipart/form-data">

                              <div class="form-group">
                                   <label for="portfolio_featured_image">Portfolio Featured Image</label>
                                   <input name="portfolio_featured_image" type="file">                             
                               </div>

                               <div class="form-group">
                                   <label for="portfolio_header">Header</label>
                                   <input type="text" name="portfolio_header" class="form-control">                             
                               </div>

                               <div class="form-group">
                                   <label for="portfolio_text">Text</label>
                                   <input name="portfolio_text" type="text" class="form-control">                             
                               </div>


                              <div class="form-group">
                                   <input type="submit" class="btn" value="Add To Portfolio" name="add_to_portfolio">   
                               </div>

                           </form>
                       </div>
                   </div>
               </section>
               
<!--CONTACT SECTION
=================================================-->               
               <section id="contact_section">
                   <div>
                     
                      <h1 id="contact_section_toggler" class="section_toggler">Contact Section</h1>
                      <hr>
                      <div id="contact_toggle_div" class="toggle_div">
                           <form action="" method="post" enctype="multipart/form-data">

                              <div class="form-group">
                                  <label for="company_name">Contact Section Header</label>
                                  <input type="text" name="contact_section_header" class="form-control" value="<?php get_UI_value('contact_section'); ?>">
                              </div>

                               <div class="form-group">
                                   <label for="contact_section_text">Contact Text</label>


                                   <textarea name="contact_section_text" id="" cols="30" rows="10"><?php get_UI_value('contact_text'); ?></textarea>

                                    <script>

                                        CKEDITOR.replace('contact_section_text');

                                    </script>

                               </div>

                               <div class="form-group">
                                   <label for="contact_background_image">Background Image</label>
                                   <?php get_background_image_path('contact_section'); ?>
                                   <input name="contact_background_image" type="file">                             
                               </div> 


                              <div class="form-group">
                                   <input name="contact_update" type="submit" class="btn" value="Update">                            
                               </div>

                           </form>
                       </div>
                   </div>
               </section>


<!--SECTION TEMPLATE
=======================================================-->               
<!--               <section>
                   <div>
                      <h1>Header</h1>
                      <hr>
                       <form action="" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                               <label for="title">Title</label>
                               <input type="text" class="form-control">                             
                           </div>
                           
                           <div class="form-group">
                               <label for="title">Hero Text</label>
                               <input type="text" class="form-control">                             
                           </div>
                           
                           <div class="form-group">
                               <label for="title">Hero Image</label>
                               <input type="file">                             
                           </div>
                           
                           <div class="form-group">
                               <label for="title">Background Image</label>
                               <?php //get_background_image_path('join_text'); ?>
                               <input name="background_image" type="file">                             
                           </div>                           
                           
                          <div class="form-group">
                               <input type="submit" class="btn" value="Update">   
                           </div>
                           
                       </form>
                   </div>
               </section>-->
               
           </div>
       </div>
   </div>
   
   
   
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    
    <script>
    //for getting dimensions***********************************************
    /*function getDimensions(){
        var width = document.getElementById("width");
        var height = document.getElementById("height");
        var w = window.innerWidth;
        var h = window.innerHeight;

        width.innerHTML = "Width: " + w + "px";
        height.innerHTML = "Height: " + h + "px";
    };*/
    //end of getting dimensions********************************************
        
    /**********************************
    Make hamburger open and close menu
    ***********************************/
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
        
   /********************************
   Make nav menu visible beyond 705px
   ********************************/ 
    function menu_restore(){
      
        if(window.innerWidth >= 706){
            menu.style.display = "block";
            hamburger_io = 0;
        }else{
            menu.style.display = "none";
            hamburger_io = 0;
        }
        
    };
        
    /*******************************
    TOGGLE SECTIONS SECTION
    ********************************/
    $("#hero_section_toggler").click(function(){
        
       $("#hero_toggle_div").toggle("fast", "linear");
        
    });
        
    $("#about_section_toggler").click(function(){

        $("#about_toggle_div").toggle("fast", "linear");
        
    });
        
    $("#team_section_toggler").click(function(){

        $("#team_toggle_div").toggle("fast", "linear");
        
    });

    $("#portfolio_section_toggler").click(function(){

        $("#portfolio_toggle_div").toggle("fast", "linear");
        
    });
        
    $("#contact_section_toggler").click(function(){

        $("#contact_toggle_div").toggle("fast", "linear");
        
    });
    
    </script>
    
</body>
</html>