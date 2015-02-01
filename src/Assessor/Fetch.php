<?php

namespace Assessor;

class Fetch {


	private $html;

	/**
	 *  $data - url or html data to parse from
	 */
	function __construct( $data ) {

		// if $data is a url and not html content, fetch data
		if ( filter_var( $data, FILTER_VALIDATE_URL ) ) {
			$fetched_data = @file_get_contents( $data );
			if ( $fetched_data === false ) {
				throw new Exception( "Could not fetch content from $data" );
			}
		} else {
			$fetched_data = $data;
		}
		$this->html = $fetched_data;
	}

	/**
	 * Return fetched or passed data
	 *
	 * @return string
	 */
	function getHtml() {
		return $this->html;
	}

}
