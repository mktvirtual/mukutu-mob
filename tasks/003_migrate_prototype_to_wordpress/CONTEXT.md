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

## What the adaptation taught

**Slice the markup, never retype it.** The HTML was cut by line range and only
`src`/`href="assets/…"` were rewritten to `mukutu_asset()`. Structure cannot
drift when no human hand touches it — parity came out right on the first render.

**Count elements to prove parity.** Comparing class counts between the served
page and the prototype — `card-faq` 3, `data-reveal` 16 — catches a lost block
in a second, long before anyone opens a screenshot.

**Reproduce defects, do not fix them mid-migration.** The slider still has no
autoplay and the testimonials still sign "Nome do Aluno", because a fix here
would hide whether the migration itself worked.

## WordPress traps we hit

**A theme without `index.php` cannot be activated** — activation fails with
"Template is missing" even when `front-page.php` exists.

**The block editor collapses metaboxes into a zero-height drawer**, which makes
ACF inputs unclickable to a driver and awkward to a human. A page that is
entirely ACF gets the classic editor through `use_block_editor_for_post`.

**ACF's `front_page` location needs a real front page** — `show_on_front=page`
plus a `page_on_front`. With `show_on_front=posts` the group has nowhere to
appear, even though `front-page.php` still renders.

## Seeding and tooling traps

**ACF reads meta through a companion key.** Setting `tag` is not enough: `_tag`
must hold the field key (`field_curso_tag`), or `get_field()` returns nothing.
Seed both, always.

**Docker Desktop does not share `/tmp`.** A script mounted from there arrives
empty and the container exits silently. Mount from the repository path, which is
already shared for the theme.

**GSAP reveals need a progressive scroll.** Jumping to the bottom triggered 2 of
16; stepping 400px at a time triggered 16 of 16. A jump measures nothing.

## What the base theme kept

`functions.php` (asset helper with mtime versioning, enqueue, ACF local JSON
paths, `mukutu_field()` fallback), `inc/post-types.php` (repetition as post
types), `header.php`, `index.php` and the `acf-json/` convention.

Everything FIA-specific stayed in `front-page.php`, `footer.php` and the field
groups. That line is where the next project starts — copy the base, replace the
templates.

The bind mount matters more than it looks: `./theme/mukutu-base` mounted into
the container means editing on the host is live in WordPress, with no build and
no copy step.

## What proves it works

**Done means an editor changed each field in wp-admin and the page changed**,
driven by `qa-drive` with real keystrokes, not by reading the template. A field
rendering its default looks identical to a field never wired.

Close it visually: theme and prototype side by side at 1440px and 390px,
screenshots, every remaining difference named, console clean. 002 measured hero
height, FAQ hover and 16 reveals — the same numbers must hold.

Write `OUTPUT.md` with commits, paths, commands and numbers, then push. Depends
on 001 (WordPress 7.1 + ACF 6.8.8) and 002 (the reference screens).
