---
audience: agents, this repo
max_words_per_paragraph: 50
max_paragraphs_per_section: 3
---

<!-- WHY lives here. HOW lives in the nearest CONTEXT.md. WHAT is the code. -->

@CONTEXT.md

# mukutu-mob — why this exists

## What we already proved

**Figma to HTML works, and we like the result.** The FIA Digital home came out
of Figma as plain HTML, CSS and JS that we would ship. That half of the pipeline
is not in question here.

- Treat the static prototype as a settled result, not a draft. It is the reference the WordPress version has to match.
- Never "improve" the prototype while porting it. A change made during migration hides whether the migration worked.

## The open question

**We do not yet know if that HTML lands well in WordPress.** Everything in
`tasks/` exists to answer that, once, on a real install — not to launch a site.

- The answer is a comparison, not an opinion: the theme next to the prototype, same screens, differences named.
- A limitation found is a result. If ACF free cannot carry a block, say so with the evidence and stop — do not invent a workaround nobody chose.
- Cost belongs in the answer. A paid licence or a manual step is part of whether this pipeline is worth having.

## The real target

**We are after an automated workflow, not this one home page.** FIA is the test
case; the deliverable is knowing which steps of Figma → HTML → WordPress a
machine can repeat.

- Prefer the repeatable route over the clever one. A shortcut nobody can script twice teaches us nothing.
- Write down what had to be decided by a human. That list is where automation stops, and it is the finding.

## We are live

**The class is watching this repository while we work.** People read it as it
changes, so every push is teaching material whether we meant it or not.

- Commit small and push often. A local commit nobody can see is invisible to the people following along.
- Never push a secret, and keep local credentials obviously local. A public repo forgives nothing.
- Say what is measured and what is not. A confident claim that turns out false costs more here than a slow answer.
