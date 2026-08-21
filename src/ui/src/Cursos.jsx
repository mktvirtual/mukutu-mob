import { CardRoot, CardContent, CardFooter } from '@heroui/react/card';
import { ButtonRoot } from '@heroui/react/button';

export function Cursos({ itens }) {
  return (
    <div className="grid grid-cols-1 gap-6 md:grid-cols-2">
      {itens.map((curso) => (
        <CardRoot
          key={curso.id}
          className="overflow-hidden rounded-2xl border border-black/10 bg-white"
        >
          {curso.imagem && (
            <img
              src={curso.imagem}
              alt=""
              className="aspect-[16/10] w-full object-cover"
            />
          )}

          <CardContent className="flex flex-col gap-3 p-5 sm:p-7">
            <p className="w-fit rounded-full bg-greenish px-3 py-1 text-xs font-semibold uppercase tracking-wide text-greenfia">
              {curso.tag}
            </p>
            <h3 className="text-xl font-bold leading-tight text-greenfia sm:text-2xl">
              {curso.titulo}
            </h3>
          </CardContent>

          <CardFooter className="p-5 pt-0 sm:p-7 sm:pt-0">
            <ButtonRoot
              as="a"
              href={curso.link}
              className="w-full justify-center rounded-full bg-aqua px-6 py-3 font-semibold text-white transition-colors hover:bg-greenfia sm:w-auto"
            >
              {curso.label}
            </ButtonRoot>
          </CardFooter>
        </CardRoot>
      ))}
    </div>
  );
}
