<?php 

	$container->set("db_settings", function() {
		return (object) [
			"db_host" 		=> "localhost",
			"db_name" 		=> "dbname",
			"db_user" 		=> "user",
			"db_password" 	=> "password",
			"db_char" 		=> "utf8"
		];
	});