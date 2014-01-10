<?php
/**
 * This file is part of the Gria library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gria\Db;

class Db
{

	/** @var \Gria\Db\Db */
	private static $_instance;

	/** @var string */
	private static $_dsn;

	/** @var \PDO */
	private $_db;

	/**
	 * @return \Gria\Db\Db
	 */
	public static function getInstance()
	{
		if (!self::$_instance) {
			$className = __CLASS__;
			self::$_instance = new $className;
		}

		return self::$_instance;
	}

	/**
	 * @param string $dsn
	 */
	public static function setDsn($dsn)
	{
		self::$_dsn = $dsn;
	}

	/**
	 * @return string
	 */
	public static function getDsn()
	{
		return self::$_dsn;
	}

	/**
	 * @param string $method
	 * @param array $arguments
	 * @throws \Gria\Db\Exception
	 */
	public function __call($method, array $arguments)
	{
		try {
			call_user_func_array(array($this->_db, $method), $arguments);
		} catch (\Exception $ex) {
			throw new Exception($ex->getMessage(), 500, $ex);
		}
	}

	public function select($tableName, $fields, array $where = array(), $fetchClassName = '')
	{
		$sql = 'SELECT ' . $fields . ' FROM ' . $tableName;
		if ($where) {
			$sql .= $this->_buildWhereClauseSql(self::QUERY_SELECT, $where);
		}
		if ($fetchClassName) {
			$statement = new \PDOStatement($sql, \PDO::FETCH_CLASS, $fetchClassName);
		} else {
			$statement = new \PDOStatement($sql);
		}
		if ($where) {
			$statement = $this->_bindParamArray($statement, $where);
		}

		return $statement->fetchAll();
	}

	public function create($tableName, array $data)
	{
		$values = implode(',:', array_keys($data));
		$sql = 'INSERT INTO ' . $tableName . ' values(' . $values . ')';
		$statement = $this->_bindParamArray(new \PDOStatement($sql), $data);

		return $statement->execute();
	}

	public function update($tableName, $id, array $where = array())
	{
		$sql = 'UPDATE ' . $tableName . ' SET ';
		$setStatements = array_map(function ($value) {
			return $value . ' = :' . $value;
		}, array_keys($where));
		$sql .= implode(',', $setStatements);
		$sql .= ' WHERE id = :id';
		$statement = $this->_bindParamArray(
			new \PDOStatement($sql),
			array_merge(array('id' => $id), $data)
		);

		return $statement->execute();
	}

	public function delete($tableName, array $where)
	{
		$sql = 'DELETE FROM ' . $tableName . ' WHERE id = :id';

		return (new \PDOStatement($sql))->execute();
	}

	/**
	 * @throws \Gria\Db\Exception
	 */
	private function __construct()
	{
		try {
			$this->_db = new \PDO(self::getDsn());
		} catch (\Exception $ex) {
			throw new Exception($ex->getMessage());
		}
	}

} 