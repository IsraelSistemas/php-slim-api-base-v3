<?php  

	namespace App\Interfaces;

	interface TestInterface {

		public function GenerateToken($request, $response, $args, $container);

		public function SimpleResponse($request, $response, $args);

		public function SimpleDBResponse($request, $response, $args, $container);

	}

