<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\core\_Promise;

use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\core\Outcome;
use \tink\core\_Lazy\LazyConst;

final class Combiner_Impl_ {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	static public function ofSafe ($f) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Promise.hx:319: characters 5-46
		return function ($x1, $x2)  use (&$f) {
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Promise.hx:319: characters 30-46
			return new SyncFuture(new LazyConst($f($x1, $x2)));
		};
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	static public function ofSafeSync ($f) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Promise.hx:325: characters 5-46
		return function ($x1, $x2)  use (&$f) {
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Promise.hx:325: characters 30-46
			return new SyncFuture(new LazyConst(Outcome::Success($f($x1, $x2))));
		};
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	static public function ofSync ($f) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Promise.hx:322: characters 5-46
		return function ($x1, $x2)  use (&$f) {
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Promise.hx:322: characters 30-46
			return $f($x1, $x2)->map(Boot::getStaticClosure(Outcome::class, 'Success'))->gather();
		};
	}
}

Boot::registerClass(Combiner_Impl_::class, 'tink.core._Promise.Combiner_Impl_');
