<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\core;

use \php\Boot;

class MPair {
	/**
	 * @var mixed
	 */
	public $a;
	/**
	 * @var mixed
	 */
	public $b;

	/**
	 * @param mixed $a
	 * @param mixed $b
	 * 
	 * @return void
	 */
	public function __construct ($a, $b) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Pair.hx:27: characters 5-15
		$this->a = $a;
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Pair.hx:28: characters 5-15
		$this->b = $b;
	}
}

Boot::registerClass(MPair::class, 'tink.core.MPair');
