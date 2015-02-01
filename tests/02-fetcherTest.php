<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Assessor\Fetch;

class WordpressFetchTest extends PHPUnit_Framework_TestCase {

	/**
	 *
	 *
	 * @test Verify that a static string that is passed to Fetch is returned correctly
	 */
	public function isStaticStringsFetchedCorrectly() {
		$fetcher = new Fetch( 'helloz' );
		$result = $fetcher->getHtml();
		$expectedResult = 'helloz';
		$this->assertEquals( $expectedResult, $result, "Dummy returndata successful" );
	}

	/**
	 *
	 *
	 * @test Verify that remote content is correcly fetched from a url
	 */
	public function isRemoteContentFetchedCorrectly() {
		// Yeah, this is my own test file. It should hopefully stay online forever and ever.
		$fetcher = new Fetch( 'http://atdt.se/tests/dummy.txt' );
		// Remove newlines for these tests
		$result = chop( $fetcher->getHtml() );
		$expectedResult = 'hello world';
		$this->assertEquals( $expectedResult, $result, "Remote text from url returned successful" );
	}

}
