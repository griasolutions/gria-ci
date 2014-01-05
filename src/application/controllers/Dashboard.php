<?php
namespace Application\Controller;

use \GriaCi\Controller;

class Dashboard extends Controller\Controller
{
	public function route()
	{
		$this->render('dashboard');
	}

}