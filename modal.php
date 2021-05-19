<!-- Creates the bootstrap modal where the image will appear -->
<?php foreach ($images as $image) :  ?>
    <div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="image-modal" aria-hidden="true">
        <div class="modal-dialog" role='document'>
            <div class="modal-content">
            <div class="modal-body">
                    <img class="image-preview card-img-top" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <p class='modal-description'></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn modal-close" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
 <?php endforeach; ?>