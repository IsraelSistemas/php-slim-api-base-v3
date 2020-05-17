<?php  

	namespace App\Controllers;

	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;
	use App\Controllers\BaseController;

	class TestController extends BaseController {

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

