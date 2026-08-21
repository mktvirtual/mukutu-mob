import { StrictMode } from 'react';
import { createRoot } from 'react-dom/client';
import './styles.css';
import { Cursos } from './Cursos.jsx';
import { Faq } from './Faq.jsx';
import { Depoimentos } from './Depoimentos.jsx';

/**
 * Ilhas React dentro do tema PHP. Cada seção que repete vira uma ilha; o resto
 * da home continua sendo PHP renderizado no servidor.
 */
const ilhas = {
  'island-cursos': Cursos,
  'island-faq': Faq,
  'island-depoimentos': Depoimentos,
};

let montou = false;

for (const [id, Componente] of Object.entries(ilhas)) {
  const no = document.getElementById(id);
  if (!no) continue;

  const dados = JSON.parse(no.dataset.props || '[]');
  createRoot(no).render(
    <StrictMode>
      <Componente itens={dados} />
    </StrictMode>,
  );
  montou = true;
}

// O observador de revelação do tema roda no DOMContentLoaded, antes destas
// ilhas existirem. Reavisar é o que faz o conteúdo montado aqui aparecer.
if (montou) {
  requestAnimationFrame(() => window.mukutuRevelar?.());
}
