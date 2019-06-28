<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace tink\json;

use \php\Boot;
use \php\_Boot\HxEnum;

class Value extends HxEnum {
	/**
	 * @param \Array_hx $a
	 * 
	 * @return Value
	 */
	static public function VArray ($a) {
		return new Value('VArray', 4, [$a]);
	}

	/**
	 * @param bool $b
	 * 
	 * @return Value
	 */
	static public function VBool ($b) {
		return new Value('VBool', 3, [$b]);
	}

	/**
	 * @return Value
	 */
	static public function VNull () {
		static $inst = null;
		if (!$inst) $inst = new Value('VNull', 2, []);
		return $inst;
	}

	/**
	 * @param float $f
	 * 
	 * @return Value
	 */
	static public function VNumber ($f) {
		return new Value('VNumber', 0, [$f]);
	}

	/**
	 * @param \Array_hx $a
	 * 
	 * @return Value
	 */
	static public function VObject ($a) {
		return new Value('VObject', 5, [$a]);
	}

	/**
	 * @param string $s
	 * 
	 * @return Value
	 */
	static public function VString ($s) {
		return new Value('VString', 1, [$s]);
	}

	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			4 => 'VArray',
			3 => 'VBool',
			2 => 'VNull',
			0 => 'VNumber',
			5 => 'VObject',
			1 => 'VString',
		];
	}

	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'VArray' => 1,
			'VBool' => 1,
			'VNull' => 0,
			'VNumber' => 1,
			'VObject' => 1,
			'VString' => 1,
		];
	}
}

Boot::registerClass(Value::class, 'tink.json.Value');