<?php 

	namespace App\Routes;

	use Slim\Routing\RouteCollectorProxy;

	$app->group("/api", function(RouteCollectorProxy $routeCollectorProxy) {

		$routeCollectorProxy->get("/SimpleResponse", "App\Controllers\TestController:SimpleResponse");

		$routeCollectorProxy->get("/SimpleDBResponse", "App\Controllers\TestController:SimpleDBResponse");

	});