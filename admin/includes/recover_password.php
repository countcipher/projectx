<?php

include "db.php";

if(isset($_POST['recover_password_submit'])){
    
    if(empty($_POST['username']) || $_POST['username'] == ""){
        
        header("Location: ../password_recover.php");
        die();
        
    }
    
    $username = $_POST['username'];
    
    $query = "SELECT * FROM users WHERE username = '$username'";
    
    $result = mysqli_query($connection, $query);
    
    $row = mysqli_fetch_assoc($result);
    
    mail("{$row['email']}", "Evolution Password Recover", "{$row['password']}");
    
/*    mail("teller1128@yahoo.com", "Weddings With Terry Appointment Request",


    "FROM: $firstname
    EMAIL: $email
    PHONE: $phone",

    "From: Weddings With Terry");*/
}

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
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/index.css">
    
    <!--Jquery Link-->
    <script src="js/jquery.js"></script>

    
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <img src="../images/MEDIUM_JPEG72.jpg" alt="">
            
            <div class="col-xs-12">
               <p>Your password has been sent to your listed email address</p>
            </div>
            
        </div>
    </div>
   
   
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>