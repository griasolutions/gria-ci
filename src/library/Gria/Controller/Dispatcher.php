<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/3/14
 * Time: 12:08 PM
 */

namespace Gria\Controller;

use \Gria\Config;
use GriaTest\Unit\Config\ConfigTestAbstract;

class Dispatcher
{

	use RequestAwareTrait, Config\ConfigAwareTrait;

	/** @var \Gria\Controller\Controller */
	private $_controller;

	/**
	 * @param \Gria\Controller\Request $request
	 * @param \Gria\Config\Config $config
	 */
	public function __construct(Request $request, Config\Config $config)
	{
		$this->setRequest($request);
		$this->setConfig($config);
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
			$config = $this->getConfig();
			try {
				$controllerName = $request->getControllerName();
				$controllerClassName = 'Application\Controller\\' . ucfirst($controllerName);
				try {
					$reflectionClass = new \ReflectionClass($controllerClassName);
					$controller = $reflectionClass->newInstance($request, $config);
				} catch (\ReflectionException $ex) {
					throw new \Exception('Invalid controller requested', 404);
				}
			} catch (\Exception $ex) {
				$controller = new \Application\Controller\Error($request, $config);
				$controller->setException($ex);
			}
			$this->_controller = $controller;
		}

		return $this->_controller;
	}

}