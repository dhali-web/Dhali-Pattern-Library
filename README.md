# Dhali Pattern Library

A version-controlled repository of custom block patterns, FSE templates,
and template parts for sites built on the Ollie Pro WordPress theme.

Managed centrally by [Dhali Extension Manager](https://github.com/dhali-web/Dhali-Extension-Manager),
which installs and activates this plugin on a site from this repo
directly. It's also a fully standalone, valid WordPress plugin — you can
install it manually the normal way if you ever need to.

## What it does

Auto-loads every pattern and template in this repo into whatever site
it's activated on:

- **`patterns/`** — block patterns, auto-registered under a "Dhali
  Patterns" category so they're easy to find in the inserter.
- **`templates/`** — FSE block templates (`.html` files), injected into
  the active theme's template hierarchy so WordPress resolves them
  automatically, without modifying any theme files directly.
- **`snippets/`** — reusable code snippets referenced by patterns/
  templates where relevant.

## Content conventions — read before adding anything new

Everything in this repo is meant to move safely between client sites,
so nothing in a pattern or template should reference one specific
client's real content or a specific site's database:

- **Images**: use the static images bundled in this repo, not images
  pulled from a site's Media Library — a pattern that references another
  site's attachment ID breaks the moment it's used anywhere else.
  Dynamic, per-post images (the Featured Image block, and similar blocks
  that pull from the current post rather than a fixed attachment) are
  fine as-is and don't need a static replacement — but any leftover
  database attachment IDs on those blocks should still be trimmed so
  they don't silently point at an ID that doesn't exist on the new site.
- **Links**: replace real destination URLs with `#`.
- **Contact info / specific content**: replace anything
  client-specific — phone numbers, emails, addresses, named links —
  with generic placeholders: `(111) 111-1111`, `support@email.com`,
  `123 Main St, Anytown, USA`, `Quick Link`, `Location`, and so on.
- **WordPress block comments**: keep them intact. They're code, not
  decoration — stripping them breaks the pattern/template for the block
  editor.

See `dhali-placeholder-assets-manifest.json` for the current set of
static placeholder images and what each one is meant to stand in for.

## Requirements

- The [Ollie Pro](https://olliewp.com/) theme (patterns and templates
  assume its block styles, spacing, and utility classes).

## Usage

Once active on a site, every pattern shows up in the block inserter
under the "Dhali Patterns" category, and every template becomes
available from the Site Editor's template picker like any other theme
template.

## Development

No build step — patterns and templates are plain PHP (patterns) and
HTML (templates), edited and committed directly.

## Adding a new pattern or template

1. Export the pattern/template from a working site (Site Editor → the
   pattern or template → Code Editor / "Copy" as HTML, or `wp export`
   for patterns saved as `.php` with a `register_block_pattern()` args
   array).
2. Apply the content conventions above — swap images for static
   placeholders, links for `#`, real contact info for generic
   placeholders — **before** committing.
3. Drop it in `patterns/` or `templates/` with a descriptive filename.
4. Test on a second site to confirm it doesn't silently depend on
   anything from the original site (a specific page ID, a specific
   taxonomy term, etc.).

## Keeping this updated on sites where it's already installed

This plugin should carry its own update-checker
(`includes/dhali-plugin-updater.php`) and an `Update URI:` header
pointing at this repo, the same way `Dhali Copyright` does — confirmed
working there as of `0.2.0`. Copy that pattern in: the header line, the
`require_once`/`init()` call, and the updater class file.

Once wired up: bump `Version:`, push to `master`, done — sites already
running this plugin will see a normal "Update available" notice without
any manual redeploy.
