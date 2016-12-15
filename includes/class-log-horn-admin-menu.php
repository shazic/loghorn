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
			
			add_settings_section('loghorn_images', 'Image Settings', 			array ( $this, 'loghorn_image_settings' ), 'loghorn_settings_sections');
				add_settings_field('loghorn_logo_filename', 'Logo File', 			array ( $this, 'loghorn_show_logo_settings' ), 'loghorn_settings_sections', 'loghorn_images');
				add_settings_field('loghorn_bg_filename', 'Background', 			array ( $this, 'loghorn_show_bg_settings' ), 'loghorn_settings_sections', 'loghorn_images');
			
			add_settings_section('loghorn_form', 'Login Form Settings', 		array ( $this, 'loghorn_form_settings' ), 'loghorn_settings_sections');
				add_settings_field('loghorn_form_width', 'Form Width', 				array ( $this, 'loghorn_form_width_settings' ), 'loghorn_settings_sections', 'loghorn_form');
				add_settings_field('loghorn_form_color', 'Form Background Color', 	array ( $this, 'loghorn_form_color_settings' ), 'loghorn_settings_sections', 'loghorn_form');
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
?>
			<input type="range" min="0" max="10" id="loghorn_form_slider_width" name="loghorn_settings2[LOGHORN_SETTINGS_FORM_WIDTH]" value="<?php _e ( self::$loghorn_options['LOGHORN_SETTINGS_FORM_WIDTH'] ) ; ?>" step="1" onchange="showValueFormWidth(this.value)" />
			<span class="loghorn_menu_label"> <?php _e ( 'Form Width: ' ) ; ?> </span>
			<span class="loghorn_span" id="loghorn_form_slider_width_span"><?php _e ( self::$loghorn_options['LOGHORN_SETTINGS_FORM_WIDTH'] ) ; ?></span>	
			<br>
		
<?php		
		}
		
		function loghorn_form_color_settings ()	{
			
?>
			<input type="text" value=<?php _e ( self::$loghorn_options['LOGHORN_SETTINGS_FORM_COLOR']['hex'] ) ; ?> class="loghorn-color-cp" id="loghorn_form_color" name="loghorn_settings2[LOGHORN_SETTINGS_FORM_COLOR][hex]" />
			<br>
			
			<input type="range" min="0" max="100" id="loghorn_form_slider_alpha" name="loghorn_settings2[LOGHORN_SETTINGS_FORM_COLOR][alpha]" value="<?php _e ( self::$loghorn_options['LOGHORN_SETTINGS_FORM_COLOR']['alpha'] ) ; ?>" step="1" onchange="showValueFormAlpha(this.value)" />
			<span class="loghorn_menu_label"> <?php _e ( 'Alpha Channel: ' ) ; ?> </span>
			<span class="loghorn_span" id="loghorn_form_slider_alpha_span"><?php _e ( self::$loghorn_options['LOGHORN_SETTINGS_FORM_COLOR']['alpha']."%" ) ; ?></span>	

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
			
			// Font-Awesome CDN:
			wp_enqueue_style( 'loghorn-fa' , 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
			
			// Plugin Menu's stylesheet:
			wp_enqueue_style( 'loghorn-admin-stylesheet' , LOGHORN_ADMIN_CSS_URL.'loghorn-admin-css.css' ) ;
			
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