<?php

include "db.php";

if(isset($_POST['update_user_info_submit'])){
    
    $active_user_username = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['active_user_username']));
    $name = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['name']));
    $password = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['password']));
    $email = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['email']));
    
    
    $update_user_info_query = "UPDATE users SET name = '$name', password = '$password', email = '$email' WHERE username = '$active_user_username'";
    
    mysqli_query($connection, $update_user_info_query);
    
    $_SESSION['active_user_password'] = $password;
    $_SESSION['active_user_name'] = $name;
    $_SESSION['active_user_email'] = $email;

    
    header("Location: ../users.php#update-user-info");
    
}

?>