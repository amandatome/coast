<?php
/**
 * Template Name: Document Template
 *
 * Template for home page.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<main class="site-main mb-5" id="main">
<?php get_template_part('global-templates/hero-banner-home'); ?>
	<div class="<?php echo esc_attr( $container ); ?> mt-4" id="content" tabindex="-1">
    <?php the_breadcrumb();?>

            <section class='row mt-5 mb-5 document-information'>
                <div class='col-12'>
                    <?php the_content(); ?>
                </div>
            </section>

            <?php
                /* 
                * Paginate Advanced Custom Field repeater
                */
                if ( get_query_var('paged') ) { 
                    $page = get_query_var('paged'); } 
                    elseif ( get_query_var('page') ) 
                    { 
                        $page = get_query_var('page'); }
                    else 
                    { 
                        $page = 1; 
                    }

                // Variables
                $row              = 0;
                $documents_per_page  = 20; // How many images to display on each page
                $documents         = get_field( 'documents' );
                $total            = count( $documents );
                $pages            = ceil( $total / $documents_per_page );
                $min              = ( ( $page * $documents_per_page ) - $documents_per_page ) + 1;
                $max              = ( $min + $documents_per_page ) - 1;?>
            <section class='row document-count'>
                <div class='col-12 text-right'>
                    <?php echo $total; ?> documents
                </div>
                </section>
            <hr>
            <section id="documents">
            <?php // ACF Loop
            if( have_rows( 'documents' ) ) : ?>

            <?php while( have_rows( 'documents' ) ): the_row();

                $row++;

                // Ignore this image if $row is lower than $min
                if($row < $min) { continue; }

                // Stop loop completely if $row is higher than $max
                if($row > $max) { break; } ?>

            <?php 
                $section_heading = get_sub_field('section_heading');
                $document_date= get_sub_field('document_date');
                $document_title = get_sub_field( 'document_title' ); 
                $document_call_number = get_sub_field( 'document_call_number' ); 
                $document_link= get_sub_field( 'document_link' ); ?>

            <?php if($section_heading):?>
           
            <div class='row'>
                <h2><span><?php echo $section_heading;?></span></h2>
            </div>
            <hr>
            <?php endif;?>
            <div class='row no-gutters'>
                <div class='col-md-1 col-sm-12'>
                    <?php if($document_date):
                        echo $document_date;
                    endif; ?>
                </div>
                <div class='col-md-5 col-sm-12 document-title '>
                    <?php echo $document_title;?>
                </div>
                <div class='col-md-4 col-sm-12 call-number'>
                    <?php if($document_call_number):
                    echo $document_call_number;
                endif;?>
                </div>
                <div class='col-md-2 col-sm-12 pdf-link'>
                   <?php 
                    if( $document_link ):
                     $url = wp_get_attachment_url( $document_link); ?>
                    <a href="<?php echo esc_html($url); ?>" target='_blank'>Download PDF</a>
                    <?php endif; ?>
                </div>
            </div>
            <hr>
            <?php endwhile;?>
            <?php else: ?>
            No document  found
            <?php endif; ?>

   </section>
        <nav class='pagination' aria-label="Pagination Navigation">
            <?php $big = 999999999; // need an unlikely integer
            // Pagination
            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $pages,
            "type" => 'list',
            'prev_next' => false,
            'before_page_number' => '<span class="screen-reader-text" aria-label="Goto">'.$tanslated.'</span>'
            ) );
            ?>
        </nav>
        <?php  include 'navigation-page.php';?>
    </div><!-- #content -->
    </main><!-- #main -->
<?php
get_footer();