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
	 **********************************************************************************************/
	
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
	if  ( ! defined ( 'LOGHORN_SETTINGS_INP_RADIUS' )  )	{		//  <<  Don't miss this one.
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
	if  ( ! defined ( 'LOGHORN_SETTINGS_SUBMIT_TXT_COLR' )  )  {
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
	if  ( ! defined ( 'LOGHORN_SETTINGS_MSG_L_BRDR' )  )  {
		define ( 'LOGHORN_SETTINGS_ERR_L_BRDR' , 52 ) ;
	}
	// Set Error Message Box Right Border Style Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_MSG_R_BRDR' )  )  {
		define ( 'LOGHORN_SETTINGS_ERR_R_BRDR' , 53 ) ;
	}
	// Set Error Message Box Top Border Style Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_MSG_T_BRDR' )  )  {
		define ( 'LOGHORN_SETTINGS_ERR_T_BRDR' , 54 ) ;
	}
	// Set Error Message Box Bottom Border Style Option label:
	if  ( ! defined ( 'LOGHORN_SETTINGS_MSG_B_BRDR' )  )  {
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
	
	global 	  $loghorn_border_styles_global 
			, $loghorn_fonts_global
			;
			
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
			$loghorn_fonts_global 		  = array (	 "Arial"
													,"Times New Roman"
													,"Courier New"
											);
    
?>