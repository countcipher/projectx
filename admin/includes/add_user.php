<?php

include "db.php";

if(isset($_POST['add_user_submit'])){
   
    //All fields entered validation
    //********************************
    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['role'])){
        
        $username = htmlspecialchars(mysqli_real_escape_string($connection,$_POST['username']));
        $name = htmlspecialchars(mysqli_real_escape_string($connection,$_POST['name']));
        $password = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['password']));
        $email = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['email']));
        $role = $_POST['role'];
        
        $query = "SELECT * FROM users WHERE username = BINARY '$username'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        
        if($row['username'] == $username){
            
            //header("Location: ../users.php?username-exists#add-user-header");
            header("Location: ../users.php?username-exists&username=".stripslashes($username)."&name=".stripslashes($name)."&email=".$email."#add-user-header");
            die(); 
            
        }

        $query = "INSERT INTO users (username, password, name, email, role) VALUES ('$username', '$password', '$name', '$email', $role)";
        
        mysqli_query($connection, $query);
        header("Location:../users.php");
        
        
        
        

        
    }else{
        
        $error = "All Fields Required";
        
        header("Location: ../users.php?all-fields-required#add-user-header");
        die();        
    }
    

    
    
    
}

?>