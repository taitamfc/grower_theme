<?php
$header_search_box = themesflat_get_opt('header_search_box');
if (themesflat_get_opt_elementor('header_search_box') != '') {
    $header_search_box = themesflat_get_opt_elementor('header_search_box');
}
$header_sidebar_toggler = themesflat_get_opt('header_sidebar_toggler');
if (themesflat_get_opt_elementor('header_sidebar_toggler') != '') {
    $header_sidebar_toggler = themesflat_get_opt_elementor('header_sidebar_toggler');
}
$logo_site = themesflat_get_opt('site_logo');
if (!empty(themesflat_get_opt_elementor('site_logo'))) {
    if (themesflat_get_opt_elementor('site_logo')['url'] != '') {
        $logo_site = themesflat_get_opt_elementor('site_logo')['url'];
    } else {
        $logo_site = themesflat_get_opt('site_logo');
    }
}
?>
<header id="header-02" class="header header-style1 <?php echo themesflat_get_opt_elementor('extra_classes_header'); ?>">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <ul class="wrap-language">
                        <li>
                            <ul class="language text-14">
                                <li><img src="images/home2/01.png" alt="logo" class="img-logo1"></li>
                                <li class="head-english"><a href="#"> English </a> </li>
                                <li class="wrap-usd"><a href="#" class="head-usd"> USD </a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="looking-head center text-14">
                        <a href="#" class="looking-head-1"> What are you looking for </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <ul class="wrap-login">
                        <li class="">
                            <ul class="login-head text-14">
                                <li><a href="#" class="login"> Login </a></li>
                                <li> / </li>
                                <li><a href="#"> Register </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- /#top-bar -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div id="logo" class="logo ">
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="">
                            <img src="<?= $logo_site; ?>" alt="logo" class="img-logo1">
                        </a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address-box">
                        <ul>
                            <li class="address-text1 text-14"> Visit Our Place </li>
                            <li class="address-text2 text-16"> NY 11209, United States </li>
                        </ul>
                    </div>
                </div><!-- /.col-md-4 -->


                <div class="col-sm-3">
                    <div class="wrap-time">
                        <div class="text-18-style">
                            <div class="time-title-1">CLOCK&ensp;MON - SAT 8:00 - 6:30,</div>
                            <div class="time-title-2"> SUNDAY - CLOSED</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /#top-bar -->
    <div class="btn-menu tf-menu">
        <span></span>
    </div><!-- //mobile menu button -->

    <div class="header-wrap style-header">
        <div class="container style-2">
            <div class="row">
                <div class="col-md-9 ">
                    <nav id="mainnav" class="mainnav home2">
                        <?php
                        wp_nav_menu(array('theme_location' => 'primary', 'fallback_cb' => 'themesflat_menu_fallback', 'container' => false));
                        ?>
                    </nav><!-- /#mainnav -->
                </div><!-- /.col-md -->
                <div class="col-md-3">
                    <div class="header-right">
                        <div class="list-icon ">
                            <div class="list-social icon-home2">
                                <a href="#"> <i class="fab fa-behance" aria-hidden="true"></i> </a>
                                <a href="#"> <i class="fab fa-dribbble" aria-hidden="true"></i> </a>
                                <a href="#"> <i class="fab fa-instagram" aria-hidden="true"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header><!-- /header -->