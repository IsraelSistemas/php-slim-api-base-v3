<?php  
	
	declare(strict_types = 1);

	use Slim\App;

	return function (App $app) {

		// gobal middleware 
		$app->addErrorMiddleware(true, true, true);
		$app->add(ExampleBeforeMiddleware::class);

	}