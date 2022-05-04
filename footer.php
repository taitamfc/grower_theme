<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package grower
 */
?>        

    <!-- footer -->
    <footer id="footer">
        <?php get_template_part( 'tpl/footer/footer-widgets'); ?>
    </footer><!-- /#footer -->
    <?php get_template_part( 'tpl/footer/bottom'); ?>
    <?php wp_footer(); ?>
</body>

</html>
