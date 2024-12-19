<?php
// 
function enqueue_scripts()
{
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', ['parent-style']);
  wp_enqueue_script(
    'script', // Handle name
    get_stylesheet_directory_uri() . '/script.js', // File path
    ['jquery'], // Dependencies (e.g., jQuery)
    true // Load in footer
  );
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

// Include the custom PHP file
require_once get_stylesheet_directory() . '/client_leads.php';