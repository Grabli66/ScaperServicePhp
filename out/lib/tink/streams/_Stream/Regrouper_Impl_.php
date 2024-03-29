<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\streams\_Stream;

use \php\_Boot\HxAnon;
use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\core\_Lazy\LazyConst;

final class Regrouper_Impl_ {
	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	static public function ofFunc ($f) {
		#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:86: characters 5-22
		return new HxAnon(["apply" => $f]);
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	static public function ofFuncSync ($f) {
		#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:89: characters 5-63
		return new HxAnon(["apply" => function ($i, $s)  use (&$f) {
			#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:89: characters 42-62
			return new SyncFuture(new LazyConst($f($i, $s)));
		}]);
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	static public function ofIgnorance ($f) {
		#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:80: characters 5-47
		return new HxAnon(["apply" => function ($i, $_)  use (&$f) {
			#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:80: characters 35-46
			return $f($i);
		}]);
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	static public function ofIgnoranceSync ($f) {
		#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:83: characters 5-60
		return new HxAnon(["apply" => function ($i, $_)  use (&$f) {
			#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:83: characters 42-59
			return new SyncFuture(new LazyConst($f($i)));
		}]);
	}
}

Boot::registerClass(Regrouper_Impl_::class, 'tink.streams._Stream.Regrouper_Impl_');
