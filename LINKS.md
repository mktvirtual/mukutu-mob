# Links

## Local

| O quê | URL | Como sobe |
| --- | --- | --- |
| WordPress (baseline + ACF) | http://localhost:8081 | `docker compose -f src/docker.yaml up -d` |
| wp-admin | http://localhost:8081/wp-admin | login `admin` / `admin` |
| Protótipo estático | http://localhost:8001 | `cd src/prototype/public && python3 -m http.server 8001` |

As portas 8080 e 8000 **não** estão livres nesta máquina (outro serviço local já
escuta nas duas), por isso 8081 e 8001. Trocar de porta aqui exige trocar
também em `src/docker.yaml` e no `CONTEXT.md` da tarefa correspondente.

## Remoto

| O quê | URL | Como sobe |
| --- | --- | --- |
| Protótipo estático | https://proto.mukutu.cloud | app `fia-proto` no Coolify, build pack static, direto de `felipemukutu/fia-digital-test` |
| WordPress (baseline + ACF) | https://wp.mukutu.cloud | app `fia-wordpress` no Coolify, `src/docker.cloud.yaml` deste repo |
| wp-admin remoto | https://wp.mukutu.cloud/wp-admin | usuário `mukutu`; senha em envless (`mukutu-mono`, env `funnel-dev`, `WP_MUKUTU_CLOUD_WP_ADMIN_PASSWORD`) |
| Painel do Coolify | https://coolify.mukutu.cloud | projeto `mukutu`, ambiente `production` |

| O quê | URL |
| --- | --- |
| Este repositório | https://github.com/mktvirtual/mukutu-mob |
| Protótipo de origem | https://github.com/felipemukutu/fia-digital-test |
| Documentação do ACF | https://www.advancedcustomfields.com/resources/ |
