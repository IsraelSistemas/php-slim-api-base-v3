<?php 
	
	use Psr\Container\ContainerInterface;

	$container->set("db_instance", function(ContainerInterface $container) {
		$config 	= $container->get('db_settings');
		$host 		= $config->dbHost;
		$database 	= $config->dbName;
		$user 		= $config->dbUser;
		$password 	= $config->dbPassword;
		$charset 	= $config->dbChar;

		$options 	= [
			PDO::ATTR_ERRMODE 				=> PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE 	=> PDO::FETCH_OBJ
		];


		$datasource = "mysql:host=" . $host . ";dbname=" . $database . ";charset=" . $charset;
        
        return new PDO($datasource, $user, $password, $options);
	});