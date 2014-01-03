<?php

// set the include path
set_include_path(implode(PATH_SEPARATOR, array(
	get_include_path(),
	dirname(dirname(dirname(__FILE__))),
)));

// pull in composer dependencies
require 'vendor/autoload.php';

// dispatch the call
(new \GriaCi\Controller\Dispatcher(new \GriaCi\Controller\Request()))->run();