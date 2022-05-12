<?php
if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) : 

$footer_style = themesflat_get_opt('footer_style');
if (themesflat_get_opt_elementor('footer_style') != '') {
    $footer_style = themesflat_get_opt_elementor('footer_style');
}        
?> 
<div class="footer-widgets <?php echo esc_attr($footer_style); ?>">
    <div class="container-fluid">
        <div class="row">
            <?php                            
            $footer_widget_areas = themesflat_get_opt('footer_widget_areas');
            $columns = themesflat_widget_layout($footer_widget_areas); 
            $key = 0;
                foreach ($columns as $key => $column) {
                    $key = $key +1;
                    ?>
                <div class="col-md-<?php themesflat_esc_attr($column);?> col-sm-<?php themesflat_esc_attr($column);?> widgets-areas widgets-areas-<?php themesflat_esc_attr($key);?>">
                    <?php                                         
                        $widget = themesflat_get_opt("footer".$key);
                        themesflat_dynamic_sidebar($widget);
                    ?>
                </div>
            <?php } ?>        
        </div>

    </div>
</div>

<?php endif; ?>