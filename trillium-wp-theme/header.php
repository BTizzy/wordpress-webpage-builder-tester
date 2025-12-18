<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Navigation -->
<nav class="nav" id="mainNav">
    <div class="nav-container">
        <div class="nav-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">TRILLIUM HIRING SERVICES</a>
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
                <a href="<?php echo esc_url(home_url('/about/')); ?>" class="nav-link<?php echo is_page('about') ? ' active' : ''; ?>">About</a>
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
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="nav-link<?php echo is_page('contact') ? ' active' : ''; ?>">Contact</a>
            </li>
            <li>
                <a href="<?php echo esc_url(home_url('/#book')); ?>" class="btn btn-nav">Book Consultation</a>
            </li>
        </ul>
    </div>
</nav>