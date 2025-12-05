# Trillium Theme Quick Notes

You mentioned not wanting deep dev steps, so here’s the short version for future tweaks.

## 1. Where things live
- `trillium-wp-theme/` — the WordPress theme directory you’ll upload.
- `trillium_homepage.html` — static export Playwright uses for quick visual smoke tests.
- `scripts/run-tests.sh` — PHP syntax check for every template.

## 2. Quick checks before zipping
```bash
cd "/Users/ryanbartell/Downloads/exported-assets (website)"
npm run test:all
```
That command runs the PHP lint script **and** the Playwright smoke tests. Green output = safe to package.

## 3. Packaging reminder
```bash
cd "/Users/ryanbartell/Downloads/exported-assets (website)"
zip -r trillium-wp-theme-YYYY-MM-DD-HHMMSS.zip trillium-wp-theme
```
Replace the timestamp with the current date/time so you know which build was uploaded.

## 4. Updating newsletter forms
- Homepage form is driven by `[wpforms id="203"]` in the newsletter section.
- Footer form reuses the same shortcode inside `footer.php`; styling lives near the bottom of `style.css` under `/* FOOTER */`.

Ping me if you want this automated further, but these notes should keep things manageable without diving into the entire repo every time.
