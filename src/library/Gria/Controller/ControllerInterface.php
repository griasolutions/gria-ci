<?php
/**
 * This file is part of the Gria library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gria\Controller;

interface ControllerInterface
{

	/**
	 * @param \Gria\Controller\Request $request
	 */
	public function __construct(Request $request);

	/**
	 * @return void
	 */
	public function route();

	/**
	 * @return void
	 */
	public function respond();

	/**
	 * @return \Gria\View\View
	 */
	public function getView();

	/**
	 * @return \Gria\Controller\Response
	 */
	public function getResponse();

}