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
        <p class="hero-subtitle">Delivering Talent Strategy, Hiring Process and Tactical Execution for <strong class="hero-emphasis">Small Businesses</strong> &amp; <strong class="hero-emphasis">Early Stage Startups</strong></p>
        <div class="hero-cta">
            <a href="#book" class="btn btn-primary">Book Free Consultation</a>
            <a href="#services" class="btn btn-secondary">Our Services</a>
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
            <h2 class="section-title">Our Specialized Services</h2>
            <p class="lead-text">Comprehensive talent and HR solutions designed for your unique business needs</p>
        </div>
        <div class="services-grid">
            <div class="service-card fade-in-up">
                <div class="service-header">
                    <div class="service-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                            <circle cx="9" cy="9" r="2"/>
                            <path d="M21 15.5c-.39-1.43-1.43-2.5-2.86-2.5s-2.47 1.07-2.86 2.5"/>
                            <path d="M13 12h4.5c.83 0 1.5.67 1.5 1.5v1c0 .83-.67 1.5-1.5 1.5H13"/>
                        </svg>
                    </div>
                    <span class="service-badge">Small Business</span>
                </div>
                <div class="service-content">
                    <h3>Small Business Consulting</h3>
                    <p>Comprehensive HR support for small businesses—from compliance and onboarding to strategic growth. We act as your HR department with transparent, affordable pricing.</p>
                    <ul class="service-features">
                        <li>HR Systems Setup</li>
                        <li>Policies, Handbooks &amp; Compliance</li>
                        <li>Employee Relations</li>
                        <li>Recruiting &amp; Strategic Sourcing</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/thr-smb/')); ?>" class="btn btn-link">
                        Learn More
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="service-card fade-in-up">
                <div class="service-header">
                    <div class="service-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
                    <a href="<?php echo esc_url(home_url('/thr-hgs/')); ?>" class="btn btn-link">
                        Learn More
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
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
            <p class="value-text">At Trillium, we tailor Talent Acquisition and HR solutions specific to your company's unique needs. Specializing in small businesses and early stage technical product organizations, our team embeds directly with yours to handle the day-to-day while building the systems and processes for sustainable long term growth.</p>
        </div>
        <div class="value-grid">
            <div class="value-card fade-in-up" data-tilt>
                <div class="value-number">01</div>
                <div class="value-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                        <line x1="12" y1="22.08" x2="12" y2="12"/>
                    </svg>
                </div>
                <h3>Strategic Planning</h3>
                <p>Optimized talent strategies tailored to your growth trajectory and business objectives</p>
            </div>
            <div class="value-card fade-in-up" data-tilt>
                <div class="value-number">02</div>
                <div class="value-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                </div>
                <h3>Tactical Execution</h3>
                <p>Hands-on implementation that drives immediate results and measurable impact</p>
            </div>
            <div class="value-card fade-in-up" data-tilt>
                <div class="value-number">03</div>
                <div class="value-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="20" x2="12" y2="10"/>
                        <line x1="18" y1="20" x2="18" y2="4"/>
                        <line x1="6" y1="20" x2="6" y2="16"/>
                    </svg>
                </div>
                <h3>Sustainable Growth</h3>
                <p>Systems and processes built for long-term success and scalability</p>
            </div>
            <div class="value-card fade-in-up" data-tilt>
                <div class="value-number">04</div>
                <div class="value-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3>Dedicated Partnership</h3>
                <p>Real people in your corner—not software tickets or chatbots</p>
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
            <p>Book your free consultation today and discover how Trillium can accelerate your talent acquisition and build sustainable HR systems for long-term growth.</p>
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
                <h3>Monthly intel for builders and people leaders.</h3>
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
