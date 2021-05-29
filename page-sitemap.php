<?php

/* Template Name: HTML Sitemap */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');
?>
<main class="site-main mb-5" id="content">
	<?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>	
	<div class="<?php echo esc_attr( $container ); ?> mt-4" tabindex="-1">
		<section id='sitemap'>
			<h1 aria-labelledby='sitemap'><?php the_title();?></h1>
            <div class='row font-resize'>
				<?php the_breadcrumb();?>
				<?php include 'font-resize.php';?>
			</div>
			<div class='row search-bar my-4'>
					<?php dynamic_sidebar('search_area');?>
			</div>
            <?php include 'sitemap.php';?>
		</section>
    </div>
	<?php endwhile;
    else : ?>
    <p>Sorry no posts matched your criteria.</p>
    <?php endif; ?>
</main>

<?php get_footer();?>