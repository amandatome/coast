<?php
/**
 * Template Name: Image Template
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
    <div class="<?php echo esc_attr( $container ); ?> mt-4" tabindex="-1">
    <?php $galleries = get_field('archive_gallery');?>
        <div class='row font-resize'>
	    	<?php the_breadcrumb();?>
			<?php include 'font-resize.php'; ?>
		</div>
		<div class='row search-bar my-4'>
			<?php dynamic_sidebar('search_area');?>
        </div><!--.row-->
        <section aria-label='general information' class='info'>
            <div class='row'>
                <div class='col-12'>
                    <?php the_field('order_info', 'option');?>
                </div><!--.col-->
            </div>
                <hr>
            <div class='row'>
                <?php if (is_page(array(1180, 1142, 709, 711, 323, 325))):?>
                    <div class='col-12'>
                    <?php the_field('portraits_collection', 'option')?>
                    </div><!--.col-->
                <?php endif?>
                <?php if (is_page(array(1745))):?>
                    <div class='col-12'>
                    <?php the_field('home_missions', 'option')?>
                    </div><!--.col-->
                <?php endif?>
                <?php if (is_page(array(1193, 1396, 1142, 1571, 1193, 1197, 1476, 1515, 1521, 1527, 1529, 1531, 1533, 2971))):?>
                    <div class='col-12'>
                    <?php the_field('ridout', 'option')?>
                    </div><!--.col-->
                <?php endif?>
                <?php if (is_page(array(1180, 1745, 1193, 1396, 1747, 1749, 1751, 1753, 2715, 2718, 2720, 2722, 2724, 2726, 2728, 1142, 707, 709, 711, 1067, 1098, 1125, 1571, 1130, 1145, 1173, 1193, 1195, 1197, 1199, 1476, 1484, 1494, 1519, 1521, 1525, 1537, 1539, 217, 2760, 230, 231, 5503, 232, 233, 234, 235, 236, 237, 238, 239, 240, 241, 2971, 6170, 323, 325, 6173, 6176, 6179, 331, 6190, 6194, 491, 493, 6198, 495, 6201, 6205, 6208, 6211, 497, 6214, 6217, 503, 499, 6220, 501, 6223, 505, 6227, 507, 6235, 6237, 509, 6239, 6241))):?>
                    <div class='col-12'>
                    <?php the_field('partnership', 'option')?>
                    </div><!--.col-->
                <?php endif?>
                <?php if (is_page(array(1396, 1142, 709, 234))):?>
                    <div class='col-12'>
                    <?php the_field('mission_in_canada', 'option')?>
                    </div><!--.col-->
                <?php endif?>
                <?php if (is_page(array(1396, 1751, 237))):?>
                    <div class='col-12'>
                    <?php the_field('french', 'option')?>
                    </div><!--.col-->
                <?php endif?>
               
                <div class='col-12'>
                    <?php the_content();?>
                </div>
                <!--.col-->
            </div><!--.row-->
            <hr>
            <div class='row d-md-flex justify-content-between'>
                <?php 
                the_field('gallery_description' , 'option');?>
                <?php echo count($galleries); 
                the_field('image_count', 'option');?>
            </div>
            <!--.row-->
        </section><!--section-->
  
        <?php
            /* 
            * Paginate Advanced Custom Field repeater
            */
            if( get_query_var('page') ) {
                $page = get_query_var( 'page' );
            } else {
                $page = 1;
            }?>
            <section aria-label='image gallery' class='gallery'>
            <div class='row'>
            <?php 
                $images = array();
                $items_per_page =20;
                $total_items = count($galleries);
                $total_pages = ceil($total_items / $items_per_page);
                if(get_query_var('paged')){
                    $current_page = get_query_var('paged');
                }
                elseif (get_query_var('page')) {
                    $current_page = get_query_var('page');
                }
                else{
                    $current_page = 1;
                }
                $starting_point = (($current_page-1)*$items_per_page);
                if($galleries){
                    $images = array_slice($galleries,$starting_point,$items_per_page);
                 }
            ?>
            <?php 
                if(($images)) :?>
                    <div class='card-columns'>
                        <?php $data_count = 0;?>
                        <?php foreach ($images as $image): ?>
                        <?php $data_count++;
                            echo '<div class="card shadow text-center mb-4" data-toggle="modal" data-target="#image-modal-'. $data_count . '"' . '>'?>
                                <a href='#' style='border-bottom: none' class='pop'>
                                    <img class="image-resource card-img-top" src="<?php echo $image['sizes']['medium']; ?>"
                                        alt="<?php echo $image['alt']; ?>" />
                                </a>
                            <div class='card-body'>
                                <h2 class="card-title"><span><?php echo $image['title']; ?></span></h2>
                                <?php echo $image['description']; ?>
                            </div>
                            <div class="card-footer ">
                                <?php echo $image['caption']; ?>
                            </div>
                        </div>
                    <!--.card-->
                    <?php endforeach; ?>
                </div>
                <!--.card-col-->
                    <?php endif;?>
            </div><!--.row-->
        </section>
        <?php  include 'modal.php';?>
        <!-- Page Navigation -->
        <nav class='pagination' aria-label="pagination navigation">
            <?php
            $big = 999999999; // need an unlikely integer
            $translated = __( 'Page', 'mytextdomain' );
            echo paginate_links(array(
                'base' =>  str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',           
                'current' => $current_page,
                'total' => $total_pages,
                "type" => 'list',
                'prev_next' => false,
            ));?>
        </nav>
        <?php  include 'navigation-page.php';?>
    </div><!-- .container -->
    <?php endwhile;
        else : ?>
        <p>Sorry no posts matched your criteria.</p>
    <?php endif; ?>
</main><!-- #main -->


<?php
get_footer();