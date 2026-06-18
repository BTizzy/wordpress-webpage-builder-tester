#!/usr/bin/env python3
"""Quick visual capture — just the key screenshots."""
import time
from pathlib import Path
from playwright.sync_api import sync_playwright

OUT = Path(__file__).parent / "screenshots"
OUT.mkdir(exist_ok=True)
BASE = "http://127.0.0.1:8765"

with sync_playwright() as p:
    browser = p.chromium.launch(headless=True)

    # Desktop
    ctx = browser.new_context(viewport={"width": 1440, "height": 900})
    page = ctx.new_page()
    page.goto(f"{BASE}/contact", wait_until="networkidle", timeout=15000)
    page.wait_for_selector("#hubspot-contact-form iframe", timeout=10000)
    time.sleep(2)
    page.screenshot(path=str(OUT / "v9-desktop-full.png"), full_page=True)
    print(f"✅ v9-desktop-full.png")

    form_container = page.locator("#contact-form")
    form_container.scroll_into_view_if_needed()
    time.sleep(0.5)
    form_container.screenshot(path=str(OUT / "v9-desktop-form.png"))
    print(f"✅ v9-desktop-form.png")

    # Submit form
    fl = page.frame_locator("#hubspot-contact-form iframe").first
    fl.get_by_label("First Name").fill("Ryan")
    fl.get_by_label("Last Name").fill("Bartell")
    fl.get_by_label("Work Email").fill(f"ryan.bartell.v9.final.{int(time.time())}@trillycorp.com")
    fl.get_by_label("Company Name").fill("Trillium Hiring")
    fl.get_by_label("Phone Number").fill("4015596483")
    fl.get_by_label("Message").fill("v9 final visual test — please ignore")
    fl.locator('input[type="submit"]').first.click()
    time.sleep(3)
    page.screenshot(path=str(OUT / "v9-desktop-submitted.png"), full_page=False)
    print(f"✅ v9-desktop-submitted.png")

    ctx.close()

    # Mobile
    ctx = browser.new_context(viewport={"width": 390, "height": 844}, device_scale_factor=3, is_mobile=True, has_touch=True)
    page = ctx.new_page()
    page.goto(f"{BASE}/contact", wait_until="networkidle", timeout=15000)
    page.wait_for_selector("#hubspot-contact-form iframe", timeout=10000)
    time.sleep(2)
    page.screenshot(path=str(OUT / "v9-mobile-full.png"), full_page=True)
    print(f"✅ v9-mobile-full.png")

    form_container = page.locator("#contact-form")
    form_container.scroll_into_view_if_needed()
    time.sleep(0.5)
    form_container.screenshot(path=str(OUT / "v9-mobile-form.png"))
    print(f"✅ v9-mobile-form.png")

    ctx.close()
    browser.close()
print("\n=== All screenshots ===")
for f in sorted(OUT.glob("*.png")):
    print(f"  {f.name}  {f.stat().st_size//1024}KB")
