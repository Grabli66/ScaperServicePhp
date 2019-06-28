<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace php;

use \haxe\ds\StringMap;

/**
 * Platform-specific PHP Library. Provides some platform-specific functions
 * for the PHP target, such as conversion from Haxe types to native types
 * and vice-versa.
 */
class Lib {
	/**
	 * @param mixed $arr
	 * 
	 * @return StringMap
	 */
	static public function hashOfAssociativeArray ($arr) {
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/Lib.hx:101: characters 3-32
		$result = new StringMap();
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/Lib.hx:102: characters 19-36
		$result->data = $arr;
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/Lib.hx:103: characters 3-16
		return $result;
	}
}

Boot::registerClass(Lib::class, 'php.Lib');