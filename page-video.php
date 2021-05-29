<?php
/**
 * Template Name: Video Template
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

<main class="site-main" id="content">
     <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>	
    <?php get_template_part('global-templates/hero-banner-home'); ?>
    <div class="<?php echo esc_attr( $container ); ?> mt-4"  tabindex="-1">
        <div class='row font-resize'>
            <?php the_breadcrumb();?>
            <?php include 'font-resize.php';?>
		</div>
        <div class='row search-bar my-4'>
                <?php dynamic_sidebar('search_area');?>
        </div>
        <section aria-labelledby='videos' class='videos'>
            <?php if( have_rows('videos') ):
                  while( have_rows('videos') ) : the_row();
                  $video = get_sub_field('video_link');
                  $video_info = get_sub_field('video_info')
                  ?>
                  
                <div class='row mb-4 mt-4' >
                    <div class='col-lg-6 col-md-12 embed-container'>
                        <?php echo $video ?>
                    </div>
                    <div class='col-lg-6 col-md-12  mb-auto mt-auto box-shadow '>
                        <?php echo $video_info ?>
                    </div>
                </div>
             
                <hr>
                <?php endwhile;?>
            <?php endif ?>
        </section>
	</div><!-- .container -->
    <?php endwhile;
    else : ?>
    <p>Sorry no posts matched your criteria.</p>
    <?php endif; ?>
</main><!-- #content -->

<?php
get_footer();