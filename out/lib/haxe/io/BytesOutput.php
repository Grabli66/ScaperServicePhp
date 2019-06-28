<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace haxe\io;

use \php\Boot;
use \php\_Boot\HxException;

class BytesOutput extends Output {
	/**
	 * @var BytesBuffer
	 */
	public $b;

	/**
	 * @return void
	 */
	public function __construct () {
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/_std/haxe/io/BytesOutput.hx:32: characters 3-24
		$this->b = new BytesBuffer();
	}

	/**
	 * Returns the `Bytes` of this output.
	 * This function should not be called more than once on a given
	 * `BytesOutput` instance.
	 * 
	 * @return Bytes
	 */
	public function getBytes () {
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/_std/haxe/io/BytesOutput.hx:51: characters 3-22
		return $this->b->getBytes();
	}

	/**
	 * @param int $c
	 * 
	 * @return void
	 */
	public function writeByte ($c) {
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/_std/haxe/io/BytesOutput.hx:36: characters 3-15
		$_this = $this->b;
		$_this->b = ($_this->b . chr($c));
	}

	/**
	 * @param Bytes $buf
	 * @param int $pos
	 * @param int $len
	 * 
	 * @return int
	 */
	public function writeBytes ($buf, $pos, $len) {
		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/_std/haxe/io/BytesOutput.hx:40: characters 3-26
		$_this = $this->b;
		if (($pos < 0) || ($len < 0) || (($pos + $len) > $buf->length)) {
			throw new HxException(Error::OutsideBounds());
		} else {
			$_this->b = ($_this->b . substr($buf->b->s, $pos, $len));
		}

		#C:\Users\VEgorov\AppData\Roaming/haxe/versions/4.0.0-rc.3/std/php/_std/haxe/io/BytesOutput.hx:41: characters 3-13
		return $len;
	}
}

Boot::registerClass(BytesOutput::class, 'haxe.io.BytesOutput');
