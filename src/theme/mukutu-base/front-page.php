<?php
/**
 * Home da FIA. A ordem das seções é a do protótipo; o que repete vem de post
 * type (ver inc/post-types.php), o que é texto único vem de campo ACF.
 */

get_header();
?>

  <!-- ==========================================================
       HERO (com NAV sobreposto) — ocupa 100% da viewport
       ========================================================== -->
  <section class="hero" id="hero">
    <img class="hero__bg" src="<?php echo esc_url( mukutu_asset( 'img/hero-bg.png' ) ); ?>" alt="">
    <div class="hero__scrim" aria-hidden="true"></div>
    <img class="hero__dots" src="<?php echo esc_url( mukutu_asset( 'icons/dots-hero.svg' ) ); ?>" alt="" aria-hidden="true">

    <!-- nav: rola junto com a página, não é fixo -->
    <nav class="nav" aria-label="Navegação principal">
      <a class="nav__logo" href="#hero" aria-label="FIA Digital — início">
        <img src="<?php echo esc_url( mukutu_asset( 'icons/logo-vertical.svg' ) ); ?>" alt="FIA Digital">
      </a>

      <button class="nav__toggle" type="button" id="nav-toggle"
              aria-expanded="false" aria-controls="nav-menu" aria-label="Abrir menu">
        <span class="nav__toggle-barra" aria-hidden="true"></span>
        <span class="nav__toggle-barra" aria-hidden="true"></span>
        <span class="nav__toggle-barra" aria-hidden="true"></span>
      </button>

      <div class="nav__menu" id="nav-menu">
        <ul class="nav__links">
          <li><a class="nav-link" href="#sobre">Quem Somos</a></li>
          <li><a class="nav-link" href="#cursos">Cursos</a></li>
        </ul>

        <a class="nav__cta" href="#footer">
          <span>Entre em Contato</span>
          <span class="icon-arrow" aria-hidden="true"></span>
        </a>
      </div>
    </nav>

    <div class="hero__inner container">
      <h1 class="hero__title"><?php echo esc_html( mukutu_field( 'hero_titulo', 'Autonomia para estudar. Profundidade para liderar transformações.' ) ); ?></h1>

      <div class="hero__lead">
        <p class="hero__lead-title"><?php echo esc_html( mukutu_field( 'hero_lead_titulo', 'A flexibilidade do digital com o rigor acadêmico da FIA' ) ); ?></p>
        <p class="hero__lead-text">Desenvolva repertório técnico e pensamento crítico no seu ritmo para liderar as transformações do mercado.</p>
      </div>

      <div class="hero__actions">
        <a class="button button--large button--aqua" href="#cursos">
          <span class="button__label">Conhecer Cursos EAD</span>
          <span class="icon-arrow" aria-hidden="true"></span>
        </a>
        <a class="button button--large button--stroke" href="#footer">
          <span class="icon-whatsapp" aria-hidden="true"></span>
          <span class="button__label">Falar com Consultor</span>
          <span class="icon-arrow" aria-hidden="true"></span>
        </a>
      </div>
    </div>
  </section>

    <!-- ==========================================================
         SOBRE
         ========================================================== -->
  <main>

    <section class="sobre" id="sobre">
      <img class="sobre__dots" src="<?php echo esc_url( mukutu_asset( 'icons/dots-sobre.svg' ) ); ?>" alt="" aria-hidden="true">

      <div class="sobre__inner container">
        <h2 class="sobre__heading" data-reveal><?php echo esc_html( mukutu_field( 'sobre_heading', 'A credibilidade que o mercado exige, com a flexibilidade que a sua rotina precisa.' ) ); ?></h2>

        <div class="sobre__text" data-reveal>
          <p>A <strong>FIA Digital</strong> integra a estrutura e o legado de excelência da <strong>FIA Business School</strong> com total autonomia acadêmica.</p>
          <p>Aqui, você domina as reais demandas de liderança do futuro como ESG, Inteligência Artificial e Cibersegurança, com total controle sobre o seu tempo.</p>
        </div>

        <div class="sobre__stats" data-reveal>
          <article class="card-stat">
            <img class="card-stat__icon" src="<?php echo esc_url( mukutu_asset( 'icons/ico-check.svg' ) ); ?>" alt="" aria-hidden="true">
            <div class="card-stat__content">
              <p class="card-stat__numero">+46 anos</p>
              <p class="card-stat__desc">Dedicados à educação executiva, consultoria e excelência acadêmica.</p>
            </div>
          </article>

          <article class="card-stat">
            <img class="card-stat__icon" src="<?php echo esc_url( mukutu_asset( 'icons/ico-check.svg' ) ); ?>" alt="" aria-hidden="true">
            <div class="card-stat__content">
              <p class="card-stat__numero">+150 mil</p>
              <p class="card-stat__desc">Líderes e executivos formados e preparados para os desafios do mercado.</p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- ==========================================================
         CTAs
         ========================================================== -->
    <section class="ctas">
      <div class="ctas__inner container">
        <div class="ctas__media" id="ctas-media">
          <img class="ctas__img" src="<?php echo esc_url( mukutu_asset( 'img/ctas-bg.png' ) ); ?>" alt="Alunos da FIA Digital em atividade colaborativa">
          <img class="ctas__line" src="<?php echo esc_url( mukutu_asset( 'icons/line-pattern-wide.svg' ) ); ?>" alt="" aria-hidden="true">
        </div>

        <div class="ctas__actions" data-reveal>
          <a class="button button--regular button--white" href="#sobre">
            <span class="button__label">Conheça Nossa História</span>
            <span class="icon-arrow" aria-hidden="true"></span>
          </a>
          <a class="button button--regular button--aqua" href="#cursos">
            <span class="button__label">Conheça Nossos Cursos</span>
            <span class="icon-arrow" aria-hidden="true"></span>
          </a>
        </div>
      </div>
    </section>

    <!-- ==========================================================
         CURSOS
         ========================================================== -->
    <section class="cursos" id="cursos">
      <div class="container">
        <header class="cursos__header" data-reveal>
          <div class="section-title">
            <p class="section-title__span">Cursos</p>
            <h2 class="section-title__titulo"><?php echo esc_html( mukutu_field( 'faq_titulo', '<?php echo esc_html( mukutu_field( \'cursos_titulo\', \'Programas desenhados para o seu próximo passo profissional\' ) ); ?>' ) ); ?></h2>
          </div>
          <p class="cursos__subtitulo"><?php echo esc_html( mukutu_field( 'cursos_subtitulo', 'Escolha a modalidade que se adapta ao seu momento de carreira.' ) ); ?></p>
        </header>

        <div class="cursos__grid">
<?php
$cursos = mukutu_query( 'curso' );
while ( $cursos->have_posts() ) :
	$cursos->the_post();
	?>
          <article class="card-curso" data-reveal>
            <div class="card-curso__media">
              <img src="<?php echo esc_url( get_the_post_thumbnail_url( null, 'full' ) ); ?>" alt="">
            </div>
            <div class="card-curso__content">
              <div class="card-curso__top">
                <p class="card-curso__tag"><?php echo esc_html( mukutu_field( 'tag' ) ); ?></p>
                <h3 class="card-curso__titulo"><?php the_title(); ?></h3>
              </div>
              <a class="card-curso__link" href="<?php echo esc_url( mukutu_field( 'link', '#footer' ) ); ?>">
                <span><?php echo esc_html( mukutu_field( 'label_do_link', 'Matricule-se' ) ); ?></span>
                <span class="icon-arrow-diagonal" aria-hidden="true"></span>
              </a>
            </div>
            <img class="card-curso__line" src="<?php echo esc_url( mukutu_asset( 'icons/line-pattern-card.svg' ) ); ?>" alt="" aria-hidden="true">
          </article>
	<?php
endwhile;
wp_reset_postdata();
?>
        </div>

        <div class="cursos__footer" data-reveal>
          <a class="button button--regular button--stroke-green" href="#cursos">
            <span class="button__label">Conheça Nossos Cursos</span>
            <span class="icon-arrow" aria-hidden="true"></span>
          </a>
        </div>
      </div>
    </section>

    <!-- ==========================================================
         DEPOIMENTOS — imagem à esquerda é FIXA, só o conteúdo
         da direita roda no slider (Swiper.js, loop infinito)
         ========================================================== -->
    <section class="depoimentos" aria-label="Depoimentos de alunos">

      <!-- bloco fixo: não faz parte do slider -->
      <div class="depoimentos__media">
        <img class="depoimentos__img" src="<?php echo esc_url( mukutu_asset( 'img/depoimentos-bg.png' ) ); ?>" alt="">
        <div class="depoimentos__scrim" aria-hidden="true"></div>
        <img class="depoimentos__line depoimentos__line--1" src="<?php echo esc_url( mukutu_asset( 'icons/line-pattern-depo.svg' ) ); ?>" alt="" aria-hidden="true">
        <img class="depoimentos__line depoimentos__line--2" src="<?php echo esc_url( mukutu_asset( 'icons/line-pattern-wide.svg' ) ); ?>" alt="" aria-hidden="true">
        <div class="depoimentos__media-text" data-reveal>
          <p class="depoimentos__span">Depoimentos de alunos</p>
          <h2 class="depoimentos__titulo">Histórias de impacto real</h2>
        </div>
      </div>

      <!-- slider -->
      <div class="depoimentos__slider">
        <img class="depoimentos__quote-mark" src="<?php echo esc_url( mukutu_asset( 'icons/quote-mark.svg' ) ); ?>" alt="" aria-hidden="true">

        <div class="swiper depoimentos__swiper" data-reveal>
          <div class="swiper-wrapper">
<?php
$depoimentos = mukutu_query( 'depoimento' );
while ( $depoimentos->have_posts() ) :
	$depoimentos->the_post();
	$avatar = get_the_post_thumbnail_url( null, 'full' );
	?>
            <div class="swiper-slide depoimento-slide">
              <p class="depoimento-slide__curso"><?php echo esc_html( mukutu_field( 'curso' ) ); ?></p>
              <blockquote class="depoimento-slide__citacao"><?php echo esc_html( wp_strip_all_tags( get_the_content() ) ); ?></blockquote>
              <div class="depoimento-slide__autor">
                <img class="depoimento-slide__avatar" src="<?php echo esc_url( $avatar ? $avatar : mukutu_asset( 'img/aluno-avatar.png' ) ); ?>" alt="">
                <div class="depoimento-slide__identidade">
                  <p class="depoimento-slide__nome"><?php the_title(); ?></p>
                  <p class="depoimento-slide__cargo"><?php echo esc_html( mukutu_field( 'cargo' ) ); ?></p>
                </div>
              </div>
            </div>
	<?php
endwhile;
wp_reset_postdata();
?>
          </div>

          <div class="depoimentos__nav">
            <button class="depoimentos__arrow" type="button" id="depoimentos-prev" aria-label="Depoimento anterior">
              <img src="<?php echo esc_url( mukutu_asset( 'icons/slider-prev.svg' ) ); ?>" alt="">
            </button>
            <button class="depoimentos__arrow" type="button" id="depoimentos-next" aria-label="Próximo depoimento">
              <img src="<?php echo esc_url( mukutu_asset( 'icons/slider-next.svg' ) ); ?>" alt="">
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- ==========================================================
         FAQ — resposta aparece no hover do card
         ========================================================== -->
    <section class="faq" id="faq">
      <div class="container">
        <header class="faq__header" data-reveal>
          <div class="section-title">
            <p class="section-title__span">FAQ</p>
            <h2 class="section-title__titulo">Dúvidas frequentes</h2>
          </div>

          <div class="faq__contato">
            <p class="faq__contato-texto">Tem alguma dúvida sobre os cursos?</p>
            <a class="link-aqua" href="#footer">
              <span>Entre em contato conosco</span>
              <span class="icon-arrow" aria-hidden="true"></span>
            </a>
          </div>
        </header>

        <div class="faq__grid">
<?php
$faqs  = mukutu_query( 'faq' );
$numero = 0;
while ( $faqs->have_posts() ) :
	$faqs->the_post();
	$numero++;
	$id = 'faq-resposta-' . $numero;
	?>
          <article class="card-faq" data-reveal>
            <button class="card-faq__toggle" type="button"
                    aria-expanded="false" aria-controls="<?php echo esc_attr( $id ); ?>">
              <span class="card-faq__number">
                <span><?php echo esc_html( str_pad( $numero, 2, '0', STR_PAD_LEFT ) ); ?></span>
                <span class="icon-arrow-diagonal" aria-hidden="true"></span>
              </span>
              <span class="card-faq__pergunta"><?php the_title(); ?></span>
            </button>
            <div class="card-faq__resposta-wrap" id="<?php echo esc_attr( $id ); ?>">
              <p class="card-faq__resposta"><?php echo esc_html( wp_strip_all_tags( get_the_content() ) ); ?></p>
            </div>
          </article>
	<?php
endwhile;
wp_reset_postdata();
?>
        </div>
        </div>
      </div>
    </section>

    <!-- ==========================================================
         TRANSITION — seção decorativa sticky
         ========================================================== -->
    <section class="transition" aria-hidden="true">
      <img class="transition__img" src="<?php echo esc_url( mukutu_asset( 'img/transition-bg.png' ) ); ?>" alt="">
      <div class="transition__scrim transition__scrim--left"></div>
      <div class="transition__scrim transition__scrim--right"></div>
      <img class="transition__dots transition__dots--left" src="<?php echo esc_url( mukutu_asset( 'icons/dots-transition-left.svg' ) ); ?>" alt="">
      <img class="transition__dots transition__dots--right" src="<?php echo esc_url( mukutu_asset( 'icons/dots-transition-right.svg' ) ); ?>" alt="">
    </section>

  </main>

<?php
get_footer();
