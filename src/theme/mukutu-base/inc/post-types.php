<?php
/**
 * Repetição sem Repeater.
 *
 * O ACF free não traz repeater, flexible_content, gallery nem clone — medido
 * na task 001. Cada bloco que repete vira um post type de verdade, percorrido
 * com WP_Query, o que também dá URL própria a curso e depoimento.
 */

function mukutu_register_post_types() {
	$types = array(
		'curso'      => array( 'Cursos', 'Curso', 'dashicons-welcome-learn-more' ),
		'depoimento' => array( 'Depoimentos', 'Depoimento', 'dashicons-format-quote' ),
		'faq'        => array( 'FAQ', 'Pergunta', 'dashicons-editor-help' ),
	);

	foreach ( $types as $slug => $labels ) {
		list( $plural, $singular, $icon ) = $labels;

		register_post_type(
			$slug,
			array(
				'labels'       => array(
					'name'          => $plural,
					'singular_name' => $singular,
					'add_new_item'  => 'Adicionar ' . $singular,
					'edit_item'     => 'Editar ' . $singular,
				),
				'public'       => true,
				'has_archive'  => false,
				'menu_icon'    => $icon,
				'supports'     => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
				'show_in_rest' => true,
			)
		);
	}
}
add_action( 'init', 'mukutu_register_post_types' );

/** Posts de um tipo, na ordem do menu_order, todos. */
function mukutu_query( $type ) {
	return new WP_Query(
		array(
			'post_type'      => $type,
			'posts_per_page' => -1,
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
		)
	);
}
