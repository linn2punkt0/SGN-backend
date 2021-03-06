<?php

declare (strict_types = 1);

// Register plugin helpers.
require template_path('includes/plugins/plate.php');

// Set theme defaults.
add_action('after_setup_theme', function () {
    // Disable the admin toolbar.
    show_admin_bar(false);

    // Add post thumbnails support.
    add_theme_support('post-thumbnails');

    // Add title tag theme support.
    add_theme_support('title-tag');

    // Add HTML5 theme support.
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'widgets',
    ]);

    // Register navigation menus.
    register_nav_menus([
        'navigation' => __('Navigation', 'wordplate'),
    ]);
});

// Register custom post types.
require get_template_directory() . '/post-types/activities.php';
require get_template_directory() . '/post-types/projects.php';
require get_template_directory() . '/post-types/partners.php';
require get_template_directory() . '/post-types/branches.php';
require get_template_directory() . '/post-types/contacts.php';
require get_template_directory() . '/post-types/footer.php';

// Require custom fields.
require get_template_directory() . '/custom-fields/cf-activities.php';
require get_template_directory() . '/custom-fields/cf-projects.php';
require get_template_directory() . '/custom-fields/cf-partners.php';
require get_template_directory() . '/custom-fields/cf-branches.php';
require get_template_directory() . '/custom-fields/cf-contacts.php';
require get_template_directory() . '/custom-fields/cf-footer.php';

// require custom fields for pages
require get_template_directory() . '/custom-fields-pages/cf-get-involved.php';
require get_template_directory() . '/custom-fields-pages/cf-home.php';
require get_template_directory() . '/custom-fields-pages/cf-who-we-are.php';
require get_template_directory() . '/custom-fields-pages/cf-what-we-do.php';
require get_template_directory() . '/custom-fields-pages/cf-contact.php';

// Enqueue and register scripts the right way.
add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');

    // wp_enqueue_style('wordplate', mix('styles/app.css'));

    // wp_register_script('wordplate', mix('scripts/app.js'), '', '', true);
    // wp_enqueue_script('wordplate');
});

// Remove JPEG compression.
add_filter('jpeg_quality', function () {
    return 100;
}, 10, 2);