<?php

namespace Application\Helper;

use \Application\Model;
use \Gria\Db;

class Build
{

	private $_buildMapper;

	public function __construct()
	{
		$this->_buildMapper = new Model\BuildMapper(Db\Db::getInstance());
	}

	public function hasFinishedBuilds()
	{
		return (bool)($this->getFinishedBuilds() && $this->getQueuedBuilds());
	}

	public function getFinishedBuilds()
	{


	}

	public function getQueuedBuilds()
	{

	}

	public function getFailedBuilds()
	{

	}

	public function getSuccessRate()
	{
		$numFinishedBuilds = count($this->getFinishedBuilds());
		$numFailedBuilds = count($this->getFailedBuilds());
		$numTotalBuilds = $numFailedBuilds + $numFinishedBuilds;
		if ($numTotalBuilds == 0) {
			return 0;
		}

		return (($numFinishedBuilds / $numTotalBuilds) * 100);
	}

	public function getBuild($id)
	{

	}

	public function getBuildMapper()
	{
		return $this->_buildMapper;
	}

} 
