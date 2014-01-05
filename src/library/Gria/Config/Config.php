<?php
/**
 * This file is part of the Gria library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gria\Config;

class Config
{

	/** @var string */
	private $_path;

	/** @var array */
	private $_config = array();

	/**
	 * @param string $path
	 * @return \Gria\Config\Config
	 */
	public function __construct($path)
	{
		if ($this->_path = realpath($path)) {
			$ini = new \IniParser($this->_path);
			$this->_config = $ini->parse();
		}
	}

	/**
	 * @return array
	 */
	public function getConfig()
	{
		return $this->_config;
	}

	/**
	 * @return string
	 */
	public function getPath()
	{
		return $this->_path;
	}

	/**
	 * @param $key
	 * @return mixed
	 */
	public function get($key)
	{
		$config = $this->getConfig();
		if (array_key_exists($key, $config)) {
			return $config[$key];
		}
	}

}