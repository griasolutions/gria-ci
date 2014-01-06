<?php
/**
 * This file is part of the Gria library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gria\Controller;

use \Gria\View;
use \Gria\Config;

class Controller implements ControllerInterface
{

	use RequestAwareTrait, Config\ConfigAwareTrait;

	/** @var \Gria\View\View */
	private $_view;

	/** @var \Gria\Controller\Response */
	private $_response;

	/**
	 * @inheritdoc
	 */
	public function __construct(Request $request, Config\Config $config)
	{
		$this->setRequest($request);
		$this->setConfig($config);
		$this->_view = new View\View($request, $config);
		$this->_response = new Response();
		$className = strtolower(get_called_class());
		$this->_view->setSourcePath(array_pop(explode('\\', $className)));
	}

	/**
	 * @inheritdoc
	 */
	public function route()
	{
		$actionMethodName = $this->getRequest()->getActionName() . 'Action';
		if (!method_exists($this, $actionMethodName)) {
			throw new \InvalidArgumentException('Invalid action requested', 500);
		}
		$this->$actionMethodName();
	}

	/**
	 * @return void
	 */
	public function respond()
	{
		$output = $this->getView()->render();
		$this->getResponse()->setBody($output);
		$this->getResponse()->send();
	}

	/**
	 * @inheritdoc
	 */
	public function getView()
	{
		return $this->_view;
	}

	/**
	 * @inheritdoc
	 */
	public function getResponse()
	{
		return $this->_response;
	}

} 