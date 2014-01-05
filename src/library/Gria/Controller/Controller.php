<?php
/**
 * This file is part of the Gria library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gria\Controller;

use \Gria\View;

class Controller implements ControllerInterface
{

	use RequestAwareTrait;

	/** @var  \Gria\View\View */
	private $_view;

	/** @var  \Gria\Controller\Response */
	private $_response;

	/**
	 * @inheritdoc
	 */
	public function __construct(Request $request)
	{
		$this->setRequest($request);
		$this->_view = new View\View($request);
		$this->_response = new Response();
		$className = strtolower(get_called_class());
		$this->_view->setSourcePath(array_pop(explode('\\', $className)));
	}

	/**
	 * @inheritdoc
	 */
	public function route()
	{

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