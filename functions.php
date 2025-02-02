<?php

/**
 * Theme functions and definitions
 *
 * @package HelloElementor
 */

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_styles()
{

	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('child-styles', get_stylesheet_uri());
}
