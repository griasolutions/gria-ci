<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/3/14
 * Time: 12:02 PM
 */

namespace GriaCi\Controller;

interface ControllerInterface
{

	/**
	 * @param \GriaCi\Controller\Request $request
	 */
	public function __construct(Request $request);

	/**
	 * @return void
	 */
	public function init();

	/**
	 * @return void
	 */
	public function route();

	/**
	 * @return \GriaCi\Controller\Request
	 */
	public function getRequest();

}