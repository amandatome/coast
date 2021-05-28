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

			<main class="site-main" id="main">
            <?php get_template_part('global-templates/hero-banner-home'); ?>

            <div class="<?php echo esc_attr( $container ); ?> mt-4" id="content" tabindex="-1">
            <div class='row font-resize'>
					    	<?php the_breadcrumb();?>
							<?php include 'font-resize.php';?>
						</div>
						<div class='row search-bar my-4'>
								<?php dynamic_sidebar('search_area');?>
						</div>
        <section class='videos'>
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

	</div><!-- #content -->
    </main><!-- #main -->



<?php
get_footer();