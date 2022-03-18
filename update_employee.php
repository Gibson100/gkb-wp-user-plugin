<?php

// update the records
if ($_REQUEST['page'] === 'list-users' && !empty($_REQUEST['fname']) && !empty($_REQUEST['lname']) && !empty($_REQUEST['email']) && !empty($_REQUEST['gender']))
{

    if (empty($_REQUEST['hobbies']))
    {
        echo "<script>alert('atleast 1 hobbie should be selected')</script>";
        return; 
    }

    $id = htmlentities($_REQUEST['emp_id']);
    $fname = htmlentities($_REQUEST['fname']);
    $lname = htmlentities($_REQUEST['lname']);
    $email = htmlentities($_REQUEST['email']);
    $gender = htmlentities($_REQUEST['gender']);
    $hobbies = implode(',',$_REQUEST['hobbies']); //convert array into string 

    global $wpdb;

    $redirect_url = plugin_dir_url(__FILE__) . '/list_employees.php';

    // check if user has sent an image
    if (($_FILES['profile']['name'] === ''))  
    {
        $wpdb->query("UPDATE `wp_gkblabs_employees` SET `FirstName` = '$fname', `LastName` = '$lname', `Email` = '$email', `Hobbies` = '$hobbies', `Gender` = '$gender' WHERE `id` = '$id'");
    }
    else
    {
        //handle image 
        // If request contains a file ...
        
        $filename = $_FILES["profile"]["name"];
        $tempname = $_FILES["profile"]["tmp_name"]; 
        
        $path = plugin_dir_path(__FILE__);

        $folder = $path.'assets/images/'.$filename;

        //die($folder);

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            // Execute query to update
            $wpdb->query("UPDATE `wp_gkblabs_employees` SET `FirstName` = '$fname', `LastName` = '$lname', `Email` = '$email', `Hobbies` = '$hobbies', `Gender` = '$gender', `Image` = '$filename' WHERE `id` = '$id'");
        }
        else
        {
           echo "<script>alert('Failed to upload image, try again!')</script>";
        }

    }

    echo "<script>alert('Successfully added user')</script>";

    // redirect the user to list page
    echo "<script>window.location.replace('?page=list-users')</script>";
    
}
?>
