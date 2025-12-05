// ========================================
// TRILLIUM HIRING SERVICES - MAIN SCRIPT
// ========================================

// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    initNavigation();
    initScrollAnimations();
    initSmoothScroll();
    initForms();
    enhanceNewsletterWPForms();
});

// ========================================
// NAVIGATION
// ========================================

function initNavigation() {
    const nav = document.getElementById('mainNav');
    if (!nav) {
        return;
    }

    const navToggle = document.getElementById('navToggle');
    const navMenu = document.getElementById('navMenu');

    // Scroll effect for navigation
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });

    // Mobile menu toggle
    if (navToggle && navMenu) {
        navToggle.addEventListener('click', function() {
            navToggle.classList.toggle('active');
            navMenu.classList.toggle('active');
            document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
        });

        // Close menu when clicking on a link
        const navLinks = navMenu.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navToggle.classList.remove('active');
                navMenu.classList.remove('active');
                document.body.style.overflow = '';
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInsideNav = nav.contains(event.target);
            if (!isClickInsideNav && navMenu.classList.contains('active')) {
                navToggle.classList.remove('active');
                navMenu.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }

    // Set active link based on current page
    const currentPath = normalizePath(window.location.pathname);
    const links = nav.querySelectorAll('.nav-link');

    links.forEach(link => {
        const linkUrl = new URL(link.href, window.location.origin);
        const linkPath = normalizePath(linkUrl.pathname);

        // Handle on-page anchor links (e.g., #book)
        if (linkUrl.hash && linkPath === '/') {
            if (currentPath === '/' && linkUrl.hash === window.location.hash) {
                link.classList.add('active');
            }
            return;
        }

        if (linkPath === currentPath) {
            link.classList.add('active');
        } else if (currentPath === '/' && linkPath === '/' && !linkUrl.hash) {
            link.classList.add('active');
        }
    });
}

function normalizePath(pathname) {
    if (!pathname) {
        return '/';
    }
    const normalized = pathname.replace(/\/+$/, '');
    return normalized === '' ? '/' : normalized;
}

// ========================================
// SCROLL ANIMATIONS
// ========================================

function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');

                // Add stagger effect for children if they exist
                const children = entry.target.querySelectorAll('.fade-in-up');
                children.forEach((child, index) => {
                    setTimeout(() => {
                        child.classList.add('visible');
                    }, index * 100);
                });
            }
        });
    }, observerOptions);

    // Observe all elements with fade-in-up class
    const animatedElements = document.querySelectorAll('.fade-in-up');
    animatedElements.forEach(el => observer.observe(el));
}

// ========================================
// SMOOTH SCROLL
// ========================================

function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');

            // Skip if it's just '#' or empty
            if (targetId === '#' || targetId === '') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();

                const navHeight = document.getElementById('mainNav').offsetHeight;
                const targetPosition = targetElement.offsetTop - navHeight - 20;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// ========================================
// FORM HANDLING
// ========================================

function initForms() {
    // Newsletter form
    const newsletterForm = document.getElementById('newsletterForm');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            handleNewsletterSubmit(this);
        });
    }

    pruneNewsletterWPForms();

    // Contact forms
    const contactForms = document.querySelectorAll('form[id^="contactForm"]');
    contactForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            handleContactSubmit(this);
        });
    });

    // Add real-time validation
    const inputs = document.querySelectorAll('input, textarea');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateField(this);
        });

        input.addEventListener('input', function() {
            if (this.classList.contains('error')) {
                validateField(this);
            }
        });
    });
}

// ========================================
// WPForms Newsletter Enhancements
// ========================================

function enhanceNewsletterWPForms() {
    pruneNewsletterWPForms();

    document.addEventListener('wpformsReady', pruneNewsletterWPForms);
    document.addEventListener('wpformsAjaxSubmit', pruneNewsletterWPForms);

    const newsletterWrapper = document.querySelector('.newsletter-form');
    if (newsletterWrapper) {
        const observer = new MutationObserver(() => {
            pruneNewsletterWPForms();
        });

        observer.observe(newsletterWrapper, {
            childList: true,
            subtree: true
        });
    }
}

function pruneNewsletterWPForms() {
    const forms = document.querySelectorAll('.newsletter-form form');

    forms.forEach(form => {
        if (form.dataset.newsletterEmailOnly === 'true') {
            return;
        }

        const formId = form.getAttribute('id') || '';
        if (formId && !formId.includes('wpforms-form-203')) {
            return;
        }

        const nameField = form.querySelector('.wpforms-field-name');
        if (nameField) {
            nameField.classList.add('newsletter-hidden-name');
            nameField.setAttribute('aria-hidden', 'true');

            const inputs = nameField.querySelectorAll('input');
            inputs.forEach(input => {
                input.removeAttribute('required');
                input.setAttribute('tabindex', '-1');
                input.value = 'Not provided';
            });
        }

        const emailField = form.querySelector('.wpforms-field-email');
        if (emailField) {
            emailField.classList.add('newsletter-email-field');
        }

        const submitContainer = form.querySelector('.wpforms-submit-container');
        if (submitContainer) {
            submitContainer.classList.add('newsletter-submit-container');
        }

        form.dataset.newsletterEmailOnly = 'true';
    });
}

function handleNewsletterSubmit(form) {
    const email = form.querySelector('input[type="email"]').value;
    const submitBtn = form.querySelector('button[type="submit"]');

    // Basic validation
    if (!validateEmail(email)) {
        showFormMessage(form, 'Please enter a valid email address', 'error');
        return;
    }

    // Show loading state
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Subscribing...';
    submitBtn.disabled = true;

    // For WordPress: This will be handled by your form plugin
    // Replace this setTimeout with actual form submission
    setTimeout(() => {
        showFormMessage(form, 'Thank you for subscribing!', 'success');
        form.reset();
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    }, 1000);

    // In WordPress, replace above with:
    // form.submit(); or handle via AJAX with your form plugin
}

function handleContactSubmit(form) {
    const submitBtn = form.querySelector('button[type="submit"]');
    let isValid = true;

    // Validate all required fields
    const requiredFields = form.querySelectorAll('[required]');
    requiredFields.forEach(field => {
        if (!validateField(field)) {
            isValid = false;
        }
    });

    if (!isValid) {
        showFormMessage(form, 'Please fill in all required fields correctly', 'error');
        return;
    }

    // Show loading state
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Sending...';
    submitBtn.disabled = true;

    // For WordPress: This will be handled by your form plugin (WPForms, Contact Form 7, etc.)
    setTimeout(() => {
        showFormMessage(form, 'Thank you! We will get back to you within 24 hours.', 'success');
        form.reset();
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    }, 1500);

    // In WordPress, replace above with your form plugin's submission handler
}

function validateField(field) {
    const value = field.value.trim();
    let isValid = true;
    let errorMessage = '';

    // Required field check
    if (field.hasAttribute('required') && !value) {
        isValid = false;
        errorMessage = 'This field is required';
    }

    // Email validation
    if (field.type === 'email' && value && !validateEmail(value)) {
        isValid = false;
        errorMessage = 'Please enter a valid email address';
    }

    // Phone validation (basic)
    if (field.type === 'tel' && value && value.length < 10) {
        isValid = false;
        errorMessage = 'Please enter a valid phone number';
    }

    // Update field state
    if (!isValid) {
        field.classList.add('error');
        showFieldError(field, errorMessage);
    } else {
        field.classList.remove('error');
        removeFieldError(field);
    }

    return isValid;
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function showFieldError(field, message) {
    removeFieldError(field);

    const errorDiv = document.createElement('div');
    errorDiv.className = 'field-error';
    errorDiv.textContent = message;
    errorDiv.style.color = '#e74c3c';
    errorDiv.style.fontSize = '0.85rem';
    errorDiv.style.marginTop = '4px';

    field.parentNode.insertBefore(errorDiv, field.nextSibling);
}

function removeFieldError(field) {
    const existingError = field.parentNode.querySelector('.field-error');
    if (existingError) {
        existingError.remove();
    }
}

function showFormMessage(form, message, type) {
    // Remove existing message if any
    const existingMessage = form.querySelector('.form-message');
    if (existingMessage) {
        existingMessage.remove();
    }

    const messageDiv = document.createElement('div');
    messageDiv.className = `form-message form-message-${type}`;
    messageDiv.textContent = message;
    messageDiv.style.padding = '12px 16px';
    messageDiv.style.marginTop = '16px';
    messageDiv.style.borderRadius = '8px';
    messageDiv.style.textAlign = 'center';
    messageDiv.style.fontSize = '0.95rem';

    if (type === 'success') {
        messageDiv.style.backgroundColor = '#d4edda';
        messageDiv.style.color = '#155724';
        messageDiv.style.border = '1px solid #c3e6cb';
    } else {
        messageDiv.style.backgroundColor = '#f8d7da';
        messageDiv.style.color = '#721c24';
        messageDiv.style.border = '1px solid #f5c6cb';
    }

    form.appendChild(messageDiv);

    // Auto-remove success messages after 5 seconds
    if (type === 'success') {
        setTimeout(() => {
            messageDiv.remove();
        }, 5000);
    }
}

// ========================================
// UTILITY FUNCTIONS
// ========================================

// Debounce function for performance
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Check if element is in viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// ========================================
// WORDPRESS INTEGRATION NOTES
// ========================================

/*
WORDPRESS FORM INTEGRATION:

1. For WPForms:
   - Replace form HTML with: [wpforms id="YOUR_FORM_ID"]
   - WPForms handles submission automatically
   - Remove JavaScript form handlers for WPForms

2. For Contact Form 7:
   - Replace form HTML with: [contact-form-7 id="YOUR_FORM_ID"]
   - CF7 handles submission via AJAX automatically
   - Keep JavaScript for validation styling

3. For Calendly Integration:
   - Add to CTA section or Contact page:
   <div class="calendly-inline-widget" data-url="YOUR_CALENDLY_URL" style="min-width:320px;height:630px;"></div>
   <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>

4. For Custom Forms:
   - Keep all JavaScript handlers
   - Update handleContactSubmit to POST to WordPress REST API or admin-ajax.php
   - Add nonce verification for security

5. For Newsletter:
   - Integrate with Mailchimp, ConvertKit, or similar
   - Or use WPForms with email marketing addon
*/

console.log('Trillium Hiring Services - Website Loaded Successfully');
