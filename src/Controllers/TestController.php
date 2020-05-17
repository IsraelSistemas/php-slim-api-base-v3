<?php  

	namespace App\Controllers;

	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;
	use App\Controllers\BaseController;

	class TestController extends BaseController {

		public function Test($request, $response, $args) {
			$pdo = $this->container->get('db_instance');
			$query = $pdo->query("
				SELECT 
					* 
				FROM SideMenu
			");

			$response->getBody()->write(
				json_encode($query->fetchAll())
			);

			return $response
				->withHeader("Content-Type", "application/json")
				->withStatus(200);
		}

	}

