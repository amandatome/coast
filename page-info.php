<?php
/**
 * Template Name: Info Template
 *
 * Template for home page.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<main class="site-main mb-5" id="main">
<?php get_template_part('global-templates/hero-banner-home'); ?>
	<div class="<?php echo esc_attr( $container ); ?> mt-4" id="content" tabindex="-1">
    <?php the_breadcrumb();?>
		<section class='row mt-5'>
            <div class='col-12'>
            <?php the_content();?>
            </div>
        </section>
	</div><!-- #content -->
	</main><!-- #main -->

<?php
get_footer();
