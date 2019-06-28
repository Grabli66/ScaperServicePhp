<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace tink\url\_Query;

use \tink\core\NamedWith;
use \php\Boot;
use \php\_Boot\HxString;
use \tink\url\_Portion\Portion_Impl_;

class QueryStringParser {
	/**
	 * @var int
	 */
	public $pos;
	/**
	 * @var string
	 */
	public $s;
	/**
	 * @var string
	 */
	public $sep;
	/**
	 * @var string
	 */
	public $set;

	/**
	 * @param string $s
	 * @param int $start
	 * @param int $end
	 * 
	 * @return string
	 */
	static public function trimmedSub ($s, $start, $end) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:120: characters 5-49
		if ($start >= mb_strlen($s)) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:120: characters 34-49
			return "";
		}
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:122: lines 122-123
		while (\StringTools::fastCodeAt($s, $start) < 33) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:123: characters 7-14
			++$start;
		}
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:125: lines 125-127
		if ($end < (mb_strlen($s) - 1)) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:126: lines 126-127
			while (\StringTools::fastCodeAt($s, $end - 1) < 33) {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:127: characters 9-14
				--$end;
			}
		}
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:129: characters 12-48
		return HxString::substring($s, $start, $end);
	}

	/**
	 * @param string $s
	 * @param string $sep
	 * @param string $set
	 * @param int $pos
	 * 
	 * @return void
	 */
	public function __construct ($s, $sep, $set, $pos) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:88: lines 88-91
		$this->s = ($s === null ? "" : $s);
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:92: characters 5-19
		$this->sep = $sep;
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:93: characters 5-19
		$this->set = $set;
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:94: characters 5-19
		$this->pos = $pos;
	}

	/**
	 * @return bool
	 */
	public function hasNext () {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:98: characters 5-26
		return $this->pos < mb_strlen($this->s);
	}

	/**
	 * @return NamedWith
	 */
	public function next () {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:101: characters 5-36
		$next = HxString::indexOf($this->s, $this->sep, $this->pos);
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:103: lines 103-104
		if ($next === -1) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:104: characters 7-22
			$next = mb_strlen($this->s);
		}
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:106: characters 5-37
		$split = HxString::indexOf($this->s, $this->set, $this->pos);
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:107: characters 5-21
		$start = $this->pos;
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:109: characters 5-28
		$this->pos = $next + mb_strlen($this->sep);
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:112: lines 112-115
		if (($split === -1) || ($split > $next)) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:113: characters 30-56
			$tmp = Portion_Impl_::stringly(QueryStringParser::trimmedSub($this->s, $start, $next));
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:113: characters 9-61
			return new NamedWith($tmp, Portion_Impl_::ofString(""));
		} else {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:115: characters 30-57
			$tmp1 = Portion_Impl_::stringly(QueryStringParser::trimmedSub($this->s, $start, $split));
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_url/0.4.1/haxelib/src/tink/url/Query.hx:115: characters 9-99
			return new NamedWith($tmp1, QueryStringParser::trimmedSub($this->s, $split + mb_strlen($this->set), $next));
		}
	}
}

Boot::registerClass(QueryStringParser::class, 'tink.url._Query.QueryStringParser');