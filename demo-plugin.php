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

include "inc/gkblabs_wp_demo_plugin_activate.php";
register_activation_hook( __FILE__, 'wp_gkblabs_activate' );


include "inc/gkblabs_wp_demo_plugin_deactivate.php";
register_deactivation_hook( __FILE__, 'wp_gkblabs_deactivate' );
include 'styles.php'; 


// add icon to the admin menu
function add_employees_admin_menu()
{


  add_menu_page('demo-plugin', 'demo-plugin', 'manage_options', 'gkblabs-create-user','gkblabs_employees_main_menu');
  add_submenu_page( 'gkblabs-create-user', 'Create User', 'Create User',
      'manage_options', 'gkblabs-create-user','gkblabs_employees_main_menu');
  add_submenu_page( 'gkblabs-create-user', 'Import Users', 'Import Users',
      'manage_options', 'import-users', 'wp_gkblabs_import_users');
  add_submenu_page( 'gkblabs-create-user', 'List Users', 'List users',
  'manage_options', 'list-users', 'wp_gkblabs_list_users');
}

add_action( 'admin_menu', 'add_employees_admin_menu' );

// content when the icon is clicked

function gkblabs_employees_main_menu()
{
  require_once "add_employee.php";
}

function wp_gkblabs_import_users()
{
  require_once('import_users.php');
}

function wp_gkblabs_list_users()
{
  require_once "list_employees.php";
}


