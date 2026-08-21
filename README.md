# mukutu-mob

Migração da home da **FIA Digital** — de protótipo estático (HTML/CSS/JS, gerado
do Figma) para tema WordPress com Advanced Custom Fields.

O raciocínio está em `tasks/`, uma pasta por tarefa — cada `CONTEXT.md` diz por
que a tarefa existe, como rodar, e o que prova que funcionou. O código está em
`src/`.

| Tarefa | O quê |
| --- | --- |
| [001](tasks/001_wordpress_docker_baseline/CONTEXT.md) | Baseline Docker: WordPress latest + ACF free |
| [002](tasks/002_run_prototype_from_git/CONTEXT.md) | Rodar o protótipo estático e capturar a referência |
| [003](tasks/003_migrate_prototype_to_wordpress/CONTEXT.md) | Migrar o protótipo para tema WordPress (origem: o HTML) |
| [004](tasks/004_figma_to_wordpress_theme/CONTEXT.md) | Mesmo tema, direto do Figma — o HTML é passo necessário ou hábito? |
| [005](tasks/005_two_themes_one_wordpress/CONTEXT.md) | Mind Summit 2026: dois temas num WordPress só |

As convenções do repositório estão em [`CONTEXT.md`](CONTEXT.md); as URLs locais
e remotas em [`LINKS.md`](LINKS.md).

Protótipo de origem: [`felipemukutu/fia-digital-test`](https://github.com/felipemukutu/fia-digital-test).

> As credenciais em `src/docker.yaml` são de
> ambiente local descartável (`admin`/`admin`, `wordpress`/`wordpress`). Não
> existe segredo real neste repositório e nenhum deve ser adicionado.
