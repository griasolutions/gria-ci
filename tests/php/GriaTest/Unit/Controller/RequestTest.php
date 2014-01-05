<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/5/14
 * Time: 2:01 AM
 */

namespace GriaTest\Unit\Controller;


class RequestTest extends \PHPUnit_Framework_TestCase
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

	public function testGetUrl()
	{
		$this->assertEquals('http://localhost/test', $this->getRequest()->getUrl());
	}

	public function testToString()
	{
		$this->assertEquals('http://localhost/test', $this->getRequest()->__toString());
	}

	public function testGetControllerName()
	{
		$this->assertEquals('test', $this->getRequest()->getControllerName());
	}

	public function testDefaultGetControllerName()
	{
		$dashboardRequest = $this->getMock('\Gria\Controller\Request', array(
			'getHost', 'getUri'));
		$dashboardRequest->expects($this->any())
			->method('getHost')
			->will($this->returnValue('localhost'));
		$dashboardRequest->expects($this->any())
			->method('getUri')
			->will($this->returnValue('/'));
		$this->assertEquals('dashboard', $dashboardRequest->getControllerName());
	}

	public function getRequest()
	{
		return $this->_request;
	}

} 