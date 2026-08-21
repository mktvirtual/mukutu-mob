---
audience: agents, this task
max_words_per_paragraph: 50
max_paragraphs_per_section: 3
---

# 003 — Migrate prototype to WordPress

## Why this task exists

**The prototype becomes a theme on the 001 baseline, with ACF carrying every
editable field.** This is the whole migration: markup split into templates,
assets enqueued, content read from field groups.

The theme is `src/theme/fia-digital/`, mounted into the 001 containers. Split
the work inside the task, not into more folders: first transcribe
(`header.php`, `front-page.php`, `footer.php`, `wp_enqueue_*`) with everything
still hardcoded, then decide with a human which content becomes a field, then
register the ACF group and replace the literals.

Vendor scripts stay vendored inside the theme — Swiper, GSAP, ScrollTrigger — as
in the prototype. Class names and markup stay byte-identical through the whole
task so any visual diff means a real regression.

## What the field decision needs

Which blocks become editable is a product call and crosses a human gate before
the ACF group is registered. Bring one table — one row per block, naming the ACF
field type and whether it repeats.

Use the prototype's own vocabulary: `card-curso`, `card-faq`, `card-stat`,
`depoimento-slide`, `section-title`, `button`. Inventing a synonym here creates
two dictionaries and no true one.

## What proves it works

**Done means an editor changed each field in wp-admin and the page changed.** A
field rendering its default is indistinguishable from a field never wired, so
the check is an edit, not a page load.

Close it visually too: theme and prototype side by side at desktop and mobile,
screenshots, and every remaining difference named. Then the static path dies —
`src/prototype/`, the Pages workflow, and every reference to `public/index.html` — and
the proof is a search returning nothing.

Depends on 001 (baseline with ACF) and 002 (the reference screens).
