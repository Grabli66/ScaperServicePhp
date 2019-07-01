<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\io\_Sink;

use \php\_Boot\HxAnon;
use \tink\core\_Future\SyncFuture;
use \tink\io\SinkObject;
use \php\Boot;
use \haxe\io\Output;
use \tink\io\_Source\Source_Impl_;
use \tink\core\TypedError;
use \tink\io\_Worker\Worker_Impl_;
use \tink\core\Outcome;
use \tink\io\std\OutputSink;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Future\FutureObject;

final class SinkYielding_Impl_ {
	/**
	 * @var SinkObject
	 */
	static public $BLACKHOLE;

	/**
	 * @param SinkObject $this
	 * 
	 * @return SinkObject
	 */
	static public function dirty ($this1) {
		#/home/grabli66/haxelib/tink_io/git/src/tink/io/Sink.hx:30: characters 5-21
		return $this1;
	}

	/**
	 * @param SinkObject $this
	 * 
	 * @return FutureObject
	 */
	static public function end ($this1) {
		#/home/grabli66/haxelib/tink_io/git/src/tink/io/Sink.hx:23: lines 23-27
		if ($this1->get_sealed()) {
			#/home/grabli66/haxelib/tink_io/git/src/tink/io/Sink.hx:23: characters 24-29
			return new SyncFuture(new LazyConst(Outcome::Success(false)));
		} else {
			#/home/grabli66/haxelib/tink_io/git/src/tink/io/Sink.hx:24: lines 24-27
			return $this1->consume(Source_Impl_::$EMPTY, new HxAnon(["end" => true]))->map(function ($r) {
				$__hx__switch = ($r->index);
				if ($__hx__switch === 0) {
					#/home/grabli66/haxelib/tink_io/git/src/tink/io/Sink.hx:25: characters 41-54
					return Outcome::Success(true);
				} else if ($__hx__switch === 1) {
					return Outcome::Success(true);
				} else if ($__hx__switch === 2) {
					#/home/grabli66/haxelib/tink_io/git/src/tink/io/Sink.hx:26: characters 32-42
					return Outcome::Failure($r->params[0]);
				}
			})->gather();
		}
	}

	/**
	 * @param TypedError $e
	 * 
	 * @return SinkObject
	 */
	static public function ofError ($e) {
		#/home/grabli66/haxelib/tink_io/git/src/tink/io/Sink.hx:33: characters 5-28
		return new ErrorSink($e);
	}

	/**
	 * @param string $name
	 * @param Output $target
	 * @param object $options
	 * 
	 * @return SinkObject
	 */
	static public function ofOutput ($name, $target, $options = null) {
		#/home/grabli66/haxelib/tink_io/git/src/tink/io/Sink.hx:52: lines 52-55
		$tmp = null;
		if ($options === null) {
			$tmp = Worker_Impl_::get();
		} else {
			#/home/grabli66/haxelib/tink_io/git/src/tink/io/Sink.hx:52: characters 60-67
			$_g = $options->worker;
			#/home/grabli66/haxelib/tink_io/git/src/tink/io/Sink.hx:52: lines 52-55
			$tmp = ($_g === null ? Worker_Impl_::get() : $_g);
		}
		return new OutputSink($name, $target, $tmp);
	}

	/**
	 * @param FutureObject $p
	 * 
	 * @return SinkObject
	 */
	static public function ofPromised ($p) {
		#/home/grabli66/haxelib/tink_io/git/src/tink/io/Sink.hx:36: lines 36-39
		return new FutureSink($p->map(function ($o) {
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/grabli66/haxelib/tink_io/git/src/tink/io/Sink.hx:37: characters 24-25
				return $o->params[0];
			} else if ($__hx__switch === 1) {
				#/home/grabli66/haxelib/tink_io/git/src/tink/io/Sink.hx:38: characters 24-34
				return SinkYielding_Impl_::ofError($o->params[0]);
			}
		})->gather());
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$BLACKHOLE = Blackhole::$inst;
	}
}

Boot::registerClass(SinkYielding_Impl_::class, 'tink.io._Sink.SinkYielding_Impl_');
SinkYielding_Impl_::__hx__init();
