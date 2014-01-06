<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/5/14
 * Time: 3:25 PM
 */

namespace ApplicationTest\Unit\Model;

use \Application\Model;

class BuildMapperTest extends \PHPUnit_Framework_TestCase
{

	private $_mapper;

	public function setUp()
	{
		$this->_mapper = new Model\BuildMapper();
	}

	public function testFindAll()
	{
		$this->assertInstanceOf('\ArrayObject', $this->getBuildMapper()->findAll());
	}

	public function getBuildMapper()
	{
		return $this->_mapper;
	}

} 