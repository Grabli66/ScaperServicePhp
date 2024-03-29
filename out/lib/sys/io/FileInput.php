<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace sys\io;

use \haxe\io\_BytesData\Container;
use \php\Boot;
use \haxe\io\Eof;
use \haxe\io\Error;
use \haxe\io\Input;
use \php\_Boot\HxException;
use \haxe\io\Bytes;

/**
 * Use `sys.io.File.read` to create a `FileInput`.
 */
class FileInput extends Input {
	/**
	 * @var mixed
	 */
	public $__f;

	/**
	 * @param mixed $f
	 * 
	 * @return void
	 */
	public function __construct ($f) {
		#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:37: characters 3-10
		$this->__f = $f;
	}

	/**
	 * @return void
	 */
	public function close () {
		#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:58: characters 3-16
		parent::close();
		#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:59: characters 3-30
		if ($this->__f !== null) {
			#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:59: characters 19-30
			fclose($this->__f);
		}
	}

	/**
	 * @return int
	 */
	public function readByte () {
		#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:41: characters 3-25
		$r = fread($this->__f, 1);
		#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:42: characters 3-22
		if (feof($this->__f)) {
			#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:42: characters 17-22
			throw new HxException(new Eof());
		}
		#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:43: characters 3-23
		if ($r === false) {
			#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:43: characters 18-23
			throw new HxException(Error::Custom("An error occurred"));
		}
		#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:44: characters 3-16
		return ord($r);
	}

	/**
	 * @param Bytes $s
	 * @param int $p
	 * @param int $l
	 * 
	 * @return int
	 */
	public function readBytes ($s, $p, $l) {
		#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:48: characters 3-22
		if (feof($this->__f)) {
			#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:48: characters 17-22
			throw new HxException(new Eof());
		}
		#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:49: characters 3-25
		$r = fread($this->__f, $l);
		#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:50: characters 3-23
		if ($r === false) {
			#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:50: characters 18-23
			throw new HxException(Error::Custom("An error occurred"));
		}
		#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:51: characters 3-27
		if (strlen($r) === 0) {
			#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:51: characters 22-27
			throw new HxException(new Eof());
		}
		#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:52: characters 11-28
		$b = strlen($r);
		#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:52: characters 3-29
		$b1 = new Bytes($b, new Container($r));
		#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:53: characters 3-29
		$len = strlen($r);
		if (($p < 0) || ($len < 0) || (($p + $len) > $s->length) || ($len > $b1->length)) {
			throw new HxException(Error::OutsideBounds());
		} else {
			$this1 = $s->b;
			$src = $b1->b;
			$this1->s = ((substr($this1->s, 0, $p) . substr($src->s, 0, $len)) . substr($this1->s, $p + $len));
		}

		#/home/grabli66/haxe/std/php/_std/sys/io/FileInput.hx:54: characters 3-19
		return strlen($r);
	}
}

Boot::registerClass(FileInput::class, 'sys.io.FileInput');
