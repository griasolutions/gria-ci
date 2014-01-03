<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/3/14
 * Time: 3:48 PM
 */

namespace ApplicationTest\Unit\Controller;

use \GriaCi\Controller;

class DispatcherTest extends \PHPUnit_Framework_TestCase
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

	public function testGetController()
	{
		$this->getRequest()->expects($this->any())
			->method('getControllerName')
			->will($this->returnValue('dashboard'));
		$dispatcher = new Controller\Dispatcher($this->getRequest());
		$this->assertInstanceOf('\Application\DashboardController', $dispatcher->getController());
	}

	public function getRequest()
	{
		return $this->_request;
	}
} 