<?php
// Register action to declare required plugins
add_action('tgmpa_register', 'themesflat_recommend_plugin');
function themesflat_recommend_plugin() {
    
    $plugins = array(
        array(
            'name' => esc_html__('Elementor', 'grower'),
            'slug' => 'elementor',
            'required' => true
        ),
        array(
            'name' => esc_html__('ThemesFlat', 'grower'),
            'slug' => 'themesflat',
            'source' => THEMESFLAT_DIR . 'inc/plugins/themesflat.zip',
            'required' => true
        ),
        array(
            'name' => esc_html__('Themesflat Elementor', 'grower'),
            'slug' => 'themesflat-elementor',
            'source' => THEMESFLAT_DIR . 'inc/plugins/themesflat-elementor.zip',
            'required' => true
        ),         
        array(
            'name' => esc_html__('Revslider', 'grower'),
            'slug' => 'revslider',
            'source' => THEMESFLAT_DIR . 'inc/plugins/revslider.zip',
            'required' => true
        ),
        array(
            'name' => esc_html__('MetForm', 'grower'),
            'slug' => 'metform',
            'required' => true
        ), 
        array(
            'name' => esc_html__('Contact Form 7', 'grower'),
            'slug' => 'contact-form-7',
            'required' => true
        ),    
        array(
            'name' => esc_html__('Mailchimp', 'grower'),
            'slug' => 'mailchimp-for-wp',
            'required' => true
        ),
        array(
            'name' => esc_html__('One Click Demo Import', 'grower'),
            'slug' => 'one-click-demo-import',
            'required' => false
        )   
    );
    
    tgmpa($plugins);
}

