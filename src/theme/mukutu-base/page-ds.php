<?php
/**
 * Template Name: Design System
 *
 * Vitrine dos tokens e componentes do tema. Tudo aqui é lido do CSS real
 * (ver inc/tokens.php) ou renderizado com as classes do próprio tema — a
 * página não pode divergir do que o site usa.
 */

get_header();

$tokens = mukutu_tokens();
$escala = mukutu_escala_tipografica();

$secoes = array(
	'cores'       => 'Cores',
	'layout'      => 'Layout e motion',
	'tipografia'  => 'Tipografia',
	'botoes'      => 'Botões',
	'componentes' => 'Componentes',
);
?>

<div class="ds">

	<aside class="ds__sidebar">
		<a class="ds__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">Mukutu Base</a>
		<p class="ds__brand-sub">Design System · <?php echo esc_html( wp_get_theme()->get( 'Version' ) ); ?></p>

		<nav class="ds__nav" aria-label="Seções do design system">
			<?php foreach ( $secoes as $id => $label ) : ?>
				<a href="#<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></a>
			<?php endforeach; ?>
		</nav>
	</aside>

	<main class="ds__content">

		<section class="ds__section" id="cores">
			<p class="ds__title">Tokens</p>
			<h2 class="ds__heading">Cores</h2>
			<p class="ds__note">
				Lidas do bloco <code>:root</code> de <code>assets/styles.css</code> em tempo de
				render. Some do CSS, some daqui.
			</p>

			<div class="ds__grid">
				<?php
				foreach ( $tokens as $valores ) :
					foreach ( $valores as $nome => $valor ) :
						if ( ! mukutu_token_e_cor( $valor ) ) {
							continue;
						}
						?>
						<div class="ds-swatch">
							<div class="ds-swatch__chip" style="background: <?php echo esc_attr( $valor ); ?>"></div>
							<div class="ds-swatch__meta">
								<span class="ds-swatch__name"><?php echo esc_html( $nome ); ?></span>
								<span class="ds-swatch__value"><?php echo esc_html( $valor ); ?></span>
							</div>
						</div>
						<?php
					endforeach;
				endforeach;
				?>
			</div>
		</section>

		<section class="ds__section" id="layout">
			<p class="ds__title">Tokens</p>
			<h2 class="ds__heading">Layout e motion</h2>
			<p class="ds__note">
				Largura de conteúdo, respiro lateral e as curvas de easing. O respiro é
				fluido: acompanha a viewport entre os dois extremos do <code>clamp()</code>.
			</p>

			<div class="ds__grid">
				<?php
				foreach ( $tokens as $valores ) :
					foreach ( $valores as $nome => $valor ) :
						if ( mukutu_token_e_cor( $valor ) ) {
							continue;
						}
						?>
						<div class="ds-token">
							<span class="ds-token__name"><?php echo esc_html( $nome ); ?></span>
							<span class="ds-token__value"><?php echo esc_html( $valor ); ?></span>
						</div>
						<?php
					endforeach;
				endforeach;
				?>
			</div>
		</section>

		<section class="ds__section" id="tipografia">
			<p class="ds__title">Escala</p>
			<h2 class="ds__heading">Tipografia</h2>
			<p class="ds__note">
				DM Sans, uma família só. Cada degrau é uma regra <code>font-size: clamp()</code>
				que existe no CSS, com os seletores que a usam — não há escala inventada.
			</p>

			<?php foreach ( $escala as $valor => $seletores ) : ?>
				<div class="ds-type">
					<p class="ds-type__sample" style="font-size: <?php echo esc_attr( $valor ); ?>">
						Autonomia para estudar
					</p>
					<p class="ds-type__meta">
						<?php echo esc_html( $valor ); ?><br>
						<?php echo esc_html( implode( ', ', array_slice( $seletores, 0, 4 ) ) ); ?>
					</p>
				</div>
			<?php endforeach; ?>
		</section>

		<section class="ds__section" id="botoes">
			<p class="ds__title">Componentes</p>
			<h2 class="ds__heading">Botões</h2>
			<p class="ds__note">
				Tamanho (large, regular) × estilo (aqua, white, stroke, stroke-green).
				São as classes reais do tema: mexeu no CSS, mexeu aqui.
			</p>

			<div class="ds-demo">
				<span class="ds-demo__label">.button--large / .button--regular sobre fundo claro</span>
				<a class="button button--large button--aqua" href="#botoes">
					<span class="button__label">Conhecer Cursos EAD</span>
					<span class="icon-arrow" aria-hidden="true"></span>
				</a>
				<a class="button button--regular button--stroke-green" href="#botoes">
					<span class="button__label">Conheça Nossos Cursos</span>
					<span class="icon-arrow" aria-hidden="true"></span>
				</a>
			</div>

			<div class="ds-demo ds-demo--dark">
				<span class="ds-demo__label">.button--white / .button--stroke sobre fundo escuro</span>
				<a class="button button--large button--white" href="#botoes">
					<span class="button__label">Falar com Consultor</span>
					<span class="icon-arrow" aria-hidden="true"></span>
				</a>
				<a class="button button--regular button--stroke" href="#botoes">
					<span class="button__label">Conheça Nossa História</span>
					<span class="icon-arrow" aria-hidden="true"></span>
				</a>
			</div>
		</section>

		<section class="ds__section" id="componentes">
			<p class="ds__title">Inventário</p>
			<h2 class="ds__heading">Componentes</h2>
			<p class="ds__note">
				O que repete na home e de onde o conteúdo vem. Curso, depoimento e FAQ são
				post type — o ACF grátis não tem Repeater.
			</p>

			<div class="ds-list">
				<span>card-curso · post type <code>curso</code> · campos: tag, link, label_do_link</span>
				<span>depoimento-slide · post type <code>depoimento</code> · campos: curso, cargo</span>
				<span>card-faq · post type <code>faq</code> · título e conteúdo</span>
				<span>card-stat · fixo no template</span>
				<span>section-title · fixo no template, título vem de campo ACF</span>
				<span>button · classe utilitária, sem conteúdo próprio</span>
			</div>
		</section>

	</main>
</div>

<?php
get_footer();
