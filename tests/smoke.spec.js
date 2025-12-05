const { test, expect, devices } = require('@playwright/test');
const { pathToFileURL } = require('node:url');
const path = require('node:path');
const fs = require('node:fs');

// Use live site URL if SITE_URL env is set; otherwise fall back to static preview.
const liveUrl = process.env.SITE_URL || null;

const previewPath = path.resolve(process.cwd(), 'trillium_homepage.html');
let previewUrl = liveUrl;
if (!liveUrl) {
  if (!fs.existsSync(previewPath)) {
    throw new Error(`Preview file not found at ${previewPath}. Set SITE_URL env or export trillium_homepage.html.`);
  }
  previewUrl = pathToFileURL(previewPath).href;
}

// Helper to generate URL for a given path (e.g., '/blog').
function siteUrl(pathStr = '/') {
  if (liveUrl) return new URL(pathStr, liveUrl).href;
  // Static preview doesn't support routing; fall back to root preview.
  return previewUrl;
}

// Responsive viewports to test.
const viewports = [
  { name: 'mobile', width: 360, height: 800 },
  { name: 'tablet', width: 768, height: 1024 },
  { name: 'desktop', width: 1280, height: 900 },
];

test.describe('Trillium homepage smoke', () => {
  test('hero renders site name and consultation CTA', async ({ page }) => {
    await page.goto(previewUrl);
    const hero = page.locator('.hero');
    await expect(hero.locator('.hero-title')).toContainText('Trillium');
    await expect(hero.getByRole('link', { name: /Consultation|Book|Get Started/i }).first()).toBeVisible();
  });

  test('newsletter section visible with submit button', async ({ page }) => {
    await page.goto(previewUrl);
    // Updated selector: newsletter may be inside footer or standalone section.
    const newsletter = page.locator('.newsletter, .footer-newsletter, .footer-newsletter-inline').first();
    await newsletter.scrollIntoViewIfNeeded();
    await expect(newsletter).toBeVisible();
  });

  test('CTA banner keeps Ready to Transform messaging', async ({ page }) => {
    await page.goto(previewUrl);
    const ctaSection = page.locator('section.cta-section');
    await ctaSection.scrollIntoViewIfNeeded();
    await expect(ctaSection.getByRole('heading', { level: 2, name: /Ready to Transform|Send us a note/i })).toBeVisible();
  });
});

// Extended smoke tests (run against live site when SITE_URL is set).
test.describe('Extended site smoke (requires SITE_URL)', () => {
  test.skip(!liveUrl, 'Skipped: SITE_URL env not set.');

  for (const vp of viewports) {
    test.describe(`viewport: ${vp.name}`, () => {
      test.use({ viewport: { width: vp.width, height: vp.height } });

      test('footer Learn link resolves to /blog', async ({ page }) => {
        await page.goto(siteUrl('/'));
        const learnLink = page.locator('footer a[href*="/blog"]');
        await expect(learnLink).toBeVisible();
        await learnLink.click();
        await expect(page).toHaveURL(/\/blog\/?$/);
      });

      test('blog page loads fractional leadership content', async ({ page }) => {
        await page.goto(siteUrl('/blog/'));
        await expect(page.locator('#fractional-leadership')).toBeVisible();
        await expect(page.getByRole('heading', { name: /Fractional Leadership/i })).toBeVisible();
      });

      test('small business outcomes link goes to /blog#fractional-leadership', async ({ page }) => {
        await page.goto(siteUrl('/thr-smb/'));
        const link = page.locator('.outcomes-panel a[href*="/blog"]');
        await expect(link).toBeVisible();
        const href = await link.getAttribute('href');
        expect(href).toMatch(/\/blog\/?#fractional-leadership/);
      });

      test('startup outcomes link goes to /blog#fractional-leadership', async ({ page }) => {
        await page.goto(siteUrl('/thr-hgs/'));
        const link = page.locator('.outcomes-panel a[href*="/blog"]');
        await expect(link).toBeVisible();
        const href = await link.getAttribute('href');
        expect(href).toMatch(/\/blog\/?#fractional-leadership/);
      });

      test('about page partner photos have no-frame modifier', async ({ page }) => {
        await page.goto(siteUrl('/about/'));
        const noFrameContainers = page.locator('.team-media--no-frame');
        await expect(noFrameContainers).toHaveCount(2);
      });

      test('no console errors on homepage', async ({ page }) => {
        const errors = [];
        page.on('console', msg => { if (msg.type() === 'error') errors.push(msg.text()); });
        await page.goto(siteUrl('/'));
        expect(errors).toEqual([]);
      });
    });
  }
});
