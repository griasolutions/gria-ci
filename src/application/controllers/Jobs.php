<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/5/14
 * Time: 7:52 PM
 */

namespace Application\Controller;

use \Gria\Controller;

class Jobs extends Controller\Controller
{

	public function route()
	{
		$this->getView()->set('jobsHelper', new \GriaCi\Helper\Job($this->getConfig()));
	}

} 