<?php

/*
    Plugin Name: Admin toolbar and menu simplification
    Plugin URI: http://f11.cz
    Description: Remove the fly-out and menus that distract user experience
    Version: 2.0.4
    Author: Jan Ptacek
    Author URI: http://www.f11.cz
    License: GPLv2 or later
*/

function my_theme_customize_admin_bar() {
	remove_action( 'admin_bar_menu', 'wp_admin_bar_wp_menu', 10 );
	remove_action( 'admin_bar_menu', 'wp_admin_bar_my_account_menu', 0 );
	remove_action( 'admin_bar_menu', 'wp_admin_bar_new_content_menu', 70 );
	// view-site menu: TODO - may be needed for multisites
	add_action('admin_bar_menu', function ($wp_admin_bar) {
		$wp_admin_bar->remove_menu( 'view-site' );
	}, 999);
}
function my_theme_customize_admin_menu() {
	// no dashboard submenu
	remove_submenu_page('index.php', 'update-core.php');
}

add_filter('show_admin_bar', '__return_false');
add_filter('add_admin_bar_menus', 'my_theme_customize_admin_bar');
add_filter('_admin_menu', 'my_theme_customize_admin_menu');
