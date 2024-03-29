<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace httpstatus\_HttpStatusCode;

use \tink\http\HeaderField;
use \php\Boot;
use \tink\http\IncomingResponse;
use \tink\io\_Source\Source_Impl_;
use \tink\http\ResponseHeaderBase;
use \httpstatus\_HttpStatusMessage\HttpStatusMessage_Impl_;
use \tink\http\_Response\OutgoingResponseData;

final class HttpStatusCode_Impl_ {

	/**
	 * @param int $code
	 * 
	 * @return int
	 */
	static public function fromErrorCode ($code) {
		#/home/grabli66/haxelib/http-status/git/src/httpstatus/HttpStatusCode.hx:87: characters 3-20
		return $code;
	}

	/**
	 * @param IncomingResponse $res
	 * 
	 * @return int
	 */
	static public function fromIncomingResponse ($res) {
		#/home/grabli66/haxelib/http-status/git/src/httpstatus/HttpStatusCode.hx:105: characters 3-31
		return $res->header->statusCode;
	}

	/**
	 * @param int $this
	 * 
	 * @return int
	 */
	static public function toInt ($this1) {
		#/home/grabli66/haxelib/http-status/git/src/httpstatus/HttpStatusCode.hx:74: characters 3-14
		return $this1;
	}

	/**
	 * @param int $this
	 * 
	 * @return string
	 */
	static public function toMessage ($this1) {
		#/home/grabli66/haxelib/http-status/git/src/httpstatus/HttpStatusCode.hx:70: characters 10-37
		return HttpStatusMessage_Impl_::fromCode($this1);
	}

	/**
	 * @param int $this
	 * 
	 * @return OutgoingResponseData
	 */
	static public function toOutgoingResponse ($this1) {
		#/home/grabli66/haxelib/http-status/git/src/httpstatus/HttpStatusCode.hx:100: characters 51-62
		$this2 = HttpStatusMessage_Impl_::fromCode($this1);
		#/home/grabli66/haxelib/http-status/git/src/httpstatus/HttpStatusCode.hx:100: characters 4-122
		$this3 = new ResponseHeaderBase($this1, $this2, \Array_hx::wrap([new HeaderField(mb_strtolower("content-length"), "0")]), "HTTP/1.1");
		#/home/grabli66/haxelib/http-status/git/src/httpstatus/HttpStatusCode.hx:99: lines 99-102
		return new OutgoingResponseData($this3, Source_Impl_::$EMPTY);
	}

	/**
	 * @param int $this
	 * 
	 * @return OutgoingResponseData
	 */
	static public function toWebResponse ($this1) {
		#/home/grabli66/haxelib/http-status/git/src/httpstatus/HttpStatusCode.hx:93: characters 3-30
		return HttpStatusCode_Impl_::toOutgoingResponse($this1);
	}
}

Boot::registerClass(HttpStatusCode_Impl_::class, 'httpstatus._HttpStatusCode.HttpStatusCode_Impl_');
