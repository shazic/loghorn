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
		
		private static $loghorn_settings ;		// stores the plugin settings.
		
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
			self::$loghorn_settings = get_option ( 'loghorn_settings2' ) ;
			
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
			
			<h2>Log Horn Options</h2>
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
			
			add_settings_section('loghorn_images', 'Image Settings', array ( $this, 'loghorn_image_settings' ), 'loghorn_settings_sections');
				add_settings_field('loghorn_logo_filename', 'Logo File', array ( $this, 'loghorn_show_logo_settings' ), 'loghorn_settings_sections', 'loghorn_images');
				add_settings_field('loghorn_bg_filename', 'Background', array ( $this, 'loghorn_show_bg_settings' ), 'loghorn_settings_sections', 'loghorn_images');
			
			add_settings_section('loghorn_form', 'Login Form Settings', array ( $this, 'loghorn_form_settings' ), 'loghorn_settings_sections');
				add_settings_field('loghorn_form_color', 'Form Background Color', array ( $this, 'loghorn_form_color_settings' ), 'loghorn_settings_sections', 'loghorn_form');
		}
		
		
		function loghorn_validate_input()	{
			
			 
		}
		
		function loghorn_image_settings (){
			
		}
		
		function loghorn_form_settings (){
			
		}
		
		function loghorn_show_logo_settings ()	{
			
?>
			<!--input type="file" id="loghorn_logo_browse" name="loghorn_logo_fileupload" style="display: none" onChange="HandleLogochange();"/>
			<input type="text" id="loghorn_logo_filename" name="loghorn_settings2[LOGHORN_SETTINGS_LOGO]" value="<?php _e ( self::$loghorn_settings['LOGHORN_SETTINGS_LOGO'] ) ; ?>" readonly="true" placeholder="Logo Filename" />
			<a id="loghorn_logo_browse_button" class="btn btn-primary" onclick="HandleLogoBrowseClick();">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			</a -->

			<!-- This is a test -->
			<input id="upload_image_button" type="button" class="button" value="<?php _e( 'Upload image' ); ?>" />
			<input type='hidden' name="loghorn_settings2[LOGHORN_SETTINGS_LOGO]" id='image_attachment_id' value="<?php _e ( self::$loghorn_settings['LOGHORN_SETTINGS_LOGO'] ) ; ?>">
			<div class='image-preview-wrapper'>
				<img id='image-preview' src="<?php _e ( self::$loghorn_settings['LOGHORN_SETTINGS_LOGO'] ) ; ?>" width='100' height='100' style='max-height: 100px; width: 100px;'>
			</div>
			<!-- The above code is a test -->
				
<?php
		}
		
		function loghorn_show_bg_settings ()	{
?>		
			<input type="file" id="loghorn_bg_browse" name="loghorn_bg_fileupload" style="display: none" onChange="HandleBGchange();"/>
			<input type="text" id="loghorn_bg_filename" name="loghorn_settings2[LOGHORN_SETTINGS_BG]" value="<?php _e ( self::$loghorn_settings['LOGHORN_SETTINGS_BG'] ) ; ?>" readonly="true" placeholder="Background Filename" />
			<a id="loghorn_bg_browse_button" class="btn btn-primary" onclick="HandleBGBrowseClick();">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			</a>
<?php		
		}
		
		function loghorn_form_color_settings ()	{
			
?>
			<input type="range" min="0" max="255" id="loghorn_form_slider_red" name="loghorn_settings2[LOGHORN_SETTINGS_FORM_COLOR][red]" value="<?php _e ( self::$loghorn_settings['LOGHORN_SETTINGS_FORM_COLOR']['red'] ) ; ?>" step="1" onchange="showValueFormRed(this.value)" />
			<span class="loghorn_color_label">Red: </span>
			<span class="loghorn_span" id="loghorn_form_slider_red_span"><?php _e ( self::$loghorn_settings['LOGHORN_SETTINGS_FORM_COLOR']['red'] ) ; ?></span>	
			<br>
			<input type="range" min="0" max="255" id="loghorn_form_slider_green" name="loghorn_settings2[LOGHORN_SETTINGS_FORM_COLOR][green]" value="<?php _e ( self::$loghorn_settings['LOGHORN_SETTINGS_FORM_COLOR']['green'] ) ; ?>" step="1" onchange="showValueFormGreen(this.value)" />
			<span class="loghorn_color_label">Green: </span>
			<span class="loghorn_span" id="loghorn_form_slider_green_span"><?php _e ( self::$loghorn_settings['LOGHORN_SETTINGS_FORM_COLOR']['green'] ) ; ?></span>	
			<br>
			<input type="range" min="0" max="255" id="loghorn_form_slider_blue" name="loghorn_settings2[LOGHORN_SETTINGS_FORM_COLOR][blue]" value="<?php _e ( self::$loghorn_settings['LOGHORN_SETTINGS_FORM_COLOR']['blue'] ) ; ?>" step="1" onchange="showValueFormBlue(this.value)" />
			<span class="loghorn_color_label">Blue: </span>
			<span class="loghorn_span" id="loghorn_form_slider_blue_span"><?php _e ( self::$loghorn_settings['LOGHORN_SETTINGS_FORM_COLOR']['blue'] ) ; ?></span>	
			<br>
			<input type="range" min="0" max="100" id="loghorn_form_slider_alpha" name="loghorn_settings2[LOGHORN_SETTINGS_FORM_COLOR][alpha]" value="<?php _e ( self::$loghorn_settings['LOGHORN_SETTINGS_FORM_COLOR']['alpha'] ) ; ?>" step="1" onchange="showValueFormAlpha(this.value)" />
			<span class="loghorn_color_label">Alpha Channel: </span>
			<span class="loghorn_span" id="loghorn_form_slider_alpha_span"><?php _e ( self::$loghorn_settings['LOGHORN_SETTINGS_FORM_COLOR']['alpha']."%" ) ; ?></span>	

<?php
		}
		
		function loghorn_load_custom_script( $hook ) {
			
			// Load only on ?page=mypluginname
			if( 'toplevel_page_class-log-horn-admin-menu' != $hook ) {
                return;
			}
			
			$current_color = get_user_option( 'admin_color' ); // This can be used to load stylesheet based on current profile color.
			
			wp_enqueue_media(); // this is a test
			
			// Font-Awesome CDN:
			wp_enqueue_style( 'loghorn-fa' , 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
			
			// Plugin Menu's stylesheet:
			wp_enqueue_style( 'loghorn-admin-stylesheet' , LOGHORN_ADMIN_CSS_URL.'loghorn-admin-css.css' ) ;
			
			// Plugin Menu's JavaScript:
			wp_enqueue_script( 'loghorn-admin-javascript' , LOGHORN_ADMIN_JS_URL.'loghorn-admin-js.js' ) ;
			
		}

		/*
		 * display default admin notice
		 */
		function loghorn_updated_notice() {
		
			settings_errors();
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