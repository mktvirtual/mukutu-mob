---
task: 002_run_prototype_from_git
verdict: done
date: 2026-08-21
---

# 002 — Output

## Verdict

**Done.** The prototype runs locally at http://localhost:8001 and the visual
reference was captured at both widths, with no console errors.

## What was run

```sh
gh repo clone felipemukutu/fia-digital-test src/prototype
cd src/prototype/public && python3 -m http.server 8001
```

`src/prototype/` is a clone of another repository and is gitignored —
`git status --short` shows nothing, confirmed. No repository file was edited by
this task.

Browser automation: no Chrome or Playwright MCP tool existed in this session, so
Playwright plus a cached Chromium was installed under the scratchpad — outside
the repo — and driven headless.

## Measured

| Check | Result |
| --- | --- |
| Nine sections at 1440px and 390px | all present, one element each |
| Hero fills viewport | `#hero` height 900px = `window.innerHeight` 900px |
| Nav scrolls away | out of frame after `scrollTo(0, 1200)`; not sticky |
| `card-faq` hover | `#faq-resposta-1` `grid-template-rows` 0px → 99.5625px |
| Depoimentos slider loop | wraps after 3 slides via `#depoimentos-next` |
| GSAP reveals | all 16 `[data-reveal]` reach `.is-visivel` / `opacity: 1` |
| Console errors | none — `console[error]` and `pageerror` both empty, both widths |

Screenshots live outside the repository, in the session scratchpad, so no binary
enters a public repo: `proto-shots/desktop-full.png`,
`proto-shots/mobile-full.png`, `proto-shots/desktop-faq-hover.png`,
`proto-shots/desktop-nav-scrolled.png`.

## Defects found in the prototype

**The depoimentos slider has no autoplay.** `script.js` initialises Swiper with
`loop: true` and no `autoplay` config, so slides only advance on arrow click or
keyboard. If auto-rotation was the intent, that is a product decision, not a
bug 003 should copy.

**Testimonial content is placeholder.** All three slides sign as literally "Nome
do Aluno", across the roles Diretor de Operações, Gerente de Produto and Head de
Dados.

Nothing else broke: no failed asset, no layout break at either width.

## Not verified

The mobile hamburger (`#nav-toggle` / `#nav-menu`), keyboard-only accessibility
paths, and the touch path of the FAQ — the CSS opens it through
`.is-aberto` / `:focus-within`, which hover never exercises.

Behaviour if the DM Sans request fails was not tested; only the normal-network
case was observed.

## References

Prototype source: `felipemukutu/fia-digital-test` @ `b069fb6`. Port moved from
8000 to 8001 in commit `ee30d07`, because SurrealDB already listened on 8000 —
see `LINKS.md`.
