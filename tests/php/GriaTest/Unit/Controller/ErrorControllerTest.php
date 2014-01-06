<?php

namespace GriaTest\Unit\Controller;

use \Gria\Controller;

class ErrorControllerTest extends \PHPUnit_Framework_TestCase
{

	use RequestAwareTestTrait {
		setUp as requestTraitSetup;
	}

	private $_controller;

	public function setUp()
	{
		$this->requestTraitSetup();
		$this->_request->expects($this->any())
			->method('getUri')
			->will($this->returnValue('/test'));
		$dispatcher = new \Gria\Controller\Dispatcher($this->getRequest(), $this->getConfig());
		$this->_controller = $dispatcher->getController();
	}

	public function testSetGetException()
	{
		$this->assertInstanceOf('\Exception', $this->getController()->getException());
	}

	public function testRoute()
	{
		$this->getController()->route();
		$this->assertNotEquals(200, $this->getController()->getView()->get('statusCode'));
	}

	public function getController()
	{
		return $this->_controller;
	}

} 