<?php 
session_start();

/***************************************************
 * User configuration
 */

// Database settings
$maple_database = array(
	'SERVER_DATABASE_HOST'     => 'localhost',	// SQL Hostname (default: 'localhost')
	'SERVER_DATABASE_DBNAME'   => 'zenthosdev', // SQL Database name (your maplestory database)
	'SERVER_DATABASE_USERNAME' => 'root',		// SQL Username (default: 'root')
	'SERVER_DATABASE_PASSWORD' => '',			// SQL Password (default: '')
	'SERVER_DATABASE_PORT'     => 3306,			// SQL Port (default: 3306)
	);

// Optional technical stuff
$settings = array(
	'SERVER_USERNAME_MINCHARACTERS' => 4,	// Username minimum characters
	'SERVER_USERNAME_MAXCHARACTERS' => 13,	// Username maximum characters

	'SERVER_PASSWORD_MINCHARACTERS' => 4,	// Password minimum characters
	'SERVER_PASSWORD_MAXCHARACTERS' => 32,	// Password maximum characters
	
	'SERVER_PASSWORD_HASH' => 'sha1'
	);

// Server information
define('SERVER_NAME', 'MapleServer');
define('EXP', 100);
define('DROP', 50);
define('MESOS', 200);

/*
 * End of user configuration
 * You shouldn't modify anything below here,
 * unless of course you know what you're doing.
 ***************************************************/

// Website Directories
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');
define('ASSETS', ROOT . 'assets/');
define('VIEWS', ROOT . 'views/');
define('LIB', ROOT . 'lib/');
define('CONTROLLERS', ROOT . 'controllers/');

if ($_SERVER['REQUEST_URI'] == '/' ||
	$_SERVER['REQUEST_URI'] == '/?')
{
	header('Location: /?home');
}

function class_autoload($class_name) {
    if (file_exists(LIB . $class_name . '.php')) 
    {
        require_once (LIB . $class_name . '.php');
    }
    else
    {
    	require_once (CONTROLLERS . $class_name . '.php');
    }
}

spl_autoload_register('class_autoload');

error_reporting(E_ALL);