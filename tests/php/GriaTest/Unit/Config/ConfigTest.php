<?php

namespace GriaTest\Unit\Config;

use \Gria\Config;

class ConfigTest extends \PHPUnit_Framework_TestCase
{

	const ERROR_FORMAT = 'Cannot read %s from the config!';

	/** @var \Gria\Config\Config */
	private $_config;

	public function setUp()
	{
		$path = 'tests/fixtures/config/test.ini';
		$this->_config = new Config\Config($path);
	}

	public function testGetString()
	{
		$this->assertEquals('Application', $this->getConfig()->get('application'), sprintf(self::ERROR_FORMAT, 'strings'));
	}

	public function testGetIntegers()
	{
		$this->assertEquals(42, $this->getConfig()->get('answer'), sprintf(self::ERROR_FORMAT, 'integers'));
	}

	public function testGetBooleans()
	{
		$this->assertEquals(true, $this->getConfig()->get('isTest'), sprintf(self::ERROR_FORMAT, 'booleans'));
	}

	public function testGetConfig()
	{
		$expected = new \ArrayObject(array(
			'application' => 'Application',
			'answer' => 42,
			'isTest' => true
		));
		$this->assertEquals($expected, $this->getConfig()->getConfig());
	}

	public function testGetPath()
	{
		$this->assertEquals(realpath('tests/fixtures/config/test.ini'), $this->getConfig()->getPath());
	}

	/**
	 * @return \Gria\Config\Config
	 */
	public function getConfig()
	{
		return $this->_config;
	}

} 