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

class Log_Horn_Display	{
		
		/**
		 * Naming standard: All member and method names used in the plugin begin with the prefix '$loghorn_' 
		 */
		
		private static 	$loghorn_settings ;			// stores the plugin settings.
		
		/**
		 * Constructor: All initializations occur here.
		 */
		function Log_Horn_Display ( ) 	{
			
			$this->loghorn_add_settings( );			// Fetch settings from wp_options table.
			
			$loghorn_settings = self::$loghorn_settings ;		
			
			/**
			 * Latch on to action hooks here.
			 */
			if ( $loghorn_settings )	{																// if the settings are present,
				if ( $loghorn_settings['LOGHORN_SETTINGS_GENERAL']['option'] )	{						// and the settings are enabled by user,
					add_action ( 'login_enqueue_scripts', array (  $this,'loghorn_login_scripts' ) ) ;	// then latch on to the hook.
				}
			}
		}
		
		
		/**
		 * Get the settings from the options table.
		 */
		function loghorn_add_settings( )	{
			
			self::$loghorn_settings = 
			get_option("loghorn_settings2");
			//explode (";" , get_option('loghorn_settings') ) 
			/* Debug info
			explode (";" , 
					"0;Bull_GraphicMama_team_80x80.png;cowboys.jpg;320;80% 0 0;auto;55:025:025:0.5;0:0:10:2:orange;2:solid:255:165:00:1;15;16:showcard gothic;255:165:000:1;10;16:courier new;0:0:200:1;200:200:200:0.45;1:solid:255:165:000:1;16;16;05;130;255:255:255:1;1:1:2:010:010:010:1;255:165:000:1;none;1;1:solid:13:158:217:1;04;020:020:020:1;1:1:2:200:000:000:1;013:160:210:1;none;01;1:solid:13:158:217:1;04;255:255:255:1;1:1:2:200:000:000:1;013:160:210:1;none;01;1:solid:13:158:217:1;04;0000;255:155:000:0.85;255:255:050:1"
					//;                1              ;      2    ; 3 ;   4   ; 5  ;      6       ;        7      ;         8          ; 9;    10            ;    11       ;12;      13      ;   14    ;      15        ;       16            ;17;18;19; 20;     21      ;         22        ;      23     ; 24 ; ;        26          ;27;    28       ;         29        ;     30      ; 31 ;32;       33           ;34;     35      ;       36          ;     37      ; 38 ;39;       40           ;41; 42 ;      43        ;     44      ;
					)	// Debug info */
			;
		}
		
		/** 
		 * This function hooks into WP using the 'login_enqueue_scripts' tag in order to manipulate the WordPress logo through CSS scripts:
		 */
		function loghorn_login_scripts () 	{
	
			$loghorn_css 		= $this->loghorn_get_css ( ) ;	// static predefined CSS stylesheets. 
			
			// Check if user had opted for a Static CSS stylesheet: -->
			if ( $loghorn_css )	{
?>
				<link rel='stylesheet' type='text/css' href=<?php echo "'$loghorn_css'"; ?> >
			
<?php 		
			}
			if ( ! $loghorn_css ) {	
				  // If there isn't any static CSS stylesheet selected, fetch and use the user defined values: -->
					// Logo
					$loghorn_disable_logo		= $this->loghorn_get_logo_option   		(  ) ;	// Logo to be disabled?
					$loghorn_logo_file 			= $this->loghorn_get_login_logo 		(  ) ;	// URL of the image file to be used as the logo.
					// Background
					$loghorn_bg_use_img			= $this->loghorn_get_bg_option   		(  ) ;	// Background Option.
					$loghorn_bg_color			= $this->loghorn_get_bg_color   		(  ) ;	// Background Color.
					$loghorn_bg_file 			= $this->loghorn_get_login_bg   		(  ) ;	// URL of the image file to be used as the background.
					// Login Form
					$loghorn_form_wd 			= $this->loghorn_get_form_wd			(  ) ;	// form width in pixels.
					$loghorn_form_pad 			= $this->loghorn_get_form_padding		(  ) ;	// form padding.
					$loghorn_form_mrgn 			= $this->loghorn_get_form_margin		(  ) ;	// form margin.
					$loghorn_form_bg_colr 		= $this->loghorn_get_form_bg_colr		(  ) ;	// form background color.
					$loghorn_form_shdw			= $this->loghorn_get_form_shadow		(  ) ;	// form box shadow.
					$loghorn_form_bordr			= $this->loghorn_get_form_border		(  ) ;	// form border design.
					$loghorn_form_bordr_rad		= $this->loghorn_get_form_radius		(  ) ;	// form border radius.
					$loghorn_form_lbl_font		= $this->loghorn_get_form_label			(  ) ;	// form label - font and font size.
					$loghorn_form_lbl_colr		= $this->loghorn_get_form_color			(  ) ;	// form label - color.
					// Text/Check boxes in the Login Form
					$loghorn_input_radius		= $this->loghorn_get_input_radius		(  ) ;  // text box corner radius.
					$loghorn_input_font			= $this->loghorn_get_input_font			(  ) ;	// text box font size and family.
					$loghorn_input_font_colr	= $this->loghorn_get_input_font_color	(  ) ;	// text box font color.
					$loghorn_input_bg_colr		= $this->loghorn_get_input_bg_color		(  ) ;	// text box background color.
					$loghorn_input_border		= $this->loghorn_get_input_border		(  ) ;	// text box border thickness, style and color.
					$loghorn_cb_width			= $this->loghorn_get_cb_width			(  ) ;  // 'Remember Me' check box width.
					$loghorn_cb_height			= $this->loghorn_get_cb_height			(  ) ;  // 'Remember Me' check box height.
					$loghorn_cb_radius			= $this->loghorn_get_cb_radius			(  ) ;  // 'Remember Me' check box corner radius.
					// 'Log In' Submit Button
					$loghorn_butn_wd			= $this->loghorn_get_button_width		( LOGHORN_NORMAL_STATE ) ;  // 'Log In' button width.
					$loghorn_butn_text_colr		= $this->loghorn_get_button_text_color	( LOGHORN_NORMAL_STATE ) ;	// 'Log In' button text color.
					$loghorn_butn_text_shdw		= $this->loghorn_get_button_text_shadow	( LOGHORN_NORMAL_STATE ) ;	// 'Log In' button text shadow.
					$loghorn_butn_bg_colr		= $this->loghorn_get_button_bg_color	( LOGHORN_NORMAL_STATE ) ;	// 'Log In' button background color.
					//$loghorn_butn_bg_img		= $this->loghorn_get_button_bg_image	( LOGHORN_NORMAL_STATE ) ;	// 'Log In' button background image. Not supported in the current version.
					//$loghorn_butn_opacity		= $this->loghorn_get_button_opacity		( LOGHORN_NORMAL_STATE ) ;	// 'Log In' button opacity. Not used currently, since loghorn_butn_bg_colr provides this through rgba.
					$loghorn_butn_bordr			= $this->loghorn_get_button_border		( LOGHORN_NORMAL_STATE ) ;  // 'Log In' button border.
					$loghorn_butn_radius		= $this->loghorn_get_button_radius		( LOGHORN_NORMAL_STATE ) ;  // 'Log In' button corner radius.
					// 'Log In' Submit Button: On Hover 
					$loghorn_butn_text_colr_h	= $this->loghorn_get_button_text_color	( LOGHORN_ON_HOVER ) ;	// 'Log In' button text color: On Hover.
					$loghorn_butn_text_shdw_h	= $this->loghorn_get_button_text_shadow	( LOGHORN_ON_HOVER ) ;	// 'Log In' button text shadow: On Hover.
					$loghorn_butn_bg_colr_h		= $this->loghorn_get_button_bg_color	( LOGHORN_ON_HOVER ) ;	// 'Log In' button background color: On Hover.
					//$loghorn_butn_bg_img_h	= $this->loghorn_get_button_bg_image	( LOGHORN_ON_HOVER ) ;	// 'Log In' button background image. Not supported in the current version.
					//$loghorn_butn_opacity_h	= $this->loghorn_get_button_opacity		( LOGHORN_ON_HOVER ) ;	// 'Log In' button opacity. Not used currently, since loghorn_butn_bg_colr provides this through rgba.
					$loghorn_butn_bordr_h		= $this->loghorn_get_button_border		( LOGHORN_ON_HOVER ) ;  // 'Log In' button border: On Hover.
					$loghorn_butn_radius_h		= $this->loghorn_get_button_radius		( LOGHORN_ON_HOVER ) ;  // 'Log In' button corner radius: On Hover.
					// 'Log In' Submit Button: On Active 
					$loghorn_butn_text_colr_a	= $this->loghorn_get_button_text_color	( LOGHORN_ON_ACTIVE ) ;	// 'Log In' button text color: On Active.
					$loghorn_butn_text_shdw_a	= $this->loghorn_get_button_text_shadow	( LOGHORN_ON_ACTIVE ) ;	// 'Log In' button text shadow: On Active.
					$loghorn_butn_bg_colr_a		= $this->loghorn_get_button_bg_color	( LOGHORN_ON_ACTIVE ) ;	// 'Log In' button background color: On Active.
					//$loghorn_butn_bg_img_a	= $this->loghorn_get_button_bg_image	( LOGHORN_ON_ACTIVE ) ;	// 'Log In' button background image. Not supported in the current version.
					//$loghorn_butn_opacity_a	= $this->loghorn_get_button_opacity		( LOGHORN_ON_ACTIVE ) ;	// 'Log In' button opacity. Not used currently, since loghorn_butn_bg_colr provides this through rgba.
					$loghorn_butn_bordr_a		= $this->loghorn_get_button_border		( LOGHORN_ON_ACTIVE ) ;  // 'Log In' button border: On Active.
					$loghorn_butn_radius_a		= $this->loghorn_get_button_radius		( LOGHORN_ON_ACTIVE ) ;  // 'Log In' button corner radius: On Active.
					// Message Box:
					$loghorn_msg_bg_colr		= $this->loghorn_get_msg_bg_color		(  ) ;  // Messages Background Color.
					$loghorn_msg_lbl_colr		= $this->loghorn_get_msg_lbl_color		(  ) ;  // Messages text Color.
					$loghorn_user_css_only		= $this->loghorn_get_user_css_option	(  ) ;	// Apply only Custom User CSS?
					$loghorn_user_css			= $this->loghorn_get_user_css			(  ) ;	// Custom User CSS.
					
?>
					<style type="text/css" >
<?php						
						// Custom CSS:
						if ( null != $loghorn_user_css )	{
							_e ( $loghorn_user_css );
						}
						if ( $loghorn_user_css_only )	{
?>							
					</style>							
<?php
							return;
						}
?>
						/** 
						 * user logo goes here:
						 */
<?php 					if ( !$loghorn_disable_logo )	{
?>
						#login h1 a, 
						.login h1 a{
							background-image: url(<?php _e ( esc_url( $loghorn_logo_file ) ) ; ?>);
							padding-bottom: 30px;
						}
<?php 					}
						else	{
?>
						#login h1 a, 
						.login h1 a{
							background-image: none;
							padding-bottom: 30px;
						}
<?php 					}						
?>
						/** 
						 * background image goes here:
						*/ 
						body.login {
<?php 					if ( $loghorn_bg_use_img )	{
?>
							background-image: url(<?php _e ( esc_url( $loghorn_bg_file ) ) ; ?>) ;
<?php 					}
						else	{
?>
							background-color: <?php _e ( $loghorn_bg_color ) ; ?> ;
<?php 					}						
?>
							background-repeat: no-repeat;
							background-attachment: fixed;
							background-position: center;
							background-size: cover;
						} 
						/** 
						 * login form dimensions go here:
						*/
						#login {
							width: <?php _e ( $loghorn_form_wd ) ; ?> !important ;
							padding: <?php _e ( $loghorn_form_pad ) ; ?> ;
							margin: <?php _e ( $loghorn_form_mrgn ) ; ?>;
						}
						/*
						 * the main login form design:
						 */
						#loginform { 
							background-color: <?php _e ( $loghorn_form_bg_colr ) ; ?> ;
							box-shadow: <?php _e ( $loghorn_form_shdw ) ; ?> ;
							border: <?php _e ( $loghorn_form_bordr ) ; ?> ;
							-webkit-border-radius: <?php _e ( $loghorn_form_bordr_rad ) ; ?> ;
						}
						/*
						 * login form label (username, password, and remember me labels): 
						 */
						#loginform label{ 
							font: <?php _e ( $loghorn_form_lbl_font ) ; ?> ;
							color: <?php _e ( $loghorn_form_lbl_colr ) ; ?> ;
						}
						/*
						 * Username and Password text-box: 
						 */			
						.login input[type="text"] ,
						.login input[type="password"]	{
							-webkit-border-radius: <?php _e ( $loghorn_input_radius ) ; ?> ; 
						}
						/*
						 * Login text-box: username and password
						 */
						#user_login ,
						#user_pass	{
						/** These values will override the one above since it is more specific */
							font: <?php _e ( $loghorn_input_font ) ; ?> ;
						}
						/*
						 * Input fields: common attributes 
						 */
						#user_login ,
						#user_pass ,
						#rememberme	{
							color: <?php _e ( $loghorn_input_font_colr ) ; ?> ;
							background-color: <?php _e ( $loghorn_input_bg_colr ) ; ?>  ; 
							border: <?php _e ( $loghorn_input_border ) ; ?> ; 
						}
						/*
						 * Login check-box: Remember Me 
						 */
						#rememberme {
							width: <?php _e ( $loghorn_cb_width ) ; ?> ; 
							height: <?php _e ( $loghorn_cb_height ) ; ?> ; 
							/* -webkit-border-radius: <?php _e ( $loghorn_cb_radius ) ; ?> ; */
							border-top-left-radius: <?php _e ( $loghorn_cb_radius ) ; ?> ; 
							border-bottom-left-radius: <?php _e ( $loghorn_cb_radius ) ; ?> ; 
							border-top-right-radius: <?php _e ( $loghorn_cb_radius ) ; ?> ; 
							border-bottom-right-radius: <?php _e ( $loghorn_cb_radius ) ; ?> ;  
						}
						/*
						 * Primary button:
						 */
						.login .button-primary {
							width: <?php _e ( $loghorn_butn_wd ) ; ?> ; 
							float: right !important;
							color: <?php _e ( $loghorn_butn_text_colr ) ; ?> !important ;
							background-color: <?php _e ( $loghorn_butn_bg_colr ) ; ?> !important;
							text-shadow: <?php _e ( $loghorn_butn_text_shdw ) ; ?> !important ;
							/* background-image: <?php _e ( $loghorn_butn_bg_img ) ; ?> ; */
							/* opacity: <?php _e ( $loghorn_butn_opacity ) ; ?> ; */
							border: <?php _e ( $loghorn_butn_bordr ) ; ?> !important; 
							-webkit-border-radius: <?php _e ( $loghorn_butn_radius ) ; ?> !important; 
						}
						/*
						 * Primary button: on-hover action
						 */
						.login .button-primary:hover {
							color: <?php _e ( $loghorn_butn_text_colr_h ) ; ?> !important ;
							background-color:<?php _e ( $loghorn_butn_bg_colr_h ) ; ?> !important;
							text-shadow: <?php _e ( $loghorn_butn_text_shdw_h ) ; ?> !important ;
							/* background-image: <?php _e ( $loghorn_butn_bg_img_h ) ; ?> ; */
							/* opacity: <?php _e ( $loghorn_butn_opacity_h ) ; ?> ; */
							-webkit-border-radius: <?php _e ( $loghorn_butn_radius_h ) ; ?> !important; 
							border: <?php _e ( $loghorn_butn_bordr_h ) ; ?> !important; 
						}
						/*
						 * Primary button: on-active action
						 */
						.login .button-primary:active {
							color: <?php _e ( $loghorn_butn_text_colr_a ) ; ?> !important ;
							background-color:<?php _e ( $loghorn_butn_bg_colr_a ) ; ?> !important;
							text-shadow: <?php _e ( $loghorn_butn_text_shdw_a ) ; ?> !important ;
							/* background-image: <?php _e ( $loghorn_butn_bg_img_a ) ; ?> ; */
							/* opacity: <?php _e ( $loghorn_butn_opacity_a ) ; ?> ; */
							-webkit-border-radius: <?php _e ( $loghorn_butn_radius_a ) ; ?> !important; 
							border: <?php _e ( $loghorn_butn_bordr_a ) ; ?> !important; 
						}
						/*
						 * The forgot password form that asks for username
						 */
						#lostpasswordform	{ 
							background: <?php _e ( $loghorn_form_bg_colr ) ; ?> !important;
							box-shadow: <?php _e ( $loghorn_form_shdw ) ; ?> ;
							border: <?php _e ( $loghorn_form_bordr ) ; ?> ;
							-webkit-border-radius: <?php _e ( $loghorn_form_bordr_rad ) ; ?> ;
						}
						/*
						 * The label style for the forgot password form 
						 */
						#lostpasswordform label{ 
							font: <?php _e ( $loghorn_form_lbl_font ) ; ?> ;
							color: <?php _e ( $loghorn_form_lbl_colr ) ; ?> ;
						}
						/*
						 * The Errors and messages
						 */
						.login .message,
						.login #login_error	{
							background-color: <?php _e ( $loghorn_msg_bg_colr ) ; ?> !important;
							color: <?php _e ( $loghorn_msg_lbl_colr ) ; ?> ;;
							text-shadow: none;
							/*border-radius: 0px;
							border-left: none !important;
							border-right: none;
							border-top: none;*/
							border-bottom: 5px solid #00a0d2;
						}
						/*
						 * The Error messages
						 */
						.login #login_error {
							border-left: none !important;
							border-right: none;
							border-top: none;
							border-bottom: 5px solid #dc3232 ;
						}
					</style>
			
<?php 
			}
		}
		
		/**
		 * Get the URL of the CSS library.
		 */
		function loghorn_get_css ( $loghorn_default_script = 'loghorn_enqueue_script - gnu' ) 	{
			
			$loghorn_current_script_number	=	0;
			//self::$loghorn_settings [ 'LOGHORN_SETTINGS_CSS_THEME' ] ;
			
			switch ( $loghorn_current_script_number )	{
				
				case '0':
						// no login theme was selected.
						$loghorn_current_script	=	NULL ;	
						break ;
				case '1':	
						// Login Theme 1
						$loghorn_current_script	=	LOGHORN_CSS_URL.'loghorn_enqueue_script - gnu'.'.css' ;
						break;
				case '2':	
						// Login Theme 2
						$loghorn_current_script	=	LOGHORN_CSS_URL.'loghorn_enqueue_script - sunrise'.'.css' ;
						break;
				case '3':	
						// Login Theme 2
						$loghorn_current_script	=	LOGHORN_CSS_URL.'loghorn_enqueue_script - forest'.'.css' ;
						break;
				default:	
						// Either the values were not set, or invalid. Let's display our default theme!
						$loghorn_current_script = 	LOGHORN_CSS_URL.$loghorn_default_script.'.css' ;	
			}
			
			return $loghorn_current_script ;	
		}
	
		/*
		 * Do we need to disable the logo? Get the option selected by user.
		 */
		function loghorn_get_logo_option()	{
			return self::$loghorn_settings ['LOGHORN_SETTINGS_LOGO']['disable']	;
		}
		/**
		 * Get the name of the image that would replace the WordPress Login logo. 
		 */
		function loghorn_get_login_logo ( $loghorn_default_logo = LOGHORN_DEFAULT_LOGO_IMAGE ) 	{
			
			return $this->loghorn_get_image ( 'LOGHORN_SETTINGS_LOGO' , $loghorn_default_logo ) ;
		}
		
		/*
		 *
		 */
		function loghorn_get_bg_option ( $loghorn_default_bg_option = "Yes" )	{
			return self::$loghorn_settings [ 'LOGHORN_SETTINGS_BG' ][ 'option' ] ;
		}
		
		/*
		 *
		 */
		function loghorn_get_bg_color ()	{
			return $this->loghorn_rgba_settings ( 'LOGHORN_SETTINGS_BG_COLOR' , $loghorn_default_form_colr ) ;
		}
		
		/**
		 * Get the name of the image that would be set as background during login. 
		 */
		function loghorn_get_login_bg ( $loghorn_default_bg = LOGHORN_DEFAULT_BG_IMAGE ) 	{
			
			return $this->loghorn_get_image ( 'LOGHORN_SETTINGS_BG' , $loghorn_default_bg ) ;
		}

		/**
		 * Get the width of the login form. 
		 */
		function loghorn_get_form_wd ( $loghorn_default_form_width = LOGHORN_DEFAULT_FORM_WD )	{
			
			$loghorn_form_width	= self::$loghorn_settings [ 'LOGHORN_SETTINGS_FORM_WIDTH' ] ;	// Width set by the user
			
			if ( $loghorn_form_width < LOGHORN_MIN_FORM_WD )
				// This is an extra check to ensure that the form cannot be smaller than the Min. value set by this plugin.
				return $loghorn_default_form_width;
			else
				return $loghorn_form_width.'px' ;
		}
		
		/**
		 * Get the padding for the login form. 
		 */
		function loghorn_get_form_padding ( $loghorn_default_form_padding = LOGHORN_DEFAULT_PADDING )	{
			
			$loghorn_form_padding = self::$loghorn_settings [ 'LOGHORN_SETTINGS_FORM_PAD' ] ;	// Padding value set by the user
			
			if ( $loghorn_form_padding )
				return $loghorn_form_padding ;
			else
				return $loghorn_default_form_padding ;
		}
		
		/*
		 * Get the margins for the login form. 
		 */
		function loghorn_get_form_margin ( $loghorn_default_form_mrgn = LOGHORN_DEFAULT_FORM_MRGN )	{
			
			return self::$loghorn_settings [ 'LOGHORN_SETTINGS_FORM_MRGN' ] ;	// Margin value set by the user
		}
		
		/*
		 * Get the rgba values for the login form background. 
		 */
		function loghorn_get_form_bg_colr ( $loghorn_default_form_colr = LOGHORN_DEFAULT_FORM_COLR )	{
			
			return $this->loghorn_rgba_settings ( 'LOGHORN_SETTINGS_FORM_COLOR' , $loghorn_default_form_colr ) ;
		}
		
		/*
		 * Get the box shadow parameter for the login form.
		 */
		function loghorn_get_form_shadow ( $loghorn_default_form_shadow = LOGHORN_DEFAULT_FORM_SHDW )	{
			
			return $this->loghorn_get_box_shadow ( 'LOGHORN_SETTINGS_FORM_SHDW' , $loghorn_default_form_shadow ) ;
		}
		
		/*
		 * Get the border settings for the login form.
		 */
		function loghorn_get_form_border ( $loghorn_default_form_border = LOGHORN_DEFAULT_FORM_BORDR )	{
			
			return $this->loghorn_get_border ( 'LOGHORN_SETTINGS_FORM_BORDR' , $loghorn_default_form_border ) ;
		}
		
		/*
		 * Get the size of the form's edge radius.
		 */
		function loghorn_get_form_radius ( $loghorn_default_form_border_radius = LOGHORN_DEFAULT_FORM_BORDR_RADIUS )	{
			
			$loghorn_form_border_radius = self::$loghorn_settings ['LOGHORN_SETTINGS_FORM_BORDR'] ['radius']."px" ;
			return $loghorn_form_border_radius ;
		}
		
		/*
		 * Get the Font and font-size of the labels on the login form.
		 */
		function loghorn_get_form_label ( $loghorn_default_form_lbl_font = LOGHORN_DEFAULT_FORM_FONT )	{
			
			return $this->loghorn_get_font_size_and_family ( 'LOGHORN_SETTINGS_FORM_LBL' , $loghorn_default_form_lbl_font ) ;
		}
		
		/*
		 * Get the Font color for the labels on the login form.
		 */
		function loghorn_get_form_color ( $loghorn_default_form_label_colr = LOGHORN_DEFAULT_FORM_FONT_COLR ) {
			
			return $this->loghorn_rgba_settings ( 'LOGHORN_SETTINGS_FORM_LBL' , $loghorn_default_form_label_colr ) ;
		}
		
		/*
		 * Get the edge radius of the input text fields (username and password fields).
		 */
		function loghorn_get_input_radius ( $loghorn_default_input_font = 0 )	{
			
			return self::$loghorn_settings [ 'LOGHORN_SETTINGS_INP_BORDR' ] ['radius']."px" ;
		}
		/*
		 * Get the Font and font-size of the input text fields (username and password fields).
		 */
		function loghorn_get_input_font ( $loghorn_default_input_font = LOGHORN_DEFAULT_FORM_FONT )	{
			
			return $this->loghorn_get_font_size_and_family ( 'LOGHORN_SETTINGS_INP_FONT' , $loghorn_default_input_font ) ;
		}
		
		/*
		 * Get the Font color for the input text fields (username and password fields).
		 */
		function loghorn_get_input_font_color ( $loghorn_default_input_font_color = LOGHORN_DEFAULT_FORM_FONT_COLR )	{
			
			return $this->loghorn_rgba_settings ( 'LOGHORN_SETTINGS_INP_FONT' , $loghorn_default_input_font_color ) ;
		}
		
		/*
		 * Get the Background color for the input text fields (username and password fields).
		 */
		function loghorn_get_input_bg_color ( $loghorn_default_input_bg_color = LOGHORN_DEFAULT_FORM_COLR )	{
			
			return $this->loghorn_rgba_settings ( 'LOGHORN_SETTINGS_INP_BG' , $loghorn_default_input_bg_color ) ;
		}
		
		/*
		 * Get the Border Thickness, style and color settings for the input text fields (username and password fields).
		 */
		function loghorn_get_input_border ( $loghorn_default_input_border = LOGHORN_DEFAULT_FORM_BORDR )	{
			
			return $this->loghorn_get_border ( 'LOGHORN_SETTINGS_INP_BORDR' , $loghorn_default_input_border ) ;
		}
		
		/*
		 * Get the width of the check box 'Remember Me' field.
		 */
		function loghorn_get_cb_width ( $loghorn_default_cb_width = LOGHORN_DEFAULT_CB_WIDTH )	{
			
			return self::$loghorn_settings [ 'LOGHORN_SETTINGS_CB' ]['width']."px" ;
		}
		
		/*
		 * Get the width of the check box 'Remember Me' field.
		 */
		function loghorn_get_cb_height ( $loghorn_default_cb_height = LOGHORN_DEFAULT_CB_HEIGHT )	{
			
			return self::$loghorn_settings [ 'LOGHORN_SETTINGS_CB' ]['height']."px" ;
		}
		
		/*
		 * Get the edge radius of the check box 'Remember Me' field.
		 */
		function loghorn_get_cb_radius ( $loghorn_default_cb_radius = 0 )	{
			
			return self::$loghorn_settings [ 'LOGHORN_SETTINGS_CB' ]['radius']."px" ;
		}
		
		/*
		 * Get 'Log In' submit button width.
		 */
		function loghorn_get_button_width ( $loghorn_default_button_width = LOGHORN_DEFAULT_BUTTON_WIDTH )	{
			
			return self::$loghorn_settings [ 'LOGHORN_SETTINGS_SUBMIT_WIDTH' ]."px" ;
		}
		 
		/*
		 * Get 'Log In' submit button text color.
		 */
		function loghorn_get_button_text_color ( $loghorn_state , $loghorn_default_button_text_color = LOGHORN_DEFAULT_BUTTON_TXT_COLR )	{
			
			switch ( $loghorn_state )	{
					case LOGHORN_NORMAL_STATE :
						return $this->loghorn_rgba_settings ( 'LOGHORN_SETTINGS_SUBMIT_TXT'  , $loghorn_default_button_text_color ) ;
						break ;
					case LOGHORN_ON_HOVER :
						return $this->loghorn_rgba_settings ( 'LOGHORN_SETTINGS_SUBMIT_TXT_HVR' , $loghorn_default_button_text_color ) ;
						break ;
					case LOGHORN_ON_ACTIVE :
						return $this->loghorn_rgba_settings ( 'LOGHORN_SETTINGS_SUBMIT_COLR_ACTV' , $loghorn_default_button_text_color ) ;
						break ;
					default :
						return $loghorn_default_button_text_color ;
			}
		}
		
		/*
		 * Get 'Log In' submit button text shadow effects.
		 */
		function loghorn_get_button_text_shadow ( $loghorn_state , $loghorn_default_button_text_shdw = LOGHORN_DEFAULT_BUTTON_TXT_SHDW )	{
			
			switch ( $loghorn_state )	{
					case LOGHORN_NORMAL_STATE :
						return $this->loghorn_get_txt_shadow ( 'LOGHORN_SETTINGS_SUBMIT_TXT_SHDW'      , $loghorn_default_button_text_shdw ) ;
						break ;
					case LOGHORN_ON_HOVER :
						return $this->loghorn_get_txt_shadow ( 'LOGHORN_SETTINGS_SUBMIT_TXT_SHDW_HOVR' , 'LOGHORN_SETTINGS_SUBMIT_TXT_SHDW' ) ;
						break ;
					case LOGHORN_ON_ACTIVE :
						return $this->loghorn_get_txt_shadow ( 'LOGHORN_SETTINGS_SUBMIT_TXT_SHDW_ACTV' , 'LOGHORN_SETTINGS_SUBMIT_TXT_SHDW' ) ;
						break ;
					default :
						return $loghorn_default_button_text_shdw ;
			}
		} 
		
		/*
		 * Get 'Log In' submit button background color.
		 */
		function loghorn_get_button_bg_color ( $loghorn_state , $loghorn_default_button_color = LOGHORN_DEFAULT_BUTTON_BG_COLR )	{
			
			switch ( $loghorn_state )	{
					case LOGHORN_NORMAL_STATE :
						return $this->loghorn_rgba_settings ( 'LOGHORN_SETTINGS_SUBMIT_BG_COLR'     , $loghorn_default_button_color ) ;
						break ;
					case LOGHORN_ON_HOVER :
						return $this->loghorn_rgba_settings ( 'LOGHORN_SETTINGS_SUBMIT_BG_COLR_HOVR' , $loghorn_default_button_color ) ;
						break ;
					case LOGHORN_ON_ACTIVE :
						return $this->loghorn_rgba_settings ( 'LOGHORN_SETTINGS_SUBMIT_BG_COLR_ACTV' , $loghorn_default_button_color ) ;
						break ;
					default :
						return $loghorn_default_button_color ;
			}
		}
		
		/*
		 * Get 'Log In' submit button border thickness, style and color.
		 */
		function loghorn_get_button_border ( $loghorn_state , $loghorn_default_button_border = LOGHORN_DEFAULT_BUTTON_BORDR )	{
			
			switch ( $loghorn_state )	{
					case LOGHORN_NORMAL_STATE :
						return $this->loghorn_get_border ( 'LOGHORN_SETTINGS_SUBMIT_BORDR' , $loghorn_default_button_border ) ;
						break ;
					case LOGHORN_ON_HOVER :
						return $this->loghorn_get_border ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_HOVR' , 'LOGHORN_SETTINGS_SUBMIT_BORDR' ) ;
						break ;
					case LOGHORN_ON_ACTIVE :
						return $this->loghorn_get_border ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_ACTV' , 'LOGHORN_SETTINGS_SUBMIT_BORDR' ) ;
						break ;
					default :
						return $loghorn_default_button_border ;
			}
		}
		
		/*
		 * Get 'Log In' submit button corner radius.
		 */
		function loghorn_get_button_radius ( $loghorn_state , $loghorn_default_button_radius = 0 )	{
			
			return self::$loghorn_settings [ 'LOGHORN_SETTINGS_SUBMIT_BORDR' ]['radius']."px" ;
		}
		
		/*
		 * Get Messages Background Color .
		 */
		function loghorn_get_msg_bg_color ( $loghorn_default_msg_bg_color = LOGHORN_DEFAULT_FORM_COLR )	{
			
			return $this->loghorn_rgba_settings ( 'LOGHORN_SETTINGS_MSG_BG' , $loghorn_default_msg_bg_color ) ;
		}
		
		/*
		 * Get Messages Text Color .
		 */
		function loghorn_get_msg_lbl_color ( $loghorn_default_msg_txt_color = LOGHORN_DEFAULT_FORM_FONT_COLR )	{
			
			return $this->loghorn_rgba_settings ( 'LOGHORN_SETTINGS_MSG_TXT' , $loghorn_default_msg_txt_color ) ;
		}
		
		/*
		 * Get User option to check if only Custom CSS needs to be applied.
		 */
		function loghorn_get_user_css_option()	{
			
			if ( isset( self::$loghorn_settings [ 'LOGHORN_SETTINGS_CUSTOM_CSS' ]['option'] ) )	{
				return self::$loghorn_settings [ 'LOGHORN_SETTINGS_CUSTOM_CSS' ]['option'] ;
			}
			else	{
				return false;
			}
		}
		
		/*
		 * Get User defined CSS .
		 */
		function loghorn_get_user_css ( )	{
			
			if ( isset( self::$loghorn_settings [ 'LOGHORN_SETTINGS_CUSTOM_CSS' ]['textarea'] ) )	{
				return self::$loghorn_settings [ 'LOGHORN_SETTINGS_CUSTOM_CSS' ]['textarea'] ;
			}
			else	{
				return null;
			}
		}
		/*************************************************************************************************************************************/
		/**********************                        GENERIC UTILITY METHODS                                 *******************************/
		/*************************************************************************************************************************************/
		/*
		 * Get an image URL.
		 */
		function loghorn_get_image ( $loghorn_settings_constant , $loghorn_default_img )	{
			
			// Check if the options table returned a valid file id: 
			if  ( isset  ( self::$loghorn_settings [ $loghorn_settings_constant ] ) && self::$loghorn_settings [ $loghorn_settings_constant ] )
				// options table returned a valid name. Now, fetch the source url:
				$loghorn_image_src = wp_get_attachment_image_src(self::$loghorn_settings [ $loghorn_settings_constant ]['image'], 'original' ) ;  
			
			if  ( $loghorn_image_src ) 
				return $loghorn_image_src[0] ;	// Return the url.
			else 
				return false ;	// Return 'false'.
		}
		
		/*
		 * Get the Font and font-size.
		 */
		function loghorn_get_font_size_and_family ( $loghorn_settings_constant , $loghorn_default_font )	{
			
			global $loghorn_fonts_global;	// fonts defined in initialize-loghorn.php
			
			$loghorn_font = self::$loghorn_settings [ $loghorn_settings_constant ] ;
			
			$loghorn_font_size		= ( int ) $loghorn_font ['size'] ;
			$loghorn_font_family	= $loghorn_fonts_global [ $loghorn_font ['font'] ] ;
			
			// Check if the font size is a numeric integer greater than zero:
			if ( is_int ( $loghorn_font_size ) && 0 < $loghorn_font_size )	{
				$loghorn_font_size = $loghorn_font_size."px" ;
				return "$loghorn_font_size \"$loghorn_font_family\"" ;
			}
			
			return $loghorn_default_font ;
		}
		
		/*
		 * Get the rgba settings from a 'r:g:b:a' format field.
		 */
		function loghorn_rgba_settings ( $loghorn_settings_constant , $loghorn_default_rgba_colr )	{
			
			// This function reads the settings in either '#hex' or 'rgba(red:green:blue:alpha)' format and returns in the same format.
			$loghorn_rgb_settings	= self::$loghorn_settings [ $loghorn_settings_constant ] ['hex'];
			
			return $loghorn_rgb_settings ;
		}
		
		/*
		 * Get the border settings from a 'WIDTH:BORDER-STYLE:Red:Green:Blue:Alpha' format field.
		 */
		
		function loghorn_get_border ( $loghorn_settings_constant , $loghorn_default_border )	{
			
			global $loghorn_border_styles_global;	// border styles defined in initialize-loghorn.php
			$loghorn_form_border = self::$loghorn_settings [ $loghorn_settings_constant ] ;
			
			// Let's get the values:
			$loghorn_border_color	=	$loghorn_form_border ['hex'] ;
			
			if( !isset( $loghorn_form_border['style'] ) )
				$loghorn_form_border = self::$loghorn_settings [ $loghorn_default_border ] ;
			
			$loghorn_border_width	=	$loghorn_form_border ['thick']."px" ;
			$loghorn_border_style	=	$loghorn_border_styles_global [ $loghorn_form_border ['style'] ];
			
			return "$loghorn_border_width $loghorn_border_style $loghorn_border_color";
		}
		
		/*
		 * Get the box shadow parameter for the login form.
		 */
		function loghorn_get_box_shadow ( $loghorn_settings_constant , $loghorn_default_box_shadow )	{
			
			$loghorn_box_shadow = self::$loghorn_settings [ $loghorn_settings_constant ] ;
			
			// Let's get the values:
			$loghorn_h_shadow	=	$loghorn_box_shadow ['hor']."px" ;
			$loghorn_v_shadow	=	$loghorn_box_shadow ['ver']."px" ;
			$loghorn_blur		=	$loghorn_box_shadow ['blur']."px" ;
			$loghorn_spread		=	$loghorn_box_shadow ['spread']."px" ;
			// color may be expressed as hex, or rgba in the settings.
			$loghorn_color		=	$loghorn_box_shadow ['hex'] ;
			
			return "$loghorn_h_shadow $loghorn_v_shadow $loghorn_blur $loghorn_spread $loghorn_color" ;
		}
		
		/*
		 * Get the text shadow parameter for the login form.
		 */
		function loghorn_get_txt_shadow ( $loghorn_settings_constant , $loghorn_default_txt_shadow )	{
			
			$loghorn_txt_shadow = self::$loghorn_settings [ $loghorn_settings_constant ] ;
			
			// Let's get the values:
			
			// color may be expressed as hex, or rgba in the settings.
			$loghorn_color	=	$loghorn_txt_shadow ['hex'] ;
			
			// The values for horizontal, vertical and blur are only stored for the regular text.
			
			if ( !isset($loghorn_txt_shadow ['hor']) )	{
				// This is on-hover or on-active settings. Pick hor, ver and blur from the Normal text settings.
				$loghorn_txt_shadow = self::$loghorn_settings [ $loghorn_default_txt_shadow ] ;
			}
			
			$loghorn_h_shadow	=	$loghorn_txt_shadow ['hor']."px" ;
			$loghorn_v_shadow	=	$loghorn_txt_shadow ['ver']."px" ;
			$loghorn_blur		=	$loghorn_txt_shadow ['blur']."px" ;
		
			return "$loghorn_h_shadow $loghorn_v_shadow $loghorn_blur $loghorn_color" ;
		}
		
		/*
		 * Verify if the rgba values are valid or not. Returns 'rgba(red , green , blue , alpha )' if a valid value, default otherwise.
		 */
		function loghorn_verify_rgba_colors ( $loghorn_r_hue , $loghorn_g_hue , $loghorn_b_hue , $loghorn_a_val , $loghorn_default_rgba_colr )	{
			
			// Cross check to verify if each color element is a valid integer and alpha value is a numeric one:
			if ( is_int ($loghorn_r_hue) && is_int ($loghorn_g_hue) && is_int ($loghorn_b_hue) && is_numeric ($loghorn_a_val) )
				// Good! Now check if they are within valid range:
				if ( $loghorn_r_hue > 255 || $loghorn_g_hue > 255 || $loghorn_b_hue > 255 || 
					 $loghorn_r_hue < 0   || $loghorn_g_hue < 0   || $loghorn_b_hue < 0   || 
					 $loghorn_a_val < 0.0 || $loghorn_a_val > 1.0 )
					// Oops, not a valid value! Return the default rgba value as set by the function default parameter.
					$loghorn_color = $loghorn_default_rgba_colr ;
				else
					// OK! We have valid integers (r,g,b) and numeric alpha values that are within the permissible range.
					// Let's now contrsuct the return value based on these:
					$loghorn_color = "rgba( $loghorn_r_hue , $loghorn_g_hue , $loghorn_b_hue , $loghorn_a_val )" ;
			else
				// Not integer RGB or a numeric alpha value! Return the default rgba value.
				$loghorn_color = $loghorn_default_rgba_colr ;
			
			return $loghorn_color ;
		}
} //class Log_Horn_Display ends here.  
?>