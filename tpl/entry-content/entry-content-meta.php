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
        echo '<span class="item-meta post-author">';
        printf(
            '
			<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> </a> 
			<a class="meta-text" href="%s" title="%s" rel="author"><i class="fa fa-user-o" aria-hidden="true"></i> %s</a>',
            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
            esc_attr(sprintf(esc_html__('View all posts by %s', 'grower'), get_the_author())),
            get_the_author()
        );
        echo '</span>';
    } elseif ('date' == $meta_element) {
        echo '<span class="item-meta post-date">';
        $archive_year  = get_the_time('Y');
        $archive_month = get_the_time('m');
        $archive_day   = get_the_time('d');
        echo '<a class="meta-text" href="' . get_day_link($archive_year, $archive_month, $archive_day) . '"><i class="fa fa-calendar" aria-hidden="true"></i>' . get_the_date() . '</a>';
        echo '</span>';
    } elseif ('category' == $meta_element) {
        echo '<p class="wrap-title-news">' . esc_html__("", 'grower');
        the_category(', ');
        echo '</p>';
    } elseif ('comment' == $meta_element) {
        echo '<span class="item-meta post-comments"><span class="meta-text">';
        comments_number();
        echo '<span></span>';
    }
endforeach;
echo '</div>';
?>
