<?php
/**
 * Abertura do documento. Sem conteúdo de página: o <head> é do WordPress
 * (wp_head), o resto é dos templates.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/svg+xml" href="<?php echo esc_url( mukutu_asset( 'icons/logo-vertical.svg' ) ); ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<?php wp_head(); ?>

	<!-- Marca que o JS está ativo antes da primeira pintura: as animações de
	     entrada só existem sob .js, então sem script nada fica invisível. -->
	<script>document.documentElement.classList.add("js");</script>
</head>
<body <?php body_class(); ?>>
