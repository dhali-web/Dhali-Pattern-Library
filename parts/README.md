# File-backed template parts

Create Gutenberg block-markup HTML files here with one of these names:

- `dhali-header-<slug>.html` → WordPress `wp_template_part`, area `header`
- `dhali-footer-<slug>.html` → WordPress `wp_template_part`, area `footer`
- `dhali-sidebar-<slug>.html` → WordPress `wp_template_part`, area `sidebar` (Ollie registers this area). A sidebar part may hold a single `core/pattern` reference to a Dhali card pattern so the card has one source; the Site Editor expands it into editable blocks, and saving creates a database override as for any part.

The registry discovers **only** these names, registers them read-only, and does not activate them. Source remains in this plugin, not in the Ollie theme. For example, a footer should include the registered `create-block/dhali-copyright` dynamic block. Header/hero designs with breadcrumbs should use `create-block/dhali-breadcrumbs` when applicable; verify both dependencies are registered on the target site. Do not invent replacements if a dependency is absent.

Theme/database saved parts with the same slug take precedence. Before an approved change, check the target site's slug and whether a database customization shadows the file. Edits made in Site Editor can create a database override; those are **not** automatically written back here. A separate, approved export/sync is required.

Do not use filenames `header.html`, `footer.html` or `sidebar.html` here: these could conflict with the theme's active parts. Template references to new parts must use the same slug and the site's verified template context. Verify listing in Site Editor → Patterns → Template Parts → Header/Footer, actual frontend rendering, and editor serialization on staging before production deployment.
