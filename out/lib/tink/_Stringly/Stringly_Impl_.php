<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\_Stringly;

use \php\_Boot\HxAnon;
use \php\Boot;
use \tink\core\TypedError;
use \tink\core\Outcome;
use \tink\core\OutcomeTools;

final class Stringly_Impl_ {
	/**
	 * @var \EReg
	 */
	static public $SUPPORTED_DATE_REGEX;

	/**
	 * @param string $s
	 * @param bool $allowFloat
	 * 
	 * @return bool
	 */
	static public function isNumber ($s, $allowFloat) {
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:10: characters 5-36
		if (mb_strlen($s) === 0) {
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:10: characters 24-36
			return false;
		}
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:12: lines 12-13
		$pos = 0;
		$max = mb_strlen($s);
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:26: characters 5-20
		if ((0 < $max) && (\StringTools::fastCodeAt($s, 0) === 45)) {
			$pos = 1;
		}
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:28: lines 28-31
		if (!$allowFloat) {
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:29: lines 29-30
			if (($pos < $max) && (\StringTools::fastCodeAt($s, $pos) === 48) && ($pos++ > -1)) {
				#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:30: characters 9-24
				if (($pos < $max) && (\StringTools::fastCodeAt($s, $pos) === 120)) {
					++$pos;
				}
			}
		}
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:33: characters 5-13
		while (($pos < $max) && ((\StringTools::fastCodeAt($s, $pos) ^ 48) < 10)) {
			++$pos;
		}
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:35: lines 35-43
		if ($allowFloat && ($pos < $max)) {
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:36: lines 36-37
			if (($pos < $max) && (\StringTools::fastCodeAt($s, $pos) === 46) && ($pos++ > -1)) {
				#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:37: characters 9-17
				while (($pos < $max) && ((\StringTools::fastCodeAt($s, $pos) ^ 48) < 10)) {
					++$pos;
				}
			}
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:39: lines 39-42
			if ((($pos < $max) && (\StringTools::fastCodeAt($s, $pos) === 101) && ($pos++ > -1)) || (($pos < $max) && (\StringTools::fastCodeAt($s, $pos) === 69) && ($pos++ > -1))) {
				#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:40: characters 9-43
				if (!(($pos < $max) && (\StringTools::fastCodeAt($s, $pos) === 43) && ($pos++ > -1))) {
					#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:40: characters 28-43
					if (($pos < $max) && (\StringTools::fastCodeAt($s, $pos) === 45)) {
						++$pos;
					}
				}
				#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:41: characters 9-17
				while (($pos < $max) && ((\StringTools::fastCodeAt($s, $pos) ^ 48) < 10)) {
					++$pos;
				}
			}
		}
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:45: characters 5-22
		return $pos === $max;
	}

	/**
	 * @param bool $b
	 * 
	 * @return string
	 */
	static public function ofBool ($b) {
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:158: characters 12-38
		if ($b) {
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:158: characters 20-24
			return "true";
		} else {
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:158: characters 32-37
			return "false";
		}
	}

	/**
	 * @param \Date $d
	 * 
	 * @return string
	 */
	static public function ofDate ($d) {
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:167: characters 12-32
		return \Std::string($d->getTime());
	}

	/**
	 * @param float $f
	 * 
	 * @return string
	 */
	static public function ofFloat ($f) {
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:164: characters 5-25
		return \Std::string($f);
	}

	/**
	 * @param int $i
	 * 
	 * @return string
	 */
	static public function ofInt ($i) {
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:161: characters 5-25
		return \Std::string($i);
	}

	/**
	 * @param string $this
	 * @param \Closure $f
	 * 
	 * @return Outcome
	 */
	static public function parse ($this1, $f) {
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:155: characters 12-18
		$f1 = $f;
		$a1 = $this1;
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:155: characters 5-42
		return TypedError::catchExceptions(function ()  use (&$f1, &$a1) {
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:155: characters 12-18
			return $f1($a1);
		}, null, new HxAnon([
			"fileName" => "tink/Stringly.hx",
			"lineNumber" => 155,
			"className" => "tink._Stringly.Stringly_Impl_",
			"methodName" => "parse",
		]));
	}

	/**
	 * @param string $this
	 * 
	 * @return Outcome
	 */
	static public function parseDate ($this1) {
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:88: characters 19-31
		$_g = Stringly_Impl_::parseFloat($this1);
		$__hx__switch = ($_g->index);
		if ($__hx__switch === 0) {
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:90: characters 9-34
			return Outcome::Success(\Date::fromTime($_g->params[0]));
		} else if ($__hx__switch === 1) {
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:92: characters 9-60
			if (!Stringly_Impl_::$SUPPORTED_DATE_REGEX->match($this1)) {
				#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:92: characters 47-60
				return Outcome::Failure(new TypedError(422, "" . ($this1??'null') . " is not a valid date", new HxAnon([
					"fileName" => "tink/Stringly.hx",
					"lineNumber" => 92,
					"className" => "tink._Stringly.Stringly_Impl_",
					"methodName" => "parseDate",
				])));
			}
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:110: characters 9-45
			$s = \StringTools::replace($this1, "Z", "+00:00");
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:111: characters 9-157
			$d = \DateTime::createFromFormat((Stringly_Impl_::$SUPPORTED_DATE_REGEX->matched(2) === null ? "Y-m-d\\TH:i:sP" : "Y-m-d\\TH:i:s.uP"), $s, new \DateTimeZone("UTC"));
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:112: characters 9-92
			if (!$d) {
				#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:112: characters 79-92
				return Outcome::Failure(new TypedError(422, "" . ($this1??'null') . " is not a valid date", new HxAnon([
					"fileName" => "tink/Stringly.hx",
					"lineNumber" => 112,
					"className" => "tink._Stringly.Stringly_Impl_",
					"methodName" => "parseDate",
				])));
			}
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:113: characters 9-56
			return Outcome::Success(\Date::fromTime($d->getTimestamp() * 1000));
		}
	}

	/**
	 * @param string $this
	 * 
	 * @return Outcome
	 */
	static public function parseFloat ($this1) {
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:56: characters 19-30
		$_g = trim($this1);
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:57: lines 57-60
		if (Stringly_Impl_::isNumber($_g, true)) {
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:58: characters 9-45
			return Outcome::Success(\Std::parseFloat($_g));
		} else {
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:60: characters 9-94
			return Outcome::Failure(new TypedError(422, "" . ($_g??'null') . " (encoded as " . ($this1??'null') . ") is not a valid float", new HxAnon([
				"fileName" => "tink/Stringly.hx",
				"lineNumber" => 60,
				"className" => "tink._Stringly.Stringly_Impl_",
				"methodName" => "parseFloat",
			])));
		}
	}

	/**
	 * @param string $this
	 * 
	 * @return Outcome
	 */
	static public function parseInt ($this1) {
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:67: characters 19-30
		$_g = trim($this1);
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:68: lines 68-71
		if (Stringly_Impl_::isNumber($_g, false)) {
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:69: characters 9-41
			return Outcome::Success(\Std::parseInt($_g));
		} else {
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:71: characters 9-96
			return Outcome::Failure(new TypedError(422, "" . ($_g??'null') . " (encoded as " . ($this1??'null') . ") is not a valid integer", new HxAnon([
				"fileName" => "tink/Stringly.hx",
				"lineNumber" => 71,
				"className" => "tink._Stringly.Stringly_Impl_",
				"methodName" => "parseInt",
			])));
		}
	}

	/**
	 * @param string $this
	 * 
	 * @return bool
	 */
	static public function toBool ($this1) {
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:50: lines 50-53
		if ($this1 !== null) {
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:50: characters 30-55
			$__hx__switch = (mb_strtolower(trim($this1)));
			if ($__hx__switch === "0" || $__hx__switch === "false" || $__hx__switch === "no") {
				#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:51: characters 34-39
				return false;
			} else {
				#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:52: characters 18-22
				return true;
			}
		} else {
			#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:50: lines 50-53
			return false;
		}
	}

	/**
	 * @param string $this
	 * 
	 * @return \Date
	 */
	static public function toDate ($this1) {
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:152: characters 5-30
		return OutcomeTools::sure(Stringly_Impl_::parseDate($this1));
	}

	/**
	 * @param string $this
	 * 
	 * @return float
	 */
	static public function toFloat ($this1) {
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:64: characters 5-31
		return OutcomeTools::sure(Stringly_Impl_::parseFloat($this1));
	}

	/**
	 * @param string $this
	 * 
	 * @return int
	 */
	static public function toInt ($this1) {
		#/home/grabli66/haxelib/tink_stringly/git/src/tink/Stringly.hx:75: characters 5-29
		return OutcomeTools::sure(Stringly_Impl_::parseInt($this1));
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


		self::$SUPPORTED_DATE_REGEX = new \EReg("^(\\d{4}-\\d{2}-\\d{2}T\\d{2}:\\d{2}:\\d{2})(\\.\\d{3})?(Z|[\\+-]\\d{2}:\\d{2})\$", "");
	}
}

Boot::registerClass(Stringly_Impl_::class, 'tink._Stringly.Stringly_Impl_');
Stringly_Impl_::__hx__init();
