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
	private $_data = array();

	/**
	 * @param string $path
	 * @return \Gria\Config\Config
	 */
	public function __construct($path)
	{
		if ($this->_path = realpath($path)) {
			$ini = new \IniParser($this->_path);
			$data = $ini->parse();
			foreach ($data as $environment => $settings) {
				if (APPLICATION_ENV == trim($environment)) {
					$this->_data = $settings;
					break;
				}
			}
		}
	}

	/**
	 * @return array
	 */
	public function getData()
	{
		return $this->_data;
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
		$data = $this->getData();
		if (array_key_exists($key, $data)) {
			return $data[$key];
		}
	}

}