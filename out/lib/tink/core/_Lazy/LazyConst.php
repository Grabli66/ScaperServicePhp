<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\core\_Lazy;

use \php\Boot;

class LazyConst implements LazyObject {
	/**
	 * @var mixed
	 */
	public $value;

	/**
	 * @param mixed $value
	 * 
	 * @return void
	 */
	public function __construct ($value) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Lazy.hx:32: characters 5-23
		$this->value = $value;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return LazyObject
	 */
	public function flatMap ($f) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Lazy.hx:40: lines 40-41
		$_gthis = $this;
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Lazy.hx:41: characters 5-59
		return new LazyFunc(function ()  use (&$f, &$_gthis) {
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Lazy.hx:41: characters 44-58
			return $f($_gthis->value)->get();
		});
	}

	/**
	 * @return mixed
	 */
	public function get () {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Lazy.hx:35: characters 5-17
		return $this->value;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return LazyObject
	 */
	public function map ($f) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Lazy.hx:37: lines 37-38
		$_gthis = $this;
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Lazy.hx:38: characters 5-53
		return new LazyFunc(function ()  use (&$f, &$_gthis) {
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Lazy.hx:38: characters 37-52
			return $f($_gthis->value);
		});
	}
}

Boot::registerClass(LazyConst::class, 'tink.core._Lazy.LazyConst');
