<?php

namespace Application\Model;

use Gria\Model;

class Job implements Model\ModelInterface
{

	/** @var int */
	private $_id;

	/** @var string */
	private $_name;

	/** @var string */
	private $_repositoryUrl;

	/** @var string */
	private $_codeCoverage;

	/** @var string */
	private $_phpmdIsEnabled;

	/** @var string */
	private $_phpmdMinimumPriority;

	/** @var string */
	private $_phpcsIsEnabled;

	/** @var string */
	private $_phpcsRuleset;

	/** @var string */
	private $_deployDestinationType;

	/** @var string */
	private $_deployDestinationPath;

	/** @var string */
	private $_deployDestinationUsername;

	/** @var string */
	private $_deployDestinationServer1;

	/** @var string */
	private $_deployDestinationServer2;

	/** @var string */
	private $_deployDestinationServer3;

	/** @var string */
	private $_deployDestinationServer4;

	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->_id = $id;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->_name = $name;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param string $repositoryUrl
	 */
	public function setRepositoryUrl($repositoryUrl)
	{
		$this->_repositoryUrl = $repositoryUrl;
	}

	/**
	 * @return string
	 */
	public function getRepositoryUrl()
	{
		return $this->_repositoryUrl;
	}

	/**
	 * @param string $codeCoverage
	 */
	public function setCodeCoverage($codeCoverage)
	{
		$this->_codeCoverage = $codeCoverage;
	}

	/**
	 * @return string
	 */
	public function getCodeCoverage()
	{
		return $this->_codeCoverage;
	}

	/**
	 * @param string $phpmdIsEnabled
	 */
	public function setPhpmdIsEnabled($phpmdIsEnabled)
	{
		$this->_phpmdIsEnabled = $phpmdIsEnabled;
	}

	/**
	 * @return string
	 */
	public function getPhpmdIsEnabled()
	{
		return $this->_phpmdIsEnabled;
	}

	/**
	 * @param string $phpmdMinimumPriority
	 */
	public function setPhpmdMinimumPriority($phpmdMinimumPriority)
	{
		$this->_phpmdMinimumPriority = $phpmdMinimumPriority;
	}

	/**
	 * @return string
	 */
	public function getPhpmdMinimumPriority()
	{
		return $this->_phpmdMinimumPriority;
	}

	/**
	 * @param string $phpcsIsEnabled
	 */
	public function setPhpcsIsEnabled($phpcsIsEnabled)
	{
		$this->_phpcsIsEnabled = $phpcsIsEnabled;
	}

	/**
	 * @return string
	 */
	public function getPhpcsIsEnabled()
	{
		return $this->_phpcsIsEnabled;
	}

	/**
	 * @param string $phpcsRuleset
	 */
	public function setPhpcsRuleset($phpcsRuleset)
	{
		$this->_phpcsRuleset = $phpcsRuleset;
	}

	/**
	 * @return string
	 */
	public function getPhpcsRuleset()
	{
		return $this->_phpcsRuleset;
	}

	/**
	 * @param string $deployDestinationType
	 */
	public function setDeployDestinationType($deployDestinationType)
	{
		$this->_deployDestinationType = $deployDestinationType;
	}

	/**
	 * @return string
	 */
	public function getDeployDestinationType()
	{
		return $this->_deployDestinationType;
	}

	/**
	 * @param string $deployDestinationPath
	 */
	public function setDeployDestinationPath($deployDestinationPath)
	{
		$this->_deployDestinationPath = $deployDestinationPath;
	}

	/**
	 * @return string
	 */
	public function getDeployDestinationPath()
	{
		return $this->_deployDestinationPath;
	}

	/**
	 * @param string $deployDestinationUsername
	 */
	public function setDeployDestinationUsername($deployDestinationUsername)
	{
		$this->_deployDestinationUsername = $deployDestinationUsername;
	}

	/**
	 * @return string
	 */
	public function getDeployDestinationUsername()
	{
		return $this->_deployDestinationUsername;
	}

	/**
	 * @param string $deployDestinationServer1
	 */
	public function setDeployDestinationServer1($deployDestinationServer1)
	{
		$this->_deployDestinationServer1 = $deployDestinationServer1;
	}

	/**
	 * @return string
	 */
	public function getDeployDestinationServer1()
	{
		return $this->_deployDestinationServer1;
	}

	/**
	 * @param string $deployDestinationServer2
	 */
	public function setDeployDestinationServer2($deployDestinationServer2)
	{
		$this->_deployDestinationServer2 = $deployDestinationServer2;
	}

	/**
	 * @return string
	 */
	public function getDeployDestinationServer2()
	{
		return $this->_deployDestinationServer2;
	}

	/**
	 * @param string $deployDestinationServer3
	 */
	public function setDeployDestinationServer3($deployDestinationServer3)
	{
		$this->_deployDestinationServer3 = $deployDestinationServer3;
	}

	/**
	 * @return string
	 */
	public function getDeployDestinationServer3()
	{
		return $this->_deployDestinationServer3;
	}

	/**
	 * @param string $deployDestinationServer4
	 */
	public function setDeployDestinationServer4($deployDestinationServer4)
	{
		$this->_deployDestinationServer4 = $deployDestinationServer4;
	}

	/**
	 * @return string
	 */
	public function getDeployDestinationServer4()
	{
		return $this->_deployDestinationServer4;
	}

}