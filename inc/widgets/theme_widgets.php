<?php
require_once THEMESFLAT_DIR . 'inc/widgets/themesflat_widget_company_info.php';
require_once THEMESFLAT_DIR . 'inc/widgets/themesflat_widget_payment_icons.php';

function themes_flat_load_widget() {
    register_widget( 'ThemesflatWidgetCompanyInfo' );
    register_widget( 'ThemesflatWidgetPaymentIcons' );
}
add_action( 'widgets_init', 'themes_flat_load_widget' );