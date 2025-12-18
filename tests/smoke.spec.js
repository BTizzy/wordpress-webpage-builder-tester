const { test, expect } = require('@playwright/test');
const { pathToFileURL } = require('node:url');
const path = require('node:path');
const fs = require('node:fs');

const liveUrl = process.env.SITE_URL || null;

const homePreviewPath = path.resolve(process.cwd(), 'trillium_homepage.html');
const aboutPreviewPath = path.resolve(process.cwd(), 'about-page-preview.html');
const resourcesPreviewPath = path.resolve(process.cwd(), 'resources-preview.html');

if (!liveUrl) {
  if (!fs.existsSync(homePreviewPath)) {
    throw new Error(`Preview file not found at ${homePreviewPath}. Set SITE_URL env or export trillium_homepage.html.`);
  }
  if (!fs.existsSync(aboutPreviewPath)) {
    throw new Error(`Preview file not found at ${aboutPreviewPath}. Generate about-page-preview.html to continue.`);
  }
}

const homePreviewUrl = liveUrl ? new URL('/', liveUrl).href : pathToFileURL(homePreviewPath).href;
const aboutPreviewUrl = liveUrl ? new URL('/about/', liveUrl).href : pathToFileURL(aboutPreviewPath).href;
const resourcesPreviewUrl = liveUrl
  ? new URL('/resources/', liveUrl).href
  : fs.existsSync(resourcesPreviewPath)
    ? pathToFileURL(resourcesPreviewPath).href
    : null;

function siteUrl(pathStr = '/') {
  if (liveUrl) return new URL(pathStr, liveUrl).href;
  const normalized = pathStr.replace(/#.*/, '').toLowerCase();
  if (normalized.startsWith('/about')) return aboutPreviewUrl;
  return homePreviewUrl;
}

const viewports = [
  { name: 'desktop', width: 1440, height: 900 },
  { name: 'mid-desktop', width: 1280, height: 800 },
  { name: 'tablet', width: 1024, height: 768 },
  { name: 'tablet-portrait', width: 820, height: 1180 },
  { name: 'large-phone', width: 414, height: 896 },
  { name: 'small-phone', width: 360, height: 780 },
  { name: 'tiny-phone', width: 320, height: 640 },
];

test.describe('Homepage essentials', () => {
  test('hero renders site name and consultation CTA', async ({ page }) => {
    await page.goto(homePreviewUrl);
    const hero = page.locator('.hero');
    const heroTitle = hero.locator('.hero-title');
    await expect(heroTitle).toBeVisible();
    await expect(heroTitle).not.toHaveText(/^\s*$/);
    await expect(hero.getByRole('link', { name: /Consultation|Book|Our Services/i }).first()).toBeVisible();
  });

  test('services section precedes value proposition', async ({ page }) => {
    await page.goto(homePreviewUrl);
    const orderIsCorrect = await page.evaluate(() => {
      const services = document.querySelector('section.services-preview');
      const value = document.querySelector('section.value-prop');
      if (!services || !value) return null;
      return (services.compareDocumentPosition(value) & Node.DOCUMENT_POSITION_FOLLOWING) > 0;
    });
    expect(orderIsCorrect).not.toBeNull();
    expect(orderIsCorrect).toBeTruthy();
  });

  test('value grid shows four cards', async ({ page }) => {
    await page.goto(homePreviewUrl);
    await expect(page.locator('.value-grid .value-card')).toHaveCount(4);
  });

  test('newsletter section visible with submit button', async ({ page }) => {
    await page.goto(homePreviewUrl);
    const newsletter = page.locator('.newsletter, .footer-newsletter, .footer-newsletter-inline').first();
    await newsletter.scrollIntoViewIfNeeded();
    await expect(newsletter).toBeVisible();
    await expect(newsletter.locator('button[type="submit"]')).toBeVisible();
  });

  test('hero height stays reasonable on phones', async ({ page }) => {
    await page.setViewportSize({ width: 360, height: 780 });
    await page.goto(homePreviewUrl);
    const heroHeight = await page.evaluate(() => {
      const hero = document.querySelector('.hero, .landing-hero');
      if (!hero) return 0;
      const { height } = hero.getBoundingClientRect();
      return height / window.innerHeight;
    });
    // Hero should fit within viewport on mobile (max 90% to leave room for scroll hint)
    expect(heroHeight).toBeLessThan(0.9);
  });

  test('no console errors on homepage preview', async ({ page }) => {
    const errors = [];
    page.on('console', msg => { if (msg.type() === 'error') errors.push(msg.text()); });
    await page.goto(homePreviewUrl);
    expect(errors).toEqual([]);
  });
});

for (const vp of viewports) {
  test.describe(`Homepage responsive – ${vp.name}`, () => {
    test.use({ viewport: { width: vp.width, height: vp.height } });

    test('no horizontal overflow', async ({ page }) => {
      await page.goto(homePreviewUrl);
      const fits = await page.evaluate(() => document.body.scrollWidth <= window.innerWidth + 1);
      expect(fits).toBeTruthy();
    });

    test('CTA section remains accessible', async ({ page }) => {
      await page.goto(homePreviewUrl);
      const cta = page.locator('section.cta-section');
      await cta.scrollIntoViewIfNeeded();
      await expect(cta.getByRole('heading', { name: /Ready to Transform/i })).toBeVisible();
    });
  });
}

test.describe('About page essentials', () => {
  test('all three team members appear in team grid', async ({ page }) => {
    await page.goto(aboutPreviewUrl);
    // All 3 team members (Amy, Vanessa, Ryan) should be in team-grid as cards
    await expect(page.locator('.team-grid .team-card h3', { hasText: 'Amy Renhard' })).toHaveCount(1);
    await expect(page.locator('.team-grid .team-card h3', { hasText: 'Vanessa Wolf' })).toHaveCount(1);
    await expect(page.locator('.team-grid .team-card h3', { hasText: 'Ryan Bartell' })).toHaveCount(1);
  });

  test('partner cards and headshots render as no-frame', async ({ page }) => {
    await page.goto(aboutPreviewUrl);
    // 3 partner cards in grid (Amy, Vanessa, Ryan), all with no-frame photos
    await expect(page.locator('.team-card.team-card--partner')).toHaveCount(3);
    await expect(page.locator('.team-media--no-frame')).toHaveCount(3);
  });

  test('about hero stays compact on phones', async ({ page }) => {
    await page.setViewportSize({ width: 360, height: 780 });
    await page.goto(aboutPreviewUrl);
    const tooTall = await page.evaluate(() => {
      const hero = document.querySelector('.hero, .landing-hero');
      if (!hero) return false;
      const { height } = hero.getBoundingClientRect();
      return height / window.innerHeight > 0.85;
    });
    expect(tooTall).toBeFalsy();
  });
});

for (const vp of viewports) {
  test.describe(`About page responsive – ${vp.name}`, () => {
    test.use({ viewport: { width: vp.width, height: vp.height } });

    test('layout stays within viewport width', async ({ page }) => {
      await page.goto(aboutPreviewUrl);
      const fits = await page.evaluate(() => document.body.scrollWidth <= window.innerWidth + 1);
      expect(fits).toBeTruthy();
    });

    test('partner bios remain visible', async ({ page }) => {
      await page.goto(aboutPreviewUrl);
      await expect(page.locator('.team-card h3', { hasText: 'Vanessa Wolf' })).toBeVisible();
      await expect(page.locator('.team-card h3', { hasText: 'Ryan Bartell' })).toBeVisible();
    });
  });
}

for (const vp of viewports) {
  test.describe(`Visual stills – ${vp.name}`, () => {
    test.use({ viewport: { width: vp.width, height: vp.height } });

    const pages = [
      { name: 'home', url: homePreviewUrl },
      { name: 'about', url: aboutPreviewUrl },
      ...(resourcesPreviewUrl ? [{ name: 'resources', url: resourcesPreviewUrl }] : []),
    ];

    for (const pageDef of pages) {
      test(`capture ${pageDef.name} preview still`, async ({ page }, testInfo) => {
        await page.goto(pageDef.url);
        await page.waitForLoadState('networkidle');
        const screenshotPath = testInfo.outputPath(`preview-${pageDef.name}-${vp.name}.png`);
        await page.screenshot({ path: screenshotPath, fullPage: true });
        await testInfo.attach(`still-${pageDef.name}-${vp.name}`, {
          path: screenshotPath,
          contentType: 'image/png',
        });
      });
    }
  });
}

// Extended smoke tests (run against live site when SITE_URL is set).
test.describe('Extended site smoke (requires SITE_URL)', () => {
  test.skip(!liveUrl, 'Skipped: SITE_URL env not set.');

  test.describe('iPhone SE landing hero checks', () => {
    test.use({ viewport: { width: 360, height: 780 } });

    test('Homepage: Ready to Transform CTA has top padding on mobile', async ({ page }) => {
      await page.goto(siteUrl('/'));
      await page.waitForLoadState('networkidle');

      const ctaSection = page.locator('section.cta-section').first();
      await expect(ctaSection).toBeVisible();
      await ctaSection.scrollIntoViewIfNeeded();
      await expect(ctaSection.getByRole('heading', { name: /Ready to Transform/i })).toBeVisible();

      // We want visible breathing room above the CTA content block on small screens.
      // Signal: the content's padding-top should be >= 12px.
      const paddingTop = await ctaSection.evaluate(el => {
        const target = el.querySelector('.cta-content') || el.querySelector('.container') || el;
        return parseFloat(window.getComputedStyle(target).paddingTop || '0');
      });
      expect(paddingTop).toBeGreaterThanOrEqual(12);
    });

    test('SMB hero is visible and not overlapped (baseline mobile bug guard)', async ({ page }) => {
      await page.goto(siteUrl('/thr-smb/'));
      await page.waitForLoadState('networkidle');

      const hero = page.locator('section.landing-hero').first();
      const title = hero.locator('h1.landing-title').first();
      const cta = hero.locator('a.btn.btn-primary').first();
      const stats = hero.locator('.landing-hero-visual .stats-preview').first();

      await expect(hero).toBeVisible();
      await expect(title).toBeVisible();
      await expect(cta).toBeVisible();
      await expect(stats).toBeVisible();

      // Confirm the hero title isn't hidden under the fixed nav.
      const titleTop = await title.evaluate(el => el.getBoundingClientRect().top);
      expect(titleTop).toBeGreaterThan(60);

      // Confirm hero text block and stats card do not overlap on tiny screens.
      const overlaps = await page.evaluate(() => {
        const text = document.querySelector('.landing-hero-text');
        const statsEl = document.querySelector('.landing-hero-visual .stats-preview');
        if (!text || !statsEl) return false;
        const a = text.getBoundingClientRect();
        const b = statsEl.getBoundingClientRect();
        const overlapX = Math.max(0, Math.min(a.right, b.right) - Math.max(a.left, b.left));
        const overlapY = Math.max(0, Math.min(a.bottom, b.bottom) - Math.max(a.top, b.top));
        return overlapX > 4 && overlapY > 4;
      });
      expect(overlaps).toBeFalsy();
    });

    test('SMB: post-hero CTA has top padding on mobile', async ({ page }) => {
      await page.goto(siteUrl('/thr-smb/'));
      await page.waitForLoadState('networkidle');

      const ctaSection = page.locator('section.cta-section').first();
      await expect(ctaSection).toBeVisible();
      await ctaSection.scrollIntoViewIfNeeded();

      // The SMB page uses a “Send us a note…” CTA block. Validate padding exists
      // on the inner CTA content/container so it doesn't look glued to the top.
      const paddingTop = await ctaSection.evaluate(el => {
        const target = el.querySelector('.cta-content') || el.querySelector('.container') || el;
        return parseFloat(window.getComputedStyle(target).paddingTop || '0');
      });
      expect(paddingTop).toBeGreaterThanOrEqual(12);
    });

    test('Startup: hero title is not hidden under the nav on mobile', async ({ page }) => {
      await page.goto(siteUrl('/thr-hgs/'));
      await page.waitForLoadState('networkidle');

      const hero = page.locator('section.landing-hero, section.startup-hero, .startup-hero').first();
      await expect(hero).toBeVisible();
      const title = hero.locator('h1, .landing-title').first();
      await expect(title).toBeVisible();

      const titleTop = await title.evaluate(el => el.getBoundingClientRect().top);
      expect(titleTop).toBeGreaterThan(60);
    });

    test('Contact: What to expect items are not ultra-narrow on mobile', async ({ page }) => {
      await page.goto(siteUrl('/contact/'));
      await page.waitForLoadState('networkidle');

      // Scroll to the expectations/info section.
      const expectationItem = page.locator('.expectation-item').first();
      await expect(expectationItem).toBeVisible();
      await expectationItem.scrollIntoViewIfNeeded();

      // Signal: the expectation card should occupy a meaningful portion of the view.
      // We treat this as a layout guard so text doesn't end up in a skinny column.
      const ratio = await expectationItem.evaluate(el => el.getBoundingClientRect().width / window.innerWidth);
      // Now that the layout fills most of the viewport, this can land exactly at 0.75.
      // Use >= to avoid borderline float rounding flake while still catching regressions.
      expect(ratio).toBeGreaterThanOrEqual(0.75);
    });

    test('About: Ryan bio includes “systems” wording', async ({ page }) => {
      await page.goto(siteUrl('/about/'));
      await page.waitForLoadState('networkidle');

      const ryanCard = page.locator('.team-card', { hasText: 'Ryan Bartell' }).first();
      await expect(ryanCard).toBeVisible();
      await ryanCard.scrollIntoViewIfNeeded();

      // The deployment asked to change “data” -> “systems”.
      await expect(ryanCard).toContainText(/systems/i);
    });
  });

  for (const vp of viewports) {
    test.describe(`viewport: ${vp.name}`, () => {
      test.use({ viewport: { width: vp.width, height: vp.height } });

      test('footer Resources link resolves to /resources', async ({ page }) => {
        await page.goto(siteUrl('/'));
        const resourcesLink = page.locator('footer a[href*="/resources"]');
        await expect(resourcesLink).toBeVisible();
        await resourcesLink.click();
        await expect(page).toHaveURL(/\/resources\/?$/);
      });

      test('resources page loads fractional leadership content', async ({ page }) => {
        await page.goto(siteUrl('/resources/'));
        await expect(page.locator('#fractional-leadership')).toBeVisible();
        await expect(page.getByRole('heading', { name: /Fractional Leadership/i })).toBeVisible();
        const isOpaque = await page.evaluate(() => {
          const el = document.querySelector('#fractional-leadership');
          if (!el) return true;
          const style = window.getComputedStyle(el);
          return style.opacity !== '0';
        });
        expect(isOpaque).toBeTruthy();
      });

      test('small business outcomes link goes to /resources#fractional-leadership', async ({ page }) => {
        await page.goto(siteUrl('/thr-smb/'));
        const link = page.locator('.outcomes-panel a[href*="/resources"]');
        await expect(link).toBeVisible();
        const href = await link.getAttribute('href');
        expect(href).toMatch(/\/resources\/?#fractional-leadership/);
      });

      test('startup outcomes link goes to /resources#fractional-leadership', async ({ page }) => {
        await page.goto(siteUrl('/thr-hgs/'));
        const link = page.locator('.outcomes-panel a[href*="/resources"]');
        await expect(link).toBeVisible();
        const href = await link.getAttribute('href');
        expect(href).toMatch(/\/resources\/?#fractional-leadership/);
      });

      test('about page partner photos have no-frame modifier', async ({ page }) => {
        await page.goto(siteUrl('/about/'));
        const noFrameContainers = page.locator('.team-media--no-frame');
        // 3 team members with no-frame (Amy in feature + Vanessa, Ryan in grid)
        await expect(noFrameContainers).toHaveCount(3);
      });

      test('no console errors on homepage', async ({ page }) => {
        const errors = [];
        page.on('console', msg => { if (msg.type() === 'error') errors.push(msg.text()); });
        await page.goto(siteUrl('/'));
        expect(errors).toEqual([]);
      });
    });
  }

  test.describe('Visual stills – live resources and key pages', () => {
    test.use({ viewport: { width: 360, height: 780 } });

    const livePages = [
      { name: 'home-live', url: siteUrl('/') },
      { name: 'about-live', url: siteUrl('/about/') },
      { name: 'smb-live', url: siteUrl('/thr-smb/') },
      { name: 'startup-live', url: siteUrl('/thr-hgs/') },
      { name: 'contact-live', url: siteUrl('/contact/') },
      { name: 'resources-live', url: siteUrl('/resources/') },
    ];

    for (const pageDef of livePages) {
      test(`capture live still: ${pageDef.name}`, async ({ page }, testInfo) => {
        await page.goto(pageDef.url);
        await page.waitForLoadState('networkidle');
        const screenshotPath = testInfo.outputPath(`preview-${pageDef.name}-live.png`);
        await page.screenshot({ path: screenshotPath, fullPage: true });
        await testInfo.attach(`still-${pageDef.name}`, {
          path: screenshotPath,
          contentType: 'image/png',
        });
      });
    }
  });

  test.describe('Visual stills – live mobile (section signals)', () => {
    test.use({ viewport: { width: 360, height: 780 } });

    async function captureAnchored(page, testInfo, name, selector) {
      await page.waitForLoadState('networkidle');
      const anchor = page.locator(selector).first();
      await expect(anchor).toBeVisible();
      await anchor.scrollIntoViewIfNeeded();
      await page.waitForTimeout(250);
      const screenshotPath = testInfo.outputPath(`signal-${name}.png`);
      await page.screenshot({ path: screenshotPath, fullPage: false });
      await testInfo.attach(`signal-${name}`, {
        path: screenshotPath,
        contentType: 'image/png',
      });
    }

    test('signals: home CTA / SMB hero+CTA / startup hero / contact expectations / about Ryan', async ({ page }, testInfo) => {
      await page.goto(siteUrl('/'));
      await captureAnchored(page, testInfo, 'home-cta-ready-to-transform', 'section.cta-section');

      await page.goto(siteUrl('/thr-smb/'));
      await captureAnchored(page, testInfo, 'smb-hero', 'section.landing-hero');
      await captureAnchored(page, testInfo, 'smb-cta', 'section.cta-section');

      await page.goto(siteUrl('/thr-hgs/'));
      await captureAnchored(page, testInfo, 'startup-hero', 'section.landing-hero, .startup-hero, section.startup-hero');

      await page.goto(siteUrl('/contact/'));
      await captureAnchored(page, testInfo, 'contact-what-to-expect', '.expectation-item');

      await page.goto(siteUrl('/about/'));
      await captureAnchored(page, testInfo, 'about-ryan-card', '.team-card');
    });
  });
});

// Resources preview checks if local file is available
if (resourcesPreviewUrl) {
  test.describe('Resources preview essentials', () => {
    test('article renders and is visible', async ({ page }) => {
      await page.goto(resourcesPreviewUrl);
      await expect(page.locator('.blog-article')).toBeVisible();
      const hasContent = await page.evaluate(() => {
        const article = document.querySelector('.blog-article');
        return article ? article.textContent.trim().length > 100 : false;
      });
      expect(hasContent).toBeTruthy();
    });

    test('role grid fits viewport on tiny phone', async ({ page }) => {
      await page.setViewportSize({ width: 320, height: 640 });
      await page.goto(resourcesPreviewUrl);
      const noHorizontalScroll = await page.evaluate(() => document.body.scrollWidth <= window.innerWidth + 1);
      expect(noHorizontalScroll).toBeTruthy();
    });
  });
}
