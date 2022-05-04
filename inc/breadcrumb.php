<?php
if ( ! function_exists( 'breadcrumb_trail' ) ){
	require_once trailingslashit( get_template_directory() ) . 'inc/breadcrumb-trail/breadcrumb-trail.php';
}

function themesflat_breadcrumb() {
	$show_browse = false;
	if (themesflat_get_opt( 'bread_crumb_prefix')) {
		$show_browse = true;
	}    
    $show_title = true;
    $args = array(
        'container' => 'div',
        'before' => '',
        'after' => '',
        'browse_tag' => 'span',
        'list_tag' => 'div',
        'item_tag' => 'span',
        'separater' => '<span class="sep">'.themesflat_get_opt('breadcrumb_separator').'</span>',
        'show_on_front' => true,
        'network' => false,
        'show_title' => $show_title,
        'show_browse' => $show_browse,
        'labels' => array(
            'browse' => themesflat_get_opt( 'bread_crumb_prefix', esc_html__( '', 'grower' ) ),
            'aria_label' => esc_attr_x('Breadcrumbs', 'breadcrumbs aria label', 'grower'),
            'home' => esc_html__('Home', 'grower'),
            'error_404' => esc_html__('404 Not Found', 'grower'),
            'archives' => esc_html__('Archives', 'grower'),
            // Translators: %s is the search query.
            'search' => esc_html__('Search results for: %s', 'grower'),
            // Translators: %s is the page number.
            'paged' => esc_html__('Page %s', 'grower'),
            // Translators: %s is the page number.
            'paged_comments' => esc_html__('Comment Page %s', 'grower'),
            // Translators: Minute archive title. %s is the minute time format.
            'archive_minute' => esc_html__('Minute %s', 'grower'),
            // Translators: Weekly archive title. %s is the week date format.
            'archive_week' => esc_html__('Week %s', 'grower'),

            // "%s" is replaced with the translated date/time format.
            'archive_minute_hour' => '%s',
            'archive_hour' => '%s',
            'archive_day' => '%s',
            'archive_month' => '%s',
            'archive_year' => '%s',
        ),
        'post_taxonomy' => array(
             'post'  => false, // 'post' post type and 'post_tag' taxonomy
        ),
        'echo' => true
    );
    return breadcrumb_trail($args);
}