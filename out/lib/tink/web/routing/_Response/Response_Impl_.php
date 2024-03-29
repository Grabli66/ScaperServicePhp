<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\web\routing\_Response;

use \haxe\io\_BytesData\Container;
use \tink\http\HeaderField;
use \php\Boot;
use \tink\streams\Single;
use \tink\chunk\ByteChunk;
use \tink\http\ResponseHeaderBase;
use \tink\core\_Lazy\LazyConst;
use \httpstatus\_HttpStatusMessage\HttpStatusMessage_Impl_;
use \tink\_Url\Url_Impl_;
use \tink\http\_Response\OutgoingResponseData;
use \tink\http\_Response\OutgoingResponse_Impl_;
use \tink\_Chunk\Chunk_Impl_;
use \haxe\io\Bytes;

final class Response_Impl_ {
	/**
	 * @param int $code
	 * @param string $contentType
	 * @param Bytes $bytes
	 * 
	 * @return OutgoingResponseData
	 */
	static public function binary ($code = null, $contentType, $bytes) {
		#/home/grabli66/haxelib/tink_web/git/src/tink/web/routing/Response.hx:28: characters 5-59
		return OutgoingResponse_Impl_::blob($code, ByteChunk::of($bytes), $contentType);
	}

	/**
	 * @param int $code
	 * 
	 * @return OutgoingResponseData
	 */
	static public function empty ($code = 200) {
		#/home/grabli66/haxelib/tink_web/git/src/tink/web/routing/Response.hx:32: characters 12-117
		if ($code === null) {
			$code = 200;
		}
		return new OutgoingResponseData(new ResponseHeaderBase($code, HttpStatusMessage_Impl_::fromCode($code), \Array_hx::wrap([new HeaderField("content-length", "0")]), "HTTP/1.1"), new Single(new LazyConst(Chunk_Impl_::$EMPTY)));
	}

	/**
	 * @param Bytes $b
	 * 
	 * @return OutgoingResponseData
	 */
	static public function ofBytes ($b) {
		#/home/grabli66/haxelib/tink_web/git/src/tink/web/routing/Response.hx:15: characters 5-49
		return Response_Impl_::binary(null, "application/octet-stream", $b);
	}

	/**
	 * @param string $s
	 * 
	 * @return OutgoingResponseData
	 */
	static public function ofString ($s) {
		#/home/grabli66/haxelib/tink_web/git/src/tink/web/routing/Response.hx:12: characters 5-36
		return Response_Impl_::textual(null, "text/plain", $s);
	}

	/**
	 * @param object $u
	 * 
	 * @return OutgoingResponseData
	 */
	static public function ofUrl ($u) {
		#/home/grabli66/haxelib/tink_web/git/src/tink/web/routing/Response.hx:23: characters 59-64
		$this1 = HttpStatusMessage_Impl_::fromCode(302);
		#/home/grabli66/haxelib/tink_web/git/src/tink/web/routing/Response.hx:23: characters 84-92
		$fields = mb_strtolower("location");
		#/home/grabli66/haxelib/tink_web/git/src/tink/web/routing/Response.hx:23: characters 12-113
		return new OutgoingResponseData(new ResponseHeaderBase(302, $this1, \Array_hx::wrap([new HeaderField($fields, Url_Impl_::toString($u))]), "HTTP/1.1"), new Single(new LazyConst(Chunk_Impl_::$EMPTY)));
	}

	/**
	 * @param int $code
	 * @param string $contentType
	 * @param string $string
	 * 
	 * @return OutgoingResponseData
	 */
	static public function textual ($code = null, $contentType, $string) {
		#/home/grabli66/haxelib/tink_web/git/src/tink/web/routing/Response.hx:36: characters 38-60
		$tmp = strlen($string);
		#/home/grabli66/haxelib/tink_web/git/src/tink/web/routing/Response.hx:36: characters 5-61
		return Response_Impl_::binary($code, $contentType, new Bytes($tmp, new Container($string)));
	}
}

Boot::registerClass(Response_Impl_::class, 'tink.web.routing._Response.Response_Impl_');
