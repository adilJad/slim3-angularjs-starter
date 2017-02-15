/*
* @Author: Jad
* @Date:   2016-12-20 14:45:45
* @Last Modified by:   Jad
* @Last Modified time: 2016-12-20 16:04:59
*/
var services = angular.module("appModule.services", []);
'use strict';

services.factory("AppApi", function($http, $q) {
	var base_url = "[app domain name]/api";

	function makeApiCall(url, method, data) {
		var config = {"cache-control": "no-cache"};
		url = base_url + url;
		var req = {
			method: method,
			url: url,
			withCredentials: false,
			headers: config,
			data:data
		}
		/*console.log(req);*/
		var deffered = $q.defer();

		$http(req).then(function(res){
			console.log(res);
			deffered.resolve(res.data);
		}, function(err){
			console.log(err);
			deffered.reject(err);
		});
		return deffered.promise;
	}

	function getData() {
		return makeApiCall("/data", "GET", {});
	}

	return {
		getData: getData
	}
})