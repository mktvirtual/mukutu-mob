<?php
/**
 * Os dados que as ilhas React recebem.
 *
 * O PHP continua dono do conteúdo: consulta o post type, resolve imagem e
 * campo ACF, e entrega JSON. O React não fala com o WordPress.
 */

function mukutu_dados_cursos() {
	$itens = array();
	$q     = mukutu_query( 'curso' );

	while ( $q->have_posts() ) {
		$q->the_post();

		$itens[] = array(
			'id'     => get_the_ID(),
			'titulo' => get_the_title(),
			'tag'    => mukutu_field( 'tag' ),
			'link'   => mukutu_field( 'link', '#footer' ),
			'label'  => mukutu_field( 'label_do_link', 'Matricule-se' ),
			'imagem' => get_the_post_thumbnail_url( null, 'large' ),
		);
	}

	wp_reset_postdata();

	return $itens;
}

function mukutu_dados_depoimentos() {
	$itens = array();
	$q     = mukutu_query( 'depoimento' );

	while ( $q->have_posts() ) {
		$q->the_post();
		$avatar = get_the_post_thumbnail_url( null, 'medium' );

		$itens[] = array(
			'id'      => get_the_ID(),
			'nome'    => get_the_title(),
			'curso'   => mukutu_field( 'curso' ),
			'cargo'   => mukutu_field( 'cargo' ),
			'citacao' => wp_strip_all_tags( get_the_content() ),
			'avatar'  => $avatar ? $avatar : mukutu_asset( 'img/aluno-avatar.png' ),
		);
	}

	wp_reset_postdata();

	return $itens;
}

function mukutu_dados_faq() {
	$itens = array();
	$q     = mukutu_query( 'faq' );

	while ( $q->have_posts() ) {
		$q->the_post();

		$itens[] = array(
			'id'       => get_the_ID(),
			'pergunta' => get_the_title(),
			'resposta' => wp_strip_all_tags( get_the_content() ),
		);
	}

	wp_reset_postdata();

	return $itens;
}
