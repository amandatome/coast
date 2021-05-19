<?php
/**
 * The template for displaying search results pages
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="search-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">



            <main class="site-main" id="content" role='main'>

                <?php if ( have_posts() ) : ?>

                <header class="page-header">

                    <h1 class="page-title">
                        <?php
								printf(
									/* translators: %s: query term */
									esc_html__( 'Search Results for: %s', 'understrap' ),
									'<span>' . get_search_query() . '</span>'
								);
								?>
					</h1>
				

				</header><!-- .page-header -->
				<div class='col-md-6 offset-md-6 my-3'>
                    <?php dynamic_sidebar('search_area'); ?>
                </div>
				<div class='col-md-5  offset-md-7 mb-3'>
					</div>			

                <?php /* Start the Loop */ ?>
                <?php
					while ( have_posts() ) :
						the_post();

						/*
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */?>
						 <div class='col-md-12'>
						<div class='card mb-3 p-4'>
						<?php get_template_part( 'loop-templates/content', 'search' );?>
						</div>
					</div>
					<?php endwhile;
					?>

                <?php else : ?>
				<div class='row'>
					<div class='col-12'>
					<h1>Nothing Found</h1>
					<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
					</div>
				</div>
				<div class='row d-flex justify-content-end'>
					<div class='col-lg-5 col-md-12'>
					<?php get_search_form(); ?>
					</div>
				</div>
				<div class='row'>
            <div class='banner-image mt-3'>
            <?php 
            $image = get_field('search_image','option');
             // Image variables.
                $url = $image['url'];
                $title = $image['title'];
                $alt = $image['alt'];
                $caption = $image['caption'];
                        
                // Thumbnail size attributes.
                $size = 'large';
                $thumb = $image['sizes'][ $size ];
                $width = $image['sizes'][ $size . '-width' ];
                $height = $image['sizes'][ $size . '-height' ];
                ?>
            <a href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>">
             <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
            </a>
            <div id='caption'>
            <?php echo $title; ?> | <?php echo $caption; ?> 
            </div>
             </div>
  
          </div>
                <?php endif; ?>
            </main><!-- #main -->

            <!-- The pagination component -->
            <nav class='search-pagination' aria-label="<?php esc_attr_e( 'Pagination', 'my-text-domain' ); ?>">
                <?php echo paginate_links( array(
						'type' => 'list', 
						'prev_next' => false,
						'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'my-text-domain' ) . '</span> '
					) ); ?>
			</nav>

    </div><!-- #content -->

</div><!-- #search-wrapper -->

<?php
get_footer();