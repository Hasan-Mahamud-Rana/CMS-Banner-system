<?php
// Theme support options
require_once(get_template_directory().'/assets/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/assets/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/assets/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php');

// Adds support for multiple languages
require_once(get_template_directory().'/assets/translation/translation.php');

// Remove 4.2 Emoji Support
require_once(get_template_directory().'/assets/functions/disable-emoji.php');

// Adds site styles to the WordPress editor
require_once(get_template_directory().'/assets/functions/editor-styles.php');

require_once(get_template_directory().'/assets/functions/admin.php');


// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php');

// Use this as a template for custom post types
require_once(get_template_directory().'/assets/functions/custom_standard_banner.php');

// Customize the WordPress login menu
require_once(get_template_directory().'/assets/functions/login.php');

// Post view count
require_once(get_template_directory().'/assets/functions/postview.php');

// Post view at admin panel
require_once(get_template_directory().'/assets/functions/viewatadminpanel.php');

// Post view at admin panel
require_once(get_template_directory().'/assets/functions/statisticsatadminpanel.php');


// Post expire
require_once(get_template_directory().'/assets/functions/expire.php');

// Statistics Template
//require_once(get_template_directory().'/assets/functions/statistics.php');