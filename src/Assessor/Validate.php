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
	 *
	 * @param string  $data
	 */
	function __construct( $data ) {
		$this->fetcher = new Fetch( $data );
		$this->html = $this->fetcher->getHtml();

		$this->doc = new \DOMDocument();

		// To prevent our tests to choke on the warnings on malformed html we have to disable php warnings and build our own error stack
		libxml_use_internal_errors( true );

		$this->doc->loadHTML( $this->html );

		// .. but since we dont' really care about broken html, we just throw the warnings away and clear our error stack
		libxml_clear_errors();
		libxml_use_internal_errors( false );

		$this->xpath = new \DOMXpath( $this->doc );
	}

	/**
	 * Return our html
	 *
	 * @return string
	 */
	function getHtml() {
		return $this->html;
	}

	/**
	 * Return the title
	 *
	 * @return string
	 */
	function getTitle() {
		return trim( $this->xpath->query( '//title' )->item( 0 )->textContent );
	}
}
