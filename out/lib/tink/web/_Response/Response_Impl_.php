<?php
/**
 * Generated by Haxe 4.0.0-rc.3+e3df7a448
 */

namespace tink\web\_Response;

use \php\Boot;
use \tink\http\ResponseHeaderBase;
use \tink\http\Message;

final class Response_Impl_ {
	/**
	 * @param ResponseHeaderBase $header
	 * @param mixed $body
	 * 
	 * @return Message
	 */
	static public function _new ($header, $body) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_web/0.1.5/haxelib/src/tink/web/Response.hx:10: character 2
		return new Message($header, $body);
	}

	/**
	 * @param Message $this
	 * 
	 * @return mixed
	 */
	static public function getData ($this1) {
		#C:/Users/VEgorov/AppData/Roaming/haxe/haxe_libraries/tink_web/0.1.5/haxelib/src/tink/web/Response.hx:15: characters 3-19
		return $this1->body;
	}
}

Boot::registerClass(Response_Impl_::class, 'tink.web._Response.Response_Impl_');