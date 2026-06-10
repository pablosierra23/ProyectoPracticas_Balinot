<?php
/**
 * Theme assets functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function prueba_theme_enqueue_scripts() {
	// Google Fonts
	wp_enqueue_style( 'prueba-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@600;700&family=Inter:wght@400;500;600&display=swap', array(), null );
	wp_enqueue_style( 'prueba-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap', array(), null );

	// Tailwind CDN
	wp_enqueue_script( 'tailwind-cdn', 'https://cdn.tailwindcss.com?plugins=forms,container-queries', array(), null, false );

	// Theme Styles
	wp_enqueue_style( 'prueba-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'prueba-main-style', get_theme_file_uri( 'assets/css/styles.css' ), array(), filemtime( get_theme_file_path( 'assets/css/styles.css' ) ) );

	// Theme Scripts
	wp_enqueue_script( 'tailwind-config', get_theme_file_uri( 'assets/js/tailwind-config.js' ), array( 'tailwind-cdn' ), filemtime( get_theme_file_path( 'assets/js/tailwind-config.js' ) ), false );
	wp_enqueue_script( 'prueba-main-script', get_theme_file_uri( 'assets/js/main.js' ), array(), filemtime( get_theme_file_path( 'assets/js/main.js' ) ), true );
}
add_action( 'wp_enqueue_scripts', 'prueba_theme_enqueue_scripts' );

/**
 * Add type="module" to main script
 */
function prueba_theme_add_type_attribute( $tag, $handle, $src ) {
	if ( 'prueba-main-script' !== $handle ) {
		return $tag;
	}
	return '<script type="module" src="' . esc_url( $src ) . '"></script>' . "\n";
}
add_filter( 'script_loader_tag', 'prueba_theme_add_type_attribute', 10, 3 );
