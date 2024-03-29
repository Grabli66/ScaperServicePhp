<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\http;

use \php\_Boot\HxAnon;
use \php\Boot;
use \tink\core\TypedError;
use \tink\io\ParseStep;
use \tink\io\BytewiseParser;

class HeaderParser extends BytewiseParser {
	/**
	 * @var ParseStep
	 */
	static public $INVALID;

	/**
	 * @var \StringBuf
	 */
	public $buf;
	/**
	 * @var \Array_hx
	 */
	public $fields;
	/**
	 * @var mixed
	 */
	public $header;
	/**
	 * @var int
	 */
	public $last;
	/**
	 * @var \Closure
	 */
	public $makeHeader;

	/**
	 * @param \Closure $makeHeader
	 * 
	 * @return void
	 */
	public function __construct ($makeHeader) {
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:298: characters 18-20
		$this->last = -1;
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:303: characters 5-31
		$this->buf = new \StringBuf();
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:304: characters 5-33
		$this->makeHeader = $makeHeader;
	}

	/**
	 * @return ParseStep
	 */
	public function nextLine () {
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:345: characters 5-31
		$line = $this->buf->b;
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:347: characters 5-26
		$this->buf = new \StringBuf();
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:348: characters 5-14
		$this->last = -1;
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:351: lines 351-372
		if ($line === "") {
			#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:353: lines 353-356
			if ($this->header === null) {
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:354: characters 13-23
				return ParseStep::Progressed();
			} else {
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:356: characters 13-25
				return ParseStep::Done($this->header);
			}
		} else if ($this->header === null) {
			#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:359: characters 20-49
			$_g = ($this->makeHeader)($line, $this->fields = new \Array_hx());
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:362: characters 28-29
				$_g1 = $_g->params[0];
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:360: lines 360-364
				if ($_g1 === null) {
					#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:361: characters 17-41
					return ParseStep::Done($this->header = null);
				} else {
					#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:363: characters 17-32
					$this->header = $_g1;
					#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:364: characters 17-27
					return ParseStep::Progressed();
				}
			} else if ($__hx__switch === 1) {
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:366: characters 17-26
				return ParseStep::Failed($_g->params[0]);
			}
		} else {
			#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:369: characters 13-52
			$_this = $this->fields;
			$x = HeaderField::ofString($line);
			$_this->arr[$_this->length] = $x;
			++$_this->length;

			#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:370: characters 13-23
			return ParseStep::Progressed();
		}
	}

	/**
	 * @param int $c
	 * 
	 * @return ParseStep
	 */
	public function read ($c) {
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:311: characters 15-19
		$_g = $this->last;
		#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:311: characters 21-22
		if ($c === -1) {
			#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:314: characters 11-21
			return $this->nextLine();
		} else if ($c === 10) {
			#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:311: characters 15-19
			if ($_g === 13) {
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:318: characters 11-21
				return $this->nextLine();
			} else {
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:339: characters 11-23
				$this->last = $c;
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:340: characters 11-29
				$_this = $this->buf;
				$_this->b = ($_this->b??'null') . (mb_chr($c)??'null');

				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:341: characters 11-21
				return ParseStep::Progressed();
			}
		} else if ($c === 13) {
			#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:311: characters 15-19
			if ($_g === 13) {
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:322: characters 11-28
				$_this1 = $this->buf;
				$_this1->b = ($_this1->b??'null') . (mb_chr($this->last)??'null');

				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:323: characters 11-21
				return ParseStep::Progressed();
			} else {
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:334: characters 11-27
				$this->last = 13;
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:335: characters 11-21
				return ParseStep::Progressed();
			}
		} else {
			#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:311: characters 15-19
			if ($_g === 13) {
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:327: characters 11-28
				$_this2 = $this->buf;
				$_this2->b = ($_this2->b??'null') . (mb_chr($this->last)??'null');

				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:328: characters 11-29
				$_this3 = $this->buf;
				$_this3->b = ($_this3->b??'null') . (mb_chr($c)??'null');

				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:329: characters 11-20
				$this->last = -1;
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:330: characters 11-21
				return ParseStep::Progressed();
			} else {
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:339: characters 11-23
				$this->last = $c;
				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:340: characters 11-29
				$_this4 = $this->buf;
				$_this4->b = ($_this4->b??'null') . (mb_chr($c)??'null');

				#/home/grabli66/haxelib/tink_http/git/src/tink/http/Header.hx:341: characters 11-21
				return ParseStep::Progressed();
			}
		}
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$INVALID = ParseStep::Failed(new TypedError(422, "Invalid HTTP header", new HxAnon([
			"fileName" => "tink/http/Header.hx",
			"lineNumber" => 307,
			"className" => "tink.http.HeaderParser",
			"methodName" => "INVALID",
		])));
	}
}

Boot::registerClass(HeaderParser::class, 'tink.http.HeaderParser');
HeaderParser::__hx__init();
