<?php 

session_start();
session_destroy();

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
    <link rel="stylesheet" href="css/index.css">
    
    <!--Jquery Link-->
    <script src="js/jquery.js"></script>

    
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <img src="images/MEDIUM_JPEG72.jpg" alt="">
            
            <?php if(isset($_GET['login_error'])) : ?>
            
            <span class="error">Enter Username &amp Password</span>
            
            <?php endif; ?>
            
            <?php if(isset($_GET['username_not_found'])) : ?>
            
            <span class="error">Username Not Found</span>
            
            <?php endif; ?>
            
            <?php if(isset($_GET['password_incorrect'])) : ?>
            
            <span class="error">Password Incorrect</span>
            
            <?php endif; ?>
            
            <div class="col-xs-12">
                <form action="pages.php" method="post">
                    <div class="form-group">
                        <input
                        
                         <?php if(isset($_GET['username'])) : ?>
                         
                         value="<?php echo $_GET['username']; ?>"
                         
                         <?php endif; ?>
                          
                            name="sign_in_username" class="form-control" type="text" placeholder="Username">
                    </div>
                    
                    <div class="form-group">
                        <input name="sign_in_password" type="password" class="form-control" placeholder="Password">
                    </div>
                    
                    <input name="sign_in_submit" type="submit" class="btn" value="Sign In">
                    
                    <a href="password_recover.php">Forgot Password?</a>
                    
                </form>
            </div>
            
        </div>
    </div>
   
   
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>