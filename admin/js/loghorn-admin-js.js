	function showValueFormWidth(newValue)
	{
		document.getElementById("loghorn_form_slider_width_span").innerHTML=newValue+"px";
	}
	function showValueFormPad(newValue)
	{
		document.getElementById("loghorn_form_slider_pad_span").innerHTML=newValue+"px";
	}
	function showValueFormMargin(newValue)
	{
		document.getElementById("loghorn_form_slider_margin_span").innerHTML=newValue+"px";
	}
	function showValueFormAlpha(newValue)
	{
		document.getElementById("loghorn_form_slider_alpha_span").innerHTML=newValue+"%";
	}
	function showValueFormShdwHor(newValue)
	{
		document.getElementById("loghorn_form_shdw_slider_hor_span").innerHTML=newValue+"px";
	}
	function showValueFormShdwAlpha(newValue)
	{
		document.getElementById("loghorn_form_shdw_slider_alpha_span").innerHTML=newValue+"%";
	}
	// Media frame to select and upload media files. Code template from Mike Jolley 
	jQuery( document ).ready( function( $ ) {
			// Uploading files
			var file_frame;
			var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
			var set_to_post_id = null ;// Set this
			jQuery('#logo_upload_image_button').on('click', function( event ){
				event.preventDefault();
				// If the media frame already exists, reopen it.
				if ( file_frame ) {
					// Set the post ID to what we want
					file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
					// Open frame
					file_frame.open();
					return;
				} else {
					// Set the wp.media post id so the uploader grabs the ID we want when initialised
					wp.media.model.settings.post.id = set_to_post_id;
				}
				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					title: 'Select an image to use as the logo',
					button: {
						text: 'Use this image',
					},
					multiple: false	// We set multiple to false so only get one image from the uploader
				});
				// When an image is selected, run a callback.
				file_frame.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame.state().get('selection').first().toJSON();
					// Set the HTML attributes 
					$( '#logo-image-preview' ).attr( 'src', attachment.url );
					$( '#logo_image_src' ).attr( 'href', attachment.url );
					$( '#image_attachment_id' ).val( attachment.id );
					// Restore the main post ID
					wp.media.model.settings.post.id = wp_media_post_id;
				});
					// Finally, open the modal
					file_frame.open();
			});
			// Restore the main ID when the add media button is pressed
			jQuery( 'a.add_media' ).on( 'click', function() {
				wp.media.model.settings.post.id = wp_media_post_id;
			});
		});
		// Media frame to select and upload media files. Code template from Mike Jolley 
	jQuery( document ).ready( function( $ ) {
			// Uploading files
			var file_frame2;
			var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
			var set_to_post_id = null ;// Set this
			jQuery('#bg_upload_image_button').on('click', function( event ){
				event.preventDefault();
				// If the media frame already exists, reopen it.
				if ( file_frame2 ) {
					// Set the post ID to what we want
					file_frame2.uploader.uploader.param( 'post_id', set_to_post_id );
					// Open frame
					file_frame2.open();
					return;
				} else {
					// Set the wp.media post id so the uploader grabs the ID we want when initialised
					wp.media.model.settings.post.id = set_to_post_id;
				}
				// Create the media frame.
				file_frame2 = wp.media.frames.file_frame2 = wp.media({
					title: 'Select an image to use as the bg',
					button: {
						text: 'Use this image',
					},
					multiple: false	// We set multiple to false so only get one image from the uploader
				});
				// When an image is selected, run a callback.
				file_frame2.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame2.state().get('selection').first().toJSON();
					// Set the HTML attributes 
					$( '#bg-image-preview' ).attr( 'src', attachment.url );
					$( '#bg_image_src' ).attr( 'href', attachment.url );
					$( '#bg_image_attachment_id' ).val( attachment.id );
					// Restore the main post ID
					wp.media.model.settings.post.id = wp_media_post_id;
				});
					// Finally, open the modal
					file_frame2.open();
			});
			// Restore the main ID when the add media button is pressed
			jQuery( 'a.add_media' ).on( 'click', function() {
				wp.media.model.settings.post.id = wp_media_post_id;
			});
		});