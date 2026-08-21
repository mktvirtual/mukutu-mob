import {
  AccordionRoot,
  AccordionItem,
  AccordionHeading,
  AccordionTrigger,
  AccordionPanel,
} from '@heroui/react/accordion';

/**
 * No protótipo a resposta abre no hover, que não existe no toque. Aqui é
 * acordeão de verdade: abre no clique e no teclado, nos dois tamanhos.
 */
export function Faq({ itens }) {
  return (
    <AccordionRoot className="grid gap-3">
      {itens.map((item, i) => (
        <AccordionItem
          key={item.id}
          id={String(item.id)}
          className="overflow-hidden rounded-2xl border border-black/10 bg-white"
        >
          <AccordionHeading>
            <AccordionTrigger className="flex w-full items-start gap-4 p-5 text-left sm:p-6">
              <span className="font-mono text-sm text-aqua">
                {String(i + 1).padStart(2, '0')}
              </span>
              <span className="flex-1 text-base font-semibold text-greenfia sm:text-lg">
                {item.pergunta}
              </span>
            </AccordionTrigger>
          </AccordionHeading>

          <AccordionPanel className="px-5 pb-5 pl-14 text-sm leading-relaxed text-neutral-700 sm:px-6 sm:pb-6 sm:pl-16 sm:text-base">
            {item.resposta}
          </AccordionPanel>
        </AccordionItem>
      ))}
    </AccordionRoot>
  );
}
