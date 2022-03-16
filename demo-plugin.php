<?php
/**
 * @package demo-plugin
 */
/*
Plugin Name: CRUD Operations
Plugin URI: https://gkblabs.com/
Description: A simple plugin that allows you to manage employees
Version: 1.0.0
Author: gkblabs
Author URI: https://gkblabs.com/
*/

defined('ABSPATH') or die('page not available');

require_once "inc/gkblabs_wp_demo_plugin_activate.php";
register_activation_hook( __FILE__, 'wp_gkblabs_activate' );
require_once "inc/gkblabs_wp_demo_plugin_deactivate.php";
register_deactivation_hook( __FILE__, 'wp_gkblabs_deactivate' );
include 'styles.php'; 


// add icon to the admin menu
function add_employees_admin_menu()
{
  add_menu_page( 'Employees', 'gtblabs employees', 'manage_options', 'employees-management-menu', 'gkblabs_employees_main_menu', 'dashicons-buddicons-buddypress-logo', 2 );
}

add_action( 'admin_menu', 'add_employees_admin_menu' );

// content when the icon is clicked

function gkblabs_employees_main_menu()
{
  require_once "add_employee.php";
}


