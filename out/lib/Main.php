<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Promise\Recover_Impl_;
use \tink\http\containers\PhpContainer;
use \tink\web\routing\Router0;
use \tink\http\SimpleHandler;
use \tink\http\_Response\OutgoingResponse_Impl_;
use \tink\web\routing\Context;

class Main {
	/**
	 * @return void
	 */
	static public function main () {
		#src/Main.hx:39: characters 3-55
		libxml_use_internal_errors(true);;
		#src/Main.hx:41: characters 3-45
		$router = new Router0(new \Root());
		#src/Main.hx:42: lines 42-44
		PhpContainer::$inst->run(new SimpleHandler(function ($req)  use (&$router) {
			#src/Main.hx:43: characters 24-46
			$this1 = Context::ofRequest($req);
			#src/Main.hx:43: characters 11-85
			$this2 = $router->route($this1);
			$f = Recover_Impl_::ofSync(Boot::getStaticClosure(OutgoingResponse_Impl_::class, 'reportError'));
			return $this2->flatMap(function ($o)  use (&$f) {
				$__hx__switch = ($o->index);
				if ($__hx__switch === 0) {
					return new SyncFuture(new LazyConst($o->params[0]));
				} else if ($__hx__switch === 1) {
					return $f($o->params[0]);
				}
			})->gather();
		}));
	}

	/**
	 * @return void
	 */
	public function __construct () {
	}
}

Boot::registerClass(Main::class, 'Main');