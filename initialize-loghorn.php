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
	/**********************************  SETTINGS DEFAULTS  *************************************/
	// Set the CSS Theme:
    if  ( ! defined ( 'LOGHORN_SETTINGS_CSS_THEME' )  )  {
		define ( 'LOGHORN_SETTINGS_CSS_THEME' , 0 ) ;	
	}
	// Set the logo image URL:
    if  ( ! defined ( 'LOGHORN_SETTINGS_LOGO' )  )  {
        define ( 'LOGHORN_SETTINGS_LOGO' , 1 ) ;
	}
	// Set the background image URL:
    if  ( ! defined ( 'LOGHORN_SETTINGS_BG' )  )  {
        define ( 'LOGHORN_SETTINGS_BG' , 2 ) ;
	}
	// Set the Form Width:
    if  ( ! defined ( 'LOGHORN_SETTINGS_FORM_WIDTH' )  )  {
		define ( 'LOGHORN_SETTINGS_FORM_WIDTH' , 3 ) ;
	}
	
define ( 'LOGHORN_SETTINGS_FORM_PAD' , 4 ) ;
define ( 'LOGHORN_SETTINGS_FORM_MRGN' , 5 ) ;
define ( 'LOGHORN_SETTINGS_FORM_COLOR' , 6 ) ;
define ( 'LOGHORN_SETTINGS_FORM_SHDW' , 7 ) ;
define ( 'LOGHORN_SETTINGS_FORM_LBL_SZ' , 8 ) ;
define ( 'LOGHORN_SETTINGS_FORM_LBL_COLR' , 9 ) ;
define ( 'LOGHORN_SETTINGS_INP_FONT_SIZE' , 10 ) ;
define ( 'LOGHORN_SETTINGS_INP_FONT_COLR' , 11 ) ;
define ( 'LOGHORN_SETTINGS_INP_RADIUS' , 12 ) ;
define ( 'LOGHORN_SETTINGS_INP_BG' , 13 ) ;
define ( 'LOGHORN_SETTINGS_INP_BORDER_COLR' , 14 ) ;
define ( 'LOGHORN_SETTINGS_INP_OPACITY' , 15 ) ;
define ( 'LOGHORN_SETTINGS_CB_WIDTH' , 16 ) ;
define ( 'LOGHORN_SETTINGS_CB_HT' , 17 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_WIDTH' , 18 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_COLR' , 19 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BG_COLR' , 20 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BG_IMG' , 21 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_OPACITY' , 22 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDER_WIDTH' , 23 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDER_STYLE' , 24 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDER_COLR' , 25 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_WIDTH_HOVR' , 26 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_COLR_HOVR' , 27 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BG_COLR_HOVR' , 28 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BG_IMG_HOVR' , 29 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_OPACITY_HOVR' , 30 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDER_WIDTH_HOVR' , 31 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDER_STYLE_HOVR' , 32 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDER_COLR_HOVR' , 33 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_WIDTH_ACTV' , 34 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_COLR_ACTV' , 35 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BG_COLR_ACTV' , 36 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BG_IMG_ACTV' , 37 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_OPACITY_ACTV' , 38 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDER_WIDTH_ACTV' , 39 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDER_STYLE_ACTV' , 40 ) ;
define ( 'LOGHORN_SETTINGS_SUBMIT_BORDER_COLR_ACTV' , 41 ) ;
define ( 'LOGHORN_SETTINGS_LOST_PASS_FORM' , 42 ) ;
define ( 'LOGHORN_SETTINGS_MSG_BG_COLR' , 43 ) ;
define ( 'LOGHORN_SETTINGS_MSG_COLR' , 44 ) ;
define ( 'LOGHORN_SETTINGS_MSG_TXT_SHDW' , 45 ) ;
define ( 'LOGHORN_SETTINGS_MSG_OPACITY' , 46 ) ;

?>