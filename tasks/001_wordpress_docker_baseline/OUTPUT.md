---
task: 001_wordpress_docker_baseline
verdict: done
date: 2026-08-21
---

# 001 — Output

## Verdict

**Done.** WordPress answers `200` on http://localhost:8081 with Advanced Custom
Fields installed and active. Two real defects in `src/docker.yaml` had to be
fixed to get there.

## Measured

| Check | Result |
| --- | --- |
| `curl -sI localhost:8081` | `HTTP 200` |
| `wp core version` | **7.1** |
| `wp plugin list` | `advanced-custom-fields active none 6.8.8` |
| Other plugins | `akismet` inactive, `hello` inactive — WordPress defaults |
| Services | `db`, `wordpress` running; `provision` exited 0 |

Login at http://localhost:8081/wp-admin with `admin` / `admin`.

## What was wrong and how it was fixed

**The provision script never ran.** `command:` was a YAML folded scalar and a
plain string, so Compose word-split it and `sh -c` received only the first
token — the container printed its environment instead. Now it is a one-item list
holding a literal block.

**MySQL 8.4 forces TLS and wp-cli cannot pass it.** The database reported
healthy while `wp db check` failed with `TLS/SSL error: 2026: self-signed
certificate in certificate chain`. The database image is now `mariadb:11`, with
the reason written in the file.

A third problem was environmental, not ours: two agents ran `up -d` against the
same project name concurrently and left containers `marked for removal`. One
hand on the stack from then on.

## The ACF finding that changes 003

**The free plugin ships no Repeater.** Listing the field classes inside the
installed plugin returns 33 types — accordion, group, relationship, wysiwyg and
so on — and there is no `repeater`, no `flexible_content`, no `gallery`, no
`clone`, and no `pro/` directory at all.

```sh
docker compose -f src/docker.yaml run --rm --entrypoint sh provision \
  -c 'ls wp-content/plugins/advanced-custom-fields/includes/fields/'
```

So every repeating block on the FIA home — `card-curso`, `card-faq`,
`card-stat`, `depoimento-slide` — needs another model or an ACF PRO licence.
That is a cost decision and belongs to a human, not to 003.

## References

Compose file: `src/docker.yaml`. Port moved to 8081 in `ee30d07` — 8080 was
already taken locally, see `LINKS.md`. Research on the free/PRO split:
`research/001_advanced_custom_fields/CONTEXT.md`.
