<?php

/* Template Name: Map Info Template */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

?>

<main class="site-main" id="content">       
    <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
    <div class="<?php echo esc_attr($container); ?> mt-4" id="content" tabindex="-1" >
    <section id='map-info'>
        <h1 aria-labelledy='map info'><?php the_title();?></h1>
        <div class='row font-resize'>
            <?php the_breadcrumb();?>
            <?php include 'font-resize.php';?>
        </div>
        <div class='row search-bar my-4'>
            <?php dynamic_sidebar('search_area');?>
        </div>  
        <?php the_content();?>   
    </section>
    </div>
    <?php endwhile;
        else : ?>
        <p>Sorry no posts matched your criteria.</p>
    <?php endif; ?>
</main>

<?php get_footer();?>