<?php
$classes = 'tf-portfolio-wrap tf-widget-portfolio-wrap';
$classes .= ' ' . $settings['types'];
$classes .= ' ' . $settings['style'];

if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} elseif (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}
$query_args = array(
    'post_type' => 'portfolios',
    'posts_per_page' => $settings['posts_per_page'],
    'paged'     => $paged
);

if (!empty($settings['posts_categories'])) {
    $query_args['tax_query'] = array(
        array(
            'taxonomy' => 'portfolios_category',
            'field'    => 'slug',
            'terms'    => $settings['posts_categories']
        ),
    );
}
if (!empty($settings['exclude'])) {
    if (!is_array($settings['exclude']))
        $exclude = explode(',', $settings['exclude']);

    $query_args['post__not_in'] = $exclude;
}

$query_args['orderby'] = $settings['order_by'];
$query_args['order'] = $settings['order'];

if ($settings['sort_by_id'] != '') {
    $sort_by_id = array_map('trim', explode(',', $settings['sort_by_id']));
    $query_args['post__in'] = $sort_by_id;
    $query_args['orderby'] = 'post__in';
}

$query = new WP_Query($query_args);
if ($query->have_posts()) : ?>
    <div class="<?php echo esc_attr($classes); ?>">
        <div class="grid">
            <?php $i = 1;
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="grid-item">
                    <?php
                    if (has_post_thumbnail()) {
                        echo sprintf('<img src="%s" class="img-%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail', $settings), $i);
                    }
                    ?>
                    <div class="tf-wrap-content-portfolio tf-style-portfolio">
                        <div class="tf-content-portfolio">
                            <ul class="tf-cat-portfolio">
                                <li><a href="<?php echo get_the_permalink(); ?>">Farm House </a></li>
                            </ul>
                            <div class="tf-title-portfolio title-32"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a> </div> <a class="tf-readmore-portfolio" href="<?php echo get_the_permalink(); ?>"> </a>
                        </div>
                    </div>
                </div>
            <?php $i++;
            endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
<?php
else :
    esc_html_e('No posts found', 'themesflat-elementor');
endif;
