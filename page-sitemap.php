<?php

/* Template Name: HTML Sitemap */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');
?>
<main class="site-main mb-5" id="main">
<div class="<?php echo esc_attr( $container ); ?> mt-4" id="content" tabindex="-1">

<section id='sitemap'>
                <h1><?php the_title();?></h1>
                <?php the_breadcrumb();?>
                <?php include 'sitemap.php';?>
</section>
    </div>
    </main>

<?php get_footer();?>