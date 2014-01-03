<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/3/14
 * Time: 3:24 PM
 */

namespace ApplicationTest\Unit\Controller;

use \GriaCi\Controller;

class ControllerTest extends \PHPUnit_Framework_TestCase
{

	private $_request;

	public function setUp()
	{
		$this->_request = $this->getMock('\GriaCi\Controller\Request', array(
			'getHost', 'getUri'));
		$this->_request->expects($this->any())
			->method('getHost')
			->will($this->returnValue('example.com'));
	}

	public function testGetRequest()
	{
		$controller = new Controller\Controller($this->getRequest());
		$this->assertInstanceOf('\GriaCi\Controller\Request', $controller->getRequest());
	}

	public function getRequest()
	{
		return $this->_request;
	}
} 