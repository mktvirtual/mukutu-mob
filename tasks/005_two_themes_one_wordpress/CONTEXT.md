---
audience: agents, this task
max_words_per_paragraph: 50
max_paragraphs_per_section: 3
---

# 005 — Two themes, one WordPress

## Why this task exists

**Mind Summit 2026 is a second design, and it arrives before the first pipeline
is finished.** That is good news: two clients is what turns a one-off migration
into a workflow, and it is the first real test of `mukutu-base`.

The question to answer is narrow: can one WordPress serve both, or does each
design need its own site? Everything else here depends on that answer.

## What WordPress actually allows

**One site has exactly one active theme.** Two designs live together only in one
of three shapes, and they are not interchangeable.

Two child themes over `mukutu-base`, switched per environment — cheapest, but
only one is live at a time. Multisite, one site per design sharing the same
install and theme folder — both live, one login, more operational weight. Or two
separate installs, which is what `src/docker.yaml` already does per project.

Recommendation: two child themes now, multisite only if someone needs both
domains live from one admin. Decide with a human before writing code — this is
a cost question, not a technical one.

## What this proves about the base

**The second theme is the exam `mukutu-base` has to pass.** Anything Mind Summit
needs that lives in the base but does not fit belongs to the child; anything
both designs need and the base lacks is a gap to close.

Do not fork the base to make Mind Summit work. A fork ends the reuse experiment
on the day it happens — record the friction instead, it is the finding.

## The source file

`Mind Summit 2026.fig` is a 268 MB binary export sitting in Downloads. The API
cannot read it and neither can we: `.fig` is Figma's own container format.

Import it into Figma and send the link, exactly as 004 expects — file key in the
path, frame in `node-id`. Until then this task is blocked on input, not on work.

## What proves it works

Both themes render their own design on the same install, switched by whatever
shape was chosen, with `mukutu-base` unchanged between them — proven by
`git diff` on the base being empty after Mind Summit ships.

Same visual acceptance as 003: `qa-drive` at 1440px and 390px, console clean,
differences named. Then `OUTPUT.md` with the chosen shape and why the other two
were rejected.

Depends on 003 (the base exists) and on the Figma link arriving.
