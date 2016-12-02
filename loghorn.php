<?php
   /*
   Plugin Name: Log Horn
   Plugin URI: http://localhost
   Description: a plugin to customize the login experience in WordPress.
   Version: 0.5
   Author: shazic
   Author URI: https://github.com/shazic
   License: GPLv3
   License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
   */

/**
 * First things, first! 
 * Apply standard check - do not call this plugin from anywhere except the WordPress installation!
 */ 
	defined( 'ABSPATH' ) or die ;
   
	// Initialize all constants.
	require_once __DIR__.DIRECTORY_SEPARATOR.'initialize-loghorn.php' ;
	
	// Display the custom login page (if set) irrespective of user authority (since user is not logged in yet)
	require_once LOGHORN_INCLUDES_DIRNAME.'class-log-horn-display.php' ;	
	
	// Set up Admin Menu if the user has network admin authority.
	if ( is_admin() )  {
		require_once LOGHORN_INCLUDES_DIRNAME.'class-log-horn-admin-menu.php' ;
	}
?>