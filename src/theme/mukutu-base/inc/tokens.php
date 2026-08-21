<?php
/**
 * Os tokens são lidos do próprio styles.css em tempo de render.
 *
 * Uma página de Design System que repete os valores à mão vira a segunda
 * verdade: o CSS muda, a página continua bonita e errada. Aqui ela não tem
 * como mentir — se a variável sumiu do CSS, some da página.
 */

/** Todas as custom properties declaradas no :root, na ordem do arquivo. */
function mukutu_tokens() {
	static $tokens = null;

	if ( null !== $tokens ) {
		return $tokens;
	}

	$tokens = array();
	$css    = @file_get_contents( MUKUTU_DIR . '/assets/styles.css' );

	if ( ! $css || ! preg_match( '/:root\s*\{(.*?)\}/s', $css, $bloco ) ) {
		return $tokens;
	}

	$grupo = 'Outros';

	foreach ( explode( "\n", $bloco[1] ) as $linha ) {
		if ( preg_match( '~/\*\s*([^*]+?)\s*(?:—|\*/)~u', $linha, $c ) ) {
			$grupo = trim( $c[1] );
		}

		if ( preg_match( '/(--[a-z0-9-]+)\s*:\s*([^;]+);/i', $linha, $m ) ) {
			$tokens[ $grupo ][ $m[1] ] = trim( $m[2] );
		}
	}

	return $tokens;
}

/** Um token é cor quando o valor abre em # ou em uma função de cor. */
function mukutu_token_e_cor( $valor ) {
	return (bool) preg_match( '/^(#|rgb|hsl|oklch)/i', trim( $valor ) );
}

/**
 * Escala tipográfica: cada regra font-size com clamp() no CSS, com os
 * seletores que a usam. Ordena pelo teto do clamp, do maior para o menor.
 */
function mukutu_escala_tipografica() {
	$css = @file_get_contents( MUKUTU_DIR . '/assets/styles.css' );

	if ( ! $css ) {
		return array();
	}

	preg_match_all( '/([^{}]+)\{([^{}]*font-size:\s*clamp\(([^;]+)\);[^{}]*)\}/i', $css, $regras, PREG_SET_ORDER );

	$escala = array();

	foreach ( $regras as $regra ) {
		$valor = 'clamp(' . trim( $regra[3] ) . ')';

		if ( isset( $escala[ $valor ] ) ) {
			$escala[ $valor ][] = trim( $regra[1] );
			continue;
		}

		$escala[ $valor ] = array( trim( $regra[1] ) );
	}

	uksort(
		$escala,
		function ( $a, $b ) {
			$teto = function ( $v ) {
				preg_match( '/,\s*([0-9.]+)px\s*\)$/', $v, $m );
				return isset( $m[1] ) ? (float) $m[1] : 0;
			};
			return $teto( $b ) <=> $teto( $a );
		}
	);

	return $escala;
}
