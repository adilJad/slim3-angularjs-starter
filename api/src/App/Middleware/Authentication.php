<?php
/**
 * @Author: Jad
 * @Date:   2016-12-21 11:29:55
 * @Last Modified by:   jad
 * @Last Modified time: 2017-01-02 16:22:38
 */

namespace Elpatio\Middleware;

use Elpatio\Models\User;
use \Slim\Http\Request;
use \Slim\Http\Response;
/**
* 
*/
class Authentication
{
	function __invoke($request, $response, $next)
	{
		if($request->getUri()->getPath() == "login"){
			$username = $request->getParsedBodyParam('username', '');
			$password = $request->getParsedBodyParam('password', '');
			$apiKey = md5($username.$password);
		} else {	
			$auth = $request->getHeader('Authorization');
			// $auth = $request->getAllHeaders();
			// var_dump($auth); die();
			if(empty($auth)) {
				return $response->withStatus(401)->withJSON(array("message" => "Authorization header empty"));
			}
			$apiKey = substr($auth[0], strpos($auth[0], ' ') + 1);
		}
		$user = new User();
		if(!$user->authenticate($apiKey)) {
			return $response->withStatus(401)->withJSON(array("message" => "wrong email and/or password"));
		}
		$response = $response->withJSON($user->getDetails());
		$response = $next($request, $response);

		return $response;
	}
}

?>