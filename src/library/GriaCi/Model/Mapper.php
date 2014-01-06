<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/5/14
 * Time: 3:03 PM
 */

namespace GriaCi\Model;

use \Gria\Model;

class Mapper implements Model\MapperInterface
{

	private $_modelName;
	private $_xml;
	private $_xmlPath;

	public function __construct($xmlPath)
	{
		$this->_modelName = strtolower(str_replace('Mapper', '', array_pop(explode('\\', get_called_class()))));

		if (!file_exists($xmlPath)) {
			$xml = new \SimpleXMLElement('<data/>');
			file_put_contents($xmlPath, $xml->asXML());
		} else {
			$this->_xml = simplexml_load_file($xmlPath);
		}
		$this->_xmlPath = realpath($xmlPath);
	}

	public function findAll()
	{
		$models = new \ArrayObject();
		$data = $this->getXml();
		foreach ($data as $modelData) {
			$className = '\Application\Model\\' . $this->getModelName();
			$models[] = new $className($modelData);
		}

		return $models;
	}

	public function findById($id)
	{
		$models = $this->findAll();
		foreach ($models as $model) {
			if ($model->getId() == $id) {
				return $model;
			}
		}
	}

	public function create($data)
	{

	}

	public function update($id, $data)
	{

	}

	public function delete($id)
	{

	}

	public function getXml()
	{
		return $this->_xml;
	}

	public function getXmlPath()
	{
		return $this->_xmlPath;
	}

	public function getModelName()
	{
		return $this->_modelName;
	}

} 