<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

use \php\Boot;
use \php\_Boot\HxString;

/**
 * This class gives you access to many base functionalities of system platforms. Looks in `sys` sub packages for more system APIs.
 */
class Sys {
	/**
	 * @var string
	 */
	static public $lineEnd;

	/**
	 * Returns the name of the system you are running on. For instance :
	 * "Windows", "Linux", "BSD" and "Mac" depending on your desktop OS.
	 * 
	 * @return string
	 */
	static public function systemName () {
		#/home/grabli66/haxe/std/php/_std/Sys.hx:80: characters 3-33
		$s = php_uname("s");
		#/home/grabli66/haxe/std/php/_std/Sys.hx:81: characters 3-26
		$p = HxString::indexOf($s, " ");
		#/home/grabli66/haxe/std/php/_std/Sys.hx:82: characters 10-39
		if ($p >= 0) {
			#/home/grabli66/haxe/std/php/_std/Sys.hx:82: characters 20-34
			return mb_substr($s, 0, $p);
		} else {
			#/home/grabli66/haxe/std/php/_std/Sys.hx:82: characters 37-38
			return $s;
		}
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


		self::$lineEnd = (Sys::systemName() === "Windows" ? "\x0D\x0A" : "\x0A");
	}
}

Boot::registerClass(Sys::class, 'Sys');
Sys::__hx__init();
