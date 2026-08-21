<?php
/**
 * Fallback exigido pelo WordPress. A home é front-page.php; qualquer outra
 * rota cai aqui e imprime o conteúdo cru, porque este tema ainda não desenha
 * página interna.
 */

get_header();
?>

<main class="container">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class(); ?>>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</article>
		<?php
	endwhile;
	?>
</main>

<?php
get_footer();
