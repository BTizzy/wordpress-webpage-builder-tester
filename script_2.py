
# Create the complete CSS file with modern, clean design
css_content = """/* ===========================
   CSS RESET & BASE STYLES
   =========================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root {
    --color-black: #1a1a1a;
    --color-black-secondary: #2d2d2d;
    --color-white: #ffffff;
    --color-grey-light: #f8f9fa;
    --color-grey-medium: #e0e0e0;
    --color-grey-dark: #666666;
    --color-gold: #d4af37;
    
    --font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    
    --spacing-xs: 8px;
    --spacing-sm: 16px;
    --spacing-md: 24px;
    --spacing-lg: 40px;
    --spacing-xl: 60px;
    --spacing-2xl: 80px;
    
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    
    --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);
    --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.12);
    
    --transition: 0.3s ease;
}

html {
    scroll-behavior: smooth;
}

body {
    font-family: var(--font-family);
    font-size: 16px;
    line-height: 1.6;
    color: var(--color-black);
    background-color: var(--color-white);
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* ===========================
   TYPOGRAPHY
   =========================== */

h1, h2, h3, h4, h5, h6 {
    line-height: 1.2;
    font-weight: 700;
    margin-bottom: var(--spacing-sm);
}

h1 {
    font-size: clamp(2rem, 5vw, 3.5rem);
}

h2 {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
}

h3 {
    font-size: clamp(1.25rem, 3vw, 1.75rem);
    font-weight: 600;
}

h4, h5 {
    font-size: clamp(1rem, 2vw, 1.25rem);
    font-weight: 600;
}

p {
    margin-bottom: var(--spacing-md);
}

a {
    color: inherit;
    text-decoration: none;
    transition: var(--transition);
}

ul {
    list-style: none;
}

/* ===========================
   LAYOUT UTILITIES
   =========================== */

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--spacing-md);
}

.section {
    padding: var(--spacing-2xl) 0;
}

@media (max-width: 768px) {
    .section {
        padding: 50px 0;
    }
}

/* ===========================
   ANIMATIONS
   =========================== */

.fade-in {
    animation: fadeIn 0.8s ease-in;
}

.fade-in-up {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s ease, transform 0.6s ease;
}

.fade-in-up.visible {
    opacity: 1;
    transform: translateY(0);
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* ===========================
   NAVIGATION
   =========================== */

.nav {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background-color: var(--color-white);
    z-index: 1000;
    transition: var(--transition);
}

.nav.scrolled {
    box-shadow: var(--shadow-md);
}

.nav-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: var(--spacing-md);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-logo a {
    font-size: 1.1rem;
    font-weight: 700;
    letter-spacing: -0.5px;
    color: var(--color-black);
}

.nav-menu {
    display: flex;
    align-items: center;
    gap: var(--spacing-lg);
}

.nav-link {
    font-size: 0.95rem;
    font-weight: 500;
    color: var(--color-grey-dark);
    position: relative;
}

.nav-link:hover,
.nav-link.active {
    color: var(--color-black);
}

.nav-link::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 0;
    height: 2px;
    background-color: var(--color-gold);
    transition: width var(--transition);
}

.nav-link:hover::after,
.nav-link.active::after {
    width: 100%;
}

.nav-toggle {
    display: none;
    flex-direction: column;
    gap: 5px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 5px;
}

.nav-toggle span {
    display: block;
    width: 25px;
    height: 2px;
    background-color: var(--color-black);
    transition: var(--transition);
}

@media (max-width: 968px) {
    .nav-toggle {
        display: flex;
    }
    
    .nav-menu {
        position: fixed;
        top: 80px;
        left: 0;
        right: 0;
        flex-direction: column;
        background-color: var(--color-white);
        box-shadow: var(--shadow-lg);
        padding: var(--spacing-lg);
        gap: var(--spacing-md);
        transform: translateY(-100%);
        opacity: 0;
        transition: transform 0.3s ease, opacity 0.3s ease;
        pointer-events: none;
    }
    
    .nav-menu.active {
        transform: translateY(0);
        opacity: 1;
        pointer-events: all;
    }
    
    .nav-toggle.active span:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }
    
    .nav-toggle.active span:nth-child(2) {
        opacity: 0;
    }
    
    .nav-toggle.active span:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -7px);
    }
}

/* ===========================
   BUTTONS
   =========================== */

.btn {
    display: inline-block;
    padding: 14px 32px;
    font-size: 0.95rem;
    font-weight: 600;
    text-align: center;
    border-radius: var(--radius-sm);
    border: 2px solid transparent;
    cursor: pointer;
    transition: all var(--transition);
    white-space: nowrap;
}

.btn-primary {
    background-color: var(--color-black);
    color: var(--color-white);
}

.btn-primary:hover {
    background-color: var(--color-black-secondary);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.btn-secondary {
    background-color: transparent;
    color: var(--color-black);
    border-color: var(--color-black);
}

.btn-secondary:hover {
    background-color: var(--color-black);
    color: var(--color-white);
    border-color: var(--color-gold);
}

.btn-nav {
    padding: 10px 24px;
    font-size: 0.9rem;
}

.btn-large {
    padding: 18px 48px;
    font-size: 1.1rem;
}

.btn-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--color-black);
    font-weight: 600;
    padding: 0;
    background: none;
    border: none;
}

.btn-link:hover {
    color: var(--color-gold);
}

.btn-link svg {
    transition: transform var(--transition);
}

.btn-link:hover svg {
    transform: translateX(4px);
}

/* ===========================
   HERO SECTION
   =========================== */

.hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--color-grey-light) 0%, var(--color-white) 100%);
    padding-top: 80px;
    position: relative;
}

.hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 20% 50%, rgba(212, 175, 55, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(26, 26, 26, 0.03) 0%, transparent 50%);
    pointer-events: none;
}

.hero-content {
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
    padding: var(--spacing-lg);
    position: relative;
    z-index: 1;
}

.hero-title {
    margin-bottom: var(--spacing-md);
    color: var(--color-black);
}

.hero-subtitle {
    font-size: clamp(1.1rem, 2vw, 1.5rem);
    color: var(--color-grey-dark);
    margin-bottom: var(--spacing-xl);
    font-weight: 500;
}

.hero-cta {
    display: flex;
    gap: var(--spacing-md);
    justify-content: center;
    flex-wrap: wrap;
}

.scroll-indicator {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    margin-top: var(--spacing-xl);
    color: var(--color-grey-dark);
    font-size: 0.85rem;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(10px);
    }
}

/* ===========================
   VALUE PROPOSITION
   =========================== */

.value-prop {
    background-color: var(--color-grey-light);
}

.value-content {
    max-width: 800px;
    margin: 0 auto var(--spacing-xl);
    text-align: center;
}

.value-text {
    font-size: clamp(1.1rem, 2vw, 1.25rem);
    line-height: 1.7;
    color: var(--color-grey-dark);
}

.value-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: var(--spacing-lg);
    margin-top: var(--spacing-xl);
}

.value-card {
    background-color: var(--color-white);
    padding: var(--spacing-lg);
    border-radius: var(--radius-md);
    text-align: center;
    transition: var(--transition);
}

.value-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.value-icon {
    width: 64px;
    height: 64px;
    margin: 0 auto var(--spacing-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-gold);
}

.value-card h3 {
    margin-bottom: var(--spacing-sm);
}

.value-card p {
    color: var(--color-grey-dark);
    margin-bottom: 0;
}

/* ===========================
   SERVICES PREVIEW
   =========================== */

.services-preview {
    background-color: var(--color-white);
}

.section-title {
    text-align: center;
    margin-bottom: var(--spacing-xl);
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
    gap: var(--spacing-lg);
}

@media (max-width: 768px) {
    .services-grid {
        grid-template-columns: 1fr;
    }
}

.service-card {
    background-color: var(--color-white);
    border: 2px solid var(--color-grey-medium);
    border-radius: var(--radius-md);
    padding: var(--spacing-lg);
    transition: var(--transition);
}

.service-card:hover {
    border-color: var(--color-gold);
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.service-content h3 {
    margin-bottom: var(--spacing-md);
}

.service-content p {
    color: var(--color-grey-dark);
    margin-bottom: var(--spacing-md);
}

.service-features {
    margin: var(--spacing-md) 0;
    padding-left: var(--spacing-md);
}

.service-features li {
    position: relative;
    padding-left: var(--spacing-md);
    margin-bottom: var(--spacing-sm);
    color: var(--color-grey-dark);
}

.service-features li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--color-gold);
    font-weight: bold;
}

/* ===========================
   TESTIMONIALS
   =========================== */

.testimonials {
    background-color: var(--color-black);
    color: var(--color-white);
}

.testimonials .section-title {
    color: var(--color-white);
}

.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: var(--spacing-lg);
}

.testimonial-card {
    background-color: var(--color-black-secondary);
    padding: var(--spacing-lg);
    border-radius: var(--radius-md);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: var(--transition);
}

.testimonial-card:hover {
    border-color: var(--color-gold);
    transform: translateY(-4px);
}

.quote-mark {
    font-size: 3rem;
    line-height: 1;
    color: var(--color-gold);
    margin-bottom: var(--spacing-sm);
}

.testimonial-text {
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: var(--spacing-md);
    color: rgba(255, 255, 255, 0.9);
}

.testimonial-author {
    font-weight: 600;
    color: var(--color-gold);
    margin-bottom: 0;
}

/* ===========================
   CTA SECTION
   =========================== */

.cta-section {
    background: linear-gradient(135deg, rgba(212, 175, 55, 0.05) 0%, rgba(212, 175, 55, 0.1) 100%);
}

.cta-content {
    text-align: center;
    max-width: 700px;
    margin: 0 auto;
}

.cta-content h2 {
    margin-bottom: var(--spacing-md);
}

.cta-content p {
    font-size: 1.15rem;
    color: var(--color-grey-dark);
    margin-bottom: var(--spacing-xl);
}

/* ===========================
   NEWSLETTER
   =========================== */

.newsletter {
    background-color: var(--color-grey-light);
}

.newsletter-content {
    text-align: center;
    max-width: 600px;
    margin: 0 auto;
}

.newsletter-content h3 {
    margin-bottom: var(--spacing-sm);
}

.newsletter-content p {
    color: var(--color-grey-dark);
    margin-bottom: var(--spacing-lg);
}

.newsletter-form {
    display: flex;
    gap: var(--spacing-sm);
    max-width: 500px;
    margin: 0 auto;
}

.newsletter-form input {
    flex: 1;
    padding: 14px 20px;
    border: 2px solid var(--color-grey-medium);
    border-radius: var(--radius-sm);
    font-size: 1rem;
    font-family: var(--font-family);
    transition: var(--transition);
}

.newsletter-form input:focus {
    outline: none;
    border-color: var(--color-gold);
}

@media (max-width: 600px) {
    .newsletter-form {
        flex-direction: column;
    }
}

/* ===========================
   FOOTER
   =========================== */

.footer {
    background-color: var(--color-black);
    color: rgba(255, 255, 255, 0.8);
    padding: var(--spacing-2xl) 0 var(--spacing-lg);
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--spacing-xl);
    margin-bottom: var(--spacing-xl);
}

.footer-col h4 {
    color: var(--color-white);
    margin-bottom: var(--spacing-md);
    font-size: 1.1rem;
}

.footer-col h5 {
    color: var(--color-white);
    margin-bottom: var(--spacing-md);
    font-size: 1rem;
}

.footer-tagline {
    color: var(--color-gold);
    font-style: italic;
}

.footer-col ul {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-sm);
}

.footer-col a {
    color: rgba(255, 255, 255, 0.8);
    transition: var(--transition);
}

.footer-col a:hover {
    color: var(--color-gold);
}

.footer-response {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.6);
    margin-top: var(--spacing-sm);
}

.footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: var(--spacing-lg);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.footer-bottom p {
    margin: 0;
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .footer-bottom {
        flex-direction: column;
        gap: var(--spacing-md);
        text-align: center;
    }
}

/* ===========================
   UTILITY CLASSES
   =========================== */

.text-center {
    text-align: center;
}

.mb-0 {
    margin-bottom: 0;
}

.mt-lg {
    margin-top: var(--spacing-lg);
}
"""

# Save the CSS file
with open('trillium_styles.css', 'w', encoding='utf-8') as f:
    f.write(css_content)

print("✓ Main CSS file created successfully")
print("File saved as: trillium_styles.css")
