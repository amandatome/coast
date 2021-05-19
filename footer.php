<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>


<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>
<div class="wrapper" id="wrapper-footer">
    <footer class="site-footer" id="colophon">
        <div class="<?php echo esc_attr($container); ?>">
            <div class="row mb-2">
                <div class="col-md-6 col-sm-12" id='footer-one'>
                    <?php dynamic_sidebar('footer_area_one'); ?>
                </div><!--  .col-md-5 -->
                <div class="col-md-6" id='footer-two'>
                    <?php dynamic_sidebar('footer_area_two'); ?>
                </div><!--  .col-md-6-->
            </div>
           <div class='row mt-5'>
                <div class="col-md-6" id='footer-three'>
                    <?php dynamic_sidebar('footer_area_three'); ?>
                </div><!--  .col-md-4-->
                <div class="col-md-6" id='footer-four'>
                    <?php dynamic_sidebar('footer_area_four'); ?>
                </div><!--  .col-md-6-->
            </div>
          
            <div class="site-info mt-3">
            
            <hr>
            <a  class='text-left' href="https://upanddownthecoast.ca/sitemap/">Sitemap</a>
            <p class='text-center'>Copyright © <?php echo date('Y'); ?> - United Church of Canada</p>
          
        </div><!-- .site-info -->

    </footer><!-- #colophon -->

</div>

<?php wp_footer(); ?>

</body>

</html>