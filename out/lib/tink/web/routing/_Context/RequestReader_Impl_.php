<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace tink\web\routing\_Context;

use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\core\Outcome;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Promise\Promise_Impl_;

final class RequestReader_Impl_ {
	/**
	 * @param \Closure $read
	 * 
	 * @return \Closure
	 */
	static public function ofSafeStringReader ($read) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_web/0.1.5/haxelib/src/tink/web/routing/Context.hx:203: characters 5-64
		return RequestReader_Impl_::ofStringReader(function ($s)  use (&$read) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_web/0.1.5/haxelib/src/tink/web/routing/Context.hx:203: characters 40-63
			return Outcome::Success($read($s));
		});
	}

	/**
	 * @param \Closure $read
	 * 
	 * @return \Closure
	 */
	static public function ofStringReader ($read) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_web/0.1.5/haxelib/src/tink/web/routing/Context.hx:197: lines 197-200
		return function ($ctx)  use (&$read) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_web/0.1.5/haxelib/src/tink/web/routing/Context.hx:199: lines 199-200
			return Promise_Impl_::next($ctx->allRaw(), function ($body)  use (&$read) {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_web/0.1.5/haxelib/src/tink/web/routing/Context.hx:200: characters 57-72
				$o = $body->toString();
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_web/0.1.5/haxelib/src/tink/web/routing/Context.hx:200: characters 45-73
				return new SyncFuture(new LazyConst($read($o)));
			});
		};
	}
}

Boot::registerClass(RequestReader_Impl_::class, 'tink.web.routing._Context.RequestReader_Impl_');