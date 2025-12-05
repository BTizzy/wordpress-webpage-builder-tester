// ========================================
// TRILLIUM HIRING SERVICES - WORDPRESS READY SCRIPT
// ========================================

// WordPress Compatibility Wrapper
(function() {
    'use strict';

    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        initTrilliumFeatures();
    });

    function initTrilliumFeatures() {
        initNavigation();
        initScrollAnimations();
        initSmoothScroll();
        initForms();
        initWordPressCompatibility();
        initParallaxEffects();
        initMouseTracking();
        initTypewriterEffect();
        initAirplaneAnimation();
        initFloatingElements();
        initAdvancedScrollEffects();
    }

    // ========================================
    // NAVIGATION
    // ========================================

    function initNavigation() {
        const nav = document.querySelector('.trillium-nav');
        const navToggle = document.querySelector('.trillium-nav .nav-toggle');
        const navMenu = document.querySelector('.trillium-nav .nav-menu');

        // Scroll effect for navigation
        if (nav) {
            window.addEventListener('scroll', throttle(function() {
                if (window.scrollY > 50) {
                    nav.classList.add('scrolled');
                } else {
                    nav.classList.remove('scrolled');
                }
            }, 16));
        }

        // Mobile menu toggle
        if (navToggle && navMenu) {
            navToggle.addEventListener('click', function() {
                navToggle.classList.toggle('active');
                navMenu.classList.toggle('active');
                document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
            });

            // Close menu when clicking on a link
            const navLinks = navMenu.querySelectorAll('a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    navToggle.classList.remove('active');
                    navMenu.classList.remove('active');
                    document.body.style.overflow = '';
                });
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (nav && !nav.contains(event.target) && navMenu.classList.contains('active')) {
                    navToggle.classList.remove('active');
                    navMenu.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        }
    }

    // ========================================
    // SMOOTH SCROLL
    // ========================================

    function initSmoothScroll() {
        const links = document.querySelectorAll('.trillium-container a[href^="#"]');
        
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                
                if (href === '#' || href === '#0') return;
                
                e.preventDefault();
                
                const target = document.querySelector(href);
                if (target) {
                    const headerOffset = getHeaderOffset();
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // ========================================
    // SCROLL ANIMATIONS
    // ========================================

    function initScrollAnimations() {
        const animateElements = document.querySelectorAll('.trillium-container .value-card, .trillium-container .service-card');
        
        if (animateElements.length === 0) return;

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    entry.target.classList.add('animated');
                }
            });
        }, observerOptions);

        animateElements.forEach((element, index) => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            element.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
            observer.observe(element);
        });
    }

    // ========================================
    // FORM HANDLING
    // ========================================

    function initForms() {
        // Newsletter form
        const newsletterForm = document.querySelector('.trillium-container #newsletterForm');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const emailInput = this.querySelector('input[type="email"]');
                const submitBtn = this.querySelector('button[type="submit"]');
                
                if (emailInput && emailInput.value && submitBtn) {
                    // Validate email format
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(emailInput.value)) {
                        showNotification('Please enter a valid email address', 'error');
                        emailInput.focus();
                        return;
                    }
                    
                    // Show loading state
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<span class="spinner"></span>Subscribing...';
                    submitBtn.classList.add('loading');
                    submitBtn.disabled = true;
                    
                    // Simulate API call
                    setTimeout(() => {
                        // Success state
                        submitBtn.innerHTML = '✓ Subscribed!';
                        submitBtn.classList.remove('loading');
                        submitBtn.classList.add('success');
                        emailInput.value = '';
                        
                        // Show success notification
                        showNotification('Successfully subscribed to our newsletter!', 'success');
                        
                        // Reset button after delay
                        setTimeout(() => {
                            submitBtn.innerHTML = originalText;
                            submitBtn.classList.remove('success');
                            submitBtn.disabled = false;
                        }, 3000);
                    }, 1500);
                }
            });
            
            // Real-time email validation
            const emailInput = newsletterForm.querySelector('input[type="email"]');
            if (emailInput) {
                emailInput.addEventListener('input', function() {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (this.value && !emailRegex.test(this.value)) {
                        this.style.borderColor = '#dc3545';
                    } else {
                        this.style.borderColor = '';
                    }
                });
            }
        }

        // Contact forms (WordPress compatibility)
        const contactForms = document.querySelectorAll('.trillium-container form:not(#newsletterForm)');
        contactForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"], input[type="submit"]');
                if (submitBtn) {
                    const originalText = submitBtn.value || submitBtn.textContent;
                    
                    // Add loading state
                    if (submitBtn.tagName === 'BUTTON') {
                        submitBtn.textContent = 'Sending...';
                    } else {
                        submitBtn.value = 'Sending...';
                    }
                    submitBtn.disabled = true;
                    
                    // Re-enable after reasonable time (WordPress forms handle the rest)
                    setTimeout(() => {
                        if (submitBtn.tagName === 'BUTTON') {
                            submitBtn.textContent = originalText;
                        } else {
                            submitBtn.value = originalText;
                        }
                        submitBtn.disabled = false;
                    }, 3000);
                }
            });
        });
    }

    // ========================================
    // ADVANCED VISUAL EFFECTS
    // ========================================

    function initParallaxEffects() {
        const parallaxElements = document.querySelectorAll('.trillium-container .floating-shape');
        
        window.addEventListener('scroll', throttle(() => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            
            parallaxElements.forEach((element, index) => {
                const speed = (index + 1) * 0.3;
                element.style.transform = `translateY(${rate * speed}px) rotate(${scrolled * 0.1}deg)`;
            });
        }, 16));
    }

    function initMouseTracking() {
        const hero = document.querySelector('.trillium-container .hero');
        if (!hero) return;

        let mouseX = 0, mouseY = 0;
        let currentX = 0, currentY = 0;

        hero.addEventListener('mousemove', (e) => {
            const rect = hero.getBoundingClientRect();
            mouseX = (e.clientX - rect.left - rect.width / 2) / rect.width;
            mouseY = (e.clientY - rect.top - rect.height / 2) / rect.height;
        });

        function animateFloatingShapes() {
            currentX += (mouseX - currentX) * 0.1;
            currentY += (mouseY - currentY) * 0.1;

            const shapes = hero.querySelectorAll('.floating-shape');
            shapes.forEach((shape, index) => {
                const multiplier = (index + 1) * 15;
                shape.style.transform = `translate(${currentX * multiplier}px, ${currentY * multiplier}px)`;
            });

            requestAnimationFrame(animateFloatingShapes);
        }
        animateFloatingShapes();
    }

    function initTypewriterEffect() {
        const subtitle = document.querySelector('.trillium-container .hero-subtitle');
        if (!subtitle) return;

        const text = "Building The Landing Gear While Flying The Plane";
        subtitle.textContent = '';
        subtitle.style.opacity = '1';

        let i = 0;
        const typeSpeed = 80;

        function typeWriter() {
            if (i < text.length) {
                subtitle.textContent += text.charAt(i);
                i++;
                setTimeout(typeWriter, typeSpeed);
            } else {
                // Add a blinking cursor effect at the end
                setTimeout(() => {
                    subtitle.style.borderRight = '2px solid rgba(255, 255, 255, 0.8)';
                    subtitle.style.animation = 'blink 1s infinite';
                }, 500);
            }
        }

        // Add blinking animation CSS
        const style = document.createElement('style');
        style.textContent = `
            @keyframes blink {
                0%, 50% { border-right-color: rgba(255, 255, 255, 0.8); }
                51%, 100% { border-right-color: transparent; }
            }
        `;
        document.head.appendChild(style);

        // Start typewriter effect after a delay
        setTimeout(typeWriter, 1500);
    }

    function initAirplaneAnimation() {
        const airplaneAnimation = document.querySelector('.trillium-container .airplane-animation');
        if (!airplaneAnimation) return;

        // Add some interactive hover effects
        const airplane = airplaneAnimation.querySelector('.airplane-svg');
        if (airplane) {
            airplane.addEventListener('mouseenter', () => {
                airplane.style.transform = 'scale(1.05)';
                airplane.style.transition = 'transform 0.3s ease';
            });

            airplane.addEventListener('mouseleave', () => {
                airplane.style.transform = 'scale(1)';
            });
        }

        // Optional: Restart animation on click
        airplane.addEventListener('click', () => {
            airplaneAnimation.style.animation = 'none';
            setTimeout(() => {
                airplaneAnimation.style.animation = 'fadeInAirplane 1s ease-out forwards';
            }, 10);
        });
    }

    function initFloatingElements() {
        // Create floating particles
        const hero = document.querySelector('.trillium-container .hero');
        if (!hero) return;

        for (let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.className = 'floating-particle';
            particle.style.cssText = `
                position: absolute;
                width: ${Math.random() * 4 + 2}px;
                height: ${Math.random() * 4 + 2}px;
                background: rgba(255, 255, 255, ${Math.random() * 0.3 + 0.1});
                border-radius: 50%;
                left: ${Math.random() * 100}%;
                top: ${Math.random() * 100}%;
                animation: float ${Math.random() * 10 + 10}s linear infinite;
                pointer-events: none;
            `;
            hero.appendChild(particle);
        }

        // Add floating animation CSS
        const style = document.createElement('style');
        style.textContent = `
            @keyframes float {
                0% {
                    transform: translateY(100vh) rotate(0deg);
                    opacity: 0;
                }
                10% {
                    opacity: 1;
                }
                90% {
                    opacity: 1;
                }
                100% {
                    transform: translateY(-100vh) rotate(360deg);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    function initAdvancedScrollEffects() {
        // Progressive reveal for service cards
        const serviceCards = document.querySelectorAll('.trillium-container .service-card');
        const valueCards = document.querySelectorAll('.trillium-container .value-card');

        const observerOptions = {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        };

        const cardObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.transform = 'translateY(0) scale(1)';
                        entry.target.style.opacity = '1';
                        entry.target.classList.add('revealed');
                    }, index * 150);
                }
            });
        }, observerOptions);

        [...serviceCards, ...valueCards].forEach((card, index) => {
            card.style.transform = 'translateY(50px) scale(0.95)';
            card.style.opacity = '0';
            card.style.transition = `all 0.8s cubic-bezier(0.4, 0, 0.2, 1) ${index * 0.1}s`;
            cardObserver.observe(card);
        });

        // Scroll progress indicator
        const progressBar = document.createElement('div');
        progressBar.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, #D4A574, #B8941F);
            z-index: 10000;
            transition: width 0.3s ease;
        `;
        document.body.appendChild(progressBar);

        window.addEventListener('scroll', throttle(() => {
            const scrollProgress = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
            progressBar.style.width = Math.min(scrollProgress, 100) + '%';
        }, 16));

        // Section fade effects
        const sections = document.querySelectorAll('.trillium-container section');
        sections.forEach(section => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            section.style.opacity = '0';
            section.style.transform = 'translateY(30px)';
            section.style.transition = 'all 1s cubic-bezier(0.4, 0, 0.2, 1)';
            observer.observe(section);
        });
    }

    // ========================================
    // NOTIFICATION SYSTEM
    // ========================================

    function showNotification(message, type = 'info') {
        // Remove existing notifications
        const existing = document.querySelectorAll('.trillium-notification');
        existing.forEach(notif => notif.remove());
        
        // Create notification
        const notification = document.createElement('div');
        notification.className = `trillium-notification trillium-notification-${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <span class="notification-icon">${type === 'success' ? '✓' : type === 'error' ? '⚠' : 'ℹ'}</span>
                <span class="notification-message">${message}</span>
                <button class="notification-close" onclick="this.parentElement.parentElement.remove()">×</button>
            </div>
        `;
        
        // Add styles
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${type === 'success' ? '#d4edda' : type === 'error' ? '#f8d7da' : '#d1ecf1'};
            color: ${type === 'success' ? '#155724' : type === 'error' ? '#721c24' : '#0c5460'};
            border: 1px solid ${type === 'success' ? '#c3e6cb' : type === 'error' ? '#f5c6cb' : '#bee5eb'};
            border-radius: 8px;
            padding: 12px 16px;
            max-width: 400px;
            z-index: 10000;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transform: translateX(100%);
            transition: transform 0.3s ease;
        `;
        
        // Add to page
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 10);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (notification.parentElement) {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => notification.remove(), 300);
            }
        }, 5000);
    }

    // ========================================
    // WORDPRESS COMPATIBILITY
    // ========================================

    function initWordPressCompatibility() {
        // Handle WordPress admin bar
        adjustForAdminBar();
        
        // Handle WordPress navigation
        handleWordPressNav();
        
        // Ensure proper z-index layering
        adjustZIndex();
    }

    function adjustForAdminBar() {
        const wpAdminBar = document.getElementById('wpadminbar');
        if (wpAdminBar) {
            const nav = document.querySelector('.trillium-nav');
            if (nav) {
                const adminBarHeight = wpAdminBar.offsetHeight;
                nav.style.top = adminBarHeight + 'px';
                
                // Adjust hero section padding if needed
                const hero = document.querySelector('.trillium-container .hero');
                if (hero) {
                    hero.style.paddingTop = (adminBarHeight + 60) + 'px';
                }
            }
        }
    }

    function handleWordPressNav() {
        // Handle WordPress theme menu toggle if it exists
        const wpMenuToggle = document.querySelector('.menu-toggle');
        const wpNavMenu = document.querySelector('.main-navigation ul');
        
        if (wpMenuToggle && wpNavMenu) {
            wpMenuToggle.addEventListener('click', function() {
                wpNavMenu.classList.toggle('active');
            });
        }
    }

    function adjustZIndex() {
        // Ensure our navigation doesn't conflict with WordPress elements
        const nav = document.querySelector('.trillium-nav');
        if (nav) {
            const wpAdminBar = document.getElementById('wpadminbar');
            if (wpAdminBar) {
                const adminBarZIndex = parseInt(window.getComputedStyle(wpAdminBar).zIndex) || 99999;
                nav.style.zIndex = (adminBarZIndex - 1).toString();
            }
        }
    }

    function getHeaderOffset() {
        let offset = 80; // Default offset
        
        const wpAdminBar = document.getElementById('wpadminbar');
        if (wpAdminBar) {
            offset += wpAdminBar.offsetHeight;
        }
        
        const nav = document.querySelector('.trillium-nav');
        if (nav) {
            offset += nav.offsetHeight;
        }
        
        return offset;
    }

    // ========================================
    // UTILITY FUNCTIONS
    // ========================================

    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    function debounce(func, wait, immediate) {
        let timeout;
        return function executedFunction() {
            const context = this;
            const args = arguments;
            const later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

    // ========================================
    // EXPOSE GLOBAL FUNCTIONS FOR WORDPRESS
    // ========================================

    // Make functions available globally for WordPress integration
    window.TrilliumHiring = {
        init: initTrilliumFeatures,
        navigation: initNavigation,
        animations: initScrollAnimations,
        forms: initForms,
        smoothScroll: initSmoothScroll
    };

})();