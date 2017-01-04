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
			
			//_e ( '<div class="wrap" id="loghorn_options_menu" hidden=true>' ) ; 
			_e ( '<div class="wrap" id="loghorn_options_menu">' ) ; 
?>
			
			<h2> <?php _e ( "Log Horn Options" ) ; ?> </h2>
			<form method="post" action=<?php _e ( '"'.get_site_url().'/wp-admin/options.php"' ) ;  ?> >
<?php		submit_button();			// Submit button at the top
?>				
			<div id="loghorn_tabs">
				<ul>
					<li><a href="#tabs-1">Image Settings</a></li>
					<li><a href="#tabs-2">Form Settings</a></li>
					<li><a href="#tabs-3">Input Fields</a></li>
					<li><a href="#tabs-4">Submit Button</a></li>
					<li><a href="#tabs-5">Messages</a></li>
				</ul>
			<div class="loghorn_fixed" id="loghorn_preview_button">
				<span>Preview</span> 
			</div>
			<div class="loghorn_preview_dialog" id="loghorn_preview_division">
				<span>Preview</span> 
			</div>
<?php 			
				settings_fields( 'loghorn_settings_group' ); 
				do_settings_sections( 'loghorn_settings_sections' ); 

				//close the div for the final tab:	?>
				</div>
<?php		// close div for "#loghorn_tabs" :		?>
			</div>			
<?php			
			submit_button(); 			// Submit button at the bottom, so that user don't have to scroll up just to save settings.
?>
			</form>
<?php 		
			_e ( '</div>' ) ; 			// end of class "wrap"
		}
		
		function loghorn_plugin_settings()	{
			
			register_setting( 'loghorn_settings_group' , 'loghorn_settings2' , 'loghorn_validate_input' ); 
			
			add_settings_section('loghorn_images'				, ''		, 		array ( $this, 'loghorn_image_settings' ), 'loghorn_settings_sections');
				add_settings_field('loghorn_logo_option'		, 	'Disable Logo?'			, 		array ( $this, 'loghorn_disable_logo_option' 		), 		'loghorn_settings_sections', 'loghorn_images');
				add_settings_field('loghorn_logo_filename'		, 	'Logo File'				, 		array ( $this, 'loghorn_show_logo_settings' 		), 		'loghorn_settings_sections', 'loghorn_images');
				add_settings_field('loghorn_bg_filename'		,	'Background'			, 		array ( $this, 'loghorn_show_bg_settings' 			), 		'loghorn_settings_sections', 'loghorn_images');
			
			add_settings_section('loghorn_form'					, ''	, 		array ( $this, 'loghorn_form_settings' 	), 'loghorn_settings_sections');
				add_settings_field('loghorn_form_width'			, 	'Form Width'			,		array ( $this, 'loghorn_form_width_settings' 		), 		'loghorn_settings_sections', 'loghorn_form');
				add_settings_field('loghorn_form_padding'		, 	'Form Padding'			, 		array ( $this, 'loghorn_form_padding_settings' 		), 		'loghorn_settings_sections', 'loghorn_form');
				add_settings_field('loghorn_form_margin'		, 	'Form Margin'			, 		array ( $this, 'loghorn_form_margin_settings' 		), 		'loghorn_settings_sections', 'loghorn_form');
				add_settings_field('loghorn_form_color'			, 	'Form Background Color'	, 		array ( $this, 'loghorn_form_color_settings' 		), 		'loghorn_settings_sections', 'loghorn_form');
				add_settings_field('loghorn_form_shadow'		, 	'Form Shadow'			, 		array ( $this, 'loghorn_form_shadow_settings' 		), 		'loghorn_settings_sections', 'loghorn_form');
				add_settings_field('loghorn_form_border'		, 	'Form Border'			, 		array ( $this, 'loghorn_form_border_settings' 		), 		'loghorn_settings_sections', 'loghorn_form');
				add_settings_field('loghorn_form_label'			, 	'Form Label'			, 		array ( $this, 'loghorn_form_label_settings' 		), 		'loghorn_settings_sections', 'loghorn_form');
			
			add_settings_section('loghorn_input'				, '', 		array ( $this, 'loghorn_input_settings' 	), 'loghorn_settings_sections');
				add_settings_field('loghorn_input_text'			, 	'Text'					, 		array ( $this, 'loghorn_input_text_settings' 		), 		'loghorn_settings_sections', 'loghorn_input');
				add_settings_field('loghorn_input_textbox'		, 	'Textbox'				, 		array ( $this, 'loghorn_input_textbox_settings'		), 		'loghorn_settings_sections', 'loghorn_input');
				add_settings_field('loghorn_input_border'		, 	'Textbox Border'		, 		array ( $this, 'loghorn_input_border_settings' 		), 		'loghorn_settings_sections', 'loghorn_input');
				add_settings_field('loghorn_checkbox'			, 	'Checkbox'				, 		array ( $this, 'loghorn_checkbox_settings' 			), 		'loghorn_settings_sections', 'loghorn_input');
			
			add_settings_section('loghorn_submit'				, '',		array ( $this, 'loghorn_submit_button_settings' ), 'loghorn_settings_sections');	
				add_settings_field('loghorn_submit_text'		, 	'Button Text'			, 		array ( $this, 'loghorn_submit_text_settings'		), 		'loghorn_settings_sections', 'loghorn_submit');
				add_settings_field('loghorn_submit_txt_shdw'	, 	'Button Text Shadow'	, 		array ( $this, 'loghorn_submit_text_shdw_settings'	), 	'loghorn_settings_sections', 'loghorn_submit');
				add_settings_field('loghorn_submit_bg'			, 	'Button Color'			, 		array ( $this, 'loghorn_submit_bg_settings'			), 		'loghorn_settings_sections', 'loghorn_submit');
				add_settings_field('loghorn_submit_border'		, 	'Button Border'			, 		array ( $this, 'loghorn_submit_border_settings'		), 		'loghorn_settings_sections', 'loghorn_submit');
			
			add_settings_section('loghorn_msg'					, '',		array ( $this, 'loghorn_msg_button_settings' )	, 'loghorn_settings_sections');	
				add_settings_field('loghorn_msg_text'			, 	'Message Text'			, 		array ( $this, 'loghorn_msg_text_settings'			), 		'loghorn_settings_sections', 'loghorn_msg');
				add_settings_field('loghorn_msg_txt_shdw'		, 	'Message Text Shadow'	, 		array ( $this, 'loghorn_msg_text_shdw_settings'		), 		'loghorn_settings_sections', 'loghorn_msg');
				add_settings_field('loghorn_msg_bg'				, 	'Message Box Color'		, 		array ( $this, 'loghorn_msg_bg_settings'			), 		'loghorn_settings_sections', 'loghorn_msg');
				add_settings_field('loghorn_msg_border_radius'	, 	'Message Border Radius'	, 		array ( $this, 'loghorn_msg_border_radius_settings'	), 		'loghorn_settings_sections', 'loghorn_msg');
				add_settings_field('loghorn_msg_border_l'		, 	'Message Border (left)'	, 		array ( $this, 'loghorn_msg_border_l_settings'		), 		'loghorn_settings_sections', 'loghorn_msg');
				add_settings_field('loghorn_msg_border_t'		, 	'Message Border (top)'	, 		array ( $this, 'loghorn_msg_border_t_settings'		), 		'loghorn_settings_sections', 'loghorn_msg');
				add_settings_field('loghorn_msg_border_r'		, 	'Message Border (right)', 		array ( $this, 'loghorn_msg_border_r_settings'		), 		'loghorn_settings_sections', 'loghorn_msg');
				add_settings_field('loghorn_msg_border_b'		, 	'Message Border (bottom)', 		array ( $this, 'loghorn_msg_border_b_settings'		), 		'loghorn_settings_sections', 'loghorn_msg');
			
		}
		
		
		function loghorn_validate_input()	{
			
			
			 
		}
		
		function loghorn_image_settings (){
?>
			<div id="tabs-1">
<?php
		}
		
		function loghorn_form_settings (){
		
		// close the division of the previous tab and start the division for the next one.
?>
			</div>
			<div id="tabs-2">
<?php
		}
		
		function loghorn_input_settings()	{
			
		// close the division of the previous tab and start the division for the next one.
?>
			</div>
			<div id="tabs-3">
<?php
		}
		
		function loghorn_submit_button_settings()	{
			
		// close the division of the previous tab and start the division for the next one.
?>
			</div>
			<div id="tabs-4">
<?php
		}
		
		function loghorn_msg_button_settings()	{
			
		// close the division of the previous tab and start the division for the next one.
?>
			</div>
			<div id="tabs-5">
<?php
			
		}
		
		
		function loghorn_disable_logo_option()	{
			
			// Options table store whether to display the logo or not. Get the image source information:
			$loghorn_disable_logo_option = self::$loghorn_options['LOGHORN_SETTINGS_LOGO']['disable'] ;
			
			// If this is the first time, settings was not present in options table. 
			if ( !isset( $loghorn_disable_logo_option ) )	{
				$loghorn_disable_logo_option = 1;			// Move default value (all defaults defined in initialize-loghorn.php)
			}
			
			// Display listbox for selecting Yes/No:
			global $loghorn_yes_no ;							// Defined in initialize-loghorn.php.
			$loghorn_show_listbox_parms			=	array (	 "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_LOGO][disable]"
															,"option_id"	=> "loghorn_disable_logo_option"
															,"label"		=> "Selecting 'Yes' would hide the logo:"
															,"value"		=> $loghorn_disable_logo_option
														);
			$this->loghorn_show_listbox ( $loghorn_yes_no, $loghorn_show_listbox_parms ) ;
			
		}
		
		
		function loghorn_show_logo_settings ()	{
			
			// Options table store the logo's image id. Get the image source information:
			$loghorn_logo_image_src = wp_get_attachment_image_src(self::$loghorn_options['LOGHORN_SETTINGS_LOGO']['image'], 'original' ) ;
			
			// Display Logo Image:
			$loghorn_logo_image_parameters		= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_LOGO][image]"
															, "option_id"	=> "logo"
															, "button_text"	=> "Select logo image"
															, "value"		=> self::$loghorn_options['LOGHORN_SETTINGS_LOGO']['image']
															, "width"		=> "80"
															, "height"		=> "80"
															, "desc"		=> "Preview"
														);
			$this->loghorn_show_image_settings ( $loghorn_logo_image_parameters , $loghorn_logo_image_src ) ;
		}
		
		function loghorn_show_bg_settings ()	{
			
			// Options table store the background image id. Get the image source information:
			$loghorn_bg_image_src = wp_get_attachment_image_src(self::$loghorn_options['LOGHORN_SETTINGS_BG'], 'original' ) ;
			
			// Display background image:
			$loghorn_bg_image_parameters		= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_BG]"
															, "option_id"	=> "bg"
															, "button_text"	=> "Select Background image"
															, "value"		=> self::$loghorn_options['LOGHORN_SETTINGS_BG']
															, "width"		=> "160"
															, "height"		=> "100"
															, "desc"		=> "Background Preview"
														);
			$this->loghorn_show_image_settings ( $loghorn_bg_image_parameters , $loghorn_bg_image_src ) ;
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
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_COLOR][hex]"
															, "option_id"	=> "form"
															, "value"		=> $loghorn_form_color_value
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;

			// Display slider for Form Color Alpha Channel:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_COLOR][alpha]"
															, "option_id"	=> "loghorn_form_colr_alpha"
															, "value"		=> $loghorn_form_alpha_value
															, "label"		=> "Opacity: "
														);
			#$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
		}
		
		function loghorn_form_shadow_settings ()	{
			
			// Fetch values of form shadow elements from options table, if present.
			$loghorn_form_shadow_hor_value   = self::$loghorn_options['LOGHORN_SETTINGS_FORM_SHDW']['hor'] ;
			$loghorn_form_shadow_ver_value   = self::$loghorn_options['LOGHORN_SETTINGS_FORM_SHDW']['ver'] ;
			$loghorn_form_shadow_blur_value  = self::$loghorn_options['LOGHORN_SETTINGS_FORM_SHDW']['blur'] ;
			$loghorn_form_shadow_spread_value= self::$loghorn_options['LOGHORN_SETTINGS_FORM_SHDW']['spread'] ;
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
			if ( !$loghorn_form_shadow_spread_value )	{
				$loghorn_form_shadow_spread_value = 0;							// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_form_shadow_colr_value )	{
				$loghorn_form_shadow_colr_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_form_shadow_alpha_value )	{
				$loghorn_form_shadow_alpha_value = 0;							// Move default value (all defaults defined in initialize-loghorn.php)
			}
			
			// Display Color Picker for Form Shadow:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_SHDW][hex]"
															, "option_id"	=> "form_shadow"
															, "value"		=> $loghorn_form_shadow_colr_value
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
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
			
			// Display slider for selecting Spread Effect value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_SHDW][spread]"
															, "option_id"	=> "loghorn_form_shadow_spread"
															, "value"		=> $loghorn_form_shadow_spread_value
															, "label"		=> "Spread Effect: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Form Shadow Alpha Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_SHDW][alpha]"
															, "option_id"	=> "loghorn_form_shadow_alpha"
															, "value"		=> $loghorn_form_shadow_alpha_value
															, "label"		=> "Opacity: "
														);
			#$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
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
			
			// Display Color Picker for Form Border:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_BORDR][hex]"
															, "option_id"	=> "form_border"
															, "value"		=> $loghorn_form_border_color_value
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
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
			#$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Form Border Radius Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_BORDR][radius]"
															, "option_id"	=> "loghorn_form_border_radius"
															, "value"		=> $loghorn_form_border_radius_value
															, "label"		=> "Corner Radius: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display listbox for selecting Border style for the Form:
			global $loghorn_border_styles_global ;							// Options for border styles. Defined in initialize-loghorn.php.
			$loghorn_show_listbox_parms			=	array (	 "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_BORDR][style]"
															,"option_id"	=> "loghorn_form_border_style"
															,"label"		=> "Border Type:"
															,"value"		=> $loghorn_form_border_style_value
														);
			$this->loghorn_show_listbox ( $loghorn_border_styles_global, $loghorn_show_listbox_parms ) ;
			
		}
		
		function loghorn_form_label_settings()	{
			
			// Fetch values of form label settings from options table, if present.
			$loghorn_form_label_font_value   		= self::$loghorn_options['LOGHORN_SETTINGS_FORM_LBL']['font'] ;
			$loghorn_form_label_size_value   		= self::$loghorn_options['LOGHORN_SETTINGS_FORM_LBL']['size'] ;
			$loghorn_form_label_color_value  		= self::$loghorn_options['LOGHORN_SETTINGS_FORM_LBL']['hex'] ;
			
			// Set defaults, if not present.
			if ( !$loghorn_form_label_font_value )	{
				$loghorn_form_label_font_value = 0;								// Move default value.
			}
			if ( !$loghorn_form_label_size_value )	{
				$loghorn_form_label_size_value = 10;							// Move default value.
			}
			if ( !$loghorn_form_label_color_value )	{
				$loghorn_form_label_color_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value.
			}
			
			// Display Color Picker for Form Label:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_LBL][hex]"
															, "option_id"	=> "form_label"
															, "value"		=> $loghorn_form_label_color_value
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display slider for selecting Form Font Size value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_LBL][size]"
															, "option_id"	=> "loghorn_form_label_size"
															, "value"		=> $loghorn_form_label_size_value
															, "label"		=> "Font Size: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display listbox for selecting Font style for the Form Label:
			global $loghorn_fonts_global ;									// Options for fonts. Defined in initialize-loghorn.php.
			$loghorn_show_listbox_parms			=	array (	 "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_FORM_LBL][font]"
															,"option_id"	=> "loghorn_form_label_font"
															,"label"		=> "Font:"
															,"value"		=> $loghorn_form_label_font_value
														);
			$this->loghorn_show_listbox ( $loghorn_fonts_global, $loghorn_show_listbox_parms ) ;
		}
		
		function loghorn_input_text_settings()	{
			
			// Fetch values of input text settings from options table, if present.
			$loghorn_input_text_font_value   		= self::$loghorn_options['LOGHORN_SETTINGS_INP_FONT']['font'] ;
			$loghorn_input_text_size_value   		= self::$loghorn_options['LOGHORN_SETTINGS_INP_FONT']['size'] ;
			$loghorn_input_text_color_value  		= self::$loghorn_options['LOGHORN_SETTINGS_INP_FONT']['hex'] ;
			
			// Set defaults, if not present.
			if ( !$loghorn_input_text_font_value )	{
				$loghorn_input_text_font_value = 0;								// Move default value.
			}
			if ( !$loghorn_input_text_size_value )	{
				$loghorn_input_text_size_value = 10;							// Move default value.
			}
			if ( !$loghorn_input_text_color_value )	{
				$loghorn_input_text_color_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value.
			}
			
			// Display Color Picker for Input box Text:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_INP_FONT][hex]"
															, "option_id"	=> "input_text"
															, "value"		=> $loghorn_input_text_color_value
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display slider for selecting Text Font Size value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_INP_FONT][size]"
															, "option_id"	=> "loghorn_input_text_size"
															, "value"		=> $loghorn_input_text_size_value
															, "label"		=> "Font Size: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display listbox for selecting Font style for the Input Text:
			global $loghorn_fonts_global ;									// Options for fonts. Defined in initialize-loghorn.php.
			$loghorn_show_listbox_parms			=	array (	 "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_INP_FONT][font]"
															,"option_id"	=> "loghorn_input_text_font"
															,"label"		=> "Font:"
															,"value"		=> $loghorn_input_text_font_value
														);
			$this->loghorn_show_listbox ( $loghorn_fonts_global, $loghorn_show_listbox_parms ) ;
			
		}
		
		function loghorn_input_textbox_settings()	{
			
			// Fetch textbox color and alpha channel values from options table, if present.
			$loghorn_textbox_color_value = self::$loghorn_options['LOGHORN_SETTINGS_INP_BG']['hex'] ;
			$loghorn_textbox_alpha_value = self::$loghorn_options['LOGHORN_SETTINGS_INP_BG']['alpha'] ;
			
			// If this is the first time, settings was not present in options table. 
			if ( !$loghorn_textbox_color_value )	{
				$loghorn_textbox_color_value = LOGHORN_DEFAULT_FORM_COLR;		// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_textbox_alpha_value )	{
				$loghorn_textbox_alpha_value = LOGHORN_DEFAULT_ALPHA;			// Move default value (all defaults defined in initialize-loghorn.php)
			}
			
			// Display Color Picker for the textbox:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_INP_BG][hex]"
															, "option_id"	=> "textbox"
															, "value"		=> $loghorn_textbox_color_value
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;

			// Display slider for Textbox Color Alpha Channel:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_INP_BG][alpha]"
															, "option_id"	=> "loghorn_textbox_colr_alpha"
															, "value"		=> $loghorn_textbox_alpha_value
															, "label"		=> "Opacity: "
														);
			#$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
		}
		function loghorn_input_border_settings()	{
			
			// Fetch values of inputbox border elements from options table, if present.
			$loghorn_input_border_thickness_value   = self::$loghorn_options['LOGHORN_SETTINGS_INP_BORDR']['thick'] ;
			$loghorn_input_border_style_value   	= self::$loghorn_options['LOGHORN_SETTINGS_INP_BORDR']['style'] ;
			$loghorn_input_border_color_value  		= self::$loghorn_options['LOGHORN_SETTINGS_INP_BORDR']['hex'] ;
			$loghorn_input_border_alpha_value  		= self::$loghorn_options['LOGHORN_SETTINGS_INP_BORDR']['alpha'] ;
			$loghorn_input_border_radius_value  	= self::$loghorn_options['LOGHORN_SETTINGS_INP_BORDR']['radius'] ;
			
			// By default, no borders.
			if ( !$loghorn_input_border_thickness_value )	{
				$loghorn_input_border_thickness_value = 0;						// Move default value.
			}
			if ( !$loghorn_input_border_style_value )	{
				$loghorn_input_border_style_value = 0;							// Move default value.
			}
			if ( !$loghorn_input_border_color_value )	{
				$loghorn_input_border_color_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value.
			}
			if ( !$loghorn_input_border_alpha_value )	{
				$loghorn_input_border_alpha_value = 0;							// Move default value.
			}
			if ( !$loghorn_input_border_radius_value )	{
				$loghorn_input_border_radius_value = 0;							// Move default value.
			}
			
			// Display Color Picker for Inputbox Border:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_INP_BORDR][hex]"
															, "option_id"	=> "input_border"
															, "value"		=> $loghorn_input_border_color_value
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display slider for selecting Inputbox Border Thickness value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_INP_BORDR][thick]"
															, "option_id"	=> "loghorn_input_border_thick"
															, "value"		=> $loghorn_input_border_thickness_value
															, "label"		=> "Thickness: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Inputbox Border Alpha Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_INP_BORDR][alpha]"
															, "option_id"	=> "loghorn_input_border_alpha"
															, "value"		=> $loghorn_input_border_alpha_value
															, "label"		=> "Opacity: "
														);
			#$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Inputbox Border Radius Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_INP_BORDR][radius]"
															, "option_id"	=> "loghorn_input_border_radius"
															, "value"		=> $loghorn_input_border_radius_value
															, "label"		=> "Corner Radius: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display listbox for selecting Border style for the Inputbox:
			global $loghorn_border_styles_global ;							// Options for border styles. Defined in initialize-loghorn.php.
			$loghorn_show_listbox_parms			=	array (	 "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_INP_BORDR][style]"
															,"option_id"	=> "loghorn_input_border_style"
															,"label"		=> "Border Type:"
															,"value"		=> $loghorn_input_border_style_value
														);
			$this->loghorn_show_listbox ( $loghorn_border_styles_global, $loghorn_show_listbox_parms ) ;
			
		}
		
		function loghorn_checkbox_settings()	{
			
			// Fetch checkbox-width from options table, if present.
			$loghorn_checkbox_width_value  = self::$loghorn_options['LOGHORN_SETTINGS_CB']['width'] ;
			$loghorn_checkbox_height_value = self::$loghorn_options['LOGHORN_SETTINGS_CB']['height'] ;
			$loghorn_checkbox_radius_value = self::$loghorn_options['LOGHORN_SETTINGS_CB']['radius'] ;
			
			// If this is the first time, settings was not present in options table. 
			if ( !$loghorn_checkbox_width_value )	{
				$loghorn_checkbox_width_value = 12;								// Move default value.
			}
			if ( !$loghorn_checkbox_height_value )	{
				$loghorn_checkbox_height_value = 12;							// Move default value.
			}
			if ( !$loghorn_checkbox_radius_value )	{
				$loghorn_checkbox_radius_value = 0;								// Move default value.
			}
			
			// Display slider for Checkbox Width:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_CB][width]"
															, "option_id"	=> "loghorn_checkbox_width"
															, "value"		=> $loghorn_checkbox_width_value
															, "label"		=> "Width: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for Checkbox Height:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_CB][height]"
															, "option_id"	=> "loghorn_checkbox_height"
															, "value"		=> $loghorn_checkbox_height_value
															, "label"		=> "Height: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for Checkbox Radius:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_CB][radius]"
															, "option_id"	=> "loghorn_checkbox_radius"
															, "value"		=> $loghorn_checkbox_radius_value
															, "label"		=> "Radius: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
		}
		
		function loghorn_submit_text_settings()	{
			
			// Fetch values of submit button text settings from options table, if present.
			$loghorn_submit_text_font_value   		= self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_TXT']['font'] ;
			$loghorn_submit_text_size_value   		= self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_TXT']['size'] ;
			$loghorn_submit_text_color_value  		= self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_TXT']['hex'] ;
			
			$loghorn_submit_text_hvr_color_value  	= self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_TXT_HVR']['hex'] ;
			
			// Set defaults, if not present.
			if ( !$loghorn_submit_text_font_value )	{
				$loghorn_submit_text_font_value = 0;							// Move default value.
			}
			if ( !$loghorn_submit_text_size_value )	{
				$loghorn_submit_text_size_value = 10;							// Move default value.
			}
			if ( !$loghorn_submit_text_color_value )	{
				$loghorn_submit_text_color_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value.
			}
			// On Hover:
			if ( !$loghorn_submit_text_hvr_color_value )	{
				$loghorn_submit_text_hvr_color_value = LOGHORN_DEFAULT_FORM_COLR;// Move default value.
			}
			
			// Display Color Picker for Submit button Text:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_TXT][hex]"
															, "option_id"	=> "submit_text"
															, "value"		=> $loghorn_submit_text_color_value
															, "label"		=> "Normal:"
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			// Display Color Picker for Submit button Text on mouse hover:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_TXT_HVR][hex]"
															, "option_id"	=> "submit_text_hvr"
															, "value"		=> $loghorn_submit_text_hvr_color_value
															, "label"		=> "On Hover:"
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display slider for selecting Text Font Size value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_TXT][size]"
															, "option_id"	=> "loghorn_submit_text_size"
															, "value"		=> $loghorn_submit_text_size_value
															, "label"		=> "Font Size: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display listbox for selecting Font style for the Submit button:
			global $loghorn_fonts_global ;									// Options for fonts. Defined in initialize-loghorn.php.
			$loghorn_show_listbox_parms			= array (	 "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_TXT][font]"
															,"option_id"	=> "loghorn_submit_text_font"
															,"label"		=> "Font:"
															,"value"		=> $loghorn_submit_text_font_value
														);
			$this->loghorn_show_listbox ( $loghorn_fonts_global, $loghorn_show_listbox_parms ) ;
			
		}
		
		function loghorn_submit_text_shdw_settings()	{
			
			// Fetch values of button's text shadow from options table, if present.
			$loghorn_submit_text_shadow_hor_value   = self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_TXT_SHDW']['hor'] ;
			$loghorn_submit_text_shadow_ver_value   = self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_TXT_SHDW']['ver'] ;
			$loghorn_submit_text_shadow_blur_value  = self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_TXT_SHDW']['blur'] ;
			$loghorn_submit_text_shadow_colr_value  = self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_TXT_SHDW']['hex'] ;
			$loghorn_submit_text_shadow_alpha_value = self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_TXT_SHDW']['alpha'] ;
			$loghorn_submit_text_shadow_hvr_colr_value
													= self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_TXT_SHDW_HOVR']['hex'] ;
			// If this is the first time, settings was not present in options table.
			// By default, there would be no shadows. 
			if ( !$loghorn_submit_text_shadow_hor_value )	{
				$loghorn_submit_text_shadow_hor_value = 0;							// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_submit_text_shadow_ver_value )	{
				$loghorn_submit_text_shadow_ver_value = 0;							// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_submit_text_shadow_blur_value )	{
				$loghorn_submit_text_shadow_blur_value = 0;							// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_submit_text_shadow_colr_value )	{
				$loghorn_submit_text_shadow_colr_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_submit_text_shadow_alpha_value )	{
				$loghorn_submit_text_shadow_alpha_value = 0;						// Move default value (all defaults defined in initialize-loghorn.php)
			}
			// On Hover:
			if ( !$loghorn_submit_text_shadow_hvr_colr_value )	{
				$loghorn_submit_text_shadow_hvr_colr_value = LOGHORN_DEFAULT_FORM_COLR;// Move default value.
			}
			// Display Color Picker for Button Text Shadow:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_TXT_SHDW][hex]"
															, "option_id"	=> "submit_text_shadow"
															, "value"		=> $loghorn_submit_text_shadow_colr_value
															, "label"		=> "Normal:"
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display Color Picker for Submit Button Text Shadow on mouse hover:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_TXT_SHDW_HOVR][hex]"
															, "option_id"	=> "submit_text_shadow_hvr"
															, "value"		=> $loghorn_submit_text_shadow_hvr_colr_value
															, "label"		=> "On Hover:"
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display slider for selecting Horizontal Displacement value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_TXT_SHDW][hor]"
															, "option_id"	=> "loghorn_submit_text_shadow_hor"
															, "value"		=> $loghorn_submit_text_shadow_hor_value
															, "label"		=> "Horizontal Displacement: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Vertical Displacement value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_TXT_SHDW][ver]"
															, "option_id"	=> "loghorn_submit_text_shadow_ver"
															, "value"		=> $loghorn_submit_text_shadow_ver_value
															, "label"		=> "Vertical Displacement: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Blur Effect value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_TXT_SHDW][blur]"
															, "option_id"	=> "loghorn_submit_text_shadow_blur"
															, "value"		=> $loghorn_submit_text_shadow_blur_value
															, "label"		=> "Blur Effect: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Button Text Alpha Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_TXT_SHDW][alpha]"
															, "option_id"	=> "loghorn_submit_text_shadow_alpha"
															, "value"		=> $loghorn_submit_text_shadow_alpha_value
															, "label"		=> "Opacity: "
														);
			#$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
		}
		
		function loghorn_submit_bg_settings()	{
			
			// Fetch values of Button Color from options table, if present.
			$loghorn_submit_bg_colr_value  			= self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_BG_COLR']['hex'] ;
			$loghorn_submit_bg_alpha_value  		= self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_BG_COLR']['alpha'] ;
			
			$loghorn_submit_bg_hvr_colr_value  		= self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_BG_COLR_HOVR']['hex'] ;
			$loghorn_submit_bg_hvr_alpha_value  	= self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_BG_COLR_HOVR']['alpha'] ;
			
			if ( !$loghorn_submit_bg_colr_value )	{
				$loghorn_submit_bg_colr_value = LOGHORN_DEFAULT_FORM_COLR;		// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_submit_bg_alpha_value )	{
				$loghorn_submit_bg_alpha_value = 1;								// Move default value (all defaults defined in initialize-loghorn.php)
			}
			
			if ( !$loghorn_submit_bg_hvr_colr_value )	{
				$loghorn_submit_bg_hvr_colr_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_submit_bg_hvr_alpha_value )	{
				$loghorn_submit_bg_hvr_alpha_value = 1;							// Move default value (all defaults defined in initialize-loghorn.php)
			}
			
			// Display Color Picker for Button Color:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_BG_COLR][hex]"
															, "option_id"	=> "submit_bg_colr"
															, "value"		=> $loghorn_submit_bg_colr_value
															, "label"		=> "Normal:"
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display Color Picker for Submit Button Color on mouse hover:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_BG_COLR_HOVR][hex]"
															, "option_id"	=> "submit_bg_hvr"
															, "value"		=> $loghorn_submit_bg_hvr_colr_value
															, "label"		=> "On Hover:"
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			
		}
		
		
		function loghorn_submit_border_settings()	{
			
			// Fetch values of button border elements from options table, if present.
			$loghorn_submit_border_thickness_value   	= self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_BORDR']['thick'] ;
			$loghorn_submit_border_style_value   		= self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_BORDR']['style'] ;
			$loghorn_submit_border_color_value  		= self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_BORDR']['hex'] ;
			$loghorn_submit_border_alpha_value  		= self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_BORDR']['alpha'] ;
			$loghorn_submit_border_radius_value  		= self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_BORDR']['radius'] ;
			
			$loghorn_submit_border_hvr_color_value  	= self::$loghorn_options['LOGHORN_SETTINGS_SUBMIT_BORDR_HOVR']['hex'] ;
			
			// By default, no borders.
			if ( !$loghorn_submit_border_thickness_value )	{
				$loghorn_submit_border_thickness_value = 0;						// Move default value.
			}
			if ( !$loghorn_submit_border_style_value )	{
				$loghorn_submit_border_style_value = 0;							// Move default value.
			}
			if ( !$loghorn_submit_border_color_value )	{
				$loghorn_submit_border_color_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value.
			}
			if ( !$loghorn_submit_border_alpha_value )	{
				$loghorn_submit_border_alpha_value = 0;							// Move default value.
			}
			if ( !$loghorn_submit_border_radius_value )	{
				$loghorn_submit_border_radius_value = 0;						// Move default value.
			}
			
			if ( !$loghorn_submit_border_hvr_color_value )	{
				$loghorn_submit_border_hvr_color_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value.
			}
			
			// Display Color Picker for button Border:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_BORDR][hex]"
															, "option_id"	=> "submit_border"
															, "value"		=> $loghorn_submit_border_color_value
															, "label"		=> "Normal:"
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display Color Picker for button Border on mouse-hover:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_BORDR_HOVR][hex]"
															, "option_id"	=> "submit_border_hvr"
															, "value"		=> $loghorn_submit_border_hvr_color_value
															, "label"		=> "On Hover:"
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display slider for selecting button Border Thickness value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_BORDR][thick]"
															, "option_id"	=> "loghorn_submit_border_thick"
															, "value"		=> $loghorn_submit_border_thickness_value
															, "label"		=> "Thickness: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting button Border Alpha Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_BORDR][alpha]"
															, "option_id"	=> "loghorn_submit_border_alpha"
															, "value"		=> $loghorn_submit_border_alpha_value
															, "label"		=> "Opacity: "
														);
			#$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting button Border Radius Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_BORDR][radius]"
															, "option_id"	=> "loghorn_submit_border_radius"
															, "value"		=> $loghorn_submit_border_radius_value
															, "label"		=> "Corner Radius: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display listbox for selecting Border style for the button:
			global $loghorn_border_styles_global ;							// Options for border styles. Defined in initialize-loghorn.php.
			$loghorn_show_listbox_parms			=	array (	 "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_SUBMIT_BORDR][style]"
															,"option_id"	=> "loghorn_submit_border_style"
															,"label"		=> "Border Type:"
															,"value"		=> $loghorn_submit_border_style_value
														);
			$this->loghorn_show_listbox ( $loghorn_border_styles_global, $loghorn_show_listbox_parms ) ;
		}
		
		function loghorn_msg_text_settings()	{
			
			// Fetch values of message box text settings from options table, if present.
			$loghorn_msg_text_font_value   		= self::$loghorn_options['LOGHORN_SETTINGS_MSG_TXT']['font'] ;
			$loghorn_msg_text_size_value   		= self::$loghorn_options['LOGHORN_SETTINGS_MSG_TXT']['size'] ;
			$loghorn_msg_text_color_value  		= self::$loghorn_options['LOGHORN_SETTINGS_MSG_TXT']['hex'] ;
			
			// Set defaults, if not present.
			if ( !$loghorn_msg_text_font_value )	{
				$loghorn_msg_text_font_value = 0;							// Move default value.
			}
			if ( !$loghorn_msg_text_size_value )	{
				$loghorn_msg_text_size_value = 10;							// Move default value.
			}
			if ( !$loghorn_msg_text_color_value )	{
				$loghorn_msg_text_color_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value.
			}
			
			// Display Color Picker for Message Text:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_TXT][hex]"
															, "option_id"	=> "msg_text"
															, "value"		=> $loghorn_msg_text_color_value
															, "label"		=> "Normal:"
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display slider for selecting Text Font Size value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_TXT][size]"
															, "option_id"	=> "loghorn_msg_text_size"
															, "value"		=> $loghorn_msg_text_size_value
															, "label"		=> "Font Size: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display listbox for selecting Font style for the Message Box:
			global $loghorn_fonts_global ;									// Options for fonts. Defined in initialize-loghorn.php.
			$loghorn_show_listbox_parms			= array (	 "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_TXT][font]"
															,"option_id"	=> "loghorn_msg_text_font"
															,"label"		=> "Font:"
															,"value"		=> $loghorn_msg_text_font_value
														);
			$this->loghorn_show_listbox ( $loghorn_fonts_global, $loghorn_show_listbox_parms ) ;
			
		}
		
		function loghorn_msg_text_shdw_settings()	{
			
			// Fetch values of message text shadow from options table, if present.
			$loghorn_msg_text_shadow_hor_value   = self::$loghorn_options['LOGHORN_SETTINGS_MSG_TXT_SHDW']['hor'] ;
			$loghorn_msg_text_shadow_ver_value   = self::$loghorn_options['LOGHORN_SETTINGS_MSG_TXT_SHDW']['ver'] ;
			$loghorn_msg_text_shadow_blur_value  = self::$loghorn_options['LOGHORN_SETTINGS_MSG_TXT_SHDW']['blur'] ;
			$loghorn_msg_text_shadow_colr_value  = self::$loghorn_options['LOGHORN_SETTINGS_MSG_TXT_SHDW']['hex'] ;
			$loghorn_msg_text_shadow_alpha_value = self::$loghorn_options['LOGHORN_SETTINGS_MSG_TXT_SHDW']['alpha'] ;
			$loghorn_msg_text_shadow_hvr_colr_value
													= self::$loghorn_options['LOGHORN_SETTINGS_MSG_TXT_SHDW_HOVR']['hex'] ;
			// If this is the first time, settings was not present in options table.
			// By default, there would be no shadows. 
			if ( !$loghorn_msg_text_shadow_hor_value )	{
				$loghorn_msg_text_shadow_hor_value = 0;							// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_msg_text_shadow_ver_value )	{
				$loghorn_msg_text_shadow_ver_value = 0;							// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_msg_text_shadow_blur_value )	{
				$loghorn_msg_text_shadow_blur_value = 0;							// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_msg_text_shadow_colr_value )	{
				$loghorn_msg_text_shadow_colr_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_msg_text_shadow_alpha_value )	{
				$loghorn_msg_text_shadow_alpha_value = 0;						// Move default value (all defaults defined in initialize-loghorn.php)
			}
			
			// Display Color Picker for Message Box Shadow:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_TXT_SHDW][hex]"
															, "option_id"	=> "msg_text_shadow"
															, "value"		=> $loghorn_msg_text_shadow_colr_value
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display slider for selecting Horizontal Displacement value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_TXT_SHDW][hor]"
															, "option_id"	=> "loghorn_msg_text_shadow_hor"
															, "value"		=> $loghorn_msg_text_shadow_hor_value
															, "label"		=> "Horizontal Displacement: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Vertical Displacement value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_TXT_SHDW][ver]"
															, "option_id"	=> "loghorn_msg_text_shadow_ver"
															, "value"		=> $loghorn_msg_text_shadow_ver_value
															, "label"		=> "Vertical Displacement: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Blur Effect value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_TXT_SHDW][blur]"
															, "option_id"	=> "loghorn_msg_text_shadow_blur"
															, "value"		=> $loghorn_msg_text_shadow_blur_value
															, "label"		=> "Blur Effect: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Alpha Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_TXT_SHDW][alpha]"
															, "option_id"	=> "loghorn_msg_text_shadow_alpha"
															, "value"		=> $loghorn_msg_text_shadow_alpha_value
															, "label"		=> "Opacity: "
														);
			#$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
		}
		
		function loghorn_msg_bg_settings()	{
			
			// Fetch values of message background from options table, if present.
			$loghorn_msg_bg_shadow_colr_value  = self::$loghorn_options['LOGHORN_SETTINGS_MSG_BG_SHDW']['hex'] ;
			$loghorn_msg_bg_shadow_alpha_value = self::$loghorn_options['LOGHORN_SETTINGS_MSG_BG_SHDW']['alpha'] ;
			
			// If this is the first time, settings was not present in options table.
			if ( !$loghorn_msg_bg_shadow_colr_value )	{
				$loghorn_msg_bg_shadow_colr_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value (all defaults defined in initialize-loghorn.php)
			}
			if ( !$loghorn_msg_bg_shadow_alpha_value )	{
				$loghorn_msg_bg_shadow_alpha_value = 0;							// Move default value (all defaults defined in initialize-loghorn.php)
			}
			
			// Display Color Picker for Message Background:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BG_SHDW][hex]"
															, "option_id"	=> "msg_bg_shadow"
															, "value"		=> $loghorn_msg_bg_shadow_colr_value
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display slider for selecting Alpha Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BG_SHDW][alpha]"
															, "option_id"	=> "loghorn_msg_bg_shadow_alpha"
															, "value"		=> $loghorn_msg_bg_shadow_alpha_value
															, "label"		=> "Opacity: "
														);
			#$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
		}
		
		
		function loghorn_msg_border_radius_settings()	{
			
			$loghorn_msg_border_radius_value  	= self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR']['radius'] ;
			
			if ( !$loghorn_msg_border_radius_value )	{
				$loghorn_msg_border_radius_value = 0;							// Move default value.
			}
			
			// Display slider for selecting Form Border Radius Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR][radius]"
															, "option_id"	=> "loghorn_msg_border_radius"
															, "value"		=> $loghorn_msg_border_radius_value
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
		}
		
		
		function loghorn_msg_border_l_settings()	{
			
			// Fetch values of msg border elements from options table, if present.
			$loghorn_msg_border_l_thickness_value   = self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_L']['thick'] ;
			$loghorn_msg_border_l_style_value   	= self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_L']['style'] ;
			$loghorn_msg_border_l_color_value  		= self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_L']['hex'] ;
			$loghorn_msg_border_l_alpha_value  		= self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_L']['alpha'] ;
			
			// By default, no borders.
			if ( !$loghorn_msg_border_l_thickness_value )	{
				$loghorn_msg_border_l_thickness_value = 0;						// Move default value.
			}
			if ( !$loghorn_msg_border_l_style_value )	{
				$loghorn_msg_border_l_style_value = 0;							// Move default value.
			}
			if ( !$loghorn_msg_border_l_color_value )	{
				$loghorn_msg_border_l_color_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value.
			}
			if ( !$loghorn_msg_border_l_alpha_value )	{
				$loghorn_msg_border_l_alpha_value = 0;							// Move default value.
			}
			
			// Display Color Picker for Form Border:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_L][hex]"
															, "option_id"	=> "msg_border_l"
															, "value"		=> $loghorn_msg_border_l_color_value
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display slider for selecting Form Border Thickness value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_L][thick]"
															, "option_id"	=> "loghorn_msg_border_l_thick"
															, "value"		=> $loghorn_msg_border_l_thickness_value
															, "label"		=> "Thickness: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Form Border Alpha Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_L][alpha]"
															, "option_id"	=> "loghorn_msg_border_l_alpha"
															, "value"		=> $loghorn_msg_border_l_alpha_value
															, "label"		=> "Opacity: "
														);
			#$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display listbox for selecting Border style for the Form:
			global $loghorn_border_styles_global ;							// Options for border styles. Defined in initialize-loghorn.php.
			$loghorn_show_listbox_parms			=	array (	 "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_L][style]"
															,"option_id"	=> "loghorn_msg_border_l_style"
															,"label"		=> "Border Type:"
															,"value"		=> $loghorn_msg_border_l_style_value
														);
			$this->loghorn_show_listbox ( $loghorn_border_styles_global, $loghorn_show_listbox_parms ) ;
		}
		
		
		function loghorn_msg_border_t_settings()	{
			
			// Fetch values of msg border elements from options table, if present.
			$loghorn_msg_border_t_thickness_value   = self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_T']['thick'] ;
			$loghorn_msg_border_t_style_value   	= self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_T']['style'] ;
			$loghorn_msg_border_t_color_value  		= self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_T']['hex'] ;
			$loghorn_msg_border_t_alpha_value  		= self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_T']['alpha'] ;
			
			// By default, no borders.
			if ( !$loghorn_msg_border_t_thickness_value )	{
				$loghorn_msg_border_t_thickness_value = 0;						// Move default value.
			}
			if ( !$loghorn_msg_border_t_style_value )	{
				$loghorn_msg_border_t_style_value = 0;							// Move default value.
			}
			if ( !$loghorn_msg_border_t_color_value )	{
				$loghorn_msg_border_t_color_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value.
			}
			if ( !$loghorn_msg_border_t_alpha_value )	{
				$loghorn_msg_border_t_alpha_value = 0;							// Move default value.
			}
			
			// Display Color Picker for Form Border:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_T][hex]"
															, "option_id"	=> "msg_border_t"
															, "value"		=> $loghorn_msg_border_t_color_value
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display slider for selecting Form Border Thickness value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_T][thick]"
															, "option_id"	=> "loghorn_msg_border_t_thick"
															, "value"		=> $loghorn_msg_border_t_thickness_value
															, "label"		=> "Thickness: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Form Border Alpha Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_T][alpha]"
															, "option_id"	=> "loghorn_msg_border_t_alpha"
															, "value"		=> $loghorn_msg_border_t_alpha_value
															, "label"		=> "Opacity: "
														);
			#$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display listbox for selecting Border style for the Form:
			global $loghorn_border_styles_global ;							// Options for border styles. Defined in initialize-loghorn.php.
			$loghorn_show_listbox_parms			=	array (	 "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_T][style]"
															,"option_id"	=> "loghorn_msg_border_t_style"
															,"label"		=> "Border Type:"
															,"value"		=> $loghorn_msg_border_t_style_value
														);
			$this->loghorn_show_listbox ( $loghorn_border_styles_global, $loghorn_show_listbox_parms ) ;
			
		}
		
		
		function loghorn_msg_border_r_settings()	{
			
			// Fetch values of msg border elements from options table, if present.
			$loghorn_msg_border_r_thickness_value   = self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_R']['thick'] ;
			$loghorn_msg_border_r_style_value   	= self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_R']['style'] ;
			$loghorn_msg_border_r_color_value  		= self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_R']['hex'] ;
			$loghorn_msg_border_r_alpha_value  		= self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_R']['alpha'] ;
			
			// By default, no borders.
			if ( !$loghorn_msg_border_r_thickness_value )	{
				$loghorn_msg_border_r_thickness_value = 0;						// Move default value.
			}
			if ( !$loghorn_msg_border_r_style_value )	{
				$loghorn_msg_border_r_style_value = 0;							// Move default value.
			}
			if ( !$loghorn_msg_border_r_color_value )	{
				$loghorn_msg_border_r_color_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value.
			}
			if ( !$loghorn_msg_border_r_alpha_value )	{
				$loghorn_msg_border_r_alpha_value = 0;							// Move default value.
			}
			
			// Display Color Picker for Form Border:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_R][hex]"
															, "option_id"	=> "msg_border_r"
															, "value"		=> $loghorn_msg_border_r_color_value
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display slider for selecting Form Border Thickness value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_R][thick]"
															, "option_id"	=> "loghorn_msg_border_r_thick"
															, "value"		=> $loghorn_msg_border_r_thickness_value
															, "label"		=> "Thickness: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Form Border Alpha Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_R][alpha]"
															, "option_id"	=> "loghorn_msg_border_r_alpha"
															, "value"		=> $loghorn_msg_border_r_alpha_value
															, "label"		=> "Opacity: "
														);
			#$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display listbox for selecting Border style for the Form:
			global $loghorn_border_styles_global ;							// Options for border styles. Defined in initialize-loghorn.php.
			$loghorn_show_listbox_parms			=	array (	 "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_R][style]"
															,"option_id"	=> "loghorn_msg_border_r_style"
															,"label"		=> "Border Type:"
															,"value"		=> $loghorn_msg_border_r_style_value
														);
			$this->loghorn_show_listbox ( $loghorn_border_styles_global, $loghorn_show_listbox_parms ) ;
			
		}
		
		function loghorn_msg_border_b_settings()	{
			
			// Fetch values of msg border elements from options table, if present.
			$loghorn_msg_border_b_thickness_value   = self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_B']['thick'] ;
			$loghorn_msg_border_b_style_value   	= self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_B']['style'] ;
			$loghorn_msg_border_b_color_value  		= self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_B']['hex'] ;
			$loghorn_msg_border_b_alpha_value  		= self::$loghorn_options['LOGHORN_SETTINGS_MSG_BORDR_B']['alpha'] ;
			
			// By default, no borders.
			if ( !$loghorn_msg_border_b_thickness_value )	{
				$loghorn_msg_border_b_thickness_value = 0;						// Move default value.
			}
			if ( !$loghorn_msg_border_b_style_value )	{
				$loghorn_msg_border_b_style_value = 0;							// Move default value.
			}
			if ( !$loghorn_msg_border_b_color_value )	{
				$loghorn_msg_border_b_color_value = LOGHORN_DEFAULT_FORM_COLR;	// Move default value.
			}
			if ( !$loghorn_msg_border_b_alpha_value )	{
				$loghorn_msg_border_b_alpha_value = 0;							// Move default value.
			}
			
			// Display Color Picker for Form Border:
			$loghorn_color_picker_parms			= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_B][hex]"
															, "option_id"	=> "msg_border_b"
															, "value"		=> $loghorn_msg_border_b_color_value
														);
			
			$this->loghorn_color_picker( $loghorn_color_picker_parms ) ;
			
			// Display slider for selecting Form Border Thickness value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_B][thick]"
															, "option_id"	=> "loghorn_msg_border_b_thick"
															, "value"		=> $loghorn_msg_border_b_thickness_value
															, "label"		=> "Thickness: "
														);
			$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display slider for selecting Form Border Alpha Channel value:
			$loghorn_jquery_slider_parameters	= array (	  "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_B][alpha]"
															, "option_id"	=> "loghorn_msg_border_b_alpha"
															, "value"		=> $loghorn_msg_border_b_alpha_value
															, "label"		=> "Opacity: "
														);
			#$this->loghorn_jquery_slider($loghorn_jquery_slider_parameters);
			
			// Display listbox for selecting Border style for the Form:
			global $loghorn_border_styles_global ;							// Options for border styles. Defined in initialize-loghorn.php.
			$loghorn_show_listbox_parms			=	array (	 "option_name"	=> "loghorn_settings2[LOGHORN_SETTINGS_MSG_BORDR_B][style]"
															,"option_id"	=> "loghorn_msg_border_b_style"
															,"label"		=> "Border Type:"
															,"value"		=> $loghorn_msg_border_b_style_value
														);
			$this->loghorn_show_listbox ( $loghorn_border_styles_global, $loghorn_show_listbox_parms ) ;
		}
		
		function loghorn_load_custom_script( $hook ) {
			
			// Load only on ?page=mypluginname
			if( 'toplevel_page_class-log-horn-admin-menu' != $hook ) {
				return false;
			}
			
			//$current_color = get_user_option( 'admin_color' ); // This can be used to load stylesheet based on current profile color.
			
			// Wordpress media library
			wp_enqueue_media();
			
			/************************************************* Enqueue Styles **************************************************************/
			
			// WordPress Iris-based Color Picker:
			wp_enqueue_style( 'wp-color-picker' );
			// color-picker with alpha (this extends the wp-color-picker to include alpha channel:
			wp_enqueue_style( 'loghorn-cp-stylesheet' 	 , LOGHORN_ADMIN_CSS_URL.'alpha-color-picker.css', array( 'wp-color-picker' )) ;
			
			// JQuery UI CSS for slider:
			//wp_register_style('loghorn-jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
			wp_register_style('loghorn-jquery-ui', 'https://code.jquery.com/ui/1.12.1/themes/overcast/jquery-ui.css');
			wp_enqueue_style( 'loghorn-jquery-ui' );   
			
			// Font-Awesome CDN:
			wp_enqueue_style( 'loghorn-fa' , 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
			
			// Plugin Menu's stylesheet:
			wp_enqueue_style( 'loghorn-admin-stylesheet' , LOGHORN_ADMIN_CSS_URL.'loghorn-admin-css.css' ) ;
			
			
			/************************************************* Enqueue Scripts *************************************************************/
			
			// JQuery UI Core for ui-tabs and ui-slider:
			wp_enqueue_script('jquery-ui-tooltip');
			wp_enqueue_script('jquery-ui-dialog');
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-tabs');
			wp_enqueue_script('jquery-ui-slider');
			
			// color-picker with alpha (this script by BraadMartin extends the wp-color-picker to include alpha channel):
			wp_enqueue_script( 'loghorn-color-picker-alpha', LOGHORN_ADMIN_JS_URL.'alpha-color-picker.js', array( 'wp-color-picker' ), false, true );
			// loghorn js for using the Color Picker:
			wp_enqueue_script( 'loghorn-iris-cp', LOGHORN_ADMIN_JS_URL.'loghorn-admin-color-picker.js', array( 'loghorn-color-picker-alpha' ), false, true );
			
			// Plugin Menu's JavaScript:
			wp_enqueue_script( 'loghorn-admin-javascript' , LOGHORN_ADMIN_JS_URL.'loghorn-admin-js.js' ) ;
			
		}

		/*
		 * display default admin notice
		 */
		function loghorn_updated_notice() {
		
			settings_errors();
		}
		
		/*************************************************************************************************************************************/
		/**********************                        Generic methods for HTML                                *******************************/
		/*************************************************************************************************************************************/
		
		function loghorn_show_image_settings ( $loghorn_image_parameters , $loghorn_image_source)	{
			
			$loghorn_img_button_id		= $loghorn_image_parameters["option_id"]."_upload_image_button" ;
			$loghorn_img_attachment_id	= $loghorn_image_parameters["option_id"]."_image_attachment_id" ;
			$loghorn_img_division_id	= $loghorn_image_parameters["option_id"]."_div" ;
			$loghorn_img_preview_id		= $loghorn_image_parameters["option_id"]."-image-preview" ;
?>
			<div class="loghorn_custom_options">
				<input id="<?php _e( $loghorn_img_button_id ); ?>" type="button" class="button" value="<?php _e( $loghorn_image_parameters["button_text"] ); ?>" />
				<input type='hidden' name="<?php _e( $loghorn_image_parameters["option_name"] ); ?>" id="<?php _e( $loghorn_img_attachment_id ); ?>" value="<?php _e ( $loghorn_image_parameters["value"] ) ; ?>">
				<br>		
				<div id="<?php _e( $loghorn_img_division_id ); ?>" class="img1">
					<a id="bg_image_src" target="_blank" href='<?php _e ( $loghorn_image_source [0] ) ; ?>' >
						
						<img id="<?php _e( $loghorn_img_preview_id ); ?>" src="<?php _e ( $loghorn_image_source [0] ) ; ?>" width="<?php _e( $loghorn_image_parameters["width"] ); ?>" height="<?php _e( $loghorn_image_parameters["height"] ); ?>"  > 
					
					</a>
					<div class="desc"> <?php _e ( $loghorn_image_parameters["desc"] ) ; ?> </div>
				</div>
			</div>
<?php		
			$this->loghorn_tooltip_symbol("A new tooltip");
		}
		
		/*
		 * Displaying the Color Picker would be handled by wp-color-picker.
		 * Let's prepare the textbox for the browser to fall back upon, if JavaScript is disabled.
		 */
		function loghorn_color_picker( $loghorn_color_picker_parms)	{
			
			$loghorn_txtbox_id = "loghorn_".$loghorn_color_picker_parms["option_id"]."_color" ;
?>	
			<div class="loghorn_custom_options">
				<span class="loghorn_menu_label"> <?php _e ( $loghorn_color_picker_parms["label"] ) ; ?> </span>
				<input type="text" value=<?php _e ( $loghorn_color_picker_parms["value"]) ; ?> class="loghorn-color-cp" id="<?php _e ( $loghorn_txtbox_id ) ; ?> " name="<?php _e ( $loghorn_color_picker_parms["option_name"]) ; ?>" />
			</div>
<?php
			$this->loghorn_tooltip_symbol("A new tooltip");
		}
		
		/*
		 * Slider would be displayed by JQuery UI.
		 * So, let's prepare the textbox so it can fall back to that, if JavaScript is disabled on the browser.
		 */
		function loghorn_jquery_slider($loghorn_jquery_slider_parms)	{
			
			$loghorn_txtbox_id = $loghorn_jquery_slider_parms["option_id"]."_inp" ;
			$loghorn_slider_id = $loghorn_jquery_slider_parms["option_id"]."_slider" ;
			$loghorn_handle_id = $loghorn_jquery_slider_parms["option_id"]."_handle" ;
?>			
			<div class="loghorn_custom_options">
				<span class="loghorn_menu_label"> <?php _e ( $loghorn_jquery_slider_parms["label"] ) ; ?> </span>
				<input type="text" class="loghorn_slider_textbox" name="<?php _e ( $loghorn_jquery_slider_parms["option_name"] ) ; ?>" id="<?php _e ( $loghorn_txtbox_id ) ; ?>" value="<?php _e ( $loghorn_jquery_slider_parms["value"] ) ; ?>">
				<div id="<?php _e ( $loghorn_slider_id ) ; ?>" class="ui-slider">
					<div id="<?php _e ( $loghorn_handle_id ) ; ?>" class="ui-slider-handle" ></div>
				</div>
			</div>
<?php	
			$this->loghorn_tooltip_symbol("A new tooltip");
		}
		
		function loghorn_show_listbox( $loghorn_listbox_options, $loghorn_listbox_parms )	{
			
			$loghorn_textbox_id		= $loghorn_listbox_parms["option_id"]."_textbox" ;
			$loghorn_listbox_id		= $loghorn_listbox_parms["option_id"]."_listbox" ;
			$loghorn_onchange_fn	= $loghorn_listbox_parms["option_id"]."_onchange()" ;
?>			
			<div class="loghorn_custom_options">
			<div class="loghorn_list">
				<form action="#">
					<span class="loghorn_menu_label"> <?php _e ( $loghorn_listbox_parms["label"] ) ; ?> </span>
					<select class="loghorn_list_select" id="<?php _e ( $loghorn_listbox_id ) ; ?>" name="<?php _e ( $loghorn_listbox_id ) ; ?>" onchange="<?php _e ( $loghorn_onchange_fn ) ; ?>">
<?php
					foreach ( $loghorn_listbox_options as $loghorn_listbox_key => $a_loghorn_listbox ) {
						$loghorn_listbox_name = $a_loghorn_listbox;
						if ( $loghorn_listbox_key == $loghorn_listbox_parms["value"] )	{
							$selected = " selected='selected'";
						}
						else	{
							$selected = '';
						}
						$loghorn_listbox_name = esc_attr($loghorn_listbox_name);
						$loghorn_listbox_key = esc_attr($loghorn_listbox_key);
						_e ( "<option value=\"$loghorn_listbox_key\" $selected>$loghorn_listbox_name</option>" ) ;
					}
?>
					</select>
				</form>
				<input type="text" class="loghorn_list_selected_textbox" id="<?php _e( $loghorn_textbox_id ) ; ?>" name="<?php _e( $loghorn_listbox_parms["option_name"] ) ; ?>" value="<?php _e( $loghorn_listbox_parms["value"] ) ; ?>" >
			</div>
			</div>
<?php
			$this->loghorn_tooltip_symbol("A new tooltip");
		}
		
		function loghorn_tooltip_symbol( $loghorn_tooltip )	{
			
?>
			<div class="helptool">
					<i class="fa fa-question-circle fa-lg" aria-hidden="true" title="<?php _e ( $loghorn_tooltip ) ; ?>"></i>
			</div>
			
<?php		
		}
			
		
		function loghorn_underline()	{
?>
		<div class="loghorn_underline"></div>
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