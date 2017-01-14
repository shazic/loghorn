//	Let's add a class that can be used to hide the unrefined tabs till document is ready:
	jQuery('html').addClass('loghorn_initial');
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	jQuery(document).ready(function($){
		function loghorn_set_preview_css()	{
			// this function sets all the CSS for the preview dialog window.
			
			// define the various types of drop downs:
			var border_types = [];
			$("#loghorn_form_border_style_listbox option").each(function() { border_types.push($(this).text()) });
			var font_types = [];
			$("#loghorn_form_label_font_listbox option").each(function() { font_types.push($(this).text()) });
			var yes_no_option = [];
			$("#loghorn_disable_logo_option_listbox option").each(function() { yes_no_option.push($(this).text()) });
			
			var disable_logo	= yes_no_option[$("#loghorn_disable_logo_option_listbox").val()];	// disable the logo? 
			
			if ( disable_logo.indexOf("Yes") >= 0 )	{
				var logo_url 	= "none";														// no logo.
			}else	{
				var logo_url 	= $( '#logo-image-preview' ).attr( 'src');						// get logo url
			}
			logo_url 			= "url("+logo_url+")";
			
			var use_img_bg		= yes_no_option[$("#loghorn_bg_option_listbox").val()];			// use a background image? 
			
			if ( use_img_bg.indexOf("Yes") >= 0 )	{
				var bg_url 		= $( '#bg-image-preview' ).attr( 'src');						// background url
			}else	{
				var bg_url 		= "none";														// no background image
			}
			
			bg_url 				= "url("+bg_url+")";
			
			var bg_colr			= $("#loghorn_bg_color").val();
			var form_width 		= $("#loghorn_form_width_inp").val()+"px";						// form width
			var form_mrgn 		= $("#loghorn_form_mrgn_inp").val()+"px";						// form margin
			var form_pad 		= $("#loghorn_form_pad_inp").val()+"px";						// form padding
			var form_color 		= $("#loghorn_form_color").val();								// form color
			var form_shdw 		= $("#loghorn_form_shadow_hor_inp").val()						// form shadow
								+"px "
								+$("#loghorn_form_shadow_ver_inp").val()
								+"px "
								+$("#loghorn_form_shadow_blur_inp").val()
								+"px "
								+$("#loghorn_form_shadow_spread_inp").val()
								+"px "
								+$("#loghorn_form_shadow_color").val();			
			var form_brdr 		= $("#loghorn_form_border_thick_inp").val()						// form border
								+"px "
								+border_types[$("#loghorn_form_border_style_listbox").val()]	//							
								+" "
								+$("#loghorn_form_border_color").val();
			var form_radius 	= $("#loghorn_form_border_radius_inp").val()+"px";				// form border radius
			var form_font 		= font_types[$("#loghorn_form_label_font_listbox").val()];		// form font family			
			var form_fsize 		= $("#loghorn_form_label_size_inp").val()						// form font size 
								+"px";
			var label_color 	= $("#loghorn_form_label_color").val();							// form label color
			
			var inp_radius 		= $("#loghorn_input_border_radius_inp").val()+"px";				// textbox border radius
			var inp_font 		= font_types[$("#loghorn_input_text_font_listbox").val()];		// input text font family	
			var inp_fsize 		= $("#loghorn_input_text_size_inp").val()						// input text font size 
								+"px";
			var inp_bg 			= $("#loghorn_textbox_color").val();							// input text background color	
			var inp_colr 		= $("#loghorn_input_text_color").val();							// input text color
			var inp_brdr 		= $("#loghorn_input_border_thick_inp").val()					// form border
								+"px "
								+border_types[$("#loghorn_input_border_style_listbox").val()]		// 
								+" "
								+$("#loghorn_input_border_color").val();
			var cb_width 		= $("#loghorn_checkbox_width_inp").val()+"px";					// checkbox width
			var cb_height		= $("#loghorn_checkbox_height_inp").val()+"px";					// checkbox height
			var cb_radius 		= $("#loghorn_checkbox_radius_inp").val()+"px";					// textbox border radius
			
			var butn_colr 		= $("#loghorn_submit_bg_colr_color").val();						// button bg color
			var butn_fcolr 		= $("#loghorn_submit_text_color").val();						// button text color
			var butn_font 		= font_types[$("#loghorn_submit_text_font_listbox").val()];		// button text font family		
			var butn_fsize 		= $("#loghorn_submit_text_size_inp").val()						// button text font size 
								+"px";
			var butn_brdr 		= $("#loghorn_submit_border_thick_inp").val()					// form border
								+"px "
								+border_types[$("#loghorn_submit_border_style_listbox").val()]	// 
								+" "
								+$("#loghorn_submit_border_color").val();
			var butn_radius 	= $("#loghorn_submit_border_radius_inp").val()+"px";			// textbox border radius
			var butn_txt_shdw 	= $("#loghorn_submit_text_shadow_hor_inp").val()				// form shadow
								+"px "
								+$("#loghorn_submit_text_shadow_ver_inp").val()
								+"px "
								+$("#loghorn_submit_text_shadow_blur_inp").val()
								+"px "
								+$("#loghorn_submit_text_shadow_color").val();
			var butn_brdr_hvr	= $("#loghorn_submit_border_thick_inp").val()					// form border
								+"px "
								+border_types[$("#loghorn_submit_border_style_listbox").val()]		// 
								+" "
								+$("#loghorn_submit_border_hvr_color").val();
			
			$("#user_login").val(form_pad);
			$("#user_login").attr("placeholder", "Username or E-mail");
			$("#user_pass").attr("placeholder", "Password");
			
			// Logo:
			$("#login-h1-a").css("background-image", logo_url); 
			// Background:
			$("#loghorn_preview_division").css(	{	"background-image": bg_url, 
													"background-color": bg_colr,
													"background-repeat": "no-repeat", 
													"background-position": "center",
													"background-size": "cover"
												});
			// Form:
			$("#loginform").css(				{	"background-color": form_color,
													"box-shadow": form_shdw,
													"border": form_brdr,
													"width": form_width,
													"margin": form_mrgn,
													"padding": form_pad,
													"border-radius": form_radius
												});
			$("#loginform label").css(			{	"font-family": form_font,
													"font-size": form_fsize,
													"color": label_color
												});
			
			// Textbox:
			$(".login #user_login").css(		{	"border-radius": inp_radius,
													"font-family": inp_font,
													"font-size": inp_fsize,	
													"border": inp_brdr,
													"background-color": inp_bg,
													"color": inp_colr
												});
			$(".login #user_pass").css(			{	"border-radius": inp_radius,
													"font-family": inp_font,
													"font-size": inp_fsize,		
													"border": inp_brdr,
													"background-color": inp_bg,
													"color": inp_colr
												});
			$(".login #rememberme").css(		{	"border": inp_brdr,
													"background-color": inp_bg,
													"color": inp_colr,
													"width": cb_width,
													"height": cb_height,
													"border-radius": cb_radius
												});
			
			// Login Button:
			$(".login #wp-submit").css(			{	"border": butn_brdr,
													"background-color": butn_colr,
													"color": butn_fcolr,
													//"width": butn_width,
													"font-family": butn_font,
													"font-size": butn_fsize,
													"border-radius": butn_radius,
													"text-shadow": butn_txt_shdw
												});
			
			
		}
		// Create tabs: 
		$("#loghorn_tabs").tabs();
		// Make  the slider text-boxes invisible.
		$(".loghorn_slider_textbox").hide();
		// Activate Tooltip
		$(".helptool").tooltip();
		//$(".loghorn_list_select").selectmenu();
		// Hide spinner:
		$('.loghorn_spinner').hide();
		// color-picker:
		$('.loghorn-color-cp').alphaColorPicker();
		// Now, show the options tabs:
		$("#loghorn_tabs").show();
		// Show/hide logo upload option:
		var disable_logo_option = $("#loghorn_disable_logo_option_listbox").val();
		if(disable_logo_option == 0)	{		// 0 - No; 1 - Yes
			$("#logo_div").show();
			$('#logo_upload_image_button').prop('disabled', false);
		}
		else	{
			$("#logo_div").hide();
			$('#logo_upload_image_button').prop('disabled', true);
		}
		// Show/hide background image upload option:
		var use_bg_option = $("#loghorn_bg_option_listbox").val();
		if(use_bg_option == 1)	{		// 0 - No; 1 - Yes
			$("#bg_div").show();
			$("#bg_upload_image_button").prop('disabled', false);
			$("#loghorn_bg_color").attr("readonly", false);
		}
		else	{
			$("#bg_div").hide();
			$('#bg_upload_image_button').prop('disabled', true);
			$("#loghorn_bg_color").attr("readonly", false);
		}
		// Show/hide preview button:
		var preview_enabled = $("#loghorn_general_option_listbox").val();
		if(preview_enabled == 1)	{		// 0 - No; 1 - Yes
			$("#loghorn_preview_button").show();
		}
		else	{
			$("#loghorn_preview_button").hide();
		}
		// Create the dialog for preview, but don't display it yet.
		$( "#loghorn_preview_division" ).dialog({
			autoOpen: false,
			closeOnEscape: true,
			resizable:false,
			closeText: false,
			show: {
				effect: "slide",
				duration: 500
			},
			hide: {
				effect: "slide",
				duration: 500
			},
			position: { 
				my: "left top", 
				at: "left top", 
				of: "#loghorn_options_menu" 
			},
			width: $("#loghorn_options_menu").width() ,
			height:$(window).height()*.98
    	});
		// If preview button is clicked, show the preview dialog:
		$("#loghorn_preview_button").on( "click", function() {
			var yes_no_option = [];
			$("#loghorn_general_option_listbox option").each(function() { yes_no_option.push($(this).text()) });
			
			var plugin_enabled	= yes_no_option[$("#loghorn_general_option_listbox").val()];	// is this plugin enabled? 
			
			if ( plugin_enabled.indexOf("Yes") >= 0 )	{
				loghorn_set_preview_css();														// set CSS for preview dialog.
				$( "#loghorn_preview_division" ).dialog( "open" );
			}
		});
		
		$("#wp-submit").hover(function(){
											$(this).css(					
												{	"border-color": $("#loghorn_submit_border_hvr_color").val(),	
													"background-color": $("#loghorn_submit_bg_hvr_color").val(),
													"color": $("#loghorn_submit_text_hvr_color").val(),
													"text-shadow": $("#loghorn_submit_text_shadow_hvr_color").val()	// This doesn't work
												}
											);
										},
							  function(){
											$(this).css(					
												{	"border-color": $("#loghorn_submit_border_color").val(),
													"background-color":$("#loghorn_submit_bg_colr_color").val(),
													"color": $("#loghorn_submit_text_color").val(),
													"text-shadow": $("#loghorn_submit_text_shadow_color").val()		
												}
											);
										}
		);
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
		/////////////////////////////////////////////////   Submit Button: Border - Thickness slider:
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
		/////////////////////////////////////////////////   Submit Button: Border - Alpha Channel slider:
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
		/////////////////////////////////////////////////   Submit Button: Border - Radius slider:
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
		/////////////////////////////////////////////////   Message Box: Border - Radius slider:
		var msg_border_radius_slider = $("#loghorn_msg_border_radius_slider");
		var msg_border_radius_handle = $( "#loghorn_msg_border_radius_handle" );
		form_slider_value = $("#loghorn_msg_border_radius_inp").attr("value");
		msg_border_radius_slider.slider({
			min:0, max:50, value:form_slider_value, animate: "fast",
			create: function() {
				msg_border_radius_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				msg_border_radius_handle.text( ui.value+"px" );
				$("#loghorn_msg_border_radius_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Message Box: Border Left - Thickness slider:
		var msg_border_l_thick_slider = $("#loghorn_msg_border_l_thick_slider");
		var msg_border_l_thick_handle = $( "#loghorn_msg_border_l_thick_handle" );
		form_slider_value = $("#loghorn_msg_border_l_thick_inp").attr("value");
		msg_border_l_thick_slider.slider({
			min:0, max:10, value:form_slider_value, animate: "fast",
			create: function() {
				msg_border_l_thick_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				msg_border_l_thick_handle.text( ui.value+"px" );
				$("#loghorn_msg_border_l_thick_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Message Box: Border Left - Alpha Channel slider:
		var msg_border_l_alpha_slider = $("#loghorn_msg_border_l_alpha_slider");
		var msg_border_l_alpha_handle = $( "#loghorn_msg_border_l_alpha_handle" );
		form_slider_value = $("#loghorn_msg_border_l_alpha_inp").attr("value");
		msg_border_l_alpha_slider.slider({
			min:0, max:100, value:form_slider_value, animate: "fast",
			create: function() {
				msg_border_l_alpha_handle.text( $( this ).slider( "value" )+"%" );
			},
			slide: function( event, ui ) {
				msg_border_l_alpha_handle.text( ui.value+"%" );
				$("#loghorn_msg_border_l_alpha_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Message Box: Border Top - Thickness slider:
		var msg_border_t_thick_slider = $("#loghorn_msg_border_t_thick_slider");
		var msg_border_t_thick_handle = $( "#loghorn_msg_border_t_thick_handle" );
		form_slider_value = $("#loghorn_msg_border_t_thick_inp").attr("value");
		msg_border_t_thick_slider.slider({
			min:0, max:10, value:form_slider_value, animate: "fast",
			create: function() {
				msg_border_t_thick_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				msg_border_t_thick_handle.text( ui.value+"px" );
				$("#loghorn_msg_border_t_thick_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Message Box: Border Top - Alpha Channel slider:
		var msg_border_t_alpha_slider = $("#loghorn_msg_border_t_alpha_slider");
		var msg_border_t_alpha_handle = $( "#loghorn_msg_border_t_alpha_handle" );
		form_slider_value = $("#loghorn_msg_border_t_alpha_inp").attr("value");
		msg_border_t_alpha_slider.slider({
			min:0, max:100, value:form_slider_value, animate: "fast",
			create: function() {
				msg_border_t_alpha_handle.text( $( this ).slider( "value" )+"%" );
			},
			slide: function( event, ui ) {
				msg_border_t_alpha_handle.text( ui.value+"%" );
				$("#loghorn_msg_border_t_alpha_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Message Box: Border Right - Thickness slider:
		var msg_border_r_thick_slider = $("#loghorn_msg_border_r_thick_slider");
		var msg_border_r_thick_handle = $( "#loghorn_msg_border_r_thick_handle" );
		form_slider_value = $("#loghorn_msg_border_r_thick_inp").attr("value");
		msg_border_r_thick_slider.slider({
			min:0, max:10, value:form_slider_value, animate: "fast",
			create: function() {
				msg_border_r_thick_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				msg_border_r_thick_handle.text( ui.value+"px" );
				$("#loghorn_msg_border_r_thick_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Message Box: Border Right - Alpha Channel slider:
		var msg_border_r_alpha_slider = $("#loghorn_msg_border_r_alpha_slider");
		var msg_border_r_alpha_handle = $( "#loghorn_msg_border_r_alpha_handle" );
		form_slider_value = $("#loghorn_msg_border_r_alpha_inp").attr("value");
		msg_border_r_alpha_slider.slider({
			min:0, max:100, value:form_slider_value, animate: "fast",
			create: function() {
				msg_border_r_alpha_handle.text( $( this ).slider( "value" )+"%" );
			},
			slide: function( event, ui ) {
				msg_border_r_alpha_handle.text( ui.value+"%" );
				$("#loghorn_msg_border_r_alpha_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Message Box: Border Bottom - Thickness slider:
		var msg_border_b_thick_slider = $("#loghorn_msg_border_b_thick_slider");
		var msg_border_b_thick_handle = $( "#loghorn_msg_border_b_thick_handle" );
		form_slider_value = $("#loghorn_msg_border_b_thick_inp").attr("value");
		msg_border_b_thick_slider.slider({
			min:0, max:10, value:form_slider_value, animate: "fast",
			create: function() {
				msg_border_b_thick_handle.text( $( this ).slider( "value" )+"px" );
			},
			slide: function( event, ui ) {
				msg_border_b_thick_handle.text( ui.value+"px" );
				$("#loghorn_msg_border_b_thick_inp").val(ui.value);
			}
		});
		/////////////////////////////////////////////////   Message Box: Border Bottom - Alpha Channel slider:
		var msg_border_b_alpha_slider = $("#loghorn_msg_border_b_alpha_slider");
		var msg_border_b_alpha_handle = $( "#loghorn_msg_border_b_alpha_handle" );
		form_slider_value = $("#loghorn_msg_border_b_alpha_inp").attr("value");
		msg_border_b_alpha_slider.slider({
			min:0, max:100, value:form_slider_value, animate: "fast",
			create: function() {
				msg_border_b_alpha_handle.text( $( this ).slider( "value" )+"%" );
			},
			slide: function( event, ui ) {
				msg_border_b_alpha_handle.text( ui.value+"%" );
				$("#loghorn_msg_border_b_alpha_inp").val(ui.value);
			}
		});
		//
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Media frame to select and upload media files. Code template from Mike Jolley 
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
		///////////////////////////////////////  Special List items ///////////////////////////////////////////////////////////////////////
		///////////////////////////////////////  Plugin Enable Listbox OnChange
		$("#loghorn_general_option_listbox").change(function(){
			var current_selected_option = $("#loghorn_general_option_listbox").val();
			if(current_selected_option == 0)	{		// 0 - No; 1 - Yes
				$("#loghorn_preview_button").hide();
			}
			else	{
				$("#loghorn_preview_button").show();
			}
		})
		///////////////////////////////////////  Logo Listbox OnChange
		$("#loghorn_disable_logo_option_listbox").change(function(){
			var current_selected_option = $("#loghorn_disable_logo_option_listbox").val();
			if(current_selected_option == 0)	{		// 0 - No; 1 - Yes
				$("#logo_div").show();
				$('#logo_upload_image_button').prop('disabled', false);
			}
			else	{
				$("#logo_div").hide();
				$('#logo_upload_image_button').prop('disabled', true);
			}
		})
		///////////////////////////////////////  BG Listbox OnChange
		$("#loghorn_bg_option_listbox").change(function(){
			var current_selected_option = $("#loghorn_bg_option_listbox").val();
			if(current_selected_option == 1)	{		// 0 - No; 1 - Yes
				$("#bg_div").show();
				$("#bg_upload_image_button").prop('disabled', false);
				$("#loghorn_bg_color").attr("readonly", false);
			}
			else	{
				$("#bg_div").hide();
				$('#bg_upload_image_button').prop('disabled', true);
				$("#loghorn_bg_color").attr("readonly", false);
			}
		})
	});