<?php
$header_search_box = themesflat_get_opt('header_search_box');
if (themesflat_get_opt_elementor('header_search_box') != '') {
    $header_search_box = themesflat_get_opt_elementor('header_search_box');
}
$header_sidebar_toggler = themesflat_get_opt('header_sidebar_toggler');
if (themesflat_get_opt_elementor('header_sidebar_toggler') != '') {
    $header_sidebar_toggler = themesflat_get_opt_elementor('header_sidebar_toggler');
}
$header_id = (is_page_template('tpl/front-page.php')) ? 'header-home' : 'header';
?>
<header id="<?= $header_id; ?>" class="header header-style1 <?php echo themesflat_get_opt_elementor('extra_classes_header'); ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="btn-menu">
                <span></span>
            </div><!-- //mobile menu button -->
            <div class="header-wrap">
                <div class="col-md-2 ">
                    <?php get_template_part('tpl/header/brand'); ?>
                </div><!-- /.col-md -->
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="nav-wrap">
                        <nav id="mainnav" class="mainnav home1">
                            <?php
                            wp_nav_menu(array('theme_location' => 'primary', 'fallback_cb' => 'themesflat_menu_fallback', 'container' => false));
                            ?>
                        </nav><!-- /#mainnav -->
                    </div><!-- /.nav-wrap -->
                </div><!-- /.col-md -->
                <div class="col-mt">
                    <div class="header-right">
                        <div class="time">
                            <div class="list-time-1">CLOCK&ensp;MON - SAT 8:00 - 6:30,</div>
                            <div class="list-time-2"> SUNDAY - CLOSED</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-">
                    <div class="header-right">
                        <div class="list-icon">
                            <div class="list-social">
                                <a href="#"> <i class="fab fa-behance" aria-hidden="true"></i> </a>
                                <a href="#"> <i class="fab fa-dribbble" aria-hidden="true"></i> </a>
                                <a href="#"> <i class="fab fa-instagram" aria-hidden="true"></i> </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- /Breacum -->

    </div>
</header><!-- /header -->