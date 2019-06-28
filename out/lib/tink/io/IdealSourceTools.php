<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace tink\io;

use \tink\chunk\ChunkObject;
use \php\_Boot\HxAnon;
use \php\Boot;
use \tink\io\_Source\Source_Impl_;
use \tink\streams\StreamObject;
use \tink\io\_StreamParser\StreamParser_Impl_;
use \tink\core\Outcome;
use \tink\core\MPair;
use \tink\core\_Future\FutureObject;

class IdealSourceTools {
	/**
	 * @param StreamObject $s
	 * 
	 * @return FutureObject
	 */
	static public function all ($s) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/Source.hx:199: lines 199-201
		return Source_Impl_::concatAll($s)->map(function ($o) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/Source.hx:200: characters 24-25
			return $o->params[0];
		})->gather();
	}

	/**
	 * @param StreamObject $s
	 * @param StreamParserObject $p
	 * 
	 * @return FutureObject
	 */
	static public function parse ($s, $p) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/Source.hx:204: lines 204-207
		return StreamParser_Impl_::parse($s, $p)->map(function ($r) {
			$__hx__switch = ($r->index);
			if ($__hx__switch === 0) {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/Source.hx:205: characters 32-61
				return Outcome::Success(new MPair($r->params[0], $r->params[1]));
			} else if ($__hx__switch === 1) {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/Source.hx:206: characters 27-37
				return Outcome::Failure($r->params[0]);
			}
		})->gather();
	}

	/**
	 * @param StreamObject $s
	 * @param StreamParserObject $p
	 * 
	 * @return StreamObject
	 */
	static public function parseStream ($s, $p) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/Source.hx:210: characters 5-42
		return StreamParser_Impl_::parseStream($s, $p);
	}

	/**
	 * @param StreamObject $s
	 * @param ChunkObject $delim
	 * 
	 * @return object
	 */
	static public function split ($s, $delim) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/Source.hx:213: characters 5-63
		$s1 = RealSourceTools::split($s, $delim);
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/Source.hx:216: characters 15-65
		$tmp = RealSourceTools::idealize($s1->before, function ($e) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/Source.hx:216: characters 45-64
			return Source_Impl_::$EMPTY;
		});
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/Source.hx:217: characters 18-29
		$s2 = $s1->delimiter;
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/Source.hx:215: lines 215-219
		return new HxAnon([
			"before" => $tmp,
			"delimiter" => $s2,
			"after" => RealSourceTools::idealize($s1->after, function ($e1) {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/Source.hx:218: characters 43-62
				return Source_Impl_::$EMPTY;
			}),
		]);
	}
}

Boot::registerClass(IdealSourceTools::class, 'tink.io.IdealSourceTools');
