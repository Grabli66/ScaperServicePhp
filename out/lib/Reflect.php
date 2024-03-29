<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

use \php\_Boot\HxAnon;
use \php\Boot;
use \php\_Boot\HxClass;

/**
 * The Reflect API is a way to manipulate values dynamically through an
 * abstract interface in an untyped manner. Use with care.
 * @see https://haxe.org/manual/std-reflection.html
 */
class Reflect {
	/**
	 * Copies the fields of structure `o`.
	 * This is only guaranteed to work on anonymous structures.
	 * If `o` is null, the result is unspecified.
	 * 
	 * @param mixed $o
	 * 
	 * @return mixed
	 */
	static public function copy ($o) {
		#/home/grabli66/haxe/std/php/_std/Reflect.hx:162: lines 162-166
		if (($o instanceof HxAnon)) {
			#/home/grabli66/haxe/std/php/_std/Reflect.hx:163: characters 4-26
			return (clone $o);
		} else {
			#/home/grabli66/haxe/std/php/_std/Reflect.hx:165: characters 4-15
			return null;
		}
	}

	/**
	 * Returns the value of the field named `field` on object `o`.
	 * If `o` is not an object or has no field named `field`, the result is
	 * null.
	 * If the field is defined as a property, its accessors are ignored. Refer
	 * to `Reflect.getProperty` for a function supporting property accessors.
	 * If `field` is null, the result is unspecified.
	 * (As3) If used on a property field, the getter will be invoked. It is
	 * not possible to obtain the value directly.
	 * 
	 * @param mixed $o
	 * @param string $field
	 * 
	 * @return mixed
	 */
	static public function field ($o, $field) {
		#/home/grabli66/haxe/std/php/_std/Reflect.hx:47: lines 47-49
		if (is_string($o)) {
			#/home/grabli66/haxe/std/php/_std/Reflect.hx:48: characters 24-45
			$tmp = Boot::dynamicString($o);
			#/home/grabli66/haxe/std/php/_std/Reflect.hx:48: characters 4-53
			return $tmp->{$field};
		}
		#/home/grabli66/haxe/std/php/_std/Reflect.hx:50: characters 3-34
		if (!is_object($o)) {
			#/home/grabli66/haxe/std/php/_std/Reflect.hx:50: characters 23-34
			return null;
		}
		#/home/grabli66/haxe/std/php/_std/Reflect.hx:52: lines 52-54
		if (($field === "") && (PHP_VERSION_ID < 70100)) {
			#/home/grabli66/haxe/std/php/_std/Reflect.hx:53: characters 4-56
			return (((array)($o))[$field] ?? null);
		}
		#/home/grabli66/haxe/std/php/_std/Reflect.hx:56: lines 56-58
		if (property_exists($o, $field)) {
			#/home/grabli66/haxe/std/php/_std/Reflect.hx:57: characters 24-25
			$tmp1 = $o;
			#/home/grabli66/haxe/std/php/_std/Reflect.hx:57: characters 4-33
			return $tmp1->{$field};
		}
		#/home/grabli66/haxe/std/php/_std/Reflect.hx:59: lines 59-61
		if (method_exists($o, $field)) {
			#/home/grabli66/haxe/std/php/_std/Reflect.hx:60: characters 4-44
			return Boot::getInstanceClosure($o, $field);
		}
		#/home/grabli66/haxe/std/php/_std/Reflect.hx:63: lines 63-74
		if (($o instanceof HxClass)) {
			#/home/grabli66/haxe/std/php/_std/Reflect.hx:64: characters 4-54
			$phpClassName = $o->phpClassName;
			#/home/grabli66/haxe/std/php/_std/Reflect.hx:65: lines 65-67
			if (defined("" . ($phpClassName??'null') . "::" . ($field??'null'))) {
				#/home/grabli66/haxe/std/php/_std/Reflect.hx:66: characters 5-52
				return constant("" . ($phpClassName??'null') . "::" . ($field??'null'));
			}
			#/home/grabli66/haxe/std/php/_std/Reflect.hx:68: lines 68-70
			if (property_exists($phpClassName, $field)) {
				#/home/grabli66/haxe/std/php/_std/Reflect.hx:69: characters 25-26
				$tmp2 = $o;
				#/home/grabli66/haxe/std/php/_std/Reflect.hx:69: characters 5-34
				return $tmp2->{$field};
			}
			#/home/grabli66/haxe/std/php/_std/Reflect.hx:71: lines 71-73
			if (method_exists($phpClassName, $field)) {
				#/home/grabli66/haxe/std/php/_std/Reflect.hx:72: characters 5-54
				return Boot::getStaticClosure($phpClassName, $field);
			}
		}
		#/home/grabli66/haxe/std/php/_std/Reflect.hx:76: characters 3-14
		return null;
	}

	/**
	 * Returns the fields of structure `o`.
	 * This method is only guaranteed to work on anonymous structures. Refer to
	 * `Type.getInstanceFields` for a function supporting class instances.
	 * If `o` is null, the result is unspecified.
	 * 
	 * @param mixed $o
	 * 
	 * @return \Array_hx
	 */
	static public function fields ($o) {
		#/home/grabli66/haxe/std/php/_std/Reflect.hx:113: lines 113-115
		if (is_object($o)) {
			#/home/grabli66/haxe/std/php/_std/Reflect.hx:114: characters 4-77
			return \Array_hx::wrap(array_keys(get_object_vars($o)));
		}
		#/home/grabli66/haxe/std/php/_std/Reflect.hx:116: characters 3-12
		return new \Array_hx();
	}

	/**
	 * Sets the field named `field` of object `o` to value `value`.
	 * If `o` has no field named `field`, this function is only guaranteed to
	 * work for anonymous structures.
	 * If `o` or `field` are null, the result is unspecified.
	 * (As3) If used on a property field, the setter will be invoked. It is
	 * not possible to set the value directly.
	 * 
	 * @param mixed $o
	 * @param string $field
	 * @param mixed $value
	 * 
	 * @return void
	 */
	static public function setField ($o, $field, $value) {
		#/home/grabli66/haxe/std/php/_std/Reflect.hx:80: characters 19-20
		$tmp = $o;
		#/home/grabli66/haxe/std/php/_std/Reflect.hx:80: characters 3-35
		$tmp->{$field} = $value;
	}
}

Boot::registerClass(Reflect::class, 'Reflect');
