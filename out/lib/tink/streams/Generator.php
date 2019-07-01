<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\streams;

use \php\Boot;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Future\FutureObject;

class Generator extends StreamBase {
	/**
	 * @var FutureObject
	 */
	public $upcoming;

	/**
	 * @param \Closure $step
	 * 
	 * @return Generator
	 */
	static public function stream ($step) {
		#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:708: characters 5-51
		return new Generator(Future_Impl_::async($step, true));
	}

	/**
	 * @param FutureObject $upcoming
	 * 
	 * @return void
	 */
	public function __construct ($upcoming) {
		#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:680: characters 5-29
		parent::__construct();
		$this->upcoming = $upcoming;
	}

	/**
	 * @param \Closure $handler
	 * 
	 * @return FutureObject
	 */
	public function forEach ($handler) {
		#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:685: lines 685-705
		$_gthis = $this;
		#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:686: lines 686-705
		return Future_Impl_::async(function ($cb)  use (&$_gthis, &$handler) {
			#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:687: lines 687-703
			$_gthis->upcoming->handle(function ($e)  use (&$_gthis, &$handler, &$cb) {
				$__hx__switch = ($e->index);
				if ($__hx__switch === 0) {
					#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:688: characters 22-26
					$then = $e->params[1];
					#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:689: lines 689-698
					$handler($e->params[0])->handle(function ($s)  use (&$then, &$_gthis, &$handler, &$cb) {
						$__hx__switch = ($s->index);
						if ($__hx__switch === 0) {
							#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:691: characters 15-31
							$cb(Conclusion::Halted($_gthis));
						} else if ($__hx__switch === 1) {
							#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:693: characters 15-31
							$cb(Conclusion::Halted($then));
						} else if ($__hx__switch === 2) {
							#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:695: characters 15-47
							$then->forEach($handler)->handle($cb);
						} else if ($__hx__switch === 3) {
							#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:697: characters 15-35
							$cb(Conclusion::Clogged($s->params[0], $_gthis));
						}
					});
				} else if ($__hx__switch === 1) {
					#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:700: characters 11-24
					$cb(Conclusion::Failed($e->params[0]));
				} else if ($__hx__switch === 2) {
					#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:702: characters 11-23
					$cb(Conclusion::Depleted());
				}
			});
		}, true);
	}

	/**
	 * @return FutureObject
	 */
	public function next () {
		#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:683: characters 5-20
		return $this->upcoming;
	}
}

Boot::registerClass(Generator::class, 'tink.streams.Generator');
