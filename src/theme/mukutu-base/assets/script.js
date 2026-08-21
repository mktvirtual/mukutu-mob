/* ==========================================================================
   FIA Digital — Home
   Protótipo funcional | Camada VER
   ========================================================================== */

/* --------------------------------------------------------------------------
   Slider de depoimentos (Swiper.js, loop infinito)
   Só o conteúdo da direita roda. A imagem da esquerda é fixa.
   -------------------------------------------------------------------------- */

function iniciarSliderDepoimentos() {
  return new Swiper(".depoimentos__swiper", {
    loop: true,
    speed: 500,
    slidesPerView: 1,
    spaceBetween: 40,
    /* Sem autoHeight: os slides ficam todos com a altura do mais alto,
       o que mantém o autor sempre na mesma linha de base. */
    navigation: {
      prevEl: "#depoimentos-prev",
      nextEl: "#depoimentos-next",
    },
    keyboard: {
      enabled: true,
    },
    a11y: {
      prevSlideMessage: "Depoimento anterior",
      nextSlideMessage: "Próximo depoimento",
    },
  });
}

/* --------------------------------------------------------------------------
   menu-mobile
   Estado de tela (Nível 1): sempre abre fechado.
   -------------------------------------------------------------------------- */

const LARGURA_MENU_MOBILE = 768;

function iniciarMenuMobile() {
  const botao = document.getElementById("nav-toggle");
  const menu = document.getElementById("nav-menu");
  const links = menu.querySelectorAll("a");

  function abrirMenu() {
    menu.classList.add("is-aberto");
    document.body.classList.add("menu-aberto");
    botao.setAttribute("aria-expanded", "true");
    botao.setAttribute("aria-label", "Fechar menu");
    links[0].focus();
  }

  function fecharMenu({ devolverFoco = true } = {}) {
    menu.classList.remove("is-aberto");
    document.body.classList.remove("menu-aberto");
    botao.setAttribute("aria-expanded", "false");
    botao.setAttribute("aria-label", "Abrir menu");
    if (devolverFoco) botao.focus();
  }

  function menuEstaAberto() {
    return botao.getAttribute("aria-expanded") === "true";
  }

  botao.addEventListener("click", () => {
    if (menuEstaAberto()) fecharMenu();
    else abrirMenu();
  });

  // clicar em um link navega e fecha o menu
  links.forEach((link) => {
    link.addEventListener("click", () => fecharMenu({ devolverFoco: false }));
  });

  document.addEventListener("keydown", (evento) => {
    if (evento.key === "Escape" && menuEstaAberto()) fecharMenu();
  });

  // ao voltar para desktop o painel não deve continuar preso
  window.addEventListener("resize", () => {
    if (window.innerWidth > LARGURA_MENU_MOBILE && menuEstaAberto()) {
      fecharMenu({ devolverFoco: false });
    }
  });
}

/* --------------------------------------------------------------------------
   acordeao-faq
   Abre a resposta no toque. Abrir um card fecha os demais.
   Em dispositivos com mouse, o hover do CSS continua valendo.
   -------------------------------------------------------------------------- */

function iniciarAcordeaoFaq() {
  const cards = Array.from(document.querySelectorAll(".card-faq"));

  function fecharCard(card) {
    card.classList.remove("is-aberto");
    card.querySelector(".card-faq__toggle").setAttribute("aria-expanded", "false");
  }

  function abrirCard(card) {
    card.classList.add("is-aberto");
    card.querySelector(".card-faq__toggle").setAttribute("aria-expanded", "true");
  }

  cards.forEach((card) => {
    // Ouvinte no card inteiro, não só no button: assim o padding de 40px
    // também responde ao clique. O clique do button — de mouse ou de
    // Enter/Espaço no teclado — borbulha até aqui, então não duplica.
    card.addEventListener("click", (evento) => {
      // clicar na resposta não fecha o card: permite ler e selecionar o texto
      if (evento.target.closest(".card-faq__resposta-wrap")) return;

      const jaAberto = card.classList.contains("is-aberto");
      cards.forEach(fecharCard);
      if (!jaAberto) abrirCard(card);
    });
  });
}

/* --------------------------------------------------------------------------
   Revelação no scroll
   Cada bloco aparece uma vez, quando entra na viewport. Depois disso o
   observador é desligado: a animação não se repete a cada rolagem.
   -------------------------------------------------------------------------- */

function iniciarRevelacao() {
  const blocos = document.querySelectorAll("[data-reveal]");

  // sem suporte a IntersectionObserver: mostra tudo de uma vez
  if (!("IntersectionObserver" in window)) {
    blocos.forEach((bloco) => bloco.classList.add("is-visivel"));
    return;
  }

  const observador = new IntersectionObserver(
    (entradas) => {
      entradas.forEach((entrada) => {
        if (!entrada.isIntersecting) return;
        entrada.target.classList.add("is-visivel");
        observador.unobserve(entrada.target);
      });
    },
    { rootMargin: "0px 0px -10% 0px" }
  );

  blocos.forEach((bloco) => observador.observe(bloco));
}

/* --------------------------------------------------------------------------
   Encolhimento da imagem em ctas (GSAP + ScrollTrigger)
   Só em desktop. A seção pina por uma distância curta enquanto a imagem
   encolhe de min(1660px, 100vw) até a largura do container. Fora dessa
   media query (mobile, sem JS, prefers-reduced-motion) a imagem fica na
   largura do container, que é o estado definido no CSS.
   -------------------------------------------------------------------------- */

const LARGURA_DESKTOP_CTAS = 768;
const LARGURA_MAXIMA_CTAS = 1660;
const DISTANCIA_ENCOLHIMENTO_CTAS = 350;

// mesma proporção do aspect-ratio de .ctas__media (1276 / 480) — a altura
// fica travada nesse valor durante o encolhimento, pra não empurrar
// .ctas__actions (que depende dessa altura pro margin-top negativo)
const PROPORCAO_CTAS = 480 / 1276;

function iniciarEfeitoScrollCtas() {
  const media = document.getElementById("ctas-media");
  const inner = document.querySelector(".ctas__inner");

  if (!media || !inner) return;
  if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

  gsap.registerPlugin(ScrollTrigger);

  const larguraInicial = () => Math.min(LARGURA_MAXIMA_CTAS, window.innerWidth);
  const larguraFinal = () => inner.getBoundingClientRect().width;
  const alturaFixa = () => larguraFinal() * PROPORCAO_CTAS;

  const mm = gsap.matchMedia();

  mm.add(`(min-width: ${LARGURA_DESKTOP_CTAS + 1}px)`, () => {
    gsap.set(media, { position: "relative", left: "50%" });

    gsap.fromTo(
      media,
      {
        width: () => `${larguraInicial()}px`,
        height: () => `${alturaFixa()}px`,
        marginLeft: () => `${-larguraInicial() / 2}px`,
      },
      {
        width: () => `${larguraFinal()}px`,
        height: () => `${alturaFixa()}px`,
        marginLeft: () => `${-larguraFinal() / 2}px`,
        ease: "none",
        scrollTrigger: {
          trigger: ".ctas",
          start: "top top",
          end: `+=${DISTANCIA_ENCOLHIMENTO_CTAS}`,
          scrub: true,
          pin: true,
          invalidateOnRefresh: true,
        },
      }
    );
  });
}

/* --------------------------------------------------------------------------
   Inicialização
   -------------------------------------------------------------------------- */

document.addEventListener("DOMContentLoaded", () => {
  iniciarSliderDepoimentos();
  iniciarMenuMobile();
  iniciarAcordeaoFaq();
  iniciarRevelacao();
  iniciarEfeitoScrollCtas();
});
