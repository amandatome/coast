<hr>
        <?php
$pagelist = get_pages('sort_column=menu_order&sort_order=asc');
$pages = array();
foreach ($pagelist as $page) {
$pages[] += $page->ID;
}

$current = array_search(get_the_ID(), $pages);
$prevID = $pages[$current-1];
$nextID = $pages[$current+1];
?>

<?php $parent_title = get_the_title($post->post_parent); ?>
<div class="navigation mb-5">
<div class='row d-flex justify-content-between'>
<?php if (!empty($prevID)) { ?>
<a href="<?php echo get_permalink($prevID); ?>" class='btn btn-lg btn-success'
rel='prev' title="<?php echo get_the_title($prevID); ?>"><span> <i class="fas fa-chevron-left"></i></span> <?php echo get_the_title($prevID); ?></a>
<?php }
if (!empty($nextID)) { ?>
<a href="<?php echo get_permalink($nextID); ?>" class='btn btn-lg btn-success'
rel="next" title="<?php echo get_the_title($nextID); ?>"><?php echo get_the_title($nextID)?><span> <i class="fas fa-chevron-right"></i></span></a>
</div>
<?php } ?>
</div><!-- .navigation -->