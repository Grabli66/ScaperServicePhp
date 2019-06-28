<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace tink\io\_Sink;

use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\core\TypedError;
use \tink\streams\StreamObject;
use \tink\core\_Lazy\LazyConst;
use \tink\io\PipeResult;
use \tink\core\_Future\FutureObject;
use \tink\io\SinkBase;

class ErrorSink extends SinkBase {
	/**
	 * @var TypedError
	 */
	public $error;

	/**
	 * @param TypedError $error
	 * 
	 * @return void
	 */
	public function __construct ($error) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/Sink.hx:87: characters 5-23
		$this->error = $error;
	}

	/**
	 * @param StreamObject $source
	 * @param object $options
	 * 
	 * @return FutureObject
	 */
	public function consume ($source, $options) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/Sink.hx:93: characters 12-66
		return new SyncFuture(new LazyConst(PipeResult::SinkFailed($this->error, $source)));
	}

	/**
	 * @return bool
	 */
	public function get_sealed () {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_io/0.7.0/haxelib/src/tink/io/Sink.hx:90: characters 5-17
		return false;
	}
}

Boot::registerClass(ErrorSink::class, 'tink.io._Sink.ErrorSink');
