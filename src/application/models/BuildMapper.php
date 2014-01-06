<?php
/**
 * Created by IntelliJ IDEA.
 * User: gfisher
 * Date: 1/5/14
 * Time: 1:50 PM
 */

namespace Application\Model;

use \GriaCi\Model;

class BuildMapper extends Model\Mapper
{

	/**
	 * @inheritdoc
	 */
	public function __construct()
	{
		parent::__construct(dirname(dirname(__FILE__)) . '/data/builds.xml');
	}

} 