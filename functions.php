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

add_filter('wp_nav_menu_items', 'prefix_add_menu_item', 3, 2);
/**
 * Add Menu Item to a specific place in the menu
 */
function prefix_add_menu_item($items, $args)
{

	if (is_user_logged_in()) { //si utilisateur connecté
		if ($args->menu == 'header') { // si on est dans le menu header
			$items_array = array();
			$items_array = explode('<li', $items); //explose des li dans tableau

			array_splice($items_array, count($items_array) - 1, 0, '
				 id = "menu-item-78" class="menu-item menu-item-type-custom menu-item-object-custom parent hfe-creative-menu">
			<a href="http://planty.local/wp-admin" class="hfe-menu-item">Admin</a>
	    </li>
		'); //ajout li



			$items = implode('<li', $items_array); // implode des li
		}
	}

	return $items;
}





// <li id = "menu-item-78" class="menu-item menu-item-type-custom menu-item-object-custom parent hfe-creative-menu">
// <a href="http://planty.local/wp-admin" class="hfe-menu-item">Admin</a>
// </li>