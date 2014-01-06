<?php

namespace Gria\Config;

trait ConfigAwareTrait
{

	/** @var \Gria\Config\Config * */
	private $_config;

	/**
	 * @param \Gria\Config\Config $config
	 */
	public function setConfig(Config $config)
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
