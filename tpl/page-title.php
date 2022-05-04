<?php 
if ( is_page() && is_page_template( 'tpl/front-page.php' ) ) {
    return;
}

$titles = themesflat_get_page_titles();    
ob_start();
if ( $titles['title'] ) { printf( '%s', wp_kses_post($titles['title']) ); }
$title = ob_get_clean();

if ( $title == '' ){ return; } 
?>
<!-- Page title -->
<?php
$page_title_styles = themesflat_get_opt('page_title_styles');
$page_title_alignment = themesflat_get_opt('page_title_alignment');
$page_title_video_url = themesflat_get_opt('page_title_video_url');
?>

<div class="wrap-banner">
    <div class="page-title <?php echo esc_attr($page_title_styles); ?> <?php echo esc_attr($page_title_alignment); ?> <?php echo themesflat_get_opt_elementor('extra_classes_pagetitle'); ?>">
    <?php                 
        if ( themesflat_get_opt('page_title_heading_enabled') == 1 ) {
            echo sprintf('<h1 class="heading-title-page">%s</h1>', $title); 
        }  
    ?>
    <?php 
        if ( themesflat_get_opt( 'breadcrumb_enabled' ) == 1 ):
            themesflat_breadcrumb();
        endif;                       
    ?>
    </div>
</div>