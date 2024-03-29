<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace haxe;

use \php\Boot;

class MainEvent {
	/**
	 * @var \Closure
	 */
	public $f;
	/**
	 * @var bool
	 * Tells if the event can lock the process from exiting (default:true)
	 */
	public $isBlocking;
	/**
	 * @var MainEvent
	 */
	public $next;
	/**
	 * @var float
	 */
	public $nextRun;
	/**
	 * @var MainEvent
	 */
	public $prev;
	/**
	 * @var int
	 */
	public $priority;

	/**
	 * @param \Closure $f
	 * @param int $p
	 * 
	 * @return void
	 */
	public function __construct ($f, $p) {
		#/home/grabli66/haxe/std/haxe/MainLoop.hx:12: characters 33-37
		$this->isBlocking = true;
		#/home/grabli66/haxe/std/haxe/MainLoop.hx:17: characters 3-13
		$this->f = $f;
		#/home/grabli66/haxe/std/haxe/MainLoop.hx:18: characters 3-20
		$this->priority = $p;
		#/home/grabli66/haxe/std/haxe/MainLoop.hx:19: characters 3-15
		$this->nextRun = -1;
	}

	/**
	 * Delay the execution of the event for the given time, in seconds.
	 * If t is null, the event will be run at tick() time.
	 * 
	 * @param float $t
	 * 
	 * @return void
	 */
	public function delay ($t) {
		#/home/grabli66/haxe/std/haxe/MainLoop.hx:27: characters 3-52
		$this->nextRun = ($t === null ? -1 : microtime(true) + $t);
	}

	/**
	 * Stop the event from firing anymore.
	 * 
	 * @return void
	 */
	public function stop () {
		#/home/grabli66/haxe/std/haxe/MainLoop.hx:41: characters 3-25
		if ($this->f === null) {
			#/home/grabli66/haxe/std/haxe/MainLoop.hx:41: characters 19-25
			return;
		}
		#/home/grabli66/haxe/std/haxe/MainLoop.hx:42: characters 3-11
		$this->f = null;
		#/home/grabli66/haxe/std/haxe/MainLoop.hx:43: characters 3-15
		$this->nextRun = -1;
		#/home/grabli66/haxe/std/haxe/MainLoop.hx:44: lines 44-47
		if ($this->prev === null) {
			#/home/grabli66/haxe/std/haxe/MainLoop.hx:45: characters 20-43
			MainLoop::$pending = $this->next;
		} else {
			#/home/grabli66/haxe/std/haxe/MainLoop.hx:47: characters 4-20
			$this->prev->next = $this->next;
		}
		#/home/grabli66/haxe/std/haxe/MainLoop.hx:48: lines 48-49
		if ($this->next !== null) {
			#/home/grabli66/haxe/std/haxe/MainLoop.hx:49: characters 4-20
			$this->next->prev = $this->prev;
		}
	}
}

Boot::registerClass(MainEvent::class, 'haxe.MainEvent');
