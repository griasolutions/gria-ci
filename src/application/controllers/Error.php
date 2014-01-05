<?php
namespace Application\Controller;

use \Gria\Controller;

class Error extends Controller\ErrorController
{

	public function route()
	{
		parent::route();
		$this->getResponse()->setBody('Nope!');
	}

}