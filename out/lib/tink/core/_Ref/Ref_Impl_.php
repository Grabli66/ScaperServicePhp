<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace tink\core\_Ref;

use \php\Boot;
use \haxe\ds\_Vector\PhpVectorData;

final class Ref_Impl_ {

	/**
	 * @return PhpVectorData
	 */
	static public function _new () {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Ref.hx:6: character 3
		return new PhpVectorData(1);
	}

	/**
	 * @param PhpVectorData $this
	 * 
	 * @return mixed
	 */
	static public function get_value ($this1) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Ref.hx:8: characters 38-52
		return ($this1->data[0] ?? null);
	}

	/**
	 * @param PhpVectorData $this
	 * @param mixed $param
	 * 
	 * @return mixed
	 */
	static public function set_value ($this1, $param) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Ref.hx:9: characters 38-60
		return $this1->data[0] = $param;
	}

	/**
	 * @param mixed $v
	 * 
	 * @return PhpVectorData
	 */
	static public function to ($v) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Ref.hx:14: characters 5-25
		$ret = new PhpVectorData(1);
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Ref.hx:15: characters 5-18
		$ret->data[0] = $v;
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Ref.hx:16: characters 5-15
		return $ret;
	}

	/**
	 * @param PhpVectorData $this
	 * 
	 * @return string
	 */
	static public function toString ($this1) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_core/1.22.0/haxelib/src/tink/core/Ref.hx:11: characters 37-72
		return "@[" . (\Std::string(($this1->data[0] ?? null))??'null') . "]";
	}
}

Boot::registerClass(Ref_Impl_::class, 'tink.core._Ref.Ref_Impl_');
Boot::registerGetters('tink\\core\\_Ref\\Ref_Impl_', [
	'value' => true
]);
Boot::registerSetters('tink\\core\\_Ref\\Ref_Impl_', [
	'value' => true
]);