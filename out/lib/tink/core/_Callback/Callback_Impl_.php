<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\core\_Callback;

use \haxe\Timer;
use \php\Boot;
use \tink\core\Noise;

final class Callback_Impl_ {
	/**
	 * @var int
	 */
	const MAX_DEPTH = 1000;

	/**
	 * @var int
	 */
	static public $depth = 0;

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	static public function _new ($f) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:5: character 3
		return $f;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	static public function defer ($f) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:49: characters 7-29
		Timer::delay($f, 0);
	}

	/**
	 * @param \Array_hx $callbacks
	 * 
	 * @return \Closure
	 */
	static public function fromMany ($callbacks) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:30: lines 30-33
		return function ($v)  use (&$callbacks) {
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:32: lines 32-33
			$_g = 0;
			while ($_g < $callbacks->length) {
				#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:33: characters 11-29
				Callback_Impl_::invoke(($callbacks->arr[$_g++] ?? null), $v);
			}
		};
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	static public function fromNiladic ($f) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:27: characters 5-48
		return function ($_)  use (&$f) {
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:27: characters 45-48
			$f();
		};
	}

	/**
	 * @param \Closure $cb
	 * 
	 * @return \Closure
	 */
	static public function ignore ($cb) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:24: characters 5-41
		return function ($_)  use (&$cb) {
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:24: characters 25-41
			Callback_Impl_::invoke($cb, Noise::Noise());
		};
	}

	/**
	 * @param \Closure $this
	 * @param mixed $data
	 * 
	 * @return void
	 */
	static public function invoke ($this1, $data) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:14: lines 14-19
		if (Callback_Impl_::$depth < 1000) {
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:15: characters 7-14
			Callback_Impl_::$depth++;
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:16: characters 7-19
			$this1($data);
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:17: characters 7-14
			Callback_Impl_::$depth--;
		} else {
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:19: characters 25-31
			$_e = $this1;
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:19: characters 25-36
			$f = function ($data1)  use (&$_e) {
				#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:19: characters 25-31
				Callback_Impl_::invoke($_e, $data1);
			};
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:19: characters 25-36
			$data2 = $data;
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:19: characters 10-43
			Callback_Impl_::defer(function ()  use (&$f, &$data2) {
				#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:19: characters 25-36
				$f($data2);
			});
		}
	}

	/**
	 * @param \Closure $this
	 * 
	 * @return \Closure
	 */
	static public function toFunction ($this1) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:9: characters 5-16
		return $this1;
	}
}

Boot::registerClass(Callback_Impl_::class, 'tink.core._Callback.Callback_Impl_');
