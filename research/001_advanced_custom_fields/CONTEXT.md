---
audience: agents, this repo
max_words_per_paragraph: 25
max_paragraphs_per_section: 3
source: https://www.advancedcustomfields.com/resources/
fetched: 2026-08-21
---

# 001 — Advanced Custom Fields

## What it is

**ACF puts custom fields on WordPress edit screens and hands them back to the
template through a small PHP API.**

You build a field group, attach it with location rules, then read values in the
theme. No custom tables: values land in post meta.

## Free versus PRO

**The split is the whole planning risk here.** Free gives 30-plus field types,
the full API, and attachment to posts, users, terms, media and comments.

PRO adds the layout artillery: Repeater, Flexible Content, Gallery, Clone,
Options Pages, Blocks. Repetition is what a landing page is made of.

Our baseline installs free. Any block needing repetition must be modelled some
other way, or the licence becomes a demand question with a price.

## Reading fields in a template

`get_field()` returns a value, `the_field()` prints it, `get_fields()` returns
all, `get_field_object()` returns settings.

Repeating structures loop with `have_rows()` plus `get_sub_field()`. Writes use
`update_field()`, `add_row()`, `delete_row()`.

## Field groups as code

**ACF exports field groups, and that is how they reach git.** Tools exports
JSON to re-import, or generated PHP to paste into the theme.

Local JSON is better: an `acf-json/` folder in the theme, written on save, with
a sync screen pulling newer files into the database.

That makes field definitions reviewable in a diff and identical across machines
— the reason a shared team can run the same site twice.

## Why this matters to us

**It is effectively the only plugin this team leans on.** Its limits are our
limits; its export is our field source of truth.

Task 003 must name each field's type and whether it repeats. Research says
"repeats" is not free — that decision now has a price.

## Measured, not read

**Confirmed in our own container: free ACF ships no Repeater.** Its
`includes/fields/` holds 33 classes and no `repeater`, `flexible_content`,
`gallery` or `clone`, and no `pro/` directory.

Versions installed by task 001: WordPress **7.1**, ACF **6.8.8**. See
`tasks/001_wordpress_docker_baseline/OUTPUT.md`.

## Still unverified

Whether a PRO licence is worth buying, and what a repeating block costs when
modelled without Repeater. Both are decisions, not measurements.
