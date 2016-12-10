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
		
		private static $loghorn_custom_logo ;		// stores the name of the logo file.
		
		/**
		 * Constructor: All initializations occur here.
		 */
		function Log_Horn_Admin_Menu () 	{
			
			/**
			 * Latch on to action hooks here.
			 */
			if ( is_multisite() ) {		
				add_action( 'network_admin_menu', 	array ( $this , 'loghorn_menu' ) ) ;
			}
			else	{
				add_action( 'admin_menu', 			array ( $this , 'loghorn_menu' ) ) ;
			}
			add_action( 'admin_init', 				array ( $this , 'loghorn_plugin_settings' ) );
			
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
								'dashicons-welcome-view-site'							// icon (used WordPress dashicons)
						);
			}
		}
		
		function loghorn_plugin_options ()	{

			if ( !current_user_can( 'manage_options' ) )  {
				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
			}
			
			wp_enqueue_style( 'wpb-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
			_e ( '<div class="wrap">' ) ; ?>
			
			
			<h2>Log Horn Options</h2>
			<form method="post" action="options.php">
			<?php settings_fields( 'loghorn-settings-group' ); ?>
			<?php do_settings_sections( 'loghorn-settings-group' ); ?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Logo File</th>
					<td>
					<input type="file" id="loghorn_logo_browse" name="loghorn_logo_fileupload" style="display: none" onChange="HandleLogochange();"/>
					<input type="text" id="loghorn_logo_filename" name="loghorn_custom_logo" value="<?php echo esc_attr( get_option('loghorn_custom_logo') ); ?>" placeholder="Logo Filename" />
					<input type="button" value="..." id="loghorn_logo_browse_button" onclick="HandleLogoBrowseClick();"/>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row">Background File</th>
					<td>
					<input type="file" id="loghorn_bg_browse" name="loghorn_bg_fileupload" style="display: none" onChange="HandleBGchange();"/>
					<input type="text" id="loghorn_bg_filename" name="loghorn_custom_background" value="<?php echo esc_attr( get_option('loghorn_custom_background') ); ?>" placeholder="Background Filename" />
					<input type="button" value="..." id="loghorn_bg_browse_button" onclick="HandleBGBrowseClick();"/>
					</td>
				</tr>
			</table>
    
			<?php submit_button(); ?>
			</form>
			
			<script language="JavaScript" type="text/javascript">
					/** Template
					function HandleBrowseClick()	{
							var fileinput = document.getElementById("browse");
							fileinput.click();
					}
					function Handlechange()	{
							var fileinput = document.getElementById("browse");
							var textinput = document.getElementById("filename");
							textinput.value = fileinput.value;
					}*/
					function HandleLogoBrowseClick()	{
							var logofileinput = document.getElementById("loghorn_logo_browse");
							logofileinput.click();
					}
					function HandleLogochange()	{
							var logofileinput = document.getElementById("loghorn_logo_browse");
							var logotextinput = document.getElementById("loghorn_logo_filename");
							logotextinput.value = logofileinput.value;
					}
					function HandleBGBrowseClick()	{
							var bgfileinput = document.getElementById("loghorn_bg_browse");
							bgfileinput.click();
					}
					function HandleBGchange()	{
							var bgfileinput = document.getElementById("loghorn_bg_browse");
							var bgtextinput = document.getElementById("loghorn_bg_filename");
							bgtextinput.value = bgfileinput.value;
					}

			</script>
			<?php $current_color = get_user_option( 'admin_color' ); 
				echo $current_color ;?>
			<style type="text/css" >
						/** 
						 * user logo goes here:
						 */
						#loghorn_logo_browse_button	{
							background-color:lightgreen;
							color: #fff;
							-webkit-border-radius: 5px;
							border: 2px solid green;
							opacity: 0.9 ; 
						}
						#loghorn_bg_browse_button	{
							background-color:lightblue ;
							color: #fff;
							-webkit-border-radius: 5px;
							border: 2px solid blue;
						}
						#loghorn_logo_filename	{
							background-color:#f0f099 !important;
							color: #000;
							width: 300px;
							-webkit-border-radius: 5px;
							border: 2px solid #000000;
						}
						#loghorn_bg_filename	{
							background-color:#f0f099 !important;
							color: #000;
							width: 300px;
							-webkit-border-radius: 5px;
							border: 2px solid #000000;
						}
			</style>
			<!-- Template
			<input type="file" id="browse" name="fileupload" style="display: none" onChange="Handlechange();"/>
			<input type="text" id="filename" readonly="true"/>
			<input type="button" value="Browse Logo" id="fakeBrowse" onclick="HandleBrowseClick();"/>
			-->
			
			<?php echo '</div>';
		}
		
		function loghorn_plugin_settings()	{
			
			/*register_setting( 'loghorn-settings-group', 'loghorn_custom_logo' );
			register_setting( 'loghorn-settings-group', 'loghorn_custom_background' ); */
			register_setting( 'loghorn-settings-group', 'loghorn_settings' );
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