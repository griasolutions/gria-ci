<?php

// set the include path
set_include_path(implode(PATH_SEPARATOR, array(
	get_include_path(),
	realpath(dirname(dirname(__FILE__))),
	realpath(dirname(dirname(__FILE__)) . '/vendor'),
	realpath(dirname(dirname(__FILE__)) . '/src/library'),
)));

// initialize the auto-loader
require 'GriaCi/Autoload/Autoloader.php';
(new \GriaCi\Autoload\Autoloader())->init();

// pull in composer dependencies
require 'vendor/autoload.php';