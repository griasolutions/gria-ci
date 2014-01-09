<?php

if (php_sapi_name() !== 'cli-server') {
	return false;
}

if (file_exists(__DIR__ . '/public/' . $_SERVER['REQUEST_URI'])) {
	return false;
} else {
	ini_set('display_errors', true);
	include_once 'public/index.php';
}