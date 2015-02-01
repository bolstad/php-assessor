<?php 

namespace Assessor;

class Validate {

	private $html; 
	private $fetcher; 

	/**
	 * Setup new object with static html or a remote url as parameter, pass it along to Fetch 
	 * to get actual html data
	 * @param string $data 
	 */
	function __construct( $data ) {
		$this->fetcher = new Fetch( $data );
		$this->html = $this->fetcher->getHtml();
	}

	/**
	 * Return our html 
	 * @return string
	 */
	function getHtml() {
		return $this->html; 
	}
}