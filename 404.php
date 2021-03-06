<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="error-404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">
				<!--  -->
					<section class="error-404 not-found">

						<header class="page-header">
	
							<h1 class="page-title text-center"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'understrap' ); ?></h1>
							<div class='row font-resize-404'>
								<?php include 'font-resize.php';?>
							</div>
							<div class='row search-bar my-4'>
								<?php dynamic_sidebar('search_area');?>
							</div>
						</header><!-- .page-header -->

							<div class="page-content">
								<div class='row'>
									<div class='col-md-9 offset-md-2'>
										<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'understrap' ); ?>
								</div><!--.col-->
						
							</div><!--.row-->
						</div><!-- .page-content -->
						<?php include 'sitemap.php';?>
					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php
get_footer();
