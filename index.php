<?php 

include (__DIR__ . '/vendor/autoload.php');
	use Zend\Diactoros\ServerRequestFactory;
	use Zend\Diactoros\Response\HtmlResponse;
	use Zend\Diactoros\Response\JsonResponse;
	use Zend\Diactoros\Response\RedirectResponse;
	use Zend\Diactoros\Response\SapiEmitter;
	use Aura\Router\RouterContainer;
	use App\controllers\LoginController;
	use App\controllers\RegisterController;
	use App\controllers\HomeController;
	use App\controllers\PersonalController;
	// подключение ORM
	use Illuminate\Database\Capsule\Manager as Capsule;

	$capsule = new Capsule;

	$capsule->addConnection([
	    'driver'    => 'mysql',
	    'host'      => 'localhost',
	    'database'  => 'bookclub',
	    'username'  => 'root',
	    'password'  => '',
	    'charset'   => 'utf8',
	    'collation' => 'utf8_unicode_ci',
	    'prefix'    => '',
	]);

	$capsule->setAsGlobal();

// подключение ORM


	

	$request = ServerRequestFactory::fromGlobals();

	
	$routerContainer = new RouterContainer();
	$map = $routerContainer->getMap();

	// карта маршрутов
	$map->get('login', '/login',App\controllers\LoginController::class);
	$map->post('loginPost', '/login',App\controllers\LoginController::class);


	$map->get('register', '/register',App\controllers\RegisterController::class);
	$map->post('registerPost', '/register',App\controllers\RegisterController::class);


	$map->get('home', '/home',App\controllers\HomeController::class);
	$map->get('home_', '/',App\controllers\HomeController::class);
	$map->get('homewithpage', '/{page}', App\controllers\HomeController::class)->tokens(['page' => '\d+']);

	
	$map->get('cabinet', '/cabinet',App\controllers\PersonalController::class);


	$matcher = $routerContainer->getMatcher();
	$route = $matcher->match($request);
	if (! $route) {
		// 404 page
	    echo "No route found for the request.";
	    exit;
	}
	$handler = $route->handler;
	$obj=new $handler();
	$response = $obj($request);

	$emitter = new SapiEmitter();
	$emitter->emit($response);



 ?>
