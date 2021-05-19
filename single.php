<?php
/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>"  tabindex="-1">



			<!-- Do the left sidebar check -->

			<main class="site-main" id="content" role="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single' );
				}
				?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
	



	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
