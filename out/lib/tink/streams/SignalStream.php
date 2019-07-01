<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\streams;

use \tink\core\_Signal\Signal_Impl_;
use \php\Boot;
use \tink\core\SignalObject;

class SignalStream extends Generator {
	/**
	 * @param SignalObject $signal
	 * 
	 * @return void
	 */
	public function __construct ($signal) {
		#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:721: lines 721-725
		parent::__construct(Signal_Impl_::nextTime($signal)->map(function ($o)  use (&$signal) {
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:722: characters 21-57
				return Step::Link($o->params[0], new SignalStream($signal));
			} else if ($__hx__switch === 1) {
				#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:723: characters 18-25
				return Step::Fail($o->params[0]);
			} else if ($__hx__switch === 2) {
				#/home/grabli66/haxelib/tink_streams/git/src/tink/streams/Stream.hx:724: characters 14-17
				return Step::End();
			}
		})->gather());
	}
}

Boot::registerClass(SignalStream::class, 'tink.streams.SignalStream');
