<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\core;

use \php\Boot;

class NamedWith {
	/**
	 * @var mixed
	 */
	public $name;
	/**
	 * @var mixed
	 */
	public $value;

	/**
	 * @param mixed $name
	 * @param mixed $value
	 * 
	 * @return void
	 */
	public function __construct ($name, $value) {
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Named.hx:12: characters 5-21
		$this->name = $name;
		#/home/grabli66/haxelib/tink_core/git/src/tink/core/Named.hx:13: characters 5-23
		$this->value = $value;
	}
}

Boot::registerClass(NamedWith::class, 'tink.core.NamedWith');
