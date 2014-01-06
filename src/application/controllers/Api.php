<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/5/14
 * Time: 10:18 PM
 */

namespace Application\Controller;

use \Gria\Controller;
use \GriaCi\Helper;

class Api extends Controller\Controller
{

	public function route()
	{
		$this->getResponse()->setContentType('application/json');
		parent::route();
	}

	public function buildsAction()
	{
		$helper = new Helper\Build();
		$finishedBuilds = $helper->getFinishedBuilds();
		$this->getView()->set('payload', json_encode($finishedBuilds));
	}

}