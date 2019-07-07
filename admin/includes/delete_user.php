<?php

include "db.php";

if(isset($_POST['delete_users_submit']) && !empty($_POST['users_to_delete'])){
    
    $users_to_delete = $_POST['users_to_delete'];
    
    foreach($users_to_delete as $user_to_delete){
        
        $query = "DELETE FROM users WHERE id = '$user_to_delete'";
        
        mysqli_query($connection, $query);
        
        header("Location: ../users.php");
        
    }
    
}

?>