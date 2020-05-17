<?php 

	use \DI\Container;

	return function(Container $container) {

		$container->set("settings", function() {
			return (object) [
				"nameApplication"		=> "slim 4 API rest template", 
				"displayErrorDetails" 	=> true,
	 			"logErrors"				=> true,
	 			"logErrorDetails"		=> true
			];
		});

		$container->set("db_settings", function() {
			return (object) [
				"dbHost" 		=> "localhost",
				"dbName" 		=> "compra_venta",
				"dbUser" 		=> "root",
				"dbPassword" 	=> "",
				"dbChar" 		=> "utf8"
			];
		});

	};