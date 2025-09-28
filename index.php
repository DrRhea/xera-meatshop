<?php
// Load environment configuration
require_once('application/config/environment.php');

/*
|---------------------------------------------------------------
| PHP ERROR REPORTING LEVEL
|---------------------------------------------------------------
|
| By default CI runs with error reporting set to ALL.
| For security reasons you are encouraged to change this
| when your site goes live. For more info visit:
| http://php.net/error_reporting
|
*/
error_reporting(E_ALL & ~E_DEPRECATED);

/*
|---------------------------------------------------------------
| SYSTEM DIRECTORY NAME
|---------------------------------------------------------------
|
| This variable must contain the name of your "system" directory.
| Set the path if it is not in the same directory as this file.
|
*/
$system_path = 'system';

/*
|---------------------------------------------------------------
| APPLICATION DIRECTORY NAME
|---------------------------------------------------------------
|
| If you want this front controller to use a different "application"
| directory than the default one you can set its name here. The
| directory can also be renamed or relocated anywhere on your
| server. If you do, use an absolute (full) server path.
| For more info please see the user guide:
|
| https://codeigniter.com/userguide3/general/managing_apps.html
|
*/
$application_folder = 'application';

/*
|---------------------------------------------------------------
| VIEW DIRECTORY NAME
|---------------------------------------------------------------
|
| If you want to move the view directory out of the application
| directory, set the path to it here. The directory can be renamed
| and relocated anywhere on your server. If blank, it will default
| to the standard location inside your application directory.
| If you do move this, use an absolute (full) server path.
|
| NO TRAILING SLASH!
|
*/
$view_folder = '';

/*
| --------------------------------------------------------------------
| DEFAULT CONTROLLER
| --------------------------------------------------------------------
|
| Normally you will set your default controller in the routes config file.
| You can, however, force a custom routing by hard-coding a
| specific controller class/function here. For most applications, you
| WILL NOT set this variable.
|
| NOTE: If you DO set this variable then the URI WILL NOT be parsed
| properly! This is because we are setting a default controller and
| CodeIgniter doesn't know which controller it should route to.
|
| Un-comment the $routing array below to use this feature
|
*/
// The directory name, relative to the "controllers" directory.  Leave blank
// if your controller is not in a sub-directory within the "controllers" directory
$routing['directory'] = '';

// The controller class file name.  Example:  mycontroller
$routing['controller'] = '';

// The controller function you wish to be called.
$routing['function']	= '';

/*
| -------------------------------------------------------------------
|  CUSTOM CONFIG VALUES
| -------------------------------------------------------------------
|
| The $assign_to_config array below will be passed dynamically to the
| config class when initialized. This allows you to set custom config
| items or override any default config values found in the config.php file.
| This can be handy as it permits you to share one application between
| multiple front controller files, with each file containing different
| config values.
|
| Un-comment the $assign_to_config array below to use this feature
|
*/
// $assign_to_config['name_of_config_item'] = 'value of config item';

// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------

/*
| ---------------------------------------------------------------
|  Resolve the system path for increased reliability
| ---------------------------------------------------------------
*/
if (($_temp = realpath($system_path)) !== FALSE)
{
	$system_path = $_temp.DIRECTORY_SEPARATOR;
}
else
{
	// Ensure there's a trailing slash
	$system_path = strtr(
		rtrim($system_path, '/\\'),
		'/\\',
		DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
	).DIRECTORY_SEPARATOR;
}

// Is the system path correct?
if ( ! is_dir($system_path))
{
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
	exit(3); // EXIT_CONFIG
}

/*
| -------------------------------------------------------------------
|  Now that we know the path, set the main path constants
| -------------------------------------------------------------------
*/
// The name of THIS file
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// Path to the system directory
define('EXT', '.php');

// Path to the system directory
define('BASEPATH', $system_path);

// Path to the front controller (this file) directory
define('FCPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

// Name of the "system" directory
define('SYSDIR', basename(BASEPATH));

// The path to the "application" directory
if (is_dir($application_folder))
{
	if (($_temp = realpath($application_folder)) !== FALSE)
	{
		$application_folder = $_temp;
	}
	else
	{
		$application_folder = strtr(
			rtrim($application_folder, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		);
	}
}
elseif (is_dir(BASEPATH.$application_folder.DIRECTORY_SEPARATOR))
{
	$application_folder = BASEPATH.strtr(
		trim($application_folder, '/\\'),
		'/\\',
		DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
	);
}
else
{
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
	exit(3); // EXIT_CONFIG
}

define('APPPATH', $application_folder.DIRECTORY_SEPARATOR);

// The path to the "views" directory
if ( ! is_dir($view_folder))
{
	if ( ! empty($view_folder) && is_dir(APPPATH.$view_folder.DIRECTORY_SEPARATOR))
	{
		$view_folder = APPPATH.$view_folder;
	}
	elseif ( ! is_dir(APPPATH.'views'.DIRECTORY_SEPARATOR))
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your view folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
		exit(3); // EXIT_VIEW
	}
	else
	{
		$view_folder = APPPATH.'views';
	}
}

define('VIEWPATH', $view_folder.DIRECTORY_SEPARATOR);

/*
| --------------------------------------------------------------------
| LOAD THE BOOTSTRAP FILE
| --------------------------------------------------------------------
|
| And away we go...
|
*/
require_once BASEPATH.'core/CodeIgniter.php';
