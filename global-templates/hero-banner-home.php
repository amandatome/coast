<div class="jumbotron rounded-0 text-white pt-5 align-bottom" style=" background-image: linear-gradient(to bottom, rgba(0,0,0,0.4) 0%,rgba(0,0,0,0.4) 100%), url(<?php the_post_thumbnail_url($size = 'large'); ?>)">
    <div class="container pt-5">
        <h1 class='display-4'><?php the_title(); ?></h1>
        <?php if (get_field('secondary_heading')) : ?>
                        <h2><?php the_field('secondary_heading'); ?></h2>
                    <?php endif ?>
    </div><!-- /.container   -->
</div>



