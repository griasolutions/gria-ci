<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/3/14
 * Time: 3:48 PM
 */

namespace GriaTest\Unit\Controller;

use \Gria\Controller;

class DispatcherTest extends \PHPUnit_Framework_TestCase
{

	private $_request;

	public function setUp()
	{
		$this->_request = $this->getMock('\Gria\Controller\Request', array(
			'getHost', 'getControllerName'));
		$this->_request->expects($this->any())
			->method('getHost')
			->will($this->returnValue('localhost'));
	}

	/**
	 * @expectedException
	 */
	public function testGetErrorController()
	{
		$this->getRequest()->expects($this->any())
			->method('getControllerName')
			->will($this->returnValue('stupidness'));
		$dispatcher = new Controller\Dispatcher($this->getRequest());
		$this->assertInstanceOf('\Application\Controller\Error', $dispatcher->getController());
	}

	public function testGetValidController()
	{
		$this->getRequest()->expects($this->any())
			->method('getControllerName')
			->will($this->returnValue('dashboard'));
		$dispatcher = new Controller\Dispatcher($this->getRequest());
		$this->assertInstanceOf('\Application\Controller\Dashboard', $dispatcher->getController());
	}

	public function getRequest()
	{
		return $this->_request;
	}
} 