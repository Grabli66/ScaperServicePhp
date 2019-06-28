<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace tink\core\_Future;

use \php\Boot;
use \tink\core\_Callback\LinkObject;
use \tink\core\_Callback\Callback_Impl_;
use \tink\core\FutureTrigger;

class SimpleFuture implements FutureObject {
	/**
	 * @var \Closure
	 */
	public $f;
	/**
	 * @var FutureObject
	 */
	public $gathered;

	/**
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	public function __construct ($f) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:260: characters 5-15
		$this->f = $f;
	}

	/**
	 * @return FutureObject
	 */
	public function eager () {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:279: characters 5-24
		$ret = ($this->gathered !== null ? $this->gathered : $this->gathered = FutureTrigger::gatherFuture($this));
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:280: characters 5-31
		$ret->handle(Callback_Impl_::fromNiladic(function () {
		}));
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:281: characters 5-15
		return $ret;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public function flatMap ($f) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:271: characters 27-33
		$f1 = $f;
		$_gthis = $this;
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:271: characters 5-34
		return Future_Impl_::flatten(new SimpleFuture(function ($cb)  use (&$f1, &$_gthis) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:271: characters 27-33
			return ($_gthis->f)(function ($v)  use (&$f1, &$cb) {
				$tmp = $f1($v);
				Callback_Impl_::invoke($cb, $tmp);
			});
		}));
	}

	/**
	 * @return FutureObject
	 */
	public function gather () {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:275: lines 275-276
		if ($this->gathered !== null) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:275: characters 29-37
			return $this->gathered;
		} else {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:276: characters 12-67
			return $this->gathered = FutureTrigger::gatherFuture($this);
		}
	}

	/**
	 * @param \Closure $callback
	 * 
	 * @return LinkObject
	 */
	public function handle ($callback) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:263: characters 5-23
		return ($this->f)($callback);
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public function map ($f) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:265: lines 265-268
		$_gthis = $this;
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:266: lines 266-268
		return new SimpleFuture(function ($cb)  use (&$f, &$_gthis) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:267: characters 7-50
			return ($_gthis->f)(function ($v)  use (&$f, &$cb) {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:267: characters 44-48
				$tmp = $f($v);
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Future.hx:267: characters 34-49
				Callback_Impl_::invoke($cb, $tmp);
			});
		});
	}
}

Boot::registerClass(SimpleFuture::class, 'tink.core._Future.SimpleFuture');
