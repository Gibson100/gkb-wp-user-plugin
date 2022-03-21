<?php

// function wpbootstrap_enqueue_styles() {
// wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' );
// }

// function wpbootstrap_enqueue_scripts()
// {
//     wp_enqueue_script( 'bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' );
// }

// add_action('wp_enqueue_scripts', 'wpbootstrap_enqueue_styles');
// add_action('wp_enqueue_scripts', 'wpbootstrap_enqueue_scripts');

/**
 * Proper way to enqueue scripts and styles.
 */

 wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');

 wp_enqueue_style( 'j-query-datatable', 'https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css' );

 wp_enqueue_script( 'j-query', 'https://code.jquery.com/jquery-3.6.0.min.js' );

 wp_enqueue_script( 'j-query-validator', 'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js' );

 wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' );

 wp_enqueue_script( 'j-query-datatable-js', 'https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js' );



    