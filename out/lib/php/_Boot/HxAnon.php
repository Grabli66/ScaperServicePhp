<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace php\_Boot;

use \php\Boot;

/**
 * Anonymous objects implementation
 */
class HxAnon extends \StdClass {
	/**
	 * @param mixed $fields
	 * 
	 * @return void
	 */
	public function __construct ($fields = null) {
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/Boot.hx:924: lines 924-929
		$_gthis = $this;
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/Boot.hx:925: characters 3-10
		;
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/Boot.hx:926: lines 926-928
		if ($fields !== null) {
			#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/Boot.hx:927: characters 4-84
			foreach ($fields as $key => $value) {
				#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/Boot.hx:927: characters 65-69
				$tmp = $_gthis;
				#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/Boot.hx:927: characters 49-83
				$tmp->{$key} = $value;
			}
		}
	}

	/**
	 * @param string $name
	 * @param mixed $args
	 * 
	 * @return mixed
	 */
	public function __call ($name, $args) {
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/Boot.hx:938: characters 3-57
		return ($this->$name)(...$args);
	}

	/**
	 * @param string $name
	 * 
	 * @return mixed
	 */
	public function __get ($name) {
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/Boot.hx:933: characters 3-14
		return null;
	}
}

Boot::registerClass(HxAnon::class, 'php._Boot.HxAnon');