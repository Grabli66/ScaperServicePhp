<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\io\_Worker;

use \tink\core\_Lazy\LazyObject;
use \php\Boot;
use \tink\io\WorkerObject;
use \tink\core\_Future\FutureObject;

final class Worker_Impl_ {
	/**
	 * @var WorkerObject
	 */
	static public $EAGER;
	/**
	 * @var \Array_hx
	 */
	static public $pool;

	/**
	 * @param WorkerObject $this
	 * 
	 * @return WorkerObject
	 */
	static public function ensure ($this1) {
		#/home/grabli66/haxelib/tink_io/git/src/tink/io/Worker.hx:17: characters 12-45
		if ($this1 === null) {
			#/home/grabli66/haxelib/tink_io/git/src/tink/io/Worker.hx:17: characters 30-35
			return Worker_Impl_::get();
		} else {
			#/home/grabli66/haxelib/tink_io/git/src/tink/io/Worker.hx:17: characters 41-45
			return $this1;
		}
	}

	/**
	 * @return WorkerObject
	 */
	static public function get () {
		#/home/grabli66/haxelib/tink_io/git/src/tink/io/Worker.hx:20: characters 17-40
		$x = Worker_Impl_::$pool->length;
		#/home/grabli66/haxelib/tink_io/git/src/tink/io/Worker.hx:20: characters 5-41
		return (Worker_Impl_::$pool->arr[($x <= 1 ? 0 : mt_rand(0, $x - 1))] ?? null);
	}

	/**
	 * @param WorkerObject $this
	 * @param LazyObject $task
	 * 
	 * @return FutureObject
	 */
	static public function work ($this1, $task) {
		#/home/grabli66/haxelib/tink_io/git/src/tink/io/Worker.hx:23: characters 5-27
		return $this1->work($task);
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


		self::$EAGER = new EagerWorker();
		self::$pool = \Array_hx::wrap([Worker_Impl_::$EAGER]);
	}
}

Boot::registerClass(Worker_Impl_::class, 'tink.io._Worker.Worker_Impl_');
Worker_Impl_::__hx__init();
