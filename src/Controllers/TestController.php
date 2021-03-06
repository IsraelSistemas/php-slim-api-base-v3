<?php  

	namespace App\Controllers;

	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;
	use App\Controllers\BaseController;

	class TestController extends BaseController {

		public function ApiRunning($request, $response, $args) {
		    $response->getBody()->write(
		    	json_encode(
		    		array(
		    			"success" => true,
		    			"message" => "API IS RUNNING"
		    		)
		    	)
		    );
		    
		    return $response
		    	->withHeader("Content-Type", "application/json")
				->withStatus(200);
		}

		public function GenerateToken($request, $response, $args) {
			$response = $this->testRepository->GenerateToken($request, $response, $args, $this->container);

			return $response;
		}

		public function SimpleResponse($request, $response, $args) {
			$response = $this->testRepository->SimpleResponse($request, $response, $args);

			return $response
				->withHeader("Content-Type", "application/json")
				->withStatus(200);
		}

		public function SimpleDBResponse($request, $response, $args) {
			$response = $this->testRepository->SimpleDBResponse($request, $response, $args, $this->container);

			return $response
				->withHeader("Content-Type", "application/json")
				->withStatus(200);
		}

	}

