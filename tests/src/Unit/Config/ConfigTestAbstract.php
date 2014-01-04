<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/3/14
 * Time: 1:29 PM
 */

namespace ApplicationTest\Unit\Config;

use \GriaCi\Config;

abstract class ConfigTestAbstract extends \PHPUnit_Framework_TestCase
{
	/** @var \GriaCi\Config\Config */
	private $_config;

	public function setUp()
	{
		$this->_config = new Config\Config('tests/fixtures/config/test.ini');
	}

	/**
	 * @return \GriaCi\Config\Config
	 */
	public function getConfig()
	{
		return $this->_config;
	}

} 