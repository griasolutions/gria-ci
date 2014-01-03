<?php

namespace ApplicationTest\Unit\Config;

use \GriaCi\Config;

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
		$this->assertInstanceOf('\GriaCi\Config\Config', $this->$this->getConfigurable()->getConfig());
	}

	public function getConfigurable()
	{
		return $this->_configurable;
	}

}