<?php

	use Slim\Factory\AppFactory;

	require __DIR__ . "/../../vendor/autoload.php";

	// containers slim app
	$auxContainer 	= new \DI\Container();
	$settings 		= require __DIR__ ."/../Config/Settings.php";
	
	$settings($auxContainer);
	AppFactory::setContainer($auxContainer);

	// create slim app
	$app = AppFactory::create();

	// get container
	$container = $app->getContainer();

	// adding middlewares on app
	$app->addErrorMiddleware(
		$container->get("settings")->displayErrorDetails, 
		$container->get("settings")->logErrors, 
		$container->get("settings")->logErrorDetails
	);
	// $app->add(new TestBeforeMiddleware());


	require __DIR__ . "/../Routes/Routes.php";
	require __DIR__ . "/../Config/Settings.php";
	require __DIR__ . "/../Config/Database.php";

	$app->run();