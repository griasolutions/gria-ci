<?php
/**
 * This file is part of the Gria library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gria\Model;

abstract class MapperAbstract implements MapperInterface
{

	/** @var \PDO */
	private $_db;

	/** @var string */
	private $_tableName;

	/** @var string */
	private $_modelClassName;

	/**
	 * @inheritdoc
	 */
	public function __construct(\PDO $db)
	{
		$this->_db = $db;
		$pattern = '/Application\\Model\\([\w])Mapper\/';
		if (!preg_match($pattern, get_called_class(), $matches)) {
			throw new \Exception();
		}
		$modelName = $matches[0];
		$this->_tableName = strtolower($modelName);
		$this->_modelClassName = '\Application\Model\\' . $modelName ;
	}

	/**
	 * @inheritdoc
	 */
	public function getDb()
	{
		return $this->_db;
	}

	/**
	 * @inheritdoc
	 */
	public function getModelClassName()
	{
		return $this->_modelClassName;
	}

	/**
	 * @inheritdoc
	 */
	public function getTableName()
	{
		return $this->_tableName;
	}

	/**
	 * @inheritdoc
	 */
	public function findAll($offset = 0, $limit = 0)
	{
		$sql = 'SELECT * FROM ' . $this->getTableName();
		$statement = new \PDOStatement($sql, \PDO::FETCH_CLASS, $this->getModelClassName());
		return $statement->fetchAll();
	}

	/**
	 * @inheritdoc
	 */
	public function findById($id)
	{
		return $this->findByField('id', $id);
	}

	/**
	 * @inheritdoc
	 */
	public function findByField($field, $value)
	{
		$sql = 'SELECT * FROM ' . $this->getTableName() . ' WHERE ' . $field . ' = :value';
		$statement = new \PDOStatement($sql, \PDO::FETCH_CLASS, $this->getModelClassName());
		$statement->bindParam(':value', $value);
		return $statement->fetchAll();
	}

	public function create(array $data)
	{
		$values = implode(',:', array_keys($data));
		$sql = 'INSERT INTO ' . $this->getTableName() . ' values(' . $values . ')';
		$statement = new \PDOStatement($sql);
		foreach($data as $field => $value) {
			$statement->bindParam(':' . $field, $value);
		}
		return $statement->execute();
	}

	public function update($id, array $data)
	{
	}

	public function delete($id)
	{
		$sql = 'DELETE FROM ' . $this->getTableName() . ' WHERE id = :id';
		$statement = new \PDOStatement($sql);
		return $statement->execute();
	}

} 