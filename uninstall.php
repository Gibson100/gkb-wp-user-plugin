<?php

/**
 * Trigger this on plugin unistall
 * 
 * @package demo-plugin
 */

 if (!defined('WP_UNINSTALL_PLUGIN'))
 {
    die;
 }

 // Access the database
 global $wpdb;

 $wpdb->query( "DROP TABLE IF EXISTS wp_employees_gkblabs" );
