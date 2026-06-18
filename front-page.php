<?php
/**
 * Front page template rendering the Trillium homepage design.
 */

global $post;

get_header();
?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-visuals">
        <div class="hero-shape hero-shape-1"></div>
        <div class="hero-shape hero-shape-2"></div>
        <div class="hero-shape hero-shape-3"></div>
        <div class="grid-pattern"></div>
    </div>
    <div class="hero-content fade-in">
        <h1 class="hero-title">
            <span class="title-line">Trillium Hiring Services</span>
        </h1>
        <p class="hero-subtitle">Delivering Talent Strategy and Hiring Process Solutions with Tactical Execution for <strong class="hero-emphasis">Small Businesses</strong> &amp; <strong class="hero-emphasis">Early-Stage Startups</strong></p>
        <div class="hero-cta">
            <a href="https://www.trilliumhiring.com/contact/#contact-form" class="btn btn-primary">Book Free Consultation</a>
            <a href="https://www.trilliumhiring.com/contact/#contact-form" class="btn btn-secondary">Book Consultation</a>
        </div>
        <div class="scroll-indicator">
            <span>Scroll Down</span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 5v14M19 12l-7 7-7-7"/>
            </svg>
        </div>
    </div>
</section>

<!-- Services Preview -->
<section class="section services-preview" id="services">
    <div class="services-background"></div>
    <div class="container">
        <div class="services-intro fade-in-up">
            <h2 class="section-title" style="text-transform:none; font-size:clamp(1.1rem,2.5vw,1.4rem); font-weight:500; color:var(--tx-muted); -webkit-text-fill-color:var(--tx-muted); background:none;">Comprehensive talent and HR solutions designed for your unique business needs</h2>
        </div>
        <div class="services-grid">
            <div class="service-card fade-in-up">
                <div class="service-header">
                    <div class="service-icon service-icon--outline">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                            <circle cx="9" cy="9" r="2"/>
                            <path d="M21 15.5c-.39-1.43-1.43-2.5-2.86-2.5s-2.47 1.07-2.86 2.5"/>
                            <path d="M13 12h4.5c.83 0 1.5.67 1.5 1.5v1c0 .83-.67 1.5-1.5 1.5H13"/>
                        </svg>
                    </div>
                    <span class="service-badge">Small Businesses</span>
                </div>
                <div class="service-content">
                    <h3>Small Business Consulting</h3>
                    <p>Comprehensive HR support for small businesses—from compliance and onboarding to strategic growth. We act as your embedded HR partner so you can focus on your business.</p>
                    <ul class="service-features">
                        <li>HR Systems Setup</li>
                        <li>Policies, Handbooks &amp; Compliance</li>
                        <li>Employee Relations</li>
                        <li>Recruiting &amp; Strategic Sourcing</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/thr-smb/')); ?>" class="btn btn-primary" style="background-color: #00b4a6; color: white; border: none; padding: 12px 28px; border-radius: 4px; text-decoration: none; display:inline-block; font-weight:700; text-transform:uppercase; font-size:0.875rem; letter-spacing:0.02em; box-shadow: 0 4px 12px rgba(0,180,166,0.3);">
                        Learn More &rarr;
                    </a>
                </div>
            </div>
            <div class="service-card fade-in-up">
                <div class="service-header">
                    <div class="service-icon service-icon--outline">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                        </svg>
                    </div>
                    <span class="service-badge">Startups</span>
                </div>
                <div class="service-content">
                    <h3>Startup Consulting</h3>
                    <p>Embedded HR &amp; talent systems for high-growth startups preparing for fundraising. We build your people foundation to scale successfully and win investor confidence.</p>
                    <ul class="service-features">
                        <li>Strategic HR Design</li>
                        <li>Executive Fractional Leadership</li>
                        <li>Full-Cycle Talent Acquisition</li>
                        <li>HR Tech Stack Setup</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/thr-hgs/')); ?>" class="btn btn-primary" style="background-color: #00b4a6; color: white; border: none; padding: 12px 28px; border-radius: 4px; text-decoration: none; display:inline-block; font-weight:700; text-transform:uppercase; font-size:0.875rem; letter-spacing:0.02em; box-shadow: 0 4px 12px rgba(0,180,166,0.3);">
                        Learn More &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Value Proposition -->
<section class="section value-prop">
    <div class="animated-background"></div>
    <div class="container">
        <div class="value-intro fade-in-up">
            <h2 class="section-title">Why Choose Trillium</h2>
            <p class="value-subtitle">Four reasons we're the right partner for your business</p>
            <p class="value-text">At Trillium, we tailor Talent Acquisition and HR Solutions specific to your company's unique needs. Specializing in small businesses and early-stage technical product organizations, with over 50 years of combined experience, our team embeds directly with yours to handle the day-to-day while building the systems and processes for sustainable long-term growth.</p>
        </div>
        <div class="value-grid">
            <div class="value-card fade-in-up" data-tilt>
                <div class="value-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/>
                    </svg>
                </div>
                <div class="value-number">01</div>
                <div class="value-card-text">
                    <h3>Strategic Planning</h3>
                    <p>Optimized talent strategies tailored to your growth trajectory and business objectives</p>
                </div>
            </div>
            <div class="value-card fade-in-up" data-tilt>
                <div class="value-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2">
                        <path d="M4.5 16.5c-1.5 1.5-1.5 3-1.5 3s1.5 0 3-1.5L4.5 16.5z"/>
                        <path d="M12 2s-5 2.5-5 10l3 3 5-5c0-8-3-8-3-8z"/>
                        <path d="M19 5s-2.5 5-10 5l-3-3 5-5c8 0 8 3 8 3z"/>
                        <circle cx="16" cy="8" r="1.5" fill="currentColor"/>
                    </svg>
                </div>
                <div class="value-number">02</div>
                <div class="value-card-text">
                    <h3>Tactical Execution</h3>
                    <p>Hands-on implementation that drives immediate results and measurable impact</p>
                </div>
            </div>
            <div class="value-card fade-in-up" data-tilt>
                <div class="value-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2">
                        <line x1="12" y1="20" x2="12" y2="10"/>
                        <line x1="18" y1="20" x2="18" y2="4"/>
                        <line x1="6" y1="20" x2="6" y2="16"/>
                    </svg>
                </div>
                <div class="value-number">03</div>
                <div class="value-card-text">
                    <h3>Sustainable Growth</h3>
                    <p>Systems and processes built for long-term success and scalability</p>
                </div>
            </div>
            <div class="value-card fade-in-up" data-tilt>
                <div class="value-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <div class="value-number">04</div>
                <div class="value-card-text">
                    <h3>Dedicated Partnership</h3>
                    <p>Real people in your corner—not software tickets or chatbots</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section cta-section" id="book">
    <div class="cta-background"></div>
    <div class="container">
        <div class="cta-content fade-in-up">
            <div class="cta-visual">
                <div class="floating-shapes">
                    <div class="shape shape-1"></div>
                    <div class="shape shape-2"></div>
                    <div class="shape shape-3"></div>
                </div>
            </div>
            <h2>Ready to Transform Your Hiring Process?</h2>
            <p>Book your <strong>free consultation</strong> today and discover how Trillium can accelerate your talent acquisition and build sustainable HR systems for long-term growth.</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary btn-large">Book Free Consultation</a>
                <a href="#services" class="btn btn-secondary btn-large">Learn More</a>
            </div>
            <!-- Calendly integration placeholder: Add your Calendly embed code here -->
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="section newsletter">
    <div class="newsletter-particles">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
    </div>
    <div class="container">
        <div class="newsletter-shell fade-in-up">
            <div class="newsletter-copy">
                <span class="newsletter-badge">Trillium Field Notes</span>
                <h3>Subscribe to Our Monthly Newsletter</h3>
                <p>Brief, tactical guidance on recruiting, onboarding, and people ops systems—delivered once a month.</p>
                <ul class="newsletter-benefits">
                    <li>Scripts, templates, and quick wins you can use same-day</li>
                    <li>Signals on hiring market shifts and compensation trends</li>
                    <li>No fluff—just a crisp takeaway that respects your time</li>
                </ul>
            </div>
            <div class="newsletter-form-card">
                <h4>Get the memo</h4>
                <p class="newsletter-form-subtitle">Drop your email below and we’ll send the next edition.</p>
                <div class="newsletter-form">
                    <?php echo do_shortcode('[wpforms id="203"]'); ?>
                </div>
                <p class="newsletter-trust">No spam—unsubscribe anytime.</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
