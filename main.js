jQuery(document).ready(function($) {
	var url = window.location.href;
	if( url.indexOf('post.php') > -1 || url.indexOf('post-new.php') > -1) {
      var content = '<a class="add-new-h2 guide" href="#">Writing Guide</h2>';
      $(".wrap > h2").append(content);
  }
});
jQuery(document).on('click','a.add-new-h2.guide', function(e) {
    e.preventDefault();
    jQuery.ajax({
		url: ajaxurl,
		data: { action: 'get_writing_guide'}
	}).done(function(guide) {
		var lightbox = '<div class="lightbox guide"><div class="content">' +
                            guide +
                            '<div class="close">X</div></div></div>';
		jQuery("body").append(lightbox);
		jQuery("body .lightbox.guide").fadeIn(400);
	});
    
});
jQuery(document).on('click','.lightbox.guide .close', function() {
    jQuery("body .lightbox.guide").fadeOut(800, function() {
		$(this).remove();
	});

}); 
