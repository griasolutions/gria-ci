<?php
/**
 * This file is part of the Gria library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Model;

use \Gria\Model;

class BuildMapper implements Model\MapperInterface
{

	private $_modelName;
	private $_xml;
	private $_xmlPath;

	public function __construct($xmlPath)
	{
		// dirname(dirname(__FILE__)) . '/data/builds.xml'
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

	public function create(array $data)
	{

	}

	public function update($id, array $data)
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