---
audience: agents, this task
max_words_per_paragraph: 50
max_paragraphs_per_section: 3
---

# 002 — Run prototype from git

## Why this task exists

**Before migrating the prototype we have to see it running.** Nobody on this
side has watched the FIA home scroll yet; migrating from a repository we only
read is migrating from a guess.

Running it also fixes the reference. The migrated theme is judged against these
screens, so what the browser shows here — not the Figma frame, not the markup —
is what 003 has to reproduce.

## How to run it

```sh
gh repo clone felipemukutu/fia-digital-test src/prototype
cd src/prototype/public && python3 -m http.server 8000   # http://localhost:8000
```

A plain static server is enough: no Node, no build, no dependency install.
Swiper, GSAP and ScrollTrigger are vendored under `src/prototype/public/assets/vendor/`; DM
Sans is the single external request, so the page needs network for fonts only.

`src/prototype/` is gitignored — it is a clone of another repository, not our
code. Opening `index.html` from the filesystem also mostly works, but `file://` breaks
on some asset paths — serve it over HTTP and avoid the false negative.

## What proves it works

**Done means screenshots of the nine sections at desktop and mobile widths.**
Only the eye judges spacing, motion and color, and a claim that "it rendered"
settles nothing for 003.

Exercise the moving parts explicitly: the depoimentos slider loops, the card-faq
hover reveals its answer, the hero fills the viewport, the nav scrolls away, the
scroll reveals fire. Note anything already broken — a defect inherited silently
becomes a migration bug later.

Depends on nothing. Runs in parallel with 001.
