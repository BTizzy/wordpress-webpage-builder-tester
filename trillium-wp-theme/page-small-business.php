<?php get_header(); ?>

<main class="landing-page landing-page-smb">

<!-- Hero Section - Landing Page Style -->
<section class="landing-hero">
    <div class="container">
        <div class="landing-hero-content">
            <div class="landing-hero-text">
                <div class="landing-badge">
                    <span>Fractional HR for Small Business</span>
                </div>
                <h1 class="landing-title">
                    Hands-On HR Support
                </h1>
                <p class="landing-subtitle">We're a consulting partner, not a SaaS plan. You get seasoned people experts plus lightweight tools—an "HR in a box" you can actually use—guided by humans who know small business.</p>

                <div class="landing-cta">
                    <a href="#signup" class="btn btn-primary btn-large">Book a free consult</a>
                    <div class="trust-indicator">
                        <span>✓ Human support first</span>
                        <span>✓ No per-seat fees</span>
                        <span>✓ Response within 24hrs</span>
                    </div>
                </div>

                <div class="scroll-indicator scroll-indicator--dark">
                    <span>Scroll Down</span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 5v14M19 12l-7 7-7-7" />
                    </svg>
                </div>
            </div>
            <div class="landing-hero-visual">
                <div class="stats-preview">
                    <div class="stat-item">
                        <div class="stat-number">$150</div>
                        <div class="stat-label">per employee/month</div>
                    </div>
                    <div class="stat-item highlight">
                        <div class="stat-number">24hr</div>
                        <div class="stat-label">response time</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">compliant</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Components Section -->
<section class="section smb-overview" id="essentials">
    <div class="container">
        <div class="smb-intro fade-in-up">
            <h2 class="section-title">What We Build With You</h2>
            <p>Every engagement puts a human expert in your corner and installs pragmatic tools for compliance, hiring, and retention. The aim: fewer fires, better hires, and repeatable HR you can run.</p>
        </div>

        <div class="smb-core-grid">
            <article class="smb-core-card fade-in-up">
                <span class="core-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 4h18v16H3z" />
                        <path d="M3 9h18" />
                        <path d="M9 4v16" />
                    </svg>
                </span>
                <h3>HR Foundation Systems (Human + Tools)</h3>
                <ul>
                    <li>Handbooks, policies, and compliance audits tailored to your industry, guided by a dedicated HR lead</li>
                    <li>Payroll, timekeeping, and record retention workflows that withstand scrutiny</li>
                    <li>Onboarding and offboarding playbooks that feel professional and repeatable</li>
                </ul>
            </article>

            <article class="smb-core-card fade-in-up">
                <span class="core-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 16v-4" />
                        <path d="M12 8h.01" />
                    </svg>
                </span>
                <h3>People Operations Support (Fractional HR)</h3>
                <ul>
                    <li>Employee relations guidance when sensitive conversations come up—real people, not tickets</li>
                    <li>Manager toolkits and documentation so expectations stay consistent</li>
                    <li>Benefits coordination with your broker to keep coverage aligned with growth</li>
                </ul>
            </article>

            <article class="smb-core-card fade-in-up">
                <span class="core-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M8 3v18" />
                        <path d="M16 3v18" />
                        <path d="M3 8h18" />
                        <path d="M3 16h18" />
                    </svg>
                </span>
                <h3>Talent &amp; Hiring Engine (Structured, Fair)</h3>
                <ul>
                    <li>Recruiting pipelines for hourly and professional roles</li>
                    <li>Structured interviews and job scorecards that speed up fair decisions</li>
                    <li>Dashboards that track hiring velocity, retention, and cost per hire</li>
                </ul>
            </article>
        </div>
        <div class="outcomes-panel fade-in-up" style="margin-top:32px">
            <h3>Expected Outcomes</h3>
            <ul class="benefits-list">
                <li><strong>30%+ savings</strong> versus hiring in‑house HR by using fractional leadership. <a href="https://hbr.org/2024/07/how-part-time-senior-leaders-can-help-your-business" target="_blank" rel="noopener">Harvard Business Review</a></li>
                <li><strong>Lower compliance risk</strong> with clear policies aligned to <a href="https://www.shrm.org/topics-tools/employment-law-compliance/compliance-resources" target="_blank" rel="noopener">SHRM</a> templates and checklists.</li>
                <li><strong>Better quality of hire</strong> using structured interviews and scorecards. <a href="https://hbr.org/2016/04/how-to-take-the-bias-out-of-interviews" target="_blank" rel="noopener">Harvard Business Review</a></li>
                <li><strong>Improved onboarding retention</strong> with 90‑day plans and manager check‑ins. <a href="https://www.shrm.org/topics-tools/news/talent-acquisition/dont-underestimate-importance-good-onboarding" target="_blank" rel="noopener">SHRM</a></li>
            </ul>
            <p class="note">We bring software where it helps—without pushing a SaaS pricing model. You pay for human support and expertise. <a class="learn-link" href="<?php echo esc_url(home_url('/resources/#fractional-leadership')); ?>">Learn what fractional leadership is</a></p>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="landing-pricing">
    <div class="container">
        <div class="pricing-header">
            <h2>Simple, Transparent Pricing</h2>
            <p>No long contracts. No per‑seat software fees. Just hands‑on HR support when you need it.</p>
        </div>

        <div class="pricing-table">
            <!-- Main Package Banner -->
            <div class="package-banner">
                <h3>Trillium HR Essentials</h3>
                <p>Everything you need for compliant, scalable HR—bundled together</p>
            </div>

            <!-- Bundled Pricing Breakdown -->
            <div class="bundled-pricing">
                <div class="pricing-intro">
                    <p class="pricing-intro-text">This package includes three components:</p>
                </div>

                <div class="pricing-breakdown">
                    <div class="breakdown-item">
                        <span class="breakdown-step">1</span>
                        <div class="breakdown-content">
                            <h4>Initial Setup</h4>
                            <p>HR systems, policies, and compliance audit</p>
                        </div>
                        <div class="breakdown-price">
                            <strong>$1,500</strong>
                            <span>one-time</span>
                        </div>
                    </div>

                    <div class="breakdown-connector">+</div>

                    <div class="breakdown-item">
                        <span class="breakdown-step">2</span>
                        <div class="breakdown-content">
                            <h4>Monthly HR Support</h4>
                            <p>Ongoing compliance, employee relations, and HR guidance</p>
                        </div>
                        <div class="breakdown-price">
                            <strong>$150</strong>
                            <span>per employee/month</span>
                        </div>
                    </div>

                    <div class="breakdown-connector">+</div>

                    <div class="breakdown-item">
                        <span class="breakdown-step">3</span>
                        <div class="breakdown-content">
                            <h4>New Hire Onboarding</h4>
                            <p>Documentation, orientation, and 90-day plan per hire</p>
                        </div>
                        <div class="breakdown-price">
                            <strong>$1,000</strong>
                            <span>per new employee</span>
                        </div>
                    </div>
                </div>

                <div class="pricing-example">
                    <strong>Example:</strong> A 15-person company pays $1,500 setup + $2,250/month ongoing. Add $1,000 per new hire.
                </div>
            </div>

            <!-- Optional Add-on -->
            <div class="addon-section">
                <div class="addon-label">Optional Add-on</div>
                <div class="addon-card">
                    <div class="addon-content">
                        <h4>Strategic Sourcing &amp; Fractional Leadership</h4>
                        <p>Executive recruiting, fractional HR leadership, and specialized talent search</p>
                    </div>
                    <div class="addon-price">
                        <strong>$175–225</strong>
                        <span>per hour</span>
                    </div>
                </div>
            </div>

            <div class="pricing-note">
                <p><strong>Compare:</strong> A bad hire can cost ~30% of annual salary; structured hiring reduces that risk. <a href="https://www.apollotechnical.com/cost-of-a-bad-hire/" target="_blank" rel="noopener">Apollo Technical (citing DOL)</a></p>
            </div>
        </div>

        <div class="pricing-cta">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary btn-large">Start Your Free Consultation</a>
            <p class="guarantee-note">30-day money-back guarantee</p>
        </div>

        <div class="pricing-footer">
            <p><strong>Questions about pricing or what's included?</strong> <a href="<?php echo esc_url(home_url('/contact/')); ?>">Let's talk →</a></p>
        </div>
    </div>
</section>

<!-- CTA/Signup Section -->
<section class="section cta-section" id="signup">
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
            <h2>Send us a note to learn more</h2>
            <p>Let's see if we're a good fit. No sales pitch—just helpful insight on how to clean up or organize your HR. Leave a note below or email us at <a href="mailto:info@trilliumhiring.com" style="color: #D4AF37;">info@trilliumhiring.com</a> if you have any questions.</p>

            <!-- Contact Form -->
            <div class="contact-form-container">
                <?php echo do_shortcode('[wpforms id="182"]'); ?>
            </div>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>