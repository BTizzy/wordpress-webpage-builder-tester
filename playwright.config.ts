import { defineConfig, devices } from '@playwright/test';

export default defineConfig({
  testDir: './tests',
  fullyParallel: true,
  forbidOnly: !!process.env.CI,
  retries: process.env.CI ? 2 : 0,
  workers: process.env.CI ? 1 : undefined,
  reporter: 'html',
  use: {
    baseURL: 'https://www.trillycorp.com',
    trace: 'on-first-retry',
  },
  projects: [
    {
      name: 'desktop-chrome',
      use: { ...devices['Desktop Chrome'] },
    },
    {
      name: 'ipad',
      use: { ...devices['iPad (gen 7)'] },
    },
    {
      name: 'iphone-x',
      // Explicit iPhone X-class viewport, using WebKit to better match iOS Safari behavior.
      use: {
        ...devices['iPhone X'],
        browserName: 'webkit',
      },
    },
    {
      name: 'pixel-5',
      use: { ...devices['Pixel 5'] },
    },
    {
      name: 'small-android',
      // Compact Android safety net (small viewport + high DPR). This approximates a modern
      // small Android device class when a specific model (e.g., S25) isn't available.
      use: {
        ...devices['Pixel 5'],
        viewport: { width: 360, height: 780 },
        deviceScaleFactor: 3,
      },
    },
    {
      name: 'samsung-ultra',
      use: {
        ...devices['Galaxy S9+'],
        viewport: { width: 412, height: 915 },
        deviceScaleFactor: 3.5,
      },
    },
    {
      name: 'iphone-13-pro-max',
      use: { ...devices['iPhone 13 Pro Max'], browserName: 'webkit' },
    },
    {
      name: 'iphone-se',
      use: { ...devices['iPhone SE'] },
    },
    {
      name: 'moto-g4',
      use: { ...devices['Moto G4'] },
    },
  ],
});
