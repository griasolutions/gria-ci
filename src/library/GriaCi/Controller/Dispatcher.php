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

	/** @var \GriaCi\Controller\Request */
	private $_request;

	/** @var \GriaCi\Controller\Controller */
	private $_controller;

	/**
	 * @param \GriaCi\Controller\Request $request
	 */
	public function __construct(Request $request)
	{
		$this->_request = $request;
	}

	/**
	 * @return void
	 */
	public function run()
	{
		$this->getController()->route();
	}

	/**
	 * @return \GriaCi\Controller\ErrorController|\GriaCi\Controller\Controller
	 */
	public function getController()
	{
		if (!$this->_controller) {
			$request = $this->getRequest();
			$controllerName = 'Application\\' . ucfirst($request->getControllerName()) . 'Controller';
			try {
				$controller = new $controllerName($request);
			} catch (\Exception $ex) {
				$controller = new ErrorController($request);
				$controller->setException($ex);
			}
			$this->_controller = $controller;
		}
		return $this->_controller;
	}

	/**
	 * @return \GriaCi\Controller\Request
	 */
	public function getRequest()
	{
		return $this->_request;
	}

} 