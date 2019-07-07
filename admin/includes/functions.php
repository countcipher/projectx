<?php

//To get textual content from database for dynamic element
function dynamic_content($dynamic_element){
    
    global $connection;
    
    $query = "SELECT * FROM singular_content WHERE element = '$dynamic_element'";

    $result = mysqli_query($connection, $query);

    $text_content = mysqli_fetch_assoc($result);

    //return $text_content['text_content'];
    
    echo $text_content['text_content'];
    
}
/*To get section background image for actual site sections
Set in <style></style> section of page head
Ex. background: <?php get_section_image('classes_section'); ?>;*/
function get_section_image($site_section){
    
    global $connection;
    
    $query = "SELECT * FROM singular_content WHERE element = '$site_section'";
    
    $result = mysqli_query($connection, $query);
    
    $row = mysqli_fetch_assoc($result);
    
    $section_image = $row['background_image'];
    
    echo 'url("'.$section_image.'")';
    
}

//To display section background image for admin UI
function get_background_image_path($site_section){
    
    global $connection;
    
    $query = "SELECT * FROM singular_content WHERE element = '$site_section'";
    
    $result = mysqli_query($connection, $query);
    
    $row = mysqli_fetch_assoc($result);
    
    $section_image = $row['background_image'];
    
    echo '<img src="../'.$section_image.'">';    
    //echo $section_image;    
    
}

//To delete current background image
/*function delete_current_background_image($site_section){
    
    global $connection;
    
    $query = "SELECT * FROM content WHERE field = '$site_section'";
    
    $result = mysqli_query($connection, $query);
    
    $row = mysqli_fetch_assoc($result);
    
    unlink("../".$row['section_image']);
    
    
}*/


//To get field values for admin page update UI
function get_UI_value($dyanmic_element){
    
    global $connection;
    
    $query = "SELECT * FROM singular_content WHERE element = '$dyanmic_element'";
    
    $result = mysqli_query($connection, $query);
    
    $ui_values = mysqli_fetch_assoc($result);
    
    $ui_values = ($ui_values['text_content']);
    
    echo $ui_values;
    
}

//Update textual content through UI
function update_textual_content($dynamic_element, $content){
    
    global $connection;
    
    $query = "UPDATE singular_content SET text_content = '$content' WHERE element = '$dynamic_element'";
    
    mysqli_query($connection, $query);
    
}

//Select all table content for wihle loop
function select_all_table_content($table){
    
    global $connection;
    
    $query = "SELECT * FROM $table";
    $result = mysqli_query($connection, $query);
    
    return $result;
    
}

//To upload image to be used as section background
function set_section_background($input_name, $section_name){
        
        global $connection;
    
        if($_FILES[$input_name]['error'] == 0){
    
            $query = "SELECT * FROM singular_content WHERE element = '$section_name'";

            $result = mysqli_query($connection, $query);

            $row = mysqli_fetch_assoc($result);

            //unlink("../".$row['section_image']);
            
            $previous_image = "../".$row['background_image'];


            $uploaded_image_for_background = $_FILES[$input_name]['name'];
            $uploaded_image_for_background_temp = $_FILES[$input_name]['tmp_name'];
            
            $fileExtension = explode('.', $uploaded_image_for_background);
            $fileActualExtension = strtolower(end($fileExtension));
            
            $fileNameNew = uniqid('', 'true').".".$fileActualExtension;


            move_uploaded_file($uploaded_image_for_background_temp, '../images/'.$fileNameNew);

            $query = "UPDATE singular_content SET background_image = 'images/$fileNameNew' WHERE element = '$section_name'";

            $upload_image_query = mysqli_query($connection, $query);
            
            unlink($previous_image);
        }
           
}

//FOR GETTING RGBA VERSION OF COLOR SET IN DATABASE
function rgba_color() {
    
        global $connection;
    
        $query = "SELECT * FROM singular_content WHERE element = 'color'";

        $result = mysqli_query($connection, $query);

        $text_content = mysqli_fetch_assoc($result);

        //return $text_content['text_content'];

        $color =  $text_content['text_content'];
        
        $color = substr( $color, 1 );
        
        list( $r, $g, $b ) = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        //return array( 'red' => $r, 'green' => $g, 'blue' => $b );
    
        echo "rgba($r, $g, $b, 0.7)";
}

?>
                 