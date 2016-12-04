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
	
	/*********************************** BASIC DIRECTORIES **************************************/
	// Set the current file name:
    if  ( ! defined ( 'LOGHORN_FILE' )  )  {
         define ( 'LOGHORN_FILE' , __FILE__ ) ;
    }

    // Set the directory path:
    if  ( ! defined (  'LOGHORN_DIR' )  )  {
		define ( 'LOGHORN_DIR' , __DIR__.DIRECTORY_SEPARATOR ) ;
    }
	/***********************************       URLs        **************************************/
    // Set the plugin folder's URL:
    if  ( ! defined ( 'LOGHORN_URL' )  )  {
        define ( 'LOGHORN_URL' , plugin_dir_url ( LOGHORN_FILE )  ) ;
    }

	// Set the image URL:
    if  ( ! defined ( 'LOGHORN_IMAGES_URL' )  )  {
        define ( 'LOGHORN_IMAGES_URL' , LOGHORN_URL.'images/' ) ;
	}
	
	// Set the CSS URL:
    if  ( ! defined ( 'LOGHORN_CSS_URL' )  )  {
        define ( 'LOGHORN_CSS_URL' , LOGHORN_URL.'css/' ) ;	//For future use.
    }
	
	/***********************************      BASENAMES    **************************************/
    // Set the basename:
    if  ( ! defined ( 'LOGHORN_BASENAME' )  )  {
        define (  'LOGHORN_BASENAME' , plugin_basename ( LOGHORN_FILE )  ) ;
    }

    // Set the dirname:
    if  ( ! defined ( 'LOGHORN_BASE_DIRNAME' )  )  {
        define ( 'LOGHORN_BASE_DIRNAME' ,dirname ( LOGHORN_BASENAME )  ) ;
    }
	/*********************************** OTHER DIRECTORIES **************************************/
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
		
	/***********************************  PLUGIN DEFAULTS  **************************************/
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
        define ( 'LOGHORN_DEFAULT_FORM_WD' , '320px' ) ;
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
        define ( 'LOGHORN_DEFAULT_FORM_COLR' , '255 , 255 , 255 , 1' ) ; // Read as R , G , B , A
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
        define ( 'LOGHORN_DEFAULT_FORM_FONT_COLR' , '100 , 100 , 100 , 1' ) ;
	}
	// Set the default 'Remeber Me' Check-Box Width:
    if  ( ! defined ( 'LOGHORN_DEFAULT_CB_WIDTH' )  )  {
        define ( 'LOGHORN_DEFAULT_CB_WIDTH' , 12 ) ;
	}
	// Set the default 'Remeber Me' Check-Box Height:
    if  ( ! defined ( 'LOGHORN_DEFAULT_CB_HEIGHT' )  )  {
        define ( 'LOGHORN_DEFAULT_CB_HEIGHT' , 12 ) ;
	}
	/**********************************  SETTINGS OPTIONS   *************************************/
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
	if  ( ! defined ( 'LOGHORN_SETTINGS_INP_RADIUS' )  )	{
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
	
	

define ( 'LOGHORN_SETTINGS_SUBMIT_WIDTH' , 20 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_COLR' , 21 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BG_COLR' , 22 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BG_IMG' , 23 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_OPACITY' , 24 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_WIDTH' , 25 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_STYLE' , 26 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_COLR' , 27 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_WIDTH_HOVR' , 28 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_COLR_HOVR' , 29 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BG_COLR_HOVR' , 30 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BG_IMG_HOVR' , 31 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_OPACITY_HOVR' , 32 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_WIDTH_HOVR' , 33 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_STYLE_HOVR' , 34 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_COLR_HOVR' , 35 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_WIDTH_ACTV' , 36 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_COLR_ACTV' , 37 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BG_COLR_ACTV' , 38 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BG_IMG_ACTV' , 39 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_OPACITY_ACTV' , 40 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_WIDTH_ACTV' , 41 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_STYLE_ACTV' , 42 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDR_COLR_ACTV' , 43 ) ;
define ( 'LOGHORN_SETTINGS_LOST_PASS_FORM' , 44 ) ;
define ( 'LOGHORN_SETTINGS_MSG_BG_COLR' , 45 ) ;
define ( 'LOGHORN_SETTINGS_MSG_COLR' , 46 ) ;
define ( 'LOGHORN_SETTINGS_MSG_TXT_SHDW' , 47 ) ;
define ( 'LOGHORN_SETTINGS_MSG_OPACITY' , 48 ) ;
?>