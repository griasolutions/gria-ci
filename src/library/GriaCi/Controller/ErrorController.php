<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/3/14
 * Time: 12:33 PM
 */

namespace GriaCi\Controller;


class ErrorController extends Controller
{

	/** @var \Exception */
	private $_exception;

	/**
	 * @param \Exception $ex
	 */
	public function setException(\Exception $ex)
	{
		$this->_exception = $ex;
	}

	/**
	 * @return \Exception
	 */
	public function getException()
	{
		return $this->_exception;
	}

} 