<?php 
// ADD SECTION ACTION BOX
// $wp_customize->add_section('section_action_box',array(
    // 'title'         => 'Action box',
    // 'priority'      => 1,
    // 'panel'         => 'footer_panel',
// ));
// require THEMESFLAT_DIR . "inc/customizer/footer/action-box.php";

// ADD SECTION PARTNER BOX
// $wp_customize->add_section('section_partner_box',array(
    // 'title'         => 'Partner Box',
    // 'priority'      => 2,
    // 'panel'         => 'footer_panel',
// ));
// require THEMESFLAT_DIR . "inc/customizer/footer/partner-box.php";

// ADD SECTION INFO
// $wp_customize->add_section('section_info_footer',array(
    // 'title'         => 'Info',
    // 'priority'      => 3,
    // 'panel'         => 'footer_panel',
// ));
// require THEMESFLAT_DIR . "inc/customizer/footer/info.php";

// ADD SECTION FOOTER
$wp_customize->add_section('section_footer',array(
    'title'         => 'Footer',
    'priority'      => 4,
    'panel'         => 'footer_panel',
));
require THEMESFLAT_DIR . "inc/customizer/footer/footer.php";

//ADD SECTION BOTTOM
$wp_customize->add_section('section_bottom',array(
    'title'         => 'Bottom',
    'priority'      => 5,
    'panel'         => 'footer_panel',
)); 
require THEMESFLAT_DIR . "inc/customizer/footer/bottom.php";