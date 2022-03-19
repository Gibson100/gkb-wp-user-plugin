<?php
if (isset($_REQUEST['delete_id']) && $_REQUEST['page'] === 'list-users')
{
    global $wpdb;

    $id = $_REQUEST['delete_id'];

    // get the abs path to the assets folder 
    $path = dirname(__FILE__);
    $abspath = $path . '\assets\\images\\';

    // get the image name from the database

    $data = $wpdb->get_results("SELECT Image FROM `wp_gkblabs_employees` WHERE `id` = '$id'");

    foreach($data as $result)
    {
        if ($result->Image !== 'no image.png')
        {
            unlink($abspath . "$result->Image");
        }
    }

    $wpdb->query("DELETE FROM `wp_gkblabs_employees` WHERE `id` = '$id'");

    echo "<script>alert('record deleted successfully')</script>";

    // redirect the user to list page
    echo "<script>window.location.replace('?page=list-users')</script>";
}


?>