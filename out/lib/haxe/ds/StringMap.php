<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace haxe\ds;

use \php\Boot;
use \haxe\IMap;
use \php\_NativeIndexedArray\NativeIndexedArrayIterator;

/**
 * StringMap allows mapping of String keys to arbitrary values.
 * See `Map` for documentation details.
 * @see https://haxe.org/manual/std-Map.html
 */
class StringMap implements IMap {
	/**
	 * @var mixed
	 */
	public $data;

	/**
	 * Creates a new StringMap.
	 * 
	 * @return void
	 */
	public function __construct () {
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/_std/haxe/ds/StringMap.hx:34: characters 3-32
		$this->data = [];
	}

	/**
	 * See `Map.exists`
	 * 
	 * @param string $key
	 * 
	 * @return bool
	 */
	public function exists ($key) {
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/_std/haxe/ds/StringMap.hx:46: characters 3-44
		return array_key_exists($key, $this->data);
	}

	/**
	 * See `Map.get`
	 * 
	 * @param string $key
	 * 
	 * @return mixed
	 */
	public function get ($key) {
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/_std/haxe/ds/StringMap.hx:42: characters 3-42
		return ($this->data[$key] ?? null);
	}

	/**
	 * See `Map.iterator`
	 * 
	 * @return object
	 */
	public function iterator () {
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/_std/haxe/ds/StringMap.hx:63: characters 10-25
		return new NativeIndexedArrayIterator(array_values($this->data));
	}

	/**
	 * See `Map.keys`
	 * 
	 * @return object
	 */
	public function keys () {
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/_std/haxe/ds/StringMap.hx:59: characters 10-72
		return new NativeIndexedArrayIterator(array_values(array_map("strval", array_keys($this->data))));
	}
}

Boot::registerClass(StringMap::class, 'haxe.ds.StringMap');
