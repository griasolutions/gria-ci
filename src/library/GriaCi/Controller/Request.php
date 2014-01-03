<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/3/14
 * Time: 12:04 PM
 */

namespace GriaCi\Controller;


class Request
{

	/** @var string */
	private $_url;

	/** @var string */
	private $_uri;

	/** @var string */
	private $_controllerName;

	/**
	 * @return void
	 */
	public function __construct()
	{
		$url = 'http://'
			. filter_input(INPUT_SERVER, 'HTTP_HOST')
			. filter_input(INPUT_SERVER, 'REQUEST_URI');
		$this->_url = $url;
		$urlParts = parse_url($url);
		$this->_uri = $urlParts['path'];
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->getUrl();
	}

	/**
	 * @return string
	 */
	public function getUrl()
	{
		return $this->_url;
	}

	/**
	 * @return string
	 */
	public function getUri()
	{
		return $this->_uri;
	}

	/**
	 * @return string
	 */
	public function getControllerName()
	{
		if (!$this->_controllerName) {
			$uriParts = explode('/', $this->getUri());
			switch($uriParts[0]) {
				case '':
				case 'dashboard':
					$this->_controllerName = 'dashboard';
					break;
				case 'hooks':
					$this->_controllerName = 'hooks';
					break;
				default:
					$this->_controllerName = 'error';
					break;
			}
		}
		return $this->_controllerName;
	}

}