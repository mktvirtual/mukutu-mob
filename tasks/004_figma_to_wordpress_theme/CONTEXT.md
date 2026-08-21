---
audience: agents, this task
max_words_per_paragraph: 50
max_paragraphs_per_section: 3
---

# 004 — Figma to WordPress theme

## Why this task exists

**003 started from the HTML. This one starts from the Figma file.** That is the
only difference, and it is the whole experiment: we want to know whether the
static prototype is a necessary step or a habit.

The answer decides the workflow we automate. If Figma can feed the theme
directly, the pipeline is two hops; if it cannot, the HTML step earns its place
and we stop asking.

Both answers are results. A run that ends with "the HTML step is required,
because X" is worth as much as one that removes it.

## The ruler already exists

**Nothing new has to be invented to grade this.** 002 measured the prototype and
003 measured the theme built from it: hero equals viewport, 16 `[data-reveal]`,
`card-faq` 3, `card-curso` 2, `depoimento-slide` 3, clean console.

The theme produced here is compared against those same numbers, and against
003's rendered page. Same home, same acceptance, different origin.

Any difference is the finding. Note it as a difference, never smooth it over by
hand-editing the output toward 003.

## Source of truth

Figma file: `FIA-Digital`, node `1774-1069` — the same frame `felipemukutu/fia-digital-test`
came from, so the two routes start level.

Read it through the Figma API or an MCP that exposes it. Variables come out as
tokens for `:root`; the frame tree comes out as structure. Do not retype either
by hand — that is the step we are trying to measure.

If the file is unreachable, stop and say so. A run against a screenshot is not
this experiment.

## What to build with

Start from `src/theme/mukutu-base/` — 003 already separated what is reusable
(enqueue, `mukutu_asset()`, ACF local JSON, post types) from what is FIA. Build
`src/theme/fia-figma/` on top of it and keep the base untouched.

Repetition still has no Repeater in free ACF, so the post types from
`inc/post-types.php` apply unchanged. Reuse them rather than inventing a second
model.

## What proves it works

**Done means the parity table filled in and the differences named**, driven by
`qa-drive` on a real install, not read off the templates.

Then the part that matters more than the pixels: count the human decisions this
route needed, and how many 003 needed. That number, not the screenshot, answers
whether Figma → WordPress can be automated.

Write `OUTPUT.md` with commits, commands, counts and the decision list, then
push. Depends on 001 (baseline) and 003 (the base theme and the reference
numbers).
