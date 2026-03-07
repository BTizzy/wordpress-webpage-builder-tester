
# Create a comprehensive WordPress import guide
import_guide = """# TRILLIUM HIRING SERVICES - WORDPRESS IMPORT GUIDE

## 📋 OVERVIEW
This guide will help you import your redesigned Trillium Hiring website into WordPress while maintaining all functionality, forms, and CTAs.

---

## 🎯 STEP 1: PREPARE YOUR WORDPRESS SITE

### Required Plugins:
1. **Astra Theme** (Free) or **GeneratePress** (Free)
   - Both are lightweight, fast, and perfect for custom designs
   - Install from: Appearance → Themes → Add New

2. **WPForms Lite** (Free) or **Contact Form 7** (Free)
   - For contact forms and newsletter signup
   - Install from: Plugins → Add New

3. **Custom CSS & JS** (Optional)
   - For adding custom styles and scripts
   - Or use: Appearance → Customize → Additional CSS

4. **Calendly Integration** (Free plugin or embed code)
   - Search "Calendly" in Plugins
   - Or use embed code directly

### Theme Setup:
1. Go to Appearance → Themes
2. Install **Astra** (recommended) or **GeneratePress**
3. Activate the theme
4. Go to Customize → Layout Settings:
   - Set content width to 1200px
   - Disable theme's default header/footer (we'll use custom)
   - Set sidebar to "No Sidebar" for all pages

---

## 🎯 STEP 2: IMPORT YOUR CONTENT

### Option A: Using the WordPress XML Importer
1. Go to Tools → Import
2. Click "WordPress" → Install WordPress Importer
3. Upload your `trilliumhiring.WordPress.2025-10-26.xml`
4. Map authors (use your admin account)
5. Check "Download and import file attachments"
6. Click "Submit"

### Option B: Manual Page Creation (Recommended for clean start)
Create these pages manually:
- Home
- About Us
- Small Business Consulting
- Startup Consulting
- Contact
- Newsletter Signup

For each page:
1. Pages → Add New
2. Set title
3. Switch to "Code Editor" or use a page builder
4. Paste the corresponding HTML from our files
5. Set page template to "Full Width" or "No Sidebar"

---

## 🎯 STEP 3: ADD CUSTOM STYLES (CSS)

### Method 1: Theme Customizer (Easiest)
1. Go to Appearance → Customize
2. Click "Additional CSS"
3. Copy ALL content from `trillium_styles.css`
4. Paste into the CSS editor
5. Click "Publish"

### Method 2: Child Theme (Best Practice)
1. Create a child theme (or use Astra/GeneratePress child theme)
2. Add `trillium_styles.css` to your child theme's folder
3. Enqueue in functions.php:

```php
function trillium_custom_styles() {
    wp_enqueue_style('trillium-custom', get_stylesheet_directory_uri() . '/trillium_styles.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'trillium_custom_styles');
```

---

## 🎯 STEP 4: ADD CUSTOM JAVASCRIPT

### Method 1: Footer Scripts
1. Go to Appearance → Customize
2. Find "Additional Scripts" or "Footer Scripts"
3. Paste content from `trillium_script.js` wrapped in <script> tags:

```html
<script>
// Paste JavaScript content here
</script>
```

### Method 2: Child Theme (Recommended)
1. Add `trillium_script.js` to child theme folder
2. Enqueue in functions.php:

```php
function trillium_custom_scripts() {
    wp_enqueue_script('trillium-custom', get_stylesheet_directory_uri() . '/trillium_script.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'trillium_custom_scripts');
```

---

## 🎯 STEP 5: CREATE YOUR FORMS

### For Newsletter Signup:

1. Install WPForms Lite
2. Go to WPForms → Add New
3. Choose "Simple Contact Form" template
4. Customize to include only:
   - Email field (required)
   - Submit button text: "Subscribe"
5. Go to Settings → Notifications:
   - Set notification email to: info@trillycorp.com
6. Save and copy the shortcode (e.g., [wpforms id="123"])
7. Replace newsletter form HTML with this shortcode

### For Contact Forms:

Create separate forms for:
- **Small Business Page**: Fields - First Name, Last Name, Email, Company Name, Number of Employees, HQ Location, Message
- **Contact Page**: Fields - First Name, Last Name, Email, Company Name, Phone, Message
- **Startup Page**: Same as Small Business

For each form:
1. WPForms → Add New
2. Add all required fields
3. Set all notifications to info@trillycorp.com
4. Copy shortcode
5. Replace HTML form with shortcode in your pages

---

## 🎯 STEP 6: SETUP NAVIGATION MENU

1. Go to Appearance → Menus
2. Create a new menu called "Main Menu"
3. Add pages in this order:
   - Home
   - About
   - Small Business Consulting
   - Startup Consulting
   - Contact
4. Set menu location to "Primary" or "Main Menu"
5. Save menu

---

## 🎯 STEP 7: INTEGRATE CALENDLY

### Method 1: Direct Embed (Easiest)
1. Get your Calendly scheduling link
2. In your Contact page or CTA sections, add this code:

```html
<!-- Calendly inline widget begin -->
<div class="calendly-inline-widget" 
     data-url="https://calendly.com/YOUR-USERNAME/YOUR-EVENT" 
     style="min-width:320px;height:630px;">
</div>
<script type="text/javascript" 
        src="https://assets.calendly.com/assets/external/widget.js" 
        async>
</script>
<!-- Calendly inline widget end -->
```

### Method 2: Button Popup
Replace "Book Now" button href with:

```html
<a href="" 
   onclick="Calendly.initPopupWidget({url: 'https://calendly.com/YOUR-USERNAME/YOUR-EVENT'}); return false;" 
   class="btn btn-primary btn-large">
   Book Now
</a>
```

Add this script to footer:
```html
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
```

---

## 🎯 STEP 8: MOBILE OPTIMIZATION CHECK

1. Go to your live site
2. Open Chrome DevTools (F12)
3. Toggle device toolbar (Ctrl+Shift+M)
4. Test on multiple device sizes:
   - iPhone SE (375px)
   - iPhone 12 Pro (390px)
   - iPad (768px)
   - Desktop (1200px+)

Verify:
- Navigation menu works (hamburger menu on mobile)
- All text is readable (no tiny fonts)
- Buttons are tap-friendly (44x44px minimum)
- Forms stack properly
- No horizontal scrolling
- Images scale correctly

---

## 🎯 STEP 9: FINAL TOUCHES

### Set Homepage:
1. Go to Settings → Reading
2. Select "A static page"
3. Choose your Home page
4. Save changes

### Permalinks:
1. Go to Settings → Permalinks
2. Select "Post name" structure
3. Save changes

### SEO Setup (Optional but recommended):
1. Install "Yoast SEO" or "Rank Math"
2. Add meta descriptions for each page
3. Set focus keywords
4. Generate XML sitemap

### Performance:
1. Install "WP Rocket" or "W3 Total Cache"
2. Enable page caching
3. Enable GZIP compression
4. Minify CSS/JS
5. Enable lazy loading for images

### Analytics:
1. Add Google Analytics tracking code
2. Use "Insert Headers and Footers" plugin
3. Paste GA code in header section

---

## 🎯 STEP 10: TEST EVERYTHING

### Checklist:
- [ ] All pages load correctly
- [ ] Navigation menu works on desktop and mobile
- [ ] All forms submit successfully
- [ ] Form emails arrive at info@trillycorp.com
- [ ] Newsletter signup works
- [ ] Calendly booking works
- [ ] All buttons and links work
- [ ] Mobile responsive on all devices
- [ ] Animations work smoothly
- [ ] No console errors (F12 → Console tab)
- [ ] Images load properly
- [ ] Footer displays correctly
- [ ] Contact information is accurate

---

## 🔧 TROUBLESHOOTING

### CSS Not Loading:
1. Hard refresh browser (Ctrl+Shift+R)
2. Clear WordPress cache (if using cache plugin)
3. Check CSS is in correct location
4. Verify enqueue function in functions.php

### JavaScript Not Working:
1. Check browser console for errors (F12)
2. Make sure jQuery is loaded (WordPress loads it by default)
3. Verify script is in footer (not header)
4. Check for conflicts with other plugins

### Forms Not Submitting:
1. Check WPForms notification settings
2. Verify email address in Settings → General
3. Test with WP Mail SMTP plugin
4. Check spam folder for test emails

### Mobile Menu Not Opening:
1. Verify JavaScript file is loaded
2. Check for JavaScript errors in console
3. Make sure nav IDs match in HTML and JS
4. Test on actual mobile device (not just browser resize)

### Calendly Not Showing:
1. Verify Calendly link is correct
2. Check if external scripts are blocked
3. Try different embed method (inline vs popup)
4. Make sure Calendly account is active

---

## 📞 WORDPRESS-SPECIFIC NOTES

### Using Page Builders (Optional):
If you prefer using Elementor or WPBakery:
1. Install your preferred page builder
2. Create blank canvas templates
3. Copy HTML sections into Custom HTML widgets
4. Add our CSS via Customizer
5. Style adjustments may be needed

### Header/Footer:
For custom header/footer:
1. Install "Insert Headers and Footers" or "Code Snippets"
2. Add header HTML to header section
3. Add footer HTML to footer section
4. Or use theme's custom header/footer builder

### Forms Alternative - Contact Form 7:
```
[contact-form-7 id="123" title="Contact Form"]
```
Style with our CSS classes by adding to CF7 form fields:
```
class:input-field
```

---

## 🎨 CUSTOMIZATION GUIDE

### Changing Colors:
Edit these CSS variables in styles:
```css
:root {
    --color-black: #1a1a1a;
    --color-gold: #d4af37;
}
```

### Changing Fonts:
1. Go to Google Fonts
2. Select your fonts
3. Replace font link in HTML <head>
4. Update --font-family variable in CSS

### Adjusting Spacing:
Modify spacing variables:
```css
:root {
    --spacing-lg: 40px;
    --spacing-xl: 60px;
}
```

---

## ✅ SUCCESS CHECKLIST

Once everything is working:
- [ ] Backup your WordPress site
- [ ] Test all forms by submitting test data
- [ ] Send test booking through Calendly
- [ ] Check mobile experience on real devices
- [ ] Submit to Google Search Console
- [ ] Set up weekly WordPress backups
- [ ] Monitor form submissions in inbox
- [ ] Track analytics for 1 week
- [ ] Make any final tweaks
- [ ] Launch! 🚀

---

## 📚 ADDITIONAL RESOURCES

- WordPress Codex: https://codex.wordpress.org/
- WPForms Documentation: https://wpforms.com/docs/
- Astra Theme Docs: https://wpastra.com/docs/
- Calendly Help Center: https://help.calendly.com/
- Google PageSpeed Insights: https://pagespeed.web.dev/

---

## 💡 TIPS FOR SUCCESS

1. **Always backup before making changes**
2. **Test in staging environment first** (if available)
3. **Use child theme for customizations**
4. **Keep WordPress and plugins updated**
5. **Monitor site speed regularly**
6. **Test forms weekly to ensure delivery**
7. **Respond to inquiries within 24 hours** (as promised on site)
8. **Keep Calendly availability current**

---

Need help? Email the details of any errors to your developer or WordPress support.

---

**Created for Trillium Hiring Services**
**Date: October 26, 2025**
"""

# Save the import guide
with open('WordPress_Import_Guide.txt', 'w', encoding='utf-8') as f:
    f.write(import_guide)

print("✓ WordPress Import Guide created")
print("File saved as: WordPress_Import_Guide.txt")
