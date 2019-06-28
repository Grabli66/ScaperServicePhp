<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace tink\querystring;

use \php\_Boot\HxAnon;
use \php\Boot;
use \tink\url\_Portion\Portion_Impl_;

class Parser0 extends ParserBase {
	/**
	 * @param \Closure $onError
	 * @param object $pos
	 * 
	 * @return void
	 */
	public function __construct ($onError = null, $pos = null) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:114: lines 114-125
		parent::__construct($onError, $pos);
	}

	/**
	 * @param object $p
	 * 
	 * @return string
	 */
	public function getName ($p) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:116: characters 34-47
		return $p->name;
	}

	/**
	 * @param object $p
	 * 
	 * @return string
	 */
	public function getValue ($p) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:117: characters 35-49
		return $p->value;
	}

	/**
	 * @param object $input
	 * 
	 * @return object
	 */
	public function parse ($input) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:121: characters 9-44
		$this->init($input, Boot::getInstanceClosure($this, 'getName'), Boot::getInstanceClosure($this, 'getValue'));
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:122: characters 9-29
		return $this->parse0("");
	}

	/**
	 * @param string $prefix
	 * 
	 * @return object
	 */
	public function parse0 ($prefix) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:194: characters 26-29
		$prefix1 = ($prefix === "" ? "query" : ($prefix??'null') . ".query");
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:217: lines 217-220
		$__o = (($this->exists->data[$prefix1] ?? null) ? Portion_Impl_::stringly(($this->params->data[$prefix1] ?? null)) : $this->missing($prefix1));
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:194: characters 26-29
		$prefix2 = ($prefix === "" ? "url" : ($prefix??'null') . ".url");
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:228: characters 7-10
		return new HxAnon([
			"query" => $__o,
			"url" => (($this->exists->data[$prefix2] ?? null) ? Portion_Impl_::stringly(($this->params->data[$prefix2] ?? null)) : $this->missing($prefix2)),
		]);
	}
}

Boot::registerClass(Parser0::class, 'tink.querystring.Parser0');