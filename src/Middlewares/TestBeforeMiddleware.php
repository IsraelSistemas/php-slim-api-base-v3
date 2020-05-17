<?php  
	
	use Psr\Http\Message\ServerRequestInterface as Request;
	use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
	use Slim\Psr7\Response;

	class TestBeforeMiddleware {

		public function __invoke(Request $request, RequestHandler $requestHandler): Response {
			$response = $handler->handle($request);
			$existingContent = (string) $response->getBody();

			$response = new Response();
			$response->getBody()->write("before middleware" . $existingContent);

			return $response;
		}

	}