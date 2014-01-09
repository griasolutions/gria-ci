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
	 * @param \PDO $db
	 */
	public function __construct(\PDO $db);

	/**
	 * @return \PDO
	 */
	public function getDb();

	/**
	 * @return string
	 */
	public function getTableName();

	/**
	 * @return string
	 */
	public function getModelClassName();

	/**
	 * @param int $offset
	 * @param int $limit
	 * @return \ArrayObject
	 */
	public function findAll($offset = 0, $limit = 0);

	/**
	 * @param $id
	 * @return \ArrayObject
	 */
	public function findById($id);

	/**
	 * @param string $field
	 * @param mixed $value
	 * @return \ArrayObject
	 */
	public function findByField($field, $value);

	/**
	 * @param array $data
	 * @return \Gria\Model\Model
	 */
	public function create(array $data);

	/**
	 * @param mixed $id
	 * @param array $data
	 * @return \Gria\Model\Model
	 */
	public function update($id, array $data);

	/**
	 * @param mixed $id
	 * @return boolean
	 */
	public function delete($id);

} 