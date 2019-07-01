<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a4
 */

namespace tink\querystring;

use \php\_Boot\HxAnon;
use \php\Boot;
use \tink\core\_Callback\Callback_Impl_;
use \tink\core\TypedError;
use \tink\core\Outcome;
use \php\_Boot\HxString;
use \haxe\ds\StringMap;
use \php\_Boot\HxException;

class ParserBase {
	/**
	 * @var StringMap
	 */
	public $exists;
	/**
	 * @var \Closure
	 */
	public $onError;
	/**
	 * @var StringMap
	 */
	public $params;
	/**
	 * @var object
	 */
	public $pos;
	/**
	 * @var Outcome
	 */
	public $result;

	/**
	 * @param \Closure $onError
	 * @param object $pos
	 * 
	 * @return void
	 */
	public function __construct ($onError = null, $pos = null) {
		#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:20: characters 5-19
		$this->pos = $pos;
		#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:21: lines 21-24
		$this->onError = ($onError === null ? Boot::getInstanceClosure($this, 'abort') : $onError);
	}

	/**
	 * @param object $e
	 * 
	 * @return void
	 */
	public function abort ($e) {
		#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:55: characters 5-10
		throw new HxException($this->error("" . ($e->reason??'null') . " for " . ($e->name??'null')));
	}

	/**
	 * @param string $field
	 * @param Outcome $o
	 * 
	 * @return mixed
	 */
	public function attempt ($field, $o) {
		#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:67: lines 67-70
		$__hx__switch = ($o->index);
		if ($__hx__switch === 0) {
			#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:68: characters 24-25
			return $o->params[0];
		} else if ($__hx__switch === 1) {
			#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:69: characters 24-46
			return $this->fail($field, $o->params[0]->message);
		}
	}

	/**
	 * @param string $reason
	 * @param mixed $data
	 * 
	 * @return TypedError
	 */
	public function error ($reason, $data = null) {
		#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:73: characters 5-66
		return TypedError::withData(422, $reason, $data, $this->pos);
	}

	/**
	 * @param string $field
	 * @param string $reason
	 * 
	 * @return mixed
	 */
	public function fail ($field, $reason) {
		#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:76: characters 5-51
		Callback_Impl_::invoke($this->onError, new HxAnon([
			"name" => $field,
			"reason" => $reason,
		]));
		#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:77: characters 5-16
		return null;
	}

	/**
	 * @param object $input
	 * @param \Closure $name
	 * @param \Closure $value
	 * 
	 * @return void
	 */
	public function init ($input, $name, $value) {
		#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:28: characters 5-28
		$this->params = new StringMap();
		#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:29: characters 5-28
		$this->exists = new StringMap();
		#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:31: lines 31-50
		if ($input !== null) {
			#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:32: characters 20-25
			while ($input->hasNext()) {
				#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:32: lines 32-50
				$pair = $input->next();
				#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:33: characters 9-31
				$name1 = $name($pair);
				#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:34: characters 9-35
				$this1 = $this->params;
				$v = $value($pair);
				$this1->data[$name1] = $v;

				#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:35: characters 9-31
				$end = mb_strlen($name1);
				#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:37: lines 37-49
				while ($end > 0) {
					#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:39: characters 11-40
					$name1 = HxString::substring($name1, 0, $end);
					#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:41: characters 11-34
					if (($this->exists->data[$name1] ?? null)) {
						#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:41: characters 29-34
						break;
					}
					#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:43: characters 11-30
					$this->exists->data[$name1] = true;
					#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:45: characters 51-81
					$_g = HxString::lastIndexOf($name1, ".", $end - 1);
					#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:45: characters 19-49
					$_g1 = HxString::lastIndexOf($name1, "[", $end - 1);
					#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:46: lines 46-47
					if ($_g1 > $_g) {
						#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:46: characters 37-44
						$end = $_g1;
					} else {
						#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:47: characters 26-33
						$end = $_g;
					}

				}
			}
		}
	}

	/**
	 * @param string $name
	 * 
	 * @return mixed
	 */
	public function missing ($name) {
		#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:81: characters 5-39
		return $this->fail($name, "Missing value");
	}

	/**
	 * @param mixed $input
	 * 
	 * @return mixed
	 */
	public function parse ($input) {
		#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:58: characters 12-17
		throw new HxException(TypedError::withData(501, "not implemented", $this->pos, new HxAnon([
			"fileName" => "tink/querystring/Parser.hx",
			"lineNumber" => 58,
			"className" => "tink.querystring.ParserBase",
			"methodName" => "parse",
		])));
	}

	/**
	 * @param mixed $input
	 * 
	 * @return Outcome
	 */
	public function tryParse ($input) {
		#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:62: lines 62-64
		try {
			#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:62: characters 11-32
			return Outcome::Success($this->parse($input));
		} catch (\Throwable $__hx__caught_e) {
			$__hx__real_e = ($__hx__caught_e instanceof HxException ? $__hx__caught_e->e : $__hx__caught_e);
			if ($__hx__real_e instanceof TypedError) {
				$e = $__hx__real_e;
				#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:63: characters 23-33
				return Outcome::Failure($e);
			} else {
				$e1 = $__hx__real_e;
				#/home/grabli66/haxelib/tink_querystring/git/src/tink/querystring/Parser.hx:64: characters 25-57
				return Outcome::Failure($this->error("Parse Error", $e1));
			}
		}
	}
}

Boot::registerClass(ParserBase::class, 'tink.querystring.ParserBase');
