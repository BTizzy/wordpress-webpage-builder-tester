# Testing Trillium WordPress Theme

Two lightweight checks are available:

1. PHP linting for all theme templates.
2. Playwright-based smoke tests against the exported `wordpress-final-preview.html` file.

## 1. PHP Template Linting

### Prerequisites
- PHP 8.x (installed earlier in this workspace)
- macOS or any Unix-like shell that can run Bash scripts

### Run
From the repository root:

```bash
bash scripts/run-tests.sh
```

This script:
1. Locates every `*.php` file under `trillium-wp-theme/`.
2. Runs `php -l` against each file.
3. Exits non-zero if any syntax errors are detected.

### Interpretation
- **Success:** Outputs `All theme PHP files passed php -l.` and returns exit code `0`.
- **Failure:** Prints the `php -l` error for the offending file(s) and exits non-zero so CI/pre-commit hooks can block the change.

## 2. Front-end Smoke Tests (Playwright)

These smoke tests open the saved `trillium_homepage.html` file in headless Chromium and confirm the hero, CTA, and newsletter blocks render as expected.

### Prerequisites
- Node.js 18+ (installed via Homebrew)
- Playwright browsers (`npx playwright install chromium` already run once)

### Run

```bash
npm test
```

Or run both linting and smoke tests together:

```bash
npm run test:all
```

### Interpretation
- **Success:** Playwright reports `3 passed` (or similar) and exits with code `0`.
- **Failure:** The failing assertion is logged with a trace/screenshot path so you can inspect what differed in the preview HTML.

## 3. Live mobile regression gates (recommended before/after deployments)

These tests are the “what a user sees” safety net. They:

- Assert key mobile layout behaviors (hero not hidden under nav, CTA padding present, Contact cards not too narrow, copy changes like Ryan bio).
- Capture **anchored screenshots** for the affected sections so you can review the same places visually in the HTML test report.

### Projects (device profiles)

Configured in `playwright.config.ts`:

- `iphone-se` (tiny phone regression guard)
- `iphone-x` (iOS Safari/WebKit, iPhone X-class viewport)
- `small-android` (compact Android approximation)
- `ipad` (tablet)

### Run against the live site

Set `SITE_URL` to point Playwright at production (or staging) and run the mobile gates:

```bash
SITE_URL=https://trillycorp.com npx playwright test tests/smoke.spec.js --project=iphone-se --grep "iPhone SE landing hero checks|signals:"
SITE_URL=https://trillycorp.com npx playwright test tests/smoke.spec.js --project=iphone-x --grep "iPhone SE landing hero checks|signals:"
SITE_URL=https://trillycorp.com npx playwright test tests/smoke.spec.js --project=small-android --grep "iPhone SE landing hero checks|signals:"
SITE_URL=https://trillycorp.com npx playwright test tests/smoke.spec.js --project=ipad --grep "iPhone SE landing hero checks|signals:"
```

### View the report / screenshots

After a run:

```bash
npx playwright show-report
```

Tip: the `signals:` test attaches viewport screenshots at the exact sections we care about (SMB hero, Startup hero, Contact “What to expect”, Homepage CTA, About Ryan card), so future changes can be verified quickly.

## Next steps
Future enhancements could include:
- [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer) to enforce coding standards.
- WordPress-specific integration tests via WP-CLI scaffolded PHPUnit suites.
- Playwright smoke tests that point to a running local/staging WordPress instance once available.
