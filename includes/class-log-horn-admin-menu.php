<?php

/**
 * Class Name: Log_Horn_Admin_Menu
 * This is the main class responsible for displaying Menu Options on the Admin Page (Network Admin only).
 */
 
/**
 * First things, first! 
 * Apply standard check - do not call this plugin from anywhere except the WordPress installation!
 */ 
defined( 'ABSPATH' ) or die ;
   
/**
 *	Start by checking if the class Log_Horn_Admin_Menu is already defined somewhere else.
 *	Plugin will not provide any functionality and quit silently, if the class 'Log_Horn_Admin_Menu' is defined elsewhere.
 */	

if  ( ! class_exists ( 'Log_Horn_Admin_Menu' )  )  : 
  
	class Log_Horn_Admin_Menu	{
		
		private static $loghorn_options ;		// stores the plugin settings.
		
		/**
		 * Constructor: All initializations occur here.
		 */
		function Log_Horn_Admin_Menu () 	{
			
			/**
			 * Latch on to action hooks here.
			 */
			
			if ( is_multisite() ) {
				// Add a menu item for network admin:
				add_action( 'network_admin_menu', 	array ( $this , 'loghorn_menu' ) ) ;
				// Admin Notices for network admin menu:
				add_action('network_admin_notices', array ( $this , 'loghorn_updated_notice' ) ) ;
			}
			else	{
				// Add a menu item:
				add_action( 'admin_menu', 			array ( $this , 'loghorn_menu' ) ) ;
				// Admin Notices:
				add_action('admin_notices', 		array ( $this , 'loghorn_updated_notice' ) ) ;
			}
			
			// Admin Page Init Settings:
			add_action( 'admin_init', 				array ( $this , 'loghorn_plugin_settings' ) );
			
			// Load Custom Scripts and Styles (only for the plugin's admin page):
			add_action( 'admin_enqueue_scripts',  	array ( $this , 'loghorn_load_custom_script' ) ) ;
			
			// Load Settings from the Options Table:
			self::$loghorn_options = get_option ( 'loghorn_settings2' ) ;
			
			}
		
		/**
		 * The Menu-builder for Log Horn.
		 */
		function loghorn_menu() {
			
			if ( is_super_admin () )	{
						add_menu_page ( 
								'Log Horn', 								// page title
								'Log Horn settings', 						// menu title
								'manage_options', 							// capability
								'class-log-horn-admin-menu.php', 			// menu-slug
								array ( $this, 'loghorn_plugin_options' ), 	// function
								'dashicons-welcome-view-site'				// icon (uses WordPress dashicons)
						);
			}
		}
		
		function loghorn_plugin_options ()	{

			if ( !current_user_can( 'manage_options' ) )  {
				wp_die( _e ( 'You do not have sufficient permissions to access this page.' ) );
			}
			
			_e ( '<div class="wrap">' ) ; 
?>
			
			<h2> <?php _e ( "Log Horn Options" ) ; ?> </h2>
			<form method="post" action=<?php _e ( '"'.get_site_url().'/wp-admin/options.php"' ) ;  ?> >
<?php 			settings_fields( 'loghorn_settings_group' ); 
				do_settings_sections( 'loghorn_settings_sections' ); 
				submit_button(); 
?>
			</form>
<?php 		
			_e ( '</div>' ) ;
		}
		
		function loghorn_plugin_settings()	{
			
			register_setting( 'loghorn_settings_group' , 'loghorn_settings2' , 'loghorn_validate_input' ); 
			
			add_settings_section('loghorn_images'			, 'Image Settings'		, 		array ( $this, 'loghorn_image_settings' ), 'loghorn_settings_sections');
				add_settings_field('loghorn_logo_filename'	, 	'Logo File'				, 		array ( $this, 'loghorn_show_logo_settings' 	), 		'loghorn_settings_sections', 'loghorn_images');
				add_settings_field('loghorn_bg_filename'	,	'Background'			, 		array ( $this, 'loghorn_show_bg_settings' 		), 		'loghorn_settings_sections', 'loghorn_images');
			
			add_settings_section('loghorn_form'				, 'Login Form Settings'	, 		array ( $this, 'loghorn_form_settings' 	), 'loghorn_settings_sections');
				add_settings_field('loghorn_form_width'		, 	'Form Width'			,		array ( $this, 'loghorn_form_width_settings' 	), 		'loghorn_settings_sections', 'loghorn_form');
				add_settings_field('loghorn_form_padding'	, 	'Form Padding'			, 		array ( $this, 'loghorn_form_padding_settings' 	), 		'loghorn_settings_sections', 'loghorn_form');
				add_settings_field('loghorn_form_margin'	, 	'Form Margin'			, 		array ( $this, 'loghorn_form_margin_settings' 	), 		'loghorn_settings_sections', 'loghorn_form');
				add_settings_field('loghorn_form_color'		, 	'Form Background Color'	, 		array ( $this, 'loghorn_form_color_settings' 	), 		'loghorn_settings_sections', 'loghorn_form');
				add_settings_field('loghorn_form_shadow'	, 	'Form Shadow'			, 		array ( $this, 'loghorn_form_shadow_settings' 	), 		'loghorn_settings_sections', 'loghorn_form');
				add_settings_field('loghorn_form_border'	, 	'Form Border'			, 		array ( $this, 'loghorn_form_border_settings' 	), 		'loghorn_settings_sections', 'loghorn_form');
		}
		
		
		function loghorn_validate_input()	{
			
			 
		}
		
		function loghorn_image_settings (){
			
		}
		
		function loghorn_form_settings (){
			
		}
		
		function loghorn_show_logo_settings ()	{
			
			// Options table store the logo's image id. Get the image source information:
			$loghorn_logo_image_src = wp_get_attachment_image_src(self::$loghorn_options['LOGHORN_SETTINGS_LOGO']) ;
?>
			<input id="logo_upload_image_button" type="button" class="button" value="<?php _e( 'Select logo image' ); ?>" />
			<i class="fa fa-upload" aria-hidden="true"></i>
			<input type='hidden' name="loghorn_settings2[LOGHORN_SETTINGS_LOGO]" id='image_attachment_id' value="<?php _e ( self::$loghorn_options['LOGHORN_SETTINGS_LOGO'] ) ; ?>">
			<br>		
			<div id="logo_div" class="img1">
				<!--a id="logo_image_src" target="_blank" href='<?php _e ( $loghorn_logo_image_src [0] ) ; ?>' -->
					
						<img id='logo-image-preview' src="<?php _e ( $loghorn_logo_image_src [0] ) ; ?>" width="80" height="80"  > 
					
				<!--/a-->
				<div class="desc"> <?php _e ( 'Preview' ) ; ?> </div>
			</div>
			<br>	
<?php	
		}
		
		function loghorn_show_bg_settings ()	{
			
			// Options table store the background image id. Get the image source information:
			$loghorn_bg_image_src = wp_get_attachment_image_src(self::$loghorn_options['LOGHORN_SETTINGS_BG']) ;
?>
			<input id="bg_upload_image_button" type="button" class="button" value="<?php _e( 'Background image' ); ?>" />
			<i class="fa fa-upload" aria-hidden="true"></i>
			<input type='hidden' name="loghorn_settings2[LOGHORN_SETTINGS_BG]" id='bg_image_attachment_id' value="<?php _e ( self::$loghorn_options['LOGHORN_SETTINGS_BG'] ) ; ?>">
			<br>		
			<div id="bg_div" class="img1">
				<!--a id="bg_image_src" target="_blank" href='<?php _e ( $loghorn_bg_image_src [0] ) ; ?>' -->
					
						<img id='bg-image-preview' src="<?php _e ( $loghorn_bg_image_src [0] ) ; ?>" width="80" height="80"  > 
					
				<!--/a-->
				<div class="desc"> <?php _e ( 'Background Preview' ) ; ?> </div>
			</div>
			<br>
<?php		
		}
		
		function loghorn_form_width_settings ()	{
			
			// Fetch form-width from options table, if present.
			$loghorn_form_width_value = self::$loghorn_options['LOGHORN_SETTINGS_FORM_WIDTH'] ;
			
			// If this is the first time, settings was not present in options table. 
			if ( !$loghorn_form_width_value )	{
				$loghorn_form_width_value = LOGHORN_DEFAULT_FORM_WD;			// Move default value (all defaults defined in initialize-loghorn.php)
			}
			
			// Display slider for Form Width:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_WIDTH]"
															, "option_id"	=> "loghorn_form_width"
															, "value"		=> $loghorn_form_width_value
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
		}
		
		function loghorn_form_padding_settings()	{
			
			// Fetch form padding from options table, if present.
			$loghorn_form_padding_value = self::$loghorn_options['LOGHORN_SETTINGS_FORM_PAD'] ;
			
			// If this is the first time, settings was not present in options table. 
			if ( !$loghorn_form_padding_value )	{
				$loghorn_form_padding_value = 10 ; //LOGHORN_DEFAULT_PADDING;	// Move default value (all defaults defined in initialize-loghorn.php)
			}
			
			// Display slider for Form Padding:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_PAD]"
															, "option_id"	=> "loghorn_form_pad"
															, "value"		=> $loghorn_form_padding_value
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
		}
		
		function loghorn_form_margin_settings()	{
			
			// Fetch form margin from options table, if present.
			$loghorn_form_margin_value = self::$loghorn_options['LOGHORN_SETTINGS_FORM_MRGN'] ;
			
			// If this is the first time, settings was not present in options table. 
			if ( !$loghorn_form_margin_value )	{
				$loghorn_form_margin_value = 5 ; //LOGHORN_DEFAULT_FORM_MRGN;	// Move default value (all defaults defined in initialize-loghorn.php)
			}
			// Display slider for Form Margin:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_MRGN]"
															, "option_id"	=> "loghorn_form_mrgn"
															, "value"		=> $loghorn_form_margin_value
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
		}
		
		function loghorn_form_color_settings ()	{
			
			// Fetch form color and alpha channel values from options table, if present.
			$loghorn_form_color_value = self::$loghorn_options['LOGHORN_SETTINGS_FORM_COLOR']['hex'] ;
			$loghorn_form_alpha_value = self::$loghorn_options['LOGHORN_SETTINGS_FORM_COLOR']['alpha'] ;
			
			// If this is the first time, settings was not present in options table. 
			if ( !$loghorn_form_color_value )	{
				$loghorn_form_color_value = LOGHORN_DEFAULT_FORM_COLR;			// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_form_alpha_value )	{
				$loghorn_form_alpha_value = LOGHORN_DEFAULT_ALPHA;				// Move default value (all defaults defined in initialize-loghorn.php)
			}
			
			// Display Color Picker for the Form:
			$loghorn_color_options				= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_COLOR][hex]"
															, "option_id"	=> "form"
															, "value"		=> $loghorn_form_color_value
														);
			
			$this->loghorn_color_picker( $loghorn_color_options ) ;

			// Display slider for Form Color Alpha Channel:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_COLOR][alpha]"
															, "option_id"	=> "loghorn_form_colr_alpha"
															, "value"		=> $loghorn_form_alpha_value
															, "label"		=> "Opacity: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
		}
		
		function loghorn_form_shadow_settings ()	{
			
			// Fetch values of form shadow elements from options table, if present.
			$loghorn_form_shadow_hor_value   = self::$loghorn_options['LOGHORN_SETTINGS_FORM_SHDW']['hor'] ;
			$loghorn_form_shadow_ver_value   = self::$loghorn_options['LOGHORN_SETTINGS_FORM_SHDW']['ver'] ;
			$loghorn_form_shadow_blur_value  = self::$loghorn_options['LOGHORN_SETTINGS_FORM_SHDW']['blur'] ;
			$loghorn_form_shadow_colr_value  = self::$loghorn_options['LOGHORN_SETTINGS_FORM_SHDW']['hex'] ;
			$loghorn_form_shadow_alpha_value = self::$loghorn_options['LOGHORN_SETTINGS_FORM_SHDW']['alpha'] ;
			
			
			// If this is the first time, settings was not present in options table.
			// By default, there would be no shadows. 
			if ( !$loghorn_form_shadow_hor_value )	{
				$loghorn_form_shadow_hor_value = 0;								// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_form_shadow_ver_value )	{
				$loghorn_form_shadow_ver_value = 0;								// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_form_shadow_blur_value )	{
				$loghorn_form_shadow_blur_value = 0;							// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_form_shadow_colr_value )	{
				$loghorn_form_shadow_colr_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_form_shadow_alpha_value )	{
				$loghorn_form_shadow_alpha_value = 0;							// Move default value (all defaults defined in initialize-loghorn.php)
			}
			
			// Display Color Picker for Form Shadow:
			$loghorn_color_options				= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_SHDW][hex]"
															, "option_id"	=> "form_shadow"
															, "value"		=> $loghorn_form_shadow_colr_value
														);
			
			$this->loghorn_color_picker( $loghorn_color_options ) ;
			
			// Display slider for selecting Horizontal Displacement value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_SHDW][hor]"
															, "option_id"	=> "loghorn_form_shadow_hor"
															, "value"		=> $loghorn_form_shadow_hor_value
															, "label"		=> "Horizontal Displacement: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Vertical Displacement value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_SHDW][ver]"
															, "option_id"	=> "loghorn_form_shadow_ver"
															, "value"		=> $loghorn_form_shadow_ver_value
															, "label"		=> "Vertical Displacement: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Blur Effect value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_SHDW][blur]"
															, "option_id"	=> "loghorn_form_shadow_blur"
															, "value"		=> $loghorn_form_shadow_blur_value
															, "label"		=> "Blur Effect: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Form Shadow Alpha Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_SHDW][alpha]"
															, "option_id"	=> "loghorn_form_shadow_alpha"
															, "value"		=> $loghorn_form_shadow_alpha_value
															, "label"		=> "Opacity: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
		}
		
		
		function loghorn_form_border_settings()	{
			
			// Fetch values of form border elements from options table, if present.
			$loghorn_form_border_thickness_value   	= self::$loghorn_options['LOGHORN_SETTINGS_FORM_BORDR']['thick'] ;
			$loghorn_form_border_style_value   		= self::$loghorn_options['LOGHORN_SETTINGS_FORM_BORDR']['style'] ;
			$loghorn_form_border_color_value  		= self::$loghorn_options['LOGHORN_SETTINGS_FORM_BORDR']['hex'] ;
			$loghorn_form_border_alpha_value  		= self::$loghorn_options['LOGHORN_SETTINGS_FORM_BORDR']['alpha'] ;
			$loghorn_form_border_radius_value  		= self::$loghorn_options['LOGHORN_SETTINGS_FORM_BORDR']['radius'] ;
			
			// By default, no borders.
			if ( !$loghorn_form_border_thickness_value )	{
				$loghorn_form_border_thickness_value = 0;						// Move default value.
			}
			if ( !$loghorn_form_border_style_value )	{
				$loghorn_form_border_style_value = 0;							// Move default value.
			}
			if ( !$loghorn_form_border_color_value )	{
				$loghorn_form_border_color_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value.
			}
			if ( !$loghorn_form_border_alpha_value )	{
				$loghorn_form_border_alpha_value = 0;							// Move default value.
			}
			if ( !$loghorn_form_border_radius_value )	{
				$loghorn_form_border_radius_value = 0;							// Move default value.
			}
			
			// Display slider for selecting Form Border Thickness value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_BORDR][thick]"
															, "option_id"	=> "loghorn_form_border_thick"
															, "value"		=> $loghorn_form_border_thickness_value
															, "label"		=> "Thickness: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Form Border Alpha Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_BORDR][alpha]"
															, "option_id"	=> "loghorn_form_border_alpha"
															, "value"		=> $loghorn_form_border_alpha_value
															, "label"		=> "Opacity: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Form Border Radius Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_BORDR][radius]"
															, "option_id"	=> "loghorn_form_border_radius"
															, "value"		=> $loghorn_form_border_radius_value
															, "label"		=> "Corner Radius: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
		}
		
		
		function loghorn_load_custom_script( $hook ) {
			
			// Load only on ?page=mypluginname
			if( 'toplevel_page_class-log-horn-admin-menu' != $hook ) {
				return false;
			}
			
			$current_color = get_user_option( 'admin_color' ); // This can be used to load stylesheet based on current profile color.
			
			// Wordpress media library
			wp_enqueue_media();
			
			// WordPress Iris-based Color Picker:
			wp_enqueue_style( 'wp-color-picker' );
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// JQuery UI CSS for slider:
			wp_register_style('loghorn-jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
			wp_enqueue_style( 'loghorn-jquery-ui' );   
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			// Font-Awesome CDN:
			wp_enqueue_style( 'loghorn-fa' , 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
			
			// Plugin Menu's stylesheet:
			wp_enqueue_style( 'loghorn-admin-stylesheet' , LOGHORN_ADMIN_CSS_URL.'loghorn-admin-css.css' ) ;
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// JQuery UI Core for ui slider:
			wp_enqueue_script('jquery-ui-slider');
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			// Plugin Menu's JavaScript:
			wp_enqueue_script( 'loghorn-admin-javascript' , LOGHORN_ADMIN_JS_URL.'loghorn-admin-js.js' ) ;
			
			// js for WP Color Picker:
			wp_enqueue_script( 'loghorn-iris-cp', LOGHORN_ADMIN_JS_URL.'loghorn-admin-color-picker.js', array( 'wp-color-picker' ), false, true );
			
		}

		/*
		 * display default admin notice
		 */
		function loghorn_updated_notice() {
		
			settings_errors();
		}
		
		/*
		 * Displaying the Color Picker would be handled by wp-color-picker.
		 * Let's prepare the textbox for the browser to fall back upon, if JavaScript is disabled.
		 */
		function loghorn_color_picker( $loghorn_color_options)	{
			
			$loghorn_txtbox_id = "loghorn_".$loghorn_color_options["option_id"]."_color" ;
?>	
			<input type="text" value=<?php _e ( $loghorn_color_options["value"]) ; ?> class="loghorn-color-cp" id="<?php _e ( $loghorn_txtbox_id ) ; ?> " name="<?php _e ( $loghorn_color_options["option_name"]) ; ?>" />
			<br>
<?php
		}
		
		/*
		 * Slider would be displayed by JQuery.
		 * So, let's prepare the textbox so it can gracefully fall back to that, if JavaScript is disabled on the browser.
		 */
		function loghorn_jquery_slider($loghorn_jquery_slider_parms)	{
			
			$loghorn_txtbox_id = $loghorn_jquery_slider_parms["option_id"]."_inp" ;
			$loghorn_slider_id = $loghorn_jquery_slider_parms["option_id"]."_slider" ;
			$loghorn_handle_id = $loghorn_jquery_slider_parms["option_id"]."_handle" ;
?>			
			<span class="loghorn_menu_label"> <?php _e ( $loghorn_jquery_slider_parms["label"] ) ; ?> </span>
			<input type="text" class="loghorn_slider_textbox" name="<?php _e ( $loghorn_jquery_slider_parms["option_name"] ) ; ?>" id="<?php _e ( $loghorn_txtbox_id ) ; ?>" value="<?php _e ( $loghorn_jquery_slider_parms["value"] ) ; ?>">
			<div id="<?php _e ( $loghorn_slider_id ) ; ?>" class="ui-slider">
				<div id="<?php _e ( $loghorn_handle_id ) ; ?>" class="ui-slider-handle" ></div>
			</div>
			
<?php	
		}
	} //class Log_Horn_Admin_Menu ends here.
	
	/**
	 * Instantiate an object of the class Log_Horn_Admin_Menu to call the class constructor.
	 */
	function start_log_horn_menu () 	{
		$start_plugin_log_horn_menu = new Log_Horn_Admin_Menu;
	}
	
	// Go ahead and trigger the plugin:
	start_log_horn_menu () ;
	
endif; // End of the 'if  ( class_exists ) ' block
  
?>