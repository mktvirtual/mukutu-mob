---
audience: agents, this repo
max_words_per_paragraph: 50
max_paragraphs_per_section: 3
---

# mukutu-mob

## How work is organized here

**One task is one folder under `tasks/`, `NNN_<name>/`, and its `CONTEXT.md` is
the task.** The
number is the order the work was decided, never renumbered; the name is at most
five words, lowercase, underscore-separated.

Each task doc says why it exists, what it produces, and what proves it worked —
including what it depends on. Artifacts live beside the doc, in the folder that
owns them.

## The custom fields layer

**The team uses Advanced Custom Fields.** Every editable field in a WordPress
theme here is an ACF field, registered as a field group and read in the template
through ACF's API — not `post_meta` by hand, not a page builder, not the block
editor's own field mechanisms.

That decision is already made and does not get re-opened per task. What each
task still decides is which content becomes a field at all, and whether it
repeats.

Docs: https://www.advancedcustomfields.com/resources/ — the Portuguese machine
translation the team browses is the same content, so cite the canonical English
URL in code and docs.

## Where the prototype comes from

The static source is `felipemukutu/fia-digital-test` — the FIA Digital home
built from Figma in plain HTML, CSS and JS, with Swiper and GSAP vendored. It is
the visual reference until a task explicitly retires it.
