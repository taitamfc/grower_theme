<?php
if (themesflat_get_opt('show_bottom') == 1) :
    $footer_botom_button_title = themesflat_get_opt('footer_botom_button_title');
    $footer_botom_button_link = themesflat_get_opt('footer_botom_button_link');
    $footer_botom_content = themesflat_get_opt('footer_botom_content');
?>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="title-footer-bottom">
                        <i> <?= esc_html__($footer_botom_content); ?> </i>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="button-footer wow fadeInUp"> <a class="elementor-button" href="<?= esc_url($footer_botom_button_link); ?>"><?= esc_html__($footer_botom_button_title); ?></a> </div>
                </div>
            </div>
        </div>
    </div><!-- /.footer-bottom -->
<?php endif; ?>