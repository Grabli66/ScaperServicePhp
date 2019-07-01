<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

use \php\Boot;

/**
 * The `Lambda` class is a collection of methods to support functional
 * programming. It is ideally used with `using Lambda` and then acts as an
 * extension to Iterable types.
 * On static platforms, working with the Iterable structure might be slower
 * than performing the operations directly on known types, such as Array and
 * List.
 * If the first argument to any of the methods is null, the result is
 * unspecified.
 * @see https://haxe.org/manual/std-Lambda.html
 */
class Lambda {
	/**
	 * Tells if `it` contains an element for which `f` is true.
	 * This function returns true as soon as an element is found for which a
	 * call to `f` returns true.
	 * If no such element is found, the result is false.
	 * If `f` is null, the result is unspecified.
	 * 
	 * @param object $it
	 * @param \Closure $f
	 * 
	 * @return bool
	 */
	static public function exists ($it, $f) {
		#/home/grabli66/haxe/std/Lambda.hx:128: characters 13-15
		$x = $it->iterator();
		while ($x->hasNext()) {
			#/home/grabli66/haxe/std/Lambda.hx:129: lines 129-130
			if ($f($x->next())) {
				#/home/grabli66/haxe/std/Lambda.hx:130: characters 5-16
				return true;
			}
		}

		#/home/grabli66/haxe/std/Lambda.hx:131: characters 3-15
		return false;
	}
}

Boot::registerClass(Lambda::class, 'Lambda');
