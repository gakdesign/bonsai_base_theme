<?php
/**
 * helpers.php – Helper functions
 *
 * @package Bonsai_Base_Theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Get a trimmed, safe excerpt.
 *
 * @param int $word_limit Number of words.
 * @return string Escaped excerpt.
 */
function bonsai_get_trimmed_excerpt( $word_limit = 30 ) {
	$excerpt = get_the_excerpt();

	if ( empty( $excerpt ) ) {
		return '';
	}

	$excerpt = wp_strip_all_tags( $excerpt, true );
	$words   = preg_split( '/\s+/', $excerpt );

	if ( count( $words ) > $word_limit ) {
		$words = array_slice( $words, 0, $word_limit );
		$excerpt = implode( ' ', $words ) . '&hellip;';
	}

	return esc_html( $excerpt );
}

/**
 * Get a trimmed, safe version of the content.
 *
 * @param int $word_limit Number of words.
 * @return string Escaped content.
 */
function bonsai_get_trimmed_content( $word_limit = 40 ) {
	$content = get_the_content( '' );

	if ( empty( $content ) ) {
		return '';
	}

	$content = wp_strip_all_tags( $content, true );
	$words   = preg_split( '/\s+/', $content );

	if ( count( $words ) > $word_limit ) {
		$words   = array_slice( $words, 0, $word_limit );
		$content = implode( ' ', $words ) . '&hellip;';
	}

	return esc_html( $content );
}
