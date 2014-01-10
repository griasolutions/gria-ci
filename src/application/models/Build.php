<?php

namespace Application\Model;

use Gria\Model;

class Build implements Model\ModelInterface
{

	/** @var int */
	private $_id;

	/** @var int */
	private $_jobId;

	/** @var int */
	private $_triggerId;

	/** @var int */
	private $_statusId;

	/** @var string */
	private $_username;

	/** @var string */
	private $_source;

	/** @var \DateTime */
	private $_startTime;

	/** @var \DateTime */
	private $_endTime;

	/**
	 * @param array $data
	 */
	public function __construct(array $data)
	{
		$this->setId($data['id']);
		$this->setJobId($data['job_id']);
		$this->setTriggerId($data['trigger_id']);
		$this->setStatusId($data['status_id']);
		$this->setUsername($data['username']);
		$this->setSource($data['source']);
		$this->setStartTime($data['start_time']);
		$this->setEndTime($data['end_time']);
	}

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
	 * @param int $jobId
	 */
	public function setJobId($jobId)
	{
		$this->_jobId = $jobId;
	}

	/**
	 * @return int
	 */
	public function getJobId()
	{
		return $this->_jobId;
	}

	/**
	 * @param int $statusId
	 */
	public function setStatusId($statusId)
	{
		$this->_statusId = $statusId;
	}

	/**
	 * @return int
	 */
	public function getStatus()
	{
		return $this->_statusId;
	}

	/**
	 * @param int $triggerId
	 */
	public function setTriggerId($triggerId)
	{
		$this->_triggerId = $triggerId;
	}

	/**
	 * @return int
	 */
	public function getTriggerId()
	{
		return $this->_triggerId;
	}

	/**
	 * @param string $username
	 */
	public function setUsername($username)
	{
		$this->_username = $username;
	}

	/**
	 * @return string
	 */
	public function getUsername()
	{
		return $this->_username;
	}

	/**
	 * @param string $source
	 */
	public function setSource($source)
	{
		$this->_source = $source;
	}

	/**
	 * @return string
	 */
	public function getSource()
	{
		return $this->_source;
	}

	/**
	 * @param \DateTime $startTime
	 */
	public function setStartTime($startTime)
	{
		$this->_startTime = $startTime;
	}

	/**
	 * @return \DateTime
	 */
	public function getStartTime()
	{
		return $this->_startTime;
	}

	/**
	 * @param \DateTime $endTime
	 */
	public function setEndTime(\DateTime $endTime)
	{
		$this->_endTime = $endTime;
	}

	/**
	 * @return \DateTime
	 */
	public function getEndTime()
	{
		return $this->_endTime;
	}

} 