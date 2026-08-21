---
audience: agents, this task
max_words_per_paragraph: 50
max_paragraphs_per_section: 3
---

# 003 — Migrate prototype to WordPress

## Why this task exists

**The prototype becomes a Mukutu base theme, not a one-off FIA theme.** The real
target is a repeatable Figma → HTML → WordPress route, and a route only proves
itself if the next project starts from something.

So the deliverable splits: `src/theme/mukutu-base/` holds what any Mukutu site
would reuse — enqueue wiring, template split, ACF bootstrap, `acf-json/`. FIA is
its first child, and what is FIA-specific must be obvious.

Resist inventing reusable parts nobody needs yet. A piece earns its place in the
base only when the FIA build actually used it.

## How ACF plugs into a theme

**Field groups live as files, not as database rows.** Create `acf-json/` inside
the theme: ACF writes every field group there on save, and the sync screen pulls
newer files back. That is how field definitions reach git and the next machine.

Templates read with `get_field()` and `the_field()`; groups attach through
location rules. Registering the group in PHP is the alternative and is worse
here — local JSON keeps the admin UI as the editor and the file as the record.

**Free ACF has no Repeater** — measured in 001, no `repeater`,
`flexible_content`, `gallery` or `clone` class ships. Repetition must come from
somewhere else.

## Modelling repetition without Repeater

The WordPress-native answer is a custom post type per repeating thing — courses,
testimonials, FAQ entries — each with its own field group, looped with
`WP_Query`. ACF free registers post types from its own UI.

That is more moving parts than a repeater, and it is also more honest: a course
becomes a real object with a URL, not a row inside a page. Decide it explicitly,
per block, with a human.

If a block genuinely needs PRO, say so with the evidence and stop. A licence is
a purchase decision and belongs to Gabriel, not to this task.

## What 001 and 002 taught

**Measure the environment before trusting it.** 8080 and 8000 were already
taken; MySQL 8.4 forced TLS that wp-cli could not pass; a folded YAML scalar
silently word-split a command. All three looked healthy while being broken.

**One hand on the stack.** Two agents running `up -d` on the same compose project
left containers marked for removal. Parallelise across tasks, never inside one
environment.

**The prototype has known defects** — slider without autoplay, testimonials
signed "Nome do Aluno". Reproduce them as-is or raise them; do not silently fix
them mid-migration.

## What proves it works

**Done means an editor changed each field in wp-admin and the page changed**,
driven by `qa-drive` with real keystrokes, not by reading the template. A field
rendering its default looks identical to a field never wired.

Close it visually: theme and prototype side by side at 1440px and 390px,
screenshots, every remaining difference named, console clean. 002 measured hero
height, FAQ hover and 16 reveals — the same numbers must hold.

Write `OUTPUT.md` with commits, paths, commands and numbers, then push. Depends
on 001 (WordPress 7.1 + ACF 6.8.8) and 002 (the reference screens).
