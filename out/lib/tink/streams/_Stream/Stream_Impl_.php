<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace tink\streams\_Stream;

use \php\Boot;
use \tink\streams\Step;
use \tink\streams\Generator;
use \tink\streams\Single;
use \tink\core\TypedError;
use \tink\streams\StreamObject;
use \tink\core\_Lazy\LazyConst;
use \tink\streams\FutureStream;
use \tink\core\_Promise\Promise_Impl_;
use \tink\core\_Future\FutureObject;

final class Stream_Impl_ {

	/**
	 * @param StreamObject $this
	 * 
	 * @return StreamObject
	 */
	static public function dirty ($this1) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:15: characters 5-21
		return $this1;
	}

	/**
	 * @param FutureObject $f
	 * 
	 * @return StreamObject
	 */
	static public function flatten ($f) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:33: characters 5-31
		return new FutureStream($f);
	}

	/**
	 * @param StreamObject $this
	 * 
	 * @return bool
	 */
	static public function get_depleted ($this1) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:12: characters 7-27
		return $this1->get_depleted();
	}

	/**
	 * @param TypedError $e
	 * 
	 * @return StreamObject
	 */
	static public function ofError ($e) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:59: characters 5-30
		return new ErrorStream($e);
	}

	/**
	 * @param object $i
	 * 
	 * @return StreamObject
	 */
	static public function ofIterator ($i) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:21: characters 29-118
		$next = null;
		$next = function ($step)  use (&$next, &$i) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:21: characters 54-117
			$next1 = null;
			if ($i->hasNext()) {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:21: characters 75-83
				$next2 = $i->next();
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:21: characters 54-117
				$next1 = Step::Link($next2, Generator::stream($next));
			} else {
				$next1 = Step::End();
			}
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:21: characters 49-118
			$step($next1);
		};
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:21: characters 5-119
		return Generator::stream($next);
	}

	/**
	 * @param FutureObject $f
	 * 
	 * @return StreamObject
	 */
	static public function promise ($f) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:53: lines 53-56
		return Stream_Impl_::flatten($f->map(function ($o) {
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:54: characters 24-33
				return Stream_Impl_::dirty($o->params[0]);
			} else if ($__hx__switch === 1) {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:55: characters 24-34
				return Stream_Impl_::ofError($o->params[0]);
			}
		})->gather());
	}

	/**
	 * @param FutureObject $f
	 * 
	 * @return StreamObject
	 */
	static public function promiseIdeal ($f) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:47: characters 5-27
		return Stream_Impl_::promise(Promise_Impl_::ofSpecific($f));
	}

	/**
	 * @param FutureObject $f
	 * 
	 * @return StreamObject
	 */
	static public function promiseReal ($f) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:50: characters 5-27
		return Stream_Impl_::promise(Promise_Impl_::ofSpecific($f));
	}

	/**
	 * @param mixed $i
	 * 
	 * @return StreamObject
	 */
	static public function single ($i) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:18: characters 5-25
		return new Single(new LazyConst($i));
	}
}

Boot::registerClass(Stream_Impl_::class, 'tink.streams._Stream.Stream_Impl_');
Boot::registerGetters('tink\\streams\\_Stream\\Stream_Impl_', [
	'depleted' => true
]);