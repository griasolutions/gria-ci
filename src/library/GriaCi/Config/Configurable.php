<?php


namespace GriaCi;

class Configurable
{

	/** @var \GriaCi\Config **/
	private $_config;

	/**
	* @param \GriaCi\Config $config
	*/
	public function __construct(\GriaCi\Config $config)
	{
		$this->_config = $config;
	}

	/**
	* @return \GriaCi\Config
	*/
	public function getConfig()
	{
		return $this->_config;
	}

}
