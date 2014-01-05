<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/5/14
 * Time: 11:23 AM
 */

namespace GriaTest\Unit\View;

use \Gria\View;

class ViewTest extends \PHPUnit_Framework_TestCase
{

	private $_view;

	private $_request;

	public function setUp()
	{
		$this->_request = $this->getMock('\Gria\Controller\Request', array(
			'getControllerName'));
		$this->_request->expects($this->any())
			->method('getControllerName')
			->will($this->returnValue('index'));
		$this->_view = new View\View($this->_request);
	}

	public function testGetSet()
	{
		$this->getView()->set('example', 'data');
		$this->assertEquals('data', $this->getView()->get('example'));
	}

	public function testGetControllerName()
	{
		$this->assertEquals('index', $this->getView()->getControllerName());
	}

	public function getView()
	{
		return $this->_view;
	}

	public function getRequest()
	{
		return $this->getRequest();
	}

} 