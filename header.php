<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

    <link rel="preconnect" href="https://api.fontshare.com" crossorigin>
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500,700,900&display=swap" rel="stylesheet">

    <!-- HubSpot Forms embed (portal 245446467, region na2).
         Script is lazily injected ONLY when a .hubspot-form-mount target is
         present on the page (saves ~50KB on every other page).
         Mounts forms when DOM + HubSpot embed script are both ready.
         Shows an error message if HubSpot fails to load within 6 seconds
         (e.g. ad-blocker, network failure). -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var CONTACT_FORM_ID = '4b24bb98-e289-4d8f-b362-94abce40e614';
        var PORTAL_ID       = '245446467';
        var REGION          = 'na2';
        var LOAD_TIMEOUT_MS = 6000;

        var targets = document.querySelectorAll('.hubspot-form-mount');
        if (!targets.length) return;

        var loadTimer = setTimeout(function () {
            targets.forEach(function (t) {
                if (t.dataset.hubspotState === 'error') return;
                t.dataset.hubspotState = 'error';
                t.innerHTML =
                    '<div class="hubspot-form-error" role="alert">' +
                    '<strong>Form unavailable.</strong> ' +
                    'Please email us directly at ' +
                    '<a href="mailto:info@trillycorp.com">info@trillycorp.com</a> ' +
                    'or call +1 401-559-6483.' +
                    '</div>';
            });
        }, LOAD_TIMEOUT_MS);

        function mountForms() {
            clearTimeout(loadTimer);
            if (!window.hbspt || !window.hbspt.forms) return;
            targets.forEach(function (t) {
                if (t.dataset.hubspotMounted === '1') return;
                t.dataset.hubspotMounted = '1';
                hbspt.forms.create({
                    portalId: PORTAL_ID,
                    formId:   t.dataset.formId || CONTACT_FORM_ID,
                    region:   REGION,
                    target:   '#' + t.id
                });
            });
        }

        var s = document.createElement('script');
        s.src = '//js.hsforms.net/forms/embed/v2.js';
        s.async = true;
        s.defer = true;
        s.onload = mountForms;
        s.onerror = function () { /* timeout fallback handles UI */ };
        document.head.appendChild(s);
    });
    </script>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Navigation -->
<nav class="nav" id="mainNav">
    <div class="nav-container">
        <div class="nav-logo">
            <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Trillium Hiring Services — home">
                <span class="brand-logo-wrap">
                    <img
                        class="brand-logo-img"
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-trillycorp.png'); ?>"
                        alt="Trillium logo"
                        width="40"
                        height="40"
                        loading="eager"
                    >
                </span>
                <span class="brand-text">
                    <strong class="brand-name">Trillium Hiring</strong>
                    <span class="brand-sub">Talent & HR Operations</span>
                </span>
            </a>
        </div>
        <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <ul class="nav-menu" id="navMenu">
            <li>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link<?php echo (is_front_page() || is_home()) ? ' active' : ''; ?>">Home</a>
            </li>
            <li>
                <a href="<?php echo esc_url(home_url('/thr-smb/')); ?>" class="nav-link<?php echo is_page('thr-smb') ? ' active' : ''; ?>">Small Business</a>
            </li>
            <li>
                <a href="<?php echo esc_url(home_url('/thr-hgs/')); ?>" class="nav-link<?php echo is_page('thr-hgs') ? ' active' : ''; ?>">High-Growth Startups</a>
            </li>
            <li>
                <a href="<?php echo esc_url(home_url('/resources/')); ?>" class="nav-link<?php echo is_page('resources') ? ' active' : ''; ?>">Resources</a>
            </li>
            <li>
                <a href="<?php echo esc_url(home_url('/about/')); ?>" class="nav-link<?php echo is_page('about') ? ' active' : ''; ?>">About Us</a>
            </li>
            <li>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="nav-link<?php echo is_page('contact') ? ' active' : ''; ?>">Contact</a>
            </li>
            <li>
                <a href="<?php echo esc_url(home_url('/contact/#contact-form')); ?>" class="btn btn-nav">Book Consultation</a>
            </li>
        </ul>
    </div>
</nav>