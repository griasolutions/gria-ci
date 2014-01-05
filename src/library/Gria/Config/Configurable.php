<?php

namespace Gria\Config;

class Configurable
{

	/** @var \Gria\Config\Config * */
	private $_config;

	/**
	 * @param \Gria\Config\Config $config
	 */
	public function __construct(Config $config)
	{
		$this->_config = $config;
	}

	/**
	 * @return \Gria\Config\Config
	 */
	public function getConfig()
	{
		return $this->_config;
	}

}
