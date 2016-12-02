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
	/**********************************  SETTINGS DEFAULTS  *************************************/
	// Set the logo image URL:
    if  ( ! defined ( 'LOGHORN_SETTINGS_LOGO' )  )  {
        define ( 'LOGHORN_SETTINGS_LOGO' , 0 ) ;
	}
	// Set the background image URL:
    if  ( ! defined ( 'LOGHORN_SETTINGS_BG' )  )  {
        define ( 'LOGHORN_SETTINGS_BG' , 1 ) ;
	}
?>