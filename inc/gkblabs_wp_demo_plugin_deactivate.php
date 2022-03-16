<?php
/**
 * @package demo-plugin
 */

function wp_gkblabs_deactivate()
{
    flush_rewrite_rules();
}
    

