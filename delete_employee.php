<?php
if (isset($_REQUEST['delete_id']) && $_REQUEST['page'] === 'list-users')
{
    global $wpdb;

    $id = $_REQUEST['delete_id'];

    $wpdb->query("DELETE FROM `wp_gkblabs_employees` WHERE `id` = '$id'");

    echo "<script>alert('record deleted successfully')</script>";

    // redirect the user to list page
    echo "<script>window.location.replace('?page=list-users')</script>";
}


?>