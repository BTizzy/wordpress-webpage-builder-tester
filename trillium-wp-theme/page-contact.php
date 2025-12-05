<?php get_header(); ?>

<main class="contact-page">
    <section class="contact-hero">
        <div class="container">
            <div class="contact-hero-grid">
                <div class="contact-hero-copy fade-in-up">
                    <h1 class="hero-title">Let's Talk</h1>
                    <p class="hero-subtitle">Ready to transform your people operations? We're here to help.</p>
                    <p class="lead-text">Share where you are today—cleaning up compliance, hiring your first HR leader, or scaling a talent program—and we’ll map out the fastest path forward.</p>
                    <ul>
                        <li>Response within one business day</li>
                        <li>Discovery call tailored to your stage and priorities</li>
                        <li>Transparent proposal with next steps and timeline</li>
                    </ul>

                    <div class="contact-direct-card">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </div>
                        <div>
                            <h4>Email Directly</h4>
                            <p><a href="mailto:info@trilliumhiring.com">info@trilliumhiring.com</a></p>
                            <span class="contact-note">Response within one business day</span>
                        </div>
                    </div>
                </div>
                <div class="contact-form-container fade-in-up" id="contact-form">
                    <div class="form-header">
                        <h3>Start Your Inquiry</h3>
                        <p>Tell us about your hiring or HR challenge and we’ll follow up with the right plan.</p>
                    </div>
                    <?php echo do_shortcode('[wpforms id="182"]'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-details">
        <div class="container">
            <div class="contact-content">
                <div class="contact-grid fade-in-up">
                    <div class="info-section contact-expectations">
                        <div class="section-intro">
                            <h3>What to Expect</h3>
                            <p>Every engagement starts with clarity. Here’s how we move from intro to plan without wasting a week of back-and-forth.</p>
                        </div>
                        <div class="expectation-list">
                            <div class="expectation-item">
                                <div class="step-number">1</div>
                                <div>
                                    <h4>Quick Response</h4>
                                    <p>We’ll reply within one business day to lock a discovery call tailored to your stage.</p>
                                </div>
                            </div>
                            <div class="expectation-item">
                                <div class="step-number">2</div>
                                <div>
                                    <h4>Discovery Call</h4>
                                    <p>A focused 30-minute session to understand scope, resourcing, and any urgent blockers.</p>
                                </div>
                            </div>
                            <div class="expectation-item">
                                <div class="step-number">3</div>
                                <div>
                                    <h4>Custom Proposal</h4>
                                    <p>We send a transparent plan with pricing, milestones, and immediate next steps.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="info-section contact-support">
                        <div class="section-intro">
                            <h3>How We Partner</h3>
                            <p>Mix and match the level of support you need—fractional leadership, embedded recruiters, or whole-system clean up.</p>
                        </div>
                        <ul class="contact-checklist">
                            <li><span>Fractional People &amp; Talent leadership</span></li>
                            <li><span>Systems build-out for compliance &amp; onboarding</span></li>
                            <li><span>Full-cycle recruiting pods for hard-to-fill roles</span></li>
                            <li><span>Executive coaching and manager enablement</span></li>
                        </ul>
                        <div class="contact-highlights">
                            <div class="highlight-pill">
                                <span class="highlight-label">Average Kickoff</span>
                                <strong>7 days</strong>
                            </div>
                            <div class="highlight-pill">
                                <span class="highlight-label">Client Satisfaction</span>
                                <strong>Guaranteed</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>