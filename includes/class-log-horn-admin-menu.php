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
				add_action( 'network_admin_menu', 	array ( $this , 'loghorn_menu' ) ) ;
			}
			else	{
				add_action( 'admin_menu', 			array ( $this , 'loghorn_menu' ) ) ;
			}
			add_action( 'admin_init', 				array ( $this , 'loghorn_plugin_settings' ) );
			
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
								'dashicons-welcome-view-site'				// icon (used WordPress dashicons)
						);
			}
		}
		
		function loghorn_plugin_options ()	{

			if ( !current_user_can( 'manage_options' ) )  {
				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
			}
			
			wp_enqueue_style( 'wpb-fa' , 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
			
			_e ( '<div class="wrap">' ) ; ?>
			
			
			<h2>Log Horn Options</h2>
			<form method="post" action=<?php echo '"'.get_site_url().'/wp-admin/options.php"' ;  ?> >
			<?php settings_fields( 'loghorn_settings_group' ); ?>
			<?php do_settings_sections( 'loghorn_settings_sections' ); ?>
			<table class="form-table">
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
			<?php $current_color = get_user_option( 'admin_color' ); // Debug info
				$loghorn_lg = "drake" ;	// Debug info
				echo $current_color."<br>".$loghorn_lg ; // Debug info ?> 
			<style type="text/css" >
						#loghorn_logo_browse_button ,
						#loghorn_bg_browse_button	{
							background-color: #4682b4 ;			/* steelblue */
							color: #303030 ;
							padding: 10px ;
						}
						#loghorn_logo_browse_button:hover ,
						#loghorn_bg_browse_button:hover	{
							background-color: #4682d4 ;			
							color: #000 ;						/* black */
							border: 2px solid rgba(0,0,0,0) ;	/* invisible border */
							
						}
						#loghorn_logo_browse_button:active ,
						#loghorn_bg_browse_button:active	{
							background-color: #4682b4;			/* steelblue */
							color: #000;
							border: 2px solid rgba(0,0,0,0);	/* invisible border */
							transition-duration: 0.2s;
						}
						#loghorn_logo_filename ,
						#loghorn_bg_filename	{
							background-color: #b0c4de ;			/* lightsteelblue */
							color: #000000;						/* steelblue */
							width: 300px;
							padding: 10px ; 
						}
						#loghorn_logo_filename:focus ,
						#loghorn_bg_filename:focus	{
							border-left: 4px solid #4682b4;		/* steelblue */
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
			
			#register_setting( 'loghorn_settings_group', 'loghorn_custom_logo' );
			#register_setting( 'loghorn_settings_group', 'loghorn_custom_background' ); 
			register_setting( 'loghorn_settings_group' , 'loghorn_settings2' , 'loghorn_validate_input' ); 
			
			add_settings_section('loghorn_images', 'Image Settings', array ( $this, 'loghorn_image_settings' ), 'loghorn_settings_sections');
				add_settings_field('loghorn_logo_filename', 'Logo File', array ( $this, 'loghorn_show_logo_settings' ), 'loghorn_settings_sections', 'loghorn_images');
				add_settings_field('loghorn_bg_filename', 'Background', array ( $this, 'loghorn_show_bg_settings' ), 'loghorn_settings_sections', 'loghorn_images');
		}
		
		
		function loghorn_validate_input()	{
			
			 
		}
		
		function loghorn_image_settings (){
			
		}
		
		function loghorn_show_logo_settings ()	{
			
?>
			<input type="file" id="loghorn_logo_browse" name="loghorn_logo_fileupload" style="display: none" onChange="HandleLogochange();"/>
			<input type="text" id="loghorn_logo_filename" name="loghorn_settings2[LOGHORN_SETTINGS_LOGO]" value="<?php echo self::$loghorn_settings['LOGHORN_SETTINGS_LOGO'] ; ?>" readonly="true" placeholder="Logo Filename" />
			<a id="loghorn_logo_browse_button" class="btn btn-primary" onclick="HandleLogoBrowseClick();">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			</a>
				
<?php
		}
		
		function loghorn_show_bg_settings ()	{
?>		
			<input type="file" id="loghorn_bg_browse" name="loghorn_bg_fileupload" style="display: none" onChange="HandleBGchange();"/>
			<input type="text" id="loghorn_bg_filename" name="loghorn_settings2[LOGHORN_SETTINGS_BG]" value="<?php echo self::$loghorn_settings['LOGHORN_SETTINGS_BG']; ?>" readonly="true" placeholder="Background Filename" />
			<a id="loghorn_bg_browse_button" class="btn btn-primary" onclick="HandleBGBrowseClick();">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			</a>
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