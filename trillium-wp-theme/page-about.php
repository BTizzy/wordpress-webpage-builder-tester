<?php
/**
 * Template Name: About Page
 */

get_header();
?>

<main class="about-page">
    <section class="about-hero hero hero-small">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Meet the CEO &amp; Team</h1>
                <p class="hero-subtitle">Get to know the leadership building Trillium Hiring Services for modern founders and small business owners.</p>
                <div class="scroll-indicator">
                    <span>Scroll Down</span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 5v14M19 12l-7 7-7-7" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <section id="about-overview" class="section about-overview">
        <div class="container">
            <div class="about-grid">
                <aside class="about-sidebar">
                    <div class="about-media fade-in-up">
                        <figure>
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/amy-renhard.png' ); ?>" alt="Portrait of Amy Renhard, Founder and CEO of Trillium Hiring Services">
                        </figure>
                        <div class="team-profile-link">
                            <a class="team-link" href="https://www.linkedin.com/in/amyrenhard/" target="_blank" rel="noopener">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                                    <rect x="2" y="9" width="4" height="12"/>
                                    <circle cx="4" cy="4" r="2"/>
                                </svg>
                                <span>Connect on LinkedIn</span>
                            </a>
                        </div>

                        <div class="about-cta about-cta--simple fade-in-up">
                            <p>Amy partners with founders who want steady, people-first HR foundations. Ready to build yours?</p>
                            <a class="btn btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Start Your Inquiry</a>
                        </div>
                    </div>
                </aside>
                <div class="about-bio fade-in-up">
                    <div>
                        <h2>About Amy Renhard</h2>
                        <p class="about-summary">Amy Renhard is the founder and CEO of Trillium Hiring Services, a boutique consultancy that builds people operations for small businesses, mid-market companies, and venture-backed startups. With more than a decade of experience across recruiting, HR compliance, and organizational development, Amy is known for designing practical systems that scale as quickly as her clients do.</p>
                        <p class="about-summary">She launched Trillium to give founders and business owners access to enterprise-grade HR and talent support without the bloat. Whether a company is launching its first product, leveling up an established team, or preparing for a fundraising round, Amy embeds with leadership to build processes that move the business forward.</p>
                    </div>

                    <div class="about-highlights">
                        <div class="about-card">
                            <h3>Core Expertise</h3>
                            <ul>
                                <li>Designing and deploying end-to-end HR systems: onboarding, compliance, payroll, and employee relations.</li>
                                <li>Leading audits, policy creation, and ongoing compliance management to reduce risk.</li>
                                <li>Delivering recruiting and talent acquisition programs that scale technical and go-to-market teams.</li>
                                <li>Supporting founders as an embedded HR leader during high-growth and fundraising cycles.</li>
                            </ul>
                        </div>

                        <div class="about-card">
                            <h3>How Trillium Helps</h3>
                            <ul>
                                <li>HR Essentials Package with transparent pricing for busy small business owners.</li>
                                <li>Fractional leadership for startups that need strategic HR guidance and execution.</li>
                                <li>Systems thinking that ties business objectives to people strategy using data and documentation.</li>
                                <li>Clean up legacy HR processes while launching scalable frameworks for future growth.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="about-pillars fade-in-up">
                        <article class="pillar-card">
                            <div class="pillar-number">01</div>
                            <div class="pillar-body">
                                <h4>People-First Systems</h4>
                                <p>Every engagement centers on the employee experience, ensuring tools and processes support the humans doing the work.</p>
                            </div>
                        </article>
                        <article class="pillar-card">
                            <div class="pillar-number">02</div>
                            <div class="pillar-body">
                                <h4>Compliance With Confidence</h4>
                                <p>From handbooks to audits, Amy delivers airtight compliance frameworks that keep teams protected as they scale.</p>
                            </div>
                        </article>
                        <article class="pillar-card">
                            <div class="pillar-number">03</div>
                            <div class="pillar-body">
                                <h4>Momentum for Founders</h4>
                                <p>Trillium plugs into leadership quickly, creating practical playbooks that free founders to stay focused on revenue, product, and customers.</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section about-team" id="leadership">
        <div class="container">
            <div class="team-intro fade-in-up">
                <h2>Partners</h2>
                <p>Amy collaborates with Vanessa Wolf and Ryan Bartell to deliver recruiting analytics, technical hiring, and talent operations that scale with client growth.</p>
            </div>
            <div class="team-grid" style="max-width: 960px; margin: 0 auto;">
                <article class="team-card team-card--partner fade-in-up">
                    <div class="team-media team-media--no-frame">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/vanessa-wolf.png' ); ?>" alt="Original photo of Vanessa Wolf, Partner at Trillium Hiring Services">
                    </div>
                    <div>
                        <h3>Vanessa Wolf</h3>
                        <p class="team-role">Partner</p>
                        <p class="team-summary">Vanessa Wolf brings a decade of HR and technical recruiting leadership to Trillium, partnering with founders to build equitable people programs and critical hiring roadmaps for high-growth teams.</p>
                        <p class="team-summary">She has supported climate tech, spatial computing, and sustainability organizations through roles with ecoATM Gazelle, Spatial, Microsoft vendor programs, and boutique search firms—standing up compliance-ready processes, interview design, and leadership pipelines that keep teams scaling responsibly.</p>
                        <a class="team-link" href="https://www.linkedin.com/in/vanessa-wolf-818371b7/" target="_blank" rel="noopener">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                                <rect x="2" y="9" width="4" height="12"/>
                                <circle cx="4" cy="4" r="2"/>
                            </svg>
                            <span>Connect on LinkedIn</span>
                        </a>
                    </div>
                </article>

                <article class="team-card team-card--partner fade-in-up">
                    <div class="team-media team-media--no-frame">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/ryan-bartell.png' ); ?>" alt="Portrait of Ryan Bartell, Partner at Trillium Hiring Services">
                    </div>
                    <div>
                        <h3>Ryan Bartell</h3>
                        <p class="team-role">Partner</p>
                        <p class="team-summary">Ryan Bartell partners with founders to design data-informed recruiting and HR systems, delivering more than 100 technical and leadership hires across robotics, biotech, and SaaS startups.</p>
                        <p class="team-summary">He has launched sourcing engines and ATS implementations at MicroByre, Saltwater Talent, ecoATM Gazelle, and Aralez Bio—supporting a team including Nobel Prize Laureate Frances Arnold—before helping Riviera Partners' Paragon practice scale engineering, data, and product teams. Outside client work he volunteers his time supporting adaptive sports programs in New Hampshire during the winter months.</p>
                        <a class="team-link" href="https://www.linkedin.com/in/Ryan-Bartell" target="_blank" rel="noopener">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                                <rect x="2" y="9" width="4" height="12"/>
                                <circle cx="4" cy="4" r="2"/>
                            </svg>
                            <span>Connect on LinkedIn</span>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
