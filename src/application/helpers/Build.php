<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/5/14
 * Time: 11:56 AM
 */

namespace GriaCi\Helper;

use \Application\Model;

class Build
{

	private $_buildMapper;

	public function __construct()
	{
		$this->_buildMapper = new Model\BuildMapper();
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