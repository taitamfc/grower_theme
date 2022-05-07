<?php

/**
 * @package grower
 */
?>
<?php
echo '<div class="post-meta">';
$meta_elements = themesflat_layout_draganddrop(themesflat_get_opt('meta_elements'));
foreach ($meta_elements as $meta_element) :
    if ('author' == $meta_element) {
        printf(
            '
			<a href="#" class="meta-text"><i class="fa fa-heart" aria-hidden="true"></i> </a> 
			<a class="meta-text" href="%s" title="%s" rel="author"><i class="fa fa-user" aria-hidden="true"></i><span class="tooltip"> %s</span></a>',
            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
            esc_attr(sprintf(esc_html__('View all posts by %s', 'grower'), get_the_author())),
            get_the_author()
        );
    } elseif ('date' == $meta_element) {
        $archive_year  = get_the_time('Y');
        $archive_month = get_the_time('m');
        $archive_day   = get_the_time('d');
        echo '<a class="meta-text" href="' . get_day_link($archive_year, $archive_month, $archive_day) . '"><i class="fa fa-calendar" aria-hidden="true"></i><span class="tooltip">' . get_the_date() . '</span></a>';
        echo '</span>';
    } elseif ('category' == $meta_element) {
        echo '<p class="wrap-title-news">' . esc_html__("", 'grower');
        the_category(', ');
        echo '</p>';
    } elseif ('comment' == $meta_element) {
        echo '<span class="item-meta post-comments"><span class="meta-text">';
        comments_number();
        echo '<span>';
    }
endforeach;
echo '</div>';
?>
