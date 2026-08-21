<?php
/**
 * Fecha o documento. wp_footer() carrega Swiper, GSAP e o script do tema.
 */
?>
  <!-- ==========================================================
       FOOTER
       ========================================================== -->
  <footer class="footer" id="footer">
    <div class="container">

      <div class="footer__top">
        <div class="footer__brand" data-reveal>
          <img class="footer__logo" src="<?php echo mukutu_asset( 'icons/logo-horizontal.svg' ); ?>" alt="FIA Digital">
          <img class="footer__line" src="<?php echo mukutu_asset( 'icons/line-pattern-footer.svg' ); ?>" alt="" aria-hidden="true">
          <p class="footer__tagline">Autonomia para estudar. Profundidade para liderar transformações.</p>
        </div>

        <div class="footer__nav-buttons" data-reveal>
          <a class="button button--regular button--stroke-green" href="#cursos">
            <span class="button__label">Graduação</span>
            <span class="icon-arrow" aria-hidden="true"></span>
          </a>
          <a class="button button--regular button--stroke-green" href="#cursos">
            <span class="button__label">Pós-graduação</span>
            <span class="icon-arrow" aria-hidden="true"></span>
          </a>
          <a class="button button--regular button--stroke-green" href="#cursos">
            <span class="button__label">MBA</span>
            <span class="icon-arrow" aria-hidden="true"></span>
          </a>
        </div>

        <ul class="footer__social">
          <li>
            <a class="social-icon-button" href="#" aria-label="Instagram da FIA Digital">
              <img src="<?php echo mukutu_asset( 'icons/ico-instagram.svg' ); ?>" alt="">
            </a>
          </li>
          <li>
            <a class="social-icon-button" href="#" aria-label="LinkedIn da FIA Digital">
              <img src="<?php echo mukutu_asset( 'icons/ico-linkedin.svg' ); ?>" alt="">
            </a>
          </li>
          <li>
            <a class="social-icon-button" href="#" aria-label="YouTube da FIA Digital">
              <img src="<?php echo mukutu_asset( 'icons/ico-youtube.svg' ); ?>" alt="">
            </a>
          </li>
        </ul>

        <a class="link-aqua footer__contato" href="#">
          <span>Entre em contato conosco</span>
          <span class="icon-arrow" aria-hidden="true"></span>
        </a>
      </div>

      <div class="footer__bottom">
        <div class="footer__emec">
          <p class="footer__emec-texto">Consulte aqui o cadastro da Instituição no sistema e-MEC.</p>
          <div class="footer__selo">
            <img class="footer__selo-marca" src="<?php echo mukutu_asset( 'img/footer-selo.png' ); ?>" alt="e-MEC">
            <div class="footer__selo-qr">
              <img src="<?php echo mukutu_asset( 'img/footer-qrcode.png' ); ?>" alt="QR Code para o cadastro e-MEC">
            </div>
          </div>
        </div>

        <div class="footer__portarias">
          <h3 class="footer__coluna-titulo">Portarias MEC</h3>
          <div class="footer__portarias-lista">
            <p><strong>Administração:</strong><br>Renovação de Reconhecimento de Curso - Portaria MEC nº 949 de 30 de agosto de 2021 – D.O.U. de 31 de agosto de 2021.</p>
            <p><strong>Economia:</strong><br>Autorização - Portaria MEC nº 241 de 19 de junho 2024 - D.O.U de 20 de junho de 2024</p>
            <p><strong>Mestrado:</strong><br>Portaria MEC nº 609 de 14 de março de 2020 - D.O.U de 18 de março de 2020</p>
            <p><strong>Doutorado:</strong><br>Portaria MEC nº 213 de 20 de março de 2025 - D.O.U de 21 de março de 2025</p>
          </div>
        </div>

        <div class="footer__institucional">
          <h3 class="footer__coluna-titulo">FIA</h3>
          <ul class="footer__links">
            <li><a href="#faq">FAQ</a></li>
            <li><a href="#">Blog FIA</a></li>
            <li><a href="#">Biblioteca</a></li>
            <li><a href="#">Ouvidoria</a></li>
            <li><a href="#">Código de conduta</a></li>
            <li><a href="#">Portal da transparência</a></li>
          </ul>
        </div>
      </div>

      <div class="footer__bar">
        <p class="footer__copy">©2026 FIA Digital - Todos os direitos reservados</p>
        <ul class="footer__politicas">
          <li><a href="#">Políticas de Privacidade</a></li>
          <li><a href="#">Políticas de Cookies</a></li>
        </ul>
        <p class="footer__credito">
          <span>Site desenvolvido por </span><strong>mukutu</strong>
          <img src="<?php echo mukutu_asset( 'icons/mukutu-brand.svg' ); ?>" alt="" aria-hidden="true">
        </p>
      </div>

    </div>
  </footer>

<?php wp_footer(); ?>
</body>
</html>
