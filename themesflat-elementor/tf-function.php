<?php 
if(!function_exists('flat_get_post_page_content')){
    function flat_get_post_page_content( $slug ) {
        $content_post = get_posts(array(
            'name' => $slug,
            'posts_per_page' => 1,
            'post_type' => 'elementor_library',
            'post_status' => 'publish'
        ));
        if (array_key_exists(0, $content_post) == true) {
            $id = $content_post[0]->ID;
            return $id;
        }
    }
}

if(!function_exists('tf_header_enabled')){
    function tf_header_enabled() {
        $header_id = ThemesFlat_Addon_For_Elementor_Carenow::get_settings( 'type_header', '' );
        $status    = false;

        if ( '' !== $header_id ) {
            $status = true;
        }

        return apply_filters( 'tf_header_enabled', $status );
    }
}

if(!function_exists('tf_footer_enabled')){
    function tf_footer_enabled() {
        $header_id = ThemesFlat_Addon_For_Elementor_Carenow::get_settings( 'type_footer', '' );
        $status    = false;

        if ( '' !== $header_id ) {
            $status = true;
        }

        return apply_filters( 'tf_footer_enabled', $status );
    }
}

if(!function_exists('get_header_content')){
    function get_header_content() {
        $tf_get_header_id = ThemesFlat_Addon_For_Elementor_Carenow::tf_get_header_id();
        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($tf_get_header_id);
    }
}

if(!function_exists('tf_get_template_widget')){
    function tf_get_template_widget($template_name, $args = null, $return = false){
        $template_file = $template_name . '.php';
        $default_folder = plugin_dir_path(__FILE__) . 'templates/';
        $theme_folder = apply_filters('tf_templates_folder', dirname(plugin_basename(__FILE__)));
        $template = locate_template($theme_folder . '/' . $template_file);
        if (!$template) {
            $template = $default_folder . $template_file;
        }
        if ($args && is_array($args)) {
            extract($args);
        }
        if ($return) {
            ob_start();
        }
        if (file_exists($template)) {
            include $template;
        }
        if ($return) {
            return ob_get_clean();
        }
        return null;
    }
}