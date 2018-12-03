<?php 

namespace App\controllers;

	use Zend\Diactoros\Response\HtmlResponse;


class HomeController{
	public function index(){
		$content = include(__DIR__ . '/../../pages/home.php');
		return new HtmlResponse($content);
	}
}
 ?>