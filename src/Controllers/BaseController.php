<?php  

	namespace App\Controllers;

	use Psr\Container\ContainerInterface;
	use App\Repositories\TestRepository;

	class BaseController {

		protected $container;
		protected $testRepository;

		public function __construct(
			ContainerInterface 	$container,
			TestRepository 		$testRepository
		) {
			$this->container 		= $container;
			$this->testRepository 	= $testRepository;
		}

	}