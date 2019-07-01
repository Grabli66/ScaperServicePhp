<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\core\_Callback;

use \php\Boot;

class LinkPair implements LinkObject {
	/**
	 * @var LinkObject
	 */
	public $a;
	/**
	 * @var LinkObject
	 */
	public $b;
	/**
	 * @var bool
	 */
	public $dissolved;

	/**
	 * @param LinkObject $a
	 * @param LinkObject $b
	 * 
	 * @return void
	 */
	public function __construct ($a, $b) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:106: characters 24-29
		$this->dissolved = false;
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:108: characters 5-15
		$this->a = $a;
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:109: characters 5-15
		$this->b = $b;
	}

	/**
	 * @return void
	 */
	public function cancel () {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:113: lines 113-119
		if (!$this->dissolved) {
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:114: characters 7-23
			$this->dissolved = true;
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:115: characters 7-17
			$this1 = $this->a;
			if ($this1 !== null) {
				$this1->cancel();
			}

			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:116: characters 7-17
			$this2 = $this->b;
			if ($this2 !== null) {
				$this2->cancel();
			}

			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:117: characters 7-15
			$this->a = null;
			#/home/grabli66/haxelib/tink_core/git/src/tink/core/Callback.hx:118: characters 7-15
			$this->b = null;
		}
	}
}

Boot::registerClass(LinkPair::class, 'tink.core._Callback.LinkPair');
