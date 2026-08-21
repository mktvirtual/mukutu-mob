# mukutu-ui

Ilhas React (HeroUI) que a home do tema monta. O build escreve direto em
`../theme/mukutu-base/assets/ui/`, e o resultado é commitado: quem instala o
tema não precisa de Node.

```sh
bun install
bun run build     # ui.js + ui.css dentro do tema
bun run dev       # rebuild em watch
```

Duas armadilhas medidas em 21/08:

- **Importar de `@heroui/react` (o barrel) quebra o build.** Ele arrasta
  `autocomplete`, que importa um subcaminho inexistente de `react-aria`.
  Importe por subpacote: `@heroui/react/card`, `/button`, `/accordion`.
- **`bun install` deixou `react-aria` e `react-stately` sem a pasta `dist/`**,
  e o bundler falhou ao resolver. `npm i react-aria react-stately` corrigiu.
  Os dois convivem no mesmo `node_modules`.
