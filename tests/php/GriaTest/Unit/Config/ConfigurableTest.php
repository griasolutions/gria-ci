<?php

namespace GriaTest\Unit\Config;

use \Gria\Config;

class ConfigurableTest extends ConfigTestAbstract
{

	private $_configurable;

	public function setUp()
	{
		parent::setUp();
		$this->_configurable = new Config\Configurable($this->getConfig());
	}

	public function testGetConfig()
	{
		$this->assertInstanceOf('\Gria\Config\Config', $this->getConfigurable()->getConfig());
	}

	public function getConfigurable()
	{
		return $this->_configurable;
	}

}