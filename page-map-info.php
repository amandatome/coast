<?php

/* Template Name: Map Info Template */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

?>

<div class="wrapper" id="page-wrapper">

    <div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">


        <main class="site-main" id="main">
            <section id='map-info'>
                <h1><?php the_title();?></h1>
                  <div class='row font-resize'>
					      	<?php the_breadcrumb();?>
                  <?php include 'font-resize.php';?>
                </div>
                <div class='row search-bar my-4'>
                    <?php dynamic_sidebar('search_area');?>
                </div>  
                <?php the_content();?>   
          </section>
        </main>
    </div>
</div>
<?php get_footer();?>