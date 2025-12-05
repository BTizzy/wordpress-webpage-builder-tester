#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "$0")/.." && pwd)"
THEME_DIR="$ROOT_DIR/trillium-wp-theme"

if [ ! -d "$THEME_DIR" ]; then
  echo "Error: expected theme directory at $THEME_DIR" >&2
  exit 1
fi

PHP_FILES=$(find "$THEME_DIR" -type f -name "*.php")
if [ -z "$PHP_FILES" ]; then
  echo "No PHP files found in $THEME_DIR" >&2
  exit 1
fi

STATUS=0
while IFS= read -r file; do
  if ! php -l "$file"; then
    STATUS=1
  fi
done <<< "$PHP_FILES"

if [ $STATUS -ne 0 ]; then
  echo "PHP lint failed." >&2
  exit $STATUS
fi

echo "All theme PHP files passed php -l."
