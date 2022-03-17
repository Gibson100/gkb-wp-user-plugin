<?php
/**
 * @package demo-plugin
 */

function wp_gkblabs_activate()
{
  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();
  $table_name = $wpdb->prefix . 'gkblabs_employees';
  $sql = "CREATE TABLE `$table_name` (
  `id` int(11) auto_increment,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(200) DEFAULT '1',
  `Hobbies` varchar(200) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Image` varchar(255) DEFAULT 'no image.png',
  PRIMARY KEY(id)
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
  ";
  if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }
}







