<?php
namespace Application\Controller;

use \GriaCi\Controller;

class Error extends Controller\ErrorController
{

 	public function route()
	{
		die('Nope!');
	}

}