<?php
namespace Application;

use \GriaCi\Controller;

class DashboardController extends Controller\Controller
{
	public function route()
	{
		$this->render('dashboard');
	}

}