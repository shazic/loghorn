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
					
			<div id="logo_div" class="img1">
				<a id="logo_image_src" target="_blank" href='<?php _e ( $loghorn_logo_image_src [0] ) ; ?>' >
					
						<img id='logo-image-preview' src="<?php _e ( $loghorn_logo_image_src [0] ) ; ?>" width="80" height="80"  > 
					
				</a>
				<div class="desc"> <?php _e ( 'Logo Preview' ) ; ?> </div>
			</div>
				
<?php	
		}
		
		function loghorn_show_bg_settings ()	{
			
			// Options table store the background image id. Get the image source information:
			$loghorn_bg_image_src = wp_get_attachment_image_src(self::$loghorn_options['LOGHORN_SETTINGS_BG']) ;
?>
			<input id="bg_upload_image_button" type="button" class="button" value="<?php _e( 'Background image' ); ?>" />
			<i class="fa fa-upload" aria-hidden="true"></i>
			<input type='hidden' name="loghorn_settings2[LOGHORN_SETTINGS_BG]" id='bg_image_attachment_id' value="<?php _e ( self::$loghorn_options['LOGHORN_SETTINGS_BG'] ) ; ?>">
					
			<div id="bg_div" class="img1">
				<a id="bg_image_src" target="_blank" href='<?php _e ( $loghorn_bg_image_src [0] ) ; ?>' >
					
						<img id='bg-image-preview' src="<?php _e ( $loghorn_bg_image_src [0] ) ; ?>" width="80" height="80"  > 
					
				</a>
				<div class="desc"> <?php _e ( 'Background Preview' ) ; ?> </div>
			</div>
<?php		
		}
		
		function loghorn_form_width_settings ()	{
			
			// Fetch form width from options table, if present.
			$loghorn_form_width_value = self::$loghorn_options['LOGHORN_SETTINGS_FORM_WIDTH'] ;
			
			// If this is the first time, settings was not present in options table. 
			if ( !$loghorn_form_width_value )	{
				$loghorn_form_width_value = LOGHORN_DEFAULT_FORM_WD;			// Move default value (all defaults defined in initialize-loghorn.php)
			}
?>
			<input type="range" min="220" max="800" id="loghorn_form_slider_width" name="loghorn_settings2[LOGHORN_SETTINGS_FORM_WIDTH]" value="<?php _e ( $loghorn_form_width_value ) ; ?>" step="1" onchange="showValueFormWidth(this.value)" />
			<span class="loghorn_menu_label"> <?php _e ( 'Form Width: ' ) ; ?> </span>
			<span class="loghorn_span" id="loghorn_form_slider_width_span"><?php printf ( esc_html ( "%dpx") ,$loghorn_form_width_value ) ; ?></span>	
			<br>
		
<?php		
		}
		
		function loghorn_form_padding_settings()	{
			
			// Fetch form padding from options table, if present.
			$loghorn_form_padding_value = self::$loghorn_options['LOGHORN_SETTINGS_FORM_PAD'] ;
			
			// If this is the first time, settings was not present in options table. 
			if ( !$loghorn_form_padding_value )	{
				$loghorn_form_padding_value = 10 ; //LOGHORN_DEFAULT_PADDING;	// Move default value (all defaults defined in initialize-loghorn.php)
			}
?>
			<input type="range" min="0" max="10" id="loghorn_form_slider_pad" name="loghorn_settings2[LOGHORN_SETTINGS_FORM_PAD]" value="<?php _e ( $loghorn_form_padding_value ) ; ?>" step="1" onchange="showValueFormPad(this.value)" />
			<span class="loghorn_menu_label"> <?php _e ( 'Form Padding: ' ) ; ?> </span>
			<span class="loghorn_span" id="loghorn_form_slider_pad_span"><?php printf ( esc_html ( "%dpx") ,$loghorn_form_padding_value ) ; ?></span>	
			<br>
<?php				
		}
		
		function loghorn_form_margin_settings()	{
			
			// Fetch form margin from options table, if present.
			$loghorn_form_margin_value = self::$loghorn_options['LOGHORN_SETTINGS_FORM_MRGN'] ;
			
			// If this is the first time, settings was not present in options table. 
			if ( !$loghorn_form_margin_value )	{
				$loghorn_form_margin_value = 5 ; //LOGHORN_DEFAULT_FORM_MRGN;	// Move default value (all defaults defined in initialize-loghorn.php)
			}
?>
			<input type="range" min="0" max="10" id="loghorn_form_slider_margin" name="loghorn_settings2[LOGHORN_SETTINGS_FORM_MRGN]" value="<?php _e ( $loghorn_form_margin_value ) ; ?>" step="1" onchange="showValueFormMargin(this.value)" />
			<span class="loghorn_menu_label"> <?php _e ( 'Form Margin: ' ) ; ?> </span>
			<span class="loghorn_span" id="loghorn_form_slider_margin_span"><?php printf ( esc_html ( "%dpx") ,$loghorn_form_margin_value ) ; ?></span>	
			<br>
<?php				
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
?>
			<input type="text" value=<?php _e ( $loghorn_form_color_value) ; ?> class="loghorn-color-cp" id="loghorn_form_color" name="loghorn_settings2[LOGHORN_SETTINGS_FORM_COLOR][hex]" />
			<br>
			
			<input type="range" min="0" max="100" id="loghorn_form_slider_alpha" name="loghorn_settings2[LOGHORN_SETTINGS_FORM_COLOR][alpha]" value="<?php _e ( $loghorn_form_alpha_value ) ; ?>" step="1" onchange="showValueFormAlpha(this.value)" />
			<span class="loghorn_menu_label"> <?php _e ( 'Alpha Channel: ' ) ; ?> </span>
			<span class="loghorn_span" id="loghorn_form_slider_alpha_span"><?php _e ( $loghorn_form_alpha_value."%" ) ; ?></span>	

<?php
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
?>			
			<input type="text" value=<?php _e ( $loghorn_form_shadow_colr_value) ; ?> class="loghorn-color-cp" id="loghorn_form_shadow_color" name="loghorn_settings2[LOGHORN_SETTINGS_FORM_SHDW][hex]" />
			<br>

<?php
			// Display slider for Horizontal Displacement:
			$loghorn_slider_control_input = array (	 "min"	=> "0"														// Min. value of slider 
													,"max"	=> "10" 													// Max. value of slider 
													,"id"	=> "loghorn_form_shdw_slider_hor"							// id for HTML input form 
													,"name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_SHDW][hor]" 	// This is the name of the input form and used by WP to store the value of the setting
													,"value" 	=>	$loghorn_form_shadow_hor_value						// The value of the slider element
													,"step"	=> "1" 														// slider increment
													,"js"	=> "showValueFormShdwHor"									// JavaScript function associated with this slider
												);
			$loghorn_slider_control_span1 = array (	 "class" => "loghorn_menu_label"									// class for the label describing the slider
													,"text"	 => "Horizontal Displacement: "								// Text for the label describing the slider
												);
			$loghorn_slider_control_span2 = array (	 "class" => "loghorn_span"											// class for the label displaying the value of the slider
													,"id"	 => "loghorn_form_shdw_slider_hor_span"						// id for the label displaying the value of the slider
													,"postfix"	=> "px"													// this value is displayed after the slider value. It basically describes the unit of measurement.
												);									
			$this->loghorn_show_slider_control ( $loghorn_slider_control_input , $loghorn_slider_control_span1 , $loghorn_slider_control_span2);
			
			
			// Display slider for Alpha Channel:
			$loghorn_slider_control_input = array (	 "min"	=> "0" 														// Min. value of slider 
													,"max"	=> "100" 													// Max. value of slider 
													,"id"	=> "loghorn_form_shdw_slider_alpha"							// id for HTML input form 
													,"name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_SHDW][alpha]"	// This is the name of the input form and used by WP to store the value of the setting
													,"value" 	=>	$loghorn_form_shadow_alpha_value					// The value of the slider element
													,"step"	=> "1" 														// slider increment
													,"js"	=> "showValueFormShdwAlpha"									// JavaScript function associated with this slider
												);
			$loghorn_slider_control_span1 = array (	 "class" => "loghorn_menu_label"									// class for the label describing the slider
													,"text"	 => "Alpha Channel: "										// Text for the label describing the slider
												);
			$loghorn_slider_control_span2 = array (	 "class" => "loghorn_span"											// class for the label displaying the value of the slider
													,"id"	 => "loghorn_form_shdw_slider_alpha_span"					// id for the label displaying the value of the slider
													,"postfix"	=> "%"													// this value is displayed after the slider value. It basically describes the unit of measurement.
												);								
			$this->loghorn_show_slider_control ( $loghorn_slider_control_input , $loghorn_slider_control_span1 , $loghorn_slider_control_span2);
?>			
			<input type="hidden" name="loghorn_settings2[LOGHORN_SETTINGS_FORM_SHDW][ver]" id="loghorn_form_shadow_ver_inp" value="<?php _e ( $loghorn_form_shadow_ver_value ) ; ?>">
			<span class="loghorn_menu_label"> Vertical Displacement: </span>
			<div id="loghorn_form_shadow_ver_slider" class="ui-slider">
				<div id="loghorn_form_shadow_ver_handle" class="ui-slider-handle" ></div>
			</div>
			<br>
			
<?php	
			
		}
		
		function loghorn_load_custom_script( $hook ) {
			
			// Load only on ?page=mypluginname
			if( 'toplevel_page_class-log-horn-admin-menu' != $hook ) {
				return;
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
			wp_enqueue_script('jquery'); 
			wp_enqueue_script('jquery-ui-core'); 
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
		 *
		 */
		function loghorn_show_slider_control ( 	$loghorn_slider_inp, $loghorn_slider_span1, $loghorn_slider_span2 )	{
?>		
			<input type="range" min="<?php _e ( $loghorn_slider_inp["min"] ) ; ?>" max="<?php _e ( $loghorn_slider_inp["max"] ) ; ?>" id="<?php _e ( $loghorn_slider_inp["id"] ) ; ?>" name="<?php _e ( $loghorn_slider_inp["name"] ) ; ?>" value="<?php _e ( $loghorn_slider_inp["value"] ) ; ?>" step="<?php _e ( $loghorn_slider_inp["step"] ) ; ?>" onchange="<?php _e ( $loghorn_slider_inp["js"] ) ; ?>(this.value)" />
			<span class="<?php _e ( $loghorn_slider_span1["class"] ) ; ?>"> <?php _e ( $loghorn_slider_span1["text"] ) ; ?> </span>
			<span class="<?php _e ( $loghorn_slider_span2["class"] ) ; ?>" id="<?php _e ( $loghorn_slider_span2["id"] ) ; ?>"><?php _e ( $loghorn_slider_inp["value"].$loghorn_slider_span2["postfix"] ) ; ?></span>	
			<br>
			
			<!-- Some experiments with jquery for the form shadow alpha channel using jquery ui slider:
			<input type="hidden" name="loghorn_settings2[LOGHORN_SETTINGS_FORM_SHDW][ver]" id="loghorn_form_shadow_ver_inp" value="<?php _e ( $loghorn_form_shadow_ver_value ) ; ?>">
			<div id="slider" value="<?php _e ( $loghorn_form_shadow_ver_value ) ; ?>">
				<div id="custom-handle" class="ui-slider-handle" value="<?php _e ( $loghorn_form_shadow_ver_value ) ; ?>" ></div>
			</div>
			-->
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