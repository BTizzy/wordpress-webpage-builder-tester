<?php
// Enqueue styles and scripts
function trillium_theme_setup() {
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    
    // Register menus
    register_nav_menus(array(
        'primary' => 'Primary Navigation',
    ));
}
add_action('after_setup_theme', 'trillium_theme_setup');

// Enqueue styles and scripts
function trillium_enqueue_assets() {
    // Enqueue the main stylesheet
    wp_enqueue_style('trillium-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue JavaScript
    wp_enqueue_script('trillium-main-js', get_template_directory_uri() . '/assets/script.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'trillium_enqueue_assets');

// Create custom pages on theme activation
function trillium_create_pages() {
    $pages = array(
        'About' => 'Learn about Trillium Hiring Services and our mission to help businesses build better people operations.',
        'Contact' => 'Get in touch with us to discuss your HR and talent acquisition needs.',
        'Small Business HR' => 'Comprehensive HR solutions designed specifically for small and growing businesses.',
        'Startup HR' => 'Embedded HR systems and talent acquisition for high-growth startups and scale-ups.',
        'Learn' => 'Practical guides for small businesses and startups building modern people systems.'
    );
    
    foreach ($pages as $title => $content) {
        $page_check = get_page_by_title($title);
        if (!isset($page_check->ID)) {
            $new_page = array(
                'post_type' => 'page',
                'post_title' => $title,
                'post_content' => $content,
                'post_status' => 'publish',
                'post_author' => 1,
            );
            wp_insert_post($new_page);
        }
    }
}
add_action('after_switch_theme', 'trillium_create_pages');

// Custom page templates
function trillium_page_template($template) {
    if (is_page()) {
        $page_template = '';
        
        if (is_page('thr-smb')) {
            $page_template = 'page-small-business.php';
        } elseif (is_page('thr-hgs')) {
            $page_template = 'page-startup.php';
        } elseif (is_page('about')) {
            $page_template = 'page-about.php';
        } elseif (is_page('contact')) {
            $page_template = 'page-contact.php';
        } elseif (is_page('blog') || is_page('learn')) {
            $page_template = 'page-blog.php';
        }
        
        if ($page_template && locate_template($page_template)) {
            return locate_template($page_template);
        }
    }
    return $template;
}
add_filter('template_include', 'trillium_page_template');

// Remove WordPress admin bar for cleaner frontend
add_filter('show_admin_bar', '__return_false');

// Add custom body classes
function trillium_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'homepage';
    }
    return $classes;
}
add_filter('body_class', 'trillium_body_classes');
?>