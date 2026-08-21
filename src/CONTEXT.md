---
audience: agents, this folder
max_words_per_paragraph: 50
max_paragraphs_per_section: 3
---

# src

## What lives here

**All code lives in `src/`; `tasks/` holds only the reasoning.** A task folder
that also holds code makes the code invisible the day the task is closed, and
splits the tree by when work happened instead of by what the thing is.

Today: `docker.yaml` (the local WordPress + ACF environment) and, once 003
starts, `theme/fia-digital/` (the WordPress theme). `prototype/` is the cloned
static reference and is gitignored — it belongs to another repository.

Paths here are stable and tasks point at them. A task never owns a path; it
names one.
