<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/5/14
 * Time: 7:17 PM
 */

namespace GriaCi\Helper;

use \Gria\Config;

class Job
{

	use Config\ConfigAwareTrait;

	public function __construct(Config\Config $config)
	{
		$this->setConfig($config);
	}

	public function getJobs()
	{
		$allJobs = $this->getConfig()->getConfig();
		$jobs = [];
		foreach ($allJobs as $key => $job) {
			if (strstr($key, ':')) {
				continue;
			}
			$jobs[$key] = $job;
		}

		return $jobs;

		return $this->getConfig()->getConfig();
	}

} 