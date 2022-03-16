<?php
/**
 * @package demo-plugin
 */


function wp_gkblabs_activate()
{
    flush_rewrite_rules();

    global $wpdb;

    $wpdb->query("
    CREATE TABLE if not exists `wp_employees_gkblabs` (
        `ID` int(11) NOT NULL,
        `FirstName` varchar(255) NOT NULL,
        `LastName` varchar(255) NOT NULL,
        `Email` varchar(255) NOT NULL,
        `Hobies` int(255) NOT NULL,
        `Gender` varchar(10) NOT NULL,
        `Picture` varchar(255) NOT NULL
        ) 
");
}





