<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/3/14
 * Time: 3:48 PM
 */

namespace GriaTest\Unit\Controller;

use \Gria\Controller;

class ErrorControllerTest extends \PHPUnit_Framework_TestCase
{

	private $_request;

	public function setUp()
	{
		$this->_request = $this->getMock('\Gria\Controller\Request', array(
			'getHost', 'getUri'));
		$this->_request->expects($this->any())
			->method('getHost')
			->will($this->returnValue('localhost'));
		$this->_request->expects($this->any())
			->method('getUri')
			->will($this->returnValue('/test'));
	}

	public function testException()
	{
		$dispatcher = new \Gria\Controller\Dispatcher($this->getRequest());
		$controller = $dispatcher->getController();
		$this->assertInstanceOf('\Exception', $controller->getException());
	}

	public function getRequest()
	{
		return $this->_request;
	}
} 