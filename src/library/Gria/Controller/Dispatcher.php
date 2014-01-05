<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/3/14
 * Time: 12:08 PM
 */

namespace Gria\Controller;

class Dispatcher
{

	use RequestAwareTrait;

	/** @var \Gria\Controller\Controller */
	private $_controller;

	/**
	 * @param \Gria\Controller\Request $request
	 */
	public function __construct(Request $request)
	{
		$this->setRequest($request);
	}

	/**
	 * @return void
	 */
	public function run()
	{
		$this->getController()->route();
		$this->getController()->respond();
	}

	/**
	 * @return \Gria\Controller\ErrorController|\Gria\Controller\Controller
	 */
	public function getController()
	{
		if (!$this->_controller) {
			$request = $this->getRequest();
			try {
				$controllerName = $request->getControllerName();
				$controllerClassName = 'Application\Controller\\' . ucfirst($controllerName);
				$reflectionClass = new \ReflectionClass($controllerClassName);
				$controller = $reflectionClass->newInstance($request);
			} catch (\Exception $ex) {
				$controller = new \Application\Controller\Error($request);
				$controller->setException($ex);
			}
			$this->_controller = $controller;
		}

		return $this->_controller;
	}

}