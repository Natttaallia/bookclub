<?php 
namespace App\controllers;

	use Zend\Diactoros\Response\HtmlResponse;
	use duncan3dc\Laravel\BladeInstance;


class LoginController{

public function __invoke($request)
{
	$blade = new BladeInstance(
				__DIR__ . "/../../pages", 
				__DIR__ . "/../../cache/pages"
			);

		$content=$blade->render('login');

		return new HtmlResponse($content);
}


}

 ?>