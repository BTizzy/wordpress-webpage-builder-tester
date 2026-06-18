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
                <h1 class="hero-title">Inside Trillium Hiring Services</h1>
                <p class="hero-subtitle">Learn how our company operates and meet the leaders who deliver people-first systems for growing teams.</p>
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
                <div class="about-bio fade-in-up">
                    <section class="about-section about-company">
                        <span class="section-kicker">About Trillium</span>
                        <h2>People-first hiring systems for growing companies</h2>
                        <p class="about-summary"><strong>Trillium Hiring Services</strong> is a boutique consultancy that builds the HR and talent infrastructure modern founders need. We help small businesses, mid-market teams, and venture-backed startups create compliant operations, repeatable hiring, and people programs that unlock sustainable growth.</p>
                        <p class="about-summary">Our team embeds directly with leadership to run day-to-day execution while installing the processes, data, and documentation that investors and employees expect. You get enterprise-grade support without the overhead of building an internal HR department before you are ready.</p>
                    </section>

                    <section class="about-section about-support" style="margin-top:1rem;">
                        <h3>How Trillium Helps</h3>
                        <div class="about-highlights">
                            <div class="about-card">
                                <h4>Small Business HR</h4>
                                <ul>
                                    <li>HR Essentials Packages tailored for owners who need trusted guidance without corporate overhead.</li>
                                    <li>Compliance reviews, handbooks, and employee-relations support delivered as an embedded partner.</li>
                                    <li>Onboarding workflows and documentation that get new hires productive from day one.</li>
                                    <li>People Operations dashboards that keep leadership aligned on hiring velocity and retention.</li>
                                </ul>
                                <a href="<?php echo esc_url(home_url('/thr-smb/')); ?>" class="btn btn-primary" style="margin-top:1rem; display:inline-block;">Learn More</a>
                            </div>

                            <div class="about-card">
                                <h4>Startup Growth Roadmaps</h4>
                                <ul>
                                    <li>Fractional people leadership for startups from pre-Series A through Series B who need strategic build-out.</li>
                                    <li>Recruiter pods and sourcing systems that spin up quickly and integrate with existing hiring workflows.</li>
                                    <li>HR tech stack selection, implementation, and documentation ready for investor diligence.</li>
                                    <li>Founder coaching and reporting that keeps talent, finance, and operations leaders aligned.</li>
                                </ul>
                                <a href="<?php echo esc_url(home_url('/thr-hgs/')); ?>" class="btn btn-primary" style="margin-top:1rem; display:inline-block;">Learn More</a>
                            </div>
                        </div>
                    </section>

                    <section class="about-section about-pillars-section" style="padding-top:1rem; padding-bottom:1rem;">
                        <h3 style="margin-bottom:1rem;">What Clients Experience</h3>
                        <div class="about-pillars fade-in-up">
                            <article class="pillar-card">
                                <div class="pillar-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                </div>
                                <div class="pillar-number">01</div>
                                <div class="pillar-body">
                                    <h4>People-First Systems</h4>
                                    <p>Every engagement centers on the employee experience, ensuring tools and processes support the humans doing the work.</p>
                                </div>
                            </article>
                            <article class="pillar-card">
                                <div class="pillar-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                </div>
                                <div class="pillar-number">02</div>
                                <div class="pillar-body">
                                    <h4>Compliance With Confidence</h4>
                                    <p>From handbooks to audits, we deliver airtight compliance frameworks that keep teams protected as they scale.</p>
                                </div>
                            </article>
                            <article class="pillar-card">
                                <div class="pillar-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                                </div>
                                <div class="pillar-number">03</div>
                                <div class="pillar-body">
                                    <h4>Momentum for Founders</h4>
                                    <p>Trillium plugs into leadership quickly, creating practical playbooks that empower founders to stay focused on revenue, product, and customers.</p>
                                </div>
                            </article>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <section class="section about-team" id="leadership">
        <div class="container">
            <div class="team-intro fade-in-up">
                <h2>Meet the Team</h2>
                <p>Founder Amy Renhard partners with Vanessa Wolf and Ryan Bartell to deliver <strong>recruiting analytics, technical hiring, and people operations</strong> that scale with client growth.</p>
            </div>
            <div class="team-grid">
                <article class="team-card team-card--partner team-card--founder fade-in-up">
                    <div class="team-media team-media--no-frame">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/amy-renhard.png' ); ?>" alt="Portrait of Amy Renhard, Founder and CEO of Trillium Hiring Services">
                    </div>
                    <div>
                        <h3>Amy Renhard</h3>
                        <p class="team-role">Founder &amp; CEO</p>
                        <p class="team-summary">Amy launched Trillium after more than a decade leading recruiting, HR compliance, and organizational development for high-growth companies. She translates that experience into calm execution for leaders who need strategic direction and reliable follow-through.</p>
                        <p class="team-summary">Before founding Trillium, she supported technical product organizations at <strong>Microsoft</strong>, <strong>Amazon</strong>, and <strong>Boeing</strong>, climate-tech innovators at <strong>ecoATM Gazelle</strong>, and small business operators who needed people systems that could scale alongside revenue. Today Amy pairs that expertise with a network of Trillium partners to deliver full-stack people operations.</p>
                        <h4 class="credentials-title">What Amy Brings</h4>
                        <ul class="founder-credentials" style="color:#333;">
                            <li>Designs and deploys end-to-end HR systems covering onboarding, compliance, payroll, and employee relations.</li>
                            <li>Leads audits, policy creation, and compliance programs that keep founders protected during rapid change.</li>
                            <li>Builds recruiting engines and talent acquisition programs for technical, product, and go-to-market teams.</li>
                            <li>Supports leadership as an embedded HR partner during fundraising, restructuring, and scale-up milestones.</li>
                        </ul>
                        <a class="team-link" href="https://www.linkedin.com/in/amyrenhard/" target="_blank" rel="noopener">
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
                        <p class="team-summary">Ryan Bartell is a hands-on recruiter, builder, and HR consultant. While starting his career supporting local small businesses and skilled trade organizations, he has since delivered 100+ technical and leadership hires while installing the systems and processes to keep pipelines predictable.</p>
                        <p class="team-summary">He has launched sourcing engines and ATS implementations at MicroByre, Saltwater Talent, ecoATM Gazelle, Moloco, Telos Health (surgical robotics), and Aralez Bio—supporting a team including Nobel Prize Laureate Frances Arnold—before helping Riviera Partners' Paragon practice scale engineering, data, and product teams. Outside client work he volunteers his time supporting adaptive sports programs in New Hampshire during the winter months.</p>
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
            </div>
        </div>
    </section>

    <section class="section cta-section about-cta" style="padding-top:6rem;">
        <div class="cta-background"></div>
        <div class="container">
            <div class="cta-content fade-in-up">
                <h2>Get in Touch</h2>
                <p>Ready to transform your hiring and people operations?</p>
                <p><strong>Let's start a conversation.</strong></p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary btn-large">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
