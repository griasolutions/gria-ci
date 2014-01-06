<?php
/**
 * This file is part of the Gria library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gria\Model;

interface MapperInterface
{

	/**
	 * @return \ArrayObject
	 */
	public function findAll();

	/**
	 * @param $id
	 * @return \Gria\Model\Model
	 */
	public function findById($id);

} 