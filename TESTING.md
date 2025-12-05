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

## Next steps
Future enhancements could include:
- [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer) to enforce coding standards.
- WordPress-specific integration tests via WP-CLI scaffolded PHPUnit suites.
- Playwright smoke tests that point to a running local/staging WordPress instance once available.
