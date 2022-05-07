<?php 
add_filter( 'elementor/icons_manager/additional_tabs', 'themesflat_iconpicker_register' );

function themesflat_iconpicker_register( $icons = array() ) {
	
	$icons['carenow_icon'] = array(
		'name'          => 'carenow_icon',
		'label'         => esc_html__( 'Carenow Icons', 'themesflat-elementor' ),
		'labelIcon'     => 'carenow-icon-clock',
		'prefix'        => 'carenow-icon-',
		'displayPrefix' => '',
		'url'           => THEMESFLAT_LINK . 'css/icon-carenow.css',
		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/carenow_fonts_default.json',
		'ver'           => '1.0.0',
	);

	$icons['carenow_icon_extend'] = array(
		'name'          => 'carenow_icon_extend',
		'label'         => esc_html__( 'Icons Medical', 'themesflat-elementor' ),
		'labelIcon'     => 'carenow-medical-icon-medical-insurance',
		'prefix'        => 'carenow-medical-icon-',
		'displayPrefix' => '',
		'url'           => THEMESFLAT_LINK . 'css/icon-carenow-medical.css',
		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/carenow_fonts_extend.json',
		'ver'           => '1.0.0',
	);	

	return $icons;
}