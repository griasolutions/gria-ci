<?php
/**
 * This file is part of the Gria library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gria\Model;

use \Gria\Db;
use \ICanBoogie\Inflector;

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
	public function __construct(Db\Db $db)
	{
		$this->_db = $db;
		if (!preg_match('/([\w]+)Mapper/', get_called_class(), $matches)) {
			throw new InvalidModelException(sprintf('%s is an invalid model name', get_called_class()));
		}
		$modelName = $matches[0];
		$this->_tableName = Inflector::get()->pluralize(strtolower($modelName));
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

	/**
	 * @inheritdoc
	 */
	public function create(array $data)
	{
		$values = implode(',:', array_keys($data));
		$sql = 'INSERT INTO ' . $this->getTableName() . ' values(' . $values . ')';
		$statement = $this->getDb()->bindParamArray(new \PDOStatement($sql), $data);

		return $statement->execute();
	}

	/**
	 * @inheritdoc
	 */
	public function update($id, array $data)
	{
		$sql = 'UPDATE ' . $this->getTableName() . ' SET ';
		$setStatements = array_map(function ($value) {
			return $value . ' = :' . $value;
		}, array_keys($data));
		$sql .= implode(',', $setStatements);
		$sql .= ' WHERE id = :id';
		$statement = $this->getDb()->bindParamArray(
		new \PDOStatement($sql),
			array_merge(array('id' => $id), $data)
		);

		return $statement->execute();
	}

	/**
	 * @inheritdoc
	 */
	public function delete($id)
	{
		$sql = 'DELETE FROM ' . $this->getTableName() . ' WHERE id = :id';

		return (new \PDOStatement($sql))->execute();
	}

} 