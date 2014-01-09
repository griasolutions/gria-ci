<?php

namespace ApplicationTest\Unit\Model;

use \Application\Model;

class BuildMapperTest extends \PHPUnit_Framework_TestCase
{

	private $_mapper;
	private $_csvResource;

	public function setUp()
	{
		$db = new \PDO('sqlite3:tests/fixtures/data/gria-test.db');
		$this->_mapper = new Model\BuildMapper($db);
	}

	public function tearDown()
	{
		fclose($this->getBuildCsvResource());
	}

	public function testFindAll()
	{
		$builds = $this->getBuildMapper()->findAll();
		$this->assertInstanceOf('\ArrayObject', $builds);
		$this->assertInstanceOf('\Application\Model\Build', $builds[0]);
	}

	public function testCreate()
	{
		$data = fgetcsv($this->getBuildCsvResource());
		foreach ($data as $row) {
			$this->assertInstanceOf('\Application\Model\Build', $this->getBuildMapper()->create($row));
		}
	}

	public function testUpdate()
	{
		$id = 40;
		$data = array('triggerUser' => 'anonymous');
		$this->assertTrue($this->getBuildMapper()->update($id, $data));
		$build = $this->getBuildMapper()->findById($id);
		$this->assertInstanceOf('\Application\Model\Build', $build);
		$this->assertEquals('anonymous', $build->getTriggerUser());
	}

	public function testDelete()
	{
		$id = 40;
		$this->assertTrue($this->getBuildMapper()->delete($id));
		$this->assertNull('\Application\Model\Build', $this->getBuildMapper()->findById($id));
	}

	public function getBuildMapper()
	{
		return $this->_mapper;
	}

	public function getBuildCsvResource()
	{
		return $this->_csvResource;
	}

} 