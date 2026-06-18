<?php
$mock = [
    'site_url' => 'https://www.trilliumhiring.com',
    'theme_uri'=> '/wp-content/themes/trillium-hiring-hubspot-form',
    'title'    => 'Trillium Hiring Services',
    'desc'     => 'Talent & HR Operations for Small Business and High-Growth Startups',
];

function language_attributes() { return 'lang="en-US"'; }
function bloginfo($x) {
    global $mock;
    if ($x === 'charset') return 'UTF-8';
    if ($x === 'description') return $mock['desc'];
    if ($x === 'name') return $mock['title'];
    return '';
}
function wp_title($sep, $echo, $side) { return 'Contact | ' . bloginfo('name'); }
function esc_url($u) { return $u; }
function esc_attr($s) { return htmlspecialchars($s, ENT_QUOTES); }
function esc_html($s) { return htmlspecialchars($s, ENT_QUOTES); }
function home_url($path = '/') { global $mock; return rtrim($mock['site_url'], '/') . $path; }
function get_template_directory_uri() { global $mock; return $mock['theme_uri']; }
function get_header() { include __DIR__ . '/../header.php'; }
function get_footer() { include __DIR__ . '/../footer.php'; }
function wp_head() {}
function wp_footer() {}
function body_class() { return 'page page-id-348 page-template-default'; }
function is_front_page() { return false; }
function is_home() { return false; }
function is_page($p) {
    $req = $_SERVER['REQUEST_URI'] ?? '/';
    if ($p === 'contact') return strpos($req, '/contact') !== false;
    return false;
}
function wp_body_open() {}
function do_shortcode($s) { return ''; }
function wp_nav_menu($args = []) { return ''; }

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($path === '/' || $path === '/index.php') {
    echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>v9 Test Index</title></head><body>';
    echo '<h1>v9 Visual Test Harness</h1>';
    echo '<ul><li><a href="/contact">/contact</a></li><li><a href="/non-contact">/non-contact</a></li></ul>';
    echo '</body></html>';
    exit;
}
if ($path === '/contact' || $path === '/contact/') { include __DIR__ . '/../page-contact.php'; exit; }
if ($path === '/non-contact') {
    echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Non-contact</title>';
    echo '<link rel="stylesheet" href="/style.css"></head><body>';
    echo '<main style="padding:80px 20px;text-align:center"><h1>Non-contact page</h1>';
    echo '<p>No .hubspot-form-mount on this page.</p></main></body></html>';
    exit;
}
if ($path === '/style.css') { header('Content-Type: text/css'); readfile(__DIR__ . '/../style.css'); exit; }
http_response_code(404); echo 'Not found';
