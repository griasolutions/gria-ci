<?php

// timezone
date_default_timezone_set('America/New_York');

// set the include path
set_include_path(implode(PATH_SEPARATOR, array(
	get_include_path(),
	dirname(dirname(dirname(__FILE__)))
)));

// pull in composer dependencies
require 'vendor/autoload.php';

// define the application environment
defined('APPLICATION_ENV') || define('APPLICATION_ENV', 'production');

// run the application
$path = dirname(dirname(dirname(__FILE__))) . '/config/application.ini';
(new \Gria\Application\Application($path))->run();