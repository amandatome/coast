// Add your custom JS here.
jQuery(function($) {
 //Modal================================	
 $('.pop').on('click', function (event) {

  var description = event.target.offsetParent.children[1].children[0].parentElement.innerHTML

  var accession = event.target.offsetParent.children[2].innerText
  var modal_description = $(".modal-description")

  modal_description.append(description)
  modal_description.append(accession)

  $('.image-preview').attr('src', $(this).find('img').attr('src'));
  lastClicked = $(this);

  $('#image-modal').modal('show');
  $(document).on('hidden.bs.modal', function () {
    $(lastClicked).focus();

    modal_description.html('');
  });
});
})