
<?php



add_filter('template_include', function ($template) {

    if (is_singular('courses')) {

        // Force WordPress to use the theme's single template so Elementor Theme Builder can hook in

        $forced = locate_template(['single-courses.php', 'single.php', 'index.php']);

        if (!empty($forced)) {

            return $forced;

        }

    }

    return $template;

}, 999); // very high priority
 
