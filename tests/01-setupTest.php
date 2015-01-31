<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Assessor\Validate;

class WordpressSlugTest extends PHPUnit_Framework_TestCase {
	/** 
	 * @test 
	 */
	public function slugIsGeneratedCorrectly() {


		$result = Validate::world();
		$expectedResult = 'helloz';
		$this->assertEquals($expectedResult,$result,"Dummy returndata successful");

	}
}

