<?php
/**
 * This file is part of the Gria library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gria\Controller;

class ErrorController extends Controller
{

	/** @var \Exception */
	private $_exception;

	/**
	 * @inheritdoc
	 */
	public function route()
	{
		$statusCode = $this->getException()->getCode();
		$this->getResponse()->setStatusCode($statusCode);
		$this->getView()->set('statusCode', $statusCode);
	}

	/**
	 * @param \Exception $ex
	 *
	 * @return $this
	 */
	public function setException(\Exception $ex)
	{
		$this->_exception = $ex;

		return $this;
	}

	/**
	 * @return \Exception
	 */
	public function getException()
	{
		if (!$this->_exception) {
			$this->setException(new \Exception('An unknown error occurred', 500));
		}

		return $this->_exception;
	}

} 