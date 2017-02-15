<?php

/**
 * @Author: Jad
 * @Date:   2016-12-21 11:33:10
 * @Last Modified by:   Jad
 * @Last Modified time: 2016-12-22 16:45:10
 */

namespace Elpatio\Models;
use \Illuminate\Database\Eloquent\Model as Model;

/**
* 
*/
class User extends Model 
{
	public function authenticate($apiKey) {
		$user = User::where('api_key', '=', $apiKey)->take(1)->get();

		if(!isset($user[0])){
			return false;
		}
		$this->details = $user[0];
		return ($user[0]->exists) ? true : false;
	}

	public function getDetails()
	{
		return $this->details->attributes;
	}
}

?>