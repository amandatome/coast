<?php
/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<header class="entry-header mb-4">

<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header><!-- .entry-header -->

<div class='row'>
	<div class='col-lg-8 col-md-12 border-right'>
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

		<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>

<div class="entry-content">
	<?php the_content(); ?>

	<?php
	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		)
	);
	?>
</div><!-- .entry-content -->
<footer class="entry-footer">

<?php understrap_entry_footer(); ?>

</footer><!-- .entry-footer -->

</article><!-- #post-## -->
</div>
<div class='col-lg-4 col-md-12 col-sm-12'>
<section class="search">
	<?php dynamic_sidebar('search_area'); ?>
</section>
</div>
</div>

	



