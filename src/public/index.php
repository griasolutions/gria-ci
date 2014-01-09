<?php

// set the include path
set_include_path(implode(PATH_SEPARATOR, array(
	get_include_path(),
	dirname(dirname(dirname(__FILE__)))
)));

// pull in composer dependencies
require 'vendor/autoload.php';

// run the application
$path = dirname(dirname(dirname(__FILE__))) . '/config/application.ini';
(new \Gria\Application\Application($path))->run();