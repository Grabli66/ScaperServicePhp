<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace tink\io;

use \tink\chunk\ChunkObject;
use \haxe\ds\Option;
use \php\Boot;
use \tink\streams\Single;
use \tink\core\Outcome;
use \tink\core\_Lazy\LazyConst;
use \tink\streams\Conclusion;

class PipeResultTools {
	/**
	 * Transform PipeResult to an Outcome of the sink result
	 * 
	 * @param PipeResult $result
	 * 
	 * @return Outcome
	 */
	static public function toOutcome ($result) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/PipeResult.hx:20: lines 20-24
		$__hx__switch = ($result->index);
		if ($__hx__switch === 0) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/PipeResult.hx:21: characters 24-37
			return Outcome::Success(Option::None());
		} else if ($__hx__switch === 1) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/PipeResult.hx:22: characters 34-55
			return Outcome::Success(Option::Some($result->params[0]));
		} else if ($__hx__switch === 2) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/PipeResult.hx:23: characters 48-58
			return Outcome::Failure($result->params[0]);
		} else if ($__hx__switch === 3) {
			return Outcome::Failure($result->params[0]);
		}
	}

	/**
	 * @param Conclusion $c
	 * @param mixed $result
	 * @param ChunkObject $buffered
	 * 
	 * @return PipeResult
	 */
	static public function toResult ($c, $result, $buffered = null) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/PipeResult.hx:30: lines 30-34
		$mk = function ($s)  use (&$buffered) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/PipeResult.hx:31: lines 31-34
			if ($buffered === null) {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/PipeResult.hx:32: characters 20-21
				return $s;
			} else {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/PipeResult.hx:33: characters 17-29
				return $s->prepend(new Single(new LazyConst($buffered)));
			}
		};
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/PipeResult.hx:36: lines 36-41
		$__hx__switch = ($c->index);
		if ($__hx__switch === 0) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/PipeResult.hx:40: characters 26-53
			return PipeResult::SinkEnded($result, $mk($c->params[0]));
		} else if ($__hx__switch === 1) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/PipeResult.hx:38: characters 30-53
			return PipeResult::SinkFailed($c->params[0], $mk($c->params[1]));
		} else if ($__hx__switch === 2) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/PipeResult.hx:37: characters 23-38
			return PipeResult::SourceFailed($c->params[0]);
		} else if ($__hx__switch === 3) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/PipeResult.hx:39: characters 22-32
			return PipeResult::AllWritten();
		}
	}
}

Boot::registerClass(PipeResultTools::class, 'tink.io.PipeResultTools');
