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

 wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' );
    