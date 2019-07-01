<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\http;

use \php\Boot;

class OutgoingRequestHeader extends RequestHeader {
	/**
	 * @param string $method
	 * @param object $url
	 * @param string $protocol
	 * @param \Array_hx $fields
	 * 
	 * @return void
	 */
	public function __construct ($method, $url, $protocol = null, $fields) {
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Request.hx:113: lines 113-116
		parent::__construct($method, $url, $protocol, $fields);
	}

	/**
	 * @param \Array_hx $fields
	 * 
	 * @return OutgoingRequestHeader
	 */
	public function concat ($fields) {
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Request.hx:115: characters 38-44
		$tmp = $this->method;
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Request.hx:115: characters 46-49
		$tmp1 = $this->url;
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Request.hx:115: characters 51-59
		$tmp2 = $this->protocol;
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Request.hx:115: characters 5-88
		return new OutgoingRequestHeader($tmp, $tmp1, $tmp2, $this->fields->concat($fields));
	}
}

Boot::registerClass(OutgoingRequestHeader::class, 'tink.http.OutgoingRequestHeader');
