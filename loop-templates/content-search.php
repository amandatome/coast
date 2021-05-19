<?php
/**
 * Search results partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">

				<?php understrap_posted_on(); ?>

			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-summary">
	<div class='row d-flex justify-content-around mt-5'>
	<div class='col-md-6'>
	<?php 
		if ( get_post_type() === 'attachment' ) {
			echo wp_get_attachment_image( get_the_ID(), 'large' );
			$attachment = get_post( $attachment_id );
			// var_dump($attachment);
			$description = $attachment->post_content;
			$caption = $attachment->original_excerpt;
			
		} else {
			the_post_thumbnail( 'large' );
		}
		?>
		</div>
		<div class='col-md-6 d-flex align-items-center search-image-description'>
		<div>		
		<?php echo $description;
			echo $caption;?>
			</div>
		</div>
		</div>
		
	</div><!-- .entry-summary -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
