<?php

namespace Gria\Cli;

// APPLICATION=WP-Write WORKSPACE_PATH=`pwd`/wp-write REPOSITORY_URL=git@bitbucket.org:guillermoandrae/wp-write.git ~/Sites/gria-ci/bin/build.sh

use \Gria\Config;

abstract class LockableCommand extends Config\Configurable
{

	const NUM_MAX_EXECUTION_ATTEMPTS = 3;

	const NUM_EXECUTION_INTERVAL_SECONDS = 5;

	private $_scriptPath;

	private $_lockPath;

	public function __construct(Config\Config $config)
	{
		parent::__construct($config);
		$this->_lockPath = '';
		$this->init();
	}

	public function init()
	{
	}

	public function run()
	{
		for ($i = 0; $i < static::NUM_MAX_EXECUTION_ATTEMPTS; $i++) {
			if (!$this->isLocked()) {
				$this->lock();
				$this->executeCommand();
				$this->unlock();

				return;
			}
			sleep(static::NUM_EXECUTION_INTERVAL_SECONDS);
		}
	}

	public function executeCommand()
	{
		exec($this->getCommand(), $output, $exitStatus);

		return $exitStatus;
	}

	abstract public function getCommand();

	public function isLocked()
	{
		return file_exists($this->getLockPath());
	}

	public function lock()
	{
		touch($this->getLockPath());
	}

	public function unlock()
	{
		unlink($this->getLockPath());
	}

	public function setScriptPath($scriptPath)
	{
		$this->_scriptPath = $scriptPath;
	}

	public function getScriptPath()
	{
		return $this->_scriptPath;
	}

	public function getLockPath()
	{
		return $this->_lockPath;
	}

}
