<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/3/14
 * Time: 12:08 PM
 */

namespace GriaCi\Controller;


use GriaCi\Application\ErrorController;

class Dispatcher
{

	public function run()
	{
		$request = new Request();
		$controllerName = ucfirst($request->getControllerName()) . 'Controller';
		try {
			$controller = new $controllerName($request);
		} catch (\Exception $ex) {
			$controller = new ErrorController($request);
			$controller->setException($ex);
		}
		$controller->route();
	}

} 