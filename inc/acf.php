<?php
/**
 * acf.php – ACF options page and admin tweaks
 */
defined( 'ABSPATH' ) || exit;

function bonsai_acf_op_init() {
	if ( function_exists( 'acf_add_options_page' ) ) {

		// Main Site Settings Page
		acf_add_options_page( [
			'page_title' => 'Site Settings : General content used throughout the theme',
			'menu_title' => 'Site Settings',
			'menu_slug'  => 'theme-general-settings',
			'capability' => 'edit_theme_options',
			'redirect'   => false,
		] );

		// Separate Page for Text Files (e.g. humans.txt)
		acf_add_options_page( [
			'page_title' => 'Humans.txt Editor',
			'menu_title' => 'Humans.txt',
			'menu_slug'  => 'site-text-files',
			'capability' => 'manage_options',
			'redirect'   => false,
		] );

	}
}
add_action( 'acf/init', 'bonsai_acf_op_init' );


// Save humans.txt content from ACF field
function bonsai_write_humans_txt_on_save( $post_id ) {
	// Only trigger on Options page
	if ( 'options' !== $post_id ) return;

	// Get content from ACF textarea field (field name: 'humans_txt_content')
	$content = get_field( 'humans_txt_content', 'option', false );

	// Sanitise and write to /humans.txt if the field exists
	if ( false !== $content ) {
		$file_path = ABSPATH . 'humans.txt';
		file_put_contents( $file_path, wp_strip_all_tags( sanitize_textarea_field( $content ) ) );
	}
}
add_action( 'acf/save_post', 'bonsai_write_humans_txt_on_save', 20 );


// Hide escaped HTML admin notice
add_filter( 'acf/admin/prevent_escaped_html_notice', '__return_true' );
