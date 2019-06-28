<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace tink\streams\_Stream;

use \tink\streams\StreamBase;
use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\streams\Step;
use \tink\streams\StreamObject;
use \tink\core\_Lazy\LazyConst;
use \tink\streams\Empty_hx;
use \tink\core\_Future\Future_Impl_;
use \tink\streams\Conclusion;
use \tink\core\_Future\FutureObject;

class CompoundStream extends StreamBase {
	/**
	 * @var \Array_hx
	 */
	public $parts;

	/**
	 * @param \Array_hx $parts
	 * @param \Closure $handler
	 * @param \Closure $cb
	 * 
	 * @return void
	 */
	static public function consumeParts ($parts, $handler, $cb) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:586: lines 586-615
		if ($parts->length === 0) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:587: characters 7-19
			$cb(Conclusion::Depleted());
		} else {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:589: lines 589-615
			($parts->arr[0] ?? null)->forEach($handler)->handle(function ($o)  use (&$parts, &$handler, &$cb) {
				$__hx__switch = ($o->index);
				if ($__hx__switch === 0) {
					#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:596: characters 11-31
					$parts = (clone $parts);
					#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:597: characters 11-26
					$parts[0] = $o->params[0];
					#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:598: characters 11-48
					$cb(Conclusion::Halted(new CompoundStream($parts)));
				} else if ($__hx__switch === 1) {
					#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:600: characters 25-27
					$_g1 = $o->params[1];
					#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:602: lines 602-607
					if ($_g1->get_depleted()) {
						#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:603: characters 13-35
						$parts = $parts->slice(1);
					} else {
						#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:605: characters 13-33
						$parts = (clone $parts);
						#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:606: characters 13-26
						$parts[0] = $_g1;
					}
					#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:609: characters 11-52
					$cb(Conclusion::Clogged($o->params[0], new CompoundStream($parts)));

				} else if ($__hx__switch === 2) {
					#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:613: characters 11-24
					$cb(Conclusion::Failed($o->params[0]));
				} else if ($__hx__switch === 3) {
					#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:592: characters 11-52
					CompoundStream::consumeParts($parts->slice(1), $handler, $cb);
				}
			});
		}
	}

	/**
	 * @param \Array_hx $streams
	 * 
	 * @return StreamObject
	 */
	static public function of ($streams) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:619: characters 5-18
		$ret = new \Array_hx();
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:621: lines 621-622
		$_g = 0;
		while ($_g < $streams->length) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:622: characters 7-23
			($streams->arr[$_g++] ?? null)->decompose($ret);
		}

		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:625: lines 625-626
		if ($ret->length === 0) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:625: characters 28-40
			return Empty_hx::$inst;
		} else {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:626: characters 12-35
			return new CompoundStream($ret);
		}
	}

	/**
	 * @param \Array_hx $parts
	 * 
	 * @return void
	 */
	public function __construct ($parts) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:557: characters 5-23
		parent::__construct();
		$this->parts = $parts;
	}

	/**
	 * @param \Array_hx $into
	 * 
	 * @return void
	 */
	public function decompose ($into) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:579: lines 579-580
		$_g = 0;
		$_g1 = $this->parts;
		while ($_g < $_g1->length) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:580: characters 7-24
			($_g1->arr[$_g++] ?? null)->decompose($into);
		}
	}

	/**
	 * @param \Closure $handler
	 * 
	 * @return FutureObject
	 */
	public function forEach ($handler) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:583: characters 25-42
		$parts = $this->parts;
		$handler1 = $handler;
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:583: characters 5-67
		return Future_Impl_::async(function ($cb)  use (&$handler1, &$parts) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:583: characters 25-42
			CompoundStream::consumeParts($parts, $handler1, $cb);
		});
	}

	/**
	 * @return bool
	 */
	public function get_depleted () {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:560: characters 19-31
		$__hx__switch = ($this->parts->length);
		if ($__hx__switch === 0) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:561: characters 15-19
			return true;
		} else if ($__hx__switch === 1) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:562: characters 15-32
			return ($this->parts->arr[0] ?? null)->get_depleted();
		} else {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:563: characters 16-21
			return false;
		}
	}

	/**
	 * @return FutureObject
	 */
	public function next () {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:566: lines 566-576
		$_gthis = $this;
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:567: lines 567-575
		if ($this->parts->length === 0) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:567: characters 34-55
			return new SyncFuture(new LazyConst(Step::End()));
		} else {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:568: lines 568-575
			return ($this->parts->arr[0] ?? null)->next()->flatMap(function ($v)  use (&$_gthis) {
				$__hx__switch = ($v->index);
				if ($__hx__switch === 0) {
					#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:571: characters 9-33
					$copy = (clone $_gthis->parts);
					#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:572: characters 9-23
					$copy[0] = $v->params[1];
					#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:573: characters 9-55
					return new SyncFuture(new LazyConst(Step::Link($v->params[0], new CompoundStream($copy))));
				} else if ($__hx__switch === 2) {
					#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:569: lines 569-574
					if ($_gthis->parts->length > 1) {
						#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:569: characters 38-53
						return ($_gthis->parts->arr[1] ?? null)->next();
					} else {
						#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:574: characters 16-30
						return new SyncFuture(new LazyConst($v));
					}
				} else {
					return new SyncFuture(new LazyConst($v));
				}
			})->gather();
		}
	}
}

Boot::registerClass(CompoundStream::class, 'tink.streams._Stream.CompoundStream');