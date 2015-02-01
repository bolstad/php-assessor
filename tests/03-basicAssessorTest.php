<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Assessor\Validate;

class WordpressSlugTest extends PHPUnit_Framework_TestCase {
	/** 
	 * @test 
	 */
	public function staticHtmlIsLoadedCorrectly() {

		$validator = new Validate('helloz');
		$result = $validator->getHtml();
		$expectedResult = 'helloz';
		$this->assertEquals($expectedResult,$result,"Dummy returndata successful");

	}
}

