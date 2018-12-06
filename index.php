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

	

	$request = ServerRequestFactory::fromGlobals();

	
	$routerContainer = new RouterContainer();
	$map = $routerContainer->getMap();

	// карта маршрутов
	// $map->get('login', '/login', function ()
	// {
	// 	return new RedirectResponse("/pages/login.php");
	// });
	$map->get('login', '/login',App\controllers\LoginController::class);
	$map->post('loginPost', '/login',App\controllers\LoginController::class);

	// $map->get('login', '/login', ['App\controllers\LoginController', 'index']);
	// $map->get('register', '/register', function ()
	// {
	// 	return new RedirectResponse("pages/register.php");
	// });
	$map->get('register', '/register', ['App\controllers\RegisterController', 'index']);

	$map->post('registerPost', '/register', ['App\controllers\RegisterController', 'index']);

	$map->get('homewithpage', '/{page}', function ($request)
	{
		$page=$request->getURI()->getPath();
		$page = substr($page, 1);
		return new RedirectResponse("pages/home.php?page=$page");
	})->tokens(['page' => '\d+']);
	$map->get('home', '/', function ()
	{
		return new RedirectResponse("pages/home.php");
	});
	// $map->get('home', '/', ['App\controllers\HomeController', 'index']);
	$map->get('cabinet', '/cabinet', function ()
	{
		return new RedirectResponse("pages/cabinet.php");
	});
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
