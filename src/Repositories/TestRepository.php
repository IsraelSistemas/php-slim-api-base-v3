<?php  

	namespace App\Repositories;

	use App\Helpers\Helpers;
	use App\Interfaces\TestInterface;

	class TestRepository extends Helpers implements TestInterface {

		public function __construct() {
			
		}

		public function GenerateToken($request, $response, $args, $container) {
			$response->getBody()->write($this->GenerateAccessToken($container));
		    
		    return $response;
		}

		public function SimpleResponse($request, $response, $args) {
			$response->getBody()->write(
				json_encode(
					array(
						"id" => 1,
						"name" => "test"
					)
				)
			);

			return $response;
		}

		public function SimpleDBResponse($request, $response, $args, $container) {
			$pdo = $container->get("db_instance");
	
			$query = $pdo->query("
				SELECT 
					* 
				FROM SideMenu
			");

			$response->getBody()->write(
				json_encode($query->fetchAll())
			);

			return $response;
		}

	}

