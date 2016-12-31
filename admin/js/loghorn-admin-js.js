////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	jQuery(document).ready(function($){
		// Make  the slider text-box invisible.
		$(".loghorn_slider_textbox").hide();
		// Make the input field for list box selected item invisible.
		$(".loghorn_list_selected_textbox").hide();
		var form_slider_value = 0;
		/////////////////////////////////////////////////   Login Form: Width:  ////////////////////////////////////////////////////////////////
		var form_width_slider = $("#loghorn_form_width_slider");
		var form_width_handle = $( "#loghorn_form_width_handle" );
		form_slider_value = $("#loghorn_form_width_inp").attr("value");
		form_width_slider.slider({
			min:220, max:800, value:form_slider_value, animate: "fast",
			create: function() {
				form_width_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				form_width_handle.text( ui.value+"px" );
				$("#loghorn_form_width_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Login Form: Padding:
		var form_pad_slider = $("#loghorn_form_pad_slider");
		var form_pad_handle = $( "#loghorn_form_pad_handle" );
		form_slider_value = $("#loghorn_form_pad_inp").attr("value");
		form_pad_slider.slider({
			min:0, max:10, value:form_slider_value, animate: "fast",
			create: function() {
				form_pad_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				form_pad_handle.text( ui.value+"px" );
				$("#loghorn_form_pad_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Login Form: Margin:
		var form_mrgn_slider = $("#loghorn_form_mrgn_slider");
		var form_mrgn_handle = $( "#loghorn_form_mrgn_handle" );
		form_slider_value = $("#loghorn_form_mrgn_inp").attr("value");
		form_mrgn_slider.slider({
			min:0, max:10, value:form_slider_value, animate: "fast",
			create: function() {
				form_mrgn_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				form_mrgn_handle.text( ui.value+"px" );
				$("#loghorn_form_mrgn_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Login Form: Color Alpha displacement slider:
		var form_colr_alpha_slider = $("#loghorn_form_colr_alpha_slider");
		var form_colr_alpha_handle = $( "#loghorn_form_colr_alpha_handle" );
		form_slider_value = $("#loghorn_form_colr_alpha_inp").attr("value");
		form_colr_alpha_slider.slider({
			min:0, max:100, value:form_slider_value, animate: "fast",
			create: function() {
				form_colr_alpha_handle.text( $( this ).slider( "value" )+"%" );
			},
			slide: function( event, ui ) {
				form_colr_alpha_handle.text( ui.value+"%" );
				$("#loghorn_form_colr_alpha_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Login Form: Shadow - Horizontal displacement slider:
		var form_shadow_hor_slider = $("#loghorn_form_shadow_hor_slider");
		var form_shadow_hor_handle = $( "#loghorn_form_shadow_hor_handle" );
		form_slider_value = $("#loghorn_form_shadow_hor_inp").attr("value");
		form_shadow_hor_slider.slider({
			min:0, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				form_shadow_hor_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				form_shadow_hor_handle.text( ui.value+"px" );
				$("#loghorn_form_shadow_hor_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Login Form: Shadow - Vertical displacement slider:
		var form_shadow_ver_slider = $("#loghorn_form_shadow_ver_slider");
		var form_shadow_ver_handle = $( "#loghorn_form_shadow_ver_handle" );
		form_slider_value = $("#loghorn_form_shadow_ver_inp").attr("value");
		form_shadow_ver_slider.slider({
			min:0, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				form_shadow_ver_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				form_shadow_ver_handle.text( ui.value+"px" );
				$("#loghorn_form_shadow_ver_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Login Form: Shadow - Blur slider:
		var form_shadow_blur_slider = $("#loghorn_form_shadow_blur_slider");
		var form_shadow_blur_handle = $( "#loghorn_form_shadow_blur_handle" );
		form_slider_value = $("#loghorn_form_shadow_blur_inp").attr("value");
		form_shadow_blur_slider.slider({
			min:0, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				form_shadow_blur_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				form_shadow_blur_handle.text( ui.value+"px" );
				$("#loghorn_form_shadow_blur_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Login Form: Shadow - Spread slider:
		var form_shadow_spread_slider = $("#loghorn_form_shadow_spread_slider");
		var form_shadow_spread_handle = $( "#loghorn_form_shadow_spread_handle" );
		form_slider_value = $("#loghorn_form_shadow_spread_inp").attr("value");
		form_shadow_spread_slider.slider({
			min:0, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				form_shadow_spread_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				form_shadow_spread_handle.text( ui.value+"px" );
				$("#loghorn_form_shadow_spread_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Login Form: Shadow - Alpha Channel slider:
		var form_shadow_alpha_slider = $("#loghorn_form_shadow_alpha_slider");
		var form_shadow_alpha_handle = $( "#loghorn_form_shadow_alpha_handle" );
		form_slider_value = $("#loghorn_form_shadow_alpha_inp").attr("value");
		form_shadow_alpha_slider.slider({
			min:0, max:100, value:form_slider_value, animate: "fast",
			create: function() {
				form_shadow_alpha_handle.text( $( this ).slider( "value" )+"%" );
			},
			slide: function( event, ui ) {
				form_shadow_alpha_handle.text( ui.value+"%" );
				$("#loghorn_form_shadow_alpha_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Login Form: Border - Thickness slider:
		var form_border_thick_slider = $("#loghorn_form_border_thick_slider");
		var form_border_thick_handle = $( "#loghorn_form_border_thick_handle" );
		form_slider_value = $("#loghorn_form_border_thick_inp").attr("value");
		form_border_thick_slider.slider({
			min:0, max:10, value:form_slider_value, animate: "fast",
			create: function() {
				form_border_thick_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				form_border_thick_handle.text( ui.value+"px" );
				$("#loghorn_form_border_thick_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Login Form: Border - Alpha Channel slider:
		var form_border_alpha_slider = $("#loghorn_form_border_alpha_slider");
		var form_border_alpha_handle = $( "#loghorn_form_border_alpha_handle" );
		form_slider_value = $("#loghorn_form_border_alpha_inp").attr("value");
		form_border_alpha_slider.slider({
			min:0, max:100, value:form_slider_value, animate: "fast",
			create: function() {
				form_border_alpha_handle.text( $( this ).slider( "value" )+"%" );
			},
			slide: function( event, ui ) {
				form_border_alpha_handle.text( ui.value+"%" );
				$("#loghorn_form_border_alpha_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Login Form: Border - Radius slider:
		var form_border_radius_slider = $("#loghorn_form_border_radius_slider");
		var form_border_radius_handle = $( "#loghorn_form_border_radius_handle" );
		form_slider_value = $("#loghorn_form_border_radius_inp").attr("value");
		form_border_radius_slider.slider({
			min:0, max:50, value:form_slider_value, animate: "fast",
			create: function() {
				form_border_radius_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				form_border_radius_handle.text( ui.value+"px" );
				$("#loghorn_form_border_radius_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Login Form: Label - Font Size slider:
		var form_label_size_slider = $("#loghorn_form_label_size_slider");
		var form_label_size_handle = $( "#loghorn_form_label_size_handle" );
		form_slider_value = $("#loghorn_form_label_size_inp").attr("value");
		form_label_size_slider.slider({
			min:1, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				form_label_size_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				form_label_size_handle.text( ui.value+"px" );
				$("#loghorn_form_label_size_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Input Text: Font Size slider:
		var input_text_size_slider = $("#loghorn_input_text_size_slider");
		var input_text_size_handle = $( "#loghorn_input_text_size_handle" );
		form_slider_value = $("#loghorn_input_text_size_inp").attr("value");
		input_text_size_slider.slider({
			min:1, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				input_text_size_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				input_text_size_handle.text( ui.value+"px" );
				$("#loghorn_input_text_size_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Textbox: Color Alpha displacement slider:
		var textbox_colr_alpha_slider = $("#loghorn_textbox_colr_alpha_slider");
		var textbox_colr_alpha_handle = $("#loghorn_textbox_colr_alpha_handle");
		form_slider_value = $("#loghorn_textbox_colr_alpha_inp").attr("value");
		textbox_colr_alpha_slider.slider({
			min:0, max:100, value:form_slider_value, animate: "fast",
			create: function() {
				textbox_colr_alpha_handle.text( $( this ).slider("value") + "%" );
			},
			slide: function( event, ui ) {
				textbox_colr_alpha_handle.text( ui.value+"%" );
				$("#loghorn_textbox_colr_alpha_inp").val( ui.value );
			}
		});
		/////////////////////////////////////////////////   Inputbox: Border - Thickness slider:
		var input_border_thick_slider = $("#loghorn_input_border_thick_slider");
		var input_border_thick_handle = $( "#loghorn_input_border_thick_handle" );
		form_slider_value = $("#loghorn_input_border_thick_inp").attr("value");
		input_border_thick_slider.slider({
			min:0, max:10, value:form_slider_value, animate: "fast",
			create: function() {
				input_border_thick_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				input_border_thick_handle.text( ui.value+"px" );
				$("#loghorn_input_border_thick_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Inputbox: Border - Alpha Channel slider:
		var input_border_alpha_slider = $("#loghorn_input_border_alpha_slider");
		var input_border_alpha_handle = $( "#loghorn_input_border_alpha_handle" );
		form_slider_value = $("#loghorn_input_border_alpha_inp").attr("value");
		input_border_alpha_slider.slider({
			min:0, max:100, value:form_slider_value, animate: "fast",
			create: function() {
				input_border_alpha_handle.text( $( this ).slider( "value" )+"%" );
			},
			slide: function( event, ui ) {
				input_border_alpha_handle.text( ui.value+"%" );
				$("#loghorn_input_border_alpha_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Inputbox: Border - Radius slider:
		var input_border_radius_slider = $("#loghorn_input_border_radius_slider");
		var input_border_radius_handle = $( "#loghorn_input_border_radius_handle" );
		form_slider_value = $("#loghorn_input_border_radius_inp").attr("value");
		input_border_radius_slider.slider({
			min:0, max:50, value:form_slider_value, animate: "fast",
			create: function() {
				input_border_radius_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				input_border_radius_handle.text( ui.value+"px" );
				$("#loghorn_input_border_radius_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Checkbox: Width slider:
		var checkbox_width_slider = $( "#loghorn_checkbox_width_slider" );
		var checkbox_width_handle = $( "#loghorn_checkbox_width_handle" );
		form_slider_value = $("#loghorn_checkbox_width_inp").attr("value");
		checkbox_width_slider.slider({
			min:10, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				checkbox_width_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				checkbox_width_handle.text( ui.value+"px" );
				$("#loghorn_checkbox_width_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Checkbox: Height slider:
		var checkbox_height_slider = $( "#loghorn_checkbox_height_slider" );
		var checkbox_height_handle = $( "#loghorn_checkbox_height_handle" );
		form_slider_value = $("#loghorn_checkbox_height_inp").attr("value");
		checkbox_height_slider.slider({
			min:10, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				checkbox_height_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				checkbox_height_handle.text( ui.value+"px" );
				$("#loghorn_checkbox_height_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Checkbox: Radius slider:
		var checkbox_radius_slider = $( "#loghorn_checkbox_radius_slider" );
		var checkbox_radius_handle = $( "#loghorn_checkbox_radius_handle" );
		form_slider_value = $("#loghorn_checkbox_radius_inp").attr("value");
		checkbox_radius_slider.slider({
			min:0, max:20, value:form_slider_value, animate: "fast",
			create: function() {
				checkbox_radius_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				checkbox_radius_handle.text( ui.value+"px" );
				$("#loghorn_checkbox_radius_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Input Text: Font Size slider:
		var submit_text_size_slider = $("#loghorn_submit_text_size_slider");
		var submit_text_size_handle = $("#loghorn_submit_text_size_handle");
		form_slider_value = $("#loghorn_submit_text_size_inp").attr("value");
		submit_text_size_slider.slider({
			min:1, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				submit_text_size_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				submit_text_size_handle.text( ui.value+"px" );
				$("#loghorn_submit_text_size_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Submit Button Text: Shadow - Horizontal displacement slider:
		var submit_text_shadow_hor_slider = $("#loghorn_submit_text_shadow_hor_slider");
		var submit_text_shadow_hor_handle = $( "#loghorn_submit_text_shadow_hor_handle" );
		form_slider_value = $("#loghorn_submit_text_shadow_hor_inp").attr("value");
		submit_text_shadow_hor_slider.slider({
			min:0, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				submit_text_shadow_hor_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				submit_text_shadow_hor_handle.text( ui.value+"px" );
				$("#loghorn_submit_text_shadow_hor_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Submit Button Text: Shadow - Vertical displacement slider:
		var submit_text_shadow_ver_slider = $("#loghorn_submit_text_shadow_ver_slider");
		var submit_text_shadow_ver_handle = $( "#loghorn_submit_text_shadow_ver_handle" );
		form_slider_value = $("#loghorn_submit_text_shadow_ver_inp").attr("value");
		submit_text_shadow_ver_slider.slider({
			min:0, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				submit_text_shadow_ver_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				submit_text_shadow_ver_handle.text( ui.value+"px" );
				$("#loghorn_submit_text_shadow_ver_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Submit Button Text: Shadow - Blur slider:
		var submit_text_shadow_blur_slider = $("#loghorn_submit_text_shadow_blur_slider");
		var submit_text_shadow_blur_handle = $( "#loghorn_submit_text_shadow_blur_handle" );
		form_slider_value = $("#loghorn_submit_text_shadow_blur_inp").attr("value");
		submit_text_shadow_blur_slider.slider({
			min:0, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				submit_text_shadow_blur_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				submit_text_shadow_blur_handle.text( ui.value+"px" );
				$("#loghorn_submit_text_shadow_blur_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Login Form: Border - Thickness slider:
		var submit_border_thick_slider = $("#loghorn_submit_border_thick_slider");
		var submit_border_thick_handle = $( "#loghorn_submit_border_thick_handle" );
		form_slider_value = $("#loghorn_submit_border_thick_inp").attr("value");
		submit_border_thick_slider.slider({
			min:0, max:10, value:form_slider_value, animate: "fast",
			create: function() {
				submit_border_thick_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				submit_border_thick_handle.text( ui.value+"px" );
				$("#loghorn_submit_border_thick_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Login Form: Border - Alpha Channel slider:
		var submit_border_alpha_slider = $("#loghorn_submit_border_alpha_slider");
		var submit_border_alpha_handle = $( "#loghorn_submit_border_alpha_handle" );
		form_slider_value = $("#loghorn_submit_border_alpha_inp").attr("value");
		submit_border_alpha_slider.slider({
			min:0, max:100, value:form_slider_value, animate: "fast",
			create: function() {
				submit_border_alpha_handle.text( $( this ).slider( "value" )+"%" );
			},
			slide: function( event, ui ) {
				submit_border_alpha_handle.text( ui.value+"%" );
				$("#loghorn_submit_border_alpha_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Login Form: Border - Radius slider:
		var submit_border_radius_slider = $("#loghorn_submit_border_radius_slider");
		var submit_border_radius_handle = $( "#loghorn_submit_border_radius_handle" );
		form_slider_value = $("#loghorn_submit_border_radius_inp").attr("value");
		submit_border_radius_slider.slider({
			min:0, max:50, value:form_slider_value, animate: "fast",
			create: function() {
				submit_border_radius_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				submit_border_radius_handle.text( ui.value+"px" );
				$("#loghorn_submit_border_radius_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Message Text: Font Size slider:
		var msg_text_size_slider = $("#loghorn_msg_text_size_slider");
		var msg_text_size_handle = $( "#loghorn_msg_text_size_handle" );
		form_slider_value = $("#loghorn_msg_text_size_inp").attr("value");
		msg_text_size_slider.slider({
			min:1, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				msg_text_size_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				msg_text_size_handle.text( ui.value+"px" );
				$("#loghorn_msg_text_size_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Message Text: Shadow - Horizontal displacement slider:
		var msg_text_shadow_hor_slider = $("#loghorn_msg_text_shadow_hor_slider");
		var msg_text_shadow_hor_handle = $( "#loghorn_msg_text_shadow_hor_handle" );
		form_slider_value = $("#loghorn_msg_text_shadow_hor_inp").attr("value");
		msg_text_shadow_hor_slider.slider({
			min:0, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				msg_text_shadow_hor_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				msg_text_shadow_hor_handle.text( ui.value+"px" );
				$("#loghorn_msg_text_shadow_hor_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Message Text: Shadow - Vertical displacement slider:
		var msg_text_shadow_ver_slider = $("#loghorn_msg_text_shadow_ver_slider");
		var msg_text_shadow_ver_handle = $( "#loghorn_msg_text_shadow_ver_handle" );
		form_slider_value = $("#loghorn_msg_text_shadow_ver_inp").attr("value");
		msg_text_shadow_ver_slider.slider({
			min:0, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				msg_text_shadow_ver_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				msg_text_shadow_ver_handle.text( ui.value+"px" );
				$("#loghorn_msg_text_shadow_ver_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Message Text: Shadow - Blur slider:
		var msg_text_shadow_blur_slider = $("#loghorn_msg_text_shadow_blur_slider");
		var msg_text_shadow_blur_handle = $( "#loghorn_msg_text_shadow_blur_handle" );
		form_slider_value = $("#loghorn_msg_text_shadow_blur_inp").attr("value");
		msg_text_shadow_blur_slider.slider({
			min:0, max:30, value:form_slider_value, animate: "fast",
			create: function() {
				msg_text_shadow_blur_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				msg_text_shadow_blur_handle.text( ui.value+"px" );
				$("#loghorn_msg_text_shadow_blur_inp").val(ui.value);
			}
		});
		//
	} );
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Media frame to select and upload media files. Code template from Mike Jolley 
	jQuery( document ).ready( function( $ ) {
			// Uploading files
			var file_frame_logo;
			var file_frame_background;
			var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
			var set_to_post_id = null ;// Set this
			// Clicking on the Logo Selector Button:
			jQuery('#logo_upload_image_button').on('click', function( event ){
				event.preventDefault();
				// If the media frame already exists, reopen it.
				if ( file_frame_logo ) {
					// Set the post ID to what we want
					file_frame_logo.uploader.uploader.param( 'post_id', set_to_post_id );
					// Open frame
					file_frame_logo.open();
					return;
				} else {
					// Set the wp.media post id so the uploader grabs the ID we want when initialised
					wp.media.model.settings.post.id = set_to_post_id;
				}
				// Create the media frame.
				file_frame_logo = wp.media.frames.file_frame_logo = wp.media({
					title: 'Select an image to use as the logo',
					button: {
						text: 'Use this image',
					},
					multiple: false	// We set multiple to false so only get one image from the uploader
				});
				// When an image is selected, run a callback.
				file_frame_logo.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame_logo.state().get('selection').first().toJSON();
					// Set the HTML attributes 
					$( '#logo-image-preview' ).attr( 'src', attachment.url );
					$( '#logo_image_src' ).attr( 'href', attachment.url );
					$( '#logo_image_attachment_id' ).val( attachment.id );
					// Restore the main post ID
					wp.media.model.settings.post.id = wp_media_post_id;
				});
					// Finally, open the modal
					file_frame_logo.open();
			});
			// Clicking on the Background Selector Button:
			jQuery('#bg_upload_image_button').on('click', function( event ){
				event.preventDefault();
				// If the media frame already exists, reopen it.
				if ( file_frame_background ) {
					// Set the post ID to what we want
				file_frame_background.uploader.uploader.param( 'post_id', set_to_post_id );
					// Open frame
				file_frame_background.open();
					return;
				} else {
					// Set the wp.media post id so the uploader grabs the ID we want when initialised
					wp.media.model.settings.post.id = set_to_post_id;
				}
				// Create the media frame.
				file_frame_background = wp.media.frames.file_frame_background = wp.media({
					title: 'Select an image to use as the background',
					button: {
						text: 'Use this image',
					},
					multiple: false	// We set multiple to false so only get one image from the uploader
				});
				// When an image is selected, run a callback.
				file_frame_background.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame_background.state().get('selection').first().toJSON();
					// Set the HTML attributes 
					$( '#bg-image-preview' ).attr( 'src', attachment.url );
					$( '#bg_image_src' ).attr( 'href', attachment.url );
					$( '#bg_image_attachment_id' ).val( attachment.id );
					// Restore the main post ID
					wp.media.model.settings.post.id = wp_media_post_id;
				});
					// Finally, open the modal
					file_frame_background.open();
			});
			// Restore the main ID when the add media button is pressed
			jQuery( 'a.add_media' ).on( 'click', function() {
				wp.media.model.settings.post.id = wp_media_post_id;
			});
		});
	///////////////////////////////////////  List items ///////////////////////////////////////////////////////////////////////
	// Form Border style
	function loghorn_form_border_style_onchange()	{
		document.getElementById( "loghorn_form_border_style_textbox" ).value = document.getElementById("loghorn_form_border_style_listbox").value;
	}
	// Form Label Font
	function loghorn_form_label_font_onchange()	{
		document.getElementById( "loghorn_form_label_font_textbox"   ).value = document.getElementById("loghorn_form_label_font_listbox"  ).value;
	}
	// Input Text Font
	function loghorn_input_text_font_onchange()	{
		document.getElementById( "loghorn_input_text_font_textbox"   ).value = document.getElementById("loghorn_input_text_font_listbox"  ).value;
	}
	// Inputbox Border style
	function loghorn_input_border_style_onchange()	{
		document.getElementById( "loghorn_input_border_style_textbox" ).value = document.getElementById("loghorn_input_border_style_listbox").value;
	}
	// Submit Button Text Font
	function loghorn_submit_text_font_onchange()	{
		document.getElementById( "loghorn_submit_text_font_textbox"   ).value = document.getElementById("loghorn_submit_text_font_listbox"  ).value;
	}
	// Submit Button Border style
	function loghorn_submit_border_style_onchange()	{
		document.getElementById( "loghorn_submit_border_style_textbox" ).value = document.getElementById("loghorn_submit_border_style_listbox").value;
	}
	// Message Box Text Font
	function loghorn_msg_text_font_onchange()	{
		document.getElementById( "loghorn_msg_text_font_textbox"   ).value = document.getElementById("loghorn_msg_text_font_listbox"  ).value;
	}
	