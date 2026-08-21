---
audience: agents, this task
max_words_per_paragraph: 50
max_paragraphs_per_section: 3
---

# 001 — WordPress Docker baseline

## Why this task exists

**The baseline is WordPress plus ACF free, because that pair is the real floor
every later task stands on.** A theme ported without ACF present cannot be
checked for the only thing that makes it a theme instead of a page.

Baseline still means stock beyond that pair: no custom theme, no field group, no
seeded content. Anything else installed later belongs to a numbered task of its
own, so this environment can be destroyed and recreated identically.

ACF comes from the wordpress.org repository via `wp plugin install
advanced-custom-fields` — the free edition. Pro is a paid zip and is not
installed here; if a task needs a Pro-only field type, that is a demand
question, not a provisioning one.

## How to run it

```sh
docker compose -f docker.yaml up -d      # http://localhost:8080
docker compose -f docker.yaml logs provision
docker compose -f docker.yaml down       # stop, keep data
docker compose -f docker.yaml down -v    # destroy data, back to zero
```

Three services: `db` (mysql:8.4, healthchecked), `wordpress` (`latest`, port
8080), and `provision` (`wordpress:cli`) which runs once and exits after
installing core and activating ACF. Re-running `up` is safe — core install is
idempotent and the plugin step is a no-op when already present.

Credentials are `wordpress`/`wordpress` for the database and `admin`/`admin` for
wp-admin — local-only, never reused anywhere else. State lives in the `db` and
`wp` named volumes.

## What proves it works

**Done means ACF answered in wp-admin, not that three containers started.** A
running container with a failed provision step looks identical from
`docker ps`.

The check is `docker compose -f docker.yaml run --rm provision wp plugin list
--allow-root`, expecting `advanced-custom-fields` with status `active`, plus a
`200` from `curl -sI localhost:8080`. Record both the WordPress and the ACF
version reported — `latest` is a moving target and later tasks inherit whatever
it resolved to.
