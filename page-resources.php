<?php

/* Template Name: Resources Template */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

?>

<div class="wrapper" id="page-wrapper">

    <div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">


        <main class="site-main" id="main">
            <section id='resources'>
                <h1><?php the_title();?></h1>
                  <div class='row font-resize'>
					    	<?php the_breadcrumb();?>
							<?php include 'font-resize.php';?>
						</div>
						<div class='row search-bar my-4'>
								<?php dynamic_sidebar('search_area');?>
						</div>
                <div class='row border-bottom border-primary'>
                <div class='col-md-4 p-3' >
                        <!-- GENERAL-->
                <h2>General Missions</h2>
                    <ul class='pages'>
                            <?php $args = array(
                            "post_type" => 'page',
                                'category_name'    => 'general-images',
                                'orderby' => 'title',
                                'order' => 'ASC',
                                'orderby' => 'menu_order',
                                'posts_per_page'  => -1,
                            );
                            ?>
                            <?php 
                            // the query
                            $general_images_query = new WP_Query( $args ); ?>
                            
                            <?php if ( $general_images_query->have_posts() ) : ?>
                            
                                <?php while ( $general_images_query->have_posts() ) : $general_images_query->the_post(); ?>
                         
                                <li ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            
                                <?php endwhile; ?>
                                <!-- end of the loop -->
                                <?php wp_reset_postdata(); ?>
                            
                            <?php else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>
                            </ul>
                            </div>
                    <div class='col-md-4 p-3 border-primary border-left border-right' >
                    <h2>First Nations</h2>
                    <ul class='pages'>
                        <!-- //FIRST NATIONS -->
                            
                            <?php $args = array(
                            "post_type" => 'page',
                            'category_name'    => 'first-nations-images',
                            'order' => 'ASC',
                            'orderby' => 'title',
                            'orderby' => 'menu_order',
                            'posts_per_page'  => -1,
                            );
                            ?>
                            <?php 
                            // the query
                            $first_nations__images_query = new WP_Query( $args ); ?>
                            
                            <?php if ( $first_nations__images_query->have_posts() ) : ?>
                            
                                <?php while ( $first_nations__images_query->have_posts() ) : $first_nations__images_query->the_post(); ?>
                         
                                <li ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            
                                <?php endwhile; ?>
                                <!-- end of the loop -->
                                <?php wp_reset_postdata(); ?>
                            
                            <?php else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>
                            </ul>
                    </div>

                    <div class='col-md-4 p-3' >
                        <!-- MARINE -->
                        <h2>Marine Missions</h2>
                    <ul class='pages'>
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
                            
                            <?php if ( $marine__images_query->have_posts() ) : ?>
                            
                                <?php while ( $marine__images_query->have_posts() ) : $marine__images_query->the_post(); ?>
                         
                                <li ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            
                                <?php endwhile; ?>
                                <!-- end of the loop -->
                                <?php wp_reset_postdata(); ?>
                            
                            <?php else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>
                            </ul>
                    </div>
           
                </div> <!-- .row -->
            <div class='row'>
            <div class='col-md-4 p-3' >
            <h2>Medical Missions</h2>
                        <!-- MEDICAL -->
                    <ul class='pages'>
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
                            
                                <?php while ( $medical_images_query->have_posts() ) : $medical_images_query->the_post(); ?>
                         
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            
                                <?php endwhile; ?>
                                <!-- end of the loop -->
                                <?php wp_reset_postdata(); ?>
                            
                            <?php else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>
                            </ul>
                    </div>
            <div class='col-md-4 p-3 border-primary border-left border-right'>
                <!-- SCHOOLS -->
                <h2>Schools</h2>
                    <ul class='pages'>
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
                           
                                <?php while (  $school__images_query ->have_posts() ) :  $school__images_query ->the_post(); ?>
                         
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            
                                <?php endwhile; ?>
                                <!-- end of the loop -->
                                <?php wp_reset_postdata(); ?>
                        
                     
                            <?php else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>
                            </ul>
                    </div>
            <div class='col-md-4  p-3'>
                <!-- DOCUMENTS -->
                <h2>Documents</h2>
                    <ul class='pages'>
                            <?php $args = array(
                            "post_type" => 'page',
                                'category_name'    => 'documents',
                                'order' => 'ASC',
                                'orderby' => 'menu_order',
                                'posts_per_page'  => -1,
                            );
                            ?>
                            <?php 
                            // the query
                            $document_query = new WP_Query( $args ); ?>
                            
                            <?php if ( $document_query->have_posts() ) : ?>
                            
                                <?php while ( $document_query->have_posts() ) : $document_query->the_post(); ?>
                          
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                 
                                <?php endwhile; ?>
                                <!-- end of the loop -->
                                <?php wp_reset_postdata(); ?>
                            
                            <?php else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>
                            </ul>
                            </div>
                        </div>
                </section>
                <?php  include 'navigation-page.php';?>
            </div>
        </main>
    </div>

<?php get_footer();?>