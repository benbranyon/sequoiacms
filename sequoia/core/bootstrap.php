<?php

//$conf = parse_ini_file('../config/application.ini', TRUE);
//define config file here
require_once('application/config/config.php');

//[site]
define('SYS_DIR', 'spider');
define('BASE_DIR', $config['BASE_DIR']);

define('EXT', '.php');

/*
 * date.timezone setting
 *
 */
date_default_timezone_set($config['default_timezone']);

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     dev
 *     staging
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
	define('ENVIRONMENT', 'development');
	
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
		break;
	
		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

/*
 * path info
 *
 */
define ('HTTP_PATH', 'http://' . $_SERVER['SERVER_NAME'] . '/' . BASE_DIR);
define ('FS_PATH', $_SERVER['DOCUMENT_ROOT'] . '/' . BASE_DIR);
define ('REQUEST_URI', preg_replace('/\?' . $_SERVER['QUERY_STRING'] . '/i','', $_SERVER['REQUEST_URI']));

/*
 * Layout info
 *
 */
define ('LAYOUT', $config['layout']);
define ('ADMIN_LAYOUT', $config['adminlayout']);

/*
 * DATABASE CONNECTION
 *
 */
 
 //load database config
 require_once('application/config/database.php');
 require_once('sequoia/database/database.php');
 
 //Connect to database
 require_once('sequoia/database/database_conn.php');
 $db_conn = new database_conn();
 $db_conn->connect($db_default);
 $db_conn->select_db($db_default);
 
 /*** begin our session ***/
session_start();

require_once (SYS_DIR . '/core/router' . EXT);	
