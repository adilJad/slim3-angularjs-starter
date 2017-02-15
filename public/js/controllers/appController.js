/*
* @Author: Jad
* @Date:   2016-12-20 15:05:10
* @Last Modified by:   Jad
* @Last Modified time: 2016-12-20 16:04:11
*/

var controllers = angular.module('appModule.controllers', []);
'use strict';

controllers.controller("AppController", function($scope, AppApi) {
	console.log("Hello Jad");

	AppApi.getData().then(function(data) {
		$scope.data = data;
	})
})