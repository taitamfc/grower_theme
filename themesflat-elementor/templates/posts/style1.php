<?php
$get_id_post_thumbnail = get_post_thumbnail_id();
$featured_image = sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src($get_id_post_thumbnail, 'thumbnail', $settings));
$terms = get_the_terms(get_the_ID(), 'category');

?><?php if ($settings['carousel'] != 'yes') : ?>
<div class="col-md-6 col-sm-6">
<?php endif; ?>
<div class="our-news-box style-2 wow fadeInUp"> <?php if ($settings['show_image'] == 'yes') : ?>
        <div class="img-news-box"> <?php echo sprintf('%s', $featured_image); ?>
            <div class="overlay-news"></div>
        </div>
    <?php endif; ?>
    <div class="list-news">

        <?php if (!empty($terms)) : ?>
            <div class="category-list">
                <?php foreach ($terms as $term) : ?>
                    <p class="wrap-title-news"><?= $term->name ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <?php if ($settings['show_title'] == 'yes') : ?>
            <a href="<?php echo esc_url(get_permalink()) ?>" class="">
                <h3 class=""> Organic Farming Ecotourism Of Agriculture Systems.</h3>
            </a>
        <?php endif; ?>
        <?php if ($settings['show_excerpt'] == 'yes') : ?>
            <div class="subtext-blog"> <?php echo wp_trim_words(get_the_content(), $settings['excerpt_lenght'], ''); ?>
            </div>
        <?php endif; ?>
        <?php if ($settings['show_meta'] == 'yes') : ?>
            <span class="list-icon-news">
                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> </a>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    <?php // echo get_the_author(); 
                    ?>
                </a>
                <?php
                $archive_year  = get_the_time('Y');
                $archive_month = get_the_time('m');
                $archive_day   = get_the_time('d');
                ?>
                <a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php // echo get_the_date(); 
                    ?>
                </a>
            </span>
        <?php endif; ?>
        <?php if ($settings['show_button'] == 'yes' && $settings['button_text'] != '') : ?>
            <a href="<?php echo esc_url(get_permalink()) ?>" class="icon-right-box">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        <?php endif; ?>
    </div>
</div>
<?php if ($settings['carousel'] != 'yes') : ?>
</div>
<?php endif; ?>
<div class="item" style="display:none;">
    <div class="entry blog-post">
        <?php if ($settings['show_image'] == 'yes') : ?>
            <div class="featured-post">
                <a href="<?php echo esc_url(get_permalink()) ?>">
                    <?php echo sprintf('%s', $featured_image); ?>
                </a>
                <?php if ($settings['show_button'] == 'yes' && $settings['button_text'] != '') : ?>
                    <a href="<?php echo esc_url(get_permalink()) ?>" class="tf-button"><?php echo esc_attr($settings['button_text']); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="content">
            <?php if ($settings['show_meta'] == 'yes') : ?>
                <div class="post-meta">
                    <span class="post-meta-item">
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>
                    </span>
                    <div class="post-meta-item">
                        <?php
                        $archive_year  = get_the_time('Y');
                        $archive_month = get_the_time('m');
                        $archive_day   = get_the_time('d');
                        ?>
                        <a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($settings['show_title'] == 'yes') : ?>
                <h2 class="title"><a href="<?php echo esc_url(get_the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php echo get_the_title(); ?></a></h2>
            <?php endif; ?>

            <?php if ($settings['show_meta'] == 'yes' && $settings['style'] == 'style2') : ?>
                <div class="post-meta-category">
                    <?php
                    $archive_year  = get_the_time('Y');
                    $archive_month = get_the_time('m');
                    $archive_day   = get_the_time('d');
                    ?>
                    <a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a>
                </div>
            <?php endif; ?>

            <?php if ($settings['show_excerpt'] == 'yes') : ?>
                <div class="content-post"><?php echo wp_trim_words(get_the_content(), $settings['excerpt_lenght'], ''); ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>