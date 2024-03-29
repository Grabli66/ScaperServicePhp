<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\io;

use \php\Boot;
use \tink\streams\StreamObject;
use \php\_Boot\HxException;
use \tink\core\_Future\FutureObject;

class SinkBase implements SinkObject {

	/**
	 * @param StreamObject $source
	 * @param object $options
	 * 
	 * @return FutureObject
	 */
	public function consume ($source, $options) {
		#/home/grabli66/haxelib/tink_io/git/src/tink/io/Sink.hx:109: characters 12-17
		throw new HxException("not implemented");
	}

	/**
	 * @return bool
	 */
	public function get_sealed () {
		#/home/grabli66/haxelib/tink_io/git/src/tink/io/Sink.hx:106: characters 27-38
		return true;
	}
}

Boot::registerClass(SinkBase::class, 'tink.io.SinkBase');
Boot::registerGetters('tink\\io\\SinkBase', [
	'sealed' => true
]);
