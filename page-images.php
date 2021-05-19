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

<main class="site-main" id="main">
<?php get_template_part('global-templates/hero-banner-home'); ?>

    <div class="<?php echo esc_attr( $container ); ?> mt-4" id="content" tabindex="-1">
    <?php the_breadcrumb();?>

    <?php $galleries = get_field('archive_gallery');?>

            <section class='search  mt-5'>
            <div class='row'>
                <?php while (have_posts()) : the_post(); ?>
                <div class='col-md-6 offset-md-6 my-3'>
                    <?php dynamic_sidebar('search_area'); ?>
                </div>
                <?php endwhile ?>
            </div>
            <!--.row-->
        </section>
        <!--.search-->
        <section class='info'>
            <div class='row'>
                <div class='col-12'>
                    <div class='card border-0'>
                        <?php the_field('order_info', 'option');?>
                    </div>
                    <!--/.card-->
                </div>
                <!--.col-->
            </div>
   
            <div class='row'>
                <div class='col-12'>
                    <div class='card border-0'>
                        <?php the_content();?>
                    </div>
                    <!--.card-->
                </div>
                <!--.col-->
            </div>
            <!--.row-->
            <hr>
            <div class='row'>
                <div class='col-md-5'>
                    <div class='card border-0'>
                        <p><?php 
                        the_field('gallery_description' , 'option');?></p>
                    </div>
                </div>
                <div class='col-md-5 offset-md-2  text-right my-3'>
                    <div class='card border-0'>
                        <p><?php echo count($galleries); 
                        the_field('image_count', 'option');?></p>
                    </div>
                </div>
            </div>
            <!--.row-->
        </section>
        <!--.info-->
  
            <?php
                /* 
                * Paginate Advanced Custom Field repeater
                */
                if( get_query_var('page') ) {
                    $page = get_query_var( 'page' );
                } else {
                    $page = 1;
                }?>
            <section class='gallery'>
            <div class='row' id='gallery' data-toggle=”modal” data-target=”#image-modal”>
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
                        <?php foreach ($images as $image) :  ?>
                        <div class='card shadow text-center mb-4'>
                            <a href='#' style='border-bottom: none' class='pop'>
                                <img class="image-resource card-img-top" src="<?php echo $image['sizes']['medium']; ?>"
                                    alt="<?php echo $image['alt']; ?>" />
                            </a>
                            <div class='card-body'>
                                <h2 class="card-title"><span><?php echo $image['title']; ?></span></h2>
                                <p><?php echo $image['description']; ?></p>
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
                </div>
          
                <!--.row-->
            </section>
   
<?php  include 'modal.php';?>
  <!-- Page Navigation -->
  <nav class='pagination' aria-label="Pagination Navigation">
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
                        'before_page_number' => '<span class="screen-reader-text" aria-label="Goto">'.$tanslated.'</span>'
                    ));?>
        </nav>
        <?php  include 'navigation-page.php';?>

    </div><!-- #content -->
    </main><!-- #main -->


<?php
get_footer();