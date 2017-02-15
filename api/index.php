<?php
/**
 * @Author: Jad
 * @Date:   2016-12-20 15:53:09
 * @Last Modified by:   jad
 * @Last Modified time: 2017-01-02 16:59:16
 */
require 'vendor/autoload.php';
include 'bootstrap.php';
use \Slim\Http\Request;
use \Slim\Http\Response;
use App\Middleware\Authentication as Authentication;
use App\Models\User;


// Dev
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

// prod
// $app = new \Slim\App();

$app->add(new Authentication());

$app->post('/login', function(Request $request, Response $response, $args) {
	return $response;
});

$app->get('/data', function(Request $request, Response $response, $args) {
	$data = array('name' => 'Bob', 'age' => 40);
	return $response->withJSON($data);
});

$app->run();

?>