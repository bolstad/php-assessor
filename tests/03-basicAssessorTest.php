<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Assessor\Validate;

class AssessorValidateTests extends PHPUnit_Framework_TestCase {

	private $staticHtmlFile = "/testdata/aftonbladet.html";

	/** 
	 * @test 
	 */
	public function staticHtmlIsLoadedCorrectly() {

		$validator = new Validate('helloz');
		$result = $validator->getHtml();
		$expectedResult = 'helloz';
		$this->assertEquals($expectedResult,$result,"Dummy returndata successful");

	}

	/** 
	 * @test 
	 */	
	public function titleTagIsParsedCorrectly() {
		$html = file_get_contents(__DIR__. $this->staticHtmlFile);
		$validator = new Validate($html);
		$result = $validator->getTitle();
		$expectedResult = 'Aftonbladet: Sveriges nyhetskälla och mötesplats';
		$this->assertEquals($expectedResult,$result,"Dummy returndata successful");

	}

}

