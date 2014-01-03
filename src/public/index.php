<?php

// set the include path
set_include_path(implode(PATH_SEPARATOR, array(
	get_include_path(),
	realpath('../../vendor'),
	realpath('../../src/library'),
)));

// initialize the auto-loader
(new \GriaCi\Autoload\Autoloader())->init();

// pull in composer dependencies
require '../../vendor/autoload.php';

// dispatch the call
