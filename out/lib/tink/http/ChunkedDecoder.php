<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace tink\http;

use \tink\io\RealSourceTools;
use \php\Boot;
use \tink\io\Transformer;
use \tink\streams\StreamObject;
use \tink\streams\_Stream\Mapping_Impl_;
use \tink\_Chunk\Chunk_Impl_;

class ChunkedDecoder implements Transformer {
	/**
	 * @return void
	 */
	public function __construct () {
	}

	/**
	 * @param StreamObject $source
	 * 
	 * @return StreamObject
	 */
	public function transform ($source) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_http/0.8.2/haxelib/src/tink/http/Chunked.hx:48: lines 48-52
		return RealSourceTools::parseStream($source, new ChunkedParser())->map(Mapping_Impl_::ofPlain(function ($v) {
			#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_http/0.8.2/haxelib/src/tink/http/Chunked.hx:50: characters 29-56
			if ($v === null) {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_http/0.8.2/haxelib/src/tink/http/Chunked.hx:50: characters 41-52
				return Chunk_Impl_::$EMPTY;
			} else {
				#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_http/0.8.2/haxelib/src/tink/http/Chunked.hx:50: characters 55-56
				return $v;
			}
		}));
	}
}

Boot::registerClass(ChunkedDecoder::class, 'tink.http.ChunkedDecoder');
