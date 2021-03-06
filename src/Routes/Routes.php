<?php 

	namespace App\Routes;

	use Slim\Routing\RouteCollectorProxy;

	$app->group("/api", function(RouteCollectorProxy $routeCollectorProxy) {

		$routeCollectorProxy->get("/", "App\Controllers\TestController:ApiRunning");

		$routeCollectorProxy->get("/GenerateToken", "App\Controllers\TestController:GenerateToken");

		$routeCollectorProxy->get("/SimpleResponse", "App\Controllers\TestController:SimpleResponse");

		$routeCollectorProxy->get("/SimpleDBResponse", "App\Controllers\TestController:SimpleDBResponse");

	});