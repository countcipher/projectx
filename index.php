<?php include "admin/includes/db.php"; ?>
<?php include "admin/includes/functions.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evolution Template</title>
    
<!--THIRD PARTY CDN LINKS
========================================-->
<!--JQUERY CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  
<!--GOOGLE FONTS-->
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans&display=swap" rel="stylesheet">
   
<!--STYLESHEETS
=======================================-->
<link rel="stylesheet" href="css/style.css">
   
<style>
    
    #dimensions{
        position: fixed;
        background: rgba(0,0,0,.7);
        color: #fff;
        z-index: 9999;
        top: 50px;
    }
    
    section#hero{
        background: <?php get_section_image('hero_section'); ?>;
        background-position: left bottom;
        background-size: cover;
    }
    section#contact{
        background: <?php get_section_image('contact_section'); ?>;
        background-position: left bottom;
        background-size: cover;
    }
    section#contact .col-sm-12{
        background: <?php rgba_color(); ?>
    }
    h1, h2{
       
        color: <?php dynamic_content('color'); ?>;
    }
    section#team .panelx img{
        border: 3px solid <?php dynamic_content('color'); ?>;
    }
    .navbar{
        background: <?php dynamic_content('color'); ?>;
    }

</style>
    
</head>
<body onresize="getDimensions()">
   <!--FOR GETTING WINDOW DIMENSIONS
========================================================================-->
   <!--<div id="dimensions">
       <p id="width">Width: </p>
       <p id="height">Height: </p>
    </div>-->
    
    <div class="nav-container">
        <nav class="navbar navbar-default">

              <a class="navbar-brand" href="#"><?php dynamic_content('company_name'); ?></a>

  
        </nav>
    </div>
    <!--END OF NAVIGATION
===========================================-->

<!--BEGINNING OF CONTENT
===========================================-->
    <div class="container-fluid">
        
    
<!--HERO SECTION
===========================================-->
        <section id="hero">
            <div class="col-sm-12">
               
                <h1><?php dynamic_content('hero_section'); ?></h1>

                <h2><?php dynamic_content('hero_subheading'); ?></h2>

                <!--<button><?php dynamic_content('hero_button'); ?></button>-->

            </div>
        </section>
        
<!--ABOUT SECTION
===========================================-->
        <section id="about">
            <div class="container-fluid">
                
            
                 <div>  
                    <div class="col-sm-6">
                        <h1 class="header"><?php dynamic_content('about_heading'); ?></h1>
                    </div>

                    <div class="col-sm-6 text">
                        <?php dynamic_content('about_text'); ?>

                    </div>
                </div>
            
                <div class="col-md-12 panelx-container">

                    <?php $result = select_all_table_content('about_post_types'); ?>

                    <?php while($row = mysqli_fetch_assoc($result)) : ?>

                        <div class="panelx">
                            <img class="featured_image" src="<?php echo $row['featured_image']; ?>" alt="">
                            <h2><?php echo $row['heading']; ?></h2>
                            <p><?php echo $row['text']; ?></p>
                        </div>

                    <?php endwhile; ?>

                </div>
            </div>
            
        </section>
        
<!--TEAM SECTION
===========================================-->
       <section id="team">
           <div class="container-fluid">
               <h1 class="section_header"><?php dynamic_content('team_section_header'); ?></h1>
               
               <div class="col-md-6 col-md-offset-3 section_description">
                   <?php dynamic_content('team_section_description'); ?>
               </div>
               
               <div class="col-md-12 panelx-container">

                    <?php $result = select_all_table_content('team_post_types'); ?>

                    <?php while($row = mysqli_fetch_assoc($result)) : ?>

                        <div class="panelx">
                            <img class="featured_image" src="<?php echo $row['photo']; ?>" alt="">
                            <h2><?php echo $row['name']; ?></h2>
                            <p><?php echo $row['title']; ?></p>
                        </div>

                    <?php endwhile; ?>

                </div>
               
           </div>
       </section>
       
       
<!--PORTFOLIO SECTION
===========================================-->
   
       <section id="portfolio">
              
              
              <?php $result = select_all_table_content('portfolio_post_type'); ?>
              
              <?php while($row = mysqli_fetch_assoc($result)) : ?>
              
                  <div class="wrapper">
               
                    <div class="text">

                       <h1><?php echo $row['header']; ?></h1>

                        <?php echo $row['text']; ?>
                    </div>

                    <div class="image">
                        <img id="portfolio_image0" src="<?php echo $row['featured_image']; ?>" alt="">
                    </div>
                
              </div>
              
              <?php endwhile; ?>

       </section>
    
    </div><!--END OF CONTENT CONTAINER
===========================================-->

<!--CONTACT SECTION
===========================================-->

    <section id="contact">
        <div class="col-sm-12">
            <h1><?php dynamic_content('contact_section'); ?></h1>
            
            <span><?php dynamic_content('contact_text'); ?></span>
            
        </div>
    </section>

<!--BOOTSTRAP JAVASCRIPT
==========================================-->
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
</script>

    
</body>
</html>