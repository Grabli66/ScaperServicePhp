<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace tink\core\_Outcome;

use \php\_Boot\HxAnon;
use \php\Boot;
use \haxe\ds\Either;
use \tink\core\Outcome;

final class OutcomeMapper_Impl_ {
	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	static public function _new ($f) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Outcome.hx:150: character 3
		return new HxAnon(["f" => $f]);
	}

	/**
	 * @param object $this
	 * @param Outcome $o
	 * 
	 * @return Outcome
	 */
	static public function apply ($this1, $o) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Outcome.hx:152: characters 5-21
		return $this1->f($o);
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	static public function withEitherError ($f) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Outcome.hx:164: lines 164-173
		return OutcomeMapper_Impl_::_new(function ($o)  use (&$f) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Outcome.hx:165: lines 165-172
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Outcome.hx:167: characters 18-22
				$_g = $f($o->params[0]);
				$__hx__switch = ($_g->index);
				if ($__hx__switch === 0) {
					#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Outcome.hx:168: characters 30-40
					return Outcome::Success($_g->params[0]);
				} else if ($__hx__switch === 1) {
					#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Outcome.hx:169: characters 30-47
					return Outcome::Failure(Either::Right($_g->params[0]));
				}
			} else if ($__hx__switch === 1) {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Outcome.hx:171: characters 26-42
				return Outcome::Failure(Either::Left($o->params[0]));
			}
		});
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	static public function withSameError ($f) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Outcome.hx:155: lines 155-160
		return OutcomeMapper_Impl_::_new(function ($o)  use (&$f) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Outcome.hx:156: lines 156-159
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Outcome.hx:157: characters 26-30
				return $f($o->params[0]);
			} else if ($__hx__switch === 1) {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Outcome.hx:158: characters 26-36
				return Outcome::Failure($o->params[0]);
			}
		});
	}
}

Boot::registerClass(OutcomeMapper_Impl_::class, 'tink.core._Outcome.OutcomeMapper_Impl_');
