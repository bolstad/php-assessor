<?php 

namespace Assessor;

class Validate {

	private $html; 
	private $fetcher; 
	private $doc; 
	private $xpath; 

	/**
	 * Setup new object with static html or a remote url as parameter, pass it along to Fetch 
	 * to get actual html data
	 * @param string $data 
	 */
	function __construct( $data ) {
		$this->fetcher = new Fetch( $data );
		$this->html = $this->fetcher->getHtml();

		// TODO - we might be forced to do some UTF-8 trickery here - see http://php.net/manual/en/domdocument.loadhtml.php#91513

		$this->doc = new \DOMDocument();
		$this->doc->loadHTML($this->html);

		$this->xpath = new \DOMXpath($this->doc);
	}

	/**
	 * Return our html 
	 * @return string
	 */
	function getHtml() {
		return $this->html; 
	}

	function getTitle() {
		$titleNode = $this->xpath->query('//title');
		return $titleNode->item(0);
	}
}