<?php 

include (__DIR__ . '/vendor/autoload.php');
	use Zend\Diactoros\ServerRequestFactory;
	use Zend\Diactoros\Response\HtmlResponse;
	use Zend\Diactoros\Response\JsonResponse;
	use Zend\Diactoros\Response\RedirectResponse;
	use Zend\Diactoros\Response\SapiEmitter;
	use Aura\Router\RouterContainer;

	$request = ServerRequestFactory::fromGlobals();

	
	$routerContainer = new RouterContainer();
	$map = $routerContainer->getMap();

	// карта маршрутов
	$map->get('login', '/login', function ()
	{
		return new RedirectResponse("/pages/login.php");
	});
	$map->get('register', '/register', function ()
	{
		return new RedirectResponse("pages/register.php");
	});
	$map->get('home', '/', function ()
	{
		return new RedirectResponse("pages/home.php");
	});
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
	$response = $handler($request);

	$emitter = new SapiEmitter();
	$emitter->emit($response);



 ?>
