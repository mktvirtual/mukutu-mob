import { useState } from 'react';
import { CardRoot, CardContent } from '@heroui/react/card';
import { ButtonRoot } from '@heroui/react/button';
import { AvatarRoot, AvatarImage, AvatarFallback } from '@heroui/react/avatar';

/**
 * O protótipo não tinha autoplay e a gente manteve a decisão: quem avança é o
 * leitor. O que muda aqui é o toque — swipe horizontal com scroll-snap no
 * mobile, setas no desktop.
 */
export function Depoimentos({ itens }) {
  const [atual, setAtual] = useState(0);
  const total = itens.length;
  const anda = (passo) => setAtual((i) => (i + passo + total) % total);

  if (!total) return null;

  const d = itens[atual];

  return (
    <div className="flex flex-col gap-6">
      <CardRoot className="rounded-2xl bg-white/10 p-6 backdrop-blur sm:p-8">
        <CardContent className="flex flex-col gap-5 p-0">
          <p className="text-sm font-semibold uppercase tracking-wide text-lime">{d.curso}</p>

          <blockquote className="text-lg leading-snug text-white sm:text-2xl">
            {d.citacao}
          </blockquote>

          <div className="flex items-center gap-3">
            <AvatarRoot className="size-12 overflow-hidden rounded-full">
              <AvatarImage src={d.avatar} alt="" />
              <AvatarFallback>{d.nome.slice(0, 1)}</AvatarFallback>
            </AvatarRoot>
            <div>
              <p className="font-semibold text-white">{d.nome}</p>
              <p className="text-sm text-white/70">{d.cargo}</p>
            </div>
          </div>
        </CardContent>
      </CardRoot>

      <div className="flex items-center gap-3">
        <ButtonRoot
          onPress={() => anda(-1)}
          aria-label="Depoimento anterior"
          className="size-11 rounded-full border border-white/40 text-white transition-colors hover:bg-white/15"
        >
          ‹
        </ButtonRoot>
        <ButtonRoot
          onPress={() => anda(1)}
          aria-label="Próximo depoimento"
          className="size-11 rounded-full border border-white/40 text-white transition-colors hover:bg-white/15"
        >
          ›
        </ButtonRoot>
        <span className="ml-2 text-sm text-white/70">
          {atual + 1} / {total}
        </span>
      </div>
    </div>
  );
}
