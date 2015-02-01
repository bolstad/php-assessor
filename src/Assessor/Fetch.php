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
		$fetched_data = $this->toUtf8( $fetched_data );
		$this->html = $fetched_data;
	}

	/**
	 * Force html full page content conversion to utf-8, to be done before the DOM lib
	 * does it stuff - code by 'piopier', http://php.net/manual/en/domdocument.loadhtml.php#91513
	 *
	 * @param string  $content String with a complete HTML page to be converted
	 * @param string  $encod   Source encoding
	 * @return string
	 */
	function toUtf8( $content, $encod='' ) {
		mb_detect_order( "ASCII,UTF-8,ISO-8859-1,windows-1252,iso-8859-15" );
		if ( !empty( $content ) ) {
			if ( empty( $encod ) )
				$encod  = mb_detect_encoding( $content );
			$headpos        = mb_strpos( $content, '<head>' );
			if ( FALSE=== $headpos )
				$headpos= mb_strpos( $content, '<HEAD>' );
			if ( FALSE!== $headpos ) {
				$headpos+=6;
				$content = mb_substr( $content, 0, $headpos ) . '<meta http-equiv="Content-Type" content="text/html; charset='.$encod.'">' .mb_substr( $content, $headpos );
			}
			$content=mb_convert_encoding( $content, 'HTML-ENTITIES', $encod );
		}
		return $content;
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
