<?php
/**
 * This file is part of the Gria library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gria\Controller;

class Request
{

	/** @var string */
	private $_host;

	/** @var string */
	private $_uri;

	/** @var string */
	private $_url;

	/** @var string */
	private $_controllerName;

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
	public function getHost()
	{
		if (!$this->_host) {
			$this->_host = filter_input(INPUT_SERVER, 'HTTP_HOST');
		}

		return $this->_host;
	}

	/**
	 * @return string
	 */
	public function getUri()
	{
		if (!$this->_uri) {
			$this->_uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
		}

		return $this->_uri;
	}

	/**
	 * @return string
	 */
	public function getUrl()
	{
		if (!$this->_url) {
			$this->_url = 'http://' . $this->getHost() . $this->getUri();
		}

		return $this->_url;
	}

	/**
	 * @return string
	 */
	public function getControllerName()
	{
		if (!$this->_controllerName) {
			$uriParts = explode('/', $this->getUri());
			array_shift($uriParts);
			if (!isset($uriParts[0])) {
				$this->_controllerName = 'dashboard';
			} else {
				switch ($uriParts[0]) {
					case '':
					case 'dashboard':
						$this->_controllerName = 'dashboard';
						break;
					default:
						$this->_controllerName = $uriParts[0];
						break;
				}
			}
		}

		return $this->_controllerName;
	}

}