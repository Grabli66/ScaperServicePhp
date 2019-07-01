<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\http;

use \php\Boot;
use \tink\core\_Future\FutureObject;

class SimpleHandler implements HandlerObject {
	/**
	 * @var \Closure
	 */
	public $f;

	/**
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	public function __construct ($f) {
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Handler.hx:27: characters 5-15
		$this->f = $f;
	}

	/**
	 * @param IncomingRequest $req
	 * 
	 * @return FutureObject
	 */
	public function process ($req) {
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Handler.hx:30: characters 5-18
		return ($this->f)($req);
	}
}

Boot::registerClass(SimpleHandler::class, 'tink.http.SimpleHandler');
