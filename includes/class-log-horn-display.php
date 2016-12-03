<?php

/**
 * Class Name: Log_Horn_Display
 * This is the main class responsible for the display of the customized login page.
 */
 
/**
 * First things, first! 
 * Apply standard check - do not call this plugin from anywhere except the WordPress installation!
 */ 
defined( 'ABSPATH' ) or die ;
   
/**
 *	Start by checking if the class Log_Horn_Display is already defined somewhere else.
 *	Plugin will not provide any functionality and quit silently, if the class 'Log_Horn_Display' is defined elsewhere.
 */	

if  ( ! class_exists ( 'Log_Horn_Display' )  )  : 
  
	class Log_Horn_Display	{
		
		/**
		 * Naming standard: All member and method names used in the plugin begin with the prefix '$loghorn_' 
		 */
		
		private static 	$loghorn_settings ;			// stores the plugin settings.
		
		private $loghorn_OS , 						// stores info whether the Operating System is 'Windows' or 'NonWindows'.
				$loghorn_dir_separator ;			// stores the Directory Separator - backslash for 'Windows', forward-slash for 'NonWindows'.
		
		
		/**
		 * Constructor: All initializations occur here.
		 */
		function Log_Horn_Display () 	{
			
			$this->loghorn_detect_OS () ;			// Kept for future use.
			
			$this->loghorn_get_settings();			// Fetch settings from wp_options table.
			
			/**
			 * Latch on to action hooks here.
			 */
			add_action ( 'login_enqueue_scripts', array (  $this,'loghorn_login_scripts' )  ) ;
		}
		
		
		/**
		 * Get the settings from the options table.
		 */
		function loghorn_get_settings()	{
			
			self::$loghorn_settings = 
			#explode (";" , get_option('loghorn_settings') ) 
			// Debug info
			explode (";" , 
					"0;Bull_GraphicMama_team_80x80.png;sunrise.jpg;320;80% 0 0;auto;55:255:255:0.5;0:0:10:2:lightblue;2:solid:15:158:217:1"
					//;                               ;           ;   ;       ;    ;              ;                  ;                    ;
					)	// Debug info
			;
		}
		
		
		/**
		 * Detect if the OS is Windows based or Non-Windows based platform:
		 */
		function loghorn_detect_OS () 	{
			
			if  ( strtoupper ( substr ( PHP_OS , 0 , 3 )  )  === 'WIN' )  {
				$this->loghorn_OS='Windows' ;		$this->loghorn_dir_separator='\\' ;
			} else {
				$this->loghorn_OS='NonWindows' ;	$this->loghorn_dir_separator='/' ;
			}
			/* Note:	$loghorn_dir_separator is not used in the program. Instead, the constant DIRECTORY_SEPARATOR is used.
			 *			The function 'loghorn_detect_OS (  ) ' and the variables '$loghorn_OS' and '$loghorn_dir_separator' are only placeholders 
			 *			These variables/function could be used in future versions.
			 */
		}
		
		
		/** 
		 * This function hooks into WP using the 'login_enqueue_scripts' tag in order to manipulate the WordPress logo through CSS scripts:
		 */
		function loghorn_login_scripts () 	{
	
			$loghorn_css 		= $this->loghorn_get_css ( ) ;	// static predefined CSS stylesheets. 
			?>
			
			<!-- Check if user had opted for a Static CSS stylesheet: -->
			<?php if ($loghorn_css) ?>
			<link rel='stylesheet' type='text/css' href=<?php echo "'$loghorn_css'"; ?> >
			
			<!-- If there isn't any static CSS stylesheet selected, fetch and use the user defined values: -->
			<?php if (!$loghorn_css) {	
			
					$loghorn_logo_file 		= $this->loghorn_get_login_logo 	(  ) ;	// name of the image file to be used as the logo.
					$loghorn_bg_file 		= $this->loghorn_get_login_bg   	(  ) ;	// name of the image file to be used as the background.
					$loghorn_form_wd 		= $this->loghorn_get_form_wd		(  ) ;	// form width in pixels.
					$loghorn_form_pad 		= $this->loghorn_get_form_padding	(  ) ;	// form padding.
					$loghorn_form_mrgn 		= $this->loghorn_get_form_margin	(  ) ;	// form margin.
					$loghorn_form_bg_colr 	= $this->loghorn_get_form_bg_colr	(  ) ;	// form background color.
					$loghorn_form_shdw		= $this->loghorn_get_form_shadow	(  ) ;	// form box shadow.
					$loghorn_form_bordr		= $this->loghorn_get_form_border	(  ) ;	// form border design.
					echo $loghorn_form_bordr ; // Debug info
					
			
			?>
					<!-- Dyanamic CSS stylesheets: -->
					<style type="text/css" >
						/** 
						 * user logo goes here:
						 */
						#login h1 a, 
						.login h1 a{
							background-image: url(<?php echo esc_url(LOGHORN_IMAGES_URL.$loghorn_logo_file) ; ?>);
							padding-bottom: 30px;
						}
						/** 
						 * background image goes here:
						*/ 
						body.login {
							background-image: url(<?php echo esc_url(LOGHORN_IMAGES_URL.$loghorn_bg_file) ; ?>) ;
							background-repeat: no-repeat;
							background-attachment: fixed;
							background-position: center;
						} 
						/** 
						 * login form goes here:
						*/
						#login {
							width: <?php echo $loghorn_form_wd ; ?> !important ;
							padding: <?php echo $loghorn_form_pad ; ?> ;
							margin: <?php echo $loghorn_form_mrgn ; ?>;
						}
						/*
						 * the main login form:
						 */
						#loginform { 
							background-color: rgba( <?php echo $loghorn_form_bg_colr ; ?> ) ;
							box-shadow: <?php echo $loghorn_form_shdw ; ?> ;
							border: <?php echo $loghorn_form_bordr ; ?> ;
							-webkit-border-radius: 15px;
						}
						/*
						 * login form label (username, password, and remember me labels): 
						 */
						#loginform label{ 
							font: 16px "showcard gothic"; 
							color: blue;
						}
					</style>
			
			<?php 
			}
		}
		
		/**
		 * Get the URL of the CSS library.
		 */
		function loghorn_get_css ( $loghorn_default_script = 'loghorn_enqueue_script - gnu' ) 	{
			
			$loghorn_current_script_number	=	self::$loghorn_settings [ LOGHORN_SETTINGS_CSS_THEME ] ;
			
			switch ( $loghorn_current_script_number )	{
				
				case '0':
						$loghorn_current_script	=	NULL ;
						break ;
				case '1':	
						$loghorn_current_script	=	LOGHORN_CSS_URL.'loghorn_enqueue_script - gnu'.'.css' ;
						break;
				case '2':	
						$loghorn_current_script	=	LOGHORN_CSS_URL.'loghorn_enqueue_script - sunrise'.'.css' ;
						break;
				default:	
						$loghorn_current_script = 	$loghorn_default_script ;
			}
			
			return $loghorn_current_script ;	
		}
	
		/**
		 * Get the name of the image that would replace the WordPress Login logo. 
		 * This should be present in the plugin's images directory.
		 */
		function loghorn_get_login_logo ( $loghorn_default_logo = LOGHORN_DEFAULT_LOGO_IMAGE ) 	{
			
			// Check if the options table returned a valid filename: 
			if  ( isset  ( self::$loghorn_settings[LOGHORN_SETTINGS_LOGO] ) && self::$loghorn_settings[LOGHORN_SETTINGS_LOGO] )
				// options table returned a valid name. Now, check if the file exists under the /images directory:
				if  ( file_exists ( LOGHORN_IMAGES_DIRNAME.self::$loghorn_settings[LOGHORN_SETTINGS_LOGO] )  ) 
					return self::$loghorn_settings[LOGHORN_SETTINGS_LOGO];
			
			// We didn't get a valid filename from the database. Either the user did not set it, or the file no longer exists.
			// Let's check the default filenames.
			if  ( file_exists ( LOGHORN_IMAGES_DIRNAME.$loghorn_default_logo )  ) 
				return $loghorn_default_logo ;	// Return the default supplied by the user during function call.
			else 
				return false ;	// Return false.
		}
		
		/**
		 * Get the name of the image that would be set as background during login. 
		 * This should be present in the plugin's images directory.
		 */
		function loghorn_get_login_bg ($loghorn_default_bg = LOGHORN_DEFAULT_BG_IMAGE ) 	{
			
			// Check if the options table returned a valid filename: 
			if  ( isset  ( self::$loghorn_settings[LOGHORN_SETTINGS_BG] ) && self::$loghorn_settings[LOGHORN_SETTINGS_BG] )
				// options table returned a valid name. Now, check if the file exists under the /images directory:
				if  ( file_exists ( LOGHORN_IMAGES_DIRNAME.self::$loghorn_settings[LOGHORN_SETTINGS_BG] )  ) 
					return self::$loghorn_settings[LOGHORN_SETTINGS_BG] ;
			
			// We are here because we didn't get a valid filename from the database. 
			// Either the user did not set it, or the file no longer exists.
			// Let's check if the default filenames are present.
			if  ( file_exists ( LOGHORN_IMAGES_DIRNAME.$loghorn_default_bg )  ) 
				return $loghorn_default_bg ;	// Return the default supplied by the user during function call.
			else 
				return false ;	// Return the default image supplied by the plugin.
		}

		/**
		 * Get the width of the login form. 
		 */
		function loghorn_get_form_wd ( $loghorn_default_form_width = LOGHORN_DEFAULT_FORM_WD )	{
			
			$loghorn_form_width	=	self::$loghorn_settings [ LOGHORN_SETTINGS_FORM_WIDTH ] ;	// Width set by the user
			
			if ( $loghorn_form_width < LOGHORN_MIN_FORM_WD)
				// This is an extra check to ensure that the form cannot be smaller than the Min. value set by this plugin.
				return $loghorn_default_form_width;
			else
				return $loghorn_form_width.'px' ;
		}
		
		/**
		 * Get the padding for the login form. 
		 */
		function loghorn_get_form_padding ( $loghorn_default_form_padding = LOGHORN_DEFAULT_PADDING )	{
			
			$loghorn_form_padding = self::$loghorn_settings [ LOGHORN_SETTINGS_FORM_PAD ] ;	// Padding value set by the user
			
			if ( $loghorn_form_padding )
				return $loghorn_form_padding ;
			else
				return $loghorn_default_form_padding ;
		}
		
		/*
		 * Get the margins for the login form. 
		 */
		function loghorn_get_form_margin ( $loghorn_default_form_mrgn = LOGHORN_DEFAULT_FORM_MRGN )	{
			
			return self::$loghorn_settings [ LOGHORN_SETTINGS_FORM_MRGN ] ;	// Margin value set by the user
		}
		
		/*
		 * Get the rgba values for the login form background. 
		 */
		function loghorn_get_form_bg_colr ( $loghorn_default_form_colr = LOGHORN_DEFAULT_FORM_COLR )	{
			
			// The settings for form background is stored in 'red:green:blue:alpha' format. Let's explode it to get the values:
			$loghorn_form_colr_rgb_settings	=	explode ( ":", self::$loghorn_settings [ LOGHORN_SETTINGS_FORM_COLOR ] ) ;
			
			// Here is each element:
			$loghorn_r_hue	=	( int ) $loghorn_form_colr_rgb_settings [ 0 ] ;
			$loghorn_g_hue	=	( int ) $loghorn_form_colr_rgb_settings [ 1 ] ;
			$loghorn_b_hue	=	( int ) $loghorn_form_colr_rgb_settings [ 2 ] ;
			$loghorn_a_val	=	$loghorn_form_colr_rgb_settings [ 3 ] ;
			
			// Cross check to verify if each color element is a valid integer and alpha value is a numeric one:
			if ( is_int ($loghorn_r_hue) && is_int ($loghorn_g_hue) && is_int ($loghorn_b_hue) && is_numeric ($loghorn_a_val) )
				// Good! Now check if they are within valid range:
				if ( $loghorn_r_hue > 255 || $loghorn_g_hue > 255 || $loghorn_b_hue > 255 || 
					 $loghorn_r_hue < 0   || $loghorn_g_hue < 0   || $loghorn_b_hue < 0   || 
					 $loghorn_a_val < 0.0 || $loghorn_a_val > 1.0 )
					// Oops, not a valid value! Return the default rgba value as set by the function default parameter.
					$loghorn_form_colr = $loghorn_default_form_colr ;
				else
					// OK! We have valid integers (r,g,b) and numeric alpha values that are within the permissible range.
					// Let's now contrsuct the return value based on these:
					$loghorn_form_colr = "$loghorn_r_hue , $loghorn_g_hue , $loghorn_b_hue , $loghorn_a_val" ;
			else
				// Not integer RGB or a numeric alpha value! Return the default rgba value.
				$loghorn_form_colr = $loghorn_default_form_colr ;
			
			return $loghorn_form_colr ;
		}
		
		/*
		 * Get the box shadow parameter for the login form.
		 */
		function loghorn_get_form_shadow ( $loghorn_default_form_shadow = LOGHORN_DEFAULT_FORM_SHDW )	{
			
			// The settings for form shadow is stored in 'h-shadow:v-shadow:blur:spread:color' format. 
			// An exception to above format is if 'none' is set. In this case, it is the only value present in the settings.
			// Let's explode it to get the values:
			$loghorn_form_shadow = explode (":" , self::$loghorn_settings [ LOGHORN_SETTINGS_FORM_SHDW ] ) ;
			
			if ( "none" == $loghorn_form_shadow [ 0 ] )
				// No shadows please!
				return $loghorn_default_form_shadow ;
			
			// Let's get the values:
			$loghorn_h_shadow	=	$loghorn_form_shadow [ 0 ]."px" ;
			$loghorn_v_shadow	=	$loghorn_form_shadow [ 1 ]."px" ;
			$loghorn_blur		=	$loghorn_form_shadow [ 2 ]."px" ;
			$loghorn_spread		=	$loghorn_form_shadow [ 3 ]."px" ;
			$loghorn_color		=	$loghorn_form_shadow [ 4 ] ;
			
			return "$loghorn_h_shadow $loghorn_v_shadow $loghorn_blur $loghorn_spread $loghorn_color" ;
		}
		
		/*
		 * Get the border settings for the login form.
		 */
		function loghorn_get_form_border ( $loghorn_default_form_border = LOGHORN_DEFAULT_FORM_BORDR )	{
			
			// The settings for form border is stored in the format 'WIDTH:BORDER-STYLE:Red:Green:Blue:Alpha'.
			// An exception to above format is if 'none' is set. In this case, it is the only value present in the settings.
			// Let's explode it to get the values:
			$loghorn_form_border = explode (":" , self::$loghorn_settings [ LOGHORN_SETTINGS_FORM_BORDR ] ) ;
			
			if ( "none" == $loghorn_form_border [ 0 ] )
				// No borders here!
				return $loghorn_default_form_border ;
			
			// Let's get the values:
			$loghorn_border_width	=	$loghorn_form_border [ 0 ]."px" ;
			$loghorn_border_style	=	$loghorn_form_border [ 1 ] ;
			$loghorn_border_r_hue	=	$loghorn_form_border [ 2 ] ;
			$loghorn_border_g_hue	=	$loghorn_form_border [ 3 ] ;
			$loghorn_border_b_hue	=	$loghorn_form_border [ 4 ] ;
			$loghorn_border_a_val	=	$loghorn_form_border [ 5 ] ;
			
			return "$loghorn_border_width $loghorn_border_style rgba( $loghorn_border_r_hue , $loghorn_border_g_hue , $loghorn_border_b_hue , $loghorn_border_a_val )";
		}
	} //class Log_Horn_Display ends here.
	
	
	/**
	 * Instantiate an object of the class Log_Horn_Display to call the class constructor.
	 */
	function start_log_horn () 	{
		$start_plugin_log_horn = new Log_Horn_Display;
	}
	
	// Go ahead and trigger the plugin:
	start_log_horn () ;
	
endif; 	// End of the 'if  ( class_exists ) ' block. 
		// There is no 'else' defined - the plugin will quit quietly if the class is already defined elsewhere.
  
?>