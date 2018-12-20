<?php
namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;

use Aura\Router\RouterContainer;
use Illuminate\Database\Capsule\Manager as DB;



class LoginMiddleware implements MiddlewareInterface {
	protected $route;

	function __construct($data) {
		global $route;
		$this->route = $route;
	}

	public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
	{
		
		$login = $request->getParsedBody()['login'];
		$password = $request->getParsedBody()['password'];

		if ($this->route->name === "loginPost") {

			if (isset($login) && isset($password) && !empty($login) && !empty($password)) {
			if($this->ChekingUser($login,$password)){
				session_start();
				$_SESSION['username']=$login;
				return new RedirectResponse('/cabinet/1');
			}
			else
				return new HtmlResponse('<h1>Данные не верные. Вы не вошли</h1>');
			}
		}
		return $handler->handle($request);		
	}
	private function ChekingUser($login,$password){	
	$pas=DB::table('users')
					->where('login', '=', $login)
					->pluck('password')
					->toArray();
		foreach ($pas as  $value) {
			if(password_verify($password,$value)){
			return true;
			}
		}
		return false;	
	}
}