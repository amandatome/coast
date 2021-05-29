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

<main class="site-main mb-5" id="content">
	<?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
	<?php get_template_part('global-templates/hero-banner-home'); ?>
	<div class="<?php echo esc_attr( $container ); ?> mt-4" tabindex="-1">
  		<div class='row font-resize'>
			<?php the_breadcrumb();?>
			<?php include 'font-resize.php';?>
		</div>
		<div class='row search-bar my-4'>
			<?php dynamic_sidebar('search_area');?>
		</div>
		<div class='row mt-5'>
            <div class='col-12'>
            <?php the_content();?>
            </div>
		</div>
	</div><!-- .container -->
	<?php endwhile;
        else : ?>
        <p>Sorry no posts matched your criteria.</p>
    <?php endif; ?>
</main><!-- #main -->

<?php
get_footer();
