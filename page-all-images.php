    <?php
/**
 * Template Name: All Images Template
 *
 * Template for home page.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );?>

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
        <section aria-label='collections' class="all-images-collections">
            <?php if( have_rows('collection_image_wrapper') ):
            // Loop through rows.
            while( have_rows('collection_image_wrapper') ) : the_row();
                // Load sub field value.
                $collection_text = get_sub_field('collection_text');
                $collection_image = get_sub_field('collection_image');
                $collection_link = get_sub_field('collection_button');
                if( $collection_link ): 
                    $collection_link_url = $collection_link['url'];
                    $collection_link_title = $collection_link['title'];
                    $collection_link_target = $collection_link['target'] ? $collection_link['target'] : '_self';
                    ?>
                <?php endif; ?>
            <div class='row mb-5'>
                <div class='col-lg-8 col-md-12'>
                    <?php echo $collection_text;?>
                    <div class='view-button'>
                        <a class="btn btn-lg btn-success" href="<?php echo esc_url( $collection_link_url ); ?>" target="<?php echo esc_attr( $collection_link_target ); ?>"><?php echo esc_html( $collection_link_title ); ?></a>
                    </div>
                </div><!--.col-->
                <div class='col-lg-4 col-md-12 d-flex justify-content-center align-items-center'>
                    <?php 
                    if( !empty( $collection_image) ): ?>
                    <img src="<?php echo esc_url($collection_image['url']); ?>" alt="<?php echo esc_attr($collection_image['alt']); ?>" class='img-fluid'/>
                    <?php endif; ?>
                </div> <!--.col-->
            </div> <!--.row-->    
            <hr>
            <?php endwhile; ?>
            <?php else: ?>
                Nothing found.
            <?php endif; ?>
        </section>
    </div>
    <?php endwhile;
        else : ?>
        <p>Sorry no posts matched your criteria.</p>
    <?php endif; ?>
</main>
<?php
get_footer();