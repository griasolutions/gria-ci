<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/3/14
 * Time: 12:03 PM
 */

namespace GriaCi\Controller;


class Controller implements ControllerInterface
{

	/** @var \GriaCi\Controller\Request */
	private $_request;

	/**
	 * @inheritdoc
	 */
	public function __construct(Request $request)
	{
		$this->_request = $request;
		$this->init();
	}

	/**
	 * @inheritdoc
	 */
	public function init()
	{

	}

	/**
	 * @inheritdoc
	 */
	public function route()
	{

	}

	/**
	 * @inheritdoc
	 */
	public function getRequest()
	{

	}

} 