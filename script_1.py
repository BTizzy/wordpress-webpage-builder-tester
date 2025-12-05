
# Create the complete HTML structure for the homepage
html_content = """<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Trillium Hiring Services - Talent Strategy, Hiring Process and Tactical Execution for Small Businesses & Startups">
    <title>Trillium Hiring Services - People Ops for Your Business</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="nav" id="mainNav">
        <div class="nav-container">
            <div class="nav-logo">
                <a href="index.html">TRILLIUM HIRING SERVICES</a>
            </div>
            <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="nav-menu" id="navMenu">
                <li><a href="index.html" class="nav-link active">Home</a></li>
                <li><a href="about.html" class="nav-link">About</a></li>
                <li><a href="small-business.html" class="nav-link">Small Business</a></li>
                <li><a href="startups.html" class="nav-link">Startups</a></li>
                <li><a href="contact.html" class="nav-link">Contact</a></li>
                <li><a href="#book" class="btn btn-nav">Book Consultation</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content fade-in">
            <h1 class="hero-title">Delivering Talent Strategy, Hiring Process And Tactical Execution For Small Businesses & Early Stage Startups</h1>
            <p class="hero-subtitle">Building The Landing Gear While Flying The Plane</p>
            <div class="hero-cta">
                <a href="#services" class="btn btn-primary">Our Services</a>
                <a href="#book" class="btn btn-secondary">Book Free Consultation</a>
            </div>
            <div class="scroll-indicator">
                <span>Scroll Down</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 5v14M19 12l-7 7-7-7"/>
                </svg>
            </div>
        </div>
    </section>

    <!-- Value Proposition -->
    <section class="section value-prop">
        <div class="container">
            <div class="value-content fade-in-up">
                <p class="value-text">At Trillium, we tailor Talent Acquisition and HR solutions specific to your company's unique needs. Specializing in small businesses and early stage technical product organizations, our team swiftly delivers optimized plans for your immediate growth needs while simultaneously developing and implementing the systems and processes for sustainable long term growth.</p>
            </div>
            <div class="value-grid">
                <div class="value-card fade-in-up">
                    <div class="value-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                            <line x1="12" y1="22.08" x2="12" y2="12"/>
                        </svg>
                    </div>
                    <h3>Strategic Planning</h3>
                    <p>Optimized talent strategies tailored to your growth trajectory</p>
                </div>
                <div class="value-card fade-in-up">
                    <div class="value-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                    </div>
                    <h3>Tactical Execution</h3>
                    <p>Hands-on implementation that drives immediate results</p>
                </div>
                <div class="value-card fade-in-up">
                    <div class="value-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="12" y1="20" x2="12" y2="10"/>
                            <line x1="18" y1="20" x2="18" y2="4"/>
                            <line x1="6" y1="20" x2="6" y2="16"/>
                        </svg>
                    </div>
                    <h3>Sustainable Growth</h3>
                    <p>Systems and processes built for long-term success</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Preview -->
    <section class="section services-preview" id="services">
        <div class="container">
            <h2 class="section-title fade-in-up">Our Services</h2>
            <div class="services-grid">
                <div class="service-card fade-in-up">
                    <div class="service-content">
                        <h3>Small Business Consulting</h3>
                        <p>Comprehensive HR support for small businesses—from compliance and onboarding to strategic growth. We act as your HR department with transparent, affordable pricing.</p>
                        <ul class="service-features">
                            <li>Recruiting & Strategic Sourcing</li>
                            <li>Policies, Handbooks & Compliance</li>
                            <li>Employee Relations</li>
                            <li>HR Systems Setup</li>
                        </ul>
                        <a href="small-business.html" class="btn btn-link">
                            Learn More
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="service-card fade-in-up">
                    <div class="service-content">
                        <h3>Startup Consulting</h3>
                        <p>Embedded HR & talent systems for high-growth startups preparing for fundraising. We build your people foundation to scale successfully and win investor confidence.</p>
                        <ul class="service-features">
                            <li>Strategic HR Design</li>
                            <li>Executive Fractional Leadership</li>
                            <li>Full-Cycle Talent Acquisition</li>
                            <li>HR Tech Stack Setup</li>
                        </ul>
                        <a href="startups.html" class="btn btn-link">
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

    <!-- Testimonials -->
    <section class="section testimonials">
        <div class="container">
            <h2 class="section-title fade-in-up">What Our Clients Say</h2>
            <div class="testimonials-grid">
                <div class="testimonial-card fade-in-up">
                    <div class="quote-mark">"</div>
                    <p class="testimonial-text">Even when we didn't have a big budget, we knew we needed good marketing. With this company, we could work with the budget we had, and their efforts helped us grow quickly.</p>
                    <p class="testimonial-author">— Jamie Kelly</p>
                </div>
                <div class="testimonial-card fade-in-up">
                    <div class="quote-mark">"</div>
                    <p class="testimonial-text">No matter what kind of campaign we want to run, this company can set it up for us. It's a great feeling to know that someone has your back!</p>
                    <p class="testimonial-author">— Dan Wooten</p>
                </div>
                <div class="testimonial-card fade-in-up">
                    <div class="quote-mark">"</div>
                    <p class="testimonial-text">Running a big company isn't easy, but with a good marketing partner there's one less thing to worry about. You get peace of mind!</p>
                    <p class="testimonial-author">— Stacy Holmes</p>
                </div>
                <div class="testimonial-card fade-in-up">
                    <div class="quote-mark">"</div>
                    <p class="testimonial-text">When it comes to marketing, this company is the best! Our profits went way up, and our bottom line has never looked better.</p>
                    <p class="testimonial-author">— Ava Smith</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section cta-section" id="book">
        <div class="container">
            <div class="cta-content fade-in-up">
                <h2>Book Your Free Consultation Today</h2>
                <p>Discover how Trillium Hiring Services can drive measurable results for your business.</p>
                <a href="contact.html" class="btn btn-primary btn-large">Book Now</a>
                <!-- Calendly integration placeholder: Add your Calendly embed code here -->
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="section newsletter">
        <div class="container">
            <div class="newsletter-content fade-in-up">
                <h3>Sign Up For The Newsletter</h3>
                <p>Stay updated with insights on talent acquisition and HR best practices</p>
                <form class="newsletter-form" id="newsletterForm">
                    <input type="email" placeholder="Enter your email" required aria-label="Email address">
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
                <!-- WordPress: Replace with [wpforms id="XX"] or your preferred form plugin shortcode -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>TRILLIUM HIRING SERVICES</h4>
                    <p class="footer-tagline">People Ops for Your Business</p>
                </div>
                <div class="footer-col">
                    <h5>Quick Links</h5>
                    <ul>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="small-business.html">Small Business</a></li>
                        <li><a href="startups.html">Startups</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h5>Contact</h5>
                    <p><a href="mailto:info@trilliumhiring.com">info@trilliumhiring.com</a></p>
                    <p>Monday – Friday<br>9AM – 6PM EST</p>
                    <p class="footer-response">Response within one business day</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Trillium Hiring Services. All rights reserved.</p>
                <div class="footer-social">
                    <!-- Add your social media links here -->
                </div>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>"""

# Save the homepage
with open('trillium_homepage.html', 'w', encoding='utf-8') as f:
    f.write(html_content)

print("✓ Homepage HTML created successfully")
print("File saved as: trillium_homepage.html")
