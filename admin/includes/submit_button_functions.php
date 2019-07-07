<?php
//UPDATE HERO SECTION
//===========================================================>
if(isset($_POST['hero_update'])){
    
    $company_name_text = mysqli_real_escape_string($connection, $_POST['company_name']);
    $hero_section_text = mysqli_real_escape_string($connection,$_POST['hero_section_text']);
    $hero_section_subheading = mysqli_real_escape_string($connection,$_POST['hero_section_subheading']);
    //$hero_button_text = htmlspecialchars(mysqli_real_escape_string($connection,$_POST['hero_button_text']));
    
    $color = $_POST['color'];
    
    update_textual_content('color', $color);
    update_textual_content('company_name',$company_name_text);
    update_textual_content('hero_section',$hero_section_text);
    update_textual_content('hero_subheading',$hero_section_subheading);
    //update_textual_content('hero_button',$hero_button_text);
    
    
    set_section_background('hero_background_image', 'hero_section');
    
        
    
    header("Location: pages.php#hero_section");
    

    
}

//UPDATE ABOUT SECTION
//===========================================================>
if(isset($_POST['about_update'])){
    
   
    $about_heading_text = mysqli_real_escape_string($connection,$_POST['about_heading_text']);
    $about_text_text = mysqli_real_escape_string($connection,$_POST['about_text']);
    
    update_textual_content('about_heading',$about_heading_text);
    update_textual_content('about_text',$about_text_text);
        
    
    header("Location: pages.php#about_section");
    

    
}

//ADD ABOUT POST TYPE
//============================================================>
if(isset($_POST['about_post_type_update']) && !empty($_POST['about_post_type_heading']) && !empty($_POST['about_post_type_text']) && $_FILES['about_post_type_featured_image']['error'] == 0){
    
    $about_post_type_heading = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['about_post_type_heading']));
    $about_post_type_text = mysqli_real_escape_string($connection, $_POST['about_post_type_text']);
    
    $about_post_type_featured_img = $_FILES['about_post_type_featured_image']['name'];
    $about_post_type_featured_img_temp = $_FILES['about_post_type_featured_image']['tmp_name'];
    $about_post_type_featured_img_type = $_FILES['about_post_type_featured_image']['type'];
        
    $fileExtension = explode('.', $about_post_type_featured_img);
    $fileActualExtension = strtolower(end($fileExtension));
        
    $allowedExtensions = array('jpg', 'jpeg', 'png');
        
    if(in_array($fileActualExtension, $allowedExtensions)){
        
        $fileNameNew = uniqid('', 'true').".".$fileActualExtension;
        $fileDestination = '../images/'.$fileNameNew;
        
        move_uploaded_file($about_post_type_featured_img_temp, $fileDestination);
        
    }else{
        
        header("Location: pages.php");
        die();
        
    }
    
    $add_about_post_type_query = "INSERT INTO about_post_types (featured_image, heading, text) ";
    $add_about_post_type_query.= "VALUES ('images/{$fileNameNew}', '$about_post_type_heading', '$about_post_type_text')";
    
    mysqli_query($connection, $add_about_post_type_query);
    
    header("Location: pages.php#about_section");
    
}

//ADD TEAM MEMBER POST TYPE
//============================================================>
if(isset($_POST['add_team_member']) && !empty($_POST['team_member_name']) && !empty($_POST['team_member_title']) && $_FILES['team_member_photo']['error'] == 0){
    
    $team_member_name = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['team_member_name']));
    $team_member_title = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['team_member_title']));

    
    $team_member_photo = $_FILES['team_member_photo']['name'];
    $team_member_photo_temp = $_FILES['team_member_photo']['tmp_name'];
    $team_member_photo_type = $_FILES['team_member_photo']['type'];
        
    $fileExtension = explode('.', $team_member_photo);
    $fileActualExtension = strtolower(end($fileExtension));
        
    $allowedExtensions = array('jpg', 'jpeg', 'png');
        
    if(in_array($fileActualExtension, $allowedExtensions)){
        
        $fileNameNew = uniqid('', 'true').".".$fileActualExtension;
        $fileDestination = '../images/'.$fileNameNew;
        
        move_uploaded_file($team_member_photo_temp, $fileDestination);
        
    }else{
        
        header("Location: pages.php#team_members_table");
        die();
        
    }
    
    $add_team_post_types_query = "INSERT INTO team_post_types (name, photo, title) ";
    $add_team_post_types_query.= "VALUES ('$team_member_name', 'images/{$fileNameNew}', '$team_member_title')";
    
    mysqli_query($connection, $add_team_post_types_query);
    
    header("Location: pages.php#team_members_table");
    
}

//UPDATE TEAM SECTION
//===========================================================>
if(isset($_POST['team_section_update'])){
    
   
    $team_section_header = mysqli_real_escape_string($connection,$_POST['team_section_header']);
    $team_section_description = mysqli_real_escape_string($connection,$_POST['team_section_description']);
    
    update_textual_content('team_section_header',$team_section_header);
    update_textual_content('team_section_description',$team_section_description);
        
    
    header("Location: pages.php#team_section");
    

    
}

//ADD PORTFOLIO POST TYPE
//============================================================>
if(isset($_POST['add_to_portfolio']) && !empty($_POST['portfolio_header']) && !empty($_POST['portfolio_text']) && $_FILES['portfolio_featured_image']['error'] == 0){
    
    $portfolio_header = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['portfolio_header']));
    $portfolio_text = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['portfolio_text']));
    
    $portfolio_featured_image = $_FILES['portfolio_featured_image']['name'];
    $portfolio_featured_image_temp = $_FILES['portfolio_featured_image']['tmp_name'];
    $portfolio_featured_image_type = $_FILES['portfolio_featured_image']['type'];
        
    $fileExtension = explode('.', $portfolio_featured_image);
    $fileActualExtension = strtolower(end($fileExtension));
        
    $allowedExtensions = array('jpg', 'jpeg', 'png');
        
    if(in_array($fileActualExtension, $allowedExtensions)){
        
        $fileNameNew = uniqid('', 'true').".".$fileActualExtension;
        $fileDestination = '../images/'.$fileNameNew;
        
        move_uploaded_file($portfolio_featured_image_temp, $fileDestination);
        
    }else{
        
        header("Location: pages.php#portfolio_section");
        die();
        
    }
    
    $add_portfolio_post_type_query = "INSERT INTO portfolio_post_type (header, text, featured_image) ";
    $add_portfolio_post_type_query.= "VALUES ('$portfolio_header', '$portfolio_text', 'images/{$fileNameNew}')";
    
    mysqli_query($connection, $add_portfolio_post_type_query);
    
    header("Location: pages.php#portfolio_section");
    
}

//UPDATE CONTACT SECTION
//===========================================================>
if(isset($_POST['contact_update'])){
    
    $contact_section_header = mysqli_real_escape_string($connection, $_POST['contact_section_header']);
    $contact_section_text = mysqli_real_escape_string($connection,$_POST['contact_section_text']);
    
    update_textual_content('contact_section',$contact_section_header);
    update_textual_content('contact_text',$contact_section_text);
    
    
    set_section_background('contact_background_image', 'contact_section');
    
        
    
    header("Location: pages.php#contact_section");
    

    
}

?>
