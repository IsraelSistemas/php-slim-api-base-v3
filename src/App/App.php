<?php

	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;
	use Slim\Factory\AppFactory;

	require __DIR__ . "/../../vendor/autoload.php";

	// containers slim app
	$auxContainer = new \DI\Container();
	AppFactory::setContainer($auxContainer);

	// create slim app
	$app = AppFactory::create();

	// get container
	$container = $app->getContainer();

	// adding middlewares on app
	// $app->add(new TestBeforeMiddleware());

	$app->get("/", function (Request $request, Response $response, $args) {
	    $response->getBody()->write("API IS WORKING");
	    return $response;
	});

	require __DIR__ . "/../Routes/Routes.php";
	require __DIR__ . "/../Config/Settings.php";
	require __DIR__ . "/../Config/Database.php";

	$app->run();