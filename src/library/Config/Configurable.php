<?php

namespace GriaCi\Config;

class Configurable
{

	/** @var \GriaCi\Config\Config **/
	private $_config;

	/**
	* @param \GriaCi\Config\Config $config
	*/
	public function __construct(Config $config)
	{
		$this->_config = $config;
	}

	/**
	* @return \GriaCi\Config\Config
	*/
	public function getConfig()
	{
		return $this->_config;
	}

}
