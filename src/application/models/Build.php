<?php
/**
 * This file is part of the Gria library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Model;

use Gria\Model;

class Build implements Model\ModelInterface
{

	/** @var int */
	private $_id;

	/** @var string */
	private $_jobId;

	/** @var string */
	private $_trigger;

	/** @var string */
	private $_user;

	/** @var string */
	private $_source;

	/** @var \DateTime */
	private $_startTime;

	/** @var \DateTime */
	private $_endTime;

	/** @var string */
	private $_status;

	/**
	 * @param array $data
	 */
	public function __construct(array $data)
	{
		$this->setId($data['id']);
		$this->setJobId($data['jobId']);
		$this->setTrigger($data['trigger']);
		$this->setSource($data['source']);
		$this->setStartTime($data['startTime']);
		$this->setEndTime($data['endTime']);
		$this->setStatus($data['status']);
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
	 * @param string $jobId
	 */
	public function setJobId($jobId)
	{
		$this->_jobId = $jobId;
	}

	/**
	 * @return string
	 */
	public function getJobId()
	{
		return $this->_jobId;
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
	 * @param string $status
	 */
	public function setStatus($status)
	{
		$this->_status = $status;
	}

	/**
	 * @return string
	 */
	public function getStatus()
	{
		return $this->_status;
	}

	/**
	 * @param string $trigger
	 */
	public function setTrigger($trigger)
	{
		$this->_trigger = $trigger;
	}

	/**
	 * @return string
	 */
	public function getTrigger()
	{
		return $this->_trigger;
	}

	/**
	 * @param string $user
	 */
	public function setUser($user)
	{
		$this->_user = $user;
	}

	/**
	 * @return string
	 */
	public function getUser()
	{
		return $this->_user;
	}

} 