<?php 

	namespace App\Routes;

	use Slim\Routing\RouteCollectorProxy;

	$app->group("/api", function(RouteCollectorProxy $routeCollectorProxy) {

		$routeCollectorProxy->get("/test", "App\Controllers\TestController:Test");

	});