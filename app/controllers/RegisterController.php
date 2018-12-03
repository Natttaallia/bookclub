<?php 
namespace App\controllers;

	use Zend\Diactoros\Response\HtmlResponse;


class RegisterController{
	public function index(){
		$content = include(__DIR__ . '/../../pages/register.php');
		return new HtmlResponse($content);
	}
}
 ?>