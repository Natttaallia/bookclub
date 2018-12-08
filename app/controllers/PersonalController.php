<?php 

namespace App\controllers;


	use Zend\Diactoros\Response\HtmlResponse;
	use duncan3dc\Laravel\BladeInstance;



class PersonalController{





public function __invoke($request)
{
	$blade = new BladeInstance(
				__DIR__ . "/../../pages", 
				__DIR__ . "/../../cache/pages"
			);

	session_start();
	if(isset($_SESSION['username']))	
		$content=$blade->render('personal', [
					'name' => $_SESSION['username']
				]);
	else
		$content=$blade->render('error', [
					'Text' => "Вы не авторизированы"
				]);


		return new HtmlResponse($content);



}


}




 ?>