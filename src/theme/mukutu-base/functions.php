<?php
/**
 * Mukutu Base — bootstrap do tema.
 *
 * O que é reusável em qualquer projeto Mukutu mora aqui e em inc/.
 * O que é específico da FIA mora nos templates e nos grupos ACF.
 */

define( 'MUKUTU_VERSION', '0.1.0' );
define( 'MUKUTU_DIR', get_stylesheet_directory() );
define( 'MUKUTU_URI', get_stylesheet_directory_uri() );

/** URL de um arquivo em assets/, versionada pelo mtime para o cache não mentir. */
function mukutu_asset( $path ) {
	$file = MUKUTU_DIR . '/assets/' . $path;
	$url  = MUKUTU_URI . '/assets/' . $path;

	return file_exists( $file ) ? $url . '?v=' . filemtime( $file ) : $url;
}

function mukutu_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'mukutu_setup' );

/**
 * Vendor continua vendorizado: Swiper, GSAP e ScrollTrigger saem do tema, não
 * de CDN. DM Sans é a única requisição externa, como no protótipo.
 */
function mukutu_assets() {
	wp_enqueue_style(
		'dm-sans',
		'https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700;9..40,900&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'swiper', mukutu_asset( 'vendor/swiper-bundle.min.css' ), array(), null );
	wp_enqueue_style( 'mukutu', mukutu_asset( 'styles.css' ), array( 'swiper' ), null );

	wp_enqueue_script( 'swiper', mukutu_asset( 'vendor/swiper-bundle.min.js' ), array(), null, true );
	wp_enqueue_script( 'gsap', mukutu_asset( 'vendor/gsap.min.js' ), array(), null, true );
	wp_enqueue_script( 'gsap-scrolltrigger', mukutu_asset( 'vendor/ScrollTrigger.min.js' ), array( 'gsap' ), null, true );
	wp_enqueue_script( 'mukutu', mukutu_asset( 'script.js' ), array( 'swiper', 'gsap-scrolltrigger' ), null, true );
}
add_action( 'wp_enqueue_scripts', 'mukutu_assets' );

/**
 * Local JSON: o ACF grava cada field group em acf-json/ e lê de lá.
 * É isso que faz a definição de campo virar diff no git.
 */
function mukutu_acf_json_save( $path ) {
	return MUKUTU_DIR . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'mukutu_acf_json_save' );

function mukutu_acf_json_load( $paths ) {
	unset( $paths[0] );
	$paths[] = MUKUTU_DIR . '/acf-json';

	return $paths;
}
add_filter( 'acf/settings/load_json', 'mukutu_acf_json_load' );

/** Campo do ACF com fallback: sem ACF ativo o template ainda renderiza. */
function mukutu_field( $name, $fallback = '', $post_id = false ) {
	if ( ! function_exists( 'get_field' ) ) {
		return $fallback;
	}

	$value = get_field( $name, $post_id );

	return ( '' === $value || null === $value || false === $value ) ? $fallback : $value;
}

/**
 * A home não tem conteúdo de bloco: ela é inteira campo ACF. O editor de blocos
 * esconde as metaboxes numa gaveta recolhida, então ali ele atrapalha.
 */
function mukutu_classic_editor_on_front_page( $use_block_editor, $post ) {
	return ( 'page' === $post->post_type && (int) get_option( 'page_on_front' ) === $post->ID )
		? false
		: $use_block_editor;
}
add_filter( 'use_block_editor_for_post', 'mukutu_classic_editor_on_front_page', 10, 2 );

require_once MUKUTU_DIR . '/inc/post-types.php';
