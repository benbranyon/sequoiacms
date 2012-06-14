<?php

//$conf = parse_ini_file('../config/application.ini', TRUE);

//[site]
define('BASE_DIR', $conf['site']['BASE_DIR']);

define('EXT', '.php');

/*
 * date.timezone setting
 *
 */
date_default_timezone_set($conf['time']['default_timezone']);

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
 *     development
 *     testing
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

require_once (BASE_DIR . 'router' . EXT);	