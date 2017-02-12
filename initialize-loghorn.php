<?php

/**
 * Let's initialize the constants.
 */

/**
 * First things, first! 
 * Apply standard check - do not call this plugin from anywhere except the WordPress installation!
 */ 
	defined( 'ABSPATH' ) or die ;
	
	/**
     * Define constants that would be used in the plugin.
	 * All constants are checked if they have been already defined or not before assigning them values. 
	 */
	
	/*********************************** BASIC DIRECTORIES ****************************************/
	// Set the current file name:
    if  ( ! defined ( 'LOGHORN_FILE' )  )  {
         define ( 'LOGHORN_FILE' , __FILE__ ) ;
    }

    // Set the directory path:
    if  ( ! defined (  'LOGHORN_DIR' )  )  {
		define ( 'LOGHORN_DIR' , __DIR__.DIRECTORY_SEPARATOR ) ;
    }
	/***********************************       URLs        ****************************************/
    // Set the plugin folder's URL:
    if  ( ! defined ( 'LOGHORN_URL' )  )  {
        define ( 'LOGHORN_URL' , plugin_dir_url ( LOGHORN_FILE )  ) ;
    }

	// Set the admin URL:
    if  ( ! defined ( 'LOGHORN_ADMIN_URL' )  )  {
        define ( 'LOGHORN_ADMIN_URL' , LOGHORN_URL.'admin/' ) ;
	}
	
	// Set the admin js URL:
    if  ( ! defined ( 'LOGHORN_ADMIN_JS_URL' )  )  {
        define ( 'LOGHORN_ADMIN_JS_URL' , LOGHORN_ADMIN_URL.'js/' ) ;
	}
	
	// Set the admin js URL:
    if  ( ! defined ( 'LOGHORN_ADMIN_CSS_URL' )  )  {
        define ( 'LOGHORN_ADMIN_CSS_URL' , LOGHORN_ADMIN_URL.'css/' ) ;
	}
	
	// Set the image URL:
    if  ( ! defined ( 'LOGHORN_IMAGES_URL' )  )  {
        define ( 'LOGHORN_IMAGES_URL' , LOGHORN_URL.'images/' ) ;
	}
	
	// Set the CSS URL:
    if  ( ! defined ( 'LOGHORN_CSS_URL' )  )  {
        define ( 'LOGHORN_CSS_URL' , LOGHORN_URL.'css/' ) ;	//For future use.
    }
	
	// Set the JS URL:
    if  ( ! defined ( 'LOGHORN_JS_URL' )  )  {
        define ( 'LOGHORN_JS_URL' , LOGHORN_URL.'js/' ) ;	//For future use.
    }
	/**************************************     BASENAMES    **************************************/
    // Set the basename:
    if  ( ! defined ( 'LOGHORN_BASENAME' )  )  {
        define (  'LOGHORN_BASENAME' , plugin_basename ( LOGHORN_FILE )  ) ;
    }

    // Set the dirname:
    if  ( ! defined ( 'LOGHORN_BASE_DIRNAME' )  )  {
        define ( 'LOGHORN_BASE_DIRNAME' ,dirname ( LOGHORN_BASENAME )  ) ;
    }
	/*********************************** OTHER DIRECTORIES ****************************************/
    // Set the admin directory name:
    if  ( ! defined ( 'LOGHORN_ADMIN_DIRNAME' )  )  {
        define ( 'LOGHORN_ADMIN_DIRNAME' , LOGHORN_DIR.'admin'.DIRECTORY_SEPARATOR ) ;	
    }
	
	// Set the includes directory path:		
	if  ( ! defined (  'LOGHORN_INCLUDES_DIRNAME' )  )  {
		define ( 'LOGHORN_INCLUDES_DIRNAME' , LOGHORN_DIR.'includes'.DIRECTORY_SEPARATOR ) ;
    }

	// Set the images directory name:
    if  ( ! defined ( 'LOGHORN_IMAGES_DIRNAME' )  )  {
        define ( 'LOGHORN_IMAGES_DIRNAME' , LOGHORN_DIR.'images'.DIRECTORY_SEPARATOR ) ;	
    }
		
	/***********************************  PLUGIN DEFAULTS  ****************************************/
	// Set the logo image URL:
    if  ( ! defined ( 'LOGHORN_DEFAULT_LOGO_IMAGE' )  )  {
        define ( 'LOGHORN_DEFAULT_LOGO_IMAGE' , 'gnu_80x80.png' ) ;
	}
	// Set the background image URL:
    if  ( ! defined ( 'LOGHORN_DEFAULT_BG_IMAGE' )  )  {
        define ( 'LOGHORN_DEFAULT_BG_IMAGE' , 'sunrise.jpg' ) ;
	}
	// Set the default Form Width:
    if  ( ! defined ( 'LOGHORN_DEFAULT_FORM_WD' )  )  {
        define ( 'LOGHORN_DEFAULT_FORM_WD' , 320 ) ;
	}
	// Set the Minimum Allowable Form Width:
    if  ( ! defined ( 'LOGHORN_MIN_FORM_WD' )  )  {
        define ( 'LOGHORN_MIN_FORM_WD' , 220 ) ;
	}
	// Set the default Form Padding:
    if  ( ! defined ( 'LOGHORN_DEFAULT_PADDING' )  )  {
        define ( 'LOGHORN_DEFAULT_PADDING' , '8% 0 0' ) ;
	}
	// Set the default Form Margin:
    if  ( ! defined ( 'LOGHORN_DEFAULT_FORM_MRGN' )  )  {
        define ( 'LOGHORN_DEFAULT_FORM_MRGN' , 'auto' ) ;
	}
	// Set the default Form Color (Opaque White):
    if  ( ! defined ( 'LOGHORN_DEFAULT_FORM_COLR' )  )  {
        define ( 'LOGHORN_DEFAULT_FORM_COLR' , '#fff' ) ; 
	}
	// Set the default Alpha Channel (Opacity):
    if  ( ! defined ( 'LOGHORN_DEFAULT_ALPHA' )  )  {
        define ( 'LOGHORN_DEFAULT_ALPHA' , 100 ) ; // 100% Opaque
	}
	// Set the default Form Shadow:
    if  ( ! defined ( 'LOGHORN_DEFAULT_FORM_SHDW' )  )  {
        define ( 'LOGHORN_DEFAULT_FORM_SHDW' , 'none' ) ; 
	}
	// Set the default Form Border Style (Solid Black, 2 pixels wide):
    if  ( ! defined ( 'LOGHORN_DEFAULT_FORM_BORDR' )  )  {
        define ( 'LOGHORN_DEFAULT_FORM_BORDR' , 'none' ) ; // Read as WIDTH BORDER-STYLE  rgba( R , G , B , A )
	}
	// Set the default Form Border Radius:
    if  ( ! defined ( 'LOGHORN_DEFAULT_FORM_BORDR_RADIUS' )  )  {
        define ( 'LOGHORN_DEFAULT_FORM_BORDR_RADIUS' , 0 ) ;
	}
	// Set the default Form Label Font:
    if  ( ! defined ( 'LOGHORN_DEFAULT_FORM_FONT' )  )  {
        define ( 'LOGHORN_DEFAULT_FORM_FONT' , '16px sans-serif' ) ;
	}
	// Set the default Form Label Font color:
    if  ( ! defined ( 'LOGHORN_DEFAULT_FORM_FONT_COLR' )  )  {
        define ( 'LOGHORN_DEFAULT_FORM_FONT_COLR' , 'rgba( 100 , 100 , 100 , 1 )' ) ;
	}
	// Set the default 'Remeber Me' Check-Box Width:
    if  ( ! defined ( 'LOGHORN_DEFAULT_CB_WIDTH' )  )  {
        define ( 'LOGHORN_DEFAULT_CB_WIDTH' , 12 ) ;
	}
	// Set the default 'Remeber Me' Check-Box Height:
    if  ( ! defined ( 'LOGHORN_DEFAULT_CB_HEIGHT' )  )  {
        define ( 'LOGHORN_DEFAULT_CB_HEIGHT' , 12 ) ;
	}
	// Set the default 'Log In' button width:
    if  ( ! defined ( 'LOGHORN_DEFAULT_BUTTON_WIDTH' )  )  {
        define ( 'LOGHORN_DEFAULT_BUTTON_WIDTH' , 90 ) ;
	}
	// Set the default 'Log In' button text color:
    if  ( ! defined ( 'LOGHORN_DEFAULT_BUTTON_TXT_COLR' )  )  {
        define ( 'LOGHORN_DEFAULT_BUTTON_TXT_COLR' , 'rgba( 255 , 255 , 255 , 1 )' ) ;
	}
	// Set the default 'Log In' button text shadow:
    if  ( ! defined ( 'LOGHORN_DEFAULT_BUTTON_TXT_SHDW' )  )  {
        define ( 'LOGHORN_DEFAULT_BUTTON_TXT_SHDW' , 'none' ) ;
	}
	// Set the default 'Log In' button background color:
    if  ( ! defined ( 'LOGHORN_DEFAULT_BUTTON_BG_COLR' )  )  {
        define ( 'LOGHORN_DEFAULT_BUTTON_BG_COLR' , 'rgba( 50 , 50 , 50 , 1 )' ) ;
	}
	// Set the default Button Border Style :
    if  ( ! defined ( 'LOGHORN_DEFAULT_BUTTON_BORDR' )  )  {
        define ( 'LOGHORN_DEFAULT_BUTTON_BORDR' , '1px solid rgba(0,0,0,1)' ) ; // Stored as WIDTH BORDER-STYLE  rgba( R , G , B , A )
	}
	/**********************************  SETTINGS OPTIONS   ***************************************
	 * The below constants define the field/properties that can be customized through this plugin *
	 **********************************************************************************************
	
	// Set the CSS Theme Option label:
    if  ( ! defined ( 'LOGHORN_SETTINGS_CSS_THEME' )  )  {
		define ( 'LOGHORN_SETTINGS_CSS_THEME' , 0 ) ;	
	}
	// Set the logo image URL Option label:
    if  ( ! defined ( 'LOGHORN_SETTINGS_LOGO' )  )  {
        define ( 'LOGHORN_SETTINGS_LOGO' , 1 ) ;
	}
	// Set the background image URL Option label:
    if  ( ! defined ( 'LOGHORN_SETTINGS_BG' )  )  {
        define ( 'LOGHORN_SETTINGS_BG' , 2 ) ;
	}
	// Set the Form Width Option label:
    if  ( ! defined ( 'LOGHORN_SETTINGS_FORM_WIDTH' )  )  {
		define ( 'LOGHORN_SETTINGS_FORM_WIDTH' , 3 ) ;
	}
	// Set the Form Padding Option label:
    if  ( ! defined ( 'LOGHORN_SETTINGS_FORM_PAD' )  )  {
		define ( 'LOGHORN_SETTINGS_FORM_PAD' , 4 ) ;
	}
	// Set the Form Margin Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_FORM_MRGN' )  )  {
		define ( 'LOGHORN_SETTINGS_FORM_MRGN' , 5 ) ;
	}
	// Set the Form Color Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_FORM_COLOR' )  )  {	
		define ( 'LOGHORN_SETTINGS_FORM_COLOR' , 6 ) ;
	}
	// Set the Form Shadow Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_FORM_SHDW' )  )  {	
		define ( 'LOGHORN_SETTINGS_FORM_SHDW' , 7 ) ;
	}
	// Set the Form Border Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_FORM_BORDR' )  )  {
		define ( 'LOGHORN_SETTINGS_FORM_BORDR' , 8 ) ;
	}
	// Set the Form Border Radius Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_FORM_BORDR_RADIUS' )  )  {
		define ( 'LOGHORN_SETTINGS_FORM_BORDR_RADIUS' , 9 ) ;
	}
	// Set the Form Font and Size Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_FORM_LBL' )  )  {
		define ( 'LOGHORN_SETTINGS_FORM_LBL' , 10 ) ;
	}
	// Set the Form Font Color Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_FORM_LBL_COLR' )  )  {
		define ( 'LOGHORN_SETTINGS_FORM_LBL_COLR' , 11 ) ;
	}
	// Set the Input Box Edge Radius size Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_INP_RADIUS' )  )	{		//  <<  Don't miss this one. coverd under INP_BORDR
		define ( 'LOGHORN_SETTINGS_INP_RADIUS' , 12 ) ;
	}
	// Set the Input text font Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_INP_FONT' )  )  {
		define ( 'LOGHORN_SETTINGS_INP_FONT' , 13 ) ;
	}
	// Set Input Text Font Color Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_INP_FONT_COLR' )  )  {
		define ( 'LOGHORN_SETTINGS_INP_FONT_COLR' , 14 ) ;
	}
	// Set Input Background Color Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_INP_BG' )  )  {
		define ( 'LOGHORN_SETTINGS_INP_BG' , 15 ) ;
	}
	// Set Input Border Color Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_INP_BORDR' )  )  {
		define ( 'LOGHORN_SETTINGS_INP_BORDR' , 16 ) ;
	}
	// Set 'Remember Me' Check-Box Width Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_CB_WIDTH' )  )  {
		define ( 'LOGHORN_SETTINGS_CB_WIDTH' , 17 ) ;
	}
	// Set 'Remember Me' Check-Box Height Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_CB_HT' )  )  {
		define ( 'LOGHORN_SETTINGS_CB_HT' , 18 ) ;
	}
	// Set 'Remember Me' Check-Box Height Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_CB_RADIUS' )  )  {
		define ( 'LOGHORN_SETTINGS_CB_RADIUS' , 19 ) ;
	}
	// Set 'Log In' Submit Button Width Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_WIDTH' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_WIDTH' , 20 ) ;
	}
	// Set 'Log In' Submit Button Text Color Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_TXT_COLR' )  )  {	// << changed to LOGHORN_SETTINGS_SUBMIT_TXT
		define ( 'LOGHORN_SETTINGS_SUBMIT_TXT_COLR' , 21 ) ;
	}
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_TXT_SHDW' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_TXT_SHDW' , 22 ) ;
	}
	// Set 'Log In' Submit Button Background Color Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_BG_COLR' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_BG_COLR' , 23 ) ;
	}
	// Set 'Log In' Submit Button Background Image Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_BG_IMG' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_BG_IMG' , 24 ) ;
	}
	// Set 'Log In' Submit Button Opacity Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_OPACITY' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_OPACITY' , 25 ) ;
	}
	// Set 'Log In' Submit Button Opacity Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_BORDR' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_BORDR' , 26 ) ;
	}
	// Set 'Log In' Submit Button Border Radius label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_RADIUS' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_RADIUS' , 27 ) ;
	}
	// Set 'Log In' Submit Button Text Color On Hover Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_COLR_HOVR' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_COLR_HOVR' , 28 ) ;
	}
	// Set 'Log In' Submit Button Text Shadow On Hover Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_TXT_SHDW_HOVR' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_TXT_SHDW_HOVR' , 29 ) ;
	}
	// Set 'Log In' Submit Button Background Color On Hover Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_BG_COLR_HOVR' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_BG_COLR_HOVR' , 30 ) ;
	}
	// Set 'Log In' Submit Button Background Image On Hover Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_BG_IMG_HOVR' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_BG_IMG_HOVR' , 31 ) ;
	}
	// Set 'Log In' Submit Button Opacity On Hover Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_OPACITY_HOVR' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_OPACITY_HOVR' , 32 ) ;
	}
	// Set 'Log In' Submit Button Border On Hover Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_HOVR' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_HOVR' , 33 ) ;
	}
	// Set 'Log In' Submit Button Border Radius On Hover Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_RADIUS_HOVR' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_RADIUS_HOVR' , 34 ) ;
	}
	// Set 'Log In' Submit Button Text Color On Active Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_COLR_ACTV' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_COLR_ACTV' , 35 ) ;
	}
	// Set 'Log In' Submit Button Text Shadow On Active Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_TXT_SHDW_ACTV' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_TXT_SHDW_ACTV' , 36 ) ;
	}
	// Set 'Log In' Submit Button Background Color On Active Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_BG_COLR_ACTV' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_BG_COLR_ACTV' , 37 ) ;
	}
	// Set 'Log In' Submit Button Background Image On Active Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_BG_IMG_ACTV' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_BG_IMG_ACTV' , 38 ) ;
	}
	// Set 'Log In' Submit Button Opacity On Active Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_OPACITY_ACTV' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_OPACITY_ACTV' , 39 ) ;
	}
	// Set 'Log In' Submit Button Border On Active Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_ACTV' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_ACTV' , 40 ) ;
	}
	// Set 'Log In' Submit Button Border Radius On Active Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_RADIUS_ACTV' )  )  {
		define ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_RADIUS_ACTV' , 41 ) ;
	}
	// Set 'Lost Password' Form Option label:	-> This is not needed, since the Lost Password Form uses the same settings as Login Form.
	if  ( ! defined ( 'LOGHORN_SETTINGS_LOST_PASS_FORM' )  )  {
		define ( 'LOGHORN_SETTINGS_LOST_PASS_FORM' , 42 ) ;
	}
	// Set Messages Background Color Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_MSG_BG_COLR' )  )  {
		define ( 'LOGHORN_SETTINGS_MSG_BG_COLR' , 43 ) ;
	}
	// Set Messages Text Color Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_MSG_COLR' )  )  {
		define ( 'LOGHORN_SETTINGS_MSG_COLR' , 44 ) ;
	}
	// Set Messages Text Shadow Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_MSG_TXT_SHDW' )  )  {
		define ( 'LOGHORN_SETTINGS_MSG_TXT_SHDW' , 45 ) ;
	}
	// Set Message Box Opacity Option label:	-> not needed
	if  ( ! defined ( 'LOGHORN_SETTINGS_MSG_OPACITY' )  )  {
		define ( 'LOGHORN_SETTINGS_MSG_OPACITY' , 46 ) ;
	}
	// Set Message Box Border Radius Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_MSG_BRDR_RAD' )  )  {
		define ( 'LOGHORN_SETTINGS_MSG_BRDR_RAD' , 47 ) ;
	}
	// Set Message Box Left Border Style Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_MSG_L_BRDR' )  )  {
		define ( 'LOGHORN_SETTINGS_MSG_L_BRDR' , 48 ) ;
	}
	// Set Message Box Right Border Style Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_MSG_R_BRDR' )  )  {
		define ( 'LOGHORN_SETTINGS_MSG_R_BRDR' , 49 ) ;
	}
	// Set Message Box Top Border Style Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_MSG_T_BRDR' )  )  {
		define ( 'LOGHORN_SETTINGS_MSG_T_BRDR' , 50 ) ;
	}
	// Set Message Box Bottom Border Style Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_MSG_B_BRDR' )  )  {
		define ( 'LOGHORN_SETTINGS_MSG_B_BRDR' , 51 ) ;
	}
	// Set Error Message Box Left Border Style Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_ERR_L_BRDR' )  )  {
		define ( 'LOGHORN_SETTINGS_ERR_L_BRDR' , 52 ) ;
	}
	// Set Error Message Box Right Border Style Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_ERR_R_BRDR' )  )  {
		define ( 'LOGHORN_SETTINGS_ERR_R_BRDR' , 53 ) ;
	}
	// Set Error Message Box Top Border Style Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_ERR_T_BRDR' )  )  {
		define ( 'LOGHORN_SETTINGS_ERR_T_BRDR' , 54 ) ;
	}
	// Set Error Message Box Bottom Border Style Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_ERR_B_BRDR' )  )  {
		define ( 'LOGHORN_SETTINGS_ERR_B_BRDR' , 55 ) ;
	}

	/**********************************   OTHER CONSTANTS   *************************************/
	
    if  ( ! defined ( 'LOGHORN_NORMAL_STATE' )  )  {
		define ( 'LOGHORN_NORMAL_STATE' , 0 ) ;	
	}
	
	if  ( ! defined ( 'LOGHORN_ON_HOVER' )  )  {
		define ( 'LOGHORN_ON_HOVER' , 1 ) ;	
	}
	
	if  ( ! defined ( 'LOGHORN_ON_ACTIVE' )  )  {
		define ( 'LOGHORN_ON_ACTIVE' , 2 ) ;	
	}
	
	/**************************************   GLOBALS   *****************************************/
	
	global 	  $loghorn_yes_no
			, $loghorn_bg_option_list
			, $loghorn_border_styles_global 
			, $loghorn_fonts_global
			, $loghorn_theme
			;
			
			$loghorn_yes_no				  = array (
													 "No"
													,"Yes"
											);
			$loghorn_bg_option_list		  = array  (
													  "Plain"
													 ,"Image"
											
											);
			$loghorn_border_styles_global = array (	 "none"
													,"solid"
													,"dotted"
													,"dashed"
													,"double"
													,"groove"
													,"ridge"
													,"inset"
													,"outset"
													,"hidden"
											);
			$loghorn_fonts_global 		  = array (	 "American Typewriter"
													,"Arial"
													, "Arial Black"
													, "Baskerville"
													, "Brush Script"
													, "Capitals"
													, "Charcoal"
													, "Comic Sans MS"
													, "Copperplate"
													, "Courier New"
													, "Gadget"
													, "Gill Sans"
													, "Hoefler Text Ornaments"
													, "Impact"
													, "Papyrus"
													, "Sand"
													, "Techno"
													, "Times New Roman"
													, "Verdana"
											);
			$loghorn_theme				  = array (
													  "fresh"		=> "overcast"
													, "light"		=> "smoothness"
													, "blue"		=> "cupertino"
													, "coffee"		=> "pepper-grinder"
													, "ectoplasm"	=> "south-street"
													, "midnight"	=> "blitzer"
													, "ocean"		=> "smoothness"
													, "sunrise"		=> "blitzer"
											);
											
			$loghorn_tooltips			  = array  (
														 'enable_plugin_tooltip' => ' Select Yes to enable this plugin.'
														,'disable_logo_tooltip' => ' This option tells whether you need to use logo or not.'
														,'logo_file_tooltip' => ' Logo defines as recognizable and distinctive graphic design, stylized name, unique symbol, or other device for identifying an organization or brand.This option tells to select the image which you need to use it for logo.'
														,'background_tooltip' => ' This option tells to select the image which will be used to set as backgroud image.'
														,'bg_colr_tooltip' => ' This option tells whether you need to use a background color or not.'
														,'display_bg_tooltip' => ' This option tells whether you need to use a background image or not.'
														,'form_width_tooltip' => ' login form allows a user to enter data(i.e Username,password etc) that is sent to a server for processing. This option tells to set the width of the login form.'
														,'form_padding_tooltip' => ' Padding is the space between the content and the border.Padding is applied to the inside of your element hence effecting how far your elements content is away from the border. This option tells to set the padding of the login form.'
														,'form_margin_tooltip' => '  Margin is the space outside the border.Margin is applied to the outside of your element hence effecting how far your element is away from other elements.This option tells to set the Margin of the login form.'
														,'form_bg_color_tooltip' => ' This option tells to choose the background color of the login form.'
														,'form_shadow_color_tooltip' => ' It tells to choose the color of the login form shadow. '
														,'form_shdw_horizontal_displacement_tooltip' => ' It defines that the shadow will be on the right or left or center of the login form.'
														,'form_shdw_vertical_displacement_tooltip' => ' It defines that the shadow will be on the above or below  or center of the login form.'
														,'form_shdw_blur_effect_tooltip' => ' This option tells to increase or decrease the blur effect on the login form shadow. If set this value to 0 the shadow will be sharp, the higher the number,the more blurred it will be.'
														,'form_spread_effect_tooltip' => ' This option tells to increase or decrease the size of the login form Shadow.'
														,'form_border_color_tooltip' => ' This option tells to choose the color of the login form Border. '
														,'form_thickness_tooltip' => ' This option tells to set the thickness of the login form Border.'
														,'form_corner_radius_tooltip' => ' This option tells to set the radius of the corner of the login form.'
														,'form_border_type_tooltip' => ' This options tells to choose the type of the border of the login form.'
														,'label_color_tooltip' => ' This options tells to choose the colour of the label of the login form.'
														,'label_font_size_tooltip' => ' This option tells to set the size of the font of the label content.'
														,'label_font_tooltip' => ' This option tells to choose the type of the font of the label content.'
													,'textbox_text_color_tooltip' => ' This option tells to choose the color of the text written in the username or Email address  textbox.'
													,'textbox_font_size_tooltip' => '  This option tells to set the size of the text written in the username or Email address  textbox.'
													,'textbox_font_tooltip' => ' This option tells to choose the type of the font for the text written in the username or Email address  textbox.'
													,'textbox_color_tooltip' => ' This option tells to choose the color of the username or Email address  textbox inside the login form.'
													,'textbox_border_color_tooltip' => ' This option tells to choose the color of the border of the username or Email address  textbox inside the login form.'
													,'textbox_thickness_tooltip' => ' This option tells to set the thickness of the Border of the username or Email address  textbox inside the login form.'
													,'textbox_corner_radius_tooltip' => ' This option tells to set the radius of the Border of the username or Email address  textbox inside the login form.'
													,'textbox_border_type_tooltip' => ' This option tells to choose the type of the Border of the username or Email address  textbox inside the login form.'
													,'checkbox_width_tooltip' => '  This option tells to set the width of the Checkbox.'
													,'checkbox_height_tooltip' => ' This option tells to set the height of the Checkbox.'
													,'checkbox_radius_tooltip' => ' This option tells to set the corner radius of the Checkbox.'
													,'button_text_color_tooltip' => ' Button defines a clickable button.This option tells to choose the text color of the login button.'
													,'button_text_color_on_hover_tooltip' => ' This option tells to choose the Hover color on the login button. '
													,'button_text_font_size_tooltip' => '  This option tells to set the size of the text written on the login button.'
													,'button_text_font_tooltip' => 'This option tells to choose the type of the font of the text written on the login button.'
													,'button_text_shadow_color_tooltip' => ' It tells to choose the color of the login Button Text shadow. '
													,'button_text_shadow_color_on_hover_tooltip' => ' This option tells to choose the Hover color of the login button text. '
													,'button_horizontal_displacement_tooltip' => ' It defines that the shadow will be on the right or left of the login Button Text.'
													,'button_vertical_displacement_tooltip' => ' It defines that the shadow will be on the above or below of the login Button Text.'
													,'button_blur_effect_tooltip' => ' This option tells to increase or decrease the blur effect on the login Button Text shadow.'
													,'button_color_tooltip' => ' This option tells to choose the color of the login button.'
													,'button_color_on_hover_tooltip' => '  This option tells to choose the Hover color of the login button.'
													,'button_border_color_tooltip' => ' This option tells to choose the color of the border of the login button.'
													,'button_border_color_on_hover_tooltip' => ' This option tells to choose the Hover color of the border of the login button.'
													,'button_thickness_tooltip' => ' This option tells to set the thickness of the border of the login button.'
													,'button_corner_radius_tooltip' => ' This option tells to set the radius of the corner of the border of the login button.'
													,'button_border_type_tooltip' => ' This options tells to choose the type of the border of the login button.'
													,'message_text_tooltip' => ' This option tells to choose the color of the Message text.'
													,'message_font_size_tooltip' => '  This option tells to set the size of the text written for Message.'
													,'message_font_tooltip' => ' This option tells to choose the type of the font for the text written for Message.'
													,'message_text_shadow_color_tooltip' => ' It tells to choose the color of the shadow of the message text.'
													,'message_text_shadow_color_on_hover_tooltip' => ' This option tells to choose the Hover color of the shadow of the message text. '
													,'message_horizontal_displacement_tooltip' => ' It defines that the shadow will be on the right or left or center of the message Text.'
													,'message_vertical_displacement_tooltip' => ' It defines that the shadow will be on the above or below of the message Text.'
													,'message_blur_effect_tooltip' => ' This option tells to increase or decrease the blur effect on the login message Text.'
													,'message_box_color_tooltip' => ' This option tells to choose the color of the Message Box.'
													,'message_border_radius_tooltip' => ' This option tells to set the radius of the border of Message Box.'
													,'message_border_left_tooltip' => ' This option tells to choose the color of the left border of message box.'
													,'message_border_left_thickness_tooltip' => ' This option tells to set the thickness of the left border of Message Box.'
													,'message_border_left_type_tooltip' => ' This option tells to select the border type of the left border of Message Box.'
													,'message_border_top_tooltip' => ' This option tells to choose the color of the top border of message box.'
													,'message_border_top_thickness_tooltip' => ' This option tells to set the thickness of the top border of Message Box.'
													,'message_border_top_type_tooltip' => ' This option tells to select the border type of the top border of Message Box.'
													,'message_border_right_tooltip' => ' This option tells to choose the color of the right border of message box.'
													,'message_border_right_thickness_tooltip' => ' This option tells to set the thickness of the right border of Message Box.'
													,'message_border_right_type_tooltip' => ' This option tells to select the border type of the right border of Message Box.'
													,'message_border_bottom_tooltip' => ' This option tells to choose the color of the bottom border of message box.'
													,'message_border_bottom_thickness_tooltip' => ' This option tells to set the thickness of the bottom border of Message Box.'
													,'message_border_bottom_type_tooltip' => ' This option tells to select the border type of the bottom border of Message Box.'
													
											);
?>