<?php
/**
 * Template Name: Home Template
 *
 * Template for home page.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');?>
<main class="site-main mb-5" id="content">
	<?php if (have_posts()): while (have_posts()): the_post();?>
    <?php get_template_part('global-templates/hero-banner-home');?>
    <div class="<?php echo esc_attr($container); ?> mt-4"  tabindex="-1">
		<div class='row font-resize'>
			<?php the_breadcrumb();?>
			<?php include 'font-resize.php';?>
		</div>
		<div class='row search-bar my-4'>
				<?php dynamic_sidebar('search_area');?>
		</div>
		<section aria-label='about' class="row mb-2 mt-2" id='about'>
			<div class='row'>
				<div class="col-md-12 p-2">
					<?php the_content();?>
				</div>
			</div>
			<div class='row text-center resources'>
			<?php
			// Check rows exists.
			if (have_rows('discover_resources')):
				// Loop through rows.
				while (have_rows('discover_resources')): the_row();
					// Load sub field value.
					$sub_value = get_sub_field('resources');?>
					<div class='col-lg-4 col-md-6 '>
						<div class='card pt-3 col-resources'>
						<?php echo $sub_value;?>
						</div>
					</div>
				<?php endwhile;
					// No value.
				else: ?>
					No results.
			<?php endif;?>
			</div>
			<div class='row'>
				<div class='col-12'>
					<?php the_field('equity_statement')?>
				</div>
			</div>
		
			<hr>
			<div class='row inquiries'>
				<div class='col-md-12'>
					<?php the_field('inquiries');?>
				</div>
			</div>
			<div class='row d-flex justify-content-center'>
				<?php
				$image = get_field('banner_image_bottom');
				// Image variables.
				$url = $image['url'];
				$title = $image['title'];
				$alt = $image['alt'];
				$caption = $image['caption'];
				// Thumbnail size attributes.
				$size = 'large';
				$thumb = $image['sizes'][$size];
				$width = $image['sizes'][$size . '-width'];
				$height = $image['sizes'][$size . '-height'];
				?>
				<a href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>">
					<img src="<?php echo esc_url($thumb); ?>" alt=" " />
				</a>
				<div id='caption'>
				<?php echo $title; ?> | <?php echo $caption; ?>
				</div>
			</div>
		</section>	
    </div><!-- .container -->
	<?php endwhile;
		else: ?>
         <?php _e('Sorry, no posts matched your criteria.');?>
    <?php endif;?>
</main><!-- #main -->
<?php
get_footer();