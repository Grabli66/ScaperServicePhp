import tink.core.Future;
import tink.core.Promise;
import tink.http.containers.*;
import tink.http.Response;
import tink.web.routing.*;

using StringTools;

@:native('DOMNode')
extern class DOMNode {
	var nodeName:String;
	var nodeValue:String;
	var textContent:String;
}

@:native('DOMNodeList')
extern class DOMNodeList {
	var length:Int;
	function count():Int;
	function item(index:Int):DOMNode;
}

@:native('DOMDocument')
extern class DOMDocument extends DOMNode {
	function new();
	function loadHTML(source:String):Bool;
	function saveHTML():String;
	function getElementsByTagName(name:String):DOMNodeList;
}

@:native('DOMXPath')
extern class DOMXPath {
	@:native("__construct")
	function new(doc:DOMDocument);
	function query(expression:String, ?contextnode:DOMNode, registerNodeNS:Bool = true):DOMNodeList;
}

class Main {
	static function main() {
		php.Syntax.code("libxml_use_internal_errors(true);");
		var container = PhpContainer.inst; // use PhpContainer instead of NodeContainer when targeting PHP
		var router = new Router<Root>(new Root());
		container.run(function(req) {
			return router.route(Context.ofRequest(req)).recover(OutgoingResponse.reportError);
		});
	}
}

class Root {
	public function new() {}

	@:get('/xpath')
	public function parseXpath(query:{url:String, query:String}):Promise<Result> {
		return Future.async(completer -> {
			var http = new haxe.Http(query.url);
			http.onData = (data:String) -> {
				try {
					var dom = new DOMDocument();
					dom.loadHTML('<?xml version="1.0" encoding="UTF-8"?>${data}');
					var xpath = new DOMXPath(dom);
					var nodes = xpath.query(query.query);
					var res = new Array<{
						name:String,
						text:String
					}>();
					for (i in 0...nodes.length) {
						var node = nodes.item(i);
						res.push({
							name: node.nodeName,
							text: node.nodeValue.trim()
						});
					}

					completer({
						code: 0,
						errorText: null,
						nodes: res
					});
				} catch (e:Dynamic) {
					completer({
						code: 1,
						errorText: null,
						nodes: null
					});
				}

				return null;
			}
			http.onError = (error) -> {
				completer({
					code: 2,
					errorText: "Wrong URL",
					nodes: null
				});
			}
			http.request();
		});
	}
}

typedef Result = {
	code:Int,
	?errorText:String,
	?nodes:Array<{
		name:String,
		text:String
	}>
}
