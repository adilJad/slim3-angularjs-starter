/*
* @Author: Jad
* @Date:   2016-12-20 14:40:41
* @Last Modified by:   Jad
* @Last Modified time: 2016-12-20 15:18:52
*/
appModule.config(function($stateProvider, $urlRouterProvider) {
'use strict';
	$stateProvider.
	state('data', {
		url: '/',
		templateUrl: 'public/templates/data.html',
		controller: 'AppController'
	});

	$urlRouterProvider.otherwise('/');
});