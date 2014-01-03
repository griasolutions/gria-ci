<?php

// define the base path
define('APPLICATION_PATH', realpath(dirname(dirname(dirname(__FILE__)))));

// set the include path
set_include_path(implode(PATH_SEPARATOR, array(
	get_include_path(),
	APPLICATION_PATH,
	APPLICATION_PATH . '/vendor',
	APPLICATION_PATH . '/src/library',
)));

// initialize the auto-loader
require 'GriaCi/Autoload/Autoloader.php';
(new \GriaCi\Autoload\Autoloader())->init();

// pull in composer dependencies
require 'vendor/autoload.php';

// dispatch the call
(new \GriaCi\Controller\Dispatcher())->run();