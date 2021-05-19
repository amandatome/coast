<?php
/**
 * Template Name: General Template
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
	<div class="<?php echo esc_attr( $container ); ?> mt-4 " id="content" tabindex="-1">
	<?php the_breadcrumb();?>
    <section id="mission-information">
			<h2 class='mt-5'><span><?php the_field('general_info_heading', 'option')?></span></h2>
			<div class="row mt-5">
					<div class="col-lg-7 col-md-12">
					<?php 
					$map_image = get_field('map_image');
					$size = 'full';
					echo wp_get_attachment_image($map_image, $size, false, array('class' => 'card-img')); ?>
					</div>
					<div class="col-lg-5 col-md-12 d-flex align-items-center">
                        <div class='info-content'>
                 <?php the_content()?>
                 </div>
					</div>
                </div><!-- .row -->
              
				<div class='row mt-4'>
					<div class='col-12'>
                    <?php if (get_field('community_heading')) : ?>
                        <h2><span><?php the_field('community_heading'); ?></span></h2>
                    <?php endif ?>
                    <?php if (get_field('schools_heading')) : ?>
                        <h2><span><?php the_field('schools_heading'); ?></span></h2>
                    <?php endif ?>

					</div>	
					</div><!--.row-->
					<?php 
			if (is_page( 'general-mission-work'))		:?>
				<div class='image-division'>	
                <?php $args = array(
                            "post_type" => 'page',
                                'category_name'    => 'general-images',
                                'orderby' => 'menu_order',
                                'order' => 'ASC',
                                'posts_per_page'  => -1,
                            );
                            ?>
                            <?php 
                            // the query
                            $general_images_query = new WP_Query( $args ); 
                            ?>
                            <?php if ( $general_images_query->have_posts() ) :?>
                                <ul>
                                <?php while ( $general_images_query->have_posts() ) : $general_images_query->the_post(); ?>
                                   
                                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                <?php endwhile; ?>
                                </ul>
                                </div>
                                <!-- end of the loop -->
                                <?php wp_reset_postdata(); ?>
                            
                            <?php else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>
                    <?php endif;?>
					<?php 
					if (is_page( 'first-nations'))		:?>
						<div class='image-division'>	
               			 <?php $args = array(
                            "post_type" => 'page',
                            'category_name'    => 'first-nations-images',
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                            'posts_per_page'  => -1,
                            );
                            ?>
                            <?php 
                            // the query
                            $first_nations__images_query = new WP_Query( $args ); ?>
                            
                            <?php if ( $first_nations__images_query->have_posts() ) : ?>
                                <ul>
                                <?php while ( $first_nations__images_query->have_posts() ) : $first_nations__images_query->the_post(); ?>
                         
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            
                                <?php endwhile; ?>
                                <!-- end of the loop -->
                                <?php wp_reset_postdata(); ?>
                            </ul>
                            </div>
                            <?php else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>
                    <?php endif ?>

					<?php if ( is_page('medical-missions')) :?>
						<div class='image-division'>	
                <?php $args = array(
                            "post_type" => 'page',
                            'category_name'    => 'medical-images',
                            'order' => 'ASC',
                            'orderby' => 'menu_order',
                            'posts_per_page'  => -1,
                            );
                            ?>
                            <?php 
                            // the query
                            $medical_images_query = new WP_Query( $args ); ?>
                            
                            <?php if ( $medical_images_query->have_posts() ) : ?>
                                <ul>
                                <?php while ( $medical_images_query->have_posts() ) : $medical_images_query->the_post(); ?>
                         
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            
                                <?php endwhile; ?>
                                <!-- end of the loop -->
                                <?php wp_reset_postdata(); ?>
                            </ul>
                            </div>
                            <?php else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>
					<?php endif;?>

					<?php if (is_page('marine-missions')) :?>
						<div class='image-division'>	
                <?php $args = array(
                            "post_type" => 'page',
                            'category_name'    => 'marine-images',
                            'order' => 'ASC',
                            'orderby' => 'menu_order',
                            'posts_per_page'  => -1,
                            );
                            ?>
                            <?php 
                            // the query
                            $marine__images_query = new WP_Query( $args ); ?>
                            
                            <?php if (  $marine__images_query->have_posts() ) : ?>
                                <ul>
                                <?php while (  $marine__images_query->have_posts() ) :  $marine__images_query->the_post(); ?>
                         
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            
                                <?php endwhile; ?>
                                <!-- end of the loop -->
                                <?php wp_reset_postdata(); ?>
                            </ul>
                            </div>
                            <?php else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>
					<?php endif;?>
                   
					<?php if (is_page('residential-and-day-schools')) : ?>
						<div class='image-division'>	
                <?php $args = array(
                            "post_type" => 'page',
                            'category_name'    => 'school-images',
                            'order' => 'ASC',
                            'orderby' => 'menu_order',
                            'posts_per_page'  => -1,
                            );
                            ?>
                            <?php 
                            // the query
                            $school__images_query  = new WP_Query( $args ); ?>
                            
                            <?php if (  $school__images_query ->have_posts() ) : ?>
                                <ul>
                                <?php while (  $school__images_query ->have_posts() ) :  $school__images_query ->the_post(); ?>
                         
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            
                                <?php endwhile; ?>
                                <!-- end of the loop -->
                                <?php wp_reset_postdata(); ?>
                            </ul>
                            </div>
                            <?php else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>
					<?php endif; ?>
					</section>
     
					<?php  include 'navigation-page.php';?>				
				

	</div><!-- #content -->

	</main><!-- #main -->

<?php
get_footer();
