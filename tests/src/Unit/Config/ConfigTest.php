<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/3/14
 * Time: 1:29 PM
 */

namespace ApplicationTest\Unit\Config;

class ConfigTest extends ConfigTestAbstract
{

	const ERROR_FORMAT = 'Cannot read %s from the config!';

	public function testGetString()
	{
		$this->assertEquals('GriaCi', $this->getConfig()->get('application'), sprintf(self::ERROR_FORMAT, 'strings'));
	}

	public function testGetIntegers()
	{
		$this->assertEquals(42, $this->getConfig()->get('answer'), sprintf(self::ERROR_FORMAT, 'integers'));
	}

	public function testGetBooleans()
	{
		$this->assertEquals(true, $this->getConfig()->get('isTest'), sprintf(self::ERROR_FORMAT, 'booleans'));
	}

} 