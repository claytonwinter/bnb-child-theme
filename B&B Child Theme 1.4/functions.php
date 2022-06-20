<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );


add_filter('wpbs_export_calendar_include_icalendar_events', function(){
    return true;
});

add_action('init', function() {
	add_role('booking', 'Booking Admin');
		$tech = get_role('booking');
		$tech -> add_cap('read');
});

add_filter('wpbs_submenu_page_capability_addons', 'wpbs_change_capability');
add_filter('wpbs_submenu_page_capability_forms', 'wpbs_change_capability');
add_filter('wpbs_submenu_page_capability_bookings', 'wpbs_change_capability');
add_filter('wpbs_submenu_page_capability_discounts', 'wpbs_change_capability');
add_filter('wpbs_submenu_page_capability_coupons', 'wpbs_change_capability');
add_filter('wpbs_submenu_page_capability_reporting', 'wpbs_change_capability');
add_filter('wpbs_submenu_page_capability_settings', 'wpbs_change_capability');
add_filter('wpbs_submenu_page_capability_backup', 'wpbs_change_capability');
add_filter('wpbs_submenu_page_capability_calendars', 'wpbs_change_capability');
function wpbs_change_capability()
{
    return 'edit_posts';
}