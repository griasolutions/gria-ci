<?php

namespace Application\Helper;

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
		$jobs = array(
			array(
				'name' => 'job 1'
			),
			array(
				'name' => 'job 2'
			)
		);

		return $jobs;
	}

} 