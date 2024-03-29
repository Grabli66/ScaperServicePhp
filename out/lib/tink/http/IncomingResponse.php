<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\http;

use \php\_Boot\HxAnon;
use \tink\core\_Future\SyncFuture;
use \tink\io\RealSourceTools;
use \php\Boot;
use \haxe\io\_BytesData\Container as _BytesDataContainer;
use \tink\streams\Single;
use \tink\core\TypedError;
use \tink\streams\StreamObject;
use \tink\chunk\ByteChunk;
use \tink\core\Outcome;
use \tink\core\_Lazy\LazyConst;
use \haxe\Json;
use \httpstatus\_HttpStatusMessage\HttpStatusMessage_Impl_;
use \tink\core\_Promise\Promise_Impl_;
use \haxe\io\Bytes;
use \tink\core\_Future\FutureObject;

class IncomingResponse extends Message {
	/**
	 * @param IncomingResponse $res
	 * 
	 * @return FutureObject
	 */
	static public function readAll ($res) {
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Response.hx:110: lines 110-116
		return Promise_Impl_::next(RealSourceTools::all($res->body), function ($b)  use (&$res) {
			#/home/grabli66/haxelib/tink_http/git/src/tink/http/Response.hx:112: lines 112-115
			if ($res->header->statusCode >= 400) {
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Response.hx:113: characters 11-90
				return new SyncFuture(new LazyConst(Outcome::Failure(TypedError::withData($res->header->statusCode, $res->header->reason, $b->toString(), new HxAnon([
					"fileName" => "tink/http/Response.hx",
					"lineNumber" => 113,
					"className" => "tink.http.IncomingResponse",
					"methodName" => "readAll",
				])))));
			} else {
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Response.hx:115: characters 11-21
				return new SyncFuture(new LazyConst(Outcome::Success($b)));
			}
		});
	}

	/**
	 * @param TypedError $e
	 * 
	 * @return IncomingResponse
	 */
	static public function reportError ($e) {
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Response.hx:120: characters 7-96
		$statusCode = $e->code;
		$reason = HttpStatusMessage_Impl_::fromCode($e->code);
		$this1 = new ResponseHeaderBase($statusCode, $reason, \Array_hx::wrap([new HeaderField(mb_strtolower("Content-Type"), "application/json")]), "HTTP/1.1");
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Response.hx:121: lines 121-125
		$s = Json::phpJsonEncode(new HxAnon([
			"error" => $e->message,
			"details" => $e->data,
		]), null, null);
		$b = strlen($s);
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Response.hx:119: lines 119-126
		return new IncomingResponse($this1, new Single(new LazyConst(ByteChunk::of(new Bytes($b, new _BytesDataContainer($s))))));
	}

	/**
	 * @param ResponseHeaderBase $header
	 * @param StreamObject $body
	 * 
	 * @return void
	 */
	public function __construct ($header, $body) {
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Response.hx:107: lines 107-129
		parent::__construct($header, $body);
	}
}

Boot::registerClass(IncomingResponse::class, 'tink.http.IncomingResponse');
