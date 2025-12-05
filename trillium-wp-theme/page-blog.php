<?php
/**
 * Template Name: Blog
 * Description: Educational blog with guides on HR, hiring, and fractional leadership.
 */

get_header();
?>

<main class="blog-page">
    <section class="hero hero-compact">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Learn</h1>
                <p class="hero-subtitle">Practical guides for small businesses and startups building modern people systems.</p>
                
                <div class="scroll-indicator">
                    <span>Scroll Down</span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 5v14M19 12l-7 7-7-7" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <section class="section blog-list">
        <div class="container">

            <!-- Featured Article: Fractional Leadership -->
            <article id="fractional-leadership" class="blog-article fade-in-up">
                <header class="article-header">
                    <span class="article-tag">Guide</span>
                    <h2>What Is Fractional Leadership?</h2>
                    <p class="article-meta">A practical breakdown for founders and small business owners</p>
                </header>

                <div class="article-content">
                    <section class="article-section">
                        <h3>The Short Answer</h3>
                        <p>Fractional leadership means hiring an experienced executive—like a VP of HR, Chief Revenue Officer, or Head of People—on a part-time or project basis instead of full-time. You get senior-level expertise without the $200K+ salary, benefits, and equity that come with a full-time hire.</p>
                        <p>Think of it as renting strategic firepower instead of buying it outright.</p>
                    </section>

                    <section class="article-section">
                        <h3>Where Fractional Roles Fit</h3>
                        <div class="role-grid">
                            <div class="role-card">
                                <strong>vCHRO / Fractional HR</strong>
                                <p>Build compliant HR systems, handle employee relations, and set up hiring processes—without a full-time HR director on payroll.</p>
                            </div>
                            <div class="role-card">
                                <strong>Fractional CRO</strong>
                                <p>Revenue strategy, sales team structure, and go-to-market planning for companies not ready for a full-time Chief Revenue Officer.</p>
                            </div>
                            <div class="role-card">
                                <strong>Fractional CGO</strong>
                                <p>Growth marketing leadership, demand gen systems, and customer acquisition for startups scaling past founder-led sales.</p>
                            </div>
                            <div class="role-card">
                                <strong>VP-Level Functions</strong>
                                <p>Engineering, Product, Finance—any function where you need strategic leadership but not 40 hours/week of it.</p>
                            </div>
                        </div>
                    </section>

                    <section class="article-section">
                        <h3>Why It Works</h3>
                        <ul class="benefit-list">
                            <li>
                                <strong>Cost efficiency:</strong> Studies show fractional leadership can reduce executive costs by 30-50% compared to full-time hires. <a href="https://hbr.org/2024/07/how-part-time-senior-leaders-can-help-your-business" target="_blank" rel="noopener">Harvard Business Review</a>
                            </li>
                            <li>
                                <strong>Speed to systems:</strong> Fractional leaders have built these systems before. They don't need 6 months to ramp—they start executing in weeks.
                            </li>
                            <li>
                                <strong>Scoped outcomes:</strong> You're paying for deliverables (a compliant handbook, a hiring pipeline, a performance review system) not just hours in a seat.
                            </li>
                            <li>
                                <strong>Flexibility:</strong> Scale up or down as your business needs change. No severance, no awkward conversations.
                            </li>
                        </ul>
                    </section>

                    <section class="article-section">
                        <h3>The Evidence</h3>
                        <p>This isn't just theory. Research backs up the impact:</p>
                        <ul class="evidence-list">
                            <li><strong>Structured interviews improve quality of hire</strong> — companies using scorecards and structured processes make better hiring decisions. <a href="https://hbr.org/2016/04/how-to-take-the-bias-out-of-interviews" target="_blank" rel="noopener">Harvard Business Review</a></li>
                            <li><strong>Onboarding reduces turnover</strong> — employees with great onboarding are 69% more likely to stay 3 years. <a href="https://www.shrm.org/topics-tools/news/talent-acquisition/dont-underestimate-importance-good-onboarding" target="_blank" rel="noopener">SHRM</a></li>
                            <li><strong>Compliance alignment matters</strong> — SMBs that follow structured HR policies avoid costly legal exposure. <a href="https://www.shrm.org/topics-tools/employment-law-compliance/compliance-resources" target="_blank" rel="noopener">SHRM Compliance Resources</a></li>
                        </ul>
                    </section>

                    <section class="article-section">
                        <h3>When to Consider Fractional HR</h3>
                        <p>Fractional HR makes sense when:</p>
                        <ul>
                            <li>You have 10-100 employees and no dedicated HR person</li>
                            <li>You're preparing for a funding round and need investor-ready people systems</li>
                            <li>Compliance, onboarding, or employee issues are eating your time as a founder</li>
                            <li>You want to hire better but don't have structured processes</li>
                            <li>You need strategic HR thinking but can't justify $150K+ for a full-time hire</li>
                        </ul>
                    </section>

                    <section class="article-section article-cta">
                        <h3>How Trillium Does It</h3>
                        <p>At Trillium, we act as your fractional HR team. We're not a software platform—we're experienced people experts who build compliant systems, run your hiring, and handle the HR work so you can focus on growing your business.</p>
                        <div class="cta-buttons">
                            <a class="btn btn-primary" href="<?php echo esc_url(home_url('/contact/')); ?>">Talk to Us About Fractional HR</a>
                            <a class="btn btn-secondary" href="<?php echo esc_url(home_url('/thr-smb/')); ?>">See Our Small Business Services</a>
                        </div>
                    </section>
                </div>
            </article>

            <!-- More Articles Coming Soon -->
            <div class="blog-coming-soon fade-in-up">
                <h3>More Guides Coming Soon</h3>
                <p>We're working on practical guides covering structured interviewing, compliance essentials, onboarding best practices, and more. <a href="<?php echo esc_url(home_url('/contact/')); ?>">Get in touch</a> if there's a topic you'd like us to cover.</p>
            </div>

        </div>
    </section>
</main>

<?php get_footer(); ?>
