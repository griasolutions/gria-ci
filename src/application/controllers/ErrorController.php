<?php
namespace Application;

use \GriaCi\Controller;

class ErrorController extends Controller\ErrorController
{

 	public function route()
	{
		die('Nope!');
	}

}