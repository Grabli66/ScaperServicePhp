<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace haxe\ds\_Vector;

use \php\Boot;

class PhpVectorData {
	/**
	 * @var mixed
	 */
	public $data;
	/**
	 * @var int
	 */
	public $length;

	/**
	 * @param int $length
	 * 
	 * @return void
	 */
	public function __construct ($length) {
		#/home/grabli66/haxe/std/php/_std/haxe/ds/Vector.hx:31: characters 3-23
		$this->length = $length;
		#/home/grabli66/haxe/std/php/_std/haxe/ds/Vector.hx:32: characters 3-34
		$this->data = [];
	}
}

Boot::registerClass(PhpVectorData::class, 'haxe.ds._Vector.PhpVectorData');
