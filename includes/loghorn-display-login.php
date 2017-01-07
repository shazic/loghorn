<?php

/**
 * This is the main file responsible for the display of the customized login page.
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
  
	require_once LOGHORN_INCLUDES_DIRNAME.'class-log-horn-display.php' ;		
	
	/**
	 * Instantiate an object of the class Log_Horn_Display to call the class constructor.
	 */
	function start_log_horn () 	{
		$start_plugin_log_horn = new Log_Horn_Display ( get_option('loghorn_settings2') );
	}
	
	// Go ahead and trigger the plugin:
	start_log_horn () ;
	
endif; 	// End of the 'if  ( class_exists ) ' block. 
		// There is no 'else' defined - the plugin will quit quietly if the class is already defined elsewhere.
  
?>